<?php
require_once __DIR__ . '/../../models/EmprendimientoModel.php';
require_once __DIR__ . '/../../models/EmprendimientoImg.php';

class EmprendimientoController {
    private $emprendimientoModel;
    private $galeriaModel;
    
    public function __construct() {
        $this->emprendimientoModel = new Emprendimiento();
        $this->galeriaModel = new ImagenEmprendimientoModel();
    }
    
    // Métodos para emprendimientos
    public function obtenerTodosEmprendimientos() {
        return $this->emprendimientoModel->obtenerTodos();
    }
    
    public function obtenerEmprendimientoDestacado() {
        $todos = $this->emprendimientoModel->obtenerTodos();
        return !empty($todos) ? $todos[0] : null;
    }
    
    public function obtenerEmprendimientoPorId($id) {
        return $this->emprendimientoModel->obtenerEmprendimientoPorId($id);
    }
    
    // Métodos para la galería
    public function obtenerGaleriaCompleta() {
        return $this->galeriaModel->getAll();
    }
    
    public function obtenerGaleriaPorEmprendimiento($idEmprendimiento) {
        $galeria = $this->galeriaModel->getAll();
        return array_filter($galeria, function($item) use ($idEmprendimiento) {
            return $item['emprendimiento_id'] == $idEmprendimiento;
        });
    }
    
    public function obtenerEmprendimientosConGaleria() {
        $emprendimientos = $this->emprendimientoModel->obtenerTodos();
        $galeria = $this->galeriaModel->getAll();
        
        foreach ($emprendimientos as &$emprendimiento) {
            $emprendimiento['galeria'] = array_filter($galeria, function($item) use ($emprendimiento) {
                return $item['emprendimiento_id'] == $emprendimiento['id'];
            });
        }
        
        return $emprendimientos;
    }
}