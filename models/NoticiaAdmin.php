<?php
require_once 'config/database.php';

class NoticiaAdmin {
    private $db;
    
    public function __construct() {
        $this->db = Database::connect();
    }
    
    // Obtiene todas las noticias
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM noticias ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Obtiene una noticia por su ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM noticias WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    // Guarda una nueva noticia y retorna su ID
    public function guardar($titulo, $subtitulo, $descripcion) {
        $stmt = $this->db->prepare("INSERT INTO noticias (titulo, subtitulo, descripcion) VALUES (?, ?, ?)");
        $stmt->execute([$titulo, $subtitulo, $descripcion]);
        return $this->db->lastInsertId();
    }
    
    // Actualiza una noticia existente
    public function actualizar($id, $titulo, $subtitulo, $descripcion) {
        $stmt = $this->db->prepare("UPDATE noticias SET titulo = ?, subtitulo = ?, descripcion = ? WHERE id = ?");
        $stmt->execute([$titulo, $subtitulo, $descripcion, $id]);
    }
    
    // Inserta una imagen asociada a una noticia (tabla imagenes_noticias)
    public function insertarImagen($noticia_id, $nombre_imagen) {
        $stmt = $this->db->prepare("INSERT INTO imagenes_noticias (noticia_id, nombre_imagen) VALUES (?, ?)");
        $stmt->execute([$noticia_id, $nombre_imagen]);
    }
    
    // Obtiene las imágenes asociadas a una noticia
    public function obtenerImagenes($noticia_id) {
        $stmt = $this->db->prepare("SELECT id, nombre_imagen FROM imagenes_noticias WHERE noticia_id = ?");
        $stmt->execute([$noticia_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Elimina una imagen individual asociada a una noticia
    public function eliminarImagen($imagen_id) {
        // Primero, se obtiene el nombre de la imagen
        $stmt = $this->db->prepare("SELECT nombre_imagen FROM imagenes_noticias WHERE id = ?");
        $stmt->execute([$imagen_id]);
        $imagen = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($imagen) {
            $file = 'views/assets/img/noticias/' . $imagen['nombre_imagen'];
            if (file_exists($file)) {
                unlink($file);
            }
        }
        // Eliminar el registro en la tabla
        $stmt = $this->db->prepare("DELETE FROM imagenes_noticias WHERE id = ?");
        $stmt->execute([$imagen_id]);
    }
    
    // Elimina una noticia y todas sus imágenes asociadas
    public function eliminar($id) {
        // Obtener imágenes asociadas
        $imagenes = $this->obtenerImagenes($id);
        foreach ($imagenes as $imagen) {
            $file = 'views/assets/img/noticias/' . $imagen['nombre_imagen'];
            if (file_exists($file)) {
                unlink($file);
            }
        }
        // Eliminar registros de imágenes
        $stmt = $this->db->prepare("DELETE FROM imagenes_noticias WHERE noticia_id = ?");
        $stmt->execute([$id]);
        // Eliminar la noticia
        $stmt = $this->db->prepare("DELETE FROM noticias WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>
