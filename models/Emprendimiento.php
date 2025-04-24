<?php
require_once 'config/database.php';

class Emprendimiento {
    public  $db;

    public function __construct() {
        $this->db = Database::connect();
    }
    // Obtener los primeros tres emprendimientos
    public function getFirstThree() {
        $stmt = $this->db->query("SELECT * FROM emprendimientos LIMIT 3");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener todos los emprendimientos
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM emprendimientos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un emprendimiento por su ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM emprendimientos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Insertar un nuevo emprendimiento
    public function guardar($nombre, $descripcion, $contactos, $ubicacion, $segunda_descripcion) {
        $stmt = $this->db->prepare("INSERT INTO emprendimientos (nombre, descripcion, contactos, ubicacion, segunda_descripcion) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nombre, $descripcion, $contactos, $ubicacion, $segunda_descripcion]);
        return $this->db->lastInsertId();
    }

    // Actualizar un emprendimiento existente
    public function actualizar($id, $nombre, $descripcion, $contactos, $ubicacion, $segunda_descripcion) {
        $stmt = $this->db->prepare("UPDATE emprendimientos SET nombre = ?, descripcion = ?, contactos = ?, ubicacion = ?, segunda_descripcion = ? WHERE id = ?");
        $stmt->execute([$nombre, $descripcion, $contactos, $ubicacion, $segunda_descripcion, $id]);
    }

    // Insertar una imagen asociada a un emprendimiento
    public function insertarImagen($emprendimiento_id, $nombre_imagen) {
        $stmt = $this->db->prepare("INSERT INTO imagenes_emprendimientos (emprendimiento_id, nombre_imagen) VALUES (?, ?)");
        $stmt->execute([$emprendimiento_id, $nombre_imagen]);
    }

    // Obtener las imágenes asociadas a un emprendimiento
    public function obtenerImagenes($emprendimiento_id) {
        $stmt = $this->db->prepare("SELECT id, nombre_imagen FROM imagenes_emprendimientos WHERE emprendimiento_id = ?");
        $stmt->execute([$emprendimiento_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Eliminar un emprendimiento y sus imágenes
    public function eliminar($id) {
        // Obtener imágenes asociadas
        $imagenes = $this->obtenerImagenes($id);
        foreach ($imagenes as $imagen) {
            $file = 'assets/img/emprendimientos/' . $imagen['nombre_imagen'];
            if (file_exists($file)) {
                unlink($file);
            }
        }
        // Eliminar imágenes de la base de datos
        $stmt = $this->db->prepare("DELETE FROM imagenes_emprendimientos WHERE emprendimiento_id = ?");
        $stmt->execute([$id]);

        // Eliminar el emprendimiento
        $stmt = $this->db->prepare("DELETE FROM emprendimientos WHERE id = ?");
        $stmt->execute([$id]);
    }

    // Eliminar una imagen individual (archivo y registro)
    public function eliminarImagen($imagen_id) {
        // Obtener el nombre de la imagen
        $stmt = $this->db->prepare("SELECT nombre_imagen FROM imagenes_emprendimientos WHERE id = ?");
        $stmt->execute([$imagen_id]);
        $imagen = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($imagen) {
            $file = 'assets/img/emprendimientos/' . $imagen['nombre_imagen'];
            if (file_exists($file)) {
                unlink($file);
            }
        }
        // Eliminar el registro de la imagen
        $stmt = $this->db->prepare("DELETE FROM imagenes_emprendimientos WHERE id = ?");
        $stmt->execute([$imagen_id]);
    }
}
?>
