<?php
require_once './config/database.php';

class NoticiasModel {
    private $conn;
    private $table_noticias = 'noticias';
    private $table_imagenes = 'imagenes';
    private $table_videos = 'videos';

    public function __construct() {
        $this->conn = Database::connect();
    }

    // Métodos existentes...
    public function obtenerVideoPorId($id) {
        try {
            $query = "SELECT * FROM " . $this->table_videos . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al obtener el video: " . $e->getMessage());
        }
    }

    public function crearNoticia($titulo, $subtitulo, $descripcion) {
        try {
            $query = "INSERT INTO " . $this->table_noticias . " 
                     (titulo, subtitulo, descripcion) 
                     VALUES (:titulo, :subtitulo, :descripcion)";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':subtitulo', $subtitulo);
            $stmt->bindParam(':descripcion', $descripcion);
            
            if ($stmt->execute()) {
                return $this->conn->lastInsertId();
            }
            return false;
        } catch (PDOException $e) {
            throw new Exception("Error al crear la noticia: " . $e->getMessage());
        }
    }

    public function obtenerTodasLasNoticias() {
        try {
            $query = "SELECT * FROM " . $this->table_noticias . " ORDER BY fecha_creacion DESC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al obtener las noticias: " . $e->getMessage());
        }
    }

    public function obtenerNoticiaPorId($id) {
        try {
            $query = "SELECT * FROM " . $this->table_noticias . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al obtener la noticia: " . $e->getMessage());
        }
    }

    public function actualizarNoticia($id, $titulo, $subtitulo, $descripcion) {
        try {
            $query = "UPDATE " . $this->table_noticias . " 
                     SET titulo = :titulo, subtitulo = :subtitulo, descripcion = :descripcion 
                     WHERE id = :id";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':subtitulo', $subtitulo);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':id', $id);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Error al actualizar la noticia: " . $e->getMessage());
        }
    }

    public function eliminarNoticia($id) {
        try {
            $query = "DELETE FROM " . $this->table_noticias . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Error al eliminar la noticia: " . $e->getMessage());
        }
    }

    // Métodos para imágenes
    public function guardarImagen($noticia_id, $url, $orden) {
        try {
            $query = "INSERT INTO " . $this->table_imagenes . " 
                     (noticia_id, url, orden) 
                     VALUES (:noticia_id, :url, :orden)";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':noticia_id', $noticia_id);
            $stmt->bindParam(':url', $url);
            $stmt->bindParam(':orden', $orden);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Error al guardar la imagen: " . $e->getMessage());
        }
    }

    public function obtenerImagenesNoticia($noticia_id) {
        try {
            $query = "SELECT * FROM " . $this->table_imagenes . " 
                     WHERE noticia_id = :noticia_id 
                     ORDER BY orden ASC";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':noticia_id', $noticia_id);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al obtener las imágenes: " . $e->getMessage());
        }
    }

    public function obtenerImagenPorId($id) {
        try {
            $query = "SELECT * FROM " . $this->table_imagenes . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al obtener la imagen: " . $e->getMessage());
        }
    }

    public function eliminarImagen($id) {
        try {
            $query = "DELETE FROM " . $this->table_imagenes . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Error al eliminar la imagen: " . $e->getMessage());
        }
    }

    public function obtenerSiguienteOrdenImagen($noticia_id) {
        try {
            $query = "SELECT COALESCE(MAX(orden), 0) + 1 as siguiente_orden 
                     FROM " . $this->table_imagenes . " 
                     WHERE noticia_id = :noticia_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':noticia_id', $noticia_id);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['siguiente_orden'];
        } catch (PDOException $e) {
            throw new Exception("Error al obtener el siguiente orden: " . $e->getMessage());
        }
    }

    // Métodos para videos
    public function guardarVideo($noticia_id, $url, $tipo = 'youtube') {
        try {
            $query = "INSERT INTO " . $this->table_videos . " 
                     (noticia_id, url, tipo) 
                     VALUES (:noticia_id, :url, :tipo)";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':noticia_id', $noticia_id);
            $stmt->bindParam(':url', $url);
            $stmt->bindParam(':tipo', $tipo);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Error al guardar el video: " . $e->getMessage());
        }
    }

    public function obtenerVideosNoticia($noticia_id) {
        try {
            $query = "SELECT * FROM " . $this->table_videos . " 
                     WHERE noticia_id = :noticia_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':noticia_id', $noticia_id);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al obtener los videos: " . $e->getMessage());
        }
    }

    public function eliminarVideo($id) {
        try {
            $query = "DELETE FROM " . $this->table_videos . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Error al eliminar el video: " . $e->getMessage());
        }
    }

    // Nuevos métodos para la vista pública
    public function obtenerNoticiasPublicas($limit = 10, $offset = 0) {
        try {
            $query = "SELECT * FROM " . $this->table_noticias . " 
                     ORDER BY fecha_creacion DESC 
                     LIMIT :limit OFFSET :offset";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al obtener las noticias públicas: " . $e->getMessage());
        }
    }

    public function contarNoticiasPublicas() {
        try {
            $query = "SELECT COUNT(*) as total FROM " . $this->table_noticias;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'];
        } catch (PDOException $e) {
            throw new Exception("Error al contar las noticias: " . $e->getMessage());
        }
    }

    public function obtenerNoticiasRelacionadas($noticia_id, $limit = 3) {
        try {
            $query = "SELECT * FROM " . $this->table_noticias . " 
                     WHERE id != :noticia_id 
                     ORDER BY fecha_creacion DESC 
                     LIMIT :limit";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':noticia_id', $noticia_id);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al obtener noticias relacionadas: " . $e->getMessage());
        }
    }

    public function buscarNoticias($termino) {
        try {
            $query = "SELECT * FROM " . $this->table_noticias . " 
                     WHERE titulo LIKE :termino OR descripcion LIKE :termino 
                     ORDER BY fecha_creacion DESC 
                     LIMIT 10";
            $stmt = $this->conn->prepare($query);
            $termino_busqueda = '%' . $termino . '%';
            $stmt->bindParam(':termino', $termino_busqueda);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al buscar noticias: " . $e->getMessage());
        }
    }
}
?>
