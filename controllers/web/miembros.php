<?php
require_once __DIR__ . '/../../models/MiembrosModel.php';
require_once __DIR__ . '/../../models/UsuariosImgModel.php';
require_once __DIR__ . '/../../models/ComentarioPersonaModel.php';
require_once __DIR__ . '/../../models/UsuarioVideosModel.php';


class MiembrosControllerWeb
{
    public function index(){
        $miembrosModel = new MiembrosModel();
        $miembros = $miembrosModel->obtenerTodos();
        require './views/miembros.php';
        exit();
    }

    public function indexPersonal($id){
    $miembrosModel = new MiembrosModel();
    $miembros = $miembrosModel->obtenerPorId($id);
    if (!$miembros) {
        // Si no se encuentra vivo, intentamos si está fallecido
        $miembro = $miembrosModel->obtenerPorIdFallecido($id);
    }

    if (!$miembros) {
        // Si aún no se encuentra, mostrar error o redirigir
        echo "Miembro no encontrado.";
        exit;
    }
     // singular porque es 1 solo

    $imagenesModel = new UsuariosImgModel();
    $imagenes = $imagenesModel->listarPorUsuarioId($id);
    $imagenPortada = !empty($imagenes) ? $imagenes[0] : null;

    $comentarioModel = new ComentarioPersona(); // puede renombrarse ComentarioPersonaModel
    $comentarios = $comentarioModel->obtenerPorPersonaId($id); // método que debemos agregar

    $videoModel = new UsuarioVideosModel();
    $videos = $videoModel->listarPorUsuarioId($id);

    require './views/miembro.php';
    exit();
}

    public function indexF(){
        $miembrosModel = new MiembrosModel();
        $miembros = $miembrosModel->obtenerTodosF();
        require './views/miembros_fallecidos.php';
        exit();
    }

    public function obtenerMiembros()
    {
        $miembrosModel = new MiembrosModel();
        return $miembrosModel->obtenerTodos();
    }

    public function obtenerMiembrosF()
    {
        $miembrosModel = new MiembrosModel();
        return $miembrosModel->obtenerTodosF();
    }

    public function obtenerMiembroPorId($id)
    {
       $miembrosModel = new MiembrosModel();
        return $miembrosModel->obtenerPorId($id);
    }
    
    public function agregarComentario() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $persona_id = $_POST['persona_id'] ?? null;
        $nombre = $_POST['name'] ?? '';
        $comentario = $_POST['comment'] ?? '';

        if ($persona_id && $nombre && $comentario) {
            require_once 'models/ComentarioPersonaModel.php';
            $comentarioModel = new ComentarioPersona();
            $comentarioModel->insertarComentario($persona_id, $nombre, $comentario);
        }

        // Redirige de vuelta al evento
        header("Location: index.php?action=miembro/index/" . $persona_id);
        exit;
    }
}
}
