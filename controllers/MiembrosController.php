<?php
require_once './models/MiembrosModel.php';
require_once './config/database.php'; // Incluye el archivo de la clase Database

class MiembrosController {
    private $modelo;
    private $isAdmin = false;

    public function __construct() {
        $this->modelo = new Miembros();
    }

     public function setAdminContext($isAdmin) {
        $this->isAdmin = $isAdmin;
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        $miembroItems = $this->modelo->obtenerTodos();
        $especialidades = $this->modelo->obtenerTodas();
        require_once './views/admin/miembros.php';
    }

    public function ver($id) {
        $miembroModel = $this->modelo->obtenerMiembrosPorId($id);
        require_once './views/admin/miembros.php';
    }

public function agregar() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre        = $_POST['nombre'] ?? '';
        $descripcion   = $_POST['descripcion'] ?? '';
        $especialidad_id  = $_POST['especialidad_id'] ?? '';
        $imagen        = $_FILES['imagen']['name'] ?? '';

        if ($nombre && $descripcion && $especialidad_id && $imagen) {
            // Ruta de destino para guardar la imagen
            $rutaDestino = __DIR__ . '/../views/assets/img/miembros/' . $imagen;

            // Mover el archivo subido
            move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino);

            // Llamar al modelo para guardar en la base de datos
            $this->modelo->agregarMiembros($nombre, $descripcion, $especialidad_id, $imagen);

            // Redirigir al listado de miembros
            header('Location: index.php?action=miembros');
            exit();
        } else {
            echo "Faltan campos obligatorios.";
        }
    } else {
        require_once './views/admin/miembros.php';
    }
}



public function editar($id) {
    // Obtener datos del miembro
    $miembro = $this->modelo->obtenerMiembrosPorId($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = trim($_POST['nombre'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');
        $especialidad_id = intval($_POST['especialidad_id'] ?? 0);
        $imagen_actual = $miembro['imagen'] ?? '';

        // Validar datos básicos
        if (empty($nombre) || empty($descripcion) || $especialidad_id <= 0) {
            $_SESSION['error'] = "Todos los campos son obligatorios";
            header("Location: index.php?action=miembros/editar/$id");
            exit();
        }

        // Manejar imagen
        $imagen = $imagen_actual; // Por defecto, mantener la actual
        
        if (!empty($_FILES['imagen']['name'])) {
            // Procesar nueva imagen
            $imagen = basename($_FILES['imagen']['name']);
            $rutaDestino = __DIR__ . '/../views/assets/img/miembros/' . $imagen;
            
            // Validar tipo de archivo
            $tipoPermitido = ['image/jpeg', 'image/png', 'image/gif'];
            if (in_array($_FILES['imagen']['type'], $tipoPermitido)) {
                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
                    // Eliminar imagen anterior si existe y es diferente
                    if (!empty($imagen_actual) && $imagen_actual != $imagen) {
                        $rutaAnterior = __DIR__ . '/../views/assets/img/miembros/' . $imagen_actual;
                        if (file_exists($rutaAnterior)) {
                            unlink($rutaAnterior);
                        }
                    }
                } else {
                    $_SESSION['error'] = "Error al subir la imagen";
                    header("Location: index.php?action=miembros/editar/$id");
                    exit();
                }
            } else {
                $_SESSION['error'] = "Formato de imagen no válido";
                header("Location: index.php?action=miembros/editar/$id");
                exit();
            }
        }

        // Actualizar en la base de datos
        $resultado = $this->modelo->actualizarMiembros($id, $nombre, $descripcion, $especialidad_id, $imagen);
        
        if ($resultado) {
            $_SESSION['success'] = "Miembro actualizado correctamente";
        } else {
            $_SESSION['error'] = "Error al actualizar el miembro";
        }
        
        header('Location: index.php?action=miembros');
        exit();
    } else {
        $especialidades = $this->modelo->obtenerTodas();
        require_once './views/admin/miembros.php';
    }
}



    public function eliminar($id) {
        $this->modelo->eliminarMiembros($id);
        header('Location: index.php?action=miembros');
        exit();
    }

    public function mostrarPublico() {
        $miembroItems = $this->modelo->obtenerTodos();
        require_once './views/web/carrusel/mostrar.php';
    }
}
?>