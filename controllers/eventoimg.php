<?php
require_once './models/evento_img.php';
require_once './config/database.php';

class ImagenEventoController {
    private $model;

    public function __construct() {
        $this->model = new ImagenEventoModel();
    }

    // GET /index.php?action=eventoimg/index
    public function index() {
        $imagenes = $this->model->getAll();
        $eventos  = $this->model->getEventos();
         require_once './views/admin/eventoimg.php'; // Asegúrate de crear esta vista
    }

    // GET /index.php?action=eventoimg/create
    public function create() {
        $eventos = $this->model->getEventos();
        require_once './views/admin/eventoimg.php';
    }

    // POST /index.php?action=eventoimg/store
    public function store() {
        if (isset($_POST['evento_id'], $_FILES['imagen'])) {
            $this->model->add($_POST['evento_id'], $_FILES['imagen']);
        }
        header('Location: index.php?action=eventoimg/index');
        exit;
    }

    // GET /index.php?action=eventoimg/edit&id=123
    public function edit() {
        $id      = $_GET['id'] ?? null;
        $eventos = $this->model->getEventos();
        $imagen  = $this->model->getById($id);
        require_once './views/admin/eventoimg.php';
    }

    // POST /index.php?action=eventoimg/update
public function update() {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Verificamos si se ha subido una imagen
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
            $this->model->update($id, $_FILES['imagen']);
        }
        // Si no se subió imagen, simplemente no se hace nada, solo redirige
    }

    header('Location: index.php?action=eventoimg/index');
    exit;
}

    // GET /index.php?action=eventoimg/delete&id=123
    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->model->delete($id);
        }
        header('Location: index.php?action=eventoimg/index');
        exit;
    }
}