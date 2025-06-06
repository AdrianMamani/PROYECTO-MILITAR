<?php
class ImagenEventoModel {
    private $db;
    private $uploadDir = 'uploads/evento/'; 

    public function __construct() {
        $this->db = Database::connect();

        if (!file_exists($this->uploadDir)) {
            mkdir($this->uploadDir, 0777, true);
        }
    }

    // Obtener todas las imágenes con el título del evento
    public function getAll() {
        $query = "SELECT 
            ie.id,
            ie.nombre_imagen,
            ie.evento_id,
            e.titulo AS titulo_evento,
            ie.fecha_subida
        FROM imagenes_evento ie
        JOIN eventos e ON ie.evento_id = e.id
        ORDER BY ie.id ASC";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener todos los eventos (para llenar el select)
    public function getEventos() {
        $query = "SELECT id, titulo FROM eventos";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Agregar nueva imagen
    public function add($evento_id, $file) {
        if (isset($file['name']) && $file['error'] == 0) {
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $nombreImagen = time() . "_" . uniqid() . "." . $extension;
            $rutaImagen = $this->uploadDir . $nombreImagen;

            if (move_uploaded_file($file['tmp_name'], $rutaImagen)) {
                $query = "INSERT INTO imagenes_evento (evento_id, nombre_imagen) 
                          VALUES (:evento_id, :nombre_imagen)";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':evento_id', $evento_id);
                $stmt->bindParam(':nombre_imagen', $nombreImagen);
                return $stmt->execute();
            }
        }
        return false;
    }

    // Editar solo la imagen si se sube una nueva
    public function update($id, $file) {
        if (isset($file['name']) && $file['error'] == 0) {
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $nombreImagen = time() . "_" . uniqid() . "." . $extension;
            $rutaImagen = $this->uploadDir . $nombreImagen;

            if (move_uploaded_file($file['tmp_name'], $rutaImagen)) {
                // Eliminar imagen anterior del servidor
                $imagenAnterior = $this->getById($id);
                if ($imagenAnterior && file_exists($this->uploadDir . $imagenAnterior['nombre_imagen'])) {
                    unlink($this->uploadDir . $imagenAnterior['nombre_imagen']);
                }

                // Actualizar en la base de datos
                $query = "UPDATE imagenes_evento 
                          SET nombre_imagen = :nombre_imagen 
                          WHERE id = :id";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':nombre_imagen', $nombreImagen);
                $stmt->bindParam(':id', $id);
                return $stmt->execute();
            }
        }

        // No se subió imagen nueva, no se actualiza nada
        return false;
    }

    // Eliminar imagen
    public function delete($id) {
        // Obtener el nombre de la imagen para eliminar el archivo
        $query = "SELECT nombre_imagen FROM imagenes_evento WHERE id = :id";
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
        $query = "DELETE FROM imagenes_evento WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Obtener imagen por ID
    public function getById($id) {
        $sql  = "SELECT * FROM imagenes_evento WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
