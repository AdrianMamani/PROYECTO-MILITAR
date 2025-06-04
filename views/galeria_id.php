<html lang="es">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Logro Individual
  </title>
  <script crossorigin="anonymous" src="https://kit.fontawesome.com/a076d05399.js">
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
      font-family: "Montserrat", sans-serif;
      background-color: #f9fafb;
      color: #1e293b;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 900px;
      margin: 1rem auto 2rem;
      padding: 10px 20px
    }
    h1, h2, h3 {
      color:rgb(8, 99, 0);
      margin-bottom: 1rem;
    }
    h1 {
      font-size: 2rem !important;
      font-weight: 800 !important;
      text-align: center !important;
      margin-bottom: 2rem !important;
    }
    h2 {
      font-size: 1.3rem !important;
      font-weight: 700 !important;
      margin-bottom: 0.5rem !important;
    }
    h3 {
      font-size: 1.5rem !important;
      font-weight: 600 !important;
      margin-bottom: 1rem !important;
    }
    p {
      font-size: 1.125rem ;
      line-height: 1.6 ;
      margin-bottom: 1.5rem ;
      color: #334155 ;
    }
    /* Carousel */
    .carousel-container {
      position: relative;
      overflow: hidden;
      width: 100%;
      margin-bottom: 2.5rem;
    }
    .carousel-track {
      display: flex;
      transition: transform 0.4s ease-in-out;
      will-change: transform;
    }
    .carousel-slide {
      min-width: 33.3333%;
      box-sizing: border-box;
      padding: 0 0.5rem;
      user-select: none;
    }
    .carousel-slide img {
      width: 100%;
      height: 14rem;
      object-fit: cover;
      border-radius: 0.5rem;
      display: block;
      box-shadow: 0 4px 6px rgb(0 0 0 / 0.1);
    }
    .carousel-button {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background-color: rgba(0, 100, 23, 0.8);
      color: white;
      border: none;
      padding: 0.5rem 0.75rem;
      border-radius: 9999px;
      cursor: pointer;
      z-index: 20;
      transition: background-color 0.3s ease;
      font-size: 1.5rem;
      line-height: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 2px 6px rgba(0,0,0,0.3);
    }
    .carousel-button:hover:not(:disabled) {
      background-color: rgba(31, 168, 13, 0.9);
    }
    .carousel-button:disabled {
      background-color: rgba(0, 135, 2, 0.4);
      cursor: default;
    }
    .carousel-button.prev {
      left: 0.5rem;
    }
    .carousel-button.next {
      right: 0.5rem;
    }
    /* Video */
    .video-wrapper {
      position: relative;
      width: 100%;
      padding-bottom: 35%;
      margin-bottom: 2.5rem;
      border-radius: 0.5rem;
      overflow: hidden;
      box-shadow: 0 4px 6px rgb(0 0 0 / 0.1);
    }
    .video-wrapper iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border: 0;
    }
    /* Comments */
    .comments-section {
      border-top: 1px solid #cbd5e1;
      padding-top: 2rem;
    }
    .comments-section h3 {
      margin-bottom: 1.5rem;
    }
    form.comment-form {
      margin-bottom: 2rem;
    }
    .form-row {
      display: flex;
      align-items: flex-start;
      margin-bottom: 1rem;
    }
    .form-row label {
      width: 80px;
      font-weight: 600;
      color: #475569;
      padding-top: 0.5rem;
    }
    .form-row input,
    .form-row textarea {
      flex: 1;
      padding: 0.5rem 0.75rem;
      border: 1px solid #cbd5e1;
      border-radius: 0.5rem;
      font-size: 1rem;
      font-family: inherit;
      resize: none;
      transition: border-color 0.3s ease;
      margin-left: 20px
    }
    .form-row input:focus,
    .form-row textarea:focus {
      outline: none;
      border-color: #4f46e5;
      box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.3);
    }
    .form-row textarea {
      min-height: 80px;
    }
    .form-actions {
      text-align: right;
    }
    .form-actions button {
      background-color:rgb(0, 85, 7);
      color: white;
      border: none;
      padding: 0.5rem 1.25rem;
      border-radius: 0.5rem;
      font-weight: 700;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .form-actions button:hover {
      background-color:rgb(4, 131, 0);
    }
    /* Comment list */
    ul.comment-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    ul.comment-list li {
      display: flex;
      gap: 1rem;
      margin-bottom: 1.5rem;
    }
    ul.comment-list li img.avatar {
      width: 48px;
      height: 48px;
      border-radius: 9999px;
      object-fit: cover;
      flex-shrink: 0;
      box-shadow: 0 0 0 2px rgb(1, 81, 0);
    }
    .comment-content {
      background-color: #f1f5f9;
      border-radius: 0.5rem;
      padding: 1rem;
      flex: 1;
      box-shadow: 0 1px 3px rgb(0 0 0 / 0.1);
    }
    .comment-header {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      margin-bottom: 0.5rem;
    }
    .comment-header strong {
      color:rgb(0, 97, 2);
      font-weight: 700;
    }
    .comment-header time {
      color: #64748b;
      font-size: 0.875rem;
    }
    .comment-text {
      color: #334155;
      line-height: 1.4;
    }
    .comment-actions {
      margin-top: 0.75rem;
      display: flex;
      gap: 1.5rem;
      font-size: 0.875rem;
      color: #64748b;
      user-select: none;
    }
    .comment-actions button {
      background: none;
      border: none;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 0.25rem;
      color: inherit;
      transition: color 0.3s ease;
      font-family: inherit;
    }
    .comment-actions button:hover {
      color: #4f46e5;
    }
    .comment-actions i {
      font-size: 1rem;
    }
  </style>
 </head>
   <?php
include 'layout/header.php';
?>
 <body>
  <main class="container" role="main">
   <h1>
    Logro Individual
   </h1>

    <header>
     <h2>
      Premio Nacional de Innovación Tecnológica 2023
     </h2>
     <p>
      Recibí el Premio Nacional de Innovación Tecnológica 2023 por desarrollar un sistema inteligente de gestión energética que reduce el consumo en edificios comerciales hasta en un 30%.
     </p>
    </header>
    <article>
    <!-- Carousel -->
    <section aria-label="Galería de fotos del logro" class="carousel-container">
     <button aria-label="Anterior" class="carousel-button prev" disabled="" id="prevBtn" type="button">
      <i class="fas fa-chevron-left">
      </i>
     </button>
     <div class="carousel-track" id="carouselTrack">
      <div class="carousel-slide">
       <img alt="Trofeo dorado del Premio Nacional de Innovación Tecnológica 2023 sobre pedestal con fondo neutro" height="336" loading="lazy" src="https://storage.googleapis.com/a1aa/image/0332bccd-1e8b-4b98-e12e-bb0c36dff125.jpg" width="600"/>
      </div>
      <div class="carousel-slide">
       <img alt="Pantalla de computadora mostrando gráficos y datos del sistema inteligente de gestión energética en un edificio comercial" height="336" loading="lazy" src="https://storage.googleapis.com/a1aa/image/f28c641b-99ca-44fb-cd4f-0e8caa840ad2.jpg" width="600"/>
      </div>
      <div class="carousel-slide">
       <img alt="Detalle de circuito electrónico del sistema inteligente de gestión energética" height="336" loading="lazy" src="https://storage.googleapis.com/a1aa/image/c80db3d3-0dd4-484c-51c5-ef883de6927e.jpg" width="600"/>
      </div>
      <div class="carousel-slide">
       <img alt="Ingeniero ajustando sensores en un edificio para el sistema de gestión energética" height="336" loading="lazy" src="https://storage.googleapis.com/a1aa/image/b03694a6-4193-4051-971d-fde6927a6221.jpg" width="600"/>
      </div>
      <div class="carousel-slide">
       <img alt="Gráficos de ahorro energético en pantalla digital" height="336" loading="lazy" src="https://storage.googleapis.com/a1aa/image/d9d03784-06eb-4c4b-e9cd-1696ad73af40.jpg" width="600"/>
      </div>
      <div class="carousel-slide">
       <img alt="Edificio comercial con paneles solares en el techo" height="336" loading="lazy" src="https://storage.googleapis.com/a1aa/image/4e1b2c1b-9133-471a-2386-5396eac26ff5.jpg" width="600"/>
      </div>
     </div>
     <button aria-label="Siguiente" class="carousel-button next" id="nextBtn" type="button">
      <i class="fas fa-chevron-right">
      </i>
     </button>
    </section>
    <!-- Video -->
    <section aria-label="Video del logro" class="video-wrapper">
     <iframe allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" src="https://www.youtube.com/embed/6XcQ6v6q3xk" title="Video explicativo del sistema inteligente de gestión energética premiado">
     </iframe>
    </section>
    <!-- Comments -->
    <section aria-label="Sección de comentarios" class="comments-section">
     <h3>
      Comentarios
     </h3>
     <form class="comment-form" id="comment-form" novalidate="">
      <div class="form-row">
       <label for="name-input">
        Nombre
       </label>
       <input id="name-input" name="name" placeholder="Tu nombre" required="" type="text"/>
      </div>
      <div class="form-row">
       <label for="comment-input">
        Comentario
       </label>
       <textarea id="comment-input" name="comment" placeholder="Escribe un comentario..." required="" rows="3"></textarea>
      </div>
      <div class="form-actions">
       <button type="submit">
        Publicar
       </button>
      </div>
     </form>
     <ul class="comment-list" id="comments-list">
      <li>
       <img alt="Avatar de Ana" class="avatar" height="48" loading="lazy" src="https://storage.googleapis.com/a1aa/image/530194bd-15ca-4cf0-994e-7ad4b153c8a0.jpg" width="48"/>
       <div class="comment-content">
        <div class="comment-header">
         <strong>
          Ana
         </strong>
         <time>
          Hace 2 horas
         </time>
        </div>
        <p class="comment-text">
         ¡Increíble logro! Este sistema puede cambiar la forma en que gestionamos la energía. Felicidades.
        </p>
        <div class="comment-actions">
         <button type="button">
          <i class="far fa-thumbs-up">
          </i>
          <span>
           Me gusta
          </span>
         </button>
         <button type="button">
          <i class="far fa-comment">
          </i>
          <span>
           Responder
          </span>
         </button>
        </div>
       </div>
      </li>
      <li>
       <img alt="Avatar de Carlos" class="avatar" height="48" loading="lazy" src="https://storage.googleapis.com/a1aa/image/f5f36170-9386-4d82-3775-c55e1adb92e6.jpg" width="48"/>
       <div class="comment-content">
        <div class="comment-header">
         <strong>
          Carlos
         </strong>
         <time>
          Hace 1 día
         </time>
        </div>
        <p class="comment-text">
         Este premio es más que merecido. La innovación es el futuro y tú estás liderando el camino.
        </p>
        <div class="comment-actions">
         <button type="button">
          <i class="far fa-thumbs-up">
          </i>
          <span>
           Me gusta
          </span>
         </button>
         <button type="button">
          <i class="far fa-comment">
          </i>
          <span>
           Responder
          </span>
         </button>
        </div>
       </div>
      </li>
     </ul>
    </section>
   </article>
  </main>
  <script>
   (function () {
      const track = document.getElementById("carouselTrack");
      const prevBtn = document.getElementById("prevBtn");
      const nextBtn = document.getElementById("nextBtn");
      const slides = Array.from(track.children);
      let slideWidth = slides[0].getBoundingClientRect().width;
      let currentIndex = 0;

      function setSlidePositions() {
        slideWidth = slides[0].getBoundingClientRect().width;
        slides.forEach((slide, index) => {
          slide.style.left = slideWidth * index + "px";
        });
      }

      function moveToSlide(index) {
        const maxIndex = slides.length - 3;
        if (index < 0) index = 0;
        if (index > maxIndex) index = maxIndex;
        currentIndex = index;
        track.style.transform = `translateX(-${slideWidth * currentIndex}px)`;
        prevBtn.disabled = currentIndex === 0;
        nextBtn.disabled = currentIndex === maxIndex;
      }

      prevBtn.addEventListener("click", () => {
        moveToSlide(currentIndex - 1);
      });

      nextBtn.addEventListener("click", () => {
        moveToSlide(currentIndex + 1);
      });

      window.addEventListener("resize", () => {
        setSlidePositions();
        moveToSlide(currentIndex);
      });

      setSlidePositions();
      moveToSlide(0);

      // Comments functionality
      const commentForm = document.getElementById("comment-form");
      const nameInput = document.getElementById("name-input");
      const commentInput = document.getElementById("comment-input");
      const commentsList = document.getElementById("comments-list");

      function createComment(name, text) {
        const li = document.createElement("li");
        li.style.display = "flex";
        li.style.gap = "1rem";
        li.style.marginBottom = "1.5rem";

        const firstLetter = name.charAt(0).toUpperCase();
        const avatarUrl = `https://placehold.co/48x48/png?text=${firstLetter}`;

        const avatarImg = document.createElement("img");
        avatarImg.src = avatarUrl;
        avatarImg.alt = `Avatar de ${name}`;
        avatarImg.width = 48;
        avatarImg.height = 48;
        avatarImg.loading = "lazy";
        avatarImg.className = "avatar";

        const commentDiv = document.createElement("div");
        commentDiv.className = "comment-content";

        const headerDiv = document.createElement("div");
        headerDiv.className = "comment-header";

        const h4 = document.createElement("strong");
        h4.textContent = name;

        const timeSpan = document.createElement("time");
        timeSpan.textContent = "Justo ahora";

        headerDiv.appendChild(h4);
        headerDiv.appendChild(timeSpan);

        const p = document.createElement("p");
        p.className = "comment-text";
        p.textContent = text;

        const actionsDiv = document.createElement("div");
        actionsDiv.className = "comment-actions";

        const likeBtn = document.createElement("button");
        likeBtn.type = "button";
        likeBtn.className = "like-button";
        likeBtn.innerHTML = '<i class="far fa-thumbs-up"></i> <span>Me gusta</span>';
        likeBtn.style.cursor = "pointer";
        likeBtn.addEventListener("click", () => {
          if (likeBtn.classList.contains("liked")) {
            likeBtn.classList.remove("liked");
            likeBtn.style.color = "";
            likeBtn.querySelector("i").className = "far fa-thumbs-up";
          } else {
            likeBtn.classList.add("liked");
            likeBtn.style.color = "#4f46e5";
            likeBtn.querySelector("i").className = "fas fa-thumbs-up";
          }
        });

        const replyBtn = document.createElement("button");
        replyBtn.type = "button";
        replyBtn.className = "reply-button";
        replyBtn.innerHTML = '<i class="far fa-comment"></i> <span>Responder</span>';
        replyBtn.style.cursor = "pointer";

        actionsDiv.appendChild(likeBtn);
        actionsDiv.appendChild(replyBtn);

        commentDiv.appendChild(headerDiv);
        commentDiv.appendChild(p);
        commentDiv.appendChild(actionsDiv);

        li.appendChild(avatarImg);
        li.appendChild(commentDiv);

        return li;
      }

      commentForm.addEventListener("submit", (e) => {
        e.preventDefault();
        const name = nameInput.value.trim();
        const text = commentInput.value.trim();
        if (!name || !text) return;

        const newComment = createComment(name, text);
        commentsList.appendChild(newComment);
        commentForm.reset();
        nameInput.focus();

        newComment.scrollIntoView({ behavior: "smooth" });
      });
    })();
  </script>
 </body>
 <?php include 'layout/footer.php'?>
</html>