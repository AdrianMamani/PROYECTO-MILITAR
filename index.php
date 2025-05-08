<?php
// index.php - Punto de entrada principal

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

// Incluir el router y middleware
require_once './router.php';
require_once './middleware/AuthMiddleware.php';

// Crear instancia del router
$router = new Router();

// Incluir definiciones de rutas
require_once './routes.php';

// Despachar la solicitud
$router->dispatch();