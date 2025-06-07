<?php
require_once 'models/Usuario.php';

class AuthController {
    public function loginForm() {
        require_once __DIR__ . '/../views/admin/login.php';

    }

    public function login() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];

        $usuarioModel = new Usuario();
        $usuario = $usuarioModel->login($correo, $contraseña);

        if ($usuario) {
            session_start();
            $_SESSION['usuario'] = $usuario;
            // Cambia esta línea para redirigir al dashboard:
            header('Location: index.php?action=dashboard');
            exit;
        } else {
            $error = "Correo o contraseña incorrectos";
            require_once __DIR__ . '/../views/admin/login.php';
        }
    }
}

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?action=auth/loginForm');
        exit;
    }
}