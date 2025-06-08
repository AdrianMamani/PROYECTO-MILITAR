<?php
require_once './models/NoticiasModel.php';

class NoticiasVideosController {
    private $modelo;

    public function __construct() {
        $this->modelo = new NoticiasModel();
    }

    // Vista principal de videos
    public function index() {
        $noticia = null;
        $videos = [];
        
        try {
            // Si viene noticia_id, mostrar videos de esa noticia
            if (isset($_GET['noticia_id'])) {
                $noticia_id = $_GET['noticia_id'];
                $noticia = $this->modelo->obtenerNoticiaPorId($noticia_id);
                
                if (!$noticia) {
                    throw new Exception("Noticia no encontrada.");
                }
                
                $videos = $this->modelo->obtenerVideosNoticia($noticia_id);
                
                require_once './views/admin/gestionar-videos.php';
            } else {
                // Mostrar selector de noticias para videos
                $noticias = $this->modelo->obtenerTodasLasNoticias();
                require_once './views/admin/gestionar-videos.php';
            }
        } catch (Exception $e) {
            $_SESSION['error'] = "Error: " . $e->getMessage();
            
            // Si hay error pero tenemos noticia_id, intentar mostrar la vista con datos vacíos
            if (isset($_GET['noticia_id'])) {
                $noticia_id = $_GET['noticia_id'];
                // Intentar obtener la noticia una vez más para mostrar algo
                try {
                    $noticia = $this->modelo->obtenerNoticiaPorId($noticia_id);
                    if (!$noticia) {
                        // Si no existe la noticia, crear una básica para evitar errores
                        $noticia = [
                            'id' => $noticia_id,
                            'titulo' => 'Noticia no encontrada'
                        ];
                    }
                    $videos = []; // Array vacío para evitar errores
                    require_once './views/admin/gestionar-videos.php';
                } catch (Exception $e2) {
                    // Si todo falla, redirigir
                    header('Location: index.php?action=noticias/index');
                    exit;
                }
            } else {
                header('Location: index.php?action=noticias/index');
                exit;
            }
        }
    }

    // Guardar video
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $noticia_id = $_POST['noticia_id'] ?? 0;
                $tipo_video = $_POST['tipo_video'] ?? 'youtube';
            
                if (!$noticia_id) {
                    throw new Exception("ID de noticia requerido.");
                }

                // Verificar que la noticia existe
                $noticia = $this->modelo->obtenerNoticiaPorId($noticia_id);
                if (!$noticia) {
                    throw new Exception("Noticia no encontrada.");
                }

                $url_final = '';

                if ($tipo_video === 'youtube') {
                    // Procesar URL de YouTube o ID directo
                    $youtube_input = trim($_POST['youtube_url'] ?? '');
                    
                    if (empty($youtube_input)) {
                        throw new Exception("URL de YouTube o ID de video requerido.");
                    }

                    // Extraer ID del video de YouTube
                    $video_id = $this->extraerIdYoutube($youtube_input);
                    if (!$video_id) {
                        throw new Exception("No se pudo extraer el ID del video. Verifica que sea una URL válida de YouTube o un ID de 11 caracteres como: ouH2QfZAN1o");
                    }
                    
                    $url_final = "https://www.youtube.com/embed/" . $video_id;
                } else if ($tipo_video === 'local') {
                    // Procesar archivo de video local
                    if (!isset($_FILES['video_local'])) {
                        throw new Exception("No se recibió ningún archivo.");
                    }
                
                    $archivo = $_FILES['video_local'];
                
                    // Verificar errores de subida
                    switch ($archivo['error']) {
                        case UPLOAD_ERR_OK:
                            break;
                        case UPLOAD_ERR_NO_FILE:
                            throw new Exception("No se seleccionó ningún archivo.");
                        case UPLOAD_ERR_INI_SIZE:
                        case UPLOAD_ERR_FORM_SIZE:
                            throw new Exception("El archivo es demasiado grande.");
                        default:
                            throw new Exception("Error desconocido al subir el archivo.");
                    }

                    // Validar tipo de archivo
                    $finfo = finfo_open(FILEINFO_MIME_TYPE);
                    $mime_type = finfo_file($finfo, $archivo['tmp_name']);
                    finfo_close($finfo);
                
                    $tipos_permitidos = [
                        'video/mp4',
                        'video/avi', 
                        'video/quicktime', // .mov
                        'video/x-msvideo', // .avi
                        'video/x-ms-wmv', // .wmv
                        'video/webm'
                    ];
                
                    if (!in_array($mime_type, $tipos_permitidos)) {
                        throw new Exception("Tipo de archivo no permitido. Tipo detectado: " . $mime_type);
                    }

                    // Validar extensión
                    $extension = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));
                    $extensiones_permitidas = ['mp4', 'avi', 'mov', 'wmv', 'webm'];
                
                    if (!in_array($extension, $extensiones_permitidas)) {
                        throw new Exception("Extensión de archivo no permitida: ." . $extension);
                    }

                    // Verificar tamaño (máximo 50MB)
                    $max_size = 50 * 1024 * 1024; // 50MB
                    if ($archivo['size'] > $max_size) {
                        throw new Exception("El archivo es demasiado grande. Tamaño: " . round($archivo['size']/(1024*1024), 2) . "MB. Máximo permitido: 50MB.");
                    }

                    // Crear directorio si no existe
                    $directorio_destino = './uploads/videos/';
                    if (!is_dir($directorio_destino)) {
                        if (!mkdir($directorio_destino, 0755, true)) {
                            throw new Exception("No se pudo crear el directorio de destino.");
                        }
                    }

                    // Generar nombre único
                    $nombre_archivo = uniqid('video_') . '_' . time() . '.' . $extension;
                    $ruta_destino = $directorio_destino . $nombre_archivo;

                    // Mover archivo
                    if (!move_uploaded_file($archivo['tmp_name'], $ruta_destino)) {
                        throw new Exception("Error al mover el archivo subido al directorio de destino.");
                    }

                    $url_final = 'uploads/videos/' . $nombre_archivo;
                } else {
                    throw new Exception("Tipo de video no válido.");
                }

                // Guardar en base de datos
                $resultado = $this->modelo->guardarVideo($noticia_id, $url_final, $tipo_video);

                if ($resultado) {
                    $_SESSION['mensaje'] = "Video agregado exitosamente.";
                    header('Location: index.php?action=noticiasvideos/index&noticia_id=' . $noticia_id);
                    exit;
                } else {
                    // Si falló la BD y es archivo local, eliminar el archivo
                    if ($tipo_video === 'local' && file_exists($ruta_destino)) {
                        unlink($ruta_destino);
                    }
                    throw new Exception("Error al guardar el video en la base de datos.");
                }

            } catch (Exception $e) {
                $_SESSION['error'] = "Error: " . $e->getMessage();
                $noticia_id = $_POST['noticia_id'] ?? 0;
                if ($noticia_id) {
                    header('Location: index.php?action=noticiasvideos/index&noticia_id=' . $noticia_id);
                    exit;
                } else {
                    header('Location: index.php?action=noticias/index');
                    exit;
                }
            }
        }
    }

    // Eliminar video
    public function eliminar() {
        $id = $_GET['id'] ?? 0;
        $noticia_id = $_GET['noticia_id'] ?? 0;
        
        try {
            // Obtener información del video antes de eliminarlo
            $video = $this->modelo->obtenerVideoPorId($id);
            
            if (!$video) {
                throw new Exception("Video no encontrado.");
            }

            // Si es video local, eliminar archivo físico
            if ($video['tipo'] === 'local') {
                $ruta_archivo = './' . $video['url'];
                if (file_exists($ruta_archivo)) {
                    unlink($ruta_archivo);
                }
            }

            // Eliminar de base de datos
            $resultado = $this->modelo->eliminarVideo($id);
            
            if ($resultado) {
                $_SESSION['mensaje'] = "Video eliminado exitosamente.";
            } else {
                $_SESSION['error'] = "No se pudo eliminar el video.";
            }
            
            header('Location: index.php?action=noticiasvideos/index&noticia_id=' . $noticia_id);
            exit;
        } catch (Exception $e) {
            $_SESSION['error'] = "Error: " . $e->getMessage();
            header('Location: index.php?action=noticiasvideos/index&noticia_id=' . $noticia_id);
            exit;
        }
    }

    // Función auxiliar mejorada para extraer ID de YouTube
    private function extraerIdYoutube($input) {
        // Limpiar el input
        $input = trim($input);
        
        // Si ya es un ID directo (11 caracteres alfanuméricos)
        if (preg_match('/^[a-zA-Z0-9_-]{11}$/', $input)) {
            return $input;
        }
        
        // Patrones para diferentes formatos de URL de YouTube
        $patrones = [
            // URL estándar: https://www.youtube.com/watch?v=VIDEO_ID
            '/(?:youtube\.com\/watch\?v=)([a-zA-Z0-9_-]{11})/',
            // URL corta: https://youtu.be/VIDEO_ID
            '/(?:youtu\.be\/)([a-zA-Z0-9_-]{11})/',
            // URL embed: https://www.youtube.com/embed/VIDEO_ID
            '/(?:youtube\.com\/embed\/)([a-zA-Z0-9_-]{11})/',
            // URL con parámetros adicionales
            '/(?:youtube\.com\/watch\?.*v=)([a-zA-Z0-9_-]{11})/',
            // URL móvil
            '/(?:m\.youtube\.com\/watch\?v=)([a-zA-Z0-9_-]{11})/',
            // Solo el ID en cualquier parte del texto
            '/([a-zA-Z0-9_-]{11})/'
        ];

        foreach ($patrones as $patron) {
            if (preg_match($patron, $input, $matches)) {
                return $matches[1];
            }
        }

        return false;
    }
}
?>
