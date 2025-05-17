// Funcionalidad para el carrusel de usuarios
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM cargado - Inicializando carrusel');
    
    // Seleccionar elementos del carrusel
    const track = document.querySelector('.carrusel-track');
    const prevButton = document.querySelector('.boton-prev');
    const nextButton = document.querySelector('.boton-next');
    const cards = document.querySelectorAll('.tarjeta-carrusel');
    
    // Verificar que todos los elementos existen
    if (!track) {
        console.error('No se encontró el elemento .carrusel-track');
        return;
    }
    
    if (!prevButton) {
        console.error('No se encontró el elemento .boton-prev');
        return;
    }
    
    if (!nextButton) {
        console.error('No se encontró el elemento .boton-next');
        return;
    }
    
    if (cards.length === 0) {
        console.error('No se encontraron tarjetas en el carrusel');
        return;
    }
    
    console.log(`Carrusel inicializado con ${cards.length} tarjetas`);
    // Calcular el ancho de desplazamiento (ancho de tarjeta + gap)
    const cardWidth = cards[0].offsetWidth;
    const gap = 20; // Debe coincidir con el gap en CSS
    const scrollAmount = cardWidth + gap;
    
    console.log(`Ancho de tarjeta: ${cardWidth}px, Gap: ${gap}px, Desplazamiento: ${scrollAmount}px`);
    
    // Botón para desplazarse a la izquierda
    prevButton.addEventListener('click', function() {
        console.log('Botón previo clickeado');
        track.scrollBy({
            left: -scrollAmount,
            behavior: 'smooth'
        });
    });
    
    // Botón para desplazarse a la derecha
    nextButton.addEventListener('click', function() {
        console.log('Botón siguiente clickeado');
        track.scrollBy({
            left: scrollAmount,
            behavior: 'smooth'
        });
    });
    
    // Interactividad para los iconos de corazón
    const heartIcons = document.querySelectorAll('.iconos-accion .fa-heart');
    heartIcons.forEach(icon => {
        icon.addEventListener('click', function() {
            console.log('Corazón clickeado');
            this.classList.toggle('far');
            this.classList.toggle('fas');
            this.classList.toggle('liked');
            
            if (this.classList.contains('liked')) {
                this.style.color = '#ed4956'; // Rojo cuando está liked
            } else {
                this.style.color = ''; // Volver al color original
            }
        });
    });
    
    // Añadir funcionalidad al botón "Ver Más"
    const verMasBtn = document.querySelector('.boton-ver-mas');
    if (verMasBtn) {
        verMasBtn.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Botón Ver Más clickeado');
            // Aquí puedes añadir la funcionalidad que desees
            alert('¡Próximamente más contenido!');
});
    }
});