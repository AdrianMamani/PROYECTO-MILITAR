<html lang="en">
 <head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>Galeria</title>
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  <link rel="stylesheet" href="assets/css/galeria.css">
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
include 'layout/header.php';
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
            <!--<span></span> -->
        </button>
    </div>

    <!-- Galería de imágenes -->
    <div class="gallery-grid">
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

<div aria-hidden="true" id="modalBackdrop" tabindex="-1">
  </div>
  <div aria-labelledby="modalTitle" aria-modal="true" id="modal" role="dialog" tabindex="-1">
   <div id="modalContent" role="document">
    <div id="carouselContainer">
     <img alt="Imagen 1 de 5 en carrusel de galería" height="800" id="carouselImage" src="https://storage.googleapis.com/a1aa/image/6f321c7b-5ea9-4ab9-dc4d-22be7f6d6464.jpg" width="600"/>
     <button aria-label="Imagen anterior" class="carouselBtn" id="prevBtn" type="button">
      <i class="fas fa-chevron-left">
      </i>
     </button>
     <button aria-label="Imagen siguiente" class="carouselBtn" id="nextBtn" type="button">
      <i class="fas fa-chevron-right">
      </i>
     </button>
    </div>
    <div id="modalRight">
     <header id="modalHeader">
      <img alt="Perfil muychismozoo" height="40" src="https://storage.googleapis.com/a1aa/image/6d31bbc1-5fae-4a4e-8610-00b7efaf0b01.jpg" width="40"/>
      <div class="userInfo">
       <span>
        muychismozoo
       </span>
       <span>
        Audio original
       </span>
      </div>
      <button class="followBtn" type="button">
       Seguir
      </button>
      <button aria-label="Cerrar modal" class="closeBtn" id="closeModalBtn" type="button">
       <i class="fas fa-times">
       </i>
      </button>
     </header>
     <section id="modalCaption">
      <p>
       <strong>
        muychismozoo
       </strong>
       <a href="#">
        #valeriamarquez
       </a>
       momentos antes de los hechos ⚠️
      </p>
      <p>
       2 días
      </p>
     </section>
     
     <footer id="modalFooter">
      <div aria-label="Acciones de publicación" class="actions" role="group">
       <button aria-label="Me gusta" type="button">
        <i class="far fa-heart">
        </i>
       </button>
       <button aria-label="Comentar" type="button">
        <i class="far fa-comment">
        </i>
       </button>
       <button aria-label="Enviar" type="button">
        <i class="far fa-paper-plane">
        </i>
       </button>
      </div>
      <div class="likes">
       60.866 Me gusta
      </div>
      <div class="date">
       Hace 2 días
      </div>
      <form id="commentForm" onsubmit="event.preventDefault(); addComment();">
       <button aria-label="Emoji" class="emojiBtn" type="button">
        <i class="far fa-smile">
        </i>
       </button>
       <button class="canvas-confetti-btn animate__animated">🎉<span class="tool-tip">Click me!
        </span></button>
       <!-- <input aria-label="Añade un comentario" autocomplete="off" id="commentInput" placeholder="Añade un comentario..." type="text"/>
       <button class="submitBtn" disabled="" id="postCommentBtn" type="submit">
        Publicar
       </button> -->
      </form>
     </footer>
    </div>
   </div>
  </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // =============================================
    // 1. Modal simple para la galería de imágenes/videos
    // =============================================
    const galleryModal = document.createElement('div');
    galleryModal.id = 'galleryModal';
    galleryModal.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.9);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    `;
    
    const galleryModalContent = document.createElement('div');
    galleryModalContent.style.cssText = `
        position: relative;
        max-width: 90%;
        max-height: 90%;
    `;
    
    const closeGalleryBtn = document.createElement('button');
    closeGalleryBtn.innerHTML = '<i class="fas fa-times"></i>';
    closeGalleryBtn.style.cssText = `
        position: absolute;
        top: -40px;
        right: 0;
        background: none;
        border: none;
        color: white;
        font-size: 1.5rem;
        cursor: pointer;
    `;
    
    galleryModalContent.appendChild(closeGalleryBtn);
    galleryModal.appendChild(galleryModalContent);
    document.body.appendChild(galleryModal);
    
    // Función para mostrar el modal de galería
    function showGalleryModal(type, src) {
        galleryModalContent.innerHTML = '';
        galleryModalContent.appendChild(closeGalleryBtn);
        
        if (type === 'image') {
            const img = document.createElement('img');
            img.src = src;
            img.style.cssText = 'max-width: 100%; max-height: 80vh; object-fit: contain;';
            galleryModalContent.insertBefore(img, closeGalleryBtn);
        } else if (type === 'video') {
            const video = document.createElement('video');
            video.controls = true;
            video.autoplay = true;
            video.style.cssText = 'max-width: 100%; max-height: 80vh;';
            const source = document.createElement('source');
            source.src = src;
            source.type = 'video/mp4';
            video.appendChild(source);
            galleryModalContent.insertBefore(video, closeGalleryBtn);
        }
        
        galleryModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    
    // Función para cerrar el modal de galería
    function hideGalleryModal() {
        galleryModal.style.display = 'none';
        document.body.style.overflow = '';
    }
    
    // Event listeners para el modal de galería
    closeGalleryBtn.addEventListener('click', hideGalleryModal);
    
    // Conectar los items de la galería al modal
    document.querySelectorAll('.gallery-item').forEach(item => {
        item.addEventListener('click', function() {
            const type = this.getAttribute('data-type');
            const src = this.getAttribute('data-src');
            showGalleryModal(type, src);
        });
    });

    // =============================================
    // 2. Modal estilo Instagram para "Nuestros Logros" (sin emoji)
    // =============================================
    const images = [
        {
            src: "../assets/img/pruebas/prueba01.jpeg",
            alt: "Ceremonia de graduación 2023",
            caption: "Nuestra promoción 2023 durante la ceremonia de graduación oficial",
            date: "15 de Diciembre 2023",
            likes: "5,432 Me gusta",
            comments: [
                {
                    avatar: "https://randomuser.me/api/portraits/men/32.jpg",
                    username: "capitan_garcia",
                    text: "¡Qué orgullo ver a esta nueva generación graduarse!",
                    time: "2 días",
                    likes: "124 Me gusta"
                },
                {
                    avatar: "https://randomuser.me/api/portraits/women/44.jpg",
                    username: "teniente_martinez",
                    text: "El esfuerzo y disciplina siempre dan sus frutos",
                    time: "1 día",
                    likes: "89 Me gusta"
                }
            ]
        },
        {
            src: "https://storage.googleapis.com/a1aa/image/6f321c7b-5ea9-4ab9-dc4d-22be7f6d6464.jpg",
            alt: "Ejercicios de campo", 
            caption: "Ejercicios de entrenamiento avanzado en condiciones extremas",
            date: "10 de Enero 2024",
            likes: "3,876 Me gusta",
            comments: [
                {
                    avatar: "https://randomuser.me/api/portraits/men/75.jpg",
                    username: "sargento_ramirez",
                    text: "Así se preparan los verdaderos profesionales",
                    time: "1 semana",
                    likes: "256 Me gusta"
                },
                {
                    avatar: "https://randomuser.me/api/portraits/men/68.jpg",
                    username: "soldado_perez",
                    text: "Fue un entrenamiento exigente pero valió la pena",
                    time: "5 días",
                    likes: "143 Me gusta"
                }
            ]
        },
        {
            src: "https://storage.googleapis.com/a1aa/image/966ac2e9-1531-4fa1-9e4e-7a86d6a0f4a3.jpg",
            alt: "Acto de condecoración",
            caption: "Reconocimiento al mérito por acciones destacadas en servicio",
            date: "25 de Febrero 2024",
            likes: "7,921 Me gusta",
            comments: [
                {
                    avatar: "https://randomuser.me/api/portraits/women/63.jpg",
                    username: "comandante_rojas",
                    text: "Merecido reconocimiento a tanto esfuerzo",
                    time: "3 días",
                    likes: "432 Me gusta"
                },
                {
                    avatar: "https://randomuser.me/api/portraits/men/82.jpg",
                    username: "coronel_suarez",
                    text: "Ejemplo de dedicación y compromiso con la patria",
                    time: "2 días",
                    likes: "387 Me gusta"
                }
            ]
        }
    ];

    let currentIndex = 0;

    // Elementos del modal de Instagram
    const logrosBtn = document.getElementById("logrosBtn");
    const closeModalBtn = document.getElementById("closeModalBtn");
    const modal = document.getElementById("modal");
    const modalBackdrop = document.getElementById("modalBackdrop");
    const carouselImage = document.getElementById("carouselImage");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const commentsContainer = document.getElementById("commentsContainer");

    // Eliminar el botón de emoji del formulario
    const emojiBtn = document.querySelector('.emojiBtn');
    if (emojiBtn) {
        emojiBtn.remove();
    }
    
    // Datos base del perfil
    const profileData = {
        username: "CABO ALBERTO REYES GAMARRA",
        avatar: "https://storage.googleapis.com/a1aa/image/039aab5e-f041-49a8-d02e-7883e6fc4575.jpg",
        promotion: "Promoción 2023"
    };

    // Mostrar modal de logros
    function showLogrosModal() {
        modal.style.display = "flex";
        modalBackdrop.style.display = "block";
        document.body.style.overflow = "hidden";
        currentIndex = 0;
        updateCarousel();
        updateProfileInfo();
    }

    // Ocultar modal de logros
    function hideLogrosModal() {
        modal.style.display = "none";
        modalBackdrop.style.display = "none";
        document.body.style.overflow = "";
    }

    // Actualizar carrusel de imágenes
    function updateCarousel() {
        const currentImage = images[currentIndex];
        carouselImage.src = currentImage.src;
        carouselImage.alt = currentImage.alt;
        
        // Actualizar información específica de esta imagen
        document.getElementById('modalCaption').innerHTML = `
            <p><strong>${profileData.username}</strong> ${currentImage.caption}</p>
            <p>${currentImage.date}</p>
        `;
        
        // Actualizar likes
        document.querySelector('.likes').textContent = currentImage.likes;
        document.querySelector('.date').textContent = currentImage.date;
        
        // Actualizar comentarios
        commentsContainer.innerHTML = '';
        currentImage.comments.forEach(comment => {
            const commentDiv = document.createElement("article");
            commentDiv.className = "comment";

            const commentHeader = document.createElement("div");
            commentHeader.className = "commentHeader";

            const userImg = document.createElement("img");
            userImg.src = comment.avatar;
            userImg.alt = `Perfil ${comment.username}`;
            userImg.width = 28;
            userImg.height = 28;
            userImg.style.borderRadius = "9999px";
            userImg.style.objectFit = "cover";

            const userName = document.createElement("span");
            userName.className = "username";
            userName.textContent = comment.username;

            commentHeader.appendChild(userImg);
            commentHeader.appendChild(userName);

            const commentText = document.createElement("p");
            commentText.className = "commentText";
            commentText.textContent = comment.text;

            const commentMeta = document.createElement("small");
            commentMeta.style.color = "#9ca3af";
            commentMeta.textContent = `${comment.time} · ${comment.likes}`;

            commentDiv.appendChild(commentHeader);
            commentDiv.appendChild(commentText);
            commentDiv.appendChild(commentMeta);

            commentsContainer.appendChild(commentDiv);
        });
    }

    // Actualizar información del perfil (constante para todas las imágenes)
    function updateProfileInfo() {
        const userAvatar = document.querySelector('#modalHeader img');
        const userInfo = document.querySelector('#modalHeader .userInfo');
        const usernameSpan = userInfo.querySelector('span:first-child');
        const promotionSpan = userInfo.querySelector('span:last-child');
        
        userAvatar.src = profileData.avatar;
        userAvatar.alt = `Perfil ${profileData.username}`;
        usernameSpan.textContent = profileData.username;
        promotionSpan.textContent = profileData.promotion;
    }

    // Event listeners
    logrosBtn.addEventListener("click", showLogrosModal);
    closeModalBtn.addEventListener("click", hideLogrosModal);
    modalBackdrop.addEventListener("click", hideLogrosModal);

    prevBtn.addEventListener("click", () => {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateCarousel();
    });

    nextBtn.addEventListener("click", () => {
        currentIndex = (currentIndex + 1) % images.length;
        updateCarousel();
    });

    // Cerrar modales con ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (galleryModal.style.display === 'flex') hideGalleryModal();
            if (modal.style.display === 'flex') hideLogrosModal();
        }
    });
});
</script>
<script>
  import confetti from "https://cdn.skypack.dev/canvas-confetti@1.4.0";

const confettiBtn = document.querySelector(".canvas-confetti-btn");
let exploding = false;

const defaults = {
  particleCount: 500,
  spread: 80,
  angle: 50,
};

const fire = (particleRatio, opts) => {
  confetti(
    Object.assign({}, defaults, opts, {
      particleCount: Math.floor(defaults.particleCount * particleRatio),
    })
  );
};

confettiBtn.addEventListener("click", () => {
  if (exploding) {
    return;
  }
  exploding = true;
  confettiBtn.classList.add("animate__rubberBand");
  window.setTimeout(() => {
    fire(0.25, {
      spread: 26,
      startVelocity: 55,
    });
    fire(0.2, {
      spread: 60,
    });
    fire(0.35, {
      spread: 100,
      decay: 0.91,
      scalar: 0.8,
    });
    fire(0.1, {
      spread: 120,
      startVelocity: 25,
      decay: 0.92,
      scalar: 1.2,
    });
    fire(0.1, {
      spread: 120,
      startVelocity: 45,
    });
    window.setTimeout(() => {
      confettiBtn.classList.remove("animate__rubberBand");
      exploding = false;
    }, 300);
  }, 300);
});
</script>


</body>
<?php include 'layout/footer.php'?>

</html>
