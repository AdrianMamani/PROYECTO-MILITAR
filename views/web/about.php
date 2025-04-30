<html lang="en">
 <head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>About</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="../assets/css/about.css">
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    rel="stylesheet"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap"
    rel="stylesheet"
  />
  <style>
    body {
      font-family: "Montserrat", sans-serif;
    }
  </style>
 </head>
 <body class="bg-white m-0 p-0 min-h-screen ">
  <!-- Header -->
  <header class="fixed top-0 left-0 right-0 bg-white z-50 shadow-sm flex items-center justify-between px-4 py-3 max-w-full">
   <!-- Left side: Logo + Text -->
   <div class="flex items-center space-x-2">
    <img
      alt="Logo of Promocion Cabo Alberto Reyes Gamarra with green and red details"
      class="w-[60px] h-[60px] object-contain"
      height="60"
      src="https://storage.googleapis.com/a1aa/image/966ac2e9-1531-4fa1-9e4e-7a86d6a0f4a3.jpg"
      width="60"
    />
    <div class="hidden sm:block text-xs leading-[1.1] font-normal">
     <p class="uppercase font-bold text-[10px]">PROMOCION</p>
     <p class="font-extrabold text-[14px] leading-[1] -tracking-[0.02em]">
      CABO ALBERTO<br />REYES GAMARRA
     </p>
    </div>
    <div class="block sm:hidden text-xs leading-[1.1] font-normal">
     <p class="uppercase font-bold text-[10px]">PROMOCION</p>
     <p class="font-extrabold text-[14px] leading-[1] -tracking-[0.02em]">
      CABO ALBERTO<br />REYES GAMARRA
     </p>
    </div>
   </div>

   <!-- Desktop nav -->
   <nav
     class="hidden sm:flex space-x-8 font-extrabold text-[14px] leading-[1]"
     aria-label="Primary Navigation"
   >
    <a class="hover:underline" href="#">Inicio</a>
    <a class="hover:underline" href="#">Sobre Nosotros</a>
    <a class="hover:underline" href="#">Blog</a>
    <a class="hover:underline" href="#">Miembros</a>
    <a class="hover:underline" href="#">Comunidad</a>
   </nav>

   <!-- Right side: Admin button (desktop) and hamburger (mobile) -->
   <div class="flex items-center space-x-4">
    <button
      class="hidden sm:inline-block bg-red-600 text-white text-[12px] font-extrabold uppercase rounded-full px-4 py-1 whitespace-nowrap"
      type="button"
    >
     Administrador
    </button>
    <button
      id="menu-button"
      aria-label="Open menu"
      class="sm:hidden text-black text-2xl focus:outline-none"
      type="button"
    >
     <i class="fas fa-bars"></i>
    </button>
   </div>
  </header>

    <!-- Banner Nosotros Section -->
    <section class="banner-container">
        <img src="../assets/img/pruebas/prueba01.jpeg" alt="Banner sobre nosotros" class="banner-image">
        <div class="banner-overlay">
            <div class="banner-content banner-text-offset">
                <h1>SOBRE NOSOTROS</h1>
                <p>Inicio -> Nosotros</p>
            </div>
        </div>
    </section>
   <!-- Sobre Nosotros Section -->
    <section class="max-w-5xl mx-auto pt-[0px] sm:pt-[85px] flex flex-col md:flex-row items-center md:items-start gap-8 pb-16">
   <div class="flex flex-col items-center">
    <img alt="Foto de grupo militar en escaleras antiguas, hombres con uniforme militar oscuro posando en escalera de mármol" class="rounded-md w-[400px] h-[280px] object-cover" height="280" id="carouselImage" src="https://storage.googleapis.com/a1aa/image/57042b00-77f3-4313-696f-8ac6ffce892a.jpg" width="400"/>
    <!-- <div class="flex space-x-3 mt-4 cursor-pointer" id="carouselDots">
     <span class="w-4 h-4 rounded-full bg-green-600" data-index="0"></span>
     <span class="w-4 h-4 rounded-full bg-gray-300" data-index="1"></span>
     <span class="w-4 h-4 rounded-full bg-gray-300" data-index="2"></span>
    </div> -->
   </div>
   <div class="max-w-xl">
    <h2 class="font-extrabold text-2xl mb-3">
     Sobre Nosotros
    </h2>
    <p class="text-base leading-relaxed mb-6">
     En 1986, un grupo de jóvenes inició su formación militar con el nombre de Cabo Alberto Reyes Gamarra, destacándose por su disciplina, entrega y espíritu de hermandad. Durante su entrenamiento, enfrentaron desafíos físicos y mentales, fortaleciendo sus habilidades y compromiso con la institución. Su preparación rigurosa los convirtió en soldados ejemplares, listos para cumplir con honor su deber.
    </p>
    <div class="flex items-center gap-6">
     <button class="bg-green-600 text-white font-semibold rounded-full px-6 py-2 hover:bg-green-700 transition" type="button">
      Leer más
     </button>
     <button aria-label="Play video" class="bg-green-600 rounded-full w-12 h-12 flex items-center justify-center hover:bg-green-700 transition" id="openModalBtn" type="button">
      <i class="fas fa-play text-yellow-400 text-lg ml-[2px]">
      </i>
     </button>
    </div>
   </div>

   <!-- Modal -->
   <div aria-hidden="true" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 hidden" id="videoModal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
    <div class="bg-white rounded-lg max-w-3xl w-full mx-4 relative">
     <button aria-label="Cerrar modal" class="absolute top-3 right-3 text-gray-700 hover:text-gray-900 text-2xl font-bold" id="closeModalBtn" type="button">
      &times;
     </button>
     <div class="aspect-w-16 aspect-h-9">
      <iframe allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" class="w-full h-64 md:h-96 rounded-b-lg" frameborder="0" id="youtubeVideo" src="" title="Video YouTube">
      </iframe>
     </div>
    </div>
   </div>
  </section>
     <!-- Mision y Vision Section -->
     <section class="mision-section">
  <div class="container">
    <div class="titulo-banner">MISIÓN</div>
    <div class="mision-content">
      <div class="mision-text">
        <p>
          En 1986, un grupo de jóvenes inició su formación militar con el nombre de Cabo Alberto Reyes Gamarra,
          destacándose por su disciplina, entrega y espíritu de hermandad. Durante su entrenamiento, 
          enfrentaron desafíos físicos y mentales, fortaleciendo sus habilidades y compromiso con la institución.
          Su preparación rigurosa los convirtió en soldados ejemplares, listos para cumplir con honor su deber.
        </p>
      </div>
      <div class="mision-image">
        <img src="../assets/img/pruebas/prueba01.jpeg" alt="Marcha militar">
      </div>
    </div>
    <div class="slider-indicators">
      <span class="dot active"></span>
      <span class="dot"></span>
      <span class="dot gray"></span>
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
    <a class="hover:underline" href="#">Sobre Nosotros</a>
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
  <script src="../assets/js/home.js"></script>
</body>
<?php include '../layout/footer.php'?>
</html>