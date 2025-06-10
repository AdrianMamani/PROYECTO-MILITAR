<?php
require_once __DIR__ . '../../config/database.php';

class MiembrosModel
{
    private $db;
    private $nombreTabla = 'usuarios';
    private $nombreTablaF = 'usuarios_fallecidos';
    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function obtenerTodos()
    {
        $query = "SELECT m.*, e.nombre as nombre_especialidad 
              FROM " . $this->nombreTabla . " m
              LEFT JOIN especialidades e ON m.especialidad_id = e.id
              WHERE m.estado_vivo = 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerTodosM()
    {
        $query = "SELECT m.*, e.nombre as nombre_especialidad 
              FROM " . $this->nombreTabla . " m
              LEFT JOIN especialidades e ON m.especialidad_id = e.id
              WHERE m.estado_vivo = 2";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerTodosF()
    {
        $query = "SELECT mf.*, m.nombre as nombre_usuario 
              FROM " . $this->nombreTablaF . " mf
              LEFT JOIN usuarios m ON mf.usuario_id = m.id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function registrarF($id, $motivo, $fecha)
    {
        $sqlInsert = "INSERT INTO usuarios_fallecidos 
        (usuario_id, motivo_fallecimiento, fecha_fallecimiento) 
        VALUES (:usuario_id, :motivo_fallecimiento, :fecha_fallecimiento)";

        $stmtInsert = $this->db->prepare($sqlInsert);
        $stmtInsert->bindValue(':usuario_id', $id, PDO::PARAM_STR);
        $stmtInsert->bindValue(':motivo_fallecimiento', $motivo, PDO::PARAM_STR);
        $stmtInsert->bindValue(':fecha_fallecimiento', $fecha, PDO::PARAM_STR);

        $insertSuccess = $stmtInsert->execute();

        if ($insertSuccess) {
            $sqlUpdate = "UPDATE $this->nombreTabla SET estado_vivo = 2 WHERE id = :id";
            $stmtUpdate = $this->db->prepare($sqlUpdate);
            $stmtUpdate->bindValue(':id', $id, PDO::PARAM_INT);
            return $stmtUpdate->execute();
        }

        return false;
    }

    public function actualizarF($id, $motivo, $fecha)
    {
        $sql = "UPDATE usuarios_fallecidos SET motivo_fallecimiento = ?, fecha_fallecimiento = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$motivo, $fecha, $id]);
    }

    public function eliminarF($id)
    {
        $stmtSelect = $this->db->prepare("SELECT usuario_id FROM $this->nombreTablaF WHERE id = :id");
        $stmtSelect->bindValue(':id', $id, PDO::PARAM_INT);
        $stmtSelect->execute();
        $row = $stmtSelect->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $usuario_id = $row['usuario_id'];

            $stmtDeleteF = $this->db->prepare("DELETE FROM $this->nombreTablaF WHERE id = :id");
            $stmtDeleteF->bindValue(':id', $id, PDO::PARAM_INT);
            $deleteSuccess = $stmtDeleteF->execute();

            if ($deleteSuccess) {
                $stmtDeleteU = $this->db->prepare("DELETE FROM $this->nombreTabla WHERE id = :usuario_id");
                $stmtDeleteU->bindValue(':usuario_id', $usuario_id, PDO::PARAM_INT);
                return $stmtDeleteU->execute();
            }
        }

        return false;
    }

    public function obtenerTodas()
    {
        $query = "SELECT * FROM especialidades";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function obtenerMiembrosPorId($id)
    {
        $query = "SELECT * FROM " . $this->nombreTabla . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() == 1) {  // Cambié num_rows a rowCount()
            return $stmt->fetch(PDO::FETCH_ASSOC);  // Usando fetch de PDO
        } else {
            return null;
        }
    }

    public function agregarMiembros($nombre, $descripcion, $especialidad_id, $imagen)
    {
        $query = "INSERT INTO usuarios (nombre, descripcion, especialidad_id, imagen_usuario) 
                    VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
        $stmt->bindParam(2, $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(3, $especialidad_id, PDO::PARAM_INT);
        $stmt->bindParam(4, $imagen, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }


    public function actualizarMiembros($id, $nombre, $descripcion, $especialidad_id, $imagen)
    {
        $sql = "UPDATE usuarios SET nombre = ?, descripcion = ?, especialidad_id = ?, imagen_usuario = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nombre, $descripcion, $especialidad_id, $imagen, $id]);
    }

    public function obtenerPorId($id)
    {
        $query = "SELECT u.*, e.nombre AS especialidad_nombre
              FROM {$this->nombreTabla} u
              LEFT JOIN especialidades e ON u.especialidad_id = e.id
              WHERE u.id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    public function eliminarMiembros($id)
    {
        $query = "DELETE FROM " . $this->nombreTabla . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;  // Cambié affected_rows por rowCount() de PDO
    }

    public function obtenerPorEspecialidad($especialidadId)
    {
        $query = "SELECT * FROM usuarios WHERE especialidad_id = :id AND estado_vivo = 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $especialidadId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
}
