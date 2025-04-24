<?php
require_once 'models/Comentario.php';

class ComentarioAdminController {
    private $comentarioModel;

    public function __construct() {
        $this->comentarioModel = new Comentario();
    }

    // Mostrar comentarios en el panel de administración
    public function index() {
        $comentarios = $this->comentarioModel->getAll();
        require_once 'views/admin/editar_comentario.php'; // Vista de administración donde se ven los comentarios
    }

    // Agregar un comentario desde el panel de administración
    public function agregar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $titulo = $_POST['titulo'] ?? '';
            $subtitulo = $_POST['subtitulo'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';

            if (!empty($titulo) && !empty($subtitulo) && !empty($descripcion)) {
                $this->comentarioModel->add($titulo, $subtitulo, $descripcion);
            }
        }
        header("Location: index.php?controller=comentarioadmin&action=index");
    }

    // Eliminar un comentario desde el panel de administración
    public function eliminar($id) {
        $this->comentarioModel->delete($id);
        header("Location: index.php?controller=comentarioadmin&action=index");
    }
}
?>
