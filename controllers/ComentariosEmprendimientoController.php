<?php
require_once './models/ComentarioEmprendimientoModel.php';
require_once './config/database.php';

class ComentariosEmprendimientoController {
    private $modelo;
    private $isAdmin = false;

    public function __construct() {
        $this->modelo = new ComentarioEmprendimiento();
    }

    public function setAdminContext($isAdmin) {
        $this->isAdmin = $isAdmin;
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        $comentarios = $this->modelo->obtenerTodos();

        $emprendimientoModel = new Emprendimiento(); 
        $emprendimientos = $emprendimientoModel->obtenerTodos();
        require_once './views/admin/emprendimiento_comentarios.php';
    }

    public function ver($id) {
        $comentarioModel_emprendimiento = $this->modelo->obtenerComentarioPorId($id);
        require_once './views/admin/emprendimiento_comentarios.php';
    }

    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comentario_id = $_POST['comentario_id'];
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $mensaje = $_POST['mensaje'];

            $this->modelo->agregarComentario($comentario_id, $nombre, $correo, $mensaje);
            header('Location: index.php?action=emprendimiento_comentarios');
            exit();
        } else {
            require_once './views/admin/emprendimiento_comentarios.php';
        }
    }

    public function editar($id) {
        $comentario_emprendimiento = $this->modelo->obtenerComentarioPorId($id);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comentario_id = $_POST['comentario_id'];
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $mensaje = $_POST['mensaje'];

            $this->modelo->actualizarComentario($id, $comentario_id, $nombre, $correo, $mensaje);
            header('Location: index.php?action=emprendimiento_comentarios');
            exit();
        } else {
        $emprendimientoModel = new Emprendimiento();
        $emprendimientos = $emprendimientoModel->obtenerTodos();
            require_once './views/admin/emprendimiento_comentarios.php';
        }
    }

    public function eliminar($id) {
        $this->modelo->eliminarComentario($id);
        header('Location: index.php?action=emprendimiento_comentarios');
        exit();
    }

    public function mostrarPublico() {
        $comentarios = $this->modelo->obtenerTodos();
        require_once './views/web/emprendimiento/mostrar.php';
    }
}