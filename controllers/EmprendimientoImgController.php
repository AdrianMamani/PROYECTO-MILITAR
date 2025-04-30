<?php
require_once './models/EmprendimientoImg.php';
require_once './config/database.php'; // Incluye el archivo de la clase Database

class EmprendimientoGaleriaController {
    private $model;

    public function __construct() {
        $this->model = new EmprendimientoGaleriaModel();
    }

    // GET  /index.php?action=emprendimientogaleria/index
    public function index() {
        // Obtiene todas las imágenes/videos con el nombre del emprendimiento
        $galeria       = $this->model->getAll();
        $emprendimientos = $this->model->getEnprendimiento(); // Obtener los emprendimientos para el select
        require_once './views/admin/emprendimiento_img.php'; // Vista para mostrar la galería
    }

    // GET  /index.php?action=emprendimientogaleria/create
    public function create() {
        $emprendimientos = $this->model->getEnprendimiento(); // Obtener los emprendimientos para el select
        require_once './views/admin/emprendimiento_img.php'; // Vista para agregar nuevo archivo
    }

    // POST /index.php?action=emprendimientogaleria/store
    public function store() {
        if (isset($_POST['id_emprendimiento'], $_POST['tipo_archivo'], $_FILES['archivo'])) {
            $id_emprendimiento = $_POST['id_emprendimiento'];
            $tipo_archivo = $_POST['tipo_archivo'];
            $file = $_FILES['archivo'];

            if ($tipo_archivo === 'imagen') {
                $this->model->addGaleria($id_emprendimiento, $tipo_archivo, $file);
            } elseif ($tipo_archivo === 'video') {
                // Solo el ID del video de YouTube (en el formato MPJ2wMLjYBY)
                $video_id = basename($file['name']); // Aquí se supone que el nombre del archivo contiene el video ID de YouTube
                $this->model->addGaleria($id_emprendimiento, $tipo_archivo, $video_id);
            }
        }
        header('Location: index.php?action=emprendimientoimg/index');
        exit;
    }

    // GET  /index.php?action=emprendimientogaleria/edit&id=123
    public function edit() {
        $id = $_GET['id'] ?? null;
        $galeria = $this->model->getByIdGaleria($id);
        $emprendimientos = $this->model->getEnprendimiento(); // Obtener los emprendimientos para el select
        require_once './views/admin/emprendimiento_img.php'; // Vista para editar archivo
    }

    // POST /index.php?action=emprendimientogaleria/update
    public function update() {
        if (isset($_POST['id'], $_POST['tipo_archivo'])) {
            $id = $_POST['id'];
            $tipo_archivo = $_POST['tipo_archivo'];
    
            if ($tipo_archivo === 'imagen') {
                if (isset($_FILES['imagen_archivo']) && $_FILES['imagen_archivo']['error'] === 0) {
                    $this->model->updateGaleriaGeneral($id, $tipo_archivo, $_FILES['imagen_archivo']);
                } else {
                    // Si no se sube una nueva imagen, podrías mantener la existente
                    // O, si estás actualizando otros campos (como el nombre del emprendimiento,
                    // que no está en tu modal actual), realizar esa actualización aquí.
                    // Por ahora, si no hay nueva imagen, no se actualiza la imagen.
                    // Si necesitas actualizar otros campos, asegúrate de recibirlos y pasarlos al modelo.
                }
            } elseif ($tipo_archivo === 'video') {
                if (isset($_POST['url_archivo']) && !empty($_POST['url_archivo'])) {
                    $video_url = $_POST['url_archivo'];
                    $this->model->updateGaleriaGeneral($id, $tipo_archivo, null, $video_url);
                }
            }
        }
        header('Location: index.php?action=emprendimientoimg/index');
        exit;
    }

    // GET  /index.php?action=emprendimientogaleria/delete&id=123
    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->model->deleteGaleria($id);
        }
        header('Location: index.php?action=emprendimientoimg/index');
        exit;
    }
}
?>
