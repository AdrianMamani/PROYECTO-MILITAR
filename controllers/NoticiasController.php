<?php
require_once './models/NoticiasModel.php';

class NoticiasController {
    private $modelo;

    public function __construct() {
        $this->modelo = new NoticiasModel();
    }

    // Mostrar listado de noticias con información de multimedia
    public function index() {
        try {
            $noticias = $this->modelo->obtenerTodasLasNoticias();
            require_once './views/admin/lista-noticias.php';
        } catch (Exception $e) {
            $_SESSION['error'] = "Error: " . $e->getMessage();
            require_once './views/admin/lista-noticias.php';
        }
    }

    // Mostrar formulario para agregar
    public function agregar() {
        require_once './views/admin/formulario_noticias.php';
    }

    // Procesar creación de noticia
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $titulo = trim($_POST['titulo'] ?? '');
                $subtitulo = trim($_POST['subtitulo'] ?? '');
                $descripcion = trim($_POST['descripcion'] ?? '');

                if (empty($titulo) || empty($descripcion)) {
                    throw new Exception("Título y descripción son obligatorios.");
                }

                $noticia_id = $this->modelo->crearNoticia($titulo, $subtitulo, $descripcion);
                
                if ($noticia_id) {
                    $_SESSION['mensaje'] = "Noticia creada exitosamente.";
                    header('Location: index.php?action=noticias/creada&id=' . $noticia_id);
                    exit;
                } else {
                    throw new Exception("No se pudo crear la noticia.");
                }
            } catch (Exception $e) {
                $_SESSION['error'] = "Error: " . $e->getMessage();
                require_once './views/admin/formulario_noticias.php';
            }
        }
    }

    // Página de confirmación después de crear
    public function creada() {
        $id = $_GET['id'] ?? 0;
        
        try {
            $noticia = $this->modelo->obtenerNoticiaPorId($id);
            if (!$noticia) {
                throw new Exception("Noticia no encontrada.");
            }
            
            require_once './views/admin/noticia_creada.php';
        } catch (Exception $e) {
            $_SESSION['error'] = "Error: " . $e->getMessage();
            header('Location: index.php?action=noticias/index');
            exit;
        }
    }

    // Ver una noticia específica
    public function ver() {
        $id = $_GET['id'] ?? 0;
        
        try {
            $noticia = $this->modelo->obtenerNoticiaPorId($id);
            if (!$noticia) {
                throw new Exception("Noticia no encontrada.");
            }
            
            $imagenes = $this->modelo->obtenerImagenesNoticia($id);
            $videos = $this->modelo->obtenerVideosNoticia($id);
            
            require_once './views/admin/ver-noticia-completa.php';
        } catch (Exception $e) {
            $_SESSION['error'] = "Error: " . $e->getMessage();
            header('Location: index.php?action=noticias/index');
            exit;
        }
    }

    // Mostrar formulario de edición
    public function editar() {
        $id = $_GET['id'] ?? 0;
        
        try {
            $noticia = $this->modelo->obtenerNoticiaPorId($id);
            if (!$noticia) {
                throw new Exception("Noticia no encontrada.");
            }
            
            require_once './views/admin/editar-noticia.php';
        } catch (Exception $e) {
            $_SESSION['error'] = "Error: " . $e->getMessage();
            header('Location: index.php?action=noticias/index');
            exit;
        }
    }

    // Procesar actualización de noticia
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $id = $_POST['id'] ?? 0;
                $titulo = trim($_POST['titulo'] ?? '');
                $subtitulo = trim($_POST['subtitulo'] ?? '');
                $descripcion = trim($_POST['descripcion'] ?? '');
                
                if (empty($titulo) || empty($descripcion)) {
                    throw new Exception("Título y descripción son obligatorios.");
                }
                
                $resultado = $this->modelo->actualizarNoticia($id, $titulo, $subtitulo, $descripcion);
                
                if ($resultado) {
                    $_SESSION['mensaje'] = "Noticia actualizada exitosamente.";
                    header('Location: index.php?action=noticias/index');
                    exit;
                } else {
                    throw new Exception("No se pudo actualizar la noticia.");
                }
            } catch (Exception $e) {
                $_SESSION['error'] = "Error: " . $e->getMessage();
                $noticia = [
                    'id' => $_POST['id'], 
                    'titulo' => $_POST['titulo'], 
                    'subtitulo' => $_POST['subtitulo'], 
                    'descripcion' => $_POST['descripcion']
                ];
                require_once './views/admin/editar-noticia.php';
            }
        }
    }

    // Eliminar noticia
    public function eliminar() {
        $id = $_GET['id'] ?? 0;
        
        try {
            // Primero eliminar imágenes y videos asociados
            $imagenes = $this->modelo->obtenerImagenesNoticia($id);
            foreach ($imagenes as $imagen) {
                $ruta_archivo = './' . $imagen['url'];
                if (file_exists($ruta_archivo)) {
                    unlink($ruta_archivo);
                }
                $this->modelo->eliminarImagen($imagen['id']);
            }
            
            $videos = $this->modelo->obtenerVideosNoticia($id);
            foreach ($videos as $video) {
                if ($video['tipo'] === 'local') {
                    $ruta_archivo = './' . $video['url'];
                    if (file_exists($ruta_archivo)) {
                        unlink($ruta_archivo);
                    }
                }
                $this->modelo->eliminarVideo($video['id']);
            }
            
            // Luego eliminar la noticia
            $resultado = $this->modelo->eliminarNoticia($id);
            
            if ($resultado) {
                $_SESSION['mensaje'] = "Noticia eliminada exitosamente.";
            } else {
                $_SESSION['error'] = "No se pudo eliminar la noticia.";
            }
            
            header('Location: index.php?action=noticias/index');
            exit;
        } catch (Exception $e) {
            $_SESSION['error'] = "Error: " . $e->getMessage();
            header('Location: index.php?action=noticias/index');
            exit;
        }
    }

    // Obtener detalles de noticia para modal (AJAX)
    public function detalle() {
        $id = $_GET['id'] ?? 0;
        
        header('Content-Type: application/json');
        
        try {
            $noticia = $this->modelo->obtenerNoticiaPorId($id);
            if (!$noticia) {
                echo json_encode(['success' => false, 'message' => 'Noticia no encontrada']);
                return;
            }
            
            $imagenes = $this->modelo->obtenerImagenesNoticia($id);
            $videos = $this->modelo->obtenerVideosNoticia($id);
            
            echo json_encode([
                'success' => true,
                'noticia' => $noticia,
                'imagenes' => $imagenes,
                'videos' => $videos
            ]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
?>
