<?php
class ComentarioEmprendimiento {
    private $db;
    private $nombreTabla = 'comentarios_emprendimiento'; // Nombre exacto de tu tabla

    public function __construct() {
        $this->db = Database::connect();
    }
// Método para obtener todos los comentarios de emprendimientos
    public function obtenerTodos() {
        $query = "SELECT 
            ce.id,
            ce.comentario_id,
            ce.nombre,
            ce.correo,
            ce.mensaje,
            e.nombre_emprendimiento
        FROM {$this->nombreTabla} ce
        LEFT JOIN emprendimiento e ON ce.comentario_id = e.id
        ORDER BY ce.id DESC";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
// Método para obtener un comentario por ID
    public function obtenerComentarioPorId($id) {
        $query = "SELECT 
            ce.id,
            ce.comentario_id,
            ce.nombre,
            ce.correo,
            ce.mensaje
        FROM {$this->nombreTabla} ce
        WHERE ce.id = ?";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
// Método para agregar un nuevo comentario
    public function agregarComentario($comentario_id, $nombre, $correo, $mensaje) {
        $query = "INSERT INTO {$this->nombreTabla} 
                 (comentario_id, nombre, correo, mensaje) 
                 VALUES (:comentario_id, :nombre, :correo, :mensaje)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':comentario_id', $comentario_id, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->bindParam(':mensaje', $mensaje, PDO::PARAM_STR);
        return $stmt->execute();
    }
// Método para actualizar un comentario por ID
    public function actualizarComentario($id, $comentario_id, $nombre, $correo, $mensaje) {
        $query = "UPDATE {$this->nombreTabla} 
                 SET comentario_id = :comentario_id, 
                     nombre = :nombre, 
                     correo = :correo, 
                     mensaje = :mensaje 
                 WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':comentario_id', $comentario_id, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->bindParam(':mensaje', $mensaje, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
// Método para eliminar un comentario por ID
    public function eliminarComentario($id) {
        $query = "DELETE FROM {$this->nombreTabla} WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
// Método para obtener comentarios por emprendimiento_id
    public function obtenerPorEmprendimiento($emprendimiento_id) {
    $query = "SELECT * FROM {$this->nombreTabla} WHERE comentario_id = :emprendimiento_id ORDER BY id DESC";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':emprendimiento_id', $emprendimiento_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}