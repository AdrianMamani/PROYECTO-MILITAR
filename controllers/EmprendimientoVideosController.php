<?php
require_once './models/EmprendimientoVideosModel.php';
require_once './config/database.php';

class VideoEmprendimientoController {
    private $model;

    public function __construct() {
        $this->model = new EmprendimientoVideoModel();
    }

    // Mostrar todos los videos
    public function index() {
        $videos         = $this->model->getAll();
        $emprendimientos = $this->model->getEmprendimientos();
        require_once './views/admin/emprendimiento_video.php';
    }

    // Mostrar formulario para agregar video
    public function create() {
        $emprendimientos = $this->model->getEmprendimientos();
        require_once './views/admin/emprendimiento_video.php';
    }

    // Guardar nuevo video
    public function store() {
        if (isset($_POST['emprendimiento_id'], $_POST['codigo_video'])) {
            $emprendimiento_id = $_POST['emprendimiento_id'];
            $codigo_video      = trim($_POST['codigo_video']);

            if ($codigo_video !== '') {
                $this->model->add($emprendimiento_id, $codigo_video);
            }
        }

        header('Location: index.php?action=videoemprendimiento/index');
        exit;
    }

    // Mostrar formulario para editar video
    public function edit() {
        $id                = $_GET['id'] ?? null;
        $video             = $this->model->getById($id);
        $emprendimientos   = $this->model->getEmprendimientos();
        require_once './views/admin/emprendimiento_video.php';
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

        header('Location: index.php?action=videoemprendimiento/index');
        exit;
    }

    // Eliminar video
    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->model->delete($id);
        }

        header('Location: index.php?action=videoemprendimiento/index');
        exit;
    }
}