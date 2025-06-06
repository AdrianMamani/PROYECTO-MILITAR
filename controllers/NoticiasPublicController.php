<?php
require_once './models/NoticiasModel.php';

class NoticiasPublicController {
    private $modelo;

    public function __construct() {
        $this->modelo = new NoticiasModel();
    }

    // Página principal de noticias públicas
    public function index() {
        try {
            $page = $_GET['page'] ?? 1;
            $limit = 9; // Noticias por página
            $offset = ($page - 1) * $limit;
            
            $noticias = $this->modelo->obtenerNoticiasPublicas($limit, $offset);
            $total_noticias = $this->modelo->contarNoticiasPublicas();
            $total_pages = ceil($total_noticias / $limit);
            
            // Obtener multimedia para cada noticia
            foreach ($noticias as &$noticia) {
                $noticia['imagenes'] = $this->modelo->obtenerImagenesNoticia($noticia['id']);
                $noticia['videos'] = $this->modelo->obtenerVideosNoticia($noticia['id']);
                $noticia['imagen_principal'] = !empty($noticia['imagenes']) ? $noticia['imagenes'][0]['url'] : null;
            }
            
            require_once './views/public/noticias-index.php';
        } catch (Exception $e) {
            echo "Error al cargar las noticias: " . $e->getMessage();
        }
    }

    // Vista de detalle de una noticia
    public function detalle() {
        try {
            $id = $_GET['id'] ?? 0;
            
            if (!$id) {
                header('Location: index.php?action=noticias-public/index');
                exit;
            }
            
            $noticia = $this->modelo->obtenerNoticiaPorId($id);
            
            if (!$noticia) {
                header('Location: index.php?action=noticias-public/index');
                exit;
            }
            
            $imagenes = $this->modelo->obtenerImagenesNoticia($id);
            $videos = $this->modelo->obtenerVideosNoticia($id);
            
            // Obtener noticias relacionadas (últimas 3 noticias excluyendo la actual)
            $noticias_relacionadas = $this->modelo->obtenerNoticiasRelacionadas($id, 3);
            foreach ($noticias_relacionadas as &$relacionada) {
                $relacionada['imagenes'] = $this->modelo->obtenerImagenesNoticia($relacionada['id']);
                $relacionada['imagen_principal'] = !empty($relacionada['imagenes']) ? $relacionada['imagenes'][0]['url'] : null;
            }
            
            require_once './views/public/noticia-detalle.php';
        } catch (Exception $e) {
            echo "Error al cargar la noticia: " . $e->getMessage();
        }
    }

    // API para búsqueda de noticias
    public function buscar() {
        header('Content-Type: application/json');
        
        try {
            $termino = $_GET['q'] ?? '';
            
            if (strlen($termino) < 3) {
                echo json_encode(['success' => false, 'message' => 'Término de búsqueda muy corto']);
                return;
            }
            
            $noticias = $this->modelo->buscarNoticias($termino);
            
            foreach ($noticias as &$noticia) {
                $noticia['imagenes'] = $this->modelo->obtenerImagenesNoticia($noticia['id']);
                $noticia['imagen_principal'] = !empty($noticia['imagenes']) ? $noticia['imagenes'][0]['url'] : null;
            }
            
            echo json_encode(['success' => true, 'noticias' => $noticias]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
?>
