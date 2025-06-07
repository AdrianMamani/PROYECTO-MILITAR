<?php
class Emprendimiento {
    private $db;
    private $nombreTabla = 'emprendimiento';

    public function __construct() {
        $this->db = Database::connect();
    }

    public function obtenerTodos() {
        $query = "SELECT * FROM " . $this->nombreTabla;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $carruselItems = [];
        if ($stmt->rowCount() > 0) {
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
        if ($stmt->rowCount() == 1) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

    public function agregarEmprendimiento($nombre_emprendimiento, $contacto, $ubicacion, $descripcion, $subdescripcion, $facebook, $instagram, $whatsapp) {
        $query = "INSERT INTO " . $this->nombreTabla . " 
            (nombre_emprendimiento, contacto, ubicacion, descripcion, subdescripcion, facebook, instagram, whatsapp) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $nombre_emprendimiento, PDO::PARAM_STR);
        $stmt->bindParam(2, $contacto, PDO::PARAM_STR);
        $stmt->bindParam(3, $ubicacion, PDO::PARAM_STR);
        $stmt->bindParam(4, $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(5, $subdescripcion, PDO::PARAM_STR);
        $stmt->bindParam(6, $facebook, PDO::PARAM_STR);
        $stmt->bindParam(7, $instagram, PDO::PARAM_STR);
        $stmt->bindParam(8, $whatsapp, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function actualizarEmprendimiento($id, $nombre_emprendimiento, $contacto, $ubicacion, $descripcion, $subdescripcion, $facebook, $instagram, $whatsapp) {
        $query = "UPDATE " . $this->nombreTabla . " SET 
            nombre_emprendimiento = ?, 
            contacto = ?, 
            ubicacion = ?, 
            descripcion = ?, 
            subdescripcion = ?, 
            facebook = ?, 
            instagram = ?, 
            whatsapp = ? 
            WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $nombre_emprendimiento, PDO::PARAM_STR);
        $stmt->bindParam(2, $contacto, PDO::PARAM_STR);
        $stmt->bindParam(3, $ubicacion, PDO::PARAM_STR);
        $stmt->bindParam(4, $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(5, $subdescripcion, PDO::PARAM_STR);
        $stmt->bindParam(6, $facebook, PDO::PARAM_STR);
        $stmt->bindParam(7, $instagram, PDO::PARAM_STR);
        $stmt->bindParam(8, $whatsapp, PDO::PARAM_STR);
        $stmt->bindParam(9, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function eliminarEmprendimiento($id) {
        $query = "DELETE FROM " . $this->nombreTabla . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
    public function actualizarRedesSociales($id, $facebook, $instagram, $whatsapp) {
    $sql = "UPDATE " . $this->nombreTabla . " SET facebook = ?, instagram = ?, whatsapp = ? WHERE id = ?";

    $stmt = $this->db->prepare($sql);
    return $stmt->execute([$facebook, $instagram, $whatsapp, $id]);
}
}
