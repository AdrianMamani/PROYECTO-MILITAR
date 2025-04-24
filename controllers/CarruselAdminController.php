<?php
require_once 'models/Carrusel.php';

class CarruselAdminController {
    private $model;
    
    public function __construct() {
        $this->model = new Carrusel();
    }
    
    // Muestra la lista de slides y el formulario para crear/editar en una misma vista
    public function index() {
        $slides = $this->model->getAll();
        require_once 'views/admin/editar_carrusel.php';
    }
    
    // Carga los datos para editar un slide y lo envía a la vista
    public function editar($id) {
        $slide = $this->model->getById($id);
        require_once 'views/admin/editar_carrusel.php';
    }
    
    // Guarda un nuevo slide o actualiza uno existente y procesa la subida de imagen
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $titulo     = $_POST['titulo'];
            $subtitulo  = $_POST['subtitulo'];
            $descripcion= $_POST['descripcion'];
            
            // Manejar la subida de imagen
            $imagenNombre = null;
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
                $uploadDir = 'views/assets/img/carrusel/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                $extension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
                $imagenNombre = uniqid() . '.' . $extension;
                $uploadFile = $uploadDir . $imagenNombre;
                move_uploaded_file($_FILES['imagen']['tmp_name'], $uploadFile);
            }
            
            if (empty($_POST['id'])) {
                // Crear slide
                $this->model->guardar($titulo, $subtitulo, $descripcion, $imagenNombre);
            } else {
                // Actualizar slide
                $id = $_POST['id'];
                $this->model->actualizar($id, $titulo, $subtitulo, $descripcion, $imagenNombre);
            }
            header('Location: index.php?controller=carruselAdmin&action=index');
            exit;
        }
    }
    
    // Elimina un slide; si solo queda uno, no se elimina
    public function eliminar($id) {
        if ($this->model->countAll() <= 1) {
            echo "No se puede eliminar el último slide.";
            exit;
        }
        $this->model->eliminar($id);
        header('Location: index.php?controller=carruselAdmin&action=index');
        exit;
    }
}
?>
