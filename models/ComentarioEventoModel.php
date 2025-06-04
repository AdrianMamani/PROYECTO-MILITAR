<?php
class ComentarioEvento {
    private $db;
    private $tabla = 'comentarios_evento';

    public function __construct() {
        $this->db = Database::connect();
    }
     public function obtenerTodos() {
        $sql = "SELECT id, nombre FROM eventos";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerTodosConNombreEvento() {
    $query = "SELECT c.*, e.titulo AS nombre_evento 
              FROM {$this->tabla} c 
              JOIN eventos e ON c.evento_id = e.id 
              ORDER BY c.fecha_comentario ASC";
    $stmt = $this->db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    // Obtener todos los comentarios de un evento
    public function obtenerPorEvento($evento_id) {
        $query = "SELECT * FROM {$this->tabla} WHERE evento_id = ? ORDER BY fecha_comentario DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $evento_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un comentario por ID
    public function obtenerPorId($id) {
        $query = "SELECT * FROM {$this->tabla} WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Agregar un nuevo comentario
    public function agregar($evento_id, $nombre_usuario, $comentario) {
        $query = "INSERT INTO {$this->tabla} (evento_id, nombre_usuario, comentario) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $evento_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $nombre_usuario, PDO::PARAM_STR);
        $stmt->bindParam(3, $comentario, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Editar un comentario existente
    public function editar($id, $nombre_usuario, $comentario) {
        $query = "UPDATE {$this->tabla} SET nombre_usuario = ?, comentario = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $nombre_usuario, PDO::PARAM_STR);
        $stmt->bindParam(2, $comentario, PDO::PARAM_STR);
        $stmt->bindParam(3, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Eliminar un comentario
    public function eliminar($id) {
        $query = "DELETE FROM {$this->tabla} WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // para la web
    // Agregar un comentario desde la vista pública
    public function insertarComentario($evento_id, $nombre, $comentario) {
        try {
            $sql = "INSERT INTO comentarios_evento (evento_id, nombre_usuario, comentario, fecha_comentario) 
                    VALUES (?, ?, ?, NOW())";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$evento_id, $nombre, $comentario]);
        } catch (PDOException $e) {
            die("Error al insertar comentario: " . $e->getMessage());
        }
    }
}