<?php
require_once './models/Nosotros.php';
require_once './config/database.php'; // Incluye el archivo de la clase Database

class NosotrosController {
    private $modelo;
    private $isAdmin = false;

    public function __construct() {
        $this->modelo = new NosotrosAdmin();
    }

     public function setAdminContext($isAdmin) {
        $this->isAdmin = $isAdmin;
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        $nosotrosItems = $this->modelo->obtenerTodos();
        require_once './views/admin/sobrenosotros.php';
    }

    public function ver($id) {
        $nosotrosItem = $this->modelo->obtenerNosotrosPorId($id);
        require_once './views/admin/sobrenosotros.php';
    }

    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $mision = $_POST['mision'];
            $vision = $_POST['vision'];

            $this->modelo->agregarNosotros($titulo, $descripcion,  $mision, $vision);
            header('Location: index.php?action=nosotros');
            exit();
        } else {
            require_once './views/admin/sobrenosotros.php';
        }
    }

    public function editar($id) {
        $nosotrosItem = $this->modelo->obtenerNosotrosPorId($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $mision = $_POST['mision'];
            $vision = $_POST['vision'];

            $this->modelo->actualizarNosotros($id, $titulo, $descripcion, $mision, $vision);
            header('Location: index.php?action=nosotros');
            exit();
        } else {
            require_once './views/admin/sobrenosotros.php';
        }
    }

    public function eliminar($id) {
        $this->modelo->eliminarCarrusel($id);
        header('Location: index.php?action=nosotros');
        exit();
    }
}
?>