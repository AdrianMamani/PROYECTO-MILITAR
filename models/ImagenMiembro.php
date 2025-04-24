<?php
require_once 'config/database.php';

class ImagenMiembro {
    // Inserta una nueva imagen para un miembro
    public static function insertar($miembroId, $nombreImagen) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO imagenes_miembros (miembro_id, nombre_imagen) VALUES (?, ?)");
        $stmt->execute([$miembroId, $nombreImagen]);
    }

    // Devuelve todas las imágenes asociadas a un miembro
    public static function obtenerImagenesPorMiembro($miembroId) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT nombre_imagen FROM imagenes_miembros WHERE miembro_id = ?");
        $stmt->execute([$miembroId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
