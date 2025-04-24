<?php
require_once 'models/Nosotros.php';

class NosotrosController {

    // Muestra la información de la sección "Nosotros"
    public function index() {
        $nosotros = Nosotros::getNosotros();
        require_once 'views/nosotros.php';
    }

    // Obtiene la información de la sección "Nosotros"
    public function obtenerNosotros() {
        return Nosotros::getNosotros();
    }

    // Muestra el formulario de edición de "Nosotros"
    public function edit() {
        // Obtener la información de la sección "Nosotros"
        $nosotros = Nosotros::getNosotros();
        require_once 'views/admin/editar_nosotros.php';
    }

    // Guarda los cambios en la base de datos
public function update() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $descripcion = $_POST['descripcion'];
        $descripcion2 = $_POST['descripcion2'];
        
        // Verificar si se subió una nueva imagen
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            // Eliminar la imagen anterior si existe
            if (!empty($_POST['imagen_existente'])) {
                $imagenExistentePath = 'views/assets/img/' . $_POST['imagen_existente'];
                if (file_exists($imagenExistentePath)) {
                    unlink($imagenExistentePath);
                }
            }
            
            $imagenOriginal = $_FILES['imagen']['name'];
            // Obtener la extensión del archivo original
            $extension = pathinfo($imagenOriginal, PATHINFO_EXTENSION);
            // Asignar el nombre fijo "nosotros123" con la extensión correspondiente
            $imagenNuevoNombre = 'nosotros123.' . $extension;
            $imagenTmp = $_FILES['imagen']['tmp_name'];
            $imagenPath = 'views/assets/img/' . $imagenNuevoNombre;
            
            // Mover la nueva imagen a la carpeta destino
            move_uploaded_file($imagenTmp, $imagenPath);
            $imagen = $imagenNuevoNombre;
        } else {
            // Si no se sube una nueva imagen, se mantiene la imagen anterior
            $imagen = $_POST['imagen_existente'];
        }

        // Actualizar la base de datos con los nuevos datos y la imagen (ya sea nueva o la existente)
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE nosotros SET titulo = ?, subtitulo = ?, descripcion = ?, descripcion2 = ?, imagen = ? WHERE id = ?");
        $stmt->execute([$titulo, $subtitulo, $descripcion, $descripcion2, $imagen, $id]);

        // Redirigir al Dashboard
        header('Location: index.php?controller=nosotros&action=edit');
    }

    }
    
}
?>
