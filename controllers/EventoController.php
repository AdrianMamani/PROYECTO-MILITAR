<?php
require_once './models/Evento.php';
require_once './config/database.php';

class EventoController {
    private $modelo;
    private $isAdmin = false;

    public function __construct() {
        $this->modelo = new Evento(); // Usamos el modelo correcto
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
        require_once './views/admin/evento.php'; // Vista para mostrar listado
    }

    // Ver un evento específico
    public function ver($id) {
        $evento = $this->modelo->obtenerEventoPorId($id);
        require_once './views/admin/evento.php'; // Puedes diferenciar vista con una variable
    }

    // Agregar un evento
    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo    = $_POST['titulo'];
            $fecha     = $_POST['fecha'];
            $descripcion = $_POST['descripcion'] ?? '';
            $direccion = $_POST['direccion'] ?? '';
            $latitud   = $_POST['latitud'] ?? '';
            $longitud  = $_POST['longitud'] ?? '';

            $this->modelo->agregarEvento($titulo, $fecha,$descripcion, $direccion, $latitud, $longitud);
            header('Location: index.php?action=evento');
            exit();
        } else {
            require_once './views/admin/evento.php'; // Formulario de agregar
        }
    }

    // Editar un evento existente
    public function editar($id) {
        $evento = $this->modelo->obtenerEventoPorId($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo    = $_POST['titulo'];
            $fecha     = $_POST['fecha'];
            $descripcion = $_POST['descripcion'] ?? '';
            $direccion = $_POST['direccion'] ?? '';
            $latitud   = $_POST['latitud'] ?? '';
            $longitud  = $_POST['longitud'] ?? '';

            $this->modelo->actualizarEvento($id, $titulo, $fecha, $descripcion, $direccion, $latitud, $longitud);
            header('Location: index.php?action=evento');
            exit();
        } else {
            require_once './views/admin/evento.php'; // Formulario de editar
        }
    }
    public function actualizar() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id        = $_POST['id'];
        $titulo    = $_POST['titulo'];
        $fecha     = $_POST['fecha'];
        $descripcion = $_POST['descripcion'] ?? '';
        $direccion = $_POST['direccion'] ?? '';
        $latitud   = $_POST['latitud'] ?? '';
        $longitud  = $_POST['longitud'] ?? '';

        $this->modelo->actualizarEvento($id, $titulo, $fecha, $descripcion, $direccion, $latitud, $longitud);
        header('Location: index.php?action=evento');
        exit();
    }
}

    // Eliminar un evento
    public function eliminar($id) {
        $this->modelo->eliminarEvento($id);
        header('Location: index.php?action=evento');
        exit();
    }

    // Mostrar eventos en la web pública
    public function mostrarPublico() {
        $eventos = $this->modelo->obtenerTodos();
        require_once './views/web/eventos/mostrar.php'; // Ajusta la ruta si es diferente
    }
}