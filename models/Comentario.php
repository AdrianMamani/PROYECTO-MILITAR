<?php
require_once 'config/database.php';

class Comentario {
    private $db;

    public function __construct() {
        $this->db = Database::connect(); // Conexión a la base de datos
    }

    // Obtener todos los comentarios
    public function getAll() {
        $query = $this->db->query("SELECT * FROM comentarios ORDER BY fecha DESC");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Agregar un comentario
    public function add($titulo, $subtitulo, $descripcion) {
        $stmt = $this->db->prepare("INSERT INTO comentarios (titulo, subtitulo, descripcion) VALUES (?, ?, ?)");
        return $stmt->execute([$titulo, $subtitulo, $descripcion]);
    }

    // Eliminar un comentario
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM comentarios WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
