<?php
class InMemoriam {
    private $db;
    private $nombreTabla = 'en_memoria'; // Nombre de la tabla actualizado

    public function __construct() {
        // Obtiene la conexión a la base de datos desde la clase Database
        $this->db = Database::connect();
    }

    public function obtenerTodos() {
        $query = "SELECT * FROM " . $this->nombreTabla;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $en_memoriaModel = [];
        if ($stmt->rowCount() > 0) {  // Cambié num_rows a rowCount()
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {  // Usando fetch de PDO
                $en_memoriaModel[] = $fila;
            }
        }
        return $en_memoriaModel;
    }

    public function obtenerInMemoriamPorId($id) {
        $query = "SELECT * FROM " . $this->nombreTabla . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() == 1) {  // Cambié num_rows a rowCount()
            return $stmt->fetch(PDO::FETCH_ASSOC);  // Usando fetch de PDO
        } else {
            return null;
        }
    }

        public function agregarInMemoriam($titulo, $subtitulo, $descripcion, $imagen) { // Parámetros actualizados
            $query = "INSERT INTO en_memoria (titulo, subtitulo, descripcion, imagen) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(1, $titulo, PDO::PARAM_STR);
            $stmt->bindParam(2, $subtitulo, PDO::PARAM_STR);
            $stmt->bindParam(3, $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(4, $imagen, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->rowCount() > 0; // Cambié affected_rows por rowCount() de PDO
        }

        public function actualizarInMemoriam($id, $titulo, $subtitulo, $descripcion, $imagen) { // Parámetros actualizados
            $query = "UPDATE en_memoria SET titulo = ?, subtitulo = ?, descripcion = ?, imagen = ? WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(1, $titulo, PDO::PARAM_STR);
            $stmt->bindParam(2, $subtitulo, PDO::PARAM_STR);
            $stmt->bindParam(3, $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(4, $imagen, PDO::PARAM_STR);
            $stmt->bindParam(5, $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount() > 0; // Cambié affected_rows por rowCount() de PDO
        }



    public function eliminarInMemoriam($id) {
        $query = "DELETE FROM " . $this->nombreTabla . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;  // Cambié affected_rows por rowCount() de PDO
    }
}