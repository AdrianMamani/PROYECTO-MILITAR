<?php
class ImagenLogroModel {
    private $db;
    private $uploadDir = 'uploads/logros/'; 

    public function __construct() {
        $this->db = Database::connect();

        if (!file_exists($this->uploadDir)) {
            mkdir($this->uploadDir, 0777, true);
        }
    }

    // Obtener todas las imágenes con el título del logro
    public function getAll() {
        $query = "SELECT 
           li.id,
           li.nombre_imagen,
           li.logro_id,
           le.titulo AS titulo_logro,
           li.fecha_subida
        FROM logros_especiales_img li
        JOIN logros_especiales le 
          ON li.logro_id = le.id
        ORDER BY li.id DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener todos los logros (para llenar el select)
    public function getLogros() {
        $query = "SELECT id, titulo FROM logros_especiales ORDER BY fecha DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener la primera imagen de cada logro con su título
public function getPrimerasImagenesPorLogro() {
    $query = "
        SELECT li.id, li.nombre_imagen, li.logro_id, le.titulo, le.descripcion
        FROM logros_especiales_img li
        INNER JOIN logros_especiales le ON li.logro_id = le.id
        WHERE li.id IN (
            SELECT MIN(id)
            FROM logros_especiales_img
            GROUP BY logro_id
        )
        ORDER BY li.id DESC
    ";

    $stmt = $this->db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    // Agregar nueva imagen
    public function add($logro_id, $file) {
        if (isset($file['name']) && $file['error'] == 0) {
            $nombreImagen = time() . "_" . basename($file['name']);
            $rutaImagen = $this->uploadDir . $nombreImagen;

            if (move_uploaded_file($file['tmp_name'], $rutaImagen)) {
                $query = "INSERT INTO logros_especiales_img (logro_id, nombre_imagen) 
                          VALUES (:logro_id, :nombre_imagen)";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':logro_id', $logro_id);
                $stmt->bindParam(':nombre_imagen', $nombreImagen);
                return $stmt->execute();
            }
        }
        return false;
    }

    // Editar solo la imagen (no cambia el logro_id)
    public function update($id, $file) {
        if (isset($file['name']) && $file['error'] == 0) {
            $nombreImagen = time() . "_" . basename($file['name']);
            $rutaImagen = $this->uploadDir . $nombreImagen;

            if (move_uploaded_file($file['tmp_name'], $rutaImagen)) {
                // Eliminar la imagen anterior
                $old = $this->getById($id);
                if ($old && file_exists($this->uploadDir . $old['nombre_imagen'])) {
                    unlink($this->uploadDir . $old['nombre_imagen']);
                }

                $query = "UPDATE logros_especiales_img 
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
        $query = "SELECT nombre_imagen FROM logros_especiales_img WHERE id = :id";
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
        $query = "DELETE FROM logros_especiales_img WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Obtener imagen por ID
    public function getById($id) {
        $sql  = "SELECT * FROM logros_especiales_img WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
