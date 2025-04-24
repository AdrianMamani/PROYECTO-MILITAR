<?php
require_once 'models/EnMemoria.php';

class EnMemoriaController {
    private $model;
    
    public function __construct() {
        $this->model = new EnMemoria();
    }
    
    // Lista todos los registros de "En Memoria" (vista pública)
    public function index() {
        $memorias = $this->model->getAll();
        require_once 'views/en_memoria/index.php';
    }
    
    // Muestra el detalle de un registro en "En Memoria", incluyendo todas sus imágenes
    public function detalle($id) {
        $memoria = $this->model->getById($id);
        $imagenes = $this->model->obtenerImagenes($id);
        require_once 'views/en_memoria/detalle.php';
    }
}
?>
