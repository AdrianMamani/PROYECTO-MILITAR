<?php
require_once 'models/Miembro.php';
require_once 'models/Especialidad.php';

class MiembroController {

    public function index() {
        // Obtener todos los miembros junto con su especialidad
        $miembros = Miembro::getAll();  

        // Obtener todas las especialidades disponibles
        $especialidades = Especialidad::getAll();

        // Pasar los miembros y especialidades a la vista
        require_once 'views/miembros.php';  
    }



    // Método para listar los miembros
    public function admin() {
        // Obtener todos los miembros junto con su especialidad
        $miembros = Miembro::getAll();  

        // Obtener todas las especialidades disponibles
        $especialidades = Especialidad::getAll();

        // Pasar los miembros y especialidades a la vista
        require_once 'views/admin/editar_miembro.php';  
    }

    // Método para mostrar los detalles de un miembro
    public function detalle($id) {
        // Obtener el miembro por su ID
        $miembro = Miembro::getById($id);  // Usamos el método getById que obtendrá al miembro por su ID
        require_once 'views/detalle_miembro.php';  // Cargamos la vista de detalle del miembro
    }
    // Método para agregar un miembro
    public function agregar() {
        // Obtener todas las especialidades
        $especialidades = Especialidad::getAll();
        
        // Pasar las especialidades a la vista
        require_once 'views/admin/editar_miembro.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $especialidad_id = $_POST['especialidad_id'];
    
            // Guardar miembro y obtener su ID
            $miembro_id = Miembro::guardar($nombre, $descripcion, $especialidad_id);
    
            // Subir imágenes
            if (isset($_FILES['imagenes']) && $_FILES['imagenes']['error'][0] == 0) {
                $uploadDir = 'assets/img/miembros/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
    
                foreach ($_FILES['imagenes']['name'] as $key => $originalName) {
                    $tmpName = $_FILES['imagenes']['tmp_name'][$key];
                    // Extraemos la extensión del archivo
                    $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                    // Generamos un nombre único (puedes agregar prefijos o usar uniqid con más entropía)
                    $uniqueName = uniqid() . '.' . $extension;
                    $uploadFile = $uploadDir . $uniqueName;
    
                    if (move_uploaded_file($tmpName, $uploadFile)) {
                        // Guardamos en la base de datos con el nombre único
                        Miembro::insertarImagen($miembro_id, $uniqueName);
                    }
                }
            }
    
            header('Location: index.php?controller=miembro&action=admin');  // Redirige después de guardar
        }
    }
    
   // Método para editar un miembro
public function editar($id) {
    // Obtener el miembro por su ID
    $miembro = Miembro::getById($id);
    if (!$miembro) {
        die("Miembro no encontrado.");
    }

    // Obtener todas las especialidades
    $especialidades = Especialidad::getAll(); // Asegúrate de que esta función devuelve algo

    // Obtener las imágenes asociadas a este miembro
    $imagenes = Miembro::obtenerImagenes($id);

    // Pasar los datos a la vista
    require_once 'views/admin/editar_miembro.php'; // Asegúrate de que los datos se pasan correctamente a la vista
}


public function actualizar($id) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $especialidad_id = $_POST['especialidad_id'];

        // Actualizar los datos del miembro
        Miembro::actualizar($id, $nombre, $descripcion, $especialidad_id);

        // Subir imágenes (añadir nuevas sin borrar las anteriores)
        if (isset($_FILES['imagenes']) && $_FILES['imagenes']['error'][0] == 0) {
            $uploadDir = 'assets/img/miembros/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            foreach ($_FILES['imagenes']['name'] as $key => $originalName) {
                $tmpName = $_FILES['imagenes']['tmp_name'][$key];
                $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                $uniqueName = uniqid() . '.' . $extension;
                $uploadFile = $uploadDir . $uniqueName;

                if (move_uploaded_file($tmpName, $uploadFile)) {
                    Miembro::insertarImagen($id, $uniqueName);
                }
            }
        }

        header('Location: index.php?controller=miembro&action=admin');  // Redirige después de la actualización
    }
}


    // Método para eliminar un miembro
    public function eliminar($id) {
        Miembro::eliminar($id);
        header('Location: index.php?controller=miembro&action=admin');  // Redirige después de eliminar
    }

      // Método para eliminar una imagen individual
      public function eliminarImagen() {
        if (isset($_GET['imagen_id'])) {
            $imagen_id = $_GET['imagen_id'];
            Miembro::eliminarImagen($imagen_id);
        }
        // Redirige a la vista de administración después de eliminar
        header('Location: index.php?controller=miembro&action=admin');
    }
}
?>
