<?php
require_once './models/MiembrosModel.php';
require_once './config/database.php'; // Incluye el archivo de la clase Database

class MiembrosController
{
    private $modelo;
    private $isAdmin = false;

    public function __construct()
    {
        $this->modelo = new MiembrosModel();
    }

    public function setAdminContext($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }

    public function index()
    {
        $miembroItems = $this->modelo->obtenerTodos();
        $especialidades = $this->modelo->obtenerTodas();
        require_once './views/admin/miembros.php';
    }

    public function indexF()
    {
        $miembroItems = $this->modelo->obtenerTodosF();
        require_once './views/admin/en_memoria.php';
    }

    public function listar()
    {
        header('Content-Type: application/json');

        $miembros = $this->modelo->obtenerTodos();

        echo json_encode($miembros);
        exit;
    }

    public function listarF()
    {
        header('Content-Type: application/json');

        $miembros = $this->modelo->obtenerTodosF();

        echo json_encode($miembros);
        exit;
    }

    public function ver($id)
    {
        $miembroModel = $this->modelo->obtenerMiembrosPorId($id);
        require_once './views/admin/miembros.php';
    }

    public function agregar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre        = $_POST['nombre'] ?? '';
            $descripcion   = $_POST['descripcion'] ?? '';
            $especialidad_id  = $_POST['especialidad_id'] ?? '';
            $imagen        = $_FILES['imagen']['name'] ?? '';

            if ($nombre && $descripcion && $especialidad_id && $imagen) {
                $rutaDestino = __DIR__ . '/../views/assets/img/miembros/' . $imagen;

                move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino);

                $this->modelo->agregarMiembros($nombre, $descripcion, $especialidad_id, $imagen);

                exit();
            } else {
                echo "Faltan campos obligatorios.";
            }
        } else {
            require_once './views/admin/miembros.php';
        }
    }

    public function editar($id)
    {
        if (!$id || !is_numeric($id)) {
            echo json_encode(['success' => false, 'mensaje' => 'ID inválido']);
            exit;
        }
        $miembro = $this->modelo->obtenerMiembrosPorId($id);
        if (!$miembro) {
            echo json_encode(['success' => false, 'mensaje' => 'Miembro no encontrado']);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');
            $descripcion = trim($_POST['descripcion'] ?? '');
            $especialidad_id = intval($_POST['especialidad_id'] ?? 0);
            $imagen_actual = $miembro['imagen'] ?? '';
            $imagen = $imagen_actual;

            if (empty($nombre) || empty($descripcion) || $especialidad_id <= 0) {
                echo json_encode(['success' => false, 'mensaje' => 'Todos los campos son obligatorios']);
                exit;
            }

            if (!empty($_FILES['imagen']['name'])) {
                $nombreArchivo = basename($_FILES['imagen']['name']);
                $rutaDestino = __DIR__ . '/../views/assets/img/miembros/' . $nombreArchivo;
                $tipoPermitido = ['image/jpeg', 'image/png', 'image/gif'];

                if (in_array($_FILES['imagen']['type'], $tipoPermitido)) {
                    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
                        // Eliminar anterior si es diferente
                        if (!empty($imagen_actual) && $imagen_actual !== $nombreArchivo) {
                            $rutaAnterior = __DIR__ . '/../views/assets/img/miembros/' . $imagen_actual;
                            if (file_exists($rutaAnterior)) unlink($rutaAnterior);
                        }
                        $imagen = $nombreArchivo;
                    } else {
                        echo json_encode(['success' => false, 'mensaje' => 'Error al subir la nueva imagen']);
                        exit;
                    }
                } else {
                    echo json_encode(['success' => false, 'mensaje' => 'Formato de imagen no válido']);
                    exit;
                }
            }

            $resultado = $this->modelo->actualizarMiembros($id, $nombre, $descripcion, $especialidad_id, $imagen);

            if ($resultado) {
                $_SESSION['success'] = 'Miembro actualizado correctamente';
            } else {
                $_SESSION['error'] = 'Error al actualizar el miembro';
            }
            exit;
        } else {
            $especialidades = $this->modelo->obtenerTodas();
            require './views/admin/miembros.php';
        }
    }

    public function editarE($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $motivo = $_POST['motivo'];
            $fecha = $_POST['fecha'];

            if ($this->modelo->registrarF($id, $motivo, $fecha)) {
                echo json_encode([
                    'success' => true,
                    'mensaje' => 'Miembro actualizado correctamente',
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

    public function editarF($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $motivo = $_POST['motivo'];
            $fecha = $_POST['fecha'];

            if ($this->modelo->actualizarF($id, $motivo, $fecha)) {
                echo json_encode([
                    'success' => true,
                    'mensaje' => 'Miembro actualizado correctamente',
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
            $miembro = $this->modelo->obtenerPorId($id);

            if ($miembro && !empty($miembro['imagen'])) {
                $rutaImagen = __DIR__ . '/../views/assets/img/miembros/' . $miembro['imagen'];

                if (file_exists($rutaImagen)) {
                    unlink($rutaImagen);
                }
            }

            $resultado = $this->modelo->eliminarMiembros($id);

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


    public function eliminarF()
    {
        $id = $_GET['id'] ?? null;
        if ($id && is_numeric($id)) {
            $resultado = $this->modelo->eliminarF($id);
            echo json_encode([
                'success' => $resultado,
                'mensaje' => $resultado ? 'Eliminado' : 'No se pudo eliminar'
            ]);
        } else {
            echo json_encode(['success' => false, 'mensaje' => 'ID inválido', 'id' => $id]);
        }

        exit;
    }



    public function mostrarPublico()
    {
        $miembroItems = $this->modelo->obtenerTodos();
        require_once './views/web/carrusel/mostrar.php';
    }
}

