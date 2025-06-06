<?php
require_once './models/NoticiasModel.php';

class NoticiasImgController {
    private $modelo;
    private $upload_dir = './uploads/imagenes/';

    public function __construct() {
        $this->modelo = new NoticiasModel();
        
        if (!file_exists($this->upload_dir)) {
            mkdir($this->upload_dir, 0755, true);
        }
    }

    // Vista principal de imágenes
    public function index() {
        try {
            // Si viene noticia_id, ir directo a gestión de imágenes
            if (isset($_GET['noticia_id'])) {
                $noticia_id = $_GET['noticia_id'];
                $noticia = $this->modelo->obtenerNoticiaPorId($noticia_id);
                $imagenes = $this->modelo->obtenerImagenesNoticia($noticia_id);
                
                if (!$noticia) {
                    throw new Exception("Noticia no encontrada.");
                }
                
                require_once './views/admin/gestionar-imagenes.php';
            } else {
                // Mostrar todas las noticias para seleccionar
                $noticias = $this->modelo->obtenerTodasLasNoticias();
                require_once './views/admin/selector_imagenes.php';
            }
        } catch (Exception $e) {
            $_SESSION['error'] = "Error: " . $e->getMessage();
            header('Location: index.php?action=noticias/index');
            exit;
        }
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $noticia_id = $_POST['noticia_id'] ?? 0;
                
                if (!$noticia_id) {
                    throw new Exception("ID de noticia requerido.");
                }
                
                if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
                    throw new Exception("Error al subir la imagen.");
                }
                
                $archivo_temporal = $_FILES['imagen']['tmp_name'];
                $nombre_archivo = $_FILES['imagen']['name'];
                $tamaño_archivo = $_FILES['imagen']['size'];
                
                // Validaciones
                $info_archivo = getimagesize($archivo_temporal);
                if ($info_archivo === false) {
                    throw new Exception("El archivo no es una imagen válida.");
                }
                
                if ($tamaño_archivo > 5 * 1024 * 1024) {
                    throw new Exception("El archivo es muy grande (máximo 5MB).");
                }
                
                $extensiones_permitidas = ['jpg', 'jpeg', 'png', 'gif'];
                $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));
                
                if (!in_array($extension, $extensiones_permitidas)) {
                    throw new Exception("Tipo de archivo no permitido. Use: " . implode(', ', $extensiones_permitidas));
                }
                
                // Generar nombre único
                $nombre_unico = uniqid('noticia_') . '_' . time() . '.' . $extension;
                $ruta_destino = $this->upload_dir . $nombre_unico;
                
                if (move_uploaded_file($archivo_temporal, $ruta_destino)) {
                    $url_imagen = 'uploads/imagenes/' . $nombre_unico;
                    $orden = $this->modelo->obtenerSiguienteOrdenImagen($noticia_id);
                    
                    $resultado = $this->modelo->guardarImagen($noticia_id, $url_imagen, $orden);
                    
                    if ($resultado) {
                        $_SESSION['mensaje'] = "Imagen agregada exitosamente.";
                        header('Location: index.php?action=noticiasimg/index&noticia_id=' . $noticia_id);
                        exit;
                    } else {
                        // Si falló la BD, eliminar el archivo
                        if (file_exists($ruta_destino)) {
                            unlink($ruta_destino);
                        }
                        throw new Exception("Error al guardar la imagen en la base de datos.");
                    }
                } else {
                    throw new Exception("Error al mover el archivo subido.");
                }
                
            } catch (Exception $e) {
                $_SESSION['error'] = "Error: " . $e->getMessage();
                $noticia_id = $_POST['noticia_id'] ?? 0;
                header('Location: index.php?action=noticiasimg/index&noticia_id=' . $noticia_id);
                exit;
            }
        }
    }

    public function eliminar() {
        $id = $_GET['id'] ?? 0;
        $noticia_id = $_GET['noticia_id'] ?? 0;
        
        try {
            $imagen = $this->modelo->obtenerImagenPorId($id);
            if ($imagen) {
                // Eliminar archivo físico
                $ruta_archivo = './' . $imagen['url'];
                if (file_exists($ruta_archivo)) {
                    unlink($ruta_archivo);
                }
                
                // Eliminar de base de datos
                $resultado = $this->modelo->eliminarImagen($id);
                
                if ($resultado) {
                    $_SESSION['mensaje'] = "Imagen eliminada exitosamente.";
                } else {
                    $_SESSION['error'] = "No se pudo eliminar la imagen.";
                }
            } else {
                $_SESSION['error'] = "Imagen no encontrada.";
            }
            
            header('Location: index.php?action=noticiasimg/index&noticia_id=' . $noticia_id);
            exit;
        } catch (Exception $e) {
            $_SESSION['error'] = "Error: " . $e->getMessage();
            header('Location: index.php?action=noticiasimg/index&noticia_id=' . $noticia_id);
            exit;
        }
    }
}
?>
