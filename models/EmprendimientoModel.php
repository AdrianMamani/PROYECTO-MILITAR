<?php
class Emprendimiento {
    private $db;
    private $nombreTabla = 'emprendimiento'; // Nombre de la tabla actualizado

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

    public function obtenerEmprendimientoPorId($id) {
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

    public function agregarEmprendimiento($nombre_emprendimiento, $contacto, $ubicacion, $descripcion, $subdescripcion) { // Parámetros actualizados
        $query = "INSERT INTO " . $this->nombreTabla . " (nombre_emprendimiento, contacto, ubicacion, descripcion, subdescripcion) VALUES (?, ?, ?, ?, ?)"; // Query actualizada
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $nombre_emprendimiento, PDO::PARAM_STR);
        $stmt->bindParam(2, $contacto, PDO::PARAM_STR);
        $stmt->bindParam(3, $ubicacion, PDO::PARAM_STR);
        $stmt->bindParam(4, $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(5, $subdescripcion, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount() > 0;  // Cambié affected_rows por rowCount() de PDO
    }

    public function actualizarEmprendimiento($id, $nombre_emprendimiento, $contacto, $ubicacion, $descripcion, $subdescripcion) { // Parámetros actualizados
        $query = "UPDATE " . $this->nombreTabla . " SET nombre_emprendimiento = ?, contacto = ?, ubicacion = ?, descripcion = ?, subdescripcion = ? WHERE id = ?"; // Query actualizada
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $nombre_emprendimiento, PDO::PARAM_STR);
        $stmt->bindParam(2, $contacto, PDO::PARAM_STR);
        $stmt->bindParam(3, $ubicacion, PDO::PARAM_STR);
        $stmt->bindParam(4, $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(5, $subdescripcion, PDO::PARAM_STR);
        $stmt->bindParam(6, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;  // Cambié affected_rows por rowCount() de PDO
    }

    public function eliminarEmprendimiento($id) {
        $query = "DELETE FROM " . $this->nombreTabla . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;  // Cambié affected_rows por rowCount() de PDO
    }
}