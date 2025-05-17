<?php
class Miembros {
    private $db;
    private $nombreTabla = 'miembros'; // Nombre de la tabla actualizado

    public function __construct() {
        // Obtiene la conexión a la base de datos desde la clase Database
        $this->db = Database::connect();
    }

public function obtenerTodos() {
    $query = "SELECT m.*, e.nombre as nombre_especialidad 
              FROM " . $this->nombreTabla . " m
              LEFT JOIN especialidades e ON m.especialidad_id = e.id";
    $stmt = $this->db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    public function obtenerTodas() {
        $query = "SELECT * FROM especialidades";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function obtenerMiembrosPorId($id) {
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

        public function agregarMiembros($nombre, $descripcion, $especialidad_id, $nombre_imagen) {
            $query = "INSERT INTO miembros (nombre, descripcion, especialidad_id, nombre_imagen) 
                    VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
            $stmt->bindParam(2, $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(3, $especialidad_id, PDO::PARAM_INT);
            $stmt->bindParam(4, $nombre_imagen, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        }


public function actualizarMiembros($id, $nombre, $descripcion, $especialidad_id, $nombre_imagen) {
    $query = "UPDATE miembros 
              SET nombre = ?, descripcion = ?, especialidad_id = ?, nombre_imagen = ? 
              WHERE id = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
    $stmt->bindParam(2, $descripcion, PDO::PARAM_STR);
    $stmt->bindParam(3, $especialidad_id, PDO::PARAM_INT);
    $stmt->bindParam(4, $nombre_imagen, PDO::PARAM_STR);
    $stmt->bindParam(5, $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount() > 0;
}




    public function eliminarMiembros($id) {
        $query = "DELETE FROM " . $this->nombreTabla . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;  // Cambié affected_rows por rowCount() de PDO
    }
}