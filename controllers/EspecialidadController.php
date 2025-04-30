<?php
require_once './models/EspecialidadModel.php';
require_once './config/database.php'; // Asegúrate de que esta ruta sea correcta

class EspecialidadController {
    private $modelo;
    private $isAdmin = false;

    public function __construct() {
        $this->modelo = new Especialidad();
    }

    public function setAdminContext($isAdmin) {
        $this->isAdmin = $isAdmin;
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        $especialidadItems = $this->modelo->obtenerTodos();
        require_once './views/admin/especialidad.php'; 
    }

    public function ver($id) {
        $especialidadItems = $this->modelo->obtenerPorId($id);
        require_once './views/admin/especialidad.php'; 
    }

    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];

            $this->modelo->agregarEspecialidad($nombre, $descripcion);
            header('Location: index.php?action=especialidad');
            exit();
        } else {
            require_once './views/admin/especialidad.php'; 
        }
    }

    public function editar($id) {
        $especialidadItems = $this->modelo->obtenerPorId($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];

            $this->modelo->actualizarEspecialidad($id, $nombre, $descripcion);
            header('Location: index.php?action=especialidad');
            exit();
        } else {
            require_once './views/admin/especialidad.php'; 
        }
    }

    public function eliminar($id) {
        $this->modelo->eliminarEspecialidad($id);
        header('Location: index.php?action=especialidad');
        exit();
    }

    public function mostrarPublico() {
        $especialidadItems = $this->modelo->obtenerTodos();
        require_once './views/web/especialidades/mostrar.php';
    }
}
?>