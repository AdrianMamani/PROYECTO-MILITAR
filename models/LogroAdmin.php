<?php
require_once 'config/database.php';

class LogroAdmin {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Obtiene todos los logros
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM logros");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtiene un logro por su ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM logros WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Guarda un nuevo logro y retorna su ID
    public function guardar($titulo, $subtitulo, $descripcion) {
        $stmt = $this->db->prepare("INSERT INTO logros (titulo, subtitulo, descripcion) VALUES (?, ?, ?)");
        $stmt->execute([$titulo, $subtitulo, $descripcion]);
        return $this->db->lastInsertId();
    }

    // Actualiza un logro existente
    public function actualizar($id, $titulo, $subtitulo, $descripcion) {
        $stmt = $this->db->prepare("UPDATE logros SET titulo = ?, subtitulo = ?, descripcion = ? WHERE id = ?");
        $stmt->execute([$titulo, $subtitulo, $descripcion, $id]);
    }

    // Inserta una imagen asociada a un logro (tabla imagenes_logros)
    public function insertarImagen($logro_id, $nombre_imagen) {
        $stmt = $this->db->prepare("INSERT INTO imagenes_logros (logro_id, nombre_imagen) VALUES (?, ?)");
        $stmt->execute([$logro_id, $nombre_imagen]);
    }

    // Obtiene las imágenes asociadas a un logro
    public function obtenerImagenes($logro_id) {
        $stmt = $this->db->prepare("SELECT id, nombre_imagen FROM imagenes_logros WHERE logro_id = ?");
        $stmt->execute([$logro_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Elimina una imagen individual asociada a un logro
    public function eliminarImagen($imagen_id) {
        $stmt = $this->db->prepare("SELECT nombre_imagen FROM imagenes_logros WHERE id = ?");
        $stmt->execute([$imagen_id]);
        $imagen = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($imagen) {
            $file = 'views/assets/img/logros/' . $imagen['nombre_imagen'];
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $stmt = $this->db->prepare("DELETE FROM imagenes_logros WHERE id = ?");
        $stmt->execute([$imagen_id]);
    }

    // Elimina un logro y todas sus imágenes asociadas
    public function eliminar($id) {
        $imagenes = $this->obtenerImagenes($id);
        foreach ($imagenes as $imagen) {
            $file = 'views/assets/img/logros/' . $imagen['nombre_imagen'];
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $stmt = $this->db->prepare("DELETE FROM imagenes_logros WHERE logro_id = ?");
        $stmt->execute([$id]);
        $stmt = $this->db->prepare("DELETE FROM logros WHERE id = ?");
        $stmt->execute([$id]);
    }

    
}
?>
