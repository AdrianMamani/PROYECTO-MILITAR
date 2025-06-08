<?php
require_once './models/NoticiasModel.php';

class NoticiasImgController {
    private $modelo;

    public function __construct() {
        $this->modelo = new NoticiasModel();
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
            echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
        }
    }

    // Guardar imagen
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $noticia_id = $_POST['noticia_id'] ?? 0;
                
                if (!$noticia_id) {
                    throw new Exception("ID de noticia requerido.");
                }

                // Verificar que la noticia existe
                $noticia = $this->modelo->obtenerNoticiaPorId($noticia_id);
                if (!$noticia) {
                    throw new Exception("Noticia no encontrada.");
                }

                // Procesar archivo subido
                if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
                    throw new Exception("Error al subir la imagen.");
                }

                $archivo = $_FILES['imagen'];
                $extensiones_permitidas = ['jpg', 'jpeg', 'png', 'gif'];
                $extension = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));

                if (!in_array($extension, $extensiones_permitidas)) {
                    throw new Exception("Tipo de archivo no permitido. Use: " . implode(', ', $extensiones_permitidas));
                }

                // Crear directorio si no existe
                $directorio_destino = './uploads/imagenes/';
                if (!is_dir($directorio_destino)) {
                    mkdir($directorio_destino, 0755, true);
                }

                // Generar nombre único
                $nombre_archivo = uniqid() . '_' . time() . '.' . $extension;
                $ruta_destino = $directorio_destino . $nombre_archivo;

                if (move_uploaded_file($archivo['tmp_name'], $ruta_destino)) {
                    // Obtener siguiente orden
                    $orden = $this->modelo->obtenerSiguienteOrdenImagen($noticia_id);
                    
                    // Guardar en base de datos
                    $url_relativa = 'uploads/imagenes/' . $nombre_archivo;
                    $resultado = $this->modelo->guardarImagen($noticia_id, $url_relativa, $orden);

                    if ($resultado) {
                        header('Location: index.php?action=noticiasimg/index&noticia_id=' . $noticia_id);
                        exit;
                    } else {
                        unlink($ruta_destino);
                        throw new Exception("Error al guardar la imagen en la base de datos.");
                    }
                } else {
                    throw new Exception("Error al mover el archivo subido.");
                }
            } catch (Exception $e) {
                echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
                $noticia_id = $_POST['noticia_id'] ?? 0;
                if ($noticia_id) {
                    $noticia = $this->modelo->obtenerNoticiaPorId($noticia_id);
                    $imagenes = $this->modelo->obtenerImagenesNoticia($noticia_id);
                    require_once './views/admin/imagenes.php';
                }
            }
        }
    }

    // Eliminar imagen
    public function eliminar() {
        $id = func_get_args()[0] ?? 0;
        $noticia_id = $_GET['noticia_id'] ?? 0;
        
        try {
            $imagen = $this->modelo->obtenerImagenPorId($id);
            
            if (!$imagen) {
                throw new Exception("Imagen no encontrada.");
            }

            // Eliminar archivo físico
            $ruta_archivo = './' . $imagen['url'];
            if (file_exists($ruta_archivo)) {
                unlink($ruta_archivo);
            }

            // Eliminar de base de datos
            $resultado = $this->modelo->eliminarImagen($id);
            
            if ($resultado) {
                header('Location: index.php?action=noticiasimg/index&noticia_id=' . $noticia_id);
                exit;
            } else {
                throw new Exception("No se pudo eliminar la imagen.");
            }
        } catch (Exception $e) {
            echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
        }
    }
}
?>