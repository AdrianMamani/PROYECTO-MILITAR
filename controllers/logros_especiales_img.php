<?php
require_once './models/logro_img.php';
require_once './config/database.php';

class ImagenLogroController {
    private $model;

    public function __construct() {
        $this->model = new ImagenLogroModel();
    }

    // GET /index.php?action=logroimg/index
    public function index() {
        $imagenes = $this->model->getAll();
        $logros   = $this->model->getLogros();
        require_once './views/admin/logro_img.php'; // Vista principal de imágenes
    }

    // GET /index.php?action=logroimg/create
    public function create() {
        $logros = $this->model->getLogros();
        require_once './views/admin/logro_img.php'; // Vista para agregar imagen
    }

    // POST /index.php?action=logroimg/store
    public function store() {
        if (isset($_POST['logro_id'], $_FILES['imagen'])) {
            $this->model->add($_POST['logro_id'], $_FILES['imagen']);
        }
        header('Location: index.php?action=logroimg/index');
        exit;
    }

    // GET /index.php?action=logroimg/edit&id=123
    public function edit() {
        $id     = $_GET['id'] ?? null;
        $logros = $this->model->getLogros();
        $imagen = $this->model->getById($id);
        require_once './views/admin/logro_img.php'; // Vista para editar imagen
    }

    // POST /index.php?action=logroimg/update
    public function update() {
        if (isset($_POST['id'], $_FILES['imagen'])) {
            $this->model->update($_POST['id'], $_FILES['imagen']);
        }
        header('Location: index.php?action=logroimg/index');
        exit;
    }

    // GET /index.php?action=logroimg/delete&id=123
    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->model->delete($id);
        }
        header('Location: index.php?action=logroimg/index');
        exit;
    }
}
