<?php
require_once __DIR__ . '/../config/Database.php';

class AportacionesModel {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getAll() {
        $query = "SELECT * FROM usuarios_aporte ORDER BY fecha_registro DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM usuarios_aporte WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $query = "INSERT INTO usuarios_aporte (nombre, descripcion, fecha_registro) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$data['nombre'], $data['descripcion'], $data['fecha_registro']]);
    }

    public function update($id, $data) {
        $query = "UPDATE usuarios_aporte SET nombre = ?, descripcion = ?, fecha_registro = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$data['nombre'], $data['descripcion'], $data['fecha_registro'], $id]);
    }

    public function delete($id) {
        $query = "DELETE FROM usuarios_aporte WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id]);
    }
}
?>