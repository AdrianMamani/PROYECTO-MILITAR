<?php
class VideoEventoModel {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Obtener todos los videos con título del evento
    public function getAll() {
        $query = "SELECT 
            ve.id,
            ve.evento_id,
            ve.codigo_video,
            ve.fecha_subida,
            e.titulo AS titulo_evento
        FROM videos_evento ve
        JOIN eventos e ON ve.evento_id = e.id
        ORDER BY ve.id DESC";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener lista de eventos
    public function getEventos() {
        $query = "SELECT id, titulo FROM eventos";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Agregar video de YouTube (solo ID del video)
    public function add($evento_id, $codigo_video) {
        $query = "INSERT INTO videos_evento (evento_id, codigo_video) 
                  VALUES (:evento_id, :codigo_video)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':evento_id', $evento_id);
        $stmt->bindParam(':codigo_video', $codigo_video);
        return $stmt->execute();
    }

    // Actualizar el ID del video de YouTube
    public function update($id, $codigo_video) {
        $query = "UPDATE videos_evento 
                  SET codigo_video = :codigo_video 
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':codigo_video', $codigo_video);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Eliminar video (solo de la base de datos)
    public function delete($id) {
        $query = "DELETE FROM videos_evento WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Obtener video por ID
    public function getById($id) {
        $sql = "SELECT * FROM videos_evento WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}