<?php
require_once 'config/database.php';

class Nosotros {
    // Obtiene la información de la sección "Nosotros"
    public static function getNosotros() {
        $db = Database::connect();
        $stmt = $db->query("SELECT id, titulo, subtitulo, descripcion, descripcion2, imagen FROM nosotros");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
