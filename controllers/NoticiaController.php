<?php
require_once 'models/Noticia.php';

class NoticiaController {
    public $noticiaModel;

    public function __construct() {
        $this->noticiaModel = new Noticia();
    }

    // Mostrar todas las noticias
    public function index() {
        $noticias = $this->noticiaModel->getAll();
        require_once 'views/noticias/index.php';
    }

    // Mostrar el detalle de una noticia, incluyendo sus imágenes
    public function detalle() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id) {
            $noticia = $this->noticiaModel->getById($id);
            // Obtener las imágenes asociadas a esta noticia
            $imagenes = $this->noticiaModel->obtenerImagenes($id);
            require_once 'views/noticias/detalle.php';
        } else {
            echo "ID no especificado.";
        }
    }
}
?>
