<?php
require_once './models/EmprendimientoModel.php';
require_once './config/database.php'; // Incluye el archivo de la clase Database

class EmprendimientoController {
    private $modelo;
    private $isAdmin = false;

    public function __construct() {
        $this->modelo = new Emprendimiento();
    }

     public function setAdminContext($isAdmin) {
        $this->isAdmin = $isAdmin;
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        $carruselItems = $this->modelo->obtenerTodos();
        require_once './views/admin/emprendimiento.php';
    }

    public function ver($id) {
        $carruselItem = $this->modelo->obtenerEmprendimientoPorId($id);
        require_once './views/admin/emprendimiento.php';
    }

    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre_emprendimiento = $_POST['nombre_emprendimiento'];
            $contacto = $_POST['contacto'];
            $ubicacion = $_POST['ubicacion'];
            $descripcion = $_POST['descripcion'];
            $subdescripcion = $_POST['subdescripcion'];

            $this->modelo->agregarEmprendimiento($nombre_emprendimiento, $contacto, $ubicacion, $descripcion, $subdescripcion);
            header('Location: index.php?action=emprendimiento');
            exit();
        } else {
            require_once './views/admin/emprendimiento.php';
        }
    }

    public function editar($id) {
        $carruselItem = $this->modelo->obtenerEmprendimientoPorId($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre_emprendimiento = $_POST['nombre_emprendimiento'];
            $contacto = $_POST['contacto'];
            $ubicacion = $_POST['ubicacion'];
            $descripcion = $_POST['descripcion'];
            $subdescripcion = $_POST['subdescripcion'];

            $this->modelo->actualizarEmprendimiento($id, $nombre_emprendimiento, $contacto, $ubicacion, $descripcion, $subdescripcion);
            header('Location: index.php?action=emprendimiento');
            exit();
        } else {
            require_once './views/admin/emprendimiento.php';
        }
    }

    public function eliminar($id) {
        $this->modelo->eliminarEmprendimiento($id);
        header('Location: index.php?action=emprendimiento');
        exit();
    }

    public function mostrarPublico() {
        $carruselItems = $this->modelo->obtenerTodos();
        require_once './views/web/carrusel/mostrar.php';
    }
}
?>