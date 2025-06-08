<?php
require_once './models/logro_destacados.php';
require_once './models/logro_img.php';
require_once './models/LogroVideoModel.php';

class LogrosControllerWeb {
    private $logrosModel;
    private $imagenesModel;
    private $videosModel;

    public function __construct() {
        $this->logrosModel = new Logros_descatado();
        $this->imagenesModel = new ImagenLogroModel();
        $this->videosModel = new LogroVideoModel();
    }

    // Obtener todos los logros con sus imágenes y videos asociados
    public function index() {
        $logros = $this->logrosModel->obtenerTodos();
        
        // Para optimizar, obtener todas imágenes y videos, y luego agrupar por logro_id
        $imagenes = $this->imagenesModel->getAll();
        $videos = $this->videosModel->getAll();

        // Agrupar imágenes por logro_id
        $imagenesPorLogro = [];
        foreach ($imagenes as $img) {
            $imagenesPorLogro[$img['logro_id']][] = $img;
        }

        // Agrupar videos por logro_id
        $videosPorLogro = [];
        foreach ($videos as $vid) {
            $videosPorLogro[$vid['logro_id']][] = $vid;
        }

        // Ahora puedes pasar estas 3 variables a la vista para mostrar todo
        require './views/logros.php';
    }

    // También puedes agregar otros métodos para CRUD si quieres
}
