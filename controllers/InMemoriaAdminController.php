<?php
require_once 'models/EnMemoria.php';

class InMemoriaAdminController {
    private $model;
    
    public function __construct() {
        $this->model = new EnMemoria();
    }
    
    // Muestra la lista completa de registros en memoria y el formulario para crear/editar (vista única)
    public function index() {
        $items = $this->model->getAll();
        require_once 'views/admin/editar_in_memoria.php';
    }
    
    // Carga los datos para editar un registro en memoria (incluye imágenes)
    public function editar($id) {
        $item = $this->model->getById($id);
        $imagenes = $this->model->obtenerImagenes($id);
        require_once 'views/admin/editar_in_memoria.php';
    }
    
    // Guarda un nuevo registro o actualiza uno existente y procesa la subida de imágenes
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $titulo = $_POST['titulo'];
            $subtitulo = $_POST['subtitulo'];
            $descripcion = $_POST['descripcion'];
            
            if (empty($_POST['id'])) {
                // Crear registro
                $item_id = $this->model->guardar($titulo, $subtitulo, $descripcion);
            } else {
                // Actualizar registro existente
                $id = $_POST['id'];
                $this->model->actualizar($id, $titulo, $subtitulo, $descripcion);
                $item_id = $id;
            }
            
            // Procesa la subida de imágenes
            if (isset($_FILES['imagenes']) && $_FILES['imagenes']['error'][0] == 0) {
                $uploadDir = 'views/assets/img/in_memoria/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                foreach ($_FILES['imagenes']['name'] as $key => $nombreImagen) {
                    $tmpName = $_FILES['imagenes']['tmp_name'][$key];
                    $extension = pathinfo($nombreImagen, PATHINFO_EXTENSION);
                    $uniqueName = uniqid() . '.' . $extension;
                    $uploadFile = $uploadDir . $uniqueName;
                    if (move_uploaded_file($tmpName, $uploadFile)) {
                        $this->model->insertarImagen($item_id, $uniqueName);
                    }
                }
            }
            header('Location: index.php?controller=inMemoriaAdmin&action=index');
            exit;
        }
    }
    
    // Elimina un registro en memoria y todas sus imágenes asociadas
    public function eliminar($id) {
        $this->model->eliminar($id);
        header('Location: index.php?controller=inMemoriaAdmin&action=index');
        exit;
    }
    
    // Elimina una imagen individual asociada a un registro en memoria
    public function eliminarImagen() {
        if (isset($_GET['imagen_id']) && isset($_GET['item_id'])) {
            $imagen_id = $_GET['imagen_id'];
            $this->model->eliminarImagen($imagen_id);
            header('Location: index.php?controller=inMemoriaAdmin&action=editar&id=' . $_GET['item_id']);
            exit;
        } else {
            header('Location: index.php?controller=inMemoriaAdmin&action=index');
            exit;
        }
    }
}
?>
