<?php
require_once 'models/ContactoModel.php';

class ContactoController {

    // Acción para mostrar el formulario de edición
    public function editar() {
        // Obtener los datos actuales del contacto
        $modelo = new ContactoModel();
        $contacto = $modelo->getContactos(); // Devuelve el primer contacto (ajusta según sea necesario)

        // Incluir la vista de edición con los datos del contacto
        require_once 'views/admin/editar_contacto.php';
    }

    // Acción para guardar los datos del contacto
    public function guardarEdicion() {
        if (isset($_POST['id']) && isset($_POST['correo']) && isset($_POST['celular']) && isset($_POST['lugar']) && isset($_POST['redes_sociales'])) {
            $id = $_POST['id'];
            $correo = $_POST['correo'];
            $celular = $_POST['celular'];
            $lugar = $_POST['lugar'];
            $redes_sociales = $_POST['redes_sociales'];

            // Actualizar los datos del contacto
            $modelo = new ContactoModel();
            $modelo->actualizarContacto($id, $correo, $celular, $lugar, $redes_sociales);

            // Redirigir de vuelta al dashboard
            header('Location: index.php?controller=admin&action=dashboard');
        }
    }
}
?>
