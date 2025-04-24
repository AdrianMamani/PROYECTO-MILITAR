<?php

class AdminModel {

    // Datos de autenticación (usuario y contraseña en texto plano, deberías encriptarlos en un entorno de producción)
    private $usuario = 'admin';
    private $contrasena = 'admin'; // Contraseña en texto claro

    public function autenticar($usuario, $contrasena) {
        // Verificamos si el usuario y la contraseña coinciden
        if ($usuario === $this->usuario && $contrasena === $this->contrasena) {
            return true;
        }
        return false;
    }
}
?>
