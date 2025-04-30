<?php
class EmprendimientoGaleriaModel {
    private $db;
    private $uploadDir = 'uploads/';

    public function __construct() {
        $this->db = Database::connect();

        if (!file_exists($this->uploadDir)) {
            mkdir($this->uploadDir, 0777, true);
        }
    }

    // Obtener todas las imágenes con el nombre de la especialidad
    public function getAll() {
        $query = "SELECT 
    eg.id,
    eg.id_emprendimiento,
    e.nombre_emprendimiento,
    eg.tipo_archivo,
    eg.url_archivo
FROM 
    emprendimiento_galeria eg
INNER JOIN 
    emprendimiento e ON eg.id_emprendimiento = e.id;";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener todos los emprendimientos (para llenar el select)
    public function getEnprendimiento() {
        $query = "SELECT id, nombre_emprendimiento FROM emprendimiento";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addGaleria($id_emprendimiento, $tipo_archivo, $file) {
        if (isset($file['name']) && $file['error'] == 0) {
            $nombreArchivo = time() . "_" . basename($file['name']);
            $rutaArchivo = $this->uploadDir . $nombreArchivo;
    
            if (move_uploaded_file($file['tmp_name'], $rutaArchivo)) {
                $query = "INSERT INTO emprendimiento_galeria (id_emprendimiento, tipo_archivo, url_archivo) 
                          VALUES (:id_emprendimiento, :tipo_archivo, :url_archivo)";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':id_emprendimiento', $id_emprendimiento);
                $stmt->bindParam(':tipo_archivo', $tipo_archivo);
                $stmt->bindParam(':url_archivo', $rutaArchivo);
                return $stmt->execute();
            }
        }
        return false;
    }

    // Editar solo la imagen o video
    public function updateGaleriaGeneral($id, $tipo_archivo, $file = null, $video_url = null) {
        if ($tipo_archivo === 'imagen' && $file && $file['error'] == 0) {
            $nombreArchivo = time() . "_" . basename($file['name']);
            $rutaArchivo = $this->uploadDir . $nombreArchivo;
    
            // Verificar si el archivo se sube correctamente
            if (move_uploaded_file($file['tmp_name'], $rutaArchivo)) {
                // Actualización en la base de datos con la ruta del archivo
                $query = "UPDATE emprendimiento_galeria 
                          SET url_archivo = :url_archivo, tipo_archivo = 'imagen' 
                          WHERE id = :id";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':url_archivo', $rutaArchivo);
                $stmt->bindParam(':id', $id);
                if ($stmt->execute()) {
                    return true; // Si la consulta se ejecuta correctamente
                } else {
                    error_log("Error al ejecutar la consulta para imagen");
                }
            } else {
                error_log("No se pudo mover el archivo: " . $file['error']);
            }
        } elseif ($tipo_archivo === 'video' && $video_url) {
            // Si es un video, se actualiza con el URL del video (YouTube ID)
            $query = "UPDATE emprendimiento_galeria 
                      SET url_archivo = :url_archivo, tipo_archivo = 'video' 
                      WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':url_archivo', $video_url);
            $stmt->bindParam(':id', $id);
            if ($stmt->execute()) {
                return true; // Si la consulta se ejecuta correctamente
            } else {
                error_log("Error al ejecutar la consulta para video");
            }
        }
        return false; // En caso de que no se cumplan las condiciones
    }

    // Eliminar imagen o video
public function deleteGaleria($id) {
    // Primero obtener la URL del archivo para eliminarlo
    $query = "SELECT url_archivo FROM emprendimiento_galeria WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $archivo = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($archivo) {
        // Si es un archivo físico (imagen), lo eliminamos
        if ($archivo['tipo_archivo'] === 'imagen' && file_exists($archivo['url_archivo'])) {
            unlink($archivo['url_archivo']); // Elimina el archivo físico
        }

        // Ahora eliminar el registro de la base de datos
        $query = "DELETE FROM emprendimiento_galeria WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    return false; // Si no se encuentra el archivo
}

    // obtener por ID
    public function getByIdGaleria($id) {
        $sql  = "SELECT * FROM emprendimiento_galeria WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}