<?php
require_once 'models/AdminModel.php';

class AdminController {

    public function login() {
        // Iniciar sesión si no está iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Si ya está logeado, redirige al dashboard
        if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
            header('Location: index.php?controller=admin&action=dashboard');
            exit();
        }

        // Mostrar la página de login
        require_once 'views/admin/login.php';
    }

    public function authenticate() {
        // Iniciar sesión si no está iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Verificar las credenciales del formulario de login
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'];
            $contrasena = $_POST['contrasena'];

            $adminModel = new AdminModel();
            if ($adminModel->autenticar($usuario, $contrasena)) {
                // Si las credenciales son correctas, iniciar sesión y redirigir al dashboard
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_user'] = $usuario; // Guardar el usuario en la sesión si lo deseas
                header('Location: index.php?controller=admin&action=dashboard');
                exit();
            } else {
                // Si las credenciales son incorrectas, muestra un mensaje de error
                $error = "Credenciales incorrectas";
                require_once 'views/admin/login.php';
            }
        }
    }

    public function dashboard() {
        // Iniciar sesión si no está iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Verificar si el administrador está logueado
        if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
            // Si no está logueado, redirigir al login
            header('Location: index.php?controller=admin&action=login');
            exit();
        }

        // Mostrar la página del dashboard (solo para admin)
        require_once 'views/admin/dashboard.php';
    }

    public function logout() {
        // Iniciar sesión si no está iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Destruir la sesión y redirigir a la página principal
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
?>
