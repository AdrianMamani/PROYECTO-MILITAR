<html class="scroll-smooth" lang="es">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Logros de la Promoción
  </title>
  <link rel="icon" href="/PROYECTO-MILITAR/views/assets/img/logo.jpg" type="image/png">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&amp;display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="<?= BASE_URL ?>views/assets/css/efecto.css">
  <style>
   body {
      font-family: "Montserrat", sans-serif;
    }
    #modalImage {
  max-width: 80vw;
  max-height: 80vh;
  width: auto;
  height: auto;
  object-fit: contain;
  border-radius: 0.5rem; /* rounded-lg */
  box-shadow: 0 10px 15px rgba(0, 0, 0, 0.3); /* shadow-lg */
}
  </style>
 </head>
 <?php
    include 'layout/header.php';
    ?>
 <body class="bg-gray-100 text-gray-900">
  <div id="preloader">
        <img src="/PROYECTO-MILITAR/views/assets/img/logo.jpg" alt="Cargando..."> <!-- Cambia por la ruta de tu logo -->
    </div>
  <section class="max-w-6xl mx-auto px-6 py-20 sm:py-24 flex flex-col items-center" id="logros">
   <h2 class="text-4xl font-extrabold text-center text-gray-900 mb-16 tracking-tight">
    Logros de Nuestra Promoción
   </h2>
   <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 w-full">

    <?php foreach ($logros as $logro): ?>
    <article aria-label="<?= htmlspecialchars($logro['titulo']) ?>" tabindex="0" 
             class="bg-white rounded-2xl shadow-lg max-w-md mx-auto hover:shadow-2xl transition-shadow duration-300 flex flex-col">

     <header class="flex items-center px-6 pt-6 pb-4 border-b border-gray-200">
      <?php 
         // Mostrar primera imagen del logro como avatar pequeño, o placeholder si no hay
         $avatarImg = !empty($imagenesPorLogro[$logro['id']]) 
                      ? BASE_URL . 'uploads/logros/' . htmlspecialchars($imagenesPorLogro[$logro['id']][0]['nombre_imagen']) 
                      : 'https://placehold.co/64x64?text=No+Img';
      ?>
      <img alt="Imagen de <?= htmlspecialchars($logro['titulo']) ?>" 
           class="w-16 h-16 rounded-full object-cover mr-4 shadow-sm" loading="lazy" 
           src="<?= $avatarImg ?>" width="64" height="64"/>
      <div>
       <h3 class="text-xl font-semibold text-gray-900 leading-tight">
        <?= htmlspecialchars($logro['titulo']) ?>
       </h3>
       <p class="text-sm text-gray-500 mt-1">
        <time datetime="<?= htmlspecialchars($logro['fecha']) ?>"><?= date('d \d\e F, Y', strtotime($logro['fecha'])) ?></time>
       </p>
      </div>
     </header>

     <p class="px-6 text-gray-700 mt-4 mb-6 max-w-[90%] mx-auto text-justify">
      <?= htmlspecialchars($logro['descripcion']) ?>
     </p>

     <?php if (!empty($imagenesPorLogro[$logro['id']])): ?>
     <div class="grid grid-cols-2 gap-3 px-6 mb-6">
      <?php foreach ($imagenesPorLogro[$logro['id']] as $imagen): ?>
       <img alt="Foto de <?= htmlspecialchars($logro['titulo']) ?>" 
            class="rounded-lg object-cover w-full h-36 shadow-sm cursor-pointer" loading="lazy" 
            src="<?= BASE_URL . 'uploads/logros/' . htmlspecialchars($imagen['nombre_imagen']) ?>" 
            width="400" height="300" 
            data-full="<?= BASE_URL . 'uploads/logros/' . htmlspecialchars($imagen['nombre_imagen']) ?>"/>
      <?php endforeach; ?>
     </div>
     <?php else: ?>
     <p class="px-6 text-gray-500 italic">No hay imágenes para este logro.</p>
     <?php endif; ?>

     <?php if (!empty($videosPorLogro[$logro['id']])): ?>
     <div class="px-6 mb-6">
      <?php foreach ($videosPorLogro[$logro['id']] as $video): ?>
       <div class="relative w-full aspect-w-16 aspect-h-9 rounded-lg overflow-hidden shadow-inner mb-4">
        <iframe class="w-full h-full" 
                src="https://www.youtube.com/embed/<?= htmlspecialchars($video['codigo_video']) ?>" 
                frameborder="0" allowfullscreen></iframe>
       </div>
      <?php endforeach; ?>
     </div>
     <?php else: ?>
     <p class="px-6 text-gray-500 italic">No hay videos para este logro.</p>
     <?php endif; ?>

    </article>
    <?php endforeach; ?>

   </div>
</section>

  <!-- Modal -->
  <div id="modal" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center p-4 opacity-0 pointer-events-none transition-opacity duration-300 z-50">
   <button id="modalClose" aria-label="Cerrar modal" class="absolute top-6 right-6 text-white text-3xl hover:text-gray-300 focus:outline-none">
    <i class="fas fa-times"></i>
   </button>
   <img id="modalImage" alt="Imagen ampliada" class="max-w-full max-h-full rounded-lg shadow-lg"/>
  </div>

  <script>
   const modal = document.getElementById('modal');
   const modalImage = document.getElementById('modalImage');
   const modalClose = document.getElementById('modalClose');
   const images = document.querySelectorAll('img.cursor-pointer');

   images.forEach(img => {
     img.addEventListener('click', () => {
       modalImage.src = img.dataset.full || img.src;
       modalImage.alt = img.alt;
       modal.classList.remove('opacity-0', 'pointer-events-none');
     });
   });

   modalClose.addEventListener('click', () => {
     modal.classList.add('opacity-0', 'pointer-events-none');
     modalImage.src = '';
     modalImage.alt = 'Imagen ampliada';
   });

   modal.addEventListener('click', (e) => {
     if (e.target === modal) {
       modal.classList.add('opacity-0', 'pointer-events-none');
       modalImage.src = '';
       modalImage.alt = 'Imagen ampliada';
     }
   });

   // Accessibility: close modal with Escape key
   document.addEventListener('keydown', (e) => {
     if (e.key === 'Escape' && !modal.classList.contains('opacity-0')) {
       modal.classList.add('opacity-0', 'pointer-events-none');
       modalImage.src = '';
       modalImage.alt = 'Imagen ampliada';
     }
   });
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
  <?php
    include 'layout/footer.php';
    ?>
 </body>
</html>