<?php
require_once __DIR__ . '../../config/database.php';

class NosotrosVideo {
    private $db;
    private $nombreTabla = 'nosotros_video';

    public function __construct() {
        $this->db = Database::connect();
    }

    public function obtenerTodos() {
        $query = "SELECT * FROM " . $this->nombreTabla . " ORDER BY fecha_subida DESC";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {
        $query = "SELECT * FROM " . $this->nombreTabla . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function agregar($codigoVideo) {
        if ($this->esCodigoValido($codigoVideo)) {
            $query = "INSERT INTO " . $this->nombreTabla . " (url_video) VALUES (?)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(1, $codigoVideo);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        }
        return false;
    }

    public function actualizar($id, $codigoVideo) {
        if ($this->esCodigoValido($codigoVideo)) {
            $query = "UPDATE " . $this->nombreTabla . " SET url_video = ? WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(1, $codigoVideo);
            $stmt->bindParam(2, $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        }
        return false;
    }

   public function deleteVideo($id) {
        try {
            $sql = "DELETE FROM nosotros_video WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al eliminar el video: " . $e->getMessage();
            return false;
        }
    }

    private function esCodigoValido($codigo) {
        // Un código de YouTube es siempre de 11 caracteres
        return strlen($codigo) === 11;
    }
}