
<html lang="en">
 <head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>Galeria</title>
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  <link rel="stylesheet" href="/PROYECTO-MILITAR/views/assets/css/galeria.css">
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
    /* Container for cups */
    .gallery {
      display: flex;
      gap: 1.5rem;
      /* max-width: 960px; */
      width: 100%;
      justify-content: center;
      flex-wrap: wrap;
        padding: 40px 20px;
    }
    /* Each cup button */
    .cup-label {
      position: relative;
      width: 10rem;
      aspect-ratio: 1 / 1;
      border-radius: 0.75rem;
      overflow: hidden;
      box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
      cursor: pointer;
      display: block;
      transition: transform 0.3s ease;
      outline-offset: 3px;
    }
    .cup-label:hover,
    .cup-label:focus {
      transform: scale(1.05);
      outline: none;
      box-shadow: 0 10px 25px rgba(14, 14, 14, 0.5);
    }
    .cup-label img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }
    .cup-caption {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 0.5rem 0.75rem;
      background: linear-gradient(0deg, rgba(0, 0, 0, 0.7), transparent);
      color: white;
      font-weight: 600;
      font-size: 0.875rem;
      text-align: center;
      user-select: none;
    }
    /* Hide checkboxes */
    input[type="checkbox"] {
      display: none;
    }
    /* Modal overlay */
    .modal {
      position: fixed;
      inset: 0;
      background-color: rgba(0, 0, 0, 0.75);
      backdrop-filter: blur(5px);
      display: none;
      align-items: center;
      justify-content: center;
      z-index: 1000;
      padding: 1rem;
    }
    /* Show modal when checkbox checked */
    input[type="checkbox"]:checked + .modal {
      display: flex;
    }
    /* Modal content */
    .modal-content-logros {
      background: white;
      border-radius: 0.5rem;
        max-width: 28rem;
      width: 100%;
      max-height: 90vh; 
      overflow-y: auto;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
      position: relative;
      display: flex;
      flex-direction: column;
    }
    /* Close button */
    .close-btn {
      position: absolute;
      top: 0.5rem;
      right: 0.5rem;
      background: transparent;
      border: none;
      font-size: 1.5rem;
      color: #4b5563;
      cursor: pointer;
      transition: color 0.2s ease;
      line-height: 1;
      z-index: 1;
    }
    .close-btn:hover,
    .close-btn:focus {
      color:rgb(194, 0, 0);
      outline: none;
    }
    /* Modal image */
    .modal-image {
      width: 100%;
      border-top-left-radius: 0.5rem;
      border-top-right-radius: 0.5rem;
      object-fit: cover;
      max-height: 400px;
      display: block;
    }
    /* Modal text content */
    .modal-text {
      padding: 1rem;
      color: #374151;
      font-size: 0.9rem;
      line-height: 1.4;
    }
    .modal-text h2 {
      margin: 0 0 0.5rem 0;
      font-size: 1.25rem;
      font-weight: 700;
      color: #111827;
    }
    /* Modal footer with buttons */
    .modal-footer {
      padding: 0 1rem 1rem 1rem;
      display: flex;
      gap: 1.5rem;
      align-items: center;
    }
    /* Like checkbox hidden */
    .like-checkbox {
      display: none;
    }
    /* Like label */
    .like-label {
      cursor: pointer;
      color: #4b5563;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-weight: 600;
      user-select: none;
      transition: color 0.2s ease;
      font-size: 1rem;
    }
    /* Like label when checked */
    .like-checkbox:checked + .like-label {
      color: #dc2626;
    }
    /* Comment button */
    .comment-btn {
      cursor: pointer;
      color: #4b5563;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-weight: 600;
      font-size: 1rem;
      background: transparent;
      border: none;
      transition: color 0.2s ease;
    }
    .comment-btn:hover,
    .comment-btn:focus {
      color: #2563eb;
      outline: none;
    }
    /* Scrollbar for modal content */
    .modal-content-logros::-webkit-scrollbar {
      width: 8px;
    }
    .modal-content-logros::-webkit-scrollbar-thumb {
      background-color: rgba(124, 58, 237, 0.5);
      border-radius: 4px;
    }
    /* Responsive */
    @media (max-width: 640px) {
      .gallery {
        gap: 1rem;
      }
      .cup-label {
        width: 8rem;
      }
      .modal-content-logros {
        max-width: 90vw;
      }
    }
    /* Estilos del carrusel */
  .carousel-container {
    position: relative;
    width: 100%;
    overflow: hidden;
  }
  
  .carousel-slides {
    display: flex;
    transition: transform 0.5s ease;
  }
  
  .carousel-slide {
    min-width: 100%;
    display: none;
  }
  
  .carousel-slide.active {
    display: block;
  }
  
  .carousel-control {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 1rem;
    cursor: pointer;
    font-size: 1.5rem;
    z-index: 10;
    border-radius: 50%;
    width: 3rem;
    height: 3rem;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.3s ease;
  }
  
  .carousel-control:hover {
    background: rgba(0, 0, 0, 0.8);
  }
  
  .carousel-control.prev {
    left: 1rem;
  }
  
  .carousel-control.next {
    right: 1rem;
  }
  
  .carousel-indicators {
    position: absolute;
    top: 380px;
    bottom: 1rem;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
    gap: 0.5rem;
    z-index: 10;
  }
  
  .carousel-indicators .indicator {
    width: 0.75rem;
    height: 0.75rem;
    border-radius: 50%;
    background: rgba(121, 121, 121, 0.87);
    border: none;
    cursor: pointer;
    padding: 0;
    transition: background 0.3s ease;
  }
  
  .carousel-indicators .indicator.active {
    background: rgba(10, 10, 10, 0.86);
  }
  
  /* Ajustes para el modal con carrusel */
  .modal-content-logros {
    padding-bottom: 0;
  }
  
  .modal-text {
    padding: 1rem;
  }

  .story-label {
  display: inline-flex;
  flex-direction: column;
  align-items: center;
  margin: 10px;
  cursor: pointer;
  text-align: center;
}

.story-container {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  overflow: hidden;
  border: 3px solid #007bff; /* azul estilo historia */
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #fff;
  transition: transform 0.3s ease;
}

.story-container:hover {
  transform: scale(1.05);
}

.story-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.story-title {
  margin-top: 8px;
  font-size: 14px;
  font-weight: 500;
  color: #333;
  max-width: 120px;       /* mismo ancho que la imagen */
  word-wrap: break-word;  /* permite romper palabras largas si es necesario */
  white-space: normal;    /* permite saltos de línea */
  text-align: center;
}
.story-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 1.5rem;
}

.btn-green {
    background-color: #4CAF50;
    color: white;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.btn-green:hover {
    background-color: #45a049;
}
  </style>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js"></script>
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
            </div>
        </div>
    </section>
<div class="gallery" role="list">
            <?php foreach ($logros as $logro): ?>
                <?php
                    $idLogro = $logro['logro_id'];
                    $imagen = isset($imagenesPorLogro[$idLogro])
                                ? 'uploads/logros/' . $imagenesPorLogro[$idLogro]
                                : 'https://via.placeholder.com/100x100.png?text=Sin+Imagen';
                ?>
                <div class="story-container">
                    <label
                        class="story-label"
                        data-id="<?= htmlspecialchars($logro['logro_id']) ?>"
                        data-title="<?= htmlspecialchars($logro['titulo']) ?>"
                        data-img="<?= htmlspecialchars($imagen) ?>"
                        data-desc="<?= htmlspecialchars($logro['descripcion']) ?>"
                        tabindex="0"
                        role="listitem"
                    >
                        <img
                            src="<?= htmlspecialchars($imagen) ?>"
                            alt="<?= htmlspecialchars($logro['titulo']) ?>"
                            width="100"
                            height="100"
                            class="story-img"
                        />
                        <div class="story-title"><?= htmlspecialchars($logro['titulo']) ?></div>
                    </label>
                    <div class="mt-2 text-center">
                        <a href="/PROYECTO-MILITAR/views/web/galeria_logro.php?id=<?= urlencode($logro['logro_id']) ?>" 
                           class="btn-green inline-block px-4 py-2 text-sm">
                            Ver detalles
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
<!-- Sección de Nuestros Logros y Galería -->
<section id="logros-section"> 

    <!-- Galería de imágenes -->
    <div class="gallery-grid">
        <?php foreach ($imagenes as $img): ?>
            <div class="gallery-item" data-type="image" data-src="uploads/galeria/<?= htmlspecialchars($img['img']) ?>" data-caption="Logro - Descripción breve">
                <img src="uploads/galeria/<?= htmlspecialchars($img['img']) ?>" alt="Imagen galería">
                <div class="gallery-overlay">
                    <i class="fas fa-expand"></i>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>


<script>
document.addEventListener('DOMContentLoaded', function() {
    // =============================================
    // Carrusel para el modal de imágenes (el primero que mostraste)
    // =============================================
    const initModalCarousel = () => {
        const modalSlides = document.querySelectorAll('.carousel-slide');
        const modalIndicators = document.querySelectorAll('.carousel-indicators .indicator');
        const modalPrevBtn = document.querySelector('.modal .carousel-control.prev');
        const modalNextBtn = document.querySelector('.modal .carousel-control.next');
        let modalCurrentIndex = 0;
        
        function updateModalCarousel() {
            modalSlides.forEach((slide, index) => {
                slide.classList.toggle('active', index === modalCurrentIndex);
            });
            
            modalIndicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === modalCurrentIndex);
            });
        }
        
        function nextModalSlide() {
            modalCurrentIndex = (modalCurrentIndex + 1) % modalSlides.length;
            updateModalCarousel();
        }
        
        function prevModalSlide() {
            modalCurrentIndex = (modalCurrentIndex - 1 + modalSlides.length) % modalSlides.length;
            updateModalCarousel();
        }
        
        function goToModalSlide(index) {
            modalCurrentIndex = index;
            updateModalCarousel();
        }
        
        // Event listeners
        if (modalNextBtn) modalNextBtn.addEventListener('click', nextModalSlide);
        if (modalPrevBtn) modalPrevBtn.addEventListener('click', prevModalSlide);
        
        modalIndicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => goToModalSlide(index));
        });
        
        // Navegación con teclado solo para este modal
        document.addEventListener('keydown', function(e) {
            const modalCheckbox = document.getElementById('modal-toggle-carousel');
            if (modalCheckbox && modalCheckbox.checked) {
                if (e.key === 'ArrowRight') nextModalSlide();
                if (e.key === 'ArrowLeft') prevModalSlide();
            }
        });
    };
    
    initModalCarousel();
    
    // =============================================
    // 1. Modal simple para la galería de imágenes/videos
    // =============================================
    // const galleryModal = document.createElement('div');
    // galleryModal.id = 'galleryModal';
    // galleryModal.style.cssText = `
    //     position: fixed;
    //     top: 0;
    //     left: 0;
    //     width: 100%;
    //     height: 100%;
    //     background-color: rgba(0,0,0,0.9);
    //     display: none;
    //     justify-content: center;
    //     align-items: center;
    //     z-index: 1000;
    // `;
    
    // const galleryModalContent = document.createElement('div');
    // galleryModalContent.style.cssText = `
    //     position: relative;
    //     max-width: 90%;
    //     max-height: 90%;
    // `;
    
    // const closeGalleryBtn = document.createElement('button');
    // closeGalleryBtn.innerHTML = '<i class="fas fa-times"></i>';
    // closeGalleryBtn.style.cssText = `
    //     position: absolute;
    //     top: -40px;
    //     right: 0;
    //     background: none;
    //     border: none;
    //     color: white;
    //     font-size: 1.5rem;
    //     cursor: pointer;
    // `;
    
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
// Modal simple para la galería de imágenes/videos
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

function hideGalleryModal() {
    galleryModal.style.display = 'none';
    document.body.style.overflow = '';
}

closeGalleryBtn.addEventListener('click', hideGalleryModal);

document.querySelectorAll('.gallery-item').forEach(item => {
    item.addEventListener('click', function() {
        const type = this.getAttribute('data-type');
        const src = this.getAttribute('data-src');
        showGalleryModal(type, src);
    });
});
});
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const storyLabels = document.querySelectorAll(".story-label");
    const modal = document.getElementById("logro-modal");
    const modalImg = document.getElementById("modal-img");
    const modalTitle = document.getElementById("modal-title");
    const modalDesc = document.getElementById("modal-desc");
    const closeBtn = document.getElementById("modal-close");

    storyLabels.forEach(label => {
      label.addEventListener("click", function () {
        const img = this.getAttribute("data-img");
        const title = this.getAttribute("data-title");
        const desc = this.getAttribute("data-desc") || "";

        modalImg.src = img;
        modalTitle.textContent = title;
        modalDesc.textContent = desc;

        modal.style.display = "block";
      });
    });

    closeBtn.addEventListener("click", function () {
      modal.style.display = "none";
    });

    window.addEventListener("click", function (e) {
      if (e.target === modal) {
        modal.style.display = "none";
      }
    });
  });
</script>
</body>
<?php include 'layout/footer.php'?>
</html>