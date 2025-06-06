<?php
class MiembrosImgModel
{
    private $db;
    private $nombreTabla = 'imagenes_usuario';
    public function __construct()
    {

        $this->db = Database::connect();
    }

    public function obtenerTodos()
    {
        $query = "SELECT im.*, m.nombre as nombre_miembro, m.id as id_miembro
              FROM " . $this->nombreTabla . " im
              LEFT JOIN miembros m ON im.usuario_id = m.id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function registrar($data)
    {
        $sql = "INSERT INTO imagenes_usuario (usuario_id, nombre_imagen) VALUES (:usuario_id, :nombre_imagen)";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) return false;

        $stmt->bindValue(':usuario_id', $data['miembro_id'], PDO::PARAM_INT);
        $stmt->bindValue(':nombre_imagen', $data['imagen_usuario']);

        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function obtenerPorId($id)
    {
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

    public function actualizar($id, $data)
    {
        $sql = "UPDATE imagenes_usuario SET usuario_id = :usuario_id, nombre_imagen = :nombre_imagen WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':usuario_id' => $data['miembro_id'],
            ':nombre_imagen' => $data['imagen_usuario'],
            ':id' => $id
        ]);
    }

    public function eliminar($id)
    {
        $query = "DELETE FROM " . $this->nombreTabla . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0; 
    }
}
