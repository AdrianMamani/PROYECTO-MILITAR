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
require_once './controllers/eventoimg.php';
require_once './controllers/eventovideo.php';
require_once './controllers/galeria.php';
require_once './controllers/logros_desta.php';
require_once './controllers/logros_especiales_img.php';
require_once './controllers/LogroVideoController.php';
require_once './controllers/ComentarioEventoController.php';
require_once './controllers/UsuariosController.php';
require_once './controllers/MiembrosImgController.php';
require_once './controllers/MiembrosVideosController.php';
require_once './controllers/ComentariosController.php';
require_once './controllers/MiembrosController.php';
require_once './controllers/EmprendimientoVideosController.php';
require_once './controllers/dashboard.php';

// rutas para la web
require_once './controllers/web/evento.php';
require_once './controllers/web/galeria.php';
require_once './controllers/web/home.php';
require_once './controllers/web/nosotros.php';
require_once './controllers/web/miembros.php';
require_once './controllers/web/emprendimiento.php';
require_once './controllers/web/especialidades.php';
define('BASE_URL', '/PROYECTO-MILITAR/');


// Definir la acción por defecto
$action = isset($_GET['action']) ? $_GET['action'] : 'carrusel/index';
$partes = explode('/', $action);
$accionPrincipal = $partes[0];
$accionSecundaria = $partes[1] ?? 'index';
$id = $partes[2] ?? ($_GET['id'] ?? null);

// Proteger rutas (excepto login)
$rutasPublicas = [
    'auth',
    'home',
    'sobrenosotros',
    'emprendimiento',
    'galeria',
    'miembro',
    'miembros',
    'miembros_fallecidos',
    'comentarios/agregar',
    'negocios'
    
];

if (!isset($_SESSION['usuario']) && !in_array(strtolower($accionPrincipal), $rutasPublicas)) {
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
$eventoImg = new  ImagenEventoController();
$videoevento = new  VideoEventoController();
$admingaleria = new GaleriaController();
$logrodestacado = new LogrosDestacadoController();
$logroimg = new ImagenLogroController();
$logrovideo = new LogroVideoController();
$comentarioevento = new ComentarioEventoController();
$miembros = new UsuariosController();
$miembrosIMG = new MiembrosImgController();
$miembrosVideos = new MiembrosVideosController();
$emprendimientoVideos = new VideoEmprendimientoController();
$dashboard = new DashboardController();


// instancias para la web
$eventosPublicos = new EventosPublicosController();
$galeriaPublica = new GaleriaPublicaController();
$home = new HomeController();
$nosotrosweb = new NosotrosControllerWeb();
$comentarios = new ComentariosController();
$miembrosWeb = new MiembrosControllerWeb();
$especialidadWeb = new EspecialidadControllerWeb();
$emprendimientoWeb = new EmprendimientoControllerWeb();


// Contexto admin si está logueado
$isAdmin = isset($_SESSION['usuario']);
$controller->setAdminContext($isAdmin);
$controllerImg->setAdminContext($isAdmin);
$especialidad->setAdminContext($isAdmin);
$emprendimiento->setAdminContext($isAdmin);
$nosotros->setAdminContext($isAdmin);

// Ruteo principal
switch ($accionPrincipal) {
    case 'dashboard':
    switch ($accionSecundaria) {
        case 'index':
        default:
            $dashboard->index();
            break;
    }
    break;
    
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
            case 'editar_redes':
                $id ? $emprendimiento->editar_redes($id) : print "ID no proporcionado";
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

    case 'videoemprendimiento':
        switch ($accionSecundaria) {
            case 'index':
                $emprendimientoVideos->index();
                break;
            case 'agregar':
            case 'create':
                $emprendimientoVideos->create();
                break;
            case 'guardar':
            case 'store':
                $emprendimientoVideos->store();
                break;
            case 'editar':
            case 'edit':
                $emprendimientoVideos->edit();
                break;
            case 'actualizar':
            case 'update':
                $emprendimientoVideos->update();
                break;
            case 'eliminar':
            case 'delete':
                $emprendimientoVideos->delete();
                break;
            default:
                $emprendimientoVideos->index();
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
    case 'eventoimg':
        switch ($accionSecundaria) {
            case 'index':
                $eventoImg->index();
                break;
            case 'agregar':
            case 'create':
                $eventoImg->create();
                break;
            case 'guardar':
            case 'store':
                $eventoImg->store();
                break;
            case 'editar':
            case 'edit':
                $eventoImg->edit();
                break;
            case 'actualizar':
            case 'update':
                $eventoImg->update();
                break;
            case 'eliminar':
            case 'delete':
                $eventoImg->delete();
                break;
            default:
                $eventoImg->index();
                break;
        }
        break;
    case 'videoevento':
        switch ($accionSecundaria) {
            case 'index':
                $videoevento->index();
                break;
            case 'agregar':
            case 'create':
                $videoevento->create();
                break;
            case 'guardar':
            case 'store':
                $videoevento->store();
                break;
            case 'editar':
            case 'edit':
                $videoevento->edit();
                break;
            case 'actualizar':
            case 'update':
                $videoevento->update();
                break;
            case 'eliminar':
            case 'delete':
                $videoevento->delete();
                break;
            default:
                $videoevento->index();
                break;
        }
        break;

    case 'admingaleria':
        switch ($accionSecundaria) {
            case 'index':
                $admingaleria->index();
                break;
            case 'agregar':
                $admingaleria->agregar();
                break;
            case 'editar':
                $id ? $admingaleria->editar($id) : print "ID no proporcionado";
                break;
            case 'eliminar':
                $id ? $admingaleria->eliminar($id) : print "ID no proporcionado";
                break;
            case 'ver':
                $id ? $admingaleria->ver($id) : print "ID no proporcionado";
                break;
            default:
                $admingaleria->index();
                break;
        }
        break;

    case 'logrodestacado':
        switch ($accionSecundaria) {
            case 'index':
                $logrodestacado->index();
                break;
            case 'agregar':
                $logrodestacado->agregar();
                break;
            case 'actualizar':
                $logrodestacado->actualizar();
                break;
            case 'eliminar':
                $id ? $logrodestacado->eliminar($id) : print "ID no proporcionado";
                break;
            case 'ver':
                $id ? $logrodestacado->ver($id) : print "ID no proporcionado";
                break;
            default:
                $logrodestacado->index();
                break;
        }
        break;

    case 'logroimg':
        switch ($accionSecundaria) {
            case 'index':
                $logroimg->index();
                break;
            case 'agregar':
            case 'create':
                $logroimg->create();
                break;
            case 'guardar':
            case 'store':
                $logroimg->store();
                break;
            case 'editar':
            case 'edit':
                $logroimg->edit();
                break;
            case 'actualizar':
            case 'update':
                $logroimg->update();
                break;
            case 'eliminar':
            case 'delete':
                $logroimg->delete();
                break;
            default:
                $logroimg->index();
                break;
        }
        break;

    case 'logrovideo':
        switch ($accionSecundaria) {
            case 'index':
                $logrovideo->index();
                break;
            case 'agregar':
            case 'create':
                $logrovideo->create();
                break;
            case 'guardar':
            case 'store':
                $logrovideo->store();
                break;
            case 'editar':
            case 'edit':
                $logrovideo->edit();
                break;
            case 'actualizar':
            case 'update':
                $logrovideo->update();
                break;
            case 'eliminar':
            case 'delete':
                $logrovideo->delete();
                break;
            default:
                $logrovideo->index();
                break;
        }
        break;

    case 'comentarioevento':
        switch ($accionSecundaria) {
            case 'index':
                $comentarioevento->index();
                break;
            case 'ver':
                $id ? $comentarioevento->ver($id) : print "ID no proporcionado";
                break;
            case 'agregar':
                $comentarioevento->agregar();
                break;
            case 'editar':
                $id ? $comentarioevento->editar($id) : print "ID no proporcionado";
                break;
            case 'actualizar':
                $comentarioevento->actualizar();
                break;
            case 'eliminar':
                $id ? $comentarioevento->eliminar($id) : print "ID no proporcionado";
                break;
            default:
                $comentarioevento->index();
                break;
        }
        break;
    case 'usuarios':
        switch ($accionSecundaria) {
            case 'index':
                $miembros->index();
                break;
            case 'listar':
                $miembros->listar();
                break;
            case 'agregar':
                $miembros->agregar();
                break;
            case 'editar':
                $id ? $miembros->editar($id) : print "ID no proporcionado";
                break;
            case 'editarE':
                $id ? $miembros->editarE($id) : print "ID no proporcionado";
                break;
            case 'editarF':
                $id ? $miembros->editarF($id) : print "ID no proporcionado";
                break;
            case 'eliminar':
    $id ? $miembros->eliminar($id) : print "ID no proporcionado";
    break;
            case 'eliminarF':
                $id ? $miembros->eliminarF($id) : print "ID no proporcionado";
                break;
            default:
                $miembros->index();
                break;
        }
        break;

    case 'usuarios_fallecidos':
        switch ($accionSecundaria) {
            case 'index':
                $miembros->index();
                break;
            case 'listar':
                $miembros->listar();
                break;
            case 'editar':
                $id ? $miembros->editarF($id) : print "ID no proporcionado";
                break;
            case 'eliminar':
                $id ? $miembros->eliminarF($id) : print "ID no proporcionado";
                break;
            default:
                $miembros->index();
                break;
        }
        break;

    case 'miembros':
        switch ($accionSecundaria) {
            case 'index':
                $miembrosWeb->index();
                break;
            default:
                $miembrosWeb->index();
                break;
        }
        break;
    case 'miembro':
        if (is_numeric($accionSecundaria)) {
            $miembrosWeb->indexPersonal($accionSecundaria);
        } else {
            switch ($accionSecundaria) {
                case 'index':
                    $id ? $miembrosWeb->indexPersonal($id) : print "ID no proporcionado";
                    break;
                default:
                    print "Ruta no válida para miembro.";
                    break;
            }
        }
        break;

    case 'miembros_fallecidos':
        switch ($accionSecundaria) {
            case 'index':
                $miembrosWeb->indexF();
                break;
            default:
                $miembrosWeb->indexF();
                break;
        }
        break;
    case 'miembros_imagenes':
        switch ($accionSecundaria) {
            case 'index':
                $miembrosIMG->index();
                break;
            case 'listar':
                $miembrosIMG->listar();
                break;
            case 'agregar':
                $miembrosIMG->agregar();
                break;
            case 'editar':
                $id ? $miembrosIMG->editar($id) : print "ID no proporcionado";
                break;
            case 'eliminar':
                $miembrosIMG->eliminar();
                break;
            default:
                $miembrosIMG->index();
                break;
        }
        break;

    case 'miembros_videos':
        switch ($accionSecundaria) {
            case 'index':
                $miembrosVideos->index();
                break;
            case 'listar':
                $miembrosVideos->listar();
                break;
            case 'agregar':
                $miembrosVideos->agregar();
                break;
            case 'editar':
                $id ? $miembrosVideos->editar($id) : print "ID no proporcionado";
                break;
            case 'eliminar':
                $id ? $miembrosVideos->eliminar($id) : print "ID no proporcionado";
                break;
            default:
                $miembrosVideos->index();
                break;
        }
        break;

    // Rutas para la web
    case 'home':
        switch ($accionSecundaria) {
            case 'index':
                $home->index();
                break;
            default:
                $home->index();
                break;
        }
        break;

    case 'sobrenosotros':
        switch ($accionSecundaria) {
            case 'index':
                $nosotrosweb->index();
                break;
            default:
                $nosotrosweb->index();
                break;
        }
        break;
    case 'comentarios':
        switch ($accionSecundaria) {
            case 'index':
                $comentarios->index();
                break;
            case 'agregar':
                $comentarios->agregar();
                break;
            case 'eliminar':
                $id ? $comentarios->eliminar($id) : print "ID no proporcionado";
                break;
            default:
                $comentarios->index();
                break;
        }
        break;
    case 'eventos':  // nuevo caso para el sitio público

        switch ($accionSecundaria) {
            case 'index':
                $eventosPublicos->index();
                break;
            case 'ver':
                $id ? $eventosPublicos->ver($id) : print "ID no proporcionado";
                break;
            case 'agregarComentario':
                $eventosPublicos->agregarComentario();
                break;
            default:
                $eventosPublicos->index();
                break;
        }
        break;

    case 'galeria':
        switch ($accionSecundaria) {
            case 'index': // Para mostrar la galería pública
                $galeriaPublica->mostrarGaleria();
                break;
        }
        break;
   
    case 'negocios':
        switch ($accionSecundaria) {
            case 'index':
                $emprendimientoWeb->index();
                break;
            default:
                $emprendimientoWeb->index();
                break;
        }
        break;
    case 'emprendimientos':
        if (is_numeric($accionSecundaria)) {
            $emprendimientoWeb->indexPersonal($accionSecundaria);
        } else {
            switch ($accionSecundaria) {
                case 'index':
                    $id ? $emprendimientoWeb->indexPersonal($id) : print "ID no proporcionado";
                    break;
                default:
                    print "Ruta no válida para miembro.";
                    break;
            }
        }
        break;

        case 'especialidad_index':
        if (is_numeric($accionSecundaria)) {
            $especialidadWeb->indexPersonal($accionSecundaria);
        } else {
            switch ($accionSecundaria) {
                case 'index':
                    $id ? $especialidadWeb->indexPersonal($id) : print "ID no proporcionado";
                    break;
                default:
                    print "Ruta no válida para miembro.";
                    break;
            }
        }
        break;



        $controller->index(); // Acción por defecto
        break;
}
