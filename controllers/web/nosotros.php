<?php

class NosotrosControllerWeb
{

    public function index()
    {
        require_once __DIR__ . '/../web/miembros.php';
        require_once __DIR__ . '/../web/carrusel.php';
        $miembrosController = new MiembrosController();
        $miembros = $miembrosController->obtenerMiembros();
        $carruselController = new CarruselControllerWeb();
        $itemsCarrusel = $carruselController->verCarrusel();
        require './views/nosotros.php';
    }
}
