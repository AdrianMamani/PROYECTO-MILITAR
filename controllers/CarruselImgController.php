<?php
require_once './models/CarruselImg.php';
require_once './config/database.php'; // Incluye el archivo de la clase Database

class CarruselImgController {
    private $modelo;
    private $isAdmin = false;

    public function __construct() {
        $this->modelo = new CarruselImg();
    }

    public function setAdminContext($isAdmin) {
        $this->isAdmin = $isAdmin;
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        $imagenes = $this->modelo->obtenerTodos();
        require_once './views/admin/carrusel_img.php';
    }

    public function ver($id) {
        $imagen = $this->modelo->obtenerCarruselImgPorId($id);
        require_once './views/admin/carrusel_img.php';
    }

    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imagen = $_FILES['imagen']; // Obtiene el archivo de la imagen
            if ($this->modelo->agregarCarruselImg($imagen)) {
                header('Location: index.php?action=carruselimg');
                exit();
            } else {
                // Manejar el error de subida de imagen (mostrar un mensaje, redirigir, etc.)
                echo "Error al subir la imagen."; //TODO
            }
        } else {
            require_once './views/admin/carrusel_img.php';
        }
    }

    public function editar($id) {
        $imagen = $this->modelo->obtenerCarruselImgPorId($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nuevaImagen = $_FILES['imagen'];
            if ($this->modelo->actualizarCarruselImg($id, $nuevaImagen)) {
                header('Location: index.php?action=carruselimg');
                exit();
            } else {
                echo "Error al actualizar la imagen"; //TODO
            }
        } else {
            require_once './views/admin/carrusel_img.php';
        }
    }

    public function eliminar($id) {
        $this->modelo->eliminarCarruselImg($id);
        header('Location: index.php?action=carruselimg');
        exit();
    }
}