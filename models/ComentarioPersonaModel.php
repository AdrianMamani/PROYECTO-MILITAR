<?php
class ComentarioPersona {
    private $db;
    private $tabla = 'comentarios_persona';

    public function __construct() {
        $this->db = Database::connect();
    }

    // Obtener todos los usuarios
    public function obtenerTodosUsuarios() {
        $sql = "SELECT id, nombre FROM usuarios";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener todos los comentarios con nombre del usuario
    public function obtenerTodosConNombrePersona() {
        $query = "SELECT c.*, u.nombre AS nombre_persona 
                  FROM {$this->tabla} c 
                  JOIN usuarios u ON c.persona_id = u.id 
                  ORDER BY c.fecha_comentario ASC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener todos los comentarios de un evento
    public function obtenerPorEvento($evento_id) {
        $query = "SELECT c.*, u.nombre AS nombre_persona 
                  FROM {$this->tabla} c 
                  JOIN usuarios u ON c.persona_id = u.id 
                  WHERE c.evento_id = ? 
                  ORDER BY c.fecha_comentario DESC";
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

    // Agregar un nuevo comentario (administración)
    public function agregar($evento_id, $persona_id, $comentario) {
        $query = "INSERT INTO {$this->tabla} (evento_id, persona_id, comentario) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $evento_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $persona_id, PDO::PARAM_INT);
        $stmt->bindParam(3, $comentario, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Editar un comentario existente
    public function editar($id, $persona_id, $comentario) {
        $query = "UPDATE {$this->tabla} SET persona_id = ?, comentario = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $persona_id, PDO::PARAM_INT);
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

    // Agregar un comentario desde la vista pública (sin usuario registrado)
    public function insertarComentario($persona_id, $nombre, $comentario) {
        try {
            $sql = "INSERT INTO comentarios_persona (persona_id, nombre_usuario, comentario, fecha_comentario) 
                    VALUES (?, ?, ?, NOW())";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$persona_id, $nombre, $comentario]);
        } catch (PDOException $e) {
            die("Error al insertar comentario: " . $e->getMessage());
        }
    }
    public function obtenerPorPersonaId($persona_id) {
    $query = "SELECT c.*, u.nombre AS nombre_persona 
              FROM {$this->tabla} c 
              JOIN usuarios u ON c.persona_id = u.id 
              WHERE c.persona_id = ? 
              ORDER BY c.fecha_comentario DESC";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(1, $persona_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}