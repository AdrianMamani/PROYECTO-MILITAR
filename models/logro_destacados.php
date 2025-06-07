<?php
class Logros_descatado {
    private $db;
    private $nombreTabla = 'logros_especiales';

    public function __construct() {
        $this->db = Database::connect();
    }

    // Obtener todos los logros destacados
    public function obtenerTodos() {
        $query = "SELECT * FROM " . $this->nombreTabla . " ORDER BY fecha DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener logros destacados por ID
    public function obtenerLogroPorId($id) {
        $query = "SELECT * FROM " . $this->nombreTabla . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    // Agregar nuevo logro destacado
    public function agregarLogro($titulo, $fecha, $descripcion) {
        $query = "INSERT INTO " . $this->nombreTabla . " (titulo, fecha, descripcion) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $titulo, PDO::PARAM_STR);
        $stmt->bindParam(2, $fecha, PDO::PARAM_STR); // Formato YYYY-MM-DD
        $stmt->bindValue(3, $descripcion, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Actualizar logro destacado
    public function actualizarLogro($id, $titulo, $descripcion, $fecha) {
        $query = "UPDATE " . $this->nombreTabla . " SET titulo = ?, fecha = ?, descripcion = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $titulo, PDO::PARAM_STR);
        $stmt->bindParam(2, $fecha, PDO::PARAM_STR);
        $stmt->bindParam(3, $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(4, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Eliminar 
    public function eliminarLogro($id) {
        $query = "DELETE FROM " . $this->nombreTabla . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
// Contar total de logros destacados
    public function contarLogros() {
    $query = "SELECT COUNT(*) AS total FROM " . $this->nombreTabla;
    $stmt = $this->db->prepare($query);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultado['total'] ?? 0;
}
}