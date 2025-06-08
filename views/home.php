<html lang="es">
 <head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>Cabo Alberto Reyes Gamarra</title>
    <link rel="icon" href="/PROYECTO-MILITAR/views/assets/img/logo.jpg" type="image/png">
  <script src="https://cdn.tailwindcss.com"></script>
  <link
   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
   rel="stylesheet"
  />
  <link
   href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&amp;display=swap"
   rel="stylesheet"
  />
  <link rel="stylesheet" href="<?= BASE_URL ?>views/assets/css/efecto.css">
  <style>
   body {
    font-family: "Montserrat", sans-serif;
    transition: opacity 0.5s ease;
   }
   .hover-border-animate {
    border-width: 4px !important;
    animation: border-move 1.5s linear infinite;
   }
   @keyframes border-move {
    0% {
     border-color: #22c55e #16a34a #22c55e #16a34a;
    }
    25% {
     border-color: #16a34a #22c55e #16a34a #22c55e;
    }
    50% {
     border-color: #22c55e #16a34a #22c55e #16a34a;
    }
    75% {
     border-color: #16a34a #22c55e #16a34a #22c55e;
    }
    100% {
     border-color: #22c55e #16a34a #22c55e #16a34a;
    }
   }
   body.scrolled {
    opacity: 0.85;
   }
   /* Instagram style member card with hover overlay */
   .member-card {
    position: relative;
    border-radius: 0.75rem;
    overflow: hidden;
    box-shadow: 0 1px 3px rgb(0 0 0 / 0.1),
     0 1px 2px rgb(0 0 0 / 0.06);
    transition: box-shadow 0.3s ease;
    cursor: pointer;
   }
   .member-card:hover {
    box-shadow: 0 10px 15px rgb(0 0 0 / 0.2),
     0 4px 6px rgb(0 0 0 / 0.1);
   }
   .member-image {
    display: block;
    width: 100%;
    aspect-ratio: 1 / 1;
    object-fit: cover;
   }
   .member-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(255, 255, 255, 0.95);
    padding: 1rem;
    text-align: center;
    transform: translateY(100%);
    transition: transform 0.3s ease, opacity 0.3s ease;
    border-top-left-radius: 0.75rem;
    border-top-right-radius: 0.75rem;
    opacity: 0;
   }
   .member-card:hover .member-overlay {
    transform: translateY(0);
    opacity: 1;
   }
   .member-name {
    font-weight: 600;
    font-size: 1.125rem;
    color: #111827;
    margin-bottom: 0.25rem;
   }
   .member-role {
    font-size: 0.875rem;
    color: #6b7280;
   }
   /* Show overlay content normally on small screens */
   @media (max-width: 767px) {
    .member-overlay {
     position: static !important;
     background: transparent !important;
     padding: 0.5rem 0 0 0 !important;
     transform: translateY(0) !important;
     opacity: 1 !important;
     border-radius: 0 !important;
     box-shadow: none !important;
    }
    .member-card:hover {
     box-shadow: 0 1px 3px rgb(0 0 0 / 0.1),
      0 1px 2px rgb(0 0 0 / 0.06) !important;
    }
   }
   /* Emprendimientos card styles */
   .emprendimiento-card {
    position: relative;
    border-radius: 1rem;
    overflow: hidden;
    cursor: pointer;
    box-shadow: 0 4px 12px rgb(0 0 0 / 0.1);
    transition: box-shadow 0.3s ease, transform 0.3s ease;
   }
   .emprendimiento-card:hover {
    box-shadow: 0 10px 30px rgb(0 0 0 / 0.2);
    transform: translateY(-6px);
   }
   .emprendimiento-image {
    width: 100%;
    aspect-ratio: 16 / 9;
    object-fit: cover;
    display: block;
    border-radius: 1rem;
   }
   .emprendimiento-overlay {
    position: absolute;
    inset: 0;
    background-color: rgba(0, 0, 0, 0.45);
    opacity: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: opacity 0.3s ease;
    border-radius: 1rem;
   }
   .emprendimiento-card:hover .emprendimiento-overlay {
    opacity: 1;
   }
   .emprendimiento-overlay i {
    color: white;
    font-size: 2.5rem;
    filter: drop-shadow(0 0 4px rgba(0, 0, 0, 0.7));
   }
   .btn-ver-mas {
    background-color: #16a34a;
    color: white;
    font-weight: 600;
    padding: 0.75rem 2rem;
    border-radius: 0.5rem;
    text-decoration: none;
    display: inline-block;
    transition: background-color 0.3s ease;
    margin-top: 1.5rem;
   }
   .btn-ver-mas:hover {
    background-color: #15803d;
   }
   /* Carousel styles */
   .carousel-container {
    position: relative;
    max-width: 6xl;
    margin-left: auto;
    margin-right: auto;
    padding-left: 1.5rem;
    padding-right: 1.5rem;
    padding-top: 3rem;
    padding-bottom: 3rem;
   }
   .carousel-title {
    font-weight: 700;
    font-size: 1.875rem;
    color: #1f2937;
    text-align: center;
    margin-bottom: 2rem;
   }
   .carousel-wrapper {
    overflow: hidden;
    position: relative;
   }
   .carousel-track {
    display: flex;
    transition: transform 0.5s ease;
   }
   .carousel-item {
    flex: 0 0 33.3333%;
    padding: 0 0.75rem;
    box-sizing: border-box;
   }
   .comment-card {
  display: flex;
  align-items: center;
  gap: 16px;
  padding: 12px 16px;
  border-radius: 12px;
  background-color: #f9f9f9;
  box-shadow: 0 0 10px rgba(0,0,0,0.05);
}
.comment-avatar-inicial {
  width: 56px;
  height: 56px;
  border-radius: 50%;
  color: white;
  font-weight: bold;
  font-size: 24px;
  display: flex;
  align-items: center;
  justify-content: center;
  text-transform: uppercase;
  flex-shrink: 0;
}
   .comment-avatar {
    flex-shrink: 0;
    width: 56px;
    height: 56px;
    border-radius: 9999px;
    object-fit: cover;
   }
   .comment-content {
    flex-grow: 1;
   }
   .comment-name {
    font-weight: 700;
    color: #111827;
    margin-bottom: 0.25rem;
   }
   .comment-text {
    font-size: 0.95rem;
    color: #4b5563;
    line-height: 1.4;
   }
   .carousel-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(34, 197, 94, 0.8);
    border: none;
    color: white;
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 9999px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.3s ease;
    z-index: 10;
   }
   .carousel-button:hover {
    background-color: #15803d;
   }
   .carousel-button:disabled {
    background-color: rgba(34, 197, 94, 0.4);
    cursor: default;
   }
   .carousel-button.prev {
    left: 0.5rem;
   }
   .carousel-button.next {
    right: 0.5rem;
   }
   @media (max-width: 767px) {
    .carousel-item {
     flex: 0 0 100%;
     padding: 0 0.5rem;
    }
   }
   /* Scroll to top button */
   #scrollTopBtn {
    position: fixed;
    bottom: 2.5rem;
    right: 2.5rem;
    background-color: #16a34a;
    color: white;
    border: none;
    width: 3.5rem;
    height: 3.5rem;
    border-radius: 9999px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 12px rgb(22 163 74 / 0.6);
    transition: background-color 0.3s ease, opacity 0.3s ease;
    opacity: 0;
    pointer-events: none;
    z-index: 50;
   }
   #scrollTopBtn.show {
    opacity: 1;
    pointer-events: auto;
   }
   #scrollTopBtn:hover {
    background-color: #15803d;
   }
   #chatFormulario {
  display: none;
  position: fixed;
  bottom: 50px;
  right: 30px;
  width: 300px;
  background: white;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
  border-radius: 10px;
  padding: 20px;
  z-index: 1000;
}

#chatFormulario h3 {
  margin-top: 0;
  color: #28a745;
  font-size: 18px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

#chatFormulario input,
#chatFormulario textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 6px;
}

#chatFormulario button.enviar {
  background-color: #28a745;
  color: white;
  border: none;
  padding: 10px;
  width: 100%;
  border-radius: 25px;
  font-weight: bold;
  cursor: pointer;
}

#chatFormulario .cerrar {
  background: none;
  border: none;
  font-size: 20px;
  cursor: pointer;
}

#btnAbrirChat {
  position: fixed;
  bottom: 120px;
  right: 30px;
  padding: 10px 20px;
  border: none;
  border-radius: 25px;
  background-color:rgb(48, 48, 48);
  color: white;
  font-weight: bold;
  cursor: pointer;
  z-index: 999;
}
  </style>
 </head><?php
    include 'layout/header.php';
    ?>
 <body class="bg-gray-100">
    <div id="preloader">
        <img src="/PROYECTO-MILITAR/views/assets/img/logo.jpg" alt="Cargando..."> <!-- Cambia por la ruta de tu logo -->
    </div>
  <header class="relative w-full max-w-full overflow-hidden h-96 sm:h-[28rem] md:h-[36rem] lg:h-[42rem] xl:h-[48rem]">
    <div class="carrusel-slides-container w-full h-full relative">
        <?php if (!empty($itemsCarrusel) && is_array($itemsCarrusel)): ?>
            <?php foreach ($itemsCarrusel as $index => $item): ?>
                <div class="carrusel-slide absolute inset-0 transition-opacity duration-700 <?= $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' ?>">
                    <?php if (!empty($item['img'])): ?>
                        <?php echo "<!-- DEBUG IMG FILENAME: " . htmlspecialchars($item['img']) . " -->"; ?>
                        <img
                            src="<?= BASE_URL ?>uploads/carrusel/<?= htmlspecialchars($item['img']) ?>"
                            alt="Foto de banner principal"
                            class="w-full h-full object-cover"
                            loading="lazy"
                            width="1920"
                            height="500"
                        />
                    <?php else: ?>
                        <img
                            src="https://via.placeholder.com/1920x900.png?text=Imagen+no+disponible"
                            alt="Imagen no disponible"
                            class="w-full h-full object-cover"
                        />
                    <?php endif; ?>

                    <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 bg-black bg-opacity-60 text-white px-6 py-4 rounded-md max-w-6xl w-[90%] text-center">
                        <h1 class="text-xl sm:text-3xl md:text-4xl font-bold leading-tight">
                            <?= htmlspecialchars($item['titulo'] ?? 'Título no disponible') ?>
                        </h1>
                        <p class="mt-2 text-sm sm:text-lg md:text-xl font-normal leading-relaxed hidden xs:block sm:block md:block">
                            <?= htmlspecialchars($item['descripcion'] ?? 'Descripción no disponible') ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- Slide por defecto -->
            <div class="carrusel-slide absolute inset-0 opacity-100 z-10">
                <img
                    src="uploads/67dd77800ef0a.png"
                    alt="No hay items en carrusel"
                    class="w-full h-full object-cover"
                />
                <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 bg-black bg-opacity-60 text-white px-6 py-4 rounded-md max-w-6xl w-[90%] text-center">
                    <h1 class="text-xl sm:text-3xl md:text-4xl font-bold leading-tight">Sin contenido</h1>
                    <p class="mt-2 text-sm sm:text-lg md:text-xl font-normal leading-relaxed">No hay elementos para mostrar en el carrusel.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Controles del Carrusel -->
    <?php if (!empty($itemsCarrusel) && count($itemsCarrusel) > 1): ?>
        <button class="carrusel-control prev absolute left-4 top-1/2 transform -translate-y-1/2 text-white text-3xl z-20">&#10094;</button>
        <button class="carrusel-control next absolute right-4 top-1/2 transform -translate-y-1/2 text-white text-3xl z-20">&#10095;</button>
    <?php endif; ?>

    <!-- Indicadores de slides -->
    <?php if (!empty($itemsCarrusel) && count($itemsCarrusel) > 1): ?>
        <div class="carrusel-indicadores absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2 z-20">
            <?php foreach ($itemsCarrusel as $index => $item): ?>
                <span class="indicador-dot w-3 h-3 rounded-full bg-white bg-opacity-70 <?= $index === 0 ? 'opacity-100' : 'opacity-50' ?>" data-slide-to="<?= $index ?>"></span>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</header>
  <section class="max-w-6xl mx-auto px-6 py-8">
    <?php if (!empty($itemsCarrusel) && is_array($itemsCarrusel)): ?>
                    <?php $item = $itemsCarrusel[0]; ?>
   <h2 class="text-3xl font-bold text-gray-800 mb-2 text-center sm:text-left">
    Sobre nosotros
   </h2>
   <div class="flex flex-col md:flex-row md:items-center md:space-x-10">
    <div class="md:w-1/2 text-gray-700 text-base sm:text-lg leading-relaxed mb-8 md:mb-0">
         <?php if (!empty($itemsCarrusel)): ?>
      <?php foreach ($itemsCarrusel as $item): ?>
          <?php
          $parrafos = preg_split('/\r\n|\r|\n/', $item['nosotros'], -1, PREG_SPLIT_NO_EMPTY);
          foreach ($parrafos as $p):
          ?>
     <p>
      <?= htmlspecialchars(trim($p)) ?>
     </p>
     <?php endforeach; ?>
      <?php endforeach; ?>
  <?php else: ?>
      <p>No hay información disponible.</p>
  <?php endif; ?>
    </div>
    <?php if (isset($item['tipo_archivo']) && $item['tipo_archivo'] === 'video'): ?>
    <div class="md:w-1/2 aspect-w-16 aspect-h-9">
     <iframe allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" 
     aria-label="Video institucional sobre la promoción Cabo Alberto Reyes Gamarra mostrando actividades militares y valores" class="w-full h-64 md:h-80 rounded-md shadow-lg" 
     src="https://www.youtube.com/embed/<?= htmlspecialchars($item['url_archivo']) ?>" 
     title="Video institucional promoción Cabo Alberto Reyes Gamarra"></iframe>
    </div>
    <?php else: ?>
        <img src="<?= htmlspecialchars($item['url_archivo']) ?>" alt="Imagen nosotros">
                        <?php endif; ?>
   </div>
   <?php endif; ?>
  </section>
  <section class="max-w-6xl mx-auto px-6 py-8">
   <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Especialidades</h2>
   <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mb-6">
    <?php foreach ($especialidades as $especialidad): ?>
    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col">
     <img alt="Soldado en entrenamiento de infantería con uniforme militar y equipo táctico en campo abierto" class="w-full h-48 object-cover" 
     height="400" loading="lazy" src="<?= htmlspecialchars($especialidad['imagen']) ?>" width="600"/>
     <div class="p-4 flex flex-col flex-grow">
        
      <h3 class="text-xl font-semibold text-gray-800 mb-2"><?= htmlspecialchars($especialidad['nombre']) ?></h3>
      <a class="mt-4 group bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded transition-colors w-full sm:w-auto self-start flex items-center space-x-2" href="<?= BASE_URL ?>especialidad_index/<?= $especialidad['id'] ?>">
       <span>Ver</span>
       <i class="fas fa-eye opacity-0 group-hover:opacity-100 transition-opacity"></i>
      </a>
     </div>
    </div>
    <?php endforeach; ?>
   </div>
   <div class="text-center mb-12">
    <a class="inline-block bg-green-700 hover:bg-green-800 text-white font-semibold py-3 px-8 rounded transition-colors" 
    href="/PROYECTO-MILITAR/especialidad_index">
     Ver todo
    </a>
   </div>
   <div class="relative bg-gradient-to-r from-green-600 via-green-700 to-green-800 rounded-lg shadow-lg py-12 px-6 sm:px-12 text-center overflow-hidden max-w-[150rem] mx-auto">
    <img alt="Decorative abstract green geometric shapes background" class="pointer-events-none select-none absolute top-0 left-1/2 transform -translate-x-1/2 opacity-20 w-full max-w-[1400px]" height="300" 
    loading="lazy" src="https://media.istockphoto.com/id/1152192940/es/foto/m%C3%A1rmol-azul-claro-fondo-negro-ne%C3%B3n-menta-perla-verde-onda-patr%C3%B3n-abstracto-gradiente-ebru.jpg?s=612x612&w=0&k=20&c=L-loZ85Ax4V0bFYe8IlyVoKlUAJYdipqyDLsnOd9kuM=" width="1200"/>
    <h3 class="relative text-white text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-wide drop-shadow-lg">
     FORJANDO UN LEGADO DE HONOR Y COMPROMISO
    </h3>
   </div>
  </section>
  <section class="max-w-6xl mx-auto px-6 py-12">
  <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Miembros</h2>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
    <?php foreach ($miembros as $miembro): ?>
      <a href="<?= BASE_URL ?>miembro/<?= $miembro['id'] ?>" class="group block member-card transition transform hover:scale-105">
        <img
          alt="Retrato de <?= htmlspecialchars($miembro['nombre']) ?>"
          class="member-image w-full h-auto"
          height="400"
          loading="lazy"
          src="<?= BASE_URL ?>uploads/usuarios/imagenes/<?= htmlspecialchars($miembro['imagen_usuario']) ?>"
          width="400"
        />
        <div class="member-overlay opacity-0 md:opacity-100 md:translate-y-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 transition duration-300 ease-in-out">
          <h3 class="member-name"><?= htmlspecialchars($miembro['nombre']) ?></h3>
        </div>
      </a>
    <?php endforeach; ?>
  </div>

  <!-- Botón Ver Más -->
  <div class="flex justify-center mt-12">
    <a href="<?= BASE_URL ?>miembros" class="bg-gray-900 hover:bg-gray-800 text-white font-semibold rounded-full px-10 py-3 shadow-lg transition-colors duration-300">
      Ver Más <i class="fas fa-arrow-right ml-2"></i>
    </a>
  </div>
</section>
  <section class="max-w-6xl mx-auto px-6 py-12">
   <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Emprendimientos</h2>
   <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    <?php if (!empty($emprendimientos)): ?>
                    <?php foreach ($emprendimientos as $emprendimiento): ?>
    <article class="emprendimiento-card group relative">
        <?php
                            // Valor por defecto si no hay imagen
                            $imagenMostrar = '/PROYECTO-MILITAR/uploads/emprendimiento/default.png';

                            // Buscar la primera imagen de la galería si existe
                            if (!empty($emprendimiento['galeria'])) {
                                foreach ($emprendimiento['galeria'] as $media) {
                                    if (!empty($media['nombre_imagen'])) {
                                        $imagenMostrar = '/PROYECTO-MILITAR/uploads/emprendimiento/' . $media['nombre_imagen'];
                                        break;
                                    }
                                }
                            }
                            ?>
     <img alt="Imagen representativa de emprendimiento tecnológico con diseño futurista y minimalista" class="emprendimiento-image" 
     height="338" loading="lazy" src="<?= htmlspecialchars($imagenMostrar) ?>" width="600"/>
     <div class="emprendimiento-overlay opacity-0 group-hover:opacity-100 transition-opacity">
      <div class="emprendimiento-overlay opacity-0 group-hover:opacity-100 transition-opacity">
  <a href="<?= BASE_URL ?>emprendimientos/<?= $emprendimiento['id'] ?>" class="text-white text-xl">
    <i class="fas fa-eye"></i>
  </a>
</div>
     </div>
    </article>
    <?php endforeach; ?>
                <?php else: ?>
                    <p class="no-emprendimientos">Actualmente no hay emprendimientos para mostrar.</p>
                <?php endif; ?>
   </div>
   <div class="text-center">
    <a href="<?= BASE_URL ?>negocios" class="btn-ver-mas" type="button">
     Ver más Emprendimientos
    </a>
   </div>
  </section>
  <button id="btnAbrirChat">Abrir Chat</button>
        <form id="chatFormulario" method="POST" action="index.php?action=comentarios/agregar">
            <h3>
                <span>💬 Chat Mensajes</span>
                <button type="button" class="cerrar" id="btnCerrarChat">×</button>
            </h3>
            <input type="text" name="nombre" placeholder="Tu nombre" required>
            <input type="email" name="correo" placeholder="tu@email.com" required>
            <textarea name="comentario" rows="4" placeholder="Escribe tu comentario" required></textarea>
            <button type="submit" class="enviar">Enviar</button>
        </form>
  <section class="carousel-container max-w-6xl mx-auto px-6 py-12">
   <h2 class="carousel-title">Comentarios</h2>
   <div class="carousel-wrapper relative">
    <button aria-label="Anterior" class="carousel-button prev" id="prevBtn" type="button">
     <i class="fas fa-chevron-left"></i>
    </button>
    <?php
function obtenerColorPorNombre($nombre) {
    $colores = [
        '#f44336', // rojo
        '#e91e63', // rosa
        '#9c27b0', // púrpura
        '#3f51b5', // azul
        '#03a9f4', // celeste
        '#009688', // verde azulado
        '#4caf50', // verde
        '#ff9800', // naranja
        '#795548', // marrón
        '#607d8b'  // gris azulado
    ];
    $index = ord(strtoupper(mb_substr($nombre, 0, 1, 'UTF-8'))) % count($colores);
    return $colores[$index];
}
?>

<div class="carousel-track" id="carouselTrack">
    <?php foreach ($comentarios as $comentario): ?>
        <div class="carousel-item">
            <div class="comment-card">
                <div class="comment-avatar-inicial"
                     style="background-color: <?= obtenerColorPorNombre($comentario['nombre']) ?>;">
                    <?= strtoupper(mb_substr($comentario['nombre'], 0, 1, 'UTF-8')) ?>
                </div>
                <div class="comment-content">
                    <h3 class="comment-name"><?= htmlspecialchars($comentario['nombre']) ?></h3>
                    <p class="comment-text"><?= htmlspecialchars($comentario['comentario']) ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
    <button aria-label="Siguiente" class="carousel-button next" id="nextBtn" type="button">
     <i class="fas fa-chevron-right"></i>
    </button>
   </div>
  </section>
  <button aria-label="Subir arriba" id="scrollTopBtn" title="Ir arriba" type="button">
   <i class="fas fa-chevron-up"></i>
  </button>
  <script>
   (() => {
    const track = document.getElementById("carouselTrack");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const items = track.children;
    const totalItems = items.length;
    let visibleItems = 3;
    let currentIndex = 0;

    function updateVisibleItems() {
     if (window.innerWidth < 768) {
      visibleItems = 1;
     } else {
      visibleItems = 3;
     }
    }

    function updateCarousel() {
     const translateX = -(currentIndex * (100 / visibleItems));
     track.style.transform = `translateX(${translateX}%)`;
     prevBtn.disabled = currentIndex === 0;
     nextBtn.disabled = currentIndex >= totalItems - visibleItems;
    }

    prevBtn.addEventListener("click", () => {
     if (currentIndex > 0) {
      currentIndex--;
      updateCarousel();
     }
    });

    nextBtn.addEventListener("click", () => {
     if (currentIndex < totalItems - visibleItems) {
      currentIndex++;
      updateCarousel();
     }
    });

    // Auto slide every 3 seconds
    setInterval(() => {
     if (currentIndex < totalItems - visibleItems) {
      currentIndex++;
     } else {
      currentIndex = 0;
     }
     updateCarousel();
    }, 10000);

    // Update visible items on resize
    window.addEventListener("resize", () => {
     const oldVisible = visibleItems;
     updateVisibleItems();
     if (oldVisible !== visibleItems) {
      if (currentIndex > totalItems - visibleItems) {
       currentIndex = Math.max(0, totalItems - visibleItems);
      }
      updateCarousel();
     }
    });

    // Initialize
    updateVisibleItems();
    updateCarousel();
   })();

   // Scroll to top button
   const scrollTopBtn = document.getElementById("scrollTopBtn");
   window.addEventListener("scroll", () => {
    if (window.scrollY > 300) {
     scrollTopBtn.classList.add("show");
    } else {
     scrollTopBtn.classList.remove("show");
    }
   });
   scrollTopBtn.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
   });
  </script>
  <script>
    const slides = document.querySelectorAll('.carrusel-slide');
    const dots = document.querySelectorAll('.indicador-dot');
    const nextBtn = document.querySelector('.carrusel-control.next');
    const prevBtn = document.querySelector('.carrusel-control.prev');
    let currentIndex = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('opacity-100', i === index);
            slide.classList.toggle('z-10', i === index);
            slide.classList.toggle('opacity-0', i !== index);
            slide.classList.toggle('z-0', i !== index);
        });
        dots.forEach((dot, i) => {
            dot.classList.toggle('opacity-100', i === index);
            dot.classList.toggle('opacity-50', i !== index);
        });
        currentIndex = index;
    }

    nextBtn?.addEventListener('click', () => {
        let nextIndex = (currentIndex + 1) % slides.length;
        showSlide(nextIndex);
    });

    prevBtn?.addEventListener('click', () => {
        let prevIndex = (currentIndex - 1 + slides.length) % slides.length;
        showSlide(prevIndex);
    });

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => showSlide(index));
    });

    // Opcional: carrusel automático
    setInterval(() => {
        let nextIndex = (currentIndex + 1) % slides.length;
        showSlide(nextIndex);
    }, 5000);
</script>
<script>
    // Script para manejar el preloader
    document.addEventListener('DOMContentLoaded', function() {
        const preloader = document.getElementById('preloader');
        const body = document.body;
        
        // Forzar el repintado para asegurar que la animación funcione
        void preloader.offsetWidth;
        
        // Mostrar por exactamente 3 segundos
        setTimeout(function() {
            body.classList.add('loaded');
            
            // Eliminar el preloader después de la animación
            setTimeout(function() {
                preloader.remove();
                // Mostrar todo el contenido
                document.querySelectorAll('body > *:not(script)').forEach(el => {
                    el.style.visibility = 'visible';
                });
            }, 500); // Medio segundo para la transición de desvanecimiento
        }, 3000); // 3 segundos exactos
    });
</script>
<script src="<?= BASE_URL ?>views/assets/js/chat.js"></script>
<?php
    include 'layout/footer.php';
    ?>
 </body>
</html>