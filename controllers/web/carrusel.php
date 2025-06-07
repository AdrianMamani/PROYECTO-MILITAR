<?php
require_once __DIR__ . '/../../models/CarruselModel.php';
require_once __DIR__ . '/../../models/CarruselImg.php';
require_once __DIR__ . '/../../models/Nosotros.php';
require_once __DIR__ . '/../../models/NosotrosVideo.php';
require_once __DIR__ . '/../../models/EspecialidadModel.php';
require_once __DIR__ . '/../../models/MiembrosModel.php';
class CarruselControllerWeb
{
    private $modeloNombre;
    private $modeloImagen;
    private $nosotros;
    private $nosotrosGaleria;
    private $especialidad;
    private $miembrosModel;

    public function __construct()
    {
        $this->modeloNombre = new Carrusel();
        $this->modeloImagen = new CarruselImg();
        $this->nosotros = new NosotrosAdmin();
        $this->nosotrosGaleria = new NosotrosVideo();
        $this->especialidad = new Especialidad();
        $this->miembrosModel = new MiembrosModel();
    }

    public function verCarrusel()
    {
        $nombres = $this->modeloNombre->obtenerTodos();
        $imagenes_generales = $this->modeloImagen->obtenerTodos();
        $textos_sobrenosotros = $this->nosotros->obtenerTodos();
        $especialidades = $this->especialidad->obtenerTodos();

        // Buscar el primer video válido (id=1 o el siguiente disponible)
        $video_principal = $this->nosotrosGaleria->obtenerPorId(1);
        if (!$video_principal) {
            $todos_videos = $this->nosotrosGaleria->obtenerTodos();
            $video_principal = $todos_videos[0] ?? null;
        }

        $carruselCompleto = [];
        $numItems = count($nombres);

        for ($i = 0; $i < $numItems; $i++) {
            $carruselCompleto[] = [
                'titulo' => $nombres[$i]['titulo'] ?? '',
                'descripcion' => $nombres[$i]['descripcion'] ?? '',
                'nosotros' => $textos_sobrenosotros[$i]['descripcion'] ?? 'Descripción no disponible',
                'img' => $imagenes_generales[$i]['img'] ?? null,
                'url_archivo' => $video_principal['url_video'] ?? null,
                'tipo_archivo' => 'video',
                'nombre'  => $especialidades[$i]['nombre'] ?? '',
            ];
        }

        return $carruselCompleto;
    }
}
