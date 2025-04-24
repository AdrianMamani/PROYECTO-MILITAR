<?php
// index.php en la raíz (PROMOCION/index.php)

// Determinar qué controlador y acción se solicitan
$controller = isset($_GET['controller']) ? $_GET['controller'] : null;
$action     = isset($_GET['action']) ? $_GET['action'] : null;
$id         = isset($_GET['id']) ? $_GET['id'] : null;

// Si no se ha indicado un controlador, mostrar la página principal en views/index.php
if (!$controller) {
    require_once 'views/index.php';
    exit;
}

// Construir la ruta del archivo del controlador
$controllerFile = 'controllers/' . ucfirst($controller) . 'Controller.php';
if (!file_exists($controllerFile)) {
    die("El controlador '$controller' no existe.");
}
require_once $controllerFile;

// Crear el objeto del controlador
$controllerClass = ucfirst($controller) . 'Controller';
if (!class_exists($controllerClass)) {
    die("La clase controlador '$controllerClass' no existe.");
}
$objController = new $controllerClass();

// Verificar que el método (acción) exista en ese controlador
if (!method_exists($objController, $action)) {
    die("La acción '$action' no existe en el controlador '$controllerClass'.");
}

// Llamar a la acción con o sin parámetro $id
if ($id) {
    $objController->$action($id);
} else {
    $objController->$action();
}

// Controlador y acción para login de admin
if (isset($_GET['controller']) && $_GET['controller'] === 'admin') {
    if ($_GET['action'] === 'login') {
        (new AdminController())->login();
    } elseif ($_GET['action'] === 'authenticate') {
        (new AdminController())->authenticate();
    } elseif ($_GET['action'] === 'dashboard') {
        (new AdminController())->dashboard();
    } elseif ($_GET['action'] === 'logout') {
        (new AdminController())->logout();
    }
}

// Controlador y acción para la administración de especialidades
if (isset($_GET['controller']) && $_GET['controller'] === 'especialidad') {
    if ($_GET['action'] === 'adminIndex') {
        (new EspecialidadController())->adminIndex();
    } elseif ($_GET['action'] === 'guardar') {
        (new EspecialidadController())->guardar();
    } elseif ($_GET['action'] === 'actualizar') {
        (new EspecialidadController())->actualizar();
    } elseif ($_GET['action'] === 'eliminar') {
        (new EspecialidadController())->eliminar($_GET['id']);
    }
}

// Controlador y acción para editar contacto
if (isset($_GET['controller']) && $_GET['controller'] === 'contacto') {
    if ($_GET['action'] === 'editar') {
        (new ContactoController())->editar();
    } elseif ($_GET['action'] === 'guardarEdicion') {
        (new ContactoController())->guardarEdicion();
    }
}
?>
