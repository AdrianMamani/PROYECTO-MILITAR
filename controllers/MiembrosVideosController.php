<?php
require_once './models/MiembrosVideosModel.php';
require_once './config/database.php';

class MiembrosVideosController
{

    private $modelo;

    public function __construct()
    {
        $this->modelo = new MiembrosVideosModel();
    }


    public function index()
    {
        $miembrosModel = new MiembrosModel();
        $miembros = $miembrosModel->obtenerTodos();
        require './views/admin/miembros_videos.php';
    }

    public function listar()
    {
        header('Content-Type: application/json');

        $videos = $this->modelo->obtenerTodos();
        echo json_encode($videos);
        exit;
    }

    public function agregar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario_id = $_POST['miembro_id'];
            $codigo = $_POST['codigo'];


            if ($this->modelo->registrar($usuario_id, $codigo)) {
                echo json_encode([
                    'success' => true,
                    'mensaje' => 'Video Guardado e insertada correctamente',
                ]);
                return;
            } else {
                echo json_encode([
                    'success' => false,
                    'mensaje' => 'Error al guardar en la base de datos'
                ]);
                return;
            }
            exit();
        }
    }

    public function editar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario_id = $_POST['miembro_id_edit'];
            $codigo = $_POST['codigo'];

            if ($this->modelo->actualizar($id, $usuario_id, $codigo)) {
                echo json_encode([
                    'success' => true,
                    'mensaje' => 'Video Guardado actualizado correctamente',
                ]);
                return;
            } else {
                echo json_encode([
                    'success' => false,
                    'mensaje' => 'Error al guardar en la base de datos'
                ]);
                return;
            }

            exit();
        }
    }

    public function eliminar()
    {
        $id = $_GET['id'] ?? null;
        if ($id && is_numeric($id)) {
            $resultado = $this->modelo->eliminar($id);
            echo json_encode([
                'success' => $resultado,
                'mensaje' => $resultado ? 'Eliminado' : 'No se pudo eliminar'
            ]);
        } else {
            echo json_encode(['success' => false, 'mensaje' => 'ID inválido', 'id' => $id]);
        }

        exit;
    }
}
