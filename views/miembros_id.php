<html lang="es">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title><?= htmlspecialchars($emprendimiento['nombre_emprendimiento']) ?></title>
  <link rel="icon" href="/PROYECTO-MILITAR/views/assets/img/logo.jpg" type="image/png">
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body>
  <div class="header-bar">
   Mi Información
  </div>
  <main>
   <article>
    <div style="position:relative; width:100%;">
     <img alt="Foto de portada panorámica de un miembro sonriente en un entorno natural moderno y luminoso" class="cover-photo" height="400" loading="lazy" src="https://storage.googleapis.com/a1aa/image/dbbe7752-4017-454c-46f7-933535e5c803.jpg" width="1200"/>
     <div class="profile-pic-wrapper">
      <img alt="Foto de perfil circular de un miembro joven con fondo neutro y expresión amigable" class="profile-pic" height="160" loading="lazy" src="https://storage.googleapis.com/a1aa/image/1401f1f7-8673-4ab3-76e7-4291cc8c7e7b.jpg" width="160"/>
     </div>
    </div>
    <div class="content">
     <div class="content-inner">
      <h1>
       Ana María López
      </h1>
      <p class="subtitle">
       Desarrolladora Frontend &amp; Influencer Tech
      </p>
      <div class="info-row">
       <div class="info-item">
        <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
        <span>Madrid, España</span>
       </div>
       <div class="info-item">
        <i class="fas fa-calendar-alt" aria-hidden="true"></i>
        <span>Miembro desde 2019</span>
       </div>
       <div class="info-item">
        <i class="fas fa-envelope" aria-hidden="true"></i>
        <a href="mailto:ana.lopez@email.com">ana.lopez@email.com</a>
       </div>
      </div>
      <section class="prose">
       <h2>
        Sobre Ana María
       </h2>
       <p>
        Ana María es una apasionada desarrolladora frontend con más de 5 años de experiencia en la creación de interfaces modernas y accesibles. Le encanta compartir sus conocimientos a través de blogs y videos, y es una voz activa en la comunidad tecnológica.
       </p>
       <p>
        En su tiempo libre, disfruta de la fotografía, el senderismo y la exploración de nuevas tecnologías. Su objetivo es inspirar a más mujeres a entrar en el mundo del desarrollo web.
       </p>
      </section>
      <section>
       <h2>
        Galería de Fotos
       </h2>
       <div class="gallery" aria-label="Galería de fotos de Ana María López">
        <img alt="Ana María López hablando en una conferencia tecnológica con fondo de audiencia" height="300" loading="lazy" src="https://storage.googleapis.com/a1aa/image/184fb198-19d0-448a-2052-a2d0068f3c34.jpg" width="400"/>
        <img alt="Ana María López concentrada trabajando en su portátil en un espacio de coworking moderno" height="300" loading="lazy" src="https://storage.googleapis.com/a1aa/image/8022199c-8e77-4abb-0024-990546a0b991.jpg" width="400"/>
        <img alt="Retrato profesional de Ana María López en sesión de fotografía con fondo neutro" height="300" loading="lazy" src="https://storage.googleapis.com/a1aa/image/de9c79af-08b3-4fd6-318f-d10fe35941b8.jpg" width="400"/>
        <img alt="Ana María López en evento de tecnología rodeada de otros profesionales" height="300" loading="lazy" src="https://storage.googleapis.com/a1aa/image/c7e7ca99-b075-4fe4-6672-758ea34e1652.jpg" width="400"/>
       </div>
      </section>
      <section>
       <h2>
        Video Destacado
       </h2>
       <div class="video-wrapper">
        <iframe allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Video destacado de Ana María López hablando sobre desarrollo frontend"></iframe>
       </div>
      </section>
     </div>
    </div>
   </article>
  </main>
  <button id="new-comments-button" aria-label="Abrir comentarios">
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
    <p><strong>Juan:</strong> ¡Gran perfil! Me encanta tu trabajo.</p>
    <p><strong>Lucía:</strong> Gracias por compartir tus conocimientos, Ana.</p>
    <p><strong>Carlos:</strong> ¿Podrías compartir más videos sobre React?</p>
    <p><strong>María:</strong> Inspiradora, gracias por motivar a más mujeres en tecnología.</p>
    <p><strong>Pedro:</strong> Excelente contenido, espero ver más pronto.</p>
   </div>
  </aside>
  <div id="modal-overlay" tabindex="-1"></div>
  <aside id="new-comment-modal" role="dialog" aria-modal="true" aria-labelledby="new-comment-title" tabindex="-1">
   <header>
    <span id="new-comment-title">Nuevo Comentario</span>
    <button aria-label="Cerrar nuevo comentario" id="close-new-comment-btn">&times;</button>
   </header>
   <form id="new-comment-form" novalidate>
    <input aria-label="Nombre" autocomplete="name" id="new-name" name="name" placeholder="Nombre" required type="text"/>
    <textarea aria-label="Comentario" id="new-comment" name="comment" placeholder="Escribe tu comentario..." required rows="3"></textarea>
    <button aria-label="Enviar comentario" disabled type="submit">
     <i class="fas fa-paper-plane"></i> Enviar
    </button>
   </form>
  </aside>
  <script>
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

   // Handle new comment form submission
   newCommentForm.addEventListener('submit', (e) => {
     e.preventDefault();
     const name = newNameInput.value.trim();
     const comment = newCommentInput.value.trim();
     if (!name || !comment) return;

     // Create new comment element
     const p = document.createElement('p');
     p.innerHTML = `<strong>${escapeHtml(name)}:</strong> ${escapeHtml(comment)}`;
     commentsContent.appendChild(p);

     // Scroll comments to bottom
     commentsContent.scrollTop = commentsContent.scrollHeight;

     // Clear form
     newCommentForm.reset();
     newSubmitButton.disabled = true;

     // Close new comment modal and open comments modal
     closeModal(newCommentModal);
     openModal(commentsModal);
   });

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
 </body>
</html>