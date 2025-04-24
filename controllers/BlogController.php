<?php
require_once 'models/Blog.php';

class BlogController {
    private $model;

    public function __construct() {
        $this->model = new Blog();
    }

    public function index() {
        $blogs = $this->model->getAll();
        require_once 'views/blog.php';
    }

    public function detalle($id) {
        // Obtener el blog y sus imágenes asociadas
        $blog = $this->model->getById($id);
        $imagenes = $this->model->obtenerImagenes($id);
        require_once 'views/detalle_blog.php';
    }
}
?>
