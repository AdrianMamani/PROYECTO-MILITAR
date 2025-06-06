<?php
class MiembrosVideosModel
{
    private $db;
    private $nombreTabla = 'videos_usuario';

    public function __construct()
    {
        $this->db = Database::connect();
    }


    public function obtenerTodos()
    {
        $query = "SELECT iv.*, m.nombre as nombre_miembro, m.id as id_miembro
              FROM " . $this->nombreTabla . " iv
              LEFT JOIN miembros m ON iv.usuario_id = m.id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function registrar($usuario_id, $codigo)
    {
        $sql = "INSERT INTO $this->nombreTabla (usuario_id, codigo_video) VALUES (:usuario_id, :codigo_video)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':usuario_id', $usuario_id, PDO::PARAM_STR);
        $stmt->bindValue(':codigo_video', $codigo, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function actualizar($id, $usuario_id, $codigo)
    {
        $stmt = $this->db->prepare("UPDATE $this->nombreTabla SET usuario_id = :usuario_id, codigo_video = :codigo_video WHERE id = :id");
        $stmt->bindValue(':usuario_id', $usuario_id, PDO::PARAM_STR);
        $stmt->bindValue(':codigo_video', $codigo, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function eliminar($id)
    {
        $stmt = $this->db->prepare("DELETE FROM $this->nombreTabla WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
