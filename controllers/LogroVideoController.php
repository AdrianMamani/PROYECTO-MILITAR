<?php
require_once './models/LogroVideoModel.php';
require_once './config/database.php';

class LogroVideoController {
    private $model;

    public function __construct() {
        $this->model = new LogroVideoModel();
    }

    // GET /index.php?action=logrovideo/index
    public function index() {
        $videos = $this->model->getAll();
        $logros = $this->model->getLogros();
        require_once './views/admin/logro_video.php'; // Vista principal de videos
    }

    // GET /index.php?action=logrovideo/create
    public function create() {
        $logros = $this->model->getLogros();
        require_once './views/admin/logro_video.php'; // Vista para agregar video
    }

    // POST /index.php?action=logrovideo/store
    public function store() {
        if (isset($_POST['logro_id'], $_POST['codigo_video'])) {
            $this->model->add($_POST['logro_id'], $_POST['codigo_video']);
        }
        header('Location: index.php?action=logrovideo/index');
        exit;
    }

    // GET /index.php?action=logrovideo/edit&id=123
    public function edit() {
        $id     = $_GET['id'] ?? null;
        $logros = $this->model->getLogros();
        $video  = $this->model->getById($id);
        require_once './views/admin/logro_video.php'; // Vista para editar video
    }

    // POST /index.php?action=logrovideo/update
    public function update() {
        if (isset($_POST['id'], $_POST['codigo_video'])) {
            $this->model->update($_POST['id'], $_POST['codigo_video']);
        }
        header('Location: index.php?action=logrovideo/index');
        exit;
    }

    // GET /index.php?action=logrovideo/delete&id=123
    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->model->delete($id);
        }
        header('Location: index.php?action=logrovideo/index');
        exit;
    }
}
