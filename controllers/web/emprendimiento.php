<?php
require_once __DIR__ . '/../../models/EmprendimientoModel.php';
require_once __DIR__ . '/../../models/EmprendimientoImg.php';
require_once __DIR__ . '/../../models/EmprendimientoVideosModel.php';

class EmprendimientoControllerWeb {
    private $emprendimientoModel;
    private $galeriaModel;
    private $videoModel;
    
    public function __construct() {
        $this->emprendimientoModel = new Emprendimiento();
        $this->galeriaModel = new ImagenEmprendimientoModel();
        $this->videoModel = new EmprendimientoVideoModel();
    }
    // para obtener todos los emprendimientos
    public function index() {
    $emprendimientoModel = new Emprendimiento();
    $galeriaModel = new ImagenEmprendimientoModel();

    $emprendimientos = $emprendimientoModel->obtenerTodos();
    $galeria = $galeriaModel->getAll();

    foreach ($emprendimientos as &$emp) {
        foreach ($galeria as $imagen) {
            if ($imagen['emprendimiento_id'] == $emp['id']) {
                // Ruta completa a la imagen
                $emp['imagen_principal'] = '/PROYECTO-MILITAR/uploads/emprendimiento/' . $imagen['nombre_imagen'];
                break;
            }
        }

        // Si no hay imagen, usar una por defecto
        if (!isset($emp['imagen_principal'])) {
            $emp['imagen_principal'] = '/PROYECTO-MILITAR/assets/img/placeholder.png'; // cambia si tienes una imagen por defecto
        }
    }

    require './views/emprendimiento.php';
    exit();
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
    public function obtenerVideosPorEmprendimiento($idEmprendimiento) {
    $todosLosVideos = $this->videoModel->getAll();
    return array_filter($todosLosVideos, function($video) use ($idEmprendimiento) {
        return $video['emprendimiento_id'] == $idEmprendimiento;
    });
}

    // Método para obtener un emprendimiento con su galería
    public function indexPersonal($id) {
    // Obtener emprendimiento por ID
    $emprendimiento = $this->emprendimientoModel->obtenerEmprendimientoPorId($id);

    // Si no existe, mostrar error
    if (!$emprendimiento) {
        echo "Emprendimiento no encontrado.";
        exit;
    }

    // Obtener galería del emprendimiento
    $galeria = $this->obtenerGaleriaPorEmprendimiento($id);
    $videos = $this->obtenerVideosPorEmprendimiento($id);


    // Puedes agregar también comentarios o videos si manejas esos módulos
    // $comentarios = $comentarioModel->obtenerPorEmprendimientoId($id);
    // $videos = $videoModel->listarPorEmprendimientoId($id);

    // Cargar vista
    require './views/emprendimiento_id.php';
    exit();
}
}