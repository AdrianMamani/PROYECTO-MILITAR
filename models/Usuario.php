<?php
require_once 'config/Database.php';

class Usuario {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function login($correo, $contraseña) {
        $db = new PDO("mysql:host=localhost;dbname=promocion", "root", "");
        // $db = new PDO("mysql:host=localhost;dbname=sistema_promocion", "root", "");
        $stmt = $db->prepare("SELECT * FROM usuarios WHERE correo = ? AND contraseña = ?");
        $stmt->execute([$correo, $contraseña]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // o false si no encuentra
    }
}
