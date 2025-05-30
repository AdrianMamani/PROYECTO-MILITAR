<?php
require_once __DIR__ . '/../../models/Evento.php';
require_once __DIR__ . '/../../models/evento_img.php';
require_once __DIR__ . '/../../models/evento_video.php';

class EventosPublicosController {
    private $eventoModel;
    private $imagenModel;
    private $videoModel;

    public function __construct() {
        $this->eventoModel = new Evento();
        $this->imagenModel = new ImagenEventoModel();
        $this->videoModel = new VideoEventoModel();
    }

    public function index() {
    $eventos = $this->eventoModel->obtenerTodos();
    $imagenes = $this->imagenModel->getAll();

    foreach ($eventos as &$evento) {
        $evento['imagen'] = '01.png'; // Imagen por defecto

        foreach ($imagenes as $img) {
            if ($img['evento_id'] == $evento['id']) {
                $evento['imagen'] = $img['nombre_imagen']; // Primera imagen del evento
                break;
            }
        }
    }
    unset($evento); // ¡Buena práctica al usar referencias!

    include './views/evento.php';
}
    public function ver($id) {
        $evento = $this->eventoModel->obtenerEventoPorId($id);

        // Filtrar imágenes y videos solo de este evento
        $imagenes = array_filter($this->imagenModel->getAll(), function($img) use ($id) {
            return $img['evento_id'] == $id;
        });

        $videos = array_filter($this->videoModel->getAll(), function($vid) use ($id) {
            return $vid['evento_id'] == $id;
        });

        include './views/evento_id.php';
    }
}