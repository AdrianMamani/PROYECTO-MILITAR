<?php
require_once 'models/LogroAdmin.php';

class LogroController {
    private $model;

    public function __construct() {
        $this->model = new LogroAdmin();
    }

    // Lista todos los logros (vista pública)
    public function index() {
        $logros = $this->model->getAll();
        require_once 'views/logros/index.php';
    }
    public function indexadmin() {
        $logros = $this->model->getAll();
        require_once 'views/admin/editar_logros.php';
    }

    // Muestra el detalle de un logro y sus imágenes (vista pública)
    public function detalle($id) {
        $logro = $this->model->getById($id);
        $imagenes = $this->model->obtenerImagenes($id);
        require_once 'views/logros/detalle.php';
    }
    public function eliminar() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($this->model->eliminar($id)) {
                header("Location: index.php?controller=logro&action=indexadmin&mensaje=Eliminado correctamente");
            } else {
                header("Location: index.php?controller=logro&action=indexadmin&error=No se pudo eliminar");
            }
            exit();
        }
    }

    public function guardar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = isset($_POST["id"]) && !empty($_POST["id"]) ? $_POST["id"] : null;
            $titulo = $_POST["titulo"];
            $subtitulo = $_POST["subtitulo"];
            $descripcion = $_POST["descripcion"];

            // Manejo de imágenes
            $imagenes = [];
            if (!empty($_FILES["imagenes"]["name"][0])) {
                $uploadDir = 'views/assets/img/logros/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                foreach ($_FILES["imagenes"]["tmp_name"] as $key => $tmpName) {
                    $fileName = basename($_FILES["imagenes"]["name"][$key]);
                    $filePath = $uploadDir . $fileName;

                    if (move_uploaded_file($tmpName, $filePath)) {
                        $imagenes[] = $fileName;
                    }
                }
            }

            if ($id) {
                // Editar logro existente
                $this->model->actualizar($id, $titulo, $subtitulo, $descripcion);
                
                // Si hay imágenes nuevas, agregarlas
                foreach ($imagenes as $img) {
                    $this->model->insertarImagen($id, $img);
                }
            } else {
                // Crear nuevo logro
                $logro_id = $this->model->guardar($titulo, $subtitulo, $descripcion);

                // Guardar imágenes si existen
                foreach ($imagenes as $img) {
                    $this->model->insertarImagen($logro_id, $img);
                }
            }

            // Redirigir después de guardar
            header("Location: index.php?controller=logro&action=indexadmin");
            exit();
        }
    }

    public function editar() {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $logro = $this->model->getById($id);
            require_once "views/logro/editar.php";
        } else {
            header("Location: index.php?controller=logro&action=indexadmin");
        }
    }

    public function eliminarImagen() {
        if (isset($_GET["id"])) {
            $imagen_id = $_GET["id"];
            $this->model->eliminarImagen($imagen_id);
        }
        // Redirige a la página de edición del logro después de eliminar la imagen
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
    
    
}
?>
