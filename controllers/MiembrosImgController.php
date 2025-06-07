<?php

require_once './models/MiembrosImgModel.php';

class MiembrosImgController
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new MiembrosImgModel();
    }

    public function index()
    {
        $miembrosModel = new MiembrosModel();
        $miembros = $miembrosModel->obtenerTodos();
        require_once './views/admin/miembros_imagenes.php';
    }

    public function listar()
    {
        header('Content-Type: application/json');

        $miembros = $this->modelo->obtenerTodos();
        echo json_encode($miembros);
        exit;
    }

    public function agregar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
                $archivo = $_FILES['imagen'];

                // Obtener la extensión original (en minúsculas)
                $extension = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));

                // Validar que sea una imagen permitida
                $extensionesPermitidas = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                if (!in_array($extension, $extensionesPermitidas)) {
                    echo json_encode([
                        'success' => false,
                        'mensaje' => 'Tipo de archivo no permitido'
                    ]);
                    return;
                }

                // Generar nombre único
                $nombreArchivoUnico = uniqid('img_', true) . '.' . $extension;

                $directorioDestino = __DIR__ . '/../uploads/usuarios/imagenes/';
                $rutaCompleta = $directorioDestino . $nombreArchivoUnico;

                // Crear carpeta si no existe
                if (!file_exists($directorioDestino)) {
                    mkdir($directorioDestino, 0777, true);
                }

                // Mover imagen
                if (move_uploaded_file($archivo['tmp_name'], $rutaCompleta)) {
                    $data = [
                        'miembro_id' => $_POST['miembro_id'] ?? null,
                        'imagen_usuario' => $nombreArchivoUnico
                    ];

                    if ($this->modelo->registrar($data)) {
                        echo json_encode([
                            'success' => true,
                            'mensaje' => 'Imagen guardada e insertada correctamente',
                            'datos' => $data
                        ]);
                        return;
                    } else {
                        echo json_encode([
                            'success' => false,
                            'mensaje' => 'Error al guardar en la base de datos'
                        ]);
                        return;
                    }
                } else {
                    echo json_encode([
                        'success' => false,
                        'mensaje' => 'Error al mover el archivo'
                    ]);
                    return;
                }
            } else {
                echo json_encode([
                    'success' => false,
                    'mensaje' => 'Archivo no válido o no enviado'
                ]);
                return;
            }
        }

        echo json_encode([
            'success' => false,
            'mensaje' => 'Método no permitido'
        ]);
    }

    public function editar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $miembro_id = $_POST['miembro_id_edit'] ?? null;

            if (!$miembro_id || !is_numeric($miembro_id)) {
                echo json_encode([
                    'success' => false,
                    'mensaje' => 'ID de miembro no válido'
                ]);
                return;
            }

            $registroActual = $this->modelo->obtenerPorId($id);
            if (!$registroActual) {
                echo json_encode([
                    'success' => false,
                    'mensaje' => 'Registro no encontrado'
                ]);
                return;
            }

            $nombreArchivo = $registroActual['nombre_imagen'];

            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
                $archivo = $_FILES['imagen'];

                $extension = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));
                $permitidas = ['jpg', 'jpeg', 'png', 'gif'];
                $maxSize = 2 * 1024 * 1024;

                if (!in_array($extension, $permitidas)) {
                    echo json_encode(['success' => false, 'mensaje' => 'Formato de imagen no permitido']);
                    return;
                }

                if ($archivo['size'] > $maxSize) {
                    echo json_encode(['success' => false, 'mensaje' => 'El tamaño excede los 2MB']);
                    return;
                }

                $nombreArchivo = uniqid('img_', true) . '.' . $extension;
                $rutaDestino = __DIR__ . '/../uploads/usuarios/imagenes/' . $nombreArchivo;

                if (!move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
                    echo json_encode(['success' => false, 'mensaje' => 'Error al guardar la nueva imagen']);
                    return;
                }

                $rutaAnterior = __DIR__ . '/../uploads/usuarios/imagenes/' . $registroActual['nombre_imagen'];
                if (file_exists($rutaAnterior)) {
                    unlink($rutaAnterior);
                }
            }

            $data = [
                'miembro_id' => $miembro_id,
                'imagen_usuario' => $nombreArchivo
            ];

            if ($this->modelo->actualizar($id, $data)) {
                echo json_encode(['success' => true, 'mensaje' => 'Registro actualizado correctamente']);
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'No se pudo actualizar']);
            }
        } else {
            echo json_encode(['success' => false, 'mensaje' => 'Método no permitido']);
        }
    }

    public function eliminar()
    {
        $id = $_GET['id'] ?? null;
        if ($id && is_numeric($id)) {

            $registro = $this->modelo->obtenerPorId($id);
            if ($registro && !empty($registro['nombre_imagen'])) {
                $rutaImagen = __DIR__ . '/../uploads/usuarios/imagenes/' . $registro['nombre_imagen'];


                if (file_exists($rutaImagen)) {
                    unlink($rutaImagen);
                }
            }
            $resultado = $this->modelo->eliminar($id);

            echo json_encode([
                'success' => $resultado,
                'mensaje' => $resultado ? 'Eliminado correctamente' : 'No se pudo eliminar'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'mensaje' => 'ID inválido',
                'id' => $id
            ]);
        }

        exit;
    }
}
