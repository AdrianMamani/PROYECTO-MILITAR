<?php
require_once 'config/database.php';

class Blog {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Obtiene todos los blogs
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM blog");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtiene un blog por su ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM blog WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Obtiene las imágenes asociadas a un blog
    public function obtenerImagenes($blog_id) {
        $stmt = $this->db->prepare("SELECT id, nombre_imagen FROM imagenes_blog WHERE blog_id = ?");
        $stmt->execute([$blog_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
