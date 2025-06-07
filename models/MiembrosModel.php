<?php
require_once __DIR__ . '../../config/database.php';

class MiembrosModel
{
    private $db;
    private $nombreTabla = 'usuarios';

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function obtenerTodos()
    {
        $query = "SELECT * FROM " . $this->nombreTabla . " WHERE estado_vivo = 1";
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


    public function obtenerTodosF()
    {
        $query = "SELECT * FROM " . $this->nombreTabla . " WHERE estado_vivo != 1";
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

    public function obtenerPorId($id)
{
    $query = "SELECT u.*, 
                     e.nombre AS especialidad_nombre,
                     uf.motivo_fallecimiento,
                     uf.fecha_fallecimiento
              FROM " . $this->nombreTabla . " u
              JOIN especialidades e ON u.especialidad_id = e.id
              LEFT JOIN usuarios_fallecidos uf ON u.id = uf.usuario_id
              WHERE u.id = ?";
    $stmt = $this->db->prepare($query);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// para la web de fallecidos
public function obtenerPorIdFallecido($id)
{
    $query = "SELECT u.*, e.nombre AS especialidad_nombre, uf.motivo_fallecimiento, uf.fecha_fallecimiento
              FROM " . $this->nombreTabla . " u
              JOIN especialidades e ON u.especialidad_id = e.id
              JOIN usuarios_fallecidos uf ON u.id = uf.usuario_id
              WHERE u.id = ? AND u.estado_vivo != 1";
    
    $stmt = $this->db->prepare($query);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function obtenerPorEspecialidad($idEspecialidad) {
        $query = "SELECT * FROM " . $this->nombreTabla . " WHERE especialidad_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $idEspecialidad, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
