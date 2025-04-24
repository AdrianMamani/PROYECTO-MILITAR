<?php
require_once 'config/database.php';

class Especialidad {
    
    // Devuelve todas las especialidades
    public static function getAll() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM especialidades");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Devuelve todas las especialidades
    }

    // Devuelve una especialidad por su ID
    public static function getById($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM especialidades WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Devuelve los miembros asociados a una especialidad
    public static function getMiembrosByEspecialidad($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM miembros WHERE especialidad_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Guarda una especialidad y sus imágenes en la base de datos
    public function guardar($nombre, $descripcion, $imagenes = []) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO especialidades (nombre, descripcion) VALUES (?, ?)");
        $stmt->execute([$nombre, $descripcion]);

        $especialidad_id = $db->lastInsertId(); // Obtener el ID recién insertado

        // Guardar las imágenes
        foreach ($imagenes as $imagen) {
            $stmt_imagen = $db->prepare("INSERT INTO imagenes_especialidad (especialidad_id, nombre_imagen) VALUES (?, ?)");
            $stmt_imagen->execute([$especialidad_id, $imagen]);
        }
    }

    // Actualiza una especialidad
    public function actualizar($id, $nombre, $descripcion, $imagenes = []) {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE especialidades SET nombre = ?, descripcion = ? WHERE id = ?");
        $stmt->execute([$nombre, $descripcion, $id]);

        // Actualizar las imágenes
        if (!empty($imagenes)) {
            foreach ($imagenes as $imagen) {
                $stmt_imagen = $db->prepare("INSERT INTO imagenes_especialidad (especialidad_id, nombre_imagen) VALUES (?, ?)");
                $stmt_imagen->execute([$id, $imagen]);
            }
        }
    }

    // Elimina una especialidad
    public function eliminar($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM especialidades WHERE id = ?");
        $stmt->execute([$id]);
    }

    // Obtiene las imágenes asociadas a una especialidad
   // Especialidad.php
public static function getImagenesByEspecialidad($especialidad_id) {
    $db = Database::connect();
    $stmt = $db->prepare("SELECT id, nombre_imagen FROM imagenes_especialidad WHERE especialidad_id = ?");
    $stmt->execute([$especialidad_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// Especialidad.php
public static function eliminarImagen($imagen_id) {
    $db = Database::connect();
    // Eliminar la imagen de la base de datos
    $stmt = $db->prepare("DELETE FROM imagenes_especialidad WHERE id = ?");
    $stmt->execute([$imagen_id]);

    // Eliminar el archivo físico de la imagen del servidor
    // Obtén el nombre de la imagen a partir del ID
    $stmt = $db->prepare("SELECT nombre_imagen FROM imagenes_especialidad WHERE id = ?");
    $stmt->execute([$imagen_id]);
    $imagen = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($imagen) {
        $imagenPath = 'views/assets/img/especialidad/' . $imagen['nombre_imagen'];
        // Verifica si el archivo existe y luego lo elimina
        if (file_exists($imagenPath)) {
            unlink($imagenPath);  // Elimina el archivo
        }
    }
}

    
}
?>
