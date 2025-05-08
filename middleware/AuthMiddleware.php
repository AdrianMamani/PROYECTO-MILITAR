<?php
// middleware/AuthMiddleware.php

class AuthMiddleware {
    public function handle() {
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php?action=auth/loginForm');
            exit;
            return false;
        }
        return true;
    }
}