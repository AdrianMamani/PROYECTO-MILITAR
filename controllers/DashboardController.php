<?php

class DashboardController {
    public function index() {
        // Iniciar sesión
        session_start();

        // Verificar si el usuario está autenticado
        if (!isset($_SESSION['usuario'])) {
            // Si no está logueado, redirigir al login
            header("Location: index.php?controller=login&action=index");
            exit();
        }

        // Si está logueado, cargar la vista del dashboard
        require_once '../views/admin/dashboard.php';
    }

    public function logout() {
        // Iniciar sesión
        session_start();
        
        // Destruir la sesión
        session_unset();
        session_destroy();

        // Redirigir al login
        header("Location: index.php?controller=login&action=index");
        exit();
    }
}
