<?php
class Evento {
    private $db;
    private $nombreTabla = 'eventos';

    public function __construct() {
        $this->db = Database::connect();
    }

    // Obtener todos los eventos
    public function obtenerTodos() {
        $query = "SELECT * FROM " . $this->nombreTabla . " ORDER BY fecha DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener evento por ID
    public function obtenerEventoPorId($id) {
        $query = "SELECT * FROM " . $this->nombreTabla . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    // Agregar nuevo evento
    public function agregarEvento($titulo, $fecha, $descripcion, $direccion, $latitud, $longitud) {
        $query = "INSERT INTO " . $this->nombreTabla . " (titulo, fecha, descripcion, direccion, latitud, longitud) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $titulo, PDO::PARAM_STR);
        $stmt->bindParam(2, $fecha, PDO::PARAM_STR); // Formato YYYY-MM-DD
        $stmt->bindValue(3, $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(4, $direccion, PDO::PARAM_STR);
        $stmt->bindParam(5, $latitud, PDO::PARAM_STR);
        $stmt->bindParam(6, $longitud, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Actualizar evento
    public function actualizarEvento($id, $titulo, $descripcion, $fecha, $direccion, $latitud, $longitud) {
        $query = "UPDATE " . $this->nombreTabla . " SET titulo = ?, fecha = ?, descripcion = ?, direccion = ?, latitud = ?, longitud = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $titulo, PDO::PARAM_STR);
        $stmt->bindParam(2, $fecha, PDO::PARAM_STR);
        $stmt->bindParam(3, $descripcion, PDO::PARAM_STR);
        $stmt->bindValue(4, $direccion, PDO::PARAM_STR);
        $stmt->bindParam(5, $latitud, PDO::PARAM_STR);
        $stmt->bindParam(6, $longitud, PDO::PARAM_STR);
        $stmt->bindParam(7, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Eliminar evento
    public function eliminarEvento($id) {
        $query = "DELETE FROM " . $this->nombreTabla . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function contarEventos() {
    $query = "SELECT COUNT(*) AS total FROM " . $this->nombreTabla;
    $stmt = $this->db->prepare($query);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultado['total'] ?? 0;
}
}