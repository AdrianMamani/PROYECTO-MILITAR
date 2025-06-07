<?php
require_once 'models/Usuario.php';
require_once 'models/EspecialidadModel.php';

class UsuariosController
{
    public function index()
    {
        $model = new Usuario();
        $usuarios = $model->listar();
        $usuariosF = $model->listarF();
        $especialidadModel = new Especialidad();
        $especialidades = $especialidadModel->obtenerTodos();

        require './views/admin/usuarios.php';
    }

    public function agregar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $especialidad = $_POST['especialidad'];
            $descripcion = $_POST['descripcion'];
            
            $uploadDir = 'uploads/usuarios/imagenes/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $imagenNombre = time() . '_' . basename($_FILES['imagen']['name']);
            $rutaFinal = $uploadDir . $imagenNombre;
            move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaFinal);

            $model = new Usuario();
            $model->registrar($nombre, $especialidad, $descripcion, $imagenNombre);

            header('Location: index.php?action=usuarios/index');
            exit();
        }
    }



    public function editar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre_edit'];
            $especialidad = $_POST['especialidad_edit'];
            $descripcion = $_POST['descripcion_edit'];

            $model = new Usuario();
            $model->actualizar($nombre, $especialidad, $descripcion, $id);

            header('Location: index.php?action=usuarios/index');
            exit();
        }
    }

    public function editarE($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $motivo = $_POST['motivo'];
            $fecha = $_POST['fecha'];

            $model = new Usuario();
            $model->registrarF($motivo, $fecha, $id);

            header('Location: index.php?action=usuarios/index');
            exit();
        }
    }

    public function editarF($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $motivo = $_POST['motivo_edit'];
            $fecha = $_POST['fecha_edit'];

            $model = new Usuario();
            $model->actualizarF($motivo, $fecha, $id);

            header('Location: index.php?action=usuarios/index');
            exit();
        }
    }

    public function eliminar($id)
    {
        $model = new Usuario();
        $model->eliminar($id);

        header('Location: index.php?action=usuarios/index');
        exit();
    }

    public function eliminarF($id)
    {
        $model = new Usuario();
        $model->eliminarF($id);

        header('Location: index.php?action=usuarios/index');
        exit();
    }
}
