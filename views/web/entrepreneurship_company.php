<?php
require_once '../../models/EmprendimientoModel.php';
require_once '../../models/EmprendimientoImg.php';
require_once '../../models/ComentarioEmprendimientoModel.php';
require_once '../../config/database.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;
if (!$id) {
    header('Location: emprendimientos.php');
    exit;
}

$emprendimientoModel = new Emprendimiento();
$imgModel = new ImagenEmprendimientoModel();
$comentarioModel = new ComentarioEmprendimiento();

$emprendimiento = $emprendimientoModel->obtenerEmprendimientoPorId($id);
$imagenes = $imgModel->getAll();

// Filtrar solo imágenes de este emprendimiento
$imagenesEmprendimiento = array_values(array_filter($imagenes, function($img) use ($id) {
    return $img['emprendimiento_id'] == $id;
}));

// Obtener la última imagen (si existe)
$ultimaImagen = end($imagenesEmprendimiento);
$imagenPrincipal = $ultimaImagen ? '../../uploads/emprendimiento/' . $ultimaImagen['nombre_imagen'] : '../assets/img/default-empresa.jpg';

// Eliminar la última imagen del array para la galería
array_pop($imagenesEmprendimiento);

// Obtener y preparar imágenes
$imagenesEmprendimiento = array_values(array_filter($imagenes, function($img) use ($id) {
    return $img['emprendimiento_id'] == $id;
}));

// Última imagen para mostrar arriba
$ultimaImagen = end($imagenesEmprendimiento);
$imagenPrincipal = $ultimaImagen ? '../../uploads/emprendimiento/' . $ultimaImagen['nombre_imagen'] : '../assets/img/default-empresa.jpg';

// Galería en orden inverso (sin la última)
$galeriaImagenes = array_reverse($imagenesEmprendimiento);
array_shift($galeriaImagenes);

// Obtener comentarios para este emprendimiento
$comentarios = $comentarioModel->obtenerPorEmprendimiento($id);

// Agrupar comentarios (si es necesario)
$comentarios_agrupados = [];
foreach ($comentarios as $comentario) {
    $emprendimiento_id = $comentario['comentario_id'];
    if (!isset($comentarios_agrupados[$emprendimiento_id])) {
        $comentarios_agrupados[$emprendimiento_id] = [
            'nombre_emprendimiento' => $emprendimiento['nombre_emprendimiento'], // Usamos el nombre del emprendimiento actual
            'comentarios' => []
        ];
    }
    $comentarios_agrupados[$emprendimiento_id]['comentarios'][] = $comentario;
}
?>
<html lang="en">
 <head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>Entrepreneurship_company</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    rel="stylesheet"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.min.css">
<!-- Styles / Carousel -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/entrepreneurship_company.css">
  <style>
    body {
      font-family: "Montserrat", sans-serif;
    }
    .slick-slide {
    height: 300px !important;
    display: flex !important;
    justify-content: center;
    padding: 0 8px;
}
  </style>
 </head>
 <?php
include '../layout/header.php';
?>
 <body class="bg-white m-0 p-0 min-h-screen ">
    <!-- Banner Emprendimientos Section -->
    <section class="banner-container">
        <img src="../assets/img/pruebas/prueba01.jpeg" alt="Banner sobre Emprendimientos" class="banner-image">
        <div class="banner-overlay">
            <div class="banner-content banner-text-offset">
                <h1>EMPRENDIMIENTOS</h1>
                <p>Inicio → Emprendimientos → <?= htmlspecialchars($emprendimiento['nombre_emprendimiento']) ?></p>
            </div>
        </div>
    </section>
        <!-- Emprendimiento por empresa Section -->
        <section class="company-section">
        <h2 class="company-title"><?= htmlspecialchars($emprendimiento['nombre_emprendimiento']) ?></h2>

        <div class="company-container">
            <div class="company-image">
                <img src="<?= $imagenPrincipal ?>" alt="<?= htmlspecialchars($emprendimiento['nombre_emprendimiento']) ?>">
            </div>
            <div class="company-info">
                <?php if (!empty($emprendimiento['subdescripcion'])): ?>
                <div class="company-subtitle">"<?= htmlspecialchars($emprendimiento['subdescripcion']) ?>"</div>
                  <?php endif; ?>
                <p class="company-paragraph">
                    <?= htmlspecialchars($emprendimiento['descripcion']) ?>
                </p>
                
                <?php if (!empty($emprendimiento['contacto'])): ?>
                <p class="company-contact">Contacto: <?= htmlspecialchars($emprendimiento['contacto']) ?></p>
                <?php endif; ?>
                
                <?php if (!empty($emprendimiento['ubicacion'])): ?>
                <p class="company-location">Ubicación: <?= htmlspecialchars($emprendimiento['ubicacion']) ?></p>
                <?php endif; ?>
            </div>
        </div>
        </section>
        <!-- Comentarios por empresa Section -->
        <section class="comentarios-section">
            <h2 class="comentarios-titulo">Lo que opinan nuestros usuarios</h2>
            <div class="comentarios-carrusel">
                <?php if (empty($comentarios)): ?>
                    <div class="comentario-card">
                        <p class="mensaje">Aún no hay comentarios para este emprendimiento.</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($comentarios as $comentario): ?>
                    <div class="comentario-card">
                        <h4><?= htmlspecialchars($comentario['nombre']) ?></h4>
                        <p class="correo"><?= htmlspecialchars($comentario['correo']) ?></p>
                        <p class="mensaje"><?= htmlspecialchars($comentario['mensaje']) ?></p>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

        <!-- Fotos e imagenes por empresa Section -->
        <section class="eventos-section">
        <div class="eventos-left">
            <h1 class="eventos-title">
            <br>Nuestro<br>Emprendimiento
            </h1>
            <p class="eventos-description">
            Aquí se mostrarán fotos y videos de nuestro Emprendimiento.
            </p>
            <select id="filter" class="eventos-filter">
            <option value="all">Todos</option>
            <option value="image">Fotos</option>
            <option value="video">Videos</option>
            </select>
        </div>

        <div class="eventos-gallery">
            <!-- Galería (sin la primera imagen) -->
            <?php foreach ($galeriaImagenes as $imagen): ?>
            <div class="gallery-item" data-type="image" data-src="../../uploads/emprendimiento/<?= htmlspecialchars($imagen['nombre_imagen']) ?>" data-caption="Logro 1 - Descripción breve">
                <img src="../../uploads/emprendimiento/<?= htmlspecialchars($imagen['nombre_imagen']) ?>" 
                    alt="Imagen de <?= htmlspecialchars($emprendimiento['nombre_emprendimiento']) ?>">
            <div class="gallery-overlay">
                <i class="fas fa-expand"></i>
            </div>
                  </div>
            <?php endforeach; ?>
            
            <div class="gallery-item" data-type="video" data-src="../assets/img/pruebas/video-prueba.mp4" data-caption="Video 2 - Descripción breve">
                <video src="../assets/img/pruebas/video-prueba.mp4" muted preload="metadata"></video>
                <div class="gallery-overlay">
                    <i class="fas fa-play-circle"></i>
                </div>
            </div>
            
            <div class="gallery-item" data-type="video" data-src="../assets/img/pruebas/video-prueba.mp4" data-caption="Video 2 - Descripción breve">
                <video src="../assets/img/pruebas/video-prueba.mp4" muted preload="metadata"></video>
                <div class="gallery-overlay">
                    <i class="fas fa-play-circle"></i>
                </div>
            </div>
            <div class="gallery-item" data-type="video" data-src="../assets/img/pruebas/video-prueba.mp4" data-caption="Video 2 - Descripción breve">
                <video src="../assets/img/pruebas/video-prueba.mp4" muted preload="metadata"></video>
                <div class="gallery-overlay">
                    <i class="fas fa-play-circle"></i>
                </div>
            </div>
          
        </div>
        
        </section>

  <!-- Mensaje Floating Button con tooltip a la izquierda, fijo en pantalla -->
  <div class="fixed bottom-6 right-6 z-50 flex items-center group space-x-3">
    <div class="hidden group-hover:flex bg-gray-500 text-white text-xs rounded px-3 py-1 whitespace-nowrap select-none">
      ¿Quieres dejar un mensaje?
    </div>
    <button aria-label="Abrir chat de mensajes" class="bg-green-600 hover:bg-green-700 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg relative" id="messageButton" type="button">
      <i class="fas fa-comment-alt text-2xl"></i>
    </button>
  </div>

  <!-- Modal Chat -->
  <div aria-hidden="true" class="fixed inset-0 bg-black bg-opacity-50 flex items-end justify-end z-50 hidden" id="messageModal">
    <div aria-labelledby="modalTitle" aria-modal="true" class="bg-white rounded-t-lg shadow-lg w-80 max-w-full mx-4 p-6 relative flex flex-col" role="dialog">
      <button aria-label="Cerrar chat de mensajes" class="absolute top-3 right-3 text-gray-600 hover:text-gray-900 text-2xl font-bold" id="closeMessageModal" type="button">
        ×
      </button>
      <h3 class="text-xl font-bold mb-4 text-green-600 flex items-center gap-2" id="modalTitle">
        <i class="fas fa-comment-alt"></i>
        Chat Mensajes
      </h3>
      <form class="flex flex-col gap-4" id="messageForm">
        <label class="flex flex-col text-sm font-semibold text-gray-700">
          Nombre
          <input class="mt-1 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" name="nombre" placeholder="Tu nombre" required="" type="text"/>
        </label>
        <label class="flex flex-col text-sm font-semibold text-gray-700">
          Correo
          <input class="mt-1 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" name="correo" placeholder="tu@email.com" required="" type="email"/>
        </label>
        <label class="flex flex-col text-sm font-semibold text-gray-700">
          Comentario
          <textarea class="mt-1 border border-gray-300 rounded-md px-3 py-2 resize-none focus:outline-none focus:ring-2 focus:ring-green-600" name="comentario" placeholder="Escribe tu comentario" required="" rows="3"></textarea>
        </label>
        <button class="bg-green-600 hover:bg-green-700 text-white font-semibold rounded-full py-2 mt-2" type="submit">
          Enviar
        </button>
      </form>
    </div>
  </div>

  <!-- Modal backdrop -->
  <div
    id="modal-backdrop"
    class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"
    aria-hidden="true"
  ></div>

  <!-- Modal menu -->
  <div
    id="modal-menu"
    class="fixed top-0 right-0 h-full w-64 bg-white shadow-lg transform translate-x-full transition-transform z-50"
    role="dialog"
    aria-modal="true"
    aria-labelledby="modal-menu-title"
  >
   <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
    <h3
      id="modal-menu-title"
      class="font-extrabold text-lg uppercase text-black"
    >
     Menú
    </h3>
    <button
      id="modal-close"
      aria-label="Close menu"
      class="text-black text-2xl focus:outline-none"
      type="button"
    >
     <i class="fas fa-times"></i>
    </button>
   </div>
   <nav class="flex flex-col px-4 py-6 space-y-4 font-extrabold text-[16px]">
    <a class="hover:underline" href="#">Inicio</a>
    <a class="hover:underline" href="about.php">Sobre Nosotros</a>
    <a class="hover:underline" href="#">Blog</a>
    <a class="hover:underline" href="#">Miembros</a>
    <a class="hover:underline" href="#">Comunidad</a>
    <button
      class="mt-6 bg-red-600 text-white text-[14px] font-extrabold uppercase rounded-full px-4 py-2 whitespace-nowrap"
      type="button"
    >
     Administrador
    </button>
   </nav>
  </div>
<!-- Scripts / Carousel -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.5.2/jquery-migrate.min.js" integrity="sha512-BzvgYEoHXuphX+g7B/laemJGYFdrq4fTKEo+B3PurSxstMZtwu28FHkPKXu6dSBCzbUWqz/rMv755nUwhjQypw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
        // =============================================
    // 1. Modal simple para la galería de imágenes/videos
    // =============================================
const galleryModal = document.createElement('div');
    galleryModal.id = 'galleryModal';
    
    const galleryModalContent = document.createElement('div');
    
    const closeGalleryBtn = document.createElement('button');
    closeGalleryBtn.innerHTML = '<i class="fas fa-times"></i>';
    
    galleryModalContent.appendChild(closeGalleryBtn);
    galleryModal.appendChild(galleryModalContent);
    document.body.appendChild(galleryModal);
    
    function showGalleryModal(type, src) {
        galleryModalContent.innerHTML = '';
        galleryModalContent.appendChild(closeGalleryBtn);
        
        if (type === 'image') {
            const img = document.createElement('img');
            img.src = src;
            galleryModalContent.insertBefore(img, closeGalleryBtn);
        } else if (type === 'video') {
            const video = document.createElement('video');
            video.controls = true;
            video.autoplay = true;
            const source = document.createElement('source');
            source.src = src;
            source.type = 'video/mp4';
            video.appendChild(source);
            galleryModalContent.insertBefore(video, closeGalleryBtn);
        }
        
        galleryModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    
    function hideGalleryModal() {
        galleryModal.style.display = 'none';
        document.body.style.overflow = '';
    }
    
    closeGalleryBtn.addEventListener('click', hideGalleryModal);
    
    document.querySelectorAll('.gallery-item').forEach(item => {
        item.addEventListener('click', function() {
            const type = this.getAttribute('data-type');
            const src = this.getAttribute('data-src');
            showGalleryModal(type, src);
        });
    });

    //Filtrar la galería por tipo (imágenes/videos)
    document.getElementById("filter").addEventListener("change", function () {
      const selected = this.value;
      const items = document.querySelectorAll(".gallery-item");

      items.forEach(item => {
        const type = item.dataset.type; 

        if (selected === "all" || type === selected) {
          item.style.display = "flex";
        } else {
          item.style.display = "none";
        }
      });
    });
    // =============================================
    $(document).ready(function(){
    $('.comentarios-carrusel').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: true,
            dots: true,
            responsive: [
            {
            breakpoint: 1450,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
            },
            {
            breakpoint: 1100,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
            },
            {
            breakpoint: 750,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
            }
        ]
        });
        });
  </script>
  <script src="../assets/js/home.js"></script>
</body>
<?php include '../layout/footer.php'?>
</html>