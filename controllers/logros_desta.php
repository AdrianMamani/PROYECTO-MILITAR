<?php
require_once './models/logro_destacados.php';
require_once './config/database.php';

class LogrosDestacadoController {
    private $modelo;
    private $isAdmin = false;

    public function __construct() {
        $this->modelo = new Logros_descatado(); // Usamos el modelo correcto
    }

    public function setAdminContext($isAdmin) {
        $this->isAdmin = $isAdmin;
    }

    public function index() {
        $this->listar();
    }

    // Mostrar todos los eventos
    public function listar() {
        $eventos = $this->modelo->obtenerTodos();
        require_once './views/admin/logro_destacado.php'; // Vista para mostrar listado
    }

    // Ver un evento específico
    public function ver($id) {
        $evento = $this->modelo->obtenerLogroPorId($id);
        require_once './views/admin/logro_destacado.php'; // Puedes diferenciar vista con una variable
    }

    // Agregar un evento
    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo    = $_POST['titulo'];
            $fecha     = $_POST['fecha'];
            $descripcion = $_POST['descripcion'] ?? '';

            $this->modelo->agregarLogro($titulo, $fecha,$descripcion);
            header('Location: index.php?action=logrodestacado');
            exit();
        } else {
            require_once './views/admin/logro_destacado.php'; // Formulario de agregar
        }
    }

    // Editar un evento existente
    public function editar($id) {
        $evento = $this->modelo->obtenerLogroPorId($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo    = $_POST['titulo'];
            $fecha     = $_POST['fecha'];
            $descripcion = $_POST['descripcion'] ?? '';

            $this->modelo->actualizarLogro($id, $titulo, $fecha, $descripcion);
            header('Location: index.php?action=evento');
            exit();
        } else {
            require_once './views/admin/logro_destacado.php'; // Formulario de editar
        }
    }
    public function actualizar() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id        = $_POST['id'];
        $titulo    = $_POST['titulo'];
        $fecha     = $_POST['fecha'];
        $descripcion = $_POST['descripcion'] ?? '';
 

        $this->modelo->actualizarLogro($id, $titulo, $fecha, $descripcion);
        header('Location: index.php?action=logrodestacado');
        exit();
    }
}

    // Eliminar un evento
    public function eliminar($id) {
        $this->modelo->eliminarLogro($id);
        header('Location: index.php?action=logrodestacado');
        exit();
    }
}