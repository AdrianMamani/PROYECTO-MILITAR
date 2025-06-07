<?php
class ComentariosModel
{
    private $db;
    private $nombreTabla = 'comentarios';

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function listar()
    {
        $sql = "SELECT comentarios.*
            FROM $this->nombreTabla AS comentarios
            ORDER BY comentarios.id DESC";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerTodos()
    {
        $query = "SELECT * FROM " . $this->nombreTabla . "";
        $stmt = $this->db->query($query);
        $usuariosItems = [];

        if ($stmt) {
            if ($stmt->rowCount() > 0) {
                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $usuariosItems[] = $fila;
                }
            }
        }

        return $usuariosItems;
    }


    public function guardar($nombre, $correo, $comentario)
    {
        $sql = "INSERT INTO $this->nombreTabla (nombre, correo, comentario)
            VALUES (:nombre, :correo, :comentario)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindValue(':correo', $correo, PDO::PARAM_STR);
        $stmt->bindValue(':comentario', $comentario, PDO::PARAM_STR);
        return $stmt->execute();
    }


    public function eliminar($id)
    {
        $stmt = $this->db->prepare("DELETE FROM $this->nombreTabla WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function contarComentarios() {
    $query = "SELECT COUNT(*) AS total FROM " . $this->nombreTabla;
    $stmt = $this->db->prepare($query);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultado['total'] ?? 0;
}
}
