<?php
class UsuarioVideosModel
{
    private $db;
    private $nombreTabla = 'videos_usuario';

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function listar()
    {
        $sql = "SELECT videos.id, videos.codigo_video, videos.fecha_subida, videos.usuario_id, u.nombre AS nombre_usuario
            FROM $this->nombreTabla AS videos
            JOIN usuarios AS u ON videos.usuario_id = u.id
            ORDER BY videos.id DESC";

        $stmt = $this->db->query($sql);
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

    // Método para obtener videos por usuario_id para la web
    public function listarPorUsuarioId($usuario_id)
{
    $sql = "SELECT id, codigo_video, fecha_subida 
            FROM $this->nombreTabla 
            WHERE usuario_id = :usuario_id 
            ORDER BY fecha_subida DESC";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':usuario_id', $usuario_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
