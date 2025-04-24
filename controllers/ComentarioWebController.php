<?php
require_once 'models/Comentario.php';

class ComentarioWebController {
    private $comentarioModel;

    public function __construct() {
        $this->comentarioModel = new Comentario();
    }

    // Mostrar comentarios en la web
    public function index() {
        $comentarios = $this->comentarioModel->getAll();
        require_once 'views/comunidad/index.php'; // Vista principal donde se ven los comentarios
    }

    // Agregar un comentario desde la web
    public function agregar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $titulo = $_POST['titulo'] ?? '';
            $subtitulo = $_POST['subtitulo'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';

            if (!empty($titulo) && !empty($subtitulo) && !empty($descripcion)) {
                $this->comentarioModel->add($titulo, $subtitulo, $descripcion);
            }
        }
        header("Location: index.php?controller=comentarioweb&action=index");
    }
}
?>
