<?php
require_once './models/NosotrosVideo.php';

class NosotrosVideoController {
    private $modelo;

    public function __construct() {
        $this->modelo = new NosotrosVideo();
    }

    public function index() {
        $videos = $this->modelo->obtenerTodos();
        require_once './views/admin/nosotrosVideo.php';
    }

    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $codigoVideo = $this->extraerCodigoVideo($_POST['url_video']);
            if ($this->modelo->agregar($codigoVideo)) {
                header('Location: index.php?action=nosotrosVideo');
                exit();
            } else {
                echo "❌ Error al agregar el video. Verifica que el código sea correcto.";
            }
        } else {
            require_once './views/admin/nosotrosVideoAgregar.php';
        }
    }

    public function editar($id) {
        $video = $this->modelo->obtenerPorId($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $codigoVideo = $this->extraerCodigoVideo($_POST['url_video']);
            if ($this->modelo->actualizar($id, $codigoVideo)) {
                header('Location: index.php?action=nosotrosVideo');
                exit();
            } else {
                echo "❌ Error al actualizar el video. Verifica que el código sea correcto.";
            }
        } else {
            require_once './views/admin/nosotrosVideoEditar.php';
        }
    }

   public function eliminar() {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = intval($_GET['id']);
        
        // Eliminar el video usando el modelo
        $modelo = new NosotrosVideo();
        $modelo->deleteVideo($id);
        
        // Redireccionar después de eliminar
        header("Location: index.php?action=nosotrosVideo");
        exit;
    } else {
        echo "Error: ID no proporcionado o inválido.";
    }
}

    private function extraerCodigoVideo($url) {
        // Solo aceptar códigos de 11 caracteres
        $codigo = trim($url);
        return strlen($codigo) === 11 ? $codigo : false;
    }
}