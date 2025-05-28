<html lang="en">
 <head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>Galeria</title>
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  <link rel="stylesheet" href="../assets/css/galeria.css">
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
  <?php
include '../layout/header.php';
?>
 <body class="bg-white m-0 p-0 min-h-screen ">
    <!-- Banner Galeria Section -->
    <section class="banner-container">
        <img src="../assets/img/pruebas/prueba01.jpeg" alt="Banner sobre Galeria" class="banner-image">
        <div class="banner-overlay">
            <div class="banner-content banner-text-offset">
                <h1>Galeria</h1>
                <p>Inicio -> Galeria</p>
            </div>
        </div>
    </section>

<!-- Sección de Nuestros Logros y Galería -->
<section id="logros-section">
    <!-- Botón de Nuestros Logros -->
    <div class="button-container">
        <button id="logrosBtn">
            <i class="fas fa-trophy"></i>
            <span>Nuestros Logros</span>
        </button>
    </div>

    <!-- Galería de imágenes -->
    <div class="gallery-grid">
        <!-- Ejemplo de elementos de galería -->
        <div class="gallery-item" data-type="image" data-src="../assets/img/pruebas/prueba01.jpeg" data-caption="Logro 1 - Descripción breve">
            <img src="../assets/img/pruebas/prueba01.jpeg" alt="Imagen galería">
            <div class="gallery-overlay">
                <i class="fas fa-expand"></i>
            </div>
        </div>

                <div class="gallery-item" data-type="image" data-src="../assets/img/pruebas/prueba01.jpeg" data-caption="Logro 1 - Descripción breve">
            <img src="../assets/img/pruebas/prueba01.jpeg" alt="Imagen galería">
            <div class="gallery-overlay">
                <i class="fas fa-expand"></i>
            </div>
        </div>

        <div class="gallery-item" data-type="image" data-src="../assets/img/pruebas/prueba01.jpeg" data-caption="Logro 1 - Descripción breve">
            <img src="../assets/img/pruebas/prueba01.jpeg" alt="Imagen galería">
            <div class="gallery-overlay">
                <i class="fas fa-expand"></i>
            </div>
        </div>

        <div class="gallery-item" data-type="image" data-src="../assets/img/pruebas/prueba01.jpeg" data-caption="Logro 1 - Descripción breve">
            <img src="../assets/img/pruebas/prueba01.jpeg" alt="Imagen galería">
            <div class="gallery-overlay">
                <i class="fas fa-expand"></i>
            </div>
        </div>

        <div class="gallery-item" data-type="image" data-src="../assets/img/pruebas/prueba01.jpeg" data-caption="Logro 1 - Descripción breve">
            <img src="../assets/img/pruebas/prueba01.jpeg" alt="Imagen galería">
            <div class="gallery-overlay">
                <i class="fas fa-expand"></i>
            </div>
        </div>

        <div class="gallery-item" data-type="image" data-src="../assets/img/pruebas/prueba01.jpeg" data-caption="Logro 1 - Descripción breve">
            <img src="../assets/img/pruebas/prueba01.jpeg" alt="Imagen galería">
            <div class="gallery-overlay">
                <i class="fas fa-expand"></i>
            </div>
        </div>

        <div class="gallery-item" data-type="video" data-src="../assets/img/pruebas/video-prueba.mp4" data-caption="Logro 2 - Descripción breve">
            <video src="../assets/img/pruebas/video-prueba.mp4" muted preload="metadata"></video>
            <div class="gallery-overlay">
                <i class="fas fa-play-circle"></i>
            </div>
        </div>

        <div class="gallery-item" data-type="video" data-src="../assets/img/pruebas/video-prueba.mp4" data-caption="Logro 2 - Descripción breve">
            <video src="../assets/img/pruebas/video-prueba.mp4" muted preload="metadata"></video>
            <div class="gallery-overlay">
                <i class="fas fa-play-circle"></i>
            </div>
        </div>

        <div class="gallery-item" data-type="video" data-src="../assets/img/pruebas/video-prueba.mp4" data-caption="Logro 2 - Descripción breve">
            <video src="../assets/img/pruebas/video-prueba.mp4" muted preload="metadata"></video>
            <div class="gallery-overlay">
                <i class="fas fa-play-circle"></i>
            </div>
        </div>

    </div>
</section>

<!-- Modal de Nuestros Logros (estilo Instagram) -->
<div id="logrosModal">
    <div class="modal-container">
        <!-- Fondo oscuro -->
        <div class="modal-backdrop"></div>

        <!-- Contenido del modal -->
        <div class="modal-content-ig">
            <div class="modal-flex">
                <!-- Sección de imágenes/videos (izquierda) -->
                <div class="media-section">
                    <div id="modalMediaContainer">
                        
                    </div>
                </div>

                <!-- Sección de información (derecha) -->
                <div class="info-section">
                    <!-- Cabecera con logo, nombre y verificado -->
                    <div class="modal-header">
                        <img src="https://storage.googleapis.com/a1aa/image/039aab5e-f041-49a8-d02e-7883e6fc4575.jpg" alt="Logo promoción" class="modal-logo">
                        <div>
                            <div class="verified-container">
                                <h3>CABO ALBERTO REYES GAMARRA</h3>
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <p class="promotion-year">Promoción 2023</p>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div id="modalCaption">
                        <!-- Aquí se cargará la descripción dinámicamente -->
                    </div>

                    <!-- Comentarios estáticos -->
                    <div class="comments-section">
                        <div class="comment">
                            <img src="https://storage.googleapis.com/a1aa/image/5c914e35-a818-4ee7-f251-27f38c769f64.jpg" alt="Usuario" class="comment-avatar">
                            <div>
                                <p class="comment-author">Usuario1</p>
                                <p>¡Felicitaciones por este gran logro!</p>
                            </div>
                        </div>
                        <div class="comment">
                            <img src="https://storage.googleapis.com/a1aa/image/5c914e35-a818-4ee7-f251-27f38c769f64.jpg" alt="Usuario" class="comment-avatar">
                            <div>
                                <p class="comment-author">Usuario2</p>
                                <p>Todo el esfuerzo valió la pena. ¡Éxitos!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botón de cerrar -->
            <div class="close-button-container">
                <button id="closeModal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </div>
</div>

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
<script>
document.addEventListener('DOMContentLoaded', () => {
    const logro = {
        type: 'image',
        src: '../assets/img/pruebas/prueba01.jpeg',
        caption: 'Logro 1 - Descripción breve del primer logro',
        comments: [
            {
                avatar: 'https://storage.googleapis.com/a1aa/image/5c914e35-a818-4ee7-f251-27f38c769f64.jpg',
                author: 'Usuario1',
                text: '¡Felicitaciones por este gran logro!'
            },
            {
                avatar: 'https://storage.googleapis.com/a1aa/image/5c914e35-a818-4ee7-f251-27f38c769f64.jpg',
                author: 'Usuario2',
                text: 'Todo el esfuerzo valió la pena. ¡Éxitos!'
            }
        ]
    };

    const logrosBtn = document.getElementById('logrosBtn');
    const logrosModal = document.getElementById('logrosModal');
    const modalMediaContainer = document.getElementById('modalMediaContainer');
    const modalCaption = document.getElementById('modalCaption'); // <== NUEVO
    const closeModal = document.getElementById('closeModal');

    function mostrarLogro() {
        modalMediaContainer.innerHTML = '';
        modalCaption.textContent = ''; // Limpiamos descripción previa

        const mediaContainer = document.createElement('div');
        mediaContainer.className = 'media-block';
        mediaContainer.style.textAlign = 'center';

        if (logro.type === 'image') {
            const img = document.createElement('img');
            img.src = logro.src;
            img.alt = 'Logro';
            img.style.cssText = 'max-width: 100%; max-height: 70vh; object-fit: contain;';
            mediaContainer.appendChild(img);
        } else if (logro.type === 'video') {
            const video = document.createElement('video');
            video.controls = true;
            video.style.cssText = 'max-width: 100%; max-height: 70vh;';
            const source = document.createElement('source');
            source.src = logro.src;
            source.type = 'video/mp4';
            video.appendChild(source);
            mediaContainer.appendChild(video);
        }

        // 🔁 Ya no se crea un <p> debajo del bloque
        // caption.textContent = logro.caption;
        // caption.style.marginTop = '1rem';
        // mediaContainer.appendChild(caption);

        modalMediaContainer.appendChild(mediaContainer);

        // Mostramos descripción en otro lugar
        modalCaption.textContent = logro.caption;
    }

    // Abrir modal
    logrosBtn.addEventListener('click', () => {
        mostrarLogro();
        logrosModal.style.display = 'block';
        document.body.style.overflow = 'hidden';
    });

    // Cerrar modal
    closeModal.addEventListener('click', () => {
        logrosModal.style.display = 'none';
        document.body.style.overflow = 'auto';
        document.querySelectorAll('video').forEach(video => video.pause());
    });

    logrosModal.addEventListener('click', e => {
        if (e.target === logrosModal) {
            logrosModal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    });

    const simpleModal = document.createElement('div');
    simpleModal.id = 'simpleModal';
    simpleModal.style.cssText = `
        position: fixed; top: 0; left: 0;
        width: 100%; height: 100%;
        background-color: rgba(0,0,0,0.9);
        z-index: 1000; display: none;
        justify-content: center; align-items: center;
    `;

    const simpleModalContent = document.createElement('div');
    simpleModalContent.style.cssText = 'position: relative; max-width: 90%; max-height: 90%;';

    const closeSimpleModal = document.createElement('button');
    closeSimpleModal.innerHTML = '<i class="fas fa-times"></i>';
    closeSimpleModal.style.cssText = `
        position: absolute; top: -40px; right: 0;
        background: none; border: none;
        color: white; font-size: 1.5rem; cursor: pointer;
    `;

    simpleModalContent.appendChild(closeSimpleModal);
    simpleModal.appendChild(simpleModalContent);
    document.body.appendChild(simpleModal);

    closeSimpleModal.addEventListener('click', () => {
        simpleModal.style.display = 'none';
        document.body.style.overflow = 'auto';
    });

    document.querySelectorAll('.gallery-item').forEach(item => {
        item.addEventListener('click', function () {
            const type = this.getAttribute('data-type');
            const src = this.getAttribute('data-src');

            simpleModalContent.innerHTML = '';
            simpleModalContent.appendChild(closeSimpleModal);

            if (type === 'image') {
                const img = document.createElement('img');
                img.src = src;
                img.style.cssText = 'max-width: 100%; max-height: 90vh; object-fit: contain;';
                simpleModalContent.insertBefore(img, closeSimpleModal);
            } else if (type === 'video') {
                const video = document.createElement('video');
                video.controls = true;
                video.autoplay = true;
                video.style.cssText = 'max-width: 100%; max-height: 90vh;';
                const source = document.createElement('source');
                source.src = src;
                source.type = 'video/mp4';
                video.appendChild(source);
                simpleModalContent.insertBefore(video, closeSimpleModal);
            }

            simpleModal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        });
    });
});
</script>

</body>
<?php include '../layout/footer.php'?>
</html>