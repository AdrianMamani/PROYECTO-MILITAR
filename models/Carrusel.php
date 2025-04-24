<?php
require_once 'config/database.php';

class Carrusel {
    private $db;
    
    public function __construct() {
        $this->db = Database::connect();
    }
    
    // Obtiene todos los slides ordenados (por ejemplo, por id ascendente)
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM carrusel ORDER BY id ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Obtiene un slide por su ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM carrusel WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    // Guarda un nuevo slide y retorna su ID
    public function guardar($titulo, $subtitulo, $descripcion, $imagen) {
        $stmt = $this->db->prepare("INSERT INTO carrusel (titulo, subtitulo, descripcion, imagen) VALUES (?, ?, ?, ?)");
        $stmt->execute([$titulo, $subtitulo, $descripcion, $imagen]);
        return $this->db->lastInsertId();
    }
    
    // Actualiza un slide existente; si se provee una nueva imagen se actualiza, de lo contrario se mantiene la anterior
    public function actualizar($id, $titulo, $subtitulo, $descripcion, $imagen = null) {
        if ($imagen) {
            $stmt = $this->db->prepare("UPDATE carrusel SET titulo = ?, subtitulo = ?, descripcion = ?, imagen = ? WHERE id = ?");
            return $stmt->execute([$titulo, $subtitulo, $descripcion, $imagen, $id]);
        } else {
            $stmt = $this->db->prepare("UPDATE carrusel SET titulo = ?, subtitulo = ?, descripcion = ? WHERE id = ?");
            return $stmt->execute([$titulo, $subtitulo, $descripcion, $id]);
        }
    }
    
    // Cuenta el total de slides
    public function countAll() {
        $stmt = $this->db->query("SELECT COUNT(*) AS total FROM carrusel");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'];
    }
    
    // Elimina un slide, pero solo si hay más de uno
    public function eliminar($id) {
        if ($this->countAll() <= 1) {
            // No se permite eliminar el último slide
            return false;
        }
        // Obtener el slide para borrar la imagen del disco
        $slide = $this->getById($id);
        if ($slide && isset($slide['imagen'])) {
            $file = 'views/assets/img/carrusel/' . $slide['imagen'];
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $stmt = $this->db->prepare("DELETE FROM carrusel WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
