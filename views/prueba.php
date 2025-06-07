<html lang="es">
 <head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>Promocion Cabo Alberto</title>
  <link rel="icon" href="/PROYECTO-MILITAR/views/assets/img/logo.jpg" type="image/png">
  <script src="https://cdn.tailwindcss.com"></script>
  <link
   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
   rel="stylesheet"
  />
  <link
   href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap"
   rel="stylesheet"
  />
  <style>
   body {
    font-family: "Roboto", sans-serif;
   }
   .zoom-hover {
    transition: transform 0.3s ease;
   }
   .zoom-hover:hover {
    transform: scale(1.05);
   }
   /* Carousel container */
   .carousel-container {
    position: relative;
    max-width: 100%;
    overflow: hidden;
    margin: 0 auto;
   }
   /* Carousel track */
   .carousel-track {
    display: flex;
    transition: transform 0.5s ease-in-out;
    will-change: transform;
   }
   /* Carousel item */
   .carousel-item {
    flex: 0 0 100%;
    max-width: 100%;
    padding: 1rem;
    box-sizing: border-box;
   }
   @media (min-width: 640px) {
    .carousel-item {
     flex: 0 0 50%;
     max-width: 50%;
    }
   }
   @media (min-width: 1024px) {
    .carousel-item {
     flex: 0 0 33.3333%;
     max-width: 33.3333%;
    }
   }
   /* Adjust overlay to match image size */
   header.relative {
    display: inline-block;
    width: 100%;
    position: relative;
   }
   header.relative > img {
    display: block;
    width: 100%;
    height: 280px;
    object-fit: cover;
  }
   header.relative > .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 280px;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: center;
    text-align: center;
    padding: 2rem 1rem 2.5rem;
    box-sizing: border-box;
   }
  </style>
 </head>
 <body class="m-0 p-0 bg-white">
  <header class="relative carrusel-principal">
    <?php if (!empty($itemsCarrusel) && is_array($itemsCarrusel)): ?>
        <?php foreach ($itemsCarrusel as $index => $item): ?>
            <div class="carrusel-slide <?= $index === 0 ? 'active' : 'hidden' ?>" style="position: relative;">
                <?php if (!empty($item['img'])): ?>
                    <img
                        alt="<?= htmlspecialchars($item['titulo'] ?? 'Banner principal') ?>"
                        loading="lazy"
                        src="<?= BASE_URL ?>uploads/carrusel/<?= htmlspecialchars($item['img']) ?>"
                        width="1920"
                        height="280"
                        class="w-full object-cover"
                    />
                <?php else: ?>
                    <img
                        src="https://via.placeholder.com/1920x280.png?text=Imagen+no+disponible"
                        alt="Imagen no disponible"
                        class="w-full object-cover"
                    />
                <?php endif; ?>
                <div class="overlay absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-start p-8">
                    <h1 class="text-white text-3xl sm:text-4xl md:text-5xl font-bold leading-tight max-w-4xl">
                        <?= htmlspecialchars($item['titulo'] ?? 'Título no disponible') ?>
                    </h1>
                    <p class="text-white mt-3 max-w-3xl text-base sm:text-lg md:text-xl">
                        <?= htmlspecialchars($item['descripcion'] ?? 'Descripción no disponible') ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="relative">
            <img
                src="uploads/67dd77800ef0a.png"
                alt="No hay items en carrusel o imagen por defecto no encontrada"
                class="w-full object-cover"
                width="1920"
                height="280"
            />
            <div class="overlay absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-start p-8">
                <h1 class="text-white text-3xl font-bold">Sin contenido</h1>
                <p class="text-white mt-3 text-lg">No hay elementos para mostrar en el carrusel.</p>
            </div>
        </div>
    <?php endif; ?>

    <!-- Controles e indicadores si hay más de una imagen -->
    <?php if (!empty($itemsCarrusel) && count($itemsCarrusel) > 1): ?>
        <button class="carrusel-control prev absolute top-1/2 left-4 transform -translate-y-1/2 text-white text-4xl z-10" aria-label="Anterior">&#10094;</button>
        <button class="carrusel-control next absolute top-1/2 right-4 transform -translate-y-1/2 text-white text-4xl z-10" aria-label="Siguiente">&#10095;</button>

        <div class="carrusel-indicadores flex justify-center mt-2 space-x-2">
            <?php foreach ($itemsCarrusel as $index => $item): ?>
                <span class="indicador-dot cursor-pointer <?= $index === 0 ? 'active bg-white' : 'bg-gray-400' ?>" data-slide-to="<?= $index ?>" style="width:10px; height:10px; border-radius:50%; display:inline-block;"></span>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</header>
  <section class="max-w-7xl mx-auto px-4 py-12 sm:py-16">
  <div class="flex flex-col md:flex-row items-center md:items-start md:space-x-12">
    <div class="w-full md:w-1/2 mb-8 md:mb-0">
      <?php if (!empty($itemsCarrusel) && is_array($itemsCarrusel)): ?>
        <?php $item = $itemsCarrusel[0]; ?>
        <?php if (isset($item['tipo_archivo']) && $item['tipo_archivo'] === 'video' && !empty($item['url_archivo'])): ?>
          <div class="video-slider">
            <iframe
              width="100%"
              height="315"
              src="https://www.youtube.com/embed/<?= htmlspecialchars($item['url_archivo']) ?>"
              frameborder="0"
              allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen
              aria-label="Video institucional sobre la promoción <?= htmlspecialchars($item['titulo'] ?? 'CABO ALBERTO REYES GAMARRA') ?>"
              class="rounded-lg shadow-lg"
            ></iframe>
          </div>
        <?php else: ?>
          <p>Video no disponible.</p>
        <?php endif; ?>
      <?php else: ?>
        <p>No hay contenido para mostrar.</p>
      <?php endif; ?>
    </div>

    <div class="w-full md:w-1/2">
      <h2 class="text-3xl font-bold text-gray-900 mb-4">Sobre Nosotros</h2>
      <p class="text-gray-700 text-lg leading-relaxed">
        <?= htmlspecialchars($itemsCarrusel[0]['nosotros'] ?? 'La promoción CABO ALBERTO REYES GAMARRA representa el compromiso, la lealtad y la entrega al servicio militar.') ?>
      </p>
    </div>
  </div>
</section>
 <section class="max-w-7xl mx-auto px-4 py-12 sm:py-16 bg-gray-50">
  <h2 class="text-3xl font-bold text-gray-900 mb-10 text-center">Especialidades</h2>
  
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mb-8">
    <?php foreach ($especialidades as $especialidad): ?>
      <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col zoom-hover">
        <img
          alt="Imagen de la especialidad <?= htmlspecialchars($especialidad['nombre']) ?>"
          class="w-full h-48 object-cover"
          loading="lazy"
          src="<?= htmlspecialchars($especialidad['imagen']) ?>"
          width="600"
          height="400"
        />
        <div class="p-6 flex flex-col flex-grow">
          <h3 class="text-xl font-semibold mb-2 text-gray-900"><?= htmlspecialchars($especialidad['nombre']) ?></h3>
          <p class="text-gray-700 flex-grow">
            <?= htmlspecialchars($especialidad['descripcion'] ?? 'Descripción no disponible') ?>
          </p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  
  <div class="flex justify-center mb-12">
    <button
      class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
    >
      Ver más especialidades
    </button>
  </div>
</section>
  <section class="w-full relative mt-12">
   <img
    alt="Banner ancho completo con fondo de cielo al amanecer con tonos cálidos y nubes suaves"
    class="w-full h-48 sm:h-64 md:h-72 lg:h-80 object-cover"
    height="320"
    loading="lazy"
    src="https://storage.googleapis.com/a1aa/image/3e3f2816-4681-44c4-9ee8-d75dcef65d8a.jpg"
    width="1920"
   />
   <div
    class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center px-4 py-6"
   >
    <h2 class="text-white text-2xl sm:text-3xl md:text-4xl font-bold leading-tight">
     FORJANDO UN LEGADO DE HONOR Y COMPROMISO
    </h2>
    <p class="text-white mt-2 max-w-3xl text-sm sm:text-base md:text-lg">
     Una historia de valentía, compromiso y excelencia
    </p>
   </div>
  </section>
  <section class="max-w-7xl mx-auto px-4 py-12 sm:py-16">
  <h2 class="text-3xl font-bold text-gray-900 mb-10 text-center">Miembros</h2>
  
  <div
    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mb-8"
    role="list"
  >
    <?php foreach ($miembros as $miembro): ?>
      <article
        class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col items-center p-6 text-center hover:shadow-xl transition-shadow duration-300"
        role="listitem"
      >
        <img
          alt="Retrato de <?= htmlspecialchars($miembro['nombre']) ?>"
          class="w-32 h-32 rounded-full object-cover mb-4"
          height="128"
          loading="lazy"
          src="<?= BASE_URL ?>uploads/usuarios/imagenes/<?= htmlspecialchars($miembro['imagen_usuario']) ?>"
          width="128"
        />
        <h3 class="text-xl font-semibold text-gray-900 mb-1"><?= htmlspecialchars($miembro['nombre']) ?></h3>
        <p class="text-gray-600 mb-3 text-sm"><?= htmlspecialchars($miembro['rango'] ?? '') ?><?= isset($miembro['especialidad']) ? " - " . htmlspecialchars($miembro['especialidad']) : '' ?></p>
        <a href="<?= BASE_URL ?>miembro/<?= $miembro['id'] ?>" class="px-4 py-2 mt-auto bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors text-sm font-semibold">Ver Información</a>
      </article>
    <?php endforeach; ?>
  </div>

  <div class="flex justify-center mb-12">
    <a href="<?= BASE_URL ?>index.php?action=miembros" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
      Ver más miembros
    </a>
  </div>
</section>
  <section class="max-w-7xl mx-auto px-4 py-12 sm:py-16 bg-gray-50">
  <h2 class="text-3xl font-bold text-gray-900 mb-10 text-center">Emprendimientos</h2>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 mb-8">
    <?php if (!empty($emprendimientos)): ?>
      <?php foreach ($emprendimientos as $emprendimiento): ?>
        <?php
          // Valor por defecto si no hay imagen
          $imagenMostrar = BASE_URL . 'uploads/emprendimiento/default.png';

          // Buscar la primera imagen de la galería si existe
          if (!empty($emprendimiento['galeria'])) {
            foreach ($emprendimiento['galeria'] as $media) {
              if (!empty($media['nombre_imagen'])) {
                $imagenMostrar = BASE_URL . 'uploads/emprendimiento/' . $media['nombre_imagen'];
                break;
              }
            }
          }
        ?>
        <article class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col zoom-hover">
          <img
            alt="<?= htmlspecialchars($emprendimiento['nombre_emprendimiento']) ?>"
            class="w-full h-48 object-cover"
            height="400"
            loading="lazy"
            src="<?= htmlspecialchars($imagenMostrar) ?>"
            width="600"
          />
          <div class="p-6 flex flex-col flex-grow">
            <h3 class="text-xl font-semibold mb-2 text-gray-900"><?= htmlspecialchars($emprendimiento['nombre_emprendimiento']) ?></h3>
            <p class="text-gray-700 flex-grow"><?= htmlspecialchars($emprendimiento['descripcion']) ?></p>
            <a href="<?= BASE_URL ?>emprendimientos/<?= $emprendimiento['id'] ?>" class="mt-4 inline-block text-blue-600 hover:text-blue-800 font-semibold">Visitar sitio</a>
          </div>
        </article>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="col-span-full text-center text-gray-600">Actualmente no hay emprendimientos para mostrar.</p>
    <?php endif; ?>
  </div>

  <div class="flex justify-center mb-12">
    <a href="index.php?action=negocios" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
      Ver más emprendimientos
    </a>
  </div>
</section>
  <section class="max-w-7xl mx-auto px-4 py-12 sm:py-16">
  <h2 class="text-3xl font-bold text-gray-900 mb-10 text-center">Comentarios</h2>
  
  <div class="carousel-container overflow-x-auto snap-x snap-mandatory" aria-label="Carrusel de comentarios">
    <div class="carousel-track flex space-x-6" id="carouselTrack" role="list">
      <?php foreach ($comentarios as $comentario): ?>
        <?php
          // Avatar inicial con letra mayúscula
          $avatarLetter = strtoupper(mb_substr($comentario['nombre'], 0, 1, 'UTF-8'));
          
          // Fecha, si existe, o vacío
          $fecha = !empty($comentario['fecha']) ? date('j \d\e F, Y', strtotime($comentario['fecha'])) : '';
          
          // Imagen de perfil o placeholder con iniciales (opcional)
          // Aquí dejo solo inicial como círculo si no tienes URL imagen
        ?>
        <article
          class="carousel-item bg-white rounded-lg shadow-md p-6 flex flex-col snap-start min-w-[280px]"
          role="listitem"
          aria-label="Comentario de <?= htmlspecialchars($comentario['nombre']) ?>"
        >
          <div class="flex items-center space-x-4 mb-4">
            <div class="w-14 h-14 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-xl select-none">
              <?= $avatarLetter ?>
            </div>
            <div>
              <h3 class="text-lg font-semibold text-gray-900"><?= htmlspecialchars($comentario['nombre']) ?></h3>
              <?php if ($fecha): ?>
                <p class="text-sm text-gray-500"><?= $fecha ?></p>
              <?php endif; ?>
            </div>
          </div>
          <p class="text-gray-700 leading-relaxed flex-grow"><?= htmlspecialchars($comentario['comentario']) ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
  <script>
   (() => {
    const track = document.getElementById("carouselTrack");
    const items = track.children;
    const totalItems = items.length;
    let index = 0;

    function showSlide(i) {
     const itemWidth =
      items[0].offsetWidth + parseInt(getComputedStyle(items[0]).marginRight || "0");
     track.style.transform = `translateX(-${i * itemWidth}px)`;
    }

    function nextSlide() {
     index++;
     if (index > totalItems - visibleCount()) {
      index = 0;
     }
     showSlide(index);
    }

    function visibleCount() {
     const width = window.innerWidth;
     if (width >= 1024) return 3;
     if (width >= 640) return 2;
     return 1;
    }

    let interval = setInterval(nextSlide, 10000);

    window.addEventListener("resize", () => {
     index = 0;
     showSlide(index);
    });

    showSlide(index);
   })();
  </script>
 </body>
</html>