<?php 
require_once './models/galeria.php';
require_once './models/logro_destacados.php';
require_once './models/logro_img.php';
require_once './models/LogroVideoModel.php';


class GaleriaPublicaController {
    private $modeloGaleria;
    private $modeloLogros;
    private $modeloImagenLogro;
    private $modeloVideoLogro;

    public function __construct() {
        $this->modeloGaleria     = new Galeria();
        $this->modeloLogros      = new Logros_descatado();
        $this->modeloImagenLogro = new ImagenLogroModel();
        $this->modeloVideoLogro  = new LogroVideoModel();
    }

    // Mostrar toda la galería pública
    public function mostrarGaleria() {
        $imagenes     = $this->modeloGaleria->obtenerTodos();
        $logros = $this->modeloImagenLogro->getPrimerasImagenesPorLogro();

        $videosLogro   = $this->modeloVideoLogro->getAll();

        require_once './views/galeria.php'; // Recibe: $imagenes, $logros, $imagenesLogro, $videosLogro
    }

    // Mostrar un logro específico por ID con sus imágenes y videos
    public function verLogro($id) {
        $logro = $this->modeloLogros->obtenerLogroPorId($id);

        if ($logro) {
            $imagenesLogro = array_filter($this->modeloImagenLogro->getAll(), function($img) use ($id) {
                return $img['logro_id'] == $id;
            });

            $videosLogro = array_filter($this->modeloVideoLogro->getAll(), function($vid) use ($id) {
                return $vid['logro_id'] == $id;
            });

            require_once './views/galeria.php'; // Vista adaptada para mostrar un solo logro con sus medios
        } else {
            echo "Logro no encontrado.";
        }
    }
}