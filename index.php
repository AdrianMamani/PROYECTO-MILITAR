<?php
// Incluir el archivo de configuración de la base de datos
require_once 'config/database.php';

// Incluir los controladores
require_once 'controllers/CarruselController.php';
require_once 'controllers/CarruselImgController.php';
require_once 'controllers/EspecialidadController.php';
require_once 'controllers/EspecialidadImgController.php';
require_once 'controllers/EmprendimientoController.php';
require_once 'controllers/EmprendimientoImgController.php';

// Definir la acción por defecto
$action = isset($_GET['action']) ? $_GET['action'] : 'carrusel';

// Crear instancias de los controladores
$controller = new CarruselController();
$controllerImg = new CarruselImgController();
$especialidad = new EspecialidadController();
$especialidadImg = new ImagenEspecialidadController(); // Asegúrate de que esta clase exista
$emprendimiento = new EmprendimientoController();
$emprendimientoImg = new EmprendimientoGaleriaController(); // Asegúrate de que esta clase exista

// Definir si es un administrador
$isAdmin = true; // Cambiar a false si no es administrador
$controller->setAdminContext($isAdmin);
$controllerImg->setAdminContext($isAdmin);
$emprendimiento->setAdminContext($isAdmin);
$especialidad->setAdminContext($isAdmin);

// Dividir la acción para manejar rutas como "carrusel/agregar"
$partes = explode('/', $action);
$accionPrincipal = $partes[0];
$accionSecundaria = isset($partes[1]) ? $partes[1] : 'index';
$id = isset($partes[2]) ? $partes[2] : null;

// Manejar las acciones
switch ($accionPrincipal) {
    case 'carrusel':
        switch ($accionSecundaria) {
            case 'index':
                $controller->index();
                break;
            case 'agregar':
                $controller->agregar();
                break;
            case 'editar':
                if ($id) {
                    $controller->editar($id);
                } else {
                    echo "ID no proporcionado para editar";
                }
                break;
            case 'eliminar':
                if ($id) {
                    $controller->eliminar($id);
                } else {
                    echo "ID no proporcionado para eliminar";
                }
                break;
            case 'ver':
                if ($id) {
                    $controller->ver($id);
                } else {
                    echo "ID no proporcionado para ver";
                }
                break;
            default:
                $controller->index();
                break;
        }
        break;

    case 'carruselimg':
        switch ($accionSecundaria) {
            case 'index':
                $controllerImg->index();
                break;
            case 'agregar':
                $controllerImg->agregar();
                break;
            case 'editar':
                if ($id) {
                    $controllerImg->editar($id);
                } else {
                    echo "ID no proporcionado para editar";
                }
                break;
            case 'eliminar':
                if ($id) {
                    $controllerImg->eliminar($id);
                } else {
                    echo "ID no proporcionado para eliminar";
                }
                break;
            case 'ver':
                if ($id) {
                    $controllerImg->ver($id);
                } else {
                    echo "ID no proporcionado para ver";
                }
                break;
            default:
                $controllerImg->index();
                break;
        }
        break;

    case 'especialidad':
        switch ($accionSecundaria) {
            case 'index':
                $especialidad->index();
                break;
            case 'agregar':
                $especialidad->agregar();
                break;
            case 'editar':
                if ($id) {
                    $especialidad->editar($id);
                } else {
                    echo "ID no proporcionado para editar";
                }
                break;
            case 'eliminar':
                if ($id) {
                    $especialidad->eliminar($id);
                } else {
                    echo "ID no proporcionado para eliminar";
                }
                break;
            case 'ver':
                if ($id) {
                    $especialidad->ver($id);
                } else {
                    echo "ID no proporcionado para ver";
                }
                break;
            default:
                $especialidad->index();
                break;
        }
        break;

    case 'especialidadimg':
        switch ($accionSecundaria) {
            case 'index':
                $especialidadImg->index();
                break;
            case 'create':
            case 'agregar':
                $especialidadImg->create();
                break;
            case 'store':
            case 'guardar':
                $especialidadImg->store();
                break;
            case 'edit':
            case 'editar':
                $especialidadImg->edit();
                break;
            case 'update':
            case 'actualizar':
                $especialidadImg->update();
                break;
            case 'delete':
            case 'eliminar':
                $especialidadImg->delete();
                break;
            default:
                $especialidadImg->index();
                break;
        }
        break;

    case 'emprendimiento':
        switch ($accionSecundaria) {
            case 'index':
                $emprendimiento->index();
                break;
            case 'agregar':
                $emprendimiento->agregar();
                break;
            case 'editar':
                if ($id) {
                    $emprendimiento->editar($id);
                } else {
                    echo "ID no proporcionado para editar";
                }
                break;
            case 'eliminar':
                if ($id) {
                    $emprendimiento->eliminar($id);
                } else {
                    echo "ID no proporcionado para eliminar";
                }
                break;
            case 'ver':
                if ($id) {
                    $emprendimiento->ver($id);
                } else {
                    echo "ID no proporcionado para ver";
                }
                break;
            default:
                $emprendimiento->index();
                break;
        }
        break;

    case 'emprendimientoimg':
        switch ($accionSecundaria) {
            case 'index':
                $emprendimientoImg->index();
                break;
            case 'create':
            case 'agregar':
                $emprendimientoImg->create();
                break;
            case 'store':
            case 'guardar':
                $emprendimientoImg->store();
                break;
            case 'edit':
            case 'editar':
                $emprendimientoImg->edit();
                break;
            case 'update':
            case 'actualizar':
                $emprendimientoImg->update();
                break;
            case 'delete':
            case 'eliminar':
                $emprendimientoImg->delete();
                break;
            default:
                $emprendimientoImg->index();
                break;
        }
        break;

    default:
        $controller->index(); // Acción por defecto si no coincide con ningún controlador
        break;
}
?>