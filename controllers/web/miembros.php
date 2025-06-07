<?php
require_once __DIR__ . '/../../models/MiembrosModel.php';

class MiembrosControllerWeb
{
    public function index(){
        $miembrosModel = new MiembrosModel();
        $miembros = $miembrosModel->obtenerTodos();
        require './views/miembros.php';
        exit();
    }

    public function indexPersonal($id){
        $miembrosModel = new MiembrosModel();
        $miembros = $miembrosModel->obtenerMiembrosPorId($id);
        require './views/miembro.php';
        exit();
    }

    public function indexF(){
        $miembrosModel = new MiembrosModel();
        $miembros = $miembrosModel->obtenerTodosM();
        require './views/miembros_fallecidos.php';
        exit();
    }

    public function obtenerMiembros()
    {
        $miembrosModel = new MiembrosModel();
        return $miembrosModel->obtenerTodos();
    }

    public function obtenerMiembrosF()
    {
        $miembrosModel = new MiembrosModel();
        return $miembrosModel->obtenerTodosF();
    }

    public function obtenerMiembroPorId($id)
    {
       $miembrosModel = new MiembrosModel();
        return $miembrosModel->obtenerPorId($id);
    }
}
