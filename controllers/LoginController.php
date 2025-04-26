<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/LoginModel.php';

class LoginController {

    private $usuarioModel;
    private $conexion;

    public function __construct() {
        $this->conexion = Database::connect();  // Usar la conexión PDO
        $this->usuarioModel = new UsuarioModel($this->conexion);  // Crear el modelo
    }

    public function auth() {
        // Verificar si se enviaron los datos del formulario
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $correo = $_POST['email'];
            $contrasena = $_POST['password'];
    
            // Consultar al modelo si existe el usuario
            $usuario = $this->usuarioModel->obtenerUsuarioPorCorreo($correo);
    
            if ($usuario && $usuario['contraseña'] === $contrasena) {
                // Si la contraseña es correcta, iniciar sesión
                session_start();
                $_SESSION['usuario'] = $usuario['nombre'];
                
                // Mostrar la vista del dashboard directamente sin redirigir
                require_once './views/admin/dashboard.php';
                exit();
            } else {
                // Si no es correcto, redirigir con error
                echo "<script>alert('Correo o contraseña incorrectos'); window.location.href='index.php?controller=login&action=index';</script>";
            }
        }
    }
}
