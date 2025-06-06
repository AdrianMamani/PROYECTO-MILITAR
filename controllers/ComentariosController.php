<?php
require_once 'models/ComentariosModel.php';

class ComentariosController
{
    public function index()
    {
        $model = new ComentariosModel();
        $comentarios = $model->listar();

        require './views/admin/comentarios.php';
    }

    public function obtenerComentarios()
    {
        $comentariosModel = new ComentariosModel();
        return $comentariosModel->obtenerTodos();
    }
    
    public function agregar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $correo = $_POST['correo'] ?? '';
            $comentario = $_POST['comentario'] ?? '';

            $model = new ComentariosModel();
            $model->guardar($nombre, $correo, $comentario);
            header('Location: index.php?action=home');
            exit();
        }
    }


    public function eliminar($id)
    {
        $model = new ComentariosModel();
        $model->eliminar($id);

        header('Location: index.php?action=comentarios/index');
        exit();
    }
}
