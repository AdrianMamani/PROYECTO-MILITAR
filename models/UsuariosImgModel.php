<?php
class UsuariosImgModel
{
    private $db;
    private $nombreTabla = 'imagenes_usuario';

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function listar()
    {
        $sql = "SELECT img.id, img.nombre_imagen, img.fecha_subida, img.usuario_id, u.nombre AS nombre_usuario
            FROM $this->nombreTabla AS img
            JOIN usuarios AS u ON img.usuario_id = u.id
            ORDER BY img.id ASC";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function registrar($imagen, $usuario_id)
    {
        $sql = "INSERT INTO $this->nombreTabla (nombre_imagen, usuario_id) VALUES (:nombre_imagen, :usuario_id)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nombre_imagen', $imagen, PDO::PARAM_STR);
        $stmt->bindValue(':usuario_id', $usuario_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function actualizar($id, $imagen, $usuario_id)
    {
        $stmt = $this->db->prepare("UPDATE $this->nombreTabla SET nombre_imagen = :nombre_imagen, usuario_id = :usuario_id WHERE id = :id");
        $stmt->bindValue(':nombre_imagen', $imagen, PDO::PARAM_STR);
        $stmt->bindValue(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function obtenerPorId($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM $this->nombreTabla WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    public function eliminar($id)
    {
        $stmt = $this->db->prepare("DELETE FROM $this->nombreTabla WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // para la web

    public function listarPorUsuarioId($usuario_id)
{
    $sql = "SELECT * FROM $this->nombreTabla 
            WHERE usuario_id = :usuario_id 
            ORDER BY fecha_subida ASC";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':usuario_id', $usuario_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}
