<?php
require_once './models/UsuarioVideosModel.php';
require_once './config/database.php';
require_once './models/UsuariosImgModel.php';

class UsuariosVideosController
{
    public function index()
    {
        $model = new UsuarioVideosModel();
        $videos = $model->listar();
        $usuarioModel = new Usuario();
        $miembros = $usuarioModel->obtenerTodos();
        require './views/admin/usuarios_videos.php';
    }

    public function agregar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario_id = $_POST['miembro'];
            $codigo = $_POST['codigo_video'];

            $model = new UsuarioVideosModel();
            $model->registrar($usuario_id, $codigo);

            header('Location: index.php?action=usuarios_videos/index');
            exit();
        }
    }

    public function editar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario_id = $_POST['miembro_edit'];
            $codigo = $_POST['edit-codigo'];

            $model = new UsuarioVideosModel();
            $model->actualizar($id, $usuario_id, $codigo);

            header('Location: index.php?action=usuarios_videos/index');
            exit();
        }
    }

    public function eliminar($id)
    {
        $model = new UsuarioVideosModel();
        $model->eliminar($id);

        header('Location: index.php?action=usuarios_videos/index');
        exit();
    }
}
