<?php
require_once './models/NoticiasModel.php';

class NoticiasVideosController {
    private $modelo;

    public function __construct() {
        $this->modelo = new NoticiasModel();
    }

    // Vista principal de videos
    public function index() {
        try {
            // Si viene noticia_id, mostrar videos de esa noticia
            if (isset($_GET['noticia_id'])) {
                $noticia_id = $_GET['noticia_id'];
                $noticia = $this->modelo->obtenerNoticiaPorId($noticia_id);
                $videos = $this->modelo->obtenerVideosNoticia($noticia_id);
                
                if (!$noticia) {
                    throw new Exception("Noticia no encontrada.");
                }
                
                require_once './views/admin/gestionar-videos.php';
            } else {
                // Mostrar selector de noticias para videos
                $noticias = $this->modelo->obtenerTodasLasNoticias();
                require_once './views/admin/selector_videos.php';
            }
        } catch (Exception $e) {
            $_SESSION['error'] = "Error: " . $e->getMessage();
            header('Location: index.php?action=noticias/index');
            exit;
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
                    // Procesar URL de YouTube
                    $youtube_url = trim($_POST['youtube_url'] ?? '');
                
                    if (empty($youtube_url)) {
                        throw new Exception("URL de YouTube requerida.");
                    }

                    // Validar formato de URL
                    if (!filter_var($youtube_url, FILTER_VALIDATE_URL)) {
                        throw new Exception("URL no válida.");
                    }

                    // Extraer ID del video de YouTube y convertir a embed
                    $video_id = $this->extraerIdYoutube($youtube_url);
                    if (!$video_id) {
                        throw new Exception("No se pudo extraer el ID del video de YouTube. Verifica que la URL sea correcta.");
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
    private function extraerIdYoutube($url) {
        // Patrones para diferentes formatos de URL de YouTube
        $patrones = [
            '/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]{11})/',
            '/youtube\.com\/watch\?.*v=([a-zA-Z0-9_-]{11})/',
            '/youtu\.be\/([a-zA-Z0-9_-]{11})/',
            '/youtube\.com\/embed\/([a-zA-Z0-9_-]{11})/'
        ];
    
        foreach ($patrones as $patron) {
            if (preg_match($patron, $url, $matches)) {
                return $matches[1];
            }
        }
    
        return false;
    }
}
?>
