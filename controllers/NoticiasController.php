<?php
require_once './models/NoticiasModel.php';

class NoticiasController {
    private $modelo;

    public function __construct() {
        $this->modelo = new NoticiasModel();
    }

    // MÉTODO PRINCIPAL - Lista todas las noticias (punto de entrada)
    public function listar() {
        try {
            $noticias = $this->modelo->obtenerTodasLasNoticias();
            require_once './views/admin/lista-noticias.php';
        } catch (Exception $e) {
            echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
        }
    }

    // Mostrar formulario de gestión (desde la lista)
    public function index() {
        try {
            $noticias = $this->modelo->obtenerTodasLasNoticias();
            require_once './views/admin/lista-noticias.php';
        } catch (Exception $e) {
            echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
        }
    }

    // MÉTODO PARA AJAX - Obtener detalles de una noticia
    public function detalle() {
        header('Content-Type: application/json');
        
        try {
            $id = $_GET['id'] ?? 0;
            
            if (!$id) {
                throw new Exception("ID de noticia requerido.");
            }

            $noticia = $this->modelo->obtenerNoticiaPorId($id);
            
            if (!$noticia) {
                throw new Exception("Noticia no encontrada.");
            }

            // Obtener imágenes y videos
            $imagenes = $this->modelo->obtenerImagenesNoticia($id);
            $videos = $this->modelo->obtenerVideosNoticia($id);

            $response = [
                'success' => true,
                'noticia' => $noticia,
                'imagenes' => $imagenes,
                'videos' => $videos
            ];

            echo json_encode($response);
            exit;

        } catch (Exception $e) {
            $response = [
                'success' => false,
                'message' => $e->getMessage()
            ];
            echo json_encode($response);
            exit;
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
                    // Redirigir a página de confirmación con opciones
                    header('Location: index.php?action=noticias/creada&id=' . $noticia_id);
                    exit;
                } else {
                    throw new Exception("No se pudo crear la noticia.");
                }
            } catch (Exception $e) {
                echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
                require_once './views/admin/crear_noticia.php';
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
            echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
        }
    }

    // Mostrar formulario de edición
    public function editar() {
        $id = func_get_args()[0] ?? 0;
        
        try {
            $noticia = $this->modelo->obtenerNoticiaPorId($id);
            if (!$noticia) {
                throw new Exception("Noticia no encontrada.");
            }
            
            require_once './views/admin/editar-noticia.php';
        } catch (Exception $e) {
            echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
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
                // CORREGIR LA URL DE REDIRECT
                header('Location: index.php?action=lista-noticias');
                exit;
            } else {
                throw new Exception("No se pudo actualizar la noticia.");
            }
        } catch (Exception $e) {
            echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
            // En caso de error, recargar la vista de edición con los datos
            $noticia = [
                'id' => $_POST['id'], 
                'titulo' => $_POST['titulo'], 
                'subtitulo' => $_POST['subtitulo'], 
                'descripcion' => $_POST['descripcion']
            ];
            require_once './views/admin/editar_noticia.php';
        }
    }
}

    // Eliminar noticia
    public function eliminar() {
        $id = func_get_args()[0] ?? 0;
        
        try {
            $resultado = $this->modelo->eliminarNoticia($id);
            
            if ($resultado) {
                header('Location: index.php?action=lista-noticias/index');
                exit;
            } else {
                throw new Exception("No se pudo eliminar la noticia.");
            }
        } catch (Exception $e) {
            echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
        }
    }
}
?>