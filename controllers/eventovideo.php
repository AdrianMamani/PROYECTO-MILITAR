<?php
require_once './models/evento_video.php';
require_once './config/database.php';

class VideoEventoController {
    private $model;

    public function __construct() {
        $this->model = new VideoEventoModel();
    }

    // Mostrar todos los videos
    public function index() {
        $videos  = $this->model->getAll();
        $eventos = $this->model->getEventos();
        require_once './views/admin/videoevento.php';
    }

    // Mostrar formulario para agregar video
    public function create() {
        $eventos = $this->model->getEventos();
        require_once './views/admin/videoevento.php';
    }

    // Guardar nuevo video
    public function store() {
        if (isset($_POST['evento_id'], $_POST['codigo_video'])) {
            $evento_id     = $_POST['evento_id'];
            $codigo_video  = trim($_POST['codigo_video']);

            if ($codigo_video !== '') {
                $this->model->add($evento_id, $codigo_video);
            }
        }

        header('Location: index.php?action=videoevento/index');
        exit;
    }

    // Mostrar formulario para editar video
    public function edit() {
        $id      = $_GET['id'] ?? null;
        $video   = $this->model->getById($id);
        $eventos = $this->model->getEventos();
        require_once './views/admin/videoevento.php';
    }

    // Actualizar video
    public function update() {
        if (isset($_POST['id'], $_POST['codigo_video'])) {
            $id            = $_POST['id'];
            $codigo_video  = trim($_POST['codigo_video']);

            if ($codigo_video !== '') {
                $this->model->update($id, $codigo_video);
            }
        }

        header('Location: index.php?action=videoevento/index');
        exit;
    }

    // Eliminar video
    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->model->delete($id);
        }

        header('Location: index.php?action=videoevento/index');
        exit;
    }
}