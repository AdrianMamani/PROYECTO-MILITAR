<?php
class Especialidad {
    private $db;
    private $nombreTabla = 'especialidades'; // Nombre de la tabla actualizado

    public function __construct() {
        // Obtiene la conexión a la base de datos desde la clase Database
        $this->db = Database::connect();
    }

    public function obtenerTodos() {
        $query = "SELECT * FROM " . $this->nombreTabla;
        $stmt = $this->db->query($query); // Ejecuta la consulta y obtiene el PDOStatement
        $especialidadItems = [];

        // Verifica si la consulta se ejecutó correctamente
        if ($stmt) {
            // Usar rowCount() para obtener el número de filas
            if ($stmt->rowCount() > 0) {
                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) { // Usar fetch en el PDOStatement
                    $especialidadItems[] = $fila;
                }
            }
        }
        return $especialidadItems;
    }

    public function obtenerPorId($id) {
        $query = "SELECT * FROM " . $this->nombreTabla . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $id, PDO::PARAM_INT); // Usamos bindValue para PDO
        $stmt->execute();
        
        // Fetch de la respuesta
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($resultado) {
            return $resultado;
        } else {
            return null;
        }
    }

    public function agregarEspecialidad($nombre, $descripcion) { // Parámetros actualizados
        $query = "INSERT INTO " . $this->nombreTabla . " (nombre, descripcion) VALUES (?, ?)"; // Query actualizada
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $nombre, PDO::PARAM_STR); // Usamos bindValue para PDO
        $stmt->bindValue(2, $descripcion, PDO::PARAM_STR); // Usamos bindValue para PDO
        $stmt->execute();
        return $stmt->rowCount() > 0; // Verifica si se insertó correctamente
    }

    public function actualizarEspecialidad($id, $nombre, $descripcion) { // Parámetros actualizados
        $query = "UPDATE " . $this->nombreTabla . " SET nombre = ?, descripcion = ? WHERE id = ?"; // Query actualizada
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $nombre, PDO::PARAM_STR); // Usamos bindValue para PDO
        $stmt->bindValue(2, $descripcion, PDO::PARAM_STR); // Usamos bindValue para PDO
        $stmt->bindValue(3, $id, PDO::PARAM_INT); // Usamos bindValue para PDO
        $stmt->execute();
        return $stmt->rowCount() > 0; // Verifica si se actualizó correctamente
    }

    public function eliminarEspecialidad($id) {
        $query = "DELETE FROM " . $this->nombreTabla . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $id, PDO::PARAM_INT); // Usamos bindValue para PDO
        $stmt->execute();
        return $stmt->rowCount() > 0; // Verifica si se eliminó correctamente
    }

    public function contarEspecialidades() {
    $query = "SELECT COUNT(*) AS total FROM " . $this->nombreTabla;
    $stmt = $this->db->prepare($query);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultado['total'] ?? 0;
}


}
?>