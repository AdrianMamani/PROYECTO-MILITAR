<?php
require_once __DIR__ . '../../config/database.php';

class NosotroslImg {
    private $db;
    private $nombreTabla = 'nosotros_galeria';
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

    public function obtenerNosotrosImgPorId($id) {
        $query = "SELECT * FROM " . $this->nombreTabla . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt->fetch();
        return $resultado ? $resultado : null;
    }

    public function agregarNosotrosImg($imagen) {
        $nombreArchivo = $this->subirImagen($imagen); // Llama a la función para subir la imagen
        if ($nombreArchivo) {
            $query = "INSERT INTO " . $this->nombreTabla . " (nombre_imagen) VALUES (?)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(1, $nombreArchivo);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        }
        return false; // Devuelve false si no se pudo subir la imagen
    }

    public function actualizarNosotrosImg($id, $imagen) {
        // Primero, obtener el nombre del archivo de imagen anterior
        $imagenAnterior = $this->obtenerNosotrosImgPorId($id)['nombre_imagen'];
        $nombreArchivo = $this->subirImagen($imagen, $imagenAnterior); // Sube la nueva imagen y elimina la anterior
        if ($nombreArchivo) {
            $query = "UPDATE " . $this->nombreTabla . " SET nombre_imagen = ? WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(1, $nombreArchivo);
            $stmt->bindParam(2, $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        }
        return false;
    }

    public function eliminarNosotrosImg($id) {
        // Primero, obtener el nombre del archivo de imagen
        $imagenABorrar = $this->obtenerNosotrosImgPorId($id)['nombre_imagen'];
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