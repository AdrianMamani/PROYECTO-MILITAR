<?php
require_once 'models/Especialidad.php';

class EspecialidadController {

    // Muestra la lista de especialidades
    public function index() {
        $especialidades = Especialidad::getAll(); // Obtener todas las especialidades
        require_once 'views/especialidades.php'; // Mostrar la vista de especialidades
    }

    // Muestra el detalle de una especialidad, incluyendo sus miembros
    public function detalle($id) {
        $especialidad = Especialidad::getById($id); // Obtener la especialidad por ID
        $miembros = Especialidad::getMiembrosByEspecialidad($id); // Obtener los miembros asociados a la especialidad
        require_once 'views/detalle_especialidad.php'; // Mostrar la vista con los detalles de la especialidad
    }

    // Lista todas las especialidades (mantener este método para futuras necesidades)
    public function listarEspecialidades() {
        $especialidadModel = new Especialidad();
        $especialidades = $especialidadModel->getAll(); // Obtener todas las especialidades
        return $especialidades; // Devuelve la lista de especialidades
    }

    // Acción para mostrar la vista de administración de especialidades
    public function adminIndex() {
        $especialidades = Especialidad::getAll(); // Obtener todas las especialidades
        require_once 'views/admin/editar_especialidad.php'; // Vista de administración de especialidades
    }

    

    // Guarda una nueva especialidad
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            
            // Procesar las imágenes subidas
            $imagenes = [];
            if (isset($_FILES['imagenes']) && !empty($_FILES['imagenes']['name'][0])) {
                $dir_subida = 'views/assets/img/especialidad/';
                if (!is_dir($dir_subida)) {
                    mkdir($dir_subida, 0777, true);
                }
                $imagenes = $this->subirImagenes($_FILES['imagenes'], $dir_subida);
            }

            // Llamar al modelo para guardar la especialidad
            $especialidadModel = new Especialidad();
            $especialidadModel->guardar($nombre, $descripcion, $imagenes);

            // Redirigir al listado de especialidades
            header('Location: index.php?controller=especialidad&action=adminIndex');
            exit();
        }
    }

    // Subir las imágenes a la carpeta
    private function subirImagenes($imagenes, $dir_subida) {
        $archivos_subidos = [];
        foreach ($imagenes['name'] as $key => $nombre_archivo) {
            $tmp_name = $imagenes['tmp_name'][$key];
            $ext = pathinfo($nombre_archivo, PATHINFO_EXTENSION);
            $nombre_archivo = uniqid() . '.' . $ext;

            if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
                $ruta_archivo = $dir_subida . $nombre_archivo;

                if (move_uploaded_file($tmp_name, $ruta_archivo)) {
                    $archivos_subidos[] = $nombre_archivo;
                }
            }
        }
        return $archivos_subidos;
    }

    // Actualiza una especialidad
    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];

            // Procesar las imágenes subidas
            $imagenes = [];
            if (isset($_FILES['imagenes']) && !empty($_FILES['imagenes']['name'][0])) {
                $dir_subida = 'views/assets/img/especialidad/';
                if (!is_dir($dir_subida)) {
                    mkdir($dir_subida, 0777, true);
                }
                $imagenes = $this->subirImagenes($_FILES['imagenes'], $dir_subida);
            }

            // Llamar al modelo para actualizar la especialidad
            $especialidadModel = new Especialidad();
            $especialidadModel->actualizar($id, $nombre, $descripcion, $imagenes);

            // Redirigir al listado de especialidades
            header('Location: index.php?controller=especialidad&action=adminIndex');
            exit();
        }
    }

    // Elimina una especialidad
    public function eliminar($id) {
        // Verificar si la especialidad tiene miembros
        $miembros = Especialidad::getMiembrosByEspecialidad($id);
        
        // Si la especialidad tiene miembros, no permitir la eliminación
        if (!empty($miembros)) {
            $_SESSION['error'] = 'No puedes eliminar una especialidad que tiene miembros asociados.';
            header('Location: index.php?controller=especialidad&action=adminIndex');
            exit();
        }
        
        // Si no tiene miembros, proceder con la eliminación
        $especialidadModel = new Especialidad();
        $especialidadModel->eliminar($id);
        
        // Redirigir al listado de especialidades
        header('Location: index.php?controller=especialidad&action=adminIndex');
        exit();
    }
    

    public static function getImagenesByEspecialidad($especialidad_id) {
        $db = Database::connect();
        // Asegúrate de que la consulta también seleccione el id de la imagen
        $stmt = $db->prepare("SELECT id, nombre_imagen FROM imagenes_especialidad WHERE especialidad_id = ?");
        $stmt->execute([$especialidad_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

// EspecialidadController.php
public function eliminarImagen() {
    // Verificar si los parámetros se reciben correctamente
    if (isset($_GET['especialidad_id']) && isset($_GET['imagen_id'])) {
        $especialidad_id = $_GET['especialidad_id'];
        $imagen_id = $_GET['imagen_id'];

        // Llamar al modelo para eliminar la imagen de la base de datos
        Especialidad::eliminarImagen($imagen_id);

        // Redirigir al listado de especialidades con un mensaje de éxito
        header('Location: index.php?controller=especialidad&action=adminIndex');
        exit();
    } else {
        // Si los parámetros no se encuentran en la URL, redirigir o manejar el error
        echo 'Parámetros faltantes';
        exit();
    }
}


    
}
?>
