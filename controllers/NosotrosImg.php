<?php
require_once './models/NosotrosModel.php';
require_once './config/database.php'; // Incluye el archivo de la clase Database

class NosotrosImgController {
    private $modelo;
    private $isAdmin = false;

    public function __construct() {
        $this->modelo = new NosotroslImg();
    }

    public function setAdminContext($isAdmin) {
        $this->isAdmin = $isAdmin;
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        $imagenes = $this->modelo->obtenerTodos();
        require_once './views/admin/nosotrosImg.php';
    }

    public function ver($id) {
        $imagen = $this->modelo->obtenerNosotrosImgPorId($id);
        require_once './views/admin/nosotrosImg.php';
    }

    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imagen = $_FILES['nombre_imagen']; // Obtiene el archivo de la imagen
            if ($this->modelo->agregarNosotrosImg($imagen)) {
                header('Location: index.php?action=nosotrosimg');
                exit();
            } else {
                // Manejar el error de subida de imagen (mostrar un mensaje, redirigir, etc.)
                echo "Error al subir la imagen."; //TODO
            }
        } else {
            require_once './views/admin/nosotrosImg.php';
        }
    }

    public function editar($id) {
        $imagen = $this->modelo->obtenerNosotrosImgPorId($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nuevaImagen = $_FILES['nombre_imagen'];
            if ($this->modelo->actualizarNosotrosImg($id, $nuevaImagen)) {
                header('Location: index.php?action=nosotrosimg');
                exit();
            } else {
                echo "Error al actualizar la imagen"; //TODO
            }
        } else {
            require_once './views/admin/nosotrosImg.phpp';
        }
    }

    public function eliminar($id) {
        $this->modelo->eliminarNosotrosImg($id);
        header('Location: index.php?action=nosotrosimg');
        exit();
    }
}