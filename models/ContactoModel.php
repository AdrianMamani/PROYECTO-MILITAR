<?php
require_once 'config/database.php'; // Asegúrate de incluir la conexión a la BD

class ContactoModel {
    private $db;

    public function __construct() {
        $this->db = Database::connect(); // Conexión a la base de datos
    }

    // Obtener los datos del contacto
    public function getContactos() {
        $query = $this->db->query("SELECT * FROM contactos LIMIT 1");
        return $query->fetch(PDO::FETCH_ASSOC); // Devuelve el primer contacto
    }

    // Actualizar los datos del contacto (sin la columna 'nombre')
    public function actualizarContacto($id, $correo, $celular, $lugar, $redes_sociales) {
        $query = $this->db->prepare("UPDATE contactos SET correo = :correo, celular = :celular, lugar = :lugar, redes_sociales = :redes_sociales WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->bindParam(':correo', $correo);
        $query->bindParam(':celular', $celular);
        $query->bindParam(':lugar', $lugar);
        $query->bindParam(':redes_sociales', $redes_sociales);
        $query->execute();
    }
}
?>
