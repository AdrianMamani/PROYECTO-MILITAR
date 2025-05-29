<?php
require_once __DIR__ . '/../../models/Evento.php';

class EventosPublicosController {
    private $eventoModel;

    public function __construct() {
        $this->eventoModel = new Evento();
    }

    public function index() {
        $eventos = $this->eventoModel->obtenerTodos();
        include './views/evento.php';  // Ajusta según tu estructura
    }

    public function ver($id) {
        $evento = $this->eventoModel->obtenerEventoPorId($id);
        include './views/evento_id.php';
    }
}