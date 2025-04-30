<?php
class CarruselImg {
    private $db;
    private $nombreTabla = 'carrusel_img';
    private $uploadDir = 'uploads/'; // Directorio para guardar las imágenes

    public function __construct() {
        $this->db = Database::connect();
        // Crea el directorio si no existe
        if (!file_exists($this->uploadDir)) {
            mkdir($this->uploadDir, 0777, true); // Crea el directorio con permisos 0777
        }
    }

    public function obtenerTodos() {
        $query = "SELECT * FROM " . $this->nombreTabla;
        $stmt = $this->db->query($query);
        $imagenes = [];
        if ($stmt->rowCount() > 0) {
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $imagenes[] = $fila;
            }
        }
        return $imagenes;
    }

    public function obtenerCarruselImgPorId($id) {
        $query = "SELECT * FROM " . $this->nombreTabla . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt->fetch();
        return $resultado ? $resultado : null;
    }

    public function agregarCarruselImg($imagen) {
        $nombreArchivo = $this->subirImagen($imagen); // Llama a la función para subir la imagen
        if ($nombreArchivo) {
            $query = "INSERT INTO " . $this->nombreTabla . " (img) VALUES (?)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(1, $nombreArchivo);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        }
        return false; // Devuelve false si no se pudo subir la imagen
    }

    public function actualizarCarruselImg($id, $imagen) {
        // Primero, obtener el nombre del archivo de imagen anterior
        $imagenAnterior = $this->obtenerCarruselImgPorId($id)['img'];
        $nombreArchivo = $this->subirImagen($imagen, $imagenAnterior); // Sube la nueva imagen y elimina la anterior
        if ($nombreArchivo) {
            $query = "UPDATE " . $this->nombreTabla . " SET img = ? WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(1, $nombreArchivo);
            $stmt->bindParam(2, $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        }
        return false;
    }

    public function eliminarCarruselImg($id) {
        // Primero, obtener el nombre del archivo de imagen
        $imagenABorrar = $this->obtenerCarruselImgPorId($id)['img'];
        if ($imagenABorrar) {
            $this->eliminarArchivo($imagenABorrar); // Elimina el archivo del sistema de archivos
        }

        $query = "DELETE FROM " . $this->nombreTabla . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    private function subirImagen($imagen, $imagenAnterior = null) {
      if ($imagen['error'] == UPLOAD_ERR_OK) {
        $nombreArchivo = uniqid() . '_' . basename($imagen['name']);
        $rutaCompleta = $this->uploadDir . $nombreArchivo;
        if (move_uploaded_file($imagen['tmp_name'], $rutaCompleta)) {
          if ($imagenAnterior) {
            $this->eliminarArchivo($imagenAnterior);
          }
          return $nombreArchivo;
        }
      }
      return false;
    }

    private function eliminarArchivo($nombreArchivo) {
        $rutaCompleta = $this->uploadDir . $nombreArchivo;
        if (file_exists($rutaCompleta)) {
            unlink($rutaCompleta);
        }
    }
}