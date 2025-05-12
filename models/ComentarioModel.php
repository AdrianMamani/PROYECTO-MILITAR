<?php
class Comentario {
    private $db;
    private $nombreTabla = 'comentarios'; // Nombre de la tabla actualizado

    public function __construct() {
        // Obtiene la conexión a la base de datos desde la clase Database
        $this->db = Database::connect();
    }

    public function obtenerTodos() {
        $query = "SELECT * FROM " . $this->nombreTabla;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $comentarioModel = [];
        if ($stmt->rowCount() > 0) {  // Cambié num_rows a rowCount()
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {  // Usando fetch de PDO
                $comentarioModel[] = $fila;
            }
        }
        return $comentarioModel;
    }

    public function obtenercomentarioPorId($id) {
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

    public function agregarComentario($titulo, $subtitulo, $descripcion) { // Parámetros actualizados
        $query = "INSERT INTO " . $this->nombreTabla . " (titulo, subtitulo, descripcion) VALUES (?, ?, ?)"; // Query actualizada
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $titulo, PDO::PARAM_STR);
        $stmt->bindParam(2, $subtitulo, PDO::PARAM_STR);
        $stmt->bindParam(3, $descripcion, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount() > 0; // Cambié affected_rows por rowCount() de PDO
    }


    public function actualizarComentario($id, $titulo, $subtitulo, $descripcion) { // Parámetros actualizados
        $query = "UPDATE " . $this->nombreTabla . " SET titulo = ?, subtitulo = ?, descripcion = ? WHERE id = ?"; // Query actualizada
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $titulo, PDO::PARAM_STR);
        $stmt->bindParam(2, $subtitulo, PDO::PARAM_STR);
        $stmt->bindParam(3, $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(4, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0; // Cambié affected_rows por rowCount() de PDO
    }


    public function eliminarComentario($id) {
        $query = "DELETE FROM " . $this->nombreTabla . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;  // Cambié affected_rows por rowCount() de PDO
    }
}