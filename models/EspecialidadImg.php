<?php
class ImagenEspecialidadModel {
    private $db;
    private $uploadDir = 'uploads/especialidades/'; 

    public function __construct() {
        $this->db = Database::connect();

        if (!file_exists($this->uploadDir)) {
            mkdir($this->uploadDir, 0777, true);
        }
    }

    // Obtener todas las imágenes con el nombre de la especialidad
    public function getAll() {
        $query = "SELECT 
               ie.id,
               ie.nombre_imagen,
               ie.especialidad_id,             -- <--- lo agregamos
               e.nombre AS nombre_especialidad
            FROM imagenes_especialidad ie
            JOIN especialidades e 
              ON ie.especialidad_id = e.id
            ORDER BY ie.id DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener todas las especialidades (para llenar el select)
    public function getEspecialidades() {
        $query = "SELECT id, nombre FROM especialidades";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Agregar nueva imagen
    public function add($especialidad_id, $file) {
        if (isset($file['name']) && $file['error'] == 0) {
            $nombreImagen = time() . "_" . basename($file['name']);
            $rutaImagen = $this->uploadDir . $nombreImagen;

            if (move_uploaded_file($file['tmp_name'], $rutaImagen)) {
                $query = "INSERT INTO imagenes_especialidad (especialidad_id, nombre_imagen) VALUES (:especialidad_id, :nombre_imagen)";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':especialidad_id', $especialidad_id);
                $stmt->bindParam(':nombre_imagen', $rutaImagen);
                return $stmt->execute();
            }
        }
        return false;
    }

    // Editar solo la imagen
    public function update($id, $file) {
        if (isset($file['name']) && $file['error'] == 0) {
            $nombreImagen = time() . "_" . basename($file['name']);
            $rutaImagen = $this->uploadDir . $nombreImagen;

            if (move_uploaded_file($file['tmp_name'], $rutaImagen)) {
                $query = "UPDATE imagenes_especialidad SET nombre_imagen = :nombre_imagen WHERE id = :id";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':nombre_imagen', $rutaImagen);
                $stmt->bindParam(':id', $id);
                return $stmt->execute();
            }
        }
        return false;
    }

    // Eliminar imagen
    public function delete($id) {
        // Primero obtener el nombre de la imagen para eliminar el archivo
        $query = "SELECT nombre_imagen FROM imagenes_especialidad WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $imagen = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($imagen && file_exists($imagen['nombre_imagen'])) {
            unlink($imagen['nombre_imagen']); // Elimina el archivo físico
        }

        // Ahora eliminar el registro de la base de datos
        $query = "DELETE FROM imagenes_especialidad WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // obtener por ID
    public function getById($id) {
        $sql  = "SELECT * FROM imagenes_especialidad WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}