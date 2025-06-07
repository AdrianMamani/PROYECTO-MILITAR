<?php
require_once 'config/Database.php';

class Usuario
{
    private $db;
    private $nombreTabla = 'usuarios';
    private $nombreTablaF = 'usuarios_fallecidos';

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function login($correo, $contraseña)
    {
        $db = new PDO("mysql:host=localhost;dbname=promocion", "root", "");
        $stmt = $db->prepare("SELECT * FROM usuarios_administrador WHERE correo = ? AND contraseña = ?");
        $stmt->execute([$correo, $contraseña]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // o false si no encuentra
    }

    public function listar()
    {
        $sql = "SELECT usuario.id, usuario.especialidad_id, usuario.nombre, usuario.descripcion, usuario.estado_vivo, usuario.fecha_registro, e.nombre AS nombre_especialidad
            FROM $this->nombreTabla AS usuario
            LEFT JOIN especialidades AS e ON usuario.especialidad_id = e.id
            ORDER BY usuario.id DESC";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarF()
    {
        $sql = "SELECT usuario.id, usuario.usuario_id, usuario.motivo_fallecimiento, usuario.fecha_fallecimiento, e.nombre AS nombre_especialidad, uv.nombre AS nombre_usuario
            FROM $this->nombreTablaF AS usuario
            LEFT JOIN usuarios AS uv ON usuario.usuario_id = uv.id
            LEFT JOIN especialidades AS e ON uv.especialidad_id = e.id
            ORDER BY usuario.id DESC";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerTodos()
    {
        $query = "SELECT * FROM " . $this->nombreTabla;
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

    public function registrar($nombre, $especialidad, $descripcion, $imagen)
    {
        $sql = "INSERT INTO $this->nombreTabla 
        (nombre, especialidad_id, descripcion, imagen_usuario) 
        VALUES (:nombre, :especialidad_id, :descripcion, :imagen_usuario)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindValue(':especialidad_id', $especialidad, PDO::PARAM_INT);
        $stmt->bindValue(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindValue(':imagen_usuario', $imagen, PDO::PARAM_STR);

        return $stmt->execute();
    }


    public function actualizar($nombre, $especialidad_id, $descripcion, $id)
    {
        $sql = "UPDATE $this->nombreTabla 
            SET nombre = :nombre,
                especialidad_id = :especialidad_id,
                descripcion = :descripcion
            WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindValue(':especialidad_id', $especialidad_id, PDO::PARAM_INT);
        $stmt->bindValue(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function registrarF($motivo, $fecha, $id)
    {
        $sqlInsert = "INSERT INTO $this->nombreTablaF 
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


    public function actualizarF($motivo, $fecha, $id)
    {
        $sql = "UPDATE $this->nombreTablaF
            SET motivo_fallecimiento = :motivo_fallecimiento,
                fecha_fallecimiento = :fecha_fallecimiento
            WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':motivo_fallecimiento', $motivo, PDO::PARAM_STR);
        $stmt->bindValue(':fecha_fallecimiento', $fecha, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }


    public function eliminar($id)
    {
        $stmt = $this->db->prepare("DELETE FROM $this->nombreTabla WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
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
}
