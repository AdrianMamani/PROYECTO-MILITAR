// menu 
    const menuButton = document.getElementById("menu-button");
    const modalMenu = document.getElementById("modal-menu");
    const modalBackdrop = document.getElementById("modal-backdrop");
    const modalClose = document.getElementById("modal-close");

    function openMenu() {
      modalMenu.classList.remove("translate-x-full");
      modalBackdrop.classList.remove("hidden");
      modalBackdrop.setAttribute("aria-hidden", "false");
    }

    function closeMenu() {
      modalMenu.classList.add("translate-x-full");
      modalBackdrop.classList.add("hidden");
      modalBackdrop.setAttribute("aria-hidden", "true");
    }

    menuButton.addEventListener("click", openMenu);
    modalClose.addEventListener("click", closeMenu);
    modalBackdrop.addEventListener("click", closeMenu);

// Close menu on Escape key
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && !modalBackdrop.classList.contains("hidden")) {
        closeMenu();
      }
    });

// boton chat
    document.addEventListener('DOMContentLoaded', () => {
      const messageButton = document.getElementById('messageButton');
      const messageModal = document.getElementById('messageModal');
      const closeMessageModal = document.getElementById('closeMessageModal');
      const messageForm = document.getElementById('messageForm');
      const mobileMenuButton = document.getElementById('mobileMenuButton');
      const mobileMenuModal = document.getElementById('mobileMenuModal');
      const closeMobileMenu = document.getElementById('closeMobileMenu');

      messageButton.addEventListener('click', () => {
        messageModal.classList.remove('hidden');
        messageModal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('modal-open');
      });

      closeMessageModal.addEventListener('click', () => {
        messageModal.classList.add('hidden');
        messageModal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('modal-open');
      });

      messageModal.addEventListener('click', (e) => {
        if (e.target === messageModal) {
          messageModal.classList.add('hidden');
          messageModal.setAttribute('aria-hidden', 'true');
          document.body.classList.remove('modal-open');
        }
      });

      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
          if (!messageModal.classList.contains('hidden')) {
            messageModal.classList.add('hidden');
            messageModal.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('modal-open');
          }
          if (!mobileMenuModal.classList.contains('hidden')) {
            mobileMenuModal.classList.add('hidden');
            mobileMenuModal.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('modal-open');
          }
        }
      });

      messageForm.addEventListener('submit', (e) => {
        e.preventDefault();
        alert(
          'Formulario enviado:\n' +
            'Nombre: ' +
            messageForm.nombre.value +
            '\n' +
            'Correo: ' +
            messageForm.correo.value +
            '\n' +
            'Comentario: ' +
            messageForm.comentario.value
        );
        messageForm.reset();
        messageModal.classList.add('hidden');
        messageModal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('modal-open');
      });

      mobileMenuButton.addEventListener('click', () => {
        mobileMenuModal.classList.remove('hidden');
        mobileMenuModal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('modal-open');
      });

      closeMobileMenu.addEventListener('click', () => {
        mobileMenuModal.classList.add('hidden');
        mobileMenuModal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('modal-open');
      });

      mobileMenuModal.addEventListener('click', (e) => {
        if (e.target === mobileMenuModal) {
          mobileMenuModal.classList.add('hidden');
          mobileMenuModal.setAttribute('aria-hidden', 'true');
          document.body.classList.remove('modal-open');
        }
      });
    });
// Images deñ carrusel de Sobre Nosotros
    const images = [
      "https://storage.googleapis.com/a1aa/image/57042b00-77f3-4313-696f-8ac6ffce892a.jpg",
      "https://placehold.co/400x280?text=Imagen+2+del+carrusel&font=inter&bg=cccccc&txtclr=333333",
      "https://placehold.co/400x280?text=Imagen+3+del+carrusel&font=inter&bg=cccccc&txtclr=333333"
    ];

    const carouselImage = document.getElementById('carouselImage');
    const dots = document.querySelectorAll('#carouselDots span');
    let currentIndex = 0;

    function updateCarousel(index) {
      carouselImage.src = images[index];
      dots.forEach((dot, i) => {
        dot.classList.toggle('bg-green-600', i === index);
        dot.classList.toggle('bg-gray-300', i !== index);
      });
      currentIndex = index;
    }

    dots.forEach(dot => {
      dot.addEventListener('click', () => {
        updateCarousel(parseInt(dot.dataset.index));
      });
    });

// Modal video sobre nosotros
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const videoModal = document.getElementById('videoModal');
    const youtubeVideo = document.getElementById('youtubeVideo');

    openModalBtn.addEventListener('click', () => {
      youtubeVideo.src = "https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1"; //video
      videoModal.classList.remove('hidden');
      videoModal.setAttribute('aria-hidden', 'false');
    });

    closeModalBtn.addEventListener('click', () => {
      youtubeVideo.src = "";
      videoModal.classList.add('hidden');
      videoModal.setAttribute('aria-hidden', 'true');
    });

// Close modal on outside click
    videoModal.addEventListener('click', (e) => {
      if (e.target === videoModal) {
        youtubeVideo.src = "";
        videoModal.classList.add('hidden');
        videoModal.setAttribute('aria-hidden', 'true');
      }
    });

//Carrusel de especialidades
const carousel = document.getElementById('carousel');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');

prevBtn.addEventListener('click', () => {
 carousel.scrollBy({ left: -carousel.offsetWidth, behavior: 'smooth' });
});

nextBtn.addEventListener('click', () => {
 carousel.scrollBy({ left: carousel.offsetWidth, behavior: 'smooth' });
});
