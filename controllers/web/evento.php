<?php
require_once __DIR__ . '/../../models/Evento.php';
require_once __DIR__ . '/../../models/evento_img.php';
require_once __DIR__ . '/../../models/evento_video.php';
require_once __DIR__ . '/../../models/ComentarioEventoModel.php'; // Asegúrate de que el nombre es correcto

class EventosPublicosController {
    private $eventoModel;
    private $imagenModel;
    private $videoModel;
    private $comentarioModel;

    public function __construct() {
        $this->eventoModel = new Evento();
        $this->imagenModel = new ImagenEventoModel();
        $this->videoModel = new VideoEventoModel();
        $this->comentarioModel = new ComentarioEvento();
    }

    // Vista principal de eventos
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
        unset($evento); // Buen hábito cuando se usa referencias

        include './views/evento.php';
    }

    // Vista de un evento por ID
    public function ver($id) {
        $evento = $this->eventoModel->obtenerEventoPorId($id);

        // Imágenes del evento
        $imagenes = array_filter($this->imagenModel->getAll(), function($img) use ($id) {
            return $img['evento_id'] == $id;
        });

        // Videos del evento
        $videos = array_filter($this->videoModel->getAll(), function($vid) use ($id) {
            return $vid['evento_id'] == $id;
        });

        // Comentarios del evento
        $comentarios = $this->comentarioModel->obtenerPorEvento($id);

        include './views/evento_id.php';
    }

    // Agregar comentario desde la vista pública
    public function agregarComentario() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $evento_id = $_POST['evento_id'] ?? null;
        $nombre = $_POST['name'] ?? '';
        $comentario = $_POST['comment'] ?? '';

        if ($evento_id && $nombre && $comentario) {
            require_once 'models/ComentarioEventoModel.php';
            $comentarioModel = new ComentarioEvento();
            $comentarioModel->insertarComentario($evento_id, $nombre, $comentario);
        }

        // Redirige de vuelta al evento
        header("Location: index.php?action=eventos/ver/" . $evento_id);
        exit;
    }
}
}