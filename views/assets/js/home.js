// carrusel

document.addEventListener('DOMContentLoaded', () => {
    const carruselPrincipal = document.querySelector('.carrusel-principal');
    if (!carruselPrincipal) {
        console.warn('Contenedor del carrusel no encontrado.');
        return; // Salir si no hay carrusel en la página
    }
  
    const slides = carruselPrincipal.querySelectorAll('.carrusel-slide');
    const btnPrev = carruselPrincipal.querySelector('.carrusel-control.prev');
    const btnNext = carruselPrincipal.querySelector('.carrusel-control.next');
    const indicadoresContainer = carruselPrincipal.querySelector('.carrusel-indicadores');
    const dots = indicadoresContainer ? indicadoresContainer.querySelectorAll('.indicador-dot') : [];
  
    let currentSlideIndex = 0;
    let autoplayInterval = null;
    const AUTOPLAY_DELAY = 5000; // 5 segundos para cambio automático
  
    if (slides.length <= 1) {
        // Si hay 0 o 1 slide, no necesitamos controles ni autoplay
        if (btnPrev) btnPrev.style.display = 'none';
        if (btnNext) btnNext.style.display = 'none';
        if (indicadoresContainer) indicadoresContainer.style.display = 'none';
        // Asegurarse que el único slide (si existe) esté activo
        if (slides.length === 1 && !slides[0].classList.contains('active')) {
            slides[0].classList.add('active');
        }
        return;
    }
  
    function mostrarSlide(index) {
        // Validar índice
        if (index >= slides.length) {
            index = 0;
        } else if (index < 0) {
            index = slides.length - 1;
        }
  
        // Ocultar todos los slides y desactivar dots
        slides.forEach(slide => slide.classList.remove('active'));
        if (dots.length > 0) {
            dots.forEach(dot => dot.classList.remove('active'));
        }
  
        // Mostrar el slide y dot correctos
        slides[index].classList.add('active');
        if (dots.length > 0 && dots[index]) {
            dots[index].classList.add('active');
        }
  
        currentSlideIndex = index;
    }
  
    function siguienteSlide() {
        mostrarSlide(currentSlideIndex + 1);
    }
  
    function anteriorSlide() {
        mostrarSlide(currentSlideIndex - 1);
    }
  
    // Event Listeners para botones
    if (btnNext) {
        btnNext.addEventListener('click', () => {
            siguienteSlide();
            resetAutoplay(); // Reiniciar autoplay si se interactúa manualmente
        });
    }
  
    if (btnPrev) {
        btnPrev.addEventListener('click', () => {
            anteriorSlide();
            resetAutoplay(); // Reiniciar autoplay
        });
    }
  
    // Event Listeners para indicadores (dots)
    if (dots.length > 0) {
        dots.forEach(dot => {
            dot.addEventListener('click', (e) => {
                const slideIndex = parseInt(e.target.dataset.slideTo);
                if (!isNaN(slideIndex)) {
                    mostrarSlide(slideIndex);
                    resetAutoplay(); // Reiniciar autoplay
                }
            });
        });
    }
  
    // Autoplay
    function startAutoplay() {
        if (autoplayInterval) clearInterval(autoplayInterval); // Limpiar intervalo existente
        autoplayInterval = setInterval(siguienteSlide, AUTOPLAY_DELAY);
    }
  
    function stopAutoplay() {
        clearInterval(autoplayInterval);
        autoplayInterval = null;
    }
  
    function resetAutoplay() {
        stopAutoplay();
        startAutoplay();
    }
  
    // Pausar en hover, reanudar al salir
    carruselPrincipal.addEventListener('mouseenter', stopAutoplay);
    carruselPrincipal.addEventListener('mouseleave', startAutoplay);
  
    // Inicializar el carrusel
    mostrarSlide(currentSlideIndex); // Asegura que el primer slide se muestre correctamente
    startAutoplay(); // Iniciar autoplay
  });
  