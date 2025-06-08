<html class="scroll-smooth" lang="es">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title><?= htmlspecialchars($evento['titulo']) ?></title>
   <link rel="icon" href="/PROYECTO-MILITAR/views/assets/img/logo.jpg" type="image/png">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="<?= BASE_URL ?>views/assets/css/efecto.css">
  <style>
   body {
     font-family: 'Inter', sans-serif;
   }
   /* Animación para modal de comentario */
   #modalBackdrop {
     transform: translateX(100%);
     transition: transform 0.3s ease-in-out;
   }
   #modalBackdrop.show {
     transform: translateX(0);
   }
   /* Animación para modal de imagen */
   #imageModalBackdrop {
     background-color: rgba(0,0,0,0.7);
     backdrop-filter: blur(4px);
     opacity: 0;
     pointer-events: none;
     transition: opacity 0.3s ease-in-out;
     display: flex;
     align-items: center;
     justify-content: center;
     padding: 1rem;
   }
   #imageModalBackdrop.show {
     opacity: 1;
     pointer-events: auto;
   }
   #imageModalBackdrop img {
     max-width: 100%;
     max-height: 90vh;
     object-fit: contain;
     border-radius: 0.5rem;
     box-shadow: 0 10px 25px rgba(0,0,0,0.5);
     display: block;
     margin: 0 auto;
   }
   /* Estilo WhatsApp para comentarios horizontales con flechas y mensajes */
   .chat-container {
     max-width: 100%;
     overflow: hidden;
     padding-bottom: 0.5rem;
     position: relative;
   }
   .chat-list {
     display: flex;
     gap: 1rem;
     padding: 0 3rem; /* espacio para flechas */
     justify-content: center;
     flex-wrap: nowrap;
     transition: transform 0.4s ease;
   }
   .chat-message {
     flex: 0 0 auto;
     max-width: 280px;
     min-width: 260px;
     display: flex;
     flex-direction: column;
     position: relative;
     font-size: 0.9rem;
     color: #202c33;
   }
   .chat-message .avatar {
     width: 40px;
     height: 40px;
     border-radius: 50%;
     overflow: hidden;
     margin-bottom: 0.5rem;
     flex-shrink: 0;
   }
   .chat-message .avatar img {
     width: 100%;
     height: 100%;
     object-fit: cover;
   }
   .chat-message .message-header {
     font-weight: 700;
     font-size: 17px;
     color:rgb(15, 15, 15);
     margin-bottom: 0.25rem;
   }
   .chat-message .message-time {
     font-size: 0.75rem;
     color: #999;
     margin-top: 0.25rem;
     align-self: flex-end;
   }
   .chat-message .message-bubble {
     background:rgb(186, 187, 186);
     border-radius: 20px 20px 20px 0;
     padding: 0.75rem 1rem;
     box-shadow: 0 1px 0.5px rgba(0,0,0,0.13);
     white-space: pre-wrap;
     word-break: break-word;
     line-height: 1.3;
   }
   /* Flechas carrusel */
   .carousel-arrow {
     position: absolute;
     top: 50%;
     transform: translateY(-50%);
     background-color: rgba(255, 255, 255, 0.9);
     border-radius: 9999px;
     width: 2.5rem;
     height: 2.5rem;
     display: flex;
     align-items: center;
     justify-content: center;
     color: #4f46e5;
     cursor: pointer;
     box-shadow: 0 2px 6px rgba(0,0,0,0.15);
     transition: background-color 0.2s ease;
     z-index: 10;
   }
   .carousel-arrow:hover {
     background-color: #4f46e5;
     color: white;
   }
   .carousel-arrow:focus {
     outline: 2px solid #4f46e5;
     outline-offset: 2px;
   }
   .carousel-arrow.left {
     left: 0.5rem;
   }
   .carousel-arrow.right {
     right: 0.5rem;
   }
   /* Ajuste iframe mapa para que sea responsive */
   .map-container {
     position: relative;
     width: 100%;
     padding-bottom: 56.25%; /* 16:9 ratio */
     height: 0;
     overflow: hidden;
     border-radius: 0.5rem;
     box-shadow: 0 4px 8px rgba(0,0,0,0.1);
   }
   .map-container iframe {
     position: absolute;
     top: 0;
     left: 0;
     width: 100%;
     height: 100%;
     border: 0;
   }
   /* Video menos alto */
   .video-container {
     position: relative;
     width: 100%;
     padding-bottom: 40%; /* menos alto que 16:9 */
     height: 0;
     overflow: hidden;
     border-radius: 0.5rem;
     box-shadow: 0 4px 8px rgba(0,0,0,0.1);
   }
   .video-container iframe {
     position: absolute;
     top: 0;
     left: 0;
     width: 100%;
     height: 100%;
     border: 0;
   }
  </style>
 </head>
 <body class="bg-gray-50 text-gray-800 relative">
  <div id="preloader">
        <img src="/PROYECTO-MILITAR/views/assets/img/logo.jpg" alt="Cargando..."> <!-- Cambia por la ruta de tu logo -->
    </div>
   <?php
include 'layout/header.php';
?>
  <main class="max-w-5xl mx-auto p-4 sm:p-6 lg:p-8">
   <!-- Título del evento -->
   <header class="mb-8 text-center">
    <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 leading-tight">
     <?php echo htmlspecialchars($evento['titulo']); ?>
    </h1>
    <p class="mt-2 text-lg text-gray-600">
     Un evento de "Cabo Alberto Reyes Gamarra"
    </p>
    <?php
$fechaBD = $evento['fecha']; // ej. '2025-05-11'
$dia = $mes = $anio = '';

// Crear un objeto DateTime a partir del string
$fecha = DateTime::createFromFormat('Y-m-d', $fechaBD);

// Array con los meses en español
$meses = [
    1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
    5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
    9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
];

if ($fecha !== false) {
    $dia = $fecha->format('d');
    $mes = $meses[(int)$fecha->format('m')];
    $anio = $fecha->format('Y');
} else {
    $dia = 'Fecha';
    $mes = 'inválida';
    $anio = '';
}
?>

<time class="inline-block mt-3 px-3 py-1 text-sm font-semibold text-indigo-700 bg-indigo-100 rounded-full" datetime="<?= htmlspecialchars($fechaBD) ?>">
    <?= htmlspecialchars($dia) ?> de <?= htmlspecialchars($mes) ?><?= $anio ? ", " . htmlspecialchars($anio) : "" ?>
</time>
   </header>
   <!-- Descripción -->
   <section class="mb-12">
    <h2 class="text-2xl font-semibold mb-4 text-gray-900">
     Descripción
    </h2>
    <p class="text-gray-700 leading-relaxed text-justify sm:text-lg">
     <?php
$descripcion = htmlspecialchars($evento['descripcion']);

// Divide solo en puntos que están al final de una oración (punto seguido de espacio o salto de línea)
$oraciones = preg_split('/(?<=\.)\s+/', $descripcion);

foreach ($oraciones as $oracion) {
    if (trim($oracion) !== '') {
        echo '<p>' . $oracion . '</p>';
    }
}
?>
    </p>
   </section>
   <!-- Fecha y Mapa -->
   <section class="mb-12 grid grid-cols-1 md:grid-cols-2 gap-8">
    <div>
     <h2 class="text-2xl font-semibold mb-4 text-gray-900">
      Fecha y Hora
     </h2>
     <div class="flex items-center space-x-3 text-indigo-700">
      <i class="fas fa-calendar-alt fa-lg"></i>
      <time class="text-lg font-medium" datetime="2024-09-15T18:00">
       <?= htmlspecialchars(date('d/m/Y', strtotime($evento['fecha']))) ?>
      </time>
     </div>
    </div>
    <div>
     <h2 class="text-2xl font-semibold mb-4 text-gray-900">
      Ubicación
     </h2>
     <div class="map-container">
      <iframe
  class="mapa-ubicacion"
  src="https://maps.google.com/maps?q=<?php echo $evento['latitud']; ?>,<?php echo $evento['longitud']; ?>&z=16&output=embed"
  allowfullscreen
></iframe>     </div>
    </div>
   </section>
   <!-- Fotos -->
   <section class="mb-12">
    <h2 class="text-2xl font-semibold mb-6 text-gray-900">
     Galería de Fotos
    </h2>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
     <?php if (!empty($imagenes)): ?>
  <?php foreach ($imagenes as $img): ?>
    <img 
      src="/PROYECTO-MILITAR/uploads/evento/<?= htmlspecialchars($img['nombre_imagen']) ?>" 
      alt="Imagen del evento <?= htmlspecialchars($evento['titulo']) ?>" 
      class="rounded-lg shadow-md object-cover w-full h-48 cursor-pointer" 
      loading="lazy" 
      width="400" 
      height="300"
    />
  <?php endforeach; ?>
<?php else: ?>
  <p>No hay imágenes para este evento.</p>
<?php endif; ?>
    </div>
   </section>
   <!-- Video -->
   <section class="mb-12">
    <h2 class="text-2xl font-semibold mb-6 text-gray-900">
     Video Destacado
    </h2>
    <div class="video-container">
     <?php if (!empty($videos)): ?>
    <?php foreach ($videos as $video): ?>
      <iframe 
        class="video-iframe" 
        src="https://www.youtube.com/embed/<?= htmlspecialchars($video['codigo_video']) ?>" 
        title="Video del evento" 
        allowfullscreen>
      </iframe>
      <?php break; // solo mostrar el primero ?>
    <?php endforeach; ?>
  <?php else: ?>
    <p>No hay video disponible para este evento.</p>
  <?php endif; ?>
    </div>
   </section>
   <!-- Comentarios estilo WhatsApp horizontal con flechas y burbujas -->
   <section class="mb-12">
    <h2 class="text-2xl font-semibold mb-6 text-gray-900">
     Comentarios
    </h2>
    <div class="chat-container" id="commentsCarousel" aria-live="polite" aria-atomic="true" aria-relevant="additions" tabindex="0">
     <button aria-label="Anterior comentario" class="carousel-arrow left" id="prevBtn" type="button">
      <i class="fas fa-chevron-left"></i>
     </button>
     <div class="chat-list" id="chatList" role="list">
      <!-- Mensajes se insertan aquí -->
     </div>
     <button aria-label="Siguiente comentario" class="carousel-arrow right" id="nextBtn" type="button">
      <i class="fas fa-chevron-right"></i>
     </button>
    </div>
   </section>
  </main>
  <!-- Botón fijo para abrir modal -->
  <button aria-label="Abrir formulario para agregar comentario" class="fixed right-6 bottom-6 z-50 flex items-center space-x-2 rounded-full bg-indigo-600 px-5 py-3 text-white font-semibold shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500" id="openModalBtn" type="button">
   <i class="fas fa-comment-alt fa-lg"></i>
   <span class="hidden sm:inline">Nuevo comentario</span>
  </button>
  <!-- Modal en esquina inferior derecha con efecto slide -->
  <div aria-hidden="true" class="fixed bottom-20 right-6 z-50 hidden max-w-md w-full rounded-lg bg-white shadow-lg border border-gray-200" id="modalBackdrop" role="dialog" aria-modal="true" aria-labelledby="modalTitle" tabindex="-1">
  <div class="p-6 relative">
    <button aria-label="Cerrar modal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 focus:outline-none" id="closeModalBtn" type="button">
      <i class="fas fa-times fa-lg"></i>
    </button>
    <h3 class="text-xl font-semibold mb-4 text-gray-900" id="modalTitle">Agregar Comentario</h3>

    <!-- FORMULARIO FUNCIONAL -->
    <form id="commentForm" class="space-y-4" method="POST" action="index.php?action=eventos/agregarComentario" novalidate>
      
      <!-- Campo oculto con el ID del evento -->
      <input type="hidden" name="evento_id" value="<?= htmlspecialchars($evento['id']) ?>">

      <div>
        <label class="block mb-1 font-medium text-gray-700" for="nameInput">Nombre</label>
        <input
          class="w-full rounded-md border border-gray-300 p-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500"
          id="nameInput"
          name="name"
          type="text"
          placeholder="Tu nombre"
          required
        />
      </div>

      <div>
        <label class="block mb-1 font-medium text-gray-700" for="commentInput">Comentario</label>
        <textarea
          class="w-full rounded-md border border-gray-300 p-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-none"
          id="commentInput"
          name="comment"
          rows="4"
          placeholder="Escribe tu comentario..."
          required
        ></textarea>
      </div>

      <div class="flex justify-end space-x-3">
        <button
          class="rounded-md bg-gray-300 px-5 py-2 font-semibold text-gray-700 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400"
          id="cancelBtn"
          type="button"
        >
          Cancelar
        </button>
        <button
          class="rounded-md bg-indigo-600 px-5 py-2 font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
          type="submit"
        >
          Enviar
        </button>
      </div>
    </form>
  </div>
</div>
  <!-- Modal para imagen -->
  <div aria-hidden="true" class="fixed inset-0 z-50 hidden" id="imageModalBackdrop" role="dialog" aria-modal="true" tabindex="-1">
   <div class="flex items-center justify-center min-h-screen p-4">
    <div class="relative max-w-4xl max-h-[90vh] w-full rounded-lg overflow-hidden shadow-lg bg-black">
     <button aria-label="Cerrar modal de imagen" class="absolute top-3 right-3 z-50 text-white hover:text-gray-300 focus:outline-none" id="closeImageModalBtn" type="button">
      <i class="fas fa-times fa-lg"></i>
     </button>
     <img alt="" class="w-full h-auto max-h-[90vh] object-contain bg-black" id="modalImage" src=""/>
    </div>
   </div>
  </div>
  <script>
   (() => {
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const cancelBtn = document.getElementById('cancelBtn');
    const modalBackdrop = document.getElementById('modalBackdrop');
    const commentForm = document.getElementById('commentForm');
    const chatList = document.getElementById('chatList');
    const nameInput = document.getElementById('nameInput');
    const commentInput = document.getElementById('commentInput');

    const imageModalBackdrop = document.getElementById('imageModalBackdrop');
    const modalImage = document.getElementById('modalImage');
    const closeImageModalBtn = document.getElementById('closeImageModalBtn');

    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    // Comentarios iniciales (5 para rotar)
   const initialComments = <?php
    $comentariosJS = [];

    if (!empty($comentarios)) {
        foreach ($comentarios as $comentario) {
            $comentariosJS[] = [
                'name' => $comentario['nombre_usuario'],
                'date' => date('Y-m-d\TH:i', strtotime($comentario['fecha_comentario'])),
                'text' => $comentario['comentario'],
                'avatar' => !empty($comentario['avatar']) 
                    ? $comentario['avatar'] 
                    : 'https://ui-avatars.com/api/?name=' . urlencode($comentario['nombre_usuario']) . '&background=random&size=48'
            ];
        }
    }

    echo json_encode($comentariosJS, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
  ?>;
    // Estado para carrusel
    let currentStartIndex = 0;
    const visibleCount = 3;

    // Renderizar comentarios estilo WhatsApp horizontal con burbujas
    function renderComments() {
      chatList.innerHTML = '';
      for (let i = 0; i < visibleCount; i++) {
        const idx = (currentStartIndex + i) % initialComments.length;
        const c = initialComments[idx];
        const dateObj = new Date(c.date);
        const dateString = dateObj.toLocaleDateString('es-ES', { year: 'numeric', month: 'long', day: 'numeric' });
        const timeString = dateObj.toLocaleTimeString('es-ES', { hour: '2-digit', minute: '2-digit' });

        const messageDiv = document.createElement('article');
        messageDiv.className = 'chat-message';
        messageDiv.setAttribute('role', 'group');
        messageDiv.setAttribute('aria-label', `Comentario de ${c.name} el ${dateString} a las ${timeString}`);

        const avatarDiv = document.createElement('div');
        avatarDiv.className = 'avatar';
        const avatarImg = document.createElement('img');
        avatarImg.src = c.avatar;
        avatarImg.alt = `Avatar circular de ${c.name}`;
        avatarDiv.appendChild(avatarImg);

        const headerDiv = document.createElement('div');
        headerDiv.className = 'message-header';
        headerDiv.textContent = c.name;

        const bubbleDiv = document.createElement('div');
        bubbleDiv.className = 'message-bubble';
        bubbleDiv.textContent = c.text;

        const timeSpan = document.createElement('span');
        timeSpan.className = 'message-time';
        timeSpan.textContent = `${dateString} ${timeString}`;

        messageDiv.appendChild(avatarDiv);
        messageDiv.appendChild(headerDiv);
        messageDiv.appendChild(bubbleDiv);
        messageDiv.appendChild(timeSpan);

        chatList.appendChild(messageDiv);
      }
    }

    // Funciones para cambiar comentarios
    function showPrev() {
      currentStartIndex = (currentStartIndex - 1 + initialComments.length) % initialComments.length;
      renderComments();
    }
    function showNext() {
      currentStartIndex = (currentStartIndex + 1) % initialComments.length;
      renderComments();
    }

    prevBtn.addEventListener('click', () => {
      showPrev();
      resetAutoSlide();
    });
    nextBtn.addEventListener('click', () => {
      showNext();
      resetAutoSlide();
    });

    // Auto slide cada 5 segundos
    let autoSlideInterval = setInterval(showNext, 10000);
    function resetAutoSlide() {
      clearInterval(autoSlideInterval);
      autoSlideInterval = setInterval(showNext, 10000);
    }

    // Inicializar carrusel
    renderComments();

    // Funciones modal comentario
    function openCommentModal() {
      modalBackdrop.classList.remove('hidden');
      void modalBackdrop.offsetWidth;
      modalBackdrop.classList.add('show');
      nameInput.focus();
      document.body.style.overflow = 'hidden';
    }

    function closeCommentModal() {
      modalBackdrop.classList.remove('show');
      modalBackdrop.addEventListener('transitionend', () => {
        if (!modalBackdrop.classList.contains('show')) {
          modalBackdrop.classList.add('hidden');
          commentForm.reset();
          document.body.style.overflow = '';
        }
      }, { once: true });
    }

    openModalBtn.addEventListener('click', openCommentModal);
    closeModalBtn.addEventListener('click', closeCommentModal);
    cancelBtn.addEventListener('click', closeCommentModal);

    modalBackdrop.addEventListener('click', (e) => {
      if (e.target === modalBackdrop) {
        closeCommentModal();
      }
    });


    // Accessibility: close modals on Escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        if (!modalBackdrop.classList.contains('hidden')) {
          closeCommentModal();
        }
        if (imageModalBackdrop.classList.contains('show')) {
          closeImageModal();
        }
      }
    });

    // Imagen modal logic
    function openImageModal(src, alt) {
      modalImage.src = src;
      modalImage.alt = alt;
      imageModalBackdrop.classList.add('show');
      imageModalBackdrop.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    }

    function closeImageModal() {
      imageModalBackdrop.classList.remove('show');
      imageModalBackdrop.addEventListener('transitionend', () => {
        if (!imageModalBackdrop.classList.contains('show')) {
          imageModalBackdrop.classList.add('hidden');
          modalImage.src = '';
          modalImage.alt = '';
          document.body.style.overflow = '';
        }
      }, { once: true });
    }

    closeImageModalBtn.addEventListener('click', closeImageModal);

    imageModalBackdrop.addEventListener('click', (e) => {
      if (e.target === imageModalBackdrop) {
        closeImageModal();
      }
    });

    // Añadir evento click a todas las imágenes de la galería
    const galleryImages = document.querySelectorAll('section.mb-12 div.grid img.cursor-pointer');
    galleryImages.forEach(img => {
      img.addEventListener('click', () => {
        openImageModal(img.src, img.alt);
      });
    });
   })();
  </script>
  <script>
document.getElementById('comment-form').addEventListener('submit', async function (e) {
  e.preventDefault(); // Evita que el formulario se envíe de forma tradicional

  const form = e.target;
  const formData = new FormData(form);

  const response = await fetch(form.action, {
    method: 'POST',
    body: formData
  });

  if (response.ok) {
    const text = await response.text(); // Puedes devolver un JSON si prefieres

    // Opcional: Actualizar comentarios sin recargar o mostrar mensaje
    alert('Comentario enviado con éxito');

    // Limpia el formulario
    form.reset();

    // Recarga solo la sección de comentarios (más avanzado), o simplemente refresca toda la página
    // location.reload(); // Descomenta si quieres que se recargue después de enviar
  } else {
    alert('Hubo un error al enviar el comentario');
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
 </body>
 <?php
    include 'layout/footer.php';
    ?>
</html>