<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>Nuestros recuerdos</title>
  <link rel="icon" href="/PROYECTO-MILITAR/views/assets/img/logo.jpg" type="image/png">
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    rel="stylesheet"/>
    <link rel="stylesheet" href="<?= BASE_URL ?>views/assets/css/galeria.css"/>
    <link rel="stylesheet" href="<?= BASE_URL ?>views/assets/css/efecto.css"/>
</head>
<body>
  <!-- Preloader -->
    <div id="preloader">
        <img src="/PROYECTO-MILITAR/views/assets/img/logo.jpg" alt="Cargando..."> <!-- Cambia por la ruta de tu logo -->
    </div>
  <?php
    include 'layout/header.php';
    ?>
  <!-- Full width header rectangle -->
  <header>La esencia en fotos</header>

  <div class="container">
    <!--<h2-->
      <span>¡Momentos compartidos, sonrisas contagiadas!</span>
    </h2> 
    <div class="gallery" id="gallery">
      <!-- Gallery items with static HTML -->
      <?php foreach ($imagenes as $img): ?>
  <div class="gallery-item" data-type="image" data-src="uploads/galeria/<?= htmlspecialchars($img['img']) ?>" data-caption="Logro - Descripción breve">
    <img 
      src="uploads/galeria/<?= htmlspecialchars($img['img']) ?>" 
      alt="Imagen galería"
    />
    <div class="overlay">
      <button class="icon-btn plus-btn" aria-label="Abrir imagen en modal" type="button">
        <i class="fas fa-eye"></i>
      </button>
    </div>
    
  </div>
<?php endforeach; ?>
    </div>
  </div>

  <!-- Floating hearts container -->
  <div class="floating-hearts-container" id="floatingHeartsContainer"></div>

  <!-- Modal -->
  <div id="modal" role="dialog" aria-modal="true">
    <button id="modalClose" aria-label="Close modal" title="Close">&times;</button>
    <div id="modalContent">
      <img id="modalImage" src="" alt="Expanded ice cream image" />
    </div>
  </div>

  <!-- Messages Button 
  <button id="messagesBtn" aria-label="Open messages" title="Mensajes">
    <div class="logo"></div>
    <span>Mensajes</span>
  </button>-->

  <!-- Messages Modal -->
  <div id="messagesModal" role="dialog" aria-modal="true" aria-labelledby="messagesTitle" aria-hidden="true">
    <header>
      <span id="messagesTitle">Mensajes</span>
      <button id="messagesClose" aria-label="Close messages modal" title="Close">&times;</button>
    </header>
    <div id="messagesContent">
      <div id="commentsList" aria-live="polite" aria-relevant="additions">
        <!-- Comments will appear here -->
      </div>
      <form id="commentForm" aria-label="Add a comment">
        <input type="text" id="nameInput" placeholder="Nombre" required aria-required="true" />
        <textarea id="commentInput" rows="3" placeholder="Comentario" required aria-required="true"></textarea>
        <button type="submit">Enviar</button>
      </form>
    </div>
  </div>

<script>
const gallery = document.getElementById("gallery");
const modal = document.getElementById("modal");
const modalImage = document.getElementById("modalImage");
const modalClose = document.getElementById("modalClose");
const floatingHeartsContainer = document.getElementById("floatingHeartsContainer");
const messagesBtn = document.getElementById("messagesBtn");
const messagesModal = document.getElementById("messagesModal");
const messagesClose = document.getElementById("messagesClose");
const commentForm = document.getElementById("commentForm");
const nameInput = document.getElementById("nameInput");
const commentInput = document.getElementById("commentInput");
const commentsList = document.getElementById("commentsList");

Array.from(gallery.children).forEach((item) => {
  const plusBtn = item.querySelector(".plus-btn");
  const img = item.querySelector("img");

  // Solo manejamos el botón plus para abrir modal
  if (plusBtn) {
    plusBtn.addEventListener("click", (e) => {
      e.stopPropagation();
      modalImage.src = img.src;
      modalImage.alt = img.alt;
      modal.classList.add("active");
      document.body.style.overflow = "hidden";
      // Ocultar el botón de mensajes
      messagesBtn.style.display = "none";
    });
  }
});

// Cerrar modal
function closeModal() {
  modal.classList.remove("active");
  modalImage.src = "";
  modalImage.alt = "";
  document.body.style.overflow = "";
  // Mostrar el botón de mensajes solo si el modal de mensajes no está abierto
  if (!messagesModal.classList.contains("active")) {
    messagesBtn.style.display = "flex";
  }
}

modalClose.addEventListener("click", closeModal);
modal.addEventListener("click", (e) => {
  if (e.target === modal) closeModal();
});
window.addEventListener("keydown", (e) => {
  if (e.key === "Escape" && modal.classList.contains("active")) closeModal();
});

// modal mensaje
messagesBtn.addEventListener("click", () => {
  messagesModal.classList.add("active");
  messagesModal.setAttribute("aria-hidden", "false");
  document.body.style.overflow = "hidden";
  // Ocultar el botón de mensajes al abrir su propio modal
  messagesBtn.style.display = "none";
});

function closeMessagesModal() {
  messagesModal.classList.remove("active");
  messagesModal.setAttribute("aria-hidden", "true");
  document.body.style.overflow = "";
  // Mostrar el botón de mensajes solo si el modal de imagen no está abierto
  if (!modal.classList.contains("active")) {
    messagesBtn.style.display = "flex";
  }
}

messagesClose.addEventListener("click", closeMessagesModal);

// Close messages modal on clicking outside content
messagesModal.addEventListener("click", (e) => {
  if (e.target === messagesModal) {
    closeMessagesModal();
  }
});

// Handle comment form submission
commentForm.addEventListener("submit", (e) => {
  e.preventDefault();
  const name = nameInput.value.trim();
  const comment = commentInput.value.trim();
  if (!name || !comment) return;

  const commentDiv = document.createElement("div");
  commentDiv.className = "comment";

  // Create avatar with initials
  const avatar = document.createElement("div");
  avatar.className = "comment-avatar";
  avatar.textContent = name.charAt(0).toUpperCase();

  const commentContent = document.createElement("div");
  commentContent.className = "comment-content";

  const strong = document.createElement("strong");
  strong.textContent = name;

  const p = document.createElement("p");
  p.textContent = comment;

  commentContent.appendChild(strong);
  commentContent.appendChild(p);

  commentDiv.appendChild(avatar);
  commentDiv.appendChild(commentContent);

  commentsList.appendChild(commentDiv);

  // Clear inputs
  nameInput.value = "";
  commentInput.value = "";

  // Scroll to bottom
  commentsList.scrollTop = commentsList.scrollHeight;
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