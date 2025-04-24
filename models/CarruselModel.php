<?php
require_once 'config/database.php';

class CarruselModel {
    public static function obtenerDiapositivas() {
        try {
            $db = Database::connect();
            $stmt = $db->prepare("SELECT id, titulo, subtitulo, descripcion, imagen FROM carrusel");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error en la consulta: " . $e->getMessage());
        }
    }
}
?>
