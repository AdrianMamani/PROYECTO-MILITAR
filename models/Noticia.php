<?php
require_once 'config/database.php';

class Noticia {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Obtener todas las noticias
    public function getAll() {
        $query = $this->db->query("SELECT * FROM noticias ORDER BY id DESC");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener una noticia por su ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM noticias WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerImagenes($noticia_id) {
        $stmt = $this->db->prepare("SELECT id, nombre_imagen FROM imagenes_noticias WHERE noticia_id = ?");
        $stmt->execute([$noticia_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>
