<?php
require_once './config/database.php';

class EmprendimientoVideoModel {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Obtener todos los videos con info del emprendimiento
    public function getAll() {
        $stmt = $this->db->prepare("
            SELECT v.*, e.nombre_emprendimiento AS nombre_emprendimiento
            FROM videos_emprendimiento v
            JOIN emprendimiento e ON v.emprendimiento_id = e.id
            ORDER BY v.fecha_subida DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener todos los emprendimientos (para select)
    public function getEmprendimientos() {
        $stmt = $this->db->prepare("SELECT id, nombre_emprendimiento FROM emprendimiento ORDER BY nombre_emprendimiento ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un video por ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM videos_emprendimiento WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Agregar nuevo video
    public function add($emprendimiento_id, $codigo_video) {
        $stmt = $this->db->prepare("INSERT INTO videos_emprendimiento (emprendimiento_id, codigo_video) VALUES (?, ?)");
        return $stmt->execute([$emprendimiento_id, $codigo_video]);
    }

    // Actualizar video
    public function update($id, $codigo_video) {
        $stmt = $this->db->prepare("UPDATE videos_emprendimiento SET codigo_video = ? WHERE id = ?");
        return $stmt->execute([$codigo_video, $id]);
    }

    // Eliminar video
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM videos_emprendimiento WHERE id = ?");
        return $stmt->execute([$id]);
    }
}