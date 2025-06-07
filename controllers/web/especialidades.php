<?php
require_once __DIR__ . '/../../models/EspecialidadModel.php';
require_once __DIR__ . '/../../models/EspecialidadImg.php';
require_once __DIR__ . '/../../models/MiembrosModel.php';

class EspecialidadControllerWeb
{
    private $especialidad;
    private $imagenEspecialidad;
    private $miembrosModel;
    public function __construct()
    {
        $this->especialidad = new Especialidad();
        $this->imagenEspecialidad = new ImagenEspecialidadModel();
        $this->miembrosModel = new MiembrosModel();
    }

    public function indexPersonal($id)
    {
        $especialidadModel = new Especialidad();
        $especialidades = $especialidadModel->obtenerPorId($id);
        $imagenes = $this->imagenEspecialidad->obtenerPorEspecialidadId($id);
        $miembros = $this->miembrosModel->obtenerPorEspecialidad($id);
        require './views/especialidad.php';
        exit();
    }

    public function verEspecialidades()
    {
        $especialidades = $this->especialidad->obtenerTodos();

        if (empty($especialidades)) {
            return [];
        }

        $imagenes = $this->imagenEspecialidad->getAll();

        $imagenesPorEspecialidad = [];
        foreach ($imagenes as $imagen) {
            $idEsp = $imagen['especialidad_id'];
            if (!isset($imagenesPorEspecialidad[$idEsp])) {
                $imagenesPorEspecialidad[$idEsp] = $imagen['nombre_imagen'];
            }
        }

        $resultado = [];
        foreach ($especialidades as $esp) {
            $rutaBase = '/PROYECTO-MILITAR/';

            // Cambia esto en tu código:
            $rutaImagen = isset($imagenesPorEspecialidad[$esp['id']])
                ? $rutaBase . str_replace('../', '', $imagenesPorEspecialidad[$esp['id']])
                : 'https://via.placeholder.com/400x220?text=Sin+Imagen';

            $resultado[] = [
                'id' => $esp['id'],
                'nombre' => $esp['nombre'],
                'descripcion' => $esp['descripcion'],
                'imagen' => $rutaImagen
            ];
        }

        return $resultado;
    }
}
