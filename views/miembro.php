<html lang="es">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title><?= htmlspecialchars($miembros['nombre']) ?></title>

  <link rel="icon" href="/PROYECTO-MILITAR/views/assets/img/logo.jpg" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="<?= BASE_URL ?>views/assets/css/miembros_id.css"/>
  <link rel="stylesheet" href="<?= BASE_URL ?>views/assets/css/efecto.css">
 </head>
 <?php include 'layout/header.php'; ?>
 <body>
  <div id="preloader">
        <img src="/PROYECTO-MILITAR/views/assets/img/logo.jpg" alt="Cargando..."> <!-- Cambia por la ruta de tu logo -->
    </div>
  <div class="header-bar">
   Mi Información
  </div>
  <main>
   <article>
    <div style="position:relative; width:100%;">
         <?php if ($miembros): ?>
     <img 
    alt="Foto de portada panorámica de <?= htmlspecialchars($miembros['nombre']) ?>" 
    class="cover-photo" 
    height="400" 
    loading="lazy" 
    src="<?= $imagenPortada ? BASE_URL . 'uploads/usuarios/imagenes/' . htmlspecialchars($imagenPortada['nombre_imagen']) : BASE_URL . 'uploads/fondo-perfil.png' ?>" 
    width="1200"
/>
     <div class="profile-pic-wrapper">
      <img class="profile-pic" height="160" loading="lazy" src="<?= BASE_URL ?>uploads/usuarios/<?= htmlspecialchars($miembros['imagen_usuario']) ?>" width="160" alt="Foto de <?= htmlspecialchars($miembros['nombre']) ?>">
     </div>
    </div>
    <div class="content">
     <div class="content-inner">
      <h1>
       <?= htmlspecialchars($miembros['nombre']) ?>
      </h1>
      <p class="subtitle">
       <?= htmlspecialchars($miembros['especialidad_nombre']) ?>
      </p>
      <?php if (!empty($miembros['motivo_fallecimiento'])): ?>
<div class="info-row">
    <div class="info-item">
        <i class="fas fa-ribbon text-black" aria-hidden="true"></i>
        <span>Motivo de fallecimiento: <?= htmlspecialchars($miembros['motivo_fallecimiento']) ?></span>
    </div>
    <?php if (!empty($miembros['fecha_fallecimiento'])): ?>
    <div class="info-item">
        <i class="fas fa-calendar-times" aria-hidden="true"></i>
        <span>Fecha: <?= htmlspecialchars($miembros['fecha_fallecimiento']) ?></span>
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>
      <section class="prose">
       <h2>
        Sobre <?= htmlspecialchars($miembros['nombre']) ?>
       </h2>
       <p>
       <?= htmlspecialchars($miembros['descripcion']) ?>
       </p>
      </section>
      <section>
       <h2>
        Galería de Fotos
       </h2>
       <div class="gallery" aria-label="Galería de fotos de <?= htmlspecialchars($miembro['nombre']) ?>">
    <?php if (!empty($imagenes) && count($imagenes) > 1): ?>
        <?php foreach (array_slice($imagenes, 1) as $img): ?>
            <div class="gallery-item" 
                 data-type="image" 
                 data-src="<?= BASE_URL ?>uploads/usuarios/imagenes/<?= htmlspecialchars($img['nombre_imagen']) ?>">
                <img 
                    alt="<?= htmlspecialchars($miembro['nombre']) ?> - Imagen <?= $img['id'] ?>" 
                    src="<?= BASE_URL ?>uploads/usuarios/imagenes/<?= htmlspecialchars($img['nombre_imagen']) ?>" 
                />
                <div class="gallery-overlay">
                    <i class="fas fa-expand"></i>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay imágenes adicionales para mostrar.</p>
    <?php endif; ?>
</div>

      </section>
      <section>
       <h2>
        Video Destacado
       </h2>
       <?php if (!empty($videos)): ?>
  <section aria-label="Galería de videos de <?= htmlspecialchars($miembros['nombre']) ?>">
    <?php foreach ($videos as $video): ?>
      <div class="video-wrapper">
        <iframe
          src="https://www.youtube.com/embed/<?= htmlspecialchars($video['codigo_video']) ?>"
          title="Video de <?= htmlspecialchars($miembros['nombre']) ?>"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen>
        </iframe>
      </div>
    <?php endforeach; ?>
  </section>
<?php else: ?>
  <p>No hay videos disponibles para este miembro.</p>
<?php endif; ?>

      </section>
     </div>
     <?php else: ?>
        <p>Miembro no encontrado.</p>
    <?php endif; ?>
    </div>
   </article>
  </main>
  <button id="comments-button" aria-label="Abrir comentarios">
   <i class="fas fa-comments"></i> Comentarios
  </button>
  <button id="new-comment-button" aria-label="Nuevo comentario" title="Nuevo comentario" style="position: fixed; bottom: 6.5rem; right: 2rem; background-color: #10b981; color: white; border: none; border-radius: 9999px; padding: 0.75rem 1.25rem; font-weight: 600; font-size: 1rem; cursor: pointer; box-shadow: 0 4px 6px rgba(16,185,129,0.5); display: flex; align-items: center; gap: 0.5rem; z-index: 51; transition: background-color 0.3s ease;">
   <i class="fas fa-comment-alt"></i> Mensaje
  </button>
  <aside id="comments-modal" role="dialog" aria-modal="true" aria-labelledby="comments-title" tabindex="-1">
   <header>
    <span id="comments-title">Comentarios</span>
    <button aria-label="Cerrar comentarios" id="close-comments-btn">&times;</button>
   </header>
   <div id="comments-content" tabindex="0">
    <?php if (!empty($comentarios)): ?>
        <?php foreach ($comentarios as $comentario): ?>
            <p><strong><?= htmlspecialchars($comentario['nombre_usuario']) ?>:</strong> <?= nl2br(htmlspecialchars($comentario['comentario'])) ?></p>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay comentarios aún. ¡Sé el primero en comentar!</p>
    <?php endif; ?>
</div>
  </aside>
  <div id="modal-overlay" tabindex="-1"></div>
  <aside id="new-comment-modal" role="dialog" aria-modal="true" aria-labelledby="new-comment-title" tabindex="-1">
   <header>
    <span id="new-comment-title">Nuevo Comentario</span>
    <button aria-label="Cerrar nuevo comentario" id="close-new-comment-btn">&times;</button>
   </header>
   <form id="new-comment-form" action="index.php?action=miembro/agregarComentario" method="POST" novalidate>
    <input type="hidden" name="persona_id" value="<?= htmlspecialchars($miembros['id']) ?>">

    <input aria-label="Nombre" autocomplete="name" id="new-name" name="name" placeholder="Nombre" required type="text" />
    
    <textarea aria-label="Comentario" id="new-comment" name="comment" placeholder="Escribe tu comentario..." required rows="3"></textarea>
    
    <button aria-label="Enviar comentario" type="submit">
        <i class="fas fa-paper-plane"></i> Enviar
    </button>
</form>
  </aside>
  <script>
  // =============================================
    // 1. Modal simple para la galería de imágenes
    // =============================================
    // Crear el modal
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
    item.addEventListener('click', function () {
      const type = this.getAttribute('data-type');
      const src = this.getAttribute('data-src');
      showGalleryModal(type, src);
    });
  });
   const commentsButton = document.getElementById('comments-button');
   const commentsModal = document.getElementById('comments-modal');
   const closeCommentsBtn = document.getElementById('close-comments-btn');
   const commentsContent = document.getElementById('comments-content');

   const newCommentButton = document.getElementById('new-comment-button');
   const newCommentModal = document.getElementById('new-comment-modal');
   const closeNewCommentBtn = document.getElementById('close-new-comment-btn');
   const newCommentForm = document.getElementById('new-comment-form');
   const newNameInput = document.getElementById('new-name');
   const newCommentInput = document.getElementById('new-comment');
   const newSubmitButton = newCommentForm.querySelector('button');
   const modalOverlay = document.getElementById('modal-overlay');

   // Functions to open/close modals and overlay
   function openModal(modal) {
     modal.classList.add('open');
     modal.focus();
     modalOverlay.classList.add('open');
     document.body.style.overflow = 'hidden';
   }
   function closeModal(modal) {
     modal.classList.remove('open');
     modalOverlay.classList.remove('open');
     document.body.style.overflow = '';
   }

   // Comments modal open/close
   commentsButton.addEventListener('click', () => {
     openModal(commentsModal);
   });
   closeCommentsBtn.addEventListener('click', () => {
     closeModal(commentsModal);
     commentsButton.focus();
   });

   // New comment modal open/close
   newCommentButton.addEventListener('click', () => {
     openModal(newCommentModal);
   });
   closeNewCommentBtn.addEventListener('click', () => {
     closeModal(newCommentModal);
     newCommentButton.focus();
   });

   // Close modals on overlay click
   modalOverlay.addEventListener('click', () => {
     if (commentsModal.classList.contains('open')) {
       closeModal(commentsModal);
       commentsButton.focus();
     }
     if (newCommentModal.classList.contains('open')) {
       closeModal(newCommentModal);
       newCommentButton.focus();
     }
   });

   // Close modals on Escape key
   document.addEventListener('keydown', (e) => {
     if (e.key === 'Escape') {
       if (commentsModal.classList.contains('open')) {
         closeModal(commentsModal);
         commentsButton.focus();
       }
       if (newCommentModal.classList.contains('open')) {
         closeModal(newCommentModal);
         newCommentButton.focus();
       }
     }
   });

   // Trap focus inside modals
   function trapFocus(modal) {
     modal.addEventListener('keydown', (e) => {
       if (e.key === 'Tab') {
         const focusableElements = modal.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
         const firstElement = focusableElements[0];
         const lastElement = focusableElements[focusableElements.length -1];

         if (e.shiftKey) { // Shift + Tab
           if (document.activeElement === firstElement) {
             e.preventDefault();
             lastElement.focus();
           }
         } else { // Tab
           if (document.activeElement === lastElement) {
             e.preventDefault();
             firstElement.focus();
           }
         }
       }
     });
   }
   trapFocus(commentsModal);
   trapFocus(newCommentModal);

   // Enable submit button only if both fields have content (new comment form)
   function validateNewForm() {
     if (newNameInput.value.trim() !== '' && newCommentInput.value.trim() !== '') {
       newSubmitButton.disabled = false;
     } else {
       newSubmitButton.disabled = true;
     }
   }
   newNameInput.addEventListener('input', validateNewForm);
   newCommentInput.addEventListener('input', validateNewForm);

   // Simple escape to prevent HTML injection
   function escapeHtml(text) {
     return text.replace(/[&<>"']/g, function(m) {
       return ({
         '&': '&amp;',
         '<': '&lt;',
         '>': '&gt;',
         '"': '&quot;',
         "'": '&#39;'
       })[m];
     });
   }
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
</div>
<?php
    include 'layout/footer.php';
    ?>
 </body>
</html>