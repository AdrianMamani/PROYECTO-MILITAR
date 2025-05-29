<?php
session_start();

// Incluir el archivo de configuración de la base de datos
require_once './config/database.php';

// Incluir los controladores
require_once './controllers/AuthController.php';
require_once './controllers/CarruselController.php';
require_once './controllers/CarruselImgController.php';
require_once './controllers/EspecialidadController.php';
require_once './controllers/EspecialidadImgController.php';
require_once './controllers/EmprendimientoController.php';
require_once './controllers/EmprendimientoImgController.php';
require_once './controllers/AportacionController.php';
require_once './controllers/NosotrosController.php';
require_once './controllers/NosotrosImg.php';
require_once './controllers/NosotrosVideos.php';
require_once './controllers/EventoController.php';

// rutas para la web
require_once './controllers/web/evento.php';

// Definir la acción por defecto
$action = isset($_GET['action']) ? $_GET['action'] : 'carrusel/index';
$partes = explode('/', $action);
$accionPrincipal = $partes[0];
$accionSecundaria = $partes[1] ?? 'index';
$id = $partes[2] ?? null;

// Proteger rutas (excepto login)
if (!isset($_SESSION['usuario']) && !in_array($accionPrincipal, ['auth'])) {
    header('Location: index.php?action=auth/loginForm');
    exit;
}

// Instanciar controladores
$authController = new AuthController();
$controller = new CarruselController();
$controllerImg = new CarruselImgController();
$especialidad = new EspecialidadController();
$especialidadImg = new ImagenEspecialidadController();
$emprendimiento = new EmprendimientoController();
$emprendimientoImg = new ImagenEmprendimientoController();
$aportaciones = new AportacionController();
$nosotros = new  NosotrosController();
$nosotrosImg = new  NosotrosImgController();
$nosotrosVideo = new  NosotrosVideoController();
$evento = new  EventoController();

// instancias para la web
$eventosPublicos = new EventosPublicosController();


// Contexto admin si está logueado
$isAdmin = isset($_SESSION['usuario']);
$controller->setAdminContext($isAdmin);
$controllerImg->setAdminContext($isAdmin);
$especialidad->setAdminContext($isAdmin);
$emprendimiento->setAdminContext($isAdmin);
$nosotros->setAdminContext($isAdmin);

// Ruteo principal
switch ($accionPrincipal) {
    case 'auth':
        switch ($accionSecundaria) {
            case 'loginForm':
                $authController->loginForm();
                break;
            case 'login':
                $authController->login();
                break;
            case 'logout':
                $authController->logout();
                break;
            default:
                $authController->loginForm();
                break;
        }
        break;

    case 'carrusel':
        switch ($accionSecundaria) {
            case 'index':
                $controller->index();
                break;
            case 'agregar':
                $controller->agregar();
                break;
            case 'editar':
                $id ? $controller->editar($id) : print "ID no proporcionado";
                break;
            case 'eliminar':
                $id ? $controller->eliminar($id) : print "ID no proporcionado";
                break;
            case 'ver':
                $id ? $controller->ver($id) : print "ID no proporcionado";
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
                $id ? $controllerImg->editar($id) : print "ID no proporcionado";
                break;
            case 'eliminar':
                $id ? $controllerImg->eliminar($id) : print "ID no proporcionado";
                break;
            case 'ver':
                $id ? $controllerImg->ver($id) : print "ID no proporcionado";
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
                $id ? $especialidad->editar($id) : print "ID no proporcionado";
                break;
            case 'eliminar':
                $id ? $especialidad->eliminar($id) : print "ID no proporcionado";
                break;
            case 'ver':
                $id ? $especialidad->ver($id) : print "ID no proporcionado";
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
            case 'agregar':
            case 'create':
                $especialidadImg->create();
                break;
            case 'guardar':
            case 'store':
                $especialidadImg->store();
                break;
            case 'editar':
            case 'edit':
                $especialidadImg->edit();
                break;
            case 'actualizar':
            case 'update':
                $especialidadImg->update();
                break;
            case 'eliminar':
            case 'delete':
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
                $id ? $emprendimiento->editar($id) : print "ID no proporcionado";
                break;
            case 'eliminar':
                $id ? $emprendimiento->eliminar($id) : print "ID no proporcionado";
                break;
            case 'ver':
                $id ? $emprendimiento->ver($id) : print "ID no proporcionado";
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
            case 'agregar':
            case 'create':
                $emprendimientoImg->create();
                break;
            case 'guardar':
            case 'store':
                $emprendimientoImg->store();
                break;
            case 'editar':
            case 'edit':
                $emprendimientoImg->edit();
                break;
            case 'actualizar':
            case 'update':
                $emprendimientoImg->update();
                break;
            case 'eliminar':
            case 'delete':
                $emprendimientoImg->delete();
                break;
            default:
                $emprendimientoImg->index();
                break;
        }
        break;
        case 'nosotros':
            switch ($accionSecundaria) {
                case 'index':
                    $nosotros->index();
                    break;
                case 'agregar':
                    $nosotros->agregar();
                    break;
                case 'editar':
                    $id ? $nosotros->editar($id) : print "ID no proporcionado";
                    break;
                case 'eliminar':
                    $id ? $nosotros->eliminar($id) : print "ID no proporcionado";
                    break;
                case 'ver':
                    $id ? $nosotros->ver($id) : print "ID no proporcionado";
                    break;
                default:
                    $nosotros->index();
                    break;
            }
            break;
        case 'nosotrosimg':
    switch ($accionSecundaria) {
            case 'index':
                $nosotrosImg->index();
                break;
            case 'agregar':
                $nosotrosImg->agregar();
                break;
            case 'editar':
                $id ? $nosotrosImg->editar($id) : print "ID no proporcionado";
                break;
            case 'eliminar':
                $id ? $nosotrosImg->eliminar($id) : print "ID no proporcionado";
                break;
            case 'ver':
                $id ? $nosotrosImg->ver($id) : print "ID no proporcionado";
                break;
            default:
                $nosotrosImg->index();
                break;
        }
        break;
         case 'nosotrosVideo':
             $id = isset($_GET['id']) ? intval($_GET['id']) : null; 
    switch ($accionSecundaria) {
            case 'index':
                $nosotrosVideo->index();
                break;
            case 'agregar':
                $nosotrosVideo->agregar();
                break;
            case 'editar':
                $id ? $nosotrosVideo->editar($id) : print "ID no proporcionado";
                break;
            case 'eliminar':
                $id ? $nosotrosVideo->eliminar($id) : print "ID no proporcionado";
                break;
            case 'ver':
                $id ? $nosotrosVideo->index($id) : print "ID no proporcionado";
                break;
            default:
                $nosotrosVideo->index();
                break;
        }
        break;
        case 'evento':
        switch ($accionSecundaria) {
            case 'index':
                $evento->index();
                break;
            case 'agregar':
                $evento->agregar();
                break;
            case 'actualizar':
                $evento->actualizar();
                break;
            case 'eliminar':
                $id ? $evento->eliminar($id) : print "ID no proporcionado";
                break;
            case 'ver':
                $id ? $evento->ver($id) : print "ID no proporcionado";
                break;
            default:
                $evento->index();
                break;
        }
        break;
        
        // Rutas para la web
        case 'eventos':  // nuevo caso para el sitio público
    switch ($accionSecundaria) {
        case 'index':
            $eventosPublicos->index();
            break;
        case 'ver':
            $id ? $eventosPublicos->ver($id) : print "ID no proporcionado";
            break;
        default:
            $eventosPublicos->index();
            break;
    }
    break;

        $controller->index(); // Acción por defecto
        break;
}