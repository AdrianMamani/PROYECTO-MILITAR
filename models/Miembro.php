<?php
require_once 'config/database.php';

class Miembro {

    // Devuelve todos los miembros con su especialidad
    public static function getAll() {
        $db = Database::connect();
        $stmt = $db->query("
            SELECT 
                m.id, 
                m.nombre, 
                m.descripcion, 
                m.especialidad_id,   /* <-- IMPORTANTE */
                e.nombre AS especialidad
            FROM miembros m
            JOIN especialidades e ON m.especialidad_id = e.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public static function getById($id) {
        $db = Database::connect();
        $stmt = $db->prepare("
            SELECT m.*, e.nombre AS especialidad
            FROM miembros m
            JOIN especialidades e ON m.especialidad_id = e.id
            WHERE m.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    // Guarda un nuevo miembro
    public static function guardar($nombre, $descripcion, $especialidad_id) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO miembros (nombre, descripcion, especialidad_id) VALUES (?, ?, ?)");
        $stmt->execute([$nombre, $descripcion, $especialidad_id]);
        return $db->lastInsertId();
    }

    // Actualiza los datos de un miembro
    public static function actualizar($id, $nombre, $descripcion, $especialidad_id) {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE miembros SET nombre = ?, descripcion = ?, especialidad_id = ? WHERE id = ?");
        $stmt->execute([$nombre, $descripcion, $especialidad_id, $id]);
    }

    // Inserta una nueva imagen para un miembro
    public static function insertarImagen($miembro_id, $nombre_imagen) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO imagenes_miembros (miembro_id, nombre_imagen) VALUES (?, ?)");
        $stmt->execute([$miembro_id, $nombre_imagen]);
    }

    // Obtiene todas las imágenes de un miembro (incluye el id de la imagen)
    public static function obtenerImagenes($miembro_id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT id, nombre_imagen FROM imagenes_miembros WHERE miembro_id = ?");
        $stmt->execute([$miembro_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Elimina una imagen tanto de la base de datos como del directorio de imágenes
    public static function eliminarImagen($imagen_id) {
        $db = Database::connect();

        // Obtener el nombre de la imagen para poder eliminar el archivo
        $stmt = $db->prepare("SELECT nombre_imagen FROM imagenes_miembros WHERE id = ?");
        $stmt->execute([$imagen_id]);
        $imagen = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($imagen) {
            $file = 'assets/img/miembros/' . $imagen['nombre_imagen'];
            if (file_exists($file)) {
                unlink($file);
            }
        }

        // Eliminar la imagen de la base de datos
        $stmt = $db->prepare("DELETE FROM imagenes_miembros WHERE id = ?");
        $stmt->execute([$imagen_id]);
    }
    

    // Elimina un miembro
    public static function eliminar($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM miembros WHERE id = ?");
        $stmt->execute([$id]);

        // Eliminar las imágenes asociadas
        $stmt2 = $db->prepare("DELETE FROM imagenes_miembros WHERE miembro_id = ?");
        $stmt2->execute([$id]);
    }

   
}
?>
