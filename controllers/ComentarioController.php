<?php
require_once './models/ComentarioModel.php';
require_once './config/database.php'; // Incluye el archivo de la clase Database

class ComentarioController {
    private $modelo;
    private $isAdmin = false;

    public function __construct() {
        $this->modelo = new Comentario();
    }

     public function setAdminContext($isAdmin) {
        $this->isAdmin = $isAdmin;
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        $comentarioItems = $this->modelo->obtenerTodos();
        require_once './views/admin/comentarios.php';
    }

    public function ver($id) {
        $comentarioModel = $this->modelo->obtenercomentarioPorId($id);
        require_once './views/admin/comentarios.php';
    }

    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $subtitulo = $_POST['subtitulo'];
            $descripcion = $_POST['descripcion'];

            $this->modelo->agregarComentario($titulo, $subtitulo, $descripcion);
            header('Location: index.php?action=comentarios');
            exit();
        } else {
            require_once './views/admin/comentario.php';
        }
    }


    public function editar($id) {
        $comentario = $this->modelo->obtenerComentarioPorId($id);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $subtitulo = $_POST['subtitulo'];
            $descripcion = $_POST['descripcion'];

            $this->modelo->actualizarComentario($id, $titulo, $subtitulo, $descripcion);
            header('Location: index.php?action=comentarios');
            exit();
        } else {
            require_once './views/admin/comentario.php';
        }
    }


    public function eliminar($id) {
        $this->modelo->eliminarComentario($id);
        header('Location: index.php?action=comentarios');
        exit();
    }

    public function mostrarPublico() {
        $comentarioItems = $this->modelo->obtenerTodos();
        require_once './views/web/carrusel/mostrar.php';
    }
}
?>