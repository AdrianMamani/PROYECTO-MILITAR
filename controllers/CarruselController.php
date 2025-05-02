<?php
require_once './models/CarruselModel.php';
require_once './config/database.php'; // Incluye el archivo de la clase Database

class CarruselController {
    private $modelo;
    private $isAdmin = false;

    public function __construct() {
        $this->modelo = new Carrusel();
    }

     public function setAdminContext($isAdmin) {
        $this->isAdmin = $isAdmin;
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        $carruselItems = $this->modelo->obtenerTodos();
        require_once './views/admin/carrusel.php';
    }

    public function ver($id) {
        $carruselItem = $this->modelo->obtenerCarruselPorId($id);
        require_once './views/admin/carrusel.php';
    }

    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];

            $this->modelo->agregarCarrusel($titulo, $descripcion);
            header('Location: index.php?action=carrusel');
            exit();
        } else {
            require_once './views/admin/carrusel.php';
        }
    }

    public function editar($id) {
        $carruselItem = $this->modelo->obtenerCarruselPorId($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];

            $this->modelo->actualizarCarrusel($id, $titulo, $descripcion);
            header('Location: index.php?action=carrusel');
            exit();
        } else {
            require_once './views/admin/carrusel.php';
        }
    }

    public function eliminar($id) {
        $this->modelo->eliminarCarrusel($id);
        header('Location: index.php?action=carrusel');
        exit();
    }
}
?>