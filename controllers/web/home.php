<?php

class HomeController
{
 
    public function index()
    {
        require_once __DIR__ . '/../web/especialidades.php';
        require_once __DIR__ . '/../web/emprendimiento.php';
        require_once __DIR__ . '/../web/miembros.php';
        require_once __DIR__ . '/../web/carrusel.php';
        require_once __DIR__ . '/../ComentariosController.php';

        $carruselController = new CarruselControllerWeb();
        $itemsCarrusel = $carruselController->verCarrusel();

        $especialidadController = new EspecialidadControllerWeb();
        $especialidades = $especialidadController->verEspecialidades();

        $emprendimientoController = new EmprendimientoControllerWeb();
        $emprendimientos = $emprendimientoController->obtenerEmprendimientosConGaleria();

        $miembrosController = new MiembrosControllerWeb();
        $miembros = $miembrosController->obtenerMiembros();

        $comentariosController = new ComentariosController();
        $comentarios = $comentariosController->obtenerComentarios();


        require './views/home.php';
        
    }
}
