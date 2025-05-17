<?php
require_once __DIR__ . '/../models/Aportacion.php';

class AportacionController {
    private $model;

    public function __construct() {
        $this->model = new AportacionesModel();
    }

    public function index() {
        $emprendimientos = $this->model->getAll();
        require_once __DIR__ . '/../views/admin/aportaciones.php';
    }

    public function getAportaciones($id) {
        header('Content-Type: application/json');
        $emprendimiento = $this->model->getById($id);
        echo json_encode($emprendimiento);
        exit();
    }
}
?>