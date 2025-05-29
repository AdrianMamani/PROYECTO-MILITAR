<?php
class ImagenEmprendimientoModel {
    private $db;
    private $uploadDir = 'uploads/emprendimiento/'; 

    public function __construct() {
        $this->db = Database::connect();

        if (!file_exists($this->uploadDir)) {
            mkdir($this->uploadDir, 0777, true);
        }
    }

    // Obtener todas las imágenes con el nombre del emprendimiento
    public function getAll() {
        $query = "SELECT 
           ie.id,
           ie.nombre_imagen,
           ie.emprendimiento_id,
           e.nombre_emprendimiento AS nombre_emprendimiento
        FROM imagenes_emprendimiento ie
        JOIN emprendimiento e 
          ON ie.emprendimiento_id = e.id
        ORDER BY ie.id DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener todos los emprendimientos (para llenar el select)
    public function getEmprendimiento() {
        $query = "SELECT id, nombre_emprendimiento FROM emprendimiento";
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
                $query = "INSERT INTO imagenes_emprendimiento (emprendimiento_id, nombre_imagen) 
                          VALUES (:emprendimiento_id, :nombre_imagen)";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':emprendimiento_id', $especialidad_id);
                $stmt->bindParam(':nombre_imagen', $nombreImagen);
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
                $query = "UPDATE imagenes_emprendimiento 
                          SET nombre_imagen = :nombre_imagen 
                          WHERE id = :id";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':nombre_imagen', $nombreImagen);
                $stmt->bindParam(':id', $id);
                return $stmt->execute();
            }
        }
        return false;
    }

    // Eliminar imagen
    public function delete($id) {
        // Obtener el nombre de la imagen para eliminar el archivo
        $query = "SELECT nombre_imagen FROM imagenes_emprendimiento WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $imagen = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($imagen) {
            $rutaImagen = $this->uploadDir . $imagen['nombre_imagen'];
            if (file_exists($rutaImagen)) {
                unlink($rutaImagen); // Elimina el archivo físico
            }
        }

        // Eliminar el registro en la base de datos
        $query = "DELETE FROM imagenes_emprendimiento WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Obtener imagen por ID
    public function getById($id) {
        $sql  = "SELECT * FROM imagenes_emprendimiento WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
