<?php
require_once __DIR__ . '/../config/database.php';

class LogroVideoModel {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Obtener todos los videos con info del logro
    public function getAll() {
        $stmt = $this->db->prepare("
            SELECT v.*, l.titulo AS titulo_logro
            FROM logros_especiales_videos v
            JOIN logros_especiales l ON v.logro_id = l.id
            ORDER BY v.fecha_subida DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener todos los logros (para select)
    public function getLogros() {
        $stmt = $this->db->prepare("SELECT id, titulo FROM logros_especiales ORDER BY titulo ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un video por ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM logros_especiales_videos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Agregar nuevo video
    public function add($logro_id, $codigo_video) {
        $stmt = $this->db->prepare("INSERT INTO logros_especiales_videos (logro_id, codigo_video) VALUES (?, ?)");
        return $stmt->execute([$logro_id, $codigo_video]);
    }

    // Actualizar video
    public function update($id, $codigo_video) {
        $stmt = $this->db->prepare("UPDATE logros_especiales_videos SET codigo_video = ? WHERE id = ?");
        return $stmt->execute([$codigo_video, $id]);
    }

    // Eliminar video
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM logros_especiales_videos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
