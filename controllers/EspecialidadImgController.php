<?php
require_once './models/EspecialidadImg.php';
require_once './config/database.php'; // Incluye el archivo de la clase Database

class ImagenEspecialidadController {
    private $model;

    public function __construct() {
        $this->model = new ImagenEspecialidadModel();
    }

    // GET  /index.php?action=especialidadimg/index
    public function index() {
        $imagenes       = $this->model->getAll();
        $especialidades = $this->model->getEspecialidades();
        require_once './views/admin/especialidad_img.php';
    }

    // GET  /index.php?action=especialidadimg/create
    public function create() {
        $especialidades = $this->model->getEspecialidades();
        require_once './views/admin/especialidad_img.php';
    }

    // POST /index.php?action=especialidadimg/store
    public function store() {
        if (isset($_POST['especialidad_id'], $_FILES['imagen'])) {
            $this->model->add($_POST['especialidad_id'], $_FILES['imagen']);
        }
        header('Location: index.php?action=especialidadimg/index');
        exit;
    }

    // GET  /index.php?action=especialidadimg/edit&id=123
    public function edit() {
        $id             = $_GET['id'] ?? null;
        $especialidades = $this->model->getEspecialidades();
        $imagen         = $this->model->getById($id);
        require_once './views/admin/especialidad_img.php';
    }

    // POST /index.php?action=especialidadimg/update
    public function update() {
        if (isset($_POST['id'], $_FILES['imagen'])) {
            $this->model->update($_POST['id'], $_FILES['imagen']);
        }
        header('Location: index.php?action=especialidadimg/index');
        exit;
    }

    // GET  /index.php?action=especialidadimg/delete&id=123
    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->model->delete($id);
        }
        header('Location: index.php?action=especialidadimg/index');
        exit;
    }
}