<?php
require_once 'models/NoticiaAdmin.php';

class NoticiaAdminController {
    private $model;
    
    public function __construct() {
        $this->model = new NoticiaAdmin();
    }
    
    // Muestra la lista de noticias y el formulario para crear/editar (vista única)
    public function index() {
        $noticias = $this->model->getAll();
        require_once 'views/admin/editar_noticias.php';
    }

    
    
    // Muestra el formulario para editar una noticia (con sus imágenes)
    public function editar($id) {
        $noticia = $this->model->getById($id);
        $imagenes = $this->model->obtenerImagenes($id);
        require_once 'views/admin/editar_noticias.php';
    }
    
    // Guarda una nueva noticia o actualiza una existente y procesa la subida de imágenes
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $titulo = $_POST['titulo'];
            $subtitulo = $_POST['subtitulo'];
            $descripcion = $_POST['descripcion'];
            
            if (empty($_POST['id'])) {
                // Crear nueva noticia
                $noticia_id = $this->model->guardar($titulo, $subtitulo, $descripcion);
            } else {
                // Actualizar noticia existente
                $id = $_POST['id'];
                $this->model->actualizar($id, $titulo, $subtitulo, $descripcion);
                $noticia_id = $id;
            }
            
            // Procesa la subida de múltiples imágenes
            if (isset($_FILES['imagenes']) && $_FILES['imagenes']['error'][0] == 0) {
                $uploadDir = 'views/assets/img/noticias/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                foreach ($_FILES['imagenes']['name'] as $key => $nombreImagen) {
                    $tmpName = $_FILES['imagenes']['tmp_name'][$key];
                    $extension = pathinfo($nombreImagen, PATHINFO_EXTENSION);
                    $uniqueName = uniqid() . '.' . $extension;
                    $uploadFile = $uploadDir . $uniqueName;
                    if (move_uploaded_file($tmpName, $uploadFile)) {
                        $this->model->insertarImagen($noticia_id, $uniqueName);
                    }
                }
            }
            header('Location: index.php?controller=noticiaAdmin&action=index');
            exit;
        }
    }
    
    // Elimina una noticia y todas sus imágenes asociadas
    public function eliminar($id) {
        $this->model->eliminar($id);
        header('Location: index.php?controller=noticiaAdmin&action=index');
        exit;
    }
    
    // Elimina una imagen individual asociada a una noticia
    public function eliminarImagen() {
        if (isset($_GET['imagen_id']) && isset($_GET['noticia_id'])) {
            $imagen_id = $_GET['imagen_id'];
            $this->model->eliminarImagen($imagen_id);
            header('Location: index.php?controller=noticiaAdmin&action=editar&id=' . $_GET['noticia_id']);
            exit;
        } else {
            header('Location: index.php?controller=noticiaAdmin&action=index');
            exit;
        }
    }
}
?>
