<?php
require_once './models/MiembrosModel.php';
require_once './config/database.php'; // Incluye el archivo de la clase Database

class MiembrosController {
    private $modelo;
    private $isAdmin = false;

    public function __construct() {
        $this->modelo = new Miembros();
    }

     public function setAdminContext($isAdmin) {
        $this->isAdmin = $isAdmin;
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        $miembroItems = $this->modelo->obtenerTodos();
        $especialidades = $this->modelo->obtenerTodas();
        require_once './views/admin/miembros.php';
    }

    public function ver($id) {
        $miembroModel = $this->modelo->obtenerMiembrosPorId($id);
        require_once './views/admin/miembros.php';
    }

public function agregar() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre        = $_POST['nombre'] ?? '';
        $descripcion   = $_POST['descripcion'] ?? '';
        $especialidad_id  = $_POST['especialidad_id'] ?? '';
        $imagen        = $_FILES['imagen']['name'] ?? '';

        if ($nombre && $descripcion && $especialidad_id && $imagen) {
            // Ruta de destino para guardar la imagen
            $rutaDestino = __DIR__ . '/../views/assets/img/miembros/' . $imagen;

            // Mover el archivo subido
            move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino);

            // Llamar al modelo para guardar en la base de datos
            $this->modelo->agregarMiembros($nombre, $descripcion, $especialidad_id, $imagen);

            // Redirigir al listado de miembros
            header('Location: index.php?action=miembros');
            exit();
        } else {
            echo "Faltan campos obligatorios.";
        }
    } else {
        require_once './views/admin/miembros.php';
    }
}



public function editar($id) {
    // Obtener datos del miembro
    $miembro = $this->modelo->obtenerMiembrosPorId($id);
    // $especialidades = $this->modelo->getMiembros(); // Cargar especialidades para el formulario

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre          = $_POST['nombre'];
        $descripcion     = $_POST['descripcion'];
        $especialidad_id = $_POST['especialidad_id'];

        // Manejar imagen
        if (!empty($_FILES['imagen']['name'])) {
            $imagen = $_FILES['imagen']['name'];
            $rutaDestino = __DIR__ . '/../views/assets/img/miembros/' . $imagen;
            move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino);
        } else {
            $imagen = $miembro['nombre_imagen']; // Mantener imagen actual
        }

        // Actualizar en la base de datos
        $this->modelo->actualizarMiembros($id, $nombre, $descripcion, $especialidad_id, $imagen);
        
        // Redirigir
        header('Location: index.php?action=miembros');
        exit();
    } else {
        require_once './views/admin/miembros.php';
    }
}



    public function eliminar($id) {
        $this->modelo->eliminarMiembros($id);
        header('Location: index.php?action=miembros');
        exit();
    }

    public function mostrarPublico() {
        $miembroItems = $this->modelo->obtenerTodos();
        require_once './views/web/carrusel/mostrar.php';
    }
}
?>