<?php

require_once './models/Nosotros.php'; // Modelo para "Nosotros" (textos)
require_once './models/NosotrosModel.php'; 
require_once __DIR__ . '/../web/miembros.php';
require_once __DIR__ . '/../web/carrusel.php';

class NosotrosControllerWeb
{
    public function index()
    {
        // Obtener miembros del equipo
        $miembrosController = new MiembrosController();
        $miembros = $miembrosController->obtenerMiembros();

        // Obtener items del carrusel
        $carruselController = new CarruselControllerWeb();
        $itemsCarrusel = $carruselController->verCarrusel();

        // Obtener datos de "Nosotros"
        $modeloNosotros = new NosotrosAdmin();
        $nosotrosItems = $modeloNosotros->obtenerTodos();

        // Obtener imágenes "Nosotros"
        $modeloNosotrosImg = new NosotroslImg();
        $imagenesNosotros = $modeloNosotrosImg->obtenerTodos();
        $imagenId1 = $modeloNosotrosImg->obtenerNosotrosImgPorId(1);


        // Renderizar la vista pública y pasar todas las variables
        require './views/nosotros.php';
    }
}
