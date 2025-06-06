<?php
require_once __DIR__ . '../../config/database.php';
class NosotrosAdmin {
    private $db;
    private $nombreTabla = 'nosotros'; // Nombre de la tabla actualizado

    public function __construct() {
        // Obtiene la conexión a la base de datos desde la clase Database
        $this->db = Database::connect();
    }

    public function obtenerTodos() {
        $query = "SELECT * FROM " . $this->nombreTabla;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $nosotrosItems = [];
        if ($stmt->rowCount() > 0) {  // Cambié num_rows a rowCount()
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {  // Usando fetch de PDO
                $nosotrosItems[] = $fila;
            }
        }
        return $nosotrosItems;
    }

    public function obtenerNosotrosPorId($id) {
        $query = "SELECT * FROM " . $this->nombreTabla . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() == 1) {  // Cambié num_rows a rowCount()
            return $stmt->fetch(PDO::FETCH_ASSOC);  // Usando fetch de PDO
        } else {
            return null;
        }
    }

    public function agregarNosotros($titulo, $descripcion, $mision, $vision) { // Parámetros actualizados
        $query = "INSERT INTO " . $this->nombreTabla . " (titulo, descripcion, mision, vision) VALUES (?, ?, ?, ?)"; // Query actualizada
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $titulo, PDO::PARAM_STR);
        $stmt->bindParam(2, $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(3, $mision, PDO::PARAM_STR);
        $stmt->bindParam(4, $vision, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount() > 0;  // Cambié affected_rows por rowCount() de PDO
    }

    public function actualizarNosotros($id, $titulo, $descripcion, $mision, $vision) { // Parámetros actualizados
        $query = "UPDATE " . $this->nombreTabla . " SET titulo = ?, descripcion = ?,  mision = ?,  vision = ?  WHERE id = ?"; // Query actualizada
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $titulo, PDO::PARAM_STR);
        $stmt->bindParam(2, $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(3, $mision, PDO::PARAM_STR);
        $stmt->bindParam(4, $vision, PDO::PARAM_STR);
        $stmt->bindParam(5, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;  // Cambié affected_rows por rowCount() de PDO
    }

    public function eliminarCarrusel($id) {
        $query = "DELETE FROM " . $this->nombreTabla . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;  // Cambié affected_rows por rowCount() de PDO
    }
}
?>