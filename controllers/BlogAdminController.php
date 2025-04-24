<?php
require_once 'models/BlogAdmin.php';

class BlogAdminController {
    private $model;

    public function __construct() {
        $this->model = new BlogAdmin();
    }

    // Muestra la lista de blogs en el panel de administración
    public function index() {
        $blogs = $this->model->getAll();
        require_once 'views/admin/editar_blog.php';
    }
   
    

    // (Opcional) Si se desea una vista separada para crear, se puede implementar
    public function crear() {
        require_once 'views/admin/crear_blog.php';
    }

    // Muestra el formulario para editar un blog (se usa en el modal)
    public function editar($id) {
        $blog = $this->model->getById($id);
        // También se obtienen las imágenes asociadas para mostrarlas en el modal de edición
        $imagenes = $this->model->obtenerImagenes($id);
        require_once 'views/admin/editar_blog.php';
    }

    // Guarda un nuevo blog o actualiza uno existente y procesa la subida de imágenes
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $titulo = $_POST['titulo'];
            $subtitulo = $_POST['subtitulo'];
            $descripcion = $_POST['descripcion'];

            // Si no se envía un ID, se crea un nuevo blog; de lo contrario, se actualiza
            if (empty($_POST['id'])) {
                $blog_id = $this->model->guardar($titulo, $subtitulo, $descripcion);
            } else {
                $id = $_POST['id'];
                $this->model->actualizar($id, $titulo, $subtitulo, $descripcion);
                $blog_id = $id;
            }

            // Procesar la subida de múltiples imágenes
            if (isset($_FILES['imagenes']) && $_FILES['imagenes']['error'][0] == 0) {
                $uploadDir = 'views/assets/img/blog/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                foreach ($_FILES['imagenes']['name'] as $key => $nombreImagen) {
                    $tmpName = $_FILES['imagenes']['tmp_name'][$key];
                    $extension = pathinfo($nombreImagen, PATHINFO_EXTENSION);
                    $uniqueName = uniqid() . '.' . $extension;
                    $uploadFile = $uploadDir . $uniqueName;
                    if (move_uploaded_file($tmpName, $uploadFile)) {
                        $this->model->insertarImagen($blog_id, $uniqueName);
                    }
                }
            }
            header('Location: index.php?controller=blogadmin&action=index');
        }
    }

    // Elimina un blog y todas sus imágenes asociadas
    public function eliminar($id) {
        $this->model->eliminar($id);
        header('Location: index.php?controller=blogadmin&action=index');
    }

    // Elimina una imagen individual asociada a un blog
    public function eliminarImagen() {
        if (isset($_GET['imagen_id'])) {
            $imagen_id = $_GET['imagen_id'];
            $this->model->eliminarImagen($imagen_id);
        }
        header('Location: index.php?controller=blogadmin&action=index');
    }
}
?>
