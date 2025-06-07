console.log("Prueba");
document.addEventListener("DOMContentLoaded", function () {
  const chat = document.getElementById("chatFormulario");
  document.getElementById("btnAbrirChat").addEventListener("click", () => {
    console.log("Click");
    chat.style.display = "block";
  });

  const cerrarBtn = document.getElementById("btnCerrarChat");

  cerrarBtn.addEventListener("click", () => {
    chat.style.display = "none";
  });
  const swiper2 = new Swiper(".comentarios-swiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    grabCursor: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      640: {
        slidesPerView: 1.2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
  });
});

