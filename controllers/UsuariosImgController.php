<?php
require_once './models/UsuariosImgModel.php';
require_once 'models/Usuario.php';
require_once './config/database.php';

class UsuariosImgController
{
    private $uploadDir = 'uploads/usuarios/imagenes';
    public function index()
    {
        $model = new UsuariosImgModel();
        $imagenes = $model->listar();
        $usuarioModel = new Usuario();
        $miembros = $usuarioModel->obtenerTodos();
        require './views/admin/usuarios_imagenes.php';
    }

    public function agregar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario_id = $_POST['miembro'];

            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'uploads/usuarios/imagenes/';
                $nombreOriginal = basename($_FILES['imagen']['name']);
                $nombreSeguro = uniqid() . '_' . preg_replace("/[^a-zA-Z0-9.]/", "_", $nombreOriginal);
                $rutaCompleta = $uploadDir . $nombreSeguro;

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaCompleta)) {
                    $model = new UsuariosImgModel();
                    $model->registrar($nombreSeguro, $usuario_id);

                    header('Location: index.php?action=usuarios_imagenes/index');
                    exit();
                } else {
                    echo "Error al mover el archivo.";
                }
            } else {
                echo "No se subió ninguna imagen válida.";
            }
        }
    }

    public function editar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['edit_id'];
            $usuario_id = $_POST['miembro_edit'];
            $uploadDir = 'uploads/usuarios/imagenes/';

            if (isset($_FILES['imagen_edit']) && $_FILES['imagen_edit']['error'] === UPLOAD_ERR_OK) {

                $model = new UsuariosImgModel();
                $imagenActual = $model->obtenerPorId($id);


                if ($imagenActual && !empty($imagenActual['nombre_imagen'])) {
                    $rutaImagenAnterior = $uploadDir . $imagenActual['nombre_imagen'];
                    if (file_exists($rutaImagenAnterior)) {
                        unlink($rutaImagenAnterior);
                    }
                }

                $nombreOriginal = basename($_FILES['imagen_edit']['name']);
                $nombreSeguro = uniqid() . '_' . preg_replace("/[^a-zA-Z0-9.]/", "_", $nombreOriginal);
                $rutaCompleta = $uploadDir . $nombreSeguro;

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                if (move_uploaded_file($_FILES['imagen_edit']['tmp_name'], $rutaCompleta)) {
                    $model->actualizar($id, $nombreSeguro, $usuario_id);

                    header('Location: index.php?action=usuarios_imagenes/index');
                    exit();
                } else {
                    echo "Error al mover el archivo.";
                }
            } else {
                echo "No se subió ninguna imagen válida.";
            }
        }
    }


    public function eliminar($id)
{
    $model = new UsuariosImgModel();
    $imagen = $model->obtenerPorId($id);

    if ($imagen && !empty($imagen['nombre_imagen'])) {
        $ruta = 'uploads/usuarios/imagenes/' . $imagen['nombre_imagen'];
        if (file_exists($ruta)) {
            unlink($ruta);
        }
    }

    $model->eliminar($id);
    header('Location: index.php?action=usuarios_imagenes/index');
    exit();
}

}
