<?php
// routes.php - Con rutas de finanzas públicas agregadas

// Rutas de autenticación
$router->add('auth', 'loginForm', 'AuthController', 'loginForm');
$router->add('auth', 'login', 'AuthController', 'login');
$router->add('auth', 'logout', 'AuthController', 'logout')->middleware('AuthMiddleware');
$router->add('auth', 'contacto', 'AuthController', 'contacto')->middleware('AuthMiddleware');

// Rutas de carrusel
$router->add('carrusel', 'index', 'CarruselController', 'index')->middleware('AuthMiddleware');
$router->add('carrusel', 'agregar', 'CarruselController', 'agregar')->middleware('AuthMiddleware');
$router->add('carrusel', 'editar', 'CarruselController', 'editar')->middleware('AuthMiddleware');
$router->add('carrusel', 'eliminar', 'CarruselController', 'eliminar')->middleware('AuthMiddleware');
$router->add('carrusel', 'ver', 'CarruselController', 'ver')->middleware('AuthMiddleware');

// Rutas de imágenes de carrusel
$router->add('carruselimg', 'index', 'CarruselImgController', 'index')->middleware('AuthMiddleware');
$router->add('carruselimg', 'agregar', 'CarruselImgController', 'agregar')->middleware('AuthMiddleware');
$router->add('carruselimg', 'editar', 'CarruselImgController', 'editar')->middleware('AuthMiddleware');
$router->add('carruselimg', 'eliminar', 'CarruselImgController', 'eliminar')->middleware('AuthMiddleware');
$router->add('carruselimg', 'ver', 'CarruselImgController', 'ver')->middleware('AuthMiddleware');

// Rutas de especialidad
$router->add('especialidad', 'index', 'EspecialidadController', 'index')->middleware('AuthMiddleware');
$router->add('especialidad', 'agregar', 'EspecialidadController', 'agregar')->middleware('AuthMiddleware');
$router->add('especialidad', 'editar', 'EspecialidadController', 'editar')->middleware('AuthMiddleware');
$router->add('especialidad', 'eliminar', 'EspecialidadController', 'eliminar')->middleware('AuthMiddleware');
$router->add('especialidad', 'ver', 'EspecialidadController', 'ver')->middleware('AuthMiddleware');

// Rutas de imágenes de especialidad
$router->add('especialidadimg', 'index', 'ImagenEspecialidadController', 'index')->middleware('AuthMiddleware');
$router->add('especialidadimg', 'agregar', 'ImagenEspecialidadController', 'create')->middleware('AuthMiddleware');
$router->add('especialidadimg', 'editar', 'ImagenEspecialidadController', 'edit')->middleware('AuthMiddleware');
$router->add('especialidadimg', 'eliminar', 'ImagenEspecialidadController', 'delete')->middleware('AuthMiddleware');
$router->add('especialidadimg', 'ver', 'ImagenEspecialidadController', 'view')->middleware('AuthMiddleware');

// Rutas de emprendimiento
$router->add('emprendimiento', 'index', 'EmprendimientoController', 'index')->middleware('AuthMiddleware');
$router->add('emprendimiento', 'agregar', 'EmprendimientoController', 'agregar')->middleware('AuthMiddleware');
$router->add('emprendimiento', 'editar', 'EmprendimientoController', 'editar')->middleware('AuthMiddleware');
$router->add('emprendimiento', 'eliminar', 'EmprendimientoController', 'eliminar')->middleware('AuthMiddleware');
$router->add('emprendimiento', 'ver', 'EmprendimientoController', 'ver')->middleware('AuthMiddleware');

// Rutas de imágenes de emprendimiento
$router->add('emprendimientoimg', 'index', 'EmprendimientoGaleriaController', 'index')->middleware('AuthMiddleware');
$router->add('emprendimientoimg', 'agregar',  'EmprendimientoGaleriaController', 'create')->middleware('AuthMiddleware');
$router->add('emprendimientoimg', 'editar', 'EmprendimientoGaleriaController', 'edit')->middleware('AuthMiddleware');
$router->add('emprendimientoimg', 'eliminar', 'EmprendimientoGaleriaController', 'delete')->middleware('AuthMiddleware');
$router->add('emprendimientoimg', 'ver', 'EmprendimientoGaleriaController', 'view')->middleware('AuthMiddleware');

// Rutas de finanzas (admin)
$router->add('finanzas', 'index', 'FinanzasController', 'index')->middleware('AuthMiddleware');
$router->add('finanzas', 'agregar', 'FinanzasController', 'agregar')->middleware('AuthMiddleware');
$router->add('finanzas', 'store', 'FinanzasController', 'store')->middleware('AuthMiddleware');
$router->add('finanzas', 'editar', 'FinanzasController', 'editar')->middleware('AuthMiddleware');
$router->add('finanzas', 'update', 'FinanzasController', 'update')->middleware('AuthMiddleware');
$router->add('finanzas', 'eliminar', 'FinanzasController', 'eliminar')->middleware('AuthMiddleware');
$router->add('finanzas', 'ver', 'FinanzasController', 'ver')->middleware('AuthMiddleware');

// Rutas de noticias principales (admin)
$router->add('noticias', 'index', 'NoticiasController', 'index')->middleware('AuthMiddleware');
$router->add('noticias', 'agregar', 'NoticiasController', 'agregar')->middleware('AuthMiddleware');
$router->add('noticias', 'store', 'NoticiasController', 'store')->middleware('AuthMiddleware');
$router->add('noticias', 'ver', 'NoticiasController', 'ver')->middleware('AuthMiddleware');
$router->add('noticias', 'detalle', 'NoticiasController', 'detalle')->middleware('AuthMiddleware');
$router->add('noticias', 'editar', 'NoticiasController', 'editar')->middleware('AuthMiddleware');
$router->add('noticias', 'update', 'NoticiasController', 'update')->middleware('AuthMiddleware');
$router->add('noticias', 'eliminar', 'NoticiasController', 'eliminar')->middleware('AuthMiddleware');
$router->add('noticias', 'creada', 'NoticiasController', 'creada')->middleware('AuthMiddleware');

// Rutas de imágenes de noticias (admin)
$router->add('noticiasimg', 'index', 'NoticiasImgController', 'index')->middleware('AuthMiddleware');
$router->add('noticiasimg', 'store', 'NoticiasImgController', 'store')->middleware('AuthMiddleware');
$router->add('noticiasimg', 'eliminar', 'NoticiasImgController', 'eliminar')->middleware('AuthMiddleware');

// Rutas de videos de noticias (admin)
$router->add('noticiasvideos', 'index', 'NoticiasVideosController', 'index')->middleware('AuthMiddleware');
$router->add('noticiasvideos', 'store', 'NoticiasVideosController', 'store')->middleware('AuthMiddleware');
$router->add('noticiasvideos', 'eliminar', 'NoticiasVideosController', 'eliminar')->middleware('AuthMiddleware');

// Rutas públicas de noticias (sin middleware de autenticación)
$router->add('noticias-public', 'index', 'NoticiasPublicController', 'index');
$router->add('noticias-public', 'detalle', 'NoticiasPublicController', 'detalle');
$router->add('noticias-public', 'buscar', 'NoticiasPublicController', 'buscar');

// Rutas públicas de finanzas (sin middleware de autenticación)
$router->add('finanzas-public', 'index', 'FinanzasPublicController', 'index');
$router->add('finanzas-public', 'detalle', 'FinanzasPublicController', 'detalle');
$router->add('finanzas-public', 'buscar', 'FinanzasPublicController', 'buscar');
$router->add('finanzas-public', 'exportar', 'FinanzasPublicController', 'exportar');

// Ruta por defecto
$router->notFound('NoticiasPublicController', 'index');
?>
