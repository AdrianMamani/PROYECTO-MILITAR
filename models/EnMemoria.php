<?php
require_once 'config/database.php';

class EnMemoria {
    private $db;
    
    public function __construct() {
        $this->db = Database::connect();
    }
    
    // Obtiene todos los registros de en_memoria
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM en_memoria ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Obtiene un registro por su ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM en_memoria WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    // Guarda un nuevo registro y retorna su ID
    public function guardar($titulo, $subtitulo, $descripcion) {
        $stmt = $this->db->prepare("INSERT INTO en_memoria (titulo, subtitulo, descripcion) VALUES (?, ?, ?)");
        $stmt->execute([$titulo, $subtitulo, $descripcion]);
        return $this->db->lastInsertId();
    }
    
    // Actualiza un registro existente
    public function actualizar($id, $titulo, $subtitulo, $descripcion) {
        $stmt = $this->db->prepare("UPDATE en_memoria SET titulo = ?, subtitulo = ?, descripcion = ? WHERE id = ?");
        $stmt->execute([$titulo, $subtitulo, $descripcion, $id]);
    }
    
    // Inserta una imagen asociada al registro (tabla imagenes_en_memoria)
    public function insertarImagen($enMemoriaId, $nombre_imagen) {
        $stmt = $this->db->prepare("INSERT INTO imagenes_en_memoria (en_memoria_id, nombre_imagen) VALUES (?, ?)");
        $stmt->execute([$enMemoriaId, $nombre_imagen]);
    }
    
    // Obtiene las imágenes asociadas a un registro
    public function obtenerImagenes($enMemoriaId) {
        $stmt = $this->db->prepare("SELECT id, nombre_imagen FROM imagenes_en_memoria WHERE en_memoria_id = ?");
        $stmt->execute([$enMemoriaId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Elimina una imagen individual asociada al registro
    public function eliminarImagen($imagen_id) {
        $stmt = $this->db->prepare("SELECT nombre_imagen FROM imagenes_en_memoria WHERE id = ?");
        $stmt->execute([$imagen_id]);
        $imagen = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($imagen) {
            $file = 'views/assets/img/in_memoria/' . $imagen['nombre_imagen'];
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $stmt = $this->db->prepare("DELETE FROM imagenes_en_memoria WHERE id = ?");
        $stmt->execute([$imagen_id]);
    }
    
    // Elimina un registro y todas sus imágenes asociadas
    public function eliminar($id) {
        $imagenes = $this->obtenerImagenes($id);
        foreach ($imagenes as $imagen) {
            $file = 'views/assets/img/in_memoria/' . $imagen['nombre_imagen'];
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $stmt = $this->db->prepare("DELETE FROM imagenes_en_memoria WHERE en_memoria_id = ?");
        $stmt->execute([$id]);
        $stmt = $this->db->prepare("DELETE FROM en_memoria WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>
