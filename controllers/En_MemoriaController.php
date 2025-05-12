<?php
require_once './models/En_MemoriaModel.php';
require_once './config/database.php'; // Incluye el archivo de la clase Database

class En_MemoriaController {
    private $modelo;
    private $isAdmin = false;

    public function __construct() {
        $this->modelo = new InMemoriam();
    }

     public function setAdminContext($isAdmin) {
        $this->isAdmin = $isAdmin;
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        $en_memoriaItems = $this->modelo->obtenerTodos();
        require_once './views/admin/en_memoria.php';
    }

    public function ver($id) {
        $en_memoriaModel = $this->modelo->obtenerInMemoriamPorId($id);
        require_once './views/admin/en_memoria.php';
    }

    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $subtitulo = $_POST['subtitulo'];
            $descripcion = $_POST['descripcion'];
            $imagen = $_FILES['imagen']['name'];

                    // Aquí puedes mover la imagen a una carpeta
        $rutaDestino = __DIR__ . '/../views/assets/img/en_memoria/' . $imagen;
        move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino);

            $this->modelo->agregarInMemoriam($titulo, $subtitulo, $descripcion, $imagen);
            header('Location: index.php?action=en_memoria');
            exit();
        } else {
            require_once './views/admin/en_memoria.php';
        }
    }


    public function editar($id) {
        $en_memoria = $this->modelo->obtenerInMemoriamPorId($id);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $subtitulo = $_POST['subtitulo'];
            $descripcion = $_POST['descripcion'];

            if (!empty($_FILES['imagen']['name'])) {
            $imagen = $_FILES['imagen']['name'];
            $rutaDestino = __DIR__ . '/../views/assets/img/en_memoria/' . $imagen;
            move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino);
        } else {
            $imagen = $en_memoria['imagen']; // Mantener imagen actual
        }

            $this->modelo->actualizarInMemoriam($id, $titulo, $subtitulo, $descripcion, $imagen);
            header('Location: index.php?action=en_memoria');
            exit();
        } else {
            require_once './views/admin/en_memoria.php';
        }
    }


    public function eliminar($id) {
        $this->modelo->eliminarInMemoriam($id);
        header('Location: index.php?action=en_memoria');
        exit();
    }

    public function mostrarPublico() {
        $en_memoriaItems = $this->modelo->obtenerTodos();
        require_once './views/web/carrusel/mostrar.php';
    }
}
?>