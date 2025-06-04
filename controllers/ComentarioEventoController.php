<?php
require_once './models/ComentarioEventoModel.php';
require_once './config/database.php';

class ComentarioEventoController {
    private $modelo;

    public function __construct() {
        $this->modelo = new ComentarioEvento();
    }

    public function index() {
    require_once './models/ComentarioEventoModel.php';
    $eventoModel = new Evento();
    $eventos = $eventoModel->obtenerTodos(); // Este método debe devolver id y nombre

    $comentarios = $this->modelo->obtenerTodosConNombreEvento(); // Para mostrar los comentarios
    require_once './views/admin/comentario_evento.php';
}

    public function ver($id) {
        $comentario = $this->modelo->obtenerPorId($id);
        require_once './views/admin/comentario_evento.php';
    }

    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $evento_id      = $_POST['evento_id'];
            $nombre_usuario = $_POST['nombre_usuario'];
            $comentario     = $_POST['comentario'];

            $this->modelo->agregar($evento_id, $nombre_usuario, $comentario);
            header('Location: index.php?action=comentarioevento&evento_id=' . $evento_id);
            exit();
        } else {
            require_once './views/admin/comentario_evento.php';
        }
    }

    public function editar($id) {
        $comentario = $this->modelo->obtenerPorId($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre_usuario = $_POST['nombre_usuario'];
            $comentarioTexto = $_POST['comentario'];

            $this->modelo->editar($id, $nombre_usuario, $comentarioTexto);
            header('Location: index.php?action=comentarioevento');
            exit();
        } else {
            require_once './views/admin/comentario_evento.php';
        }
    }

    // Este método ya no es necesario si usas editar() directamente con id
    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id             = $_POST['id'];
            $nombre_usuario = $_POST['nombre_usuario'];
            $comentario     = $_POST['comentario'];

            $this->modelo->editar($id, $nombre_usuario, $comentario);
            header('Location: index.php?action=comentarioevento');
            exit();
        }
    }

    public function eliminar($id) {
        $this->modelo->eliminar($id);
        header('Location: index.php?action=comentarioevento');
        exit();
    }
}