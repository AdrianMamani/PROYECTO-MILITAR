<?php
require_once 'models/Emprendimiento.php';

class EmprendimientoController {
    public  $emprendimientoModel;

    public function __construct() {
        $this->emprendimientoModel = new Emprendimiento();
    }
    // Muestra todos los emprendimientos
    public function index() {
        $emprendimientos = $this->emprendimientoModel->getAll();  // Get all emprendimientos
        require_once 'views/emprendimientos/index.php';  // Pass data to the view
    }

    // Muestra la lista de emprendimientos en el administrador
    public function adminIndex() {
        $emprendimientos = $this->emprendimientoModel->getAll();
        require_once 'views/admin/editar_emprendimiento.php';
    }

    public function detalle($id) {
        // Obtener el emprendimiento por su ID
        $emprendimiento = $this->emprendimientoModel->getById($id);
        // Obtener las imágenes asociadas a este emprendimiento
        $imagenes = $this->emprendimientoModel->obtenerImagenes($id);
        // Cargar la vista de detalle usando una ruta relativa
        require_once 'views/emprendimientos/detalle.php';
    }
    

    // Muestra el formulario para crear un nuevo emprendimiento
    public function crear() {
        require_once 'views/admin/editar_emprendimiento.php';  // Se muestra el formulario en el modal
    }

    // Muestra el formulario para editar un emprendimiento existente
    public function editar($id) {
        $emprendimiento = $this->emprendimientoModel->getById($id);
        $imagenes = $this->emprendimientoModel->obtenerImagenes($id);
        require_once 'views/admin/editar_emprendimiento.php';  // Se muestran los datos a editar
    }

    // Guarda un nuevo emprendimiento o actualiza uno existente
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $contactos = $_POST['contactos'];
            $ubicacion = $_POST['ubicacion'];
            $segunda_descripcion = $_POST['segunda_descripcion'];

            if (empty($_POST['id'])) {  // Crear uno nuevo
                $emprendimiento_id = $this->emprendimientoModel->guardar($nombre, $descripcion, $contactos, $ubicacion, $segunda_descripcion);
            } else {  // Actualizar uno existente
                $id = $_POST['id'];
                $this->emprendimientoModel->actualizar($id, $nombre, $descripcion, $contactos, $ubicacion, $segunda_descripcion);
                $emprendimiento_id = $id;
            }

            // Subir imágenes con nombres únicos
            if (isset($_FILES['imagenes']) && $_FILES['imagenes']['error'][0] == 0) {
                $uploadDir = 'assets/img/emprendimientos/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                foreach ($_FILES['imagenes']['name'] as $key => $nombreImagen) {
                    $tmpName = $_FILES['imagenes']['tmp_name'][$key];
                    $extension = pathinfo($nombreImagen, PATHINFO_EXTENSION);
                    $uniqueName = uniqid() . '.' . $extension;
                    $uploadFile = $uploadDir . $uniqueName;
                    if (move_uploaded_file($tmpName, $uploadFile)) {
                        $this->emprendimientoModel->insertarImagen($emprendimiento_id, $uniqueName);
                    }
                }
            }

            header('Location: index.php?controller=emprendimiento&action=adminIndex');
        }
    }

    // Elimina un emprendimiento y sus imágenes
    public function eliminar($id) {
        $this->emprendimientoModel->eliminar($id);
        header('Location: index.php?controller=emprendimiento&action=adminIndex');
    }

    // Elimina una imagen individual asociada a un emprendimiento
    public function eliminarImagen() {
        if (isset($_GET['imagen_id'])) {
            $imagen_id = $_GET['imagen_id'];
            $this->emprendimientoModel->eliminarImagen($imagen_id);
        }
        header('Location: index.php?controller=emprendimiento&action=adminIndex');
    }

    // In the Emprendimiento model, ensure that obtenerImagenes retrieves all associated images
public function obtenerImagenes($emprendimiento_id) {
    $db = Database::connect();
    $stmt = $db->prepare("SELECT nombre_imagen FROM imagenes_emprendimientos WHERE emprendimiento_id = ?");
    $stmt->execute([$emprendimiento_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
?>
