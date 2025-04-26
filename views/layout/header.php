<?php
require_once 'controllers/NosotrosController.php';
require_once 'controllers/EmprendimientoController.php';
require_once 'controllers/NoticiaController.php';
require_once 'models/CarruselModel.php';
require_once 'models/LogroAdmin.php';
require_once 'models/NoticiaAdmin.php';

// Obtener datos de "Nosotros"
$nosotros = (new NosotrosController())->obtenerNosotros();

// Obtener todas las noticias y seleccionar las 3 primeras
$noticiaModel = new NoticiaAdmin();
$noticiasTodas = $noticiaModel->getAll();
$noticiasTres = array_slice($noticiasTodas, 0, 4);

// Obtener diapositivas del carrusel
$diapositivas = CarruselModel::obtenerDiapositivas();

// Obtener todos los logros y seleccionar los 3 primeros
$logroModel = new LogroAdmin();
$logrosTodos = $logroModel->getAll();
$logrosTres = array_slice($logrosTodos, 0, 4);

require_once 'models/ContactoModel.php';

// Instanciar el modelo y obtener los datos del contacto
$contactoModel = new ContactoModel();
$contacto = $contactoModel->getContactos();
?>

<head>
    <title>Promoción "CABO ALBERTO REYES GAMARRA"</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="views/assets/template/images/favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,600,700,900%7CRaleway:500">
    <link rel="stylesheet" href="views/assets/template/css/bootstrap.css">
    <link rel="stylesheet" href="views/assets/template/css/fonts.css">
    <link rel="stylesheet" href="views/assets/template/css/style.css">
    <link rel="stylesheet" href="views/admin/css/sidebar.css">
   
  </head>