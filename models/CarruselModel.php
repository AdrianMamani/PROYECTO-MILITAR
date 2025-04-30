<?php
class Carrusel {
    private $db;
    private $nombreTabla = 'carrusel_name'; // Nombre de la tabla actualizado

    public function __construct() {
        // Obtiene la conexión a la base de datos desde la clase Database
        $this->db = Database::connect();
    }

    public function obtenerTodos() {
        $query = "SELECT * FROM " . $this->nombreTabla;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $carruselItems = [];
        if ($stmt->rowCount() > 0) {  // Cambié num_rows a rowCount()
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {  // Usando fetch de PDO
                $carruselItems[] = $fila;
            }
        }
        return $carruselItems;
    }

    public function obtenerCarruselPorId($id) {
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

    public function agregarCarrusel($titulo, $descripcion) { // Parámetros actualizados
        $query = "INSERT INTO " . $this->nombreTabla . " (titulo, descripcion) VALUES (?, ?)"; // Query actualizada
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $titulo, PDO::PARAM_STR);
        $stmt->bindParam(2, $descripcion, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount() > 0;  // Cambié affected_rows por rowCount() de PDO
    }

    public function actualizarCarrusel($id, $titulo, $descripcion) { // Parámetros actualizados
        $query = "UPDATE " . $this->nombreTabla . " SET titulo = ?, descripcion = ? WHERE id = ?"; // Query actualizada
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $titulo, PDO::PARAM_STR);
        $stmt->bindParam(2, $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(3, $id, PDO::PARAM_INT);
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