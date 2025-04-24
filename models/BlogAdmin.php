<?php
require_once 'config/database.php';

class BlogAdmin {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Obtiene todos los blogs
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM blog");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtiene un blog por su ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM blog WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Guarda un nuevo blog y retorna su ID
    public function guardar($titulo, $subtitulo, $descripcion) {
        $stmt = $this->db->prepare("INSERT INTO blog (titulo, subtitulo, descripcion) VALUES (?, ?, ?)");
        $stmt->execute([$titulo, $subtitulo, $descripcion]);
        return $this->db->lastInsertId();
    }

    // Actualiza un blog existente
    public function actualizar($id, $titulo, $subtitulo, $descripcion) {
        $stmt = $this->db->prepare("UPDATE blog SET titulo = ?, subtitulo = ?, descripcion = ? WHERE id = ?");
        $stmt->execute([$titulo, $subtitulo, $descripcion, $id]);
    }

    // Inserta una imagen asociada a un blog (tabla imagenes_blog)
    public function insertarImagen($blog_id, $nombre_imagen) {
        $stmt = $this->db->prepare("INSERT INTO imagenes_blog (blog_id, nombre_imagen) VALUES (?, ?)");
        $stmt->execute([$blog_id, $nombre_imagen]);
    }

    // Obtiene las imágenes asociadas a un blog
    public function obtenerImagenes($blog_id) {
        $stmt = $this->db->prepare("SELECT id, nombre_imagen FROM imagenes_blog WHERE blog_id = ?");
        $stmt->execute([$blog_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Elimina una imagen individual asociada a un blog
    public function eliminarImagen($imagen_id) {
        $stmt = $this->db->prepare("SELECT nombre_imagen FROM imagenes_blog WHERE id = ?");
        $stmt->execute([$imagen_id]);
        $imagen = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($imagen) {
            $file = 'views/assets/img/blog/' . $imagen['nombre_imagen'];
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $stmt = $this->db->prepare("DELETE FROM imagenes_blog WHERE id = ?");
        $stmt->execute([$imagen_id]);
    }

    // Elimina un blog y todas sus imágenes asociadas
    public function eliminar($id) {
        $imagenes = $this->obtenerImagenes($id);
        foreach ($imagenes as $imagen) {
            $file = 'views/assets/img/blog/' . $imagen['nombre_imagen'];
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $stmt = $this->db->prepare("DELETE FROM imagenes_blog WHERE blog_id = ?");
        $stmt->execute([$id]);
        $stmt = $this->db->prepare("DELETE FROM blog WHERE id = ?");
        $stmt->execute([$id]);
    }

    
}
?>
