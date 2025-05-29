<html lang="es">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Galería con Modal estilo Instagram
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   /* Reset and base */
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      background-color: white;
      color: black;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI",
        Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji",
        "Segoe UI Emoji";
      min-height: 100vh;
      padding: 4rem 1rem 6rem;
    }
    /* Section container without shadow or border */
    section#gallerySection {
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      align-items: center;
      color: black;
    }
    /* Icon button */
    #openModalBtn {
      color: #fbbf24; /* yellow-400 */
      background-color: transparent;
      border: none;
      cursor: pointer;
      display: flex;
      flex-direction: column;
      align-items: center;
      transition: color 0.3s ease;
      margin-bottom: 1rem;
      font-size: 4rem;
      outline-offset: 2px;
    }
    #openModalBtn:hover,
    #openModalBtn:focus {
      color: #b45309; /* yellow-700 */
      outline: 2px solid #b45309;
      outline-offset: 4px;
    }
    #openModalBtn span {
      margin-top: 0.5rem;
      font-weight: 600;
      font-size: 1.25rem;
      color: black;
    }
    /* Gallery grid */
    #galleryGrid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
      grid-auto-rows: 100px;
      gap: 8px;
      width: 100%;
    }
    /* Different sizes for photos */
    #galleryGrid img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 6px;
      cursor: pointer;
      transition: transform 0.3s ease;
      display: block;
    }
    #galleryGrid img:hover,
    #galleryGrid img:focus {
      transform: scale(1.05);
      z-index: 10;
      position: relative;
      outline: none;
    }
    /* Some photos bigger */
    #galleryGrid img.size-2x {
      grid-column: span 2;
      grid-row: span 2;
    }
    #galleryGrid img.size-2x-wide {
      grid-column: span 2;
      grid-row: span 1;
    }
    #galleryGrid img.size-2x-tall {
      grid-column: span 1;
      grid-row: span 2;
    }
    /* Modal backdrop blur */
    #modalBackdrop {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.4);
      backdrop-filter: blur(8px);
      -webkit-backdrop-filter: blur(8px);
      z-index: 9998;
      display: none;
    }
    /* Modal styles */
    #modal {
      position: fixed;
      inset: 0;
      display: none;
      align-items: center;
      justify-content: center;
      z-index: 9999;
      overflow: auto;
      padding: 1rem;
    }
    #modalContent {
      background-color: #000;
      border-radius: 8px;
      max-width: 1200px;
      width: 100%;
      max-height: 90vh;
      display: flex;
      overflow: hidden;
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.7);
    }
    /* Left: Carousel half width */
    #carouselContainer {
      width: 50%;
      position: relative;
      background-color: black;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }
    #carouselImage {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }
    /* Carousel controls */
    .carouselBtn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(0, 0, 0, 0.5);
      border-radius: 9999px;
      padding: 0.5rem;
      color: white;
      cursor: pointer;
      transition: background 0.3s ease;
      border: none;
      font-size: 1.25rem;
      display: flex;
      align-items: center;
      justify-content: center;
      user-select: none;
      outline-offset: 2px;
    }
    .carouselBtn:hover,
    .carouselBtn:focus {
      background: rgba(0, 0, 0, 0.8);
      outline: none;
    }
    #prevBtn {
      left: 1rem;
    }
    #nextBtn {
      right: 1rem;
    }
    /* Right: Description and comments half width */
    #modalRight {
      width: 50%;
      background-color: black;
      border-left: 1px solid #2d2d2d;
      display: flex;
      flex-direction: column;
      color: white;
    }
    #modalHeader {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      padding: 1rem;
      border-bottom: 1px solid #2d2d2d;
      flex-shrink: 0;
    }
    #modalHeader img {
      width: 40px;
      height: 40px;
      border-radius: 9999px;
      border: 2px solid #ec4899; /* pink-500 */
      object-fit: cover;
      flex-shrink: 0;
    }
    #modalHeader .userInfo {
      display: flex;
      flex-direction: column;
      font-size: 0.875rem;
    }
    #modalHeader .userInfo span:first-child {
      font-weight: 700;
      color: white;
    }
    #modalHeader .userInfo span:last-child {
      color: #9ca3af; /* gray-400 */
      font-size: 0.75rem;
    }
    #modalHeader button.followBtn {
      margin-left: auto;
      color: #3b82f6; /* blue-500 */
      font-weight: 600;
      font-size: 0.75rem;
      background: none;
      border: none;
      cursor: pointer;
      padding: 0;
      transition: text-decoration 0.3s ease;
      outline-offset: 2px;
    }
    #modalHeader button.followBtn:hover,
    #modalHeader button.followBtn:focus {
      text-decoration: underline;
      outline: none;
    }
    #modalHeader button.closeBtn {
      margin-left: 0.5rem;
      background: none;
      border: none;
      color: white;
      font-size: 1.25rem;
      cursor: pointer;
      transition: color 0.3s ease;
      outline-offset: 2px;
    }
    #modalHeader button.closeBtn:hover,
    #modalHeader button.closeBtn:focus {
      color: #ec4899; /* pink-500 */
      outline: none;
    }
    #modalCaption {
      padding: 1rem;
      border-bottom: 1px solid #2d2d2d;
      font-size: 0.875rem;
      flex-shrink: 0;
    }
    #modalCaption a {
      color: #3b82f6;
      text-decoration: none;
      font-weight: 600;
    }
    #modalCaption a:hover,
    #modalCaption a:focus {
      text-decoration: underline;
      outline: none;
    }
    #commentsContainer {
      flex-grow: 1;
      overflow-y: auto;
      padding: 1rem;
      font-size: 0.875rem;
      scrollbar-width: none;
    }
    #commentsContainer::-webkit-scrollbar {
      display: none;
    }
    .comment {
      margin-bottom: 1rem;
    }
    .comment .commentHeader {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      margin-bottom: 0.25rem;
    }
    .comment .commentHeader img {
      width: 28px;
      height: 28px;
      border-radius: 9999px;
      object-fit: cover;
      flex-shrink: 0;
    }
    .comment .commentHeader .username {
      font-weight: 700;
      color: white;
    }
    .comment .commentText {
      color: #d1d5db; /* gray-300 */
    }
    #modalFooter {
      border-top: 1px solid #2d2d2d;
      padding: 1rem;
      flex-shrink: 0;
    }
    #modalFooter .actions {
      display: flex;
      gap: 1rem;
      font-size: 1.5rem;
      color: white;
      margin-bottom: 0.5rem;
    }
    #modalFooter .actions button {
      background: none;
      border: none;
      cursor: pointer;
      color: inherit;
      transition: color 0.3s ease;
      outline-offset: 2px;
    }
    #modalFooter .actions button:hover,
    #modalFooter .actions button:focus {
      color: #ec4899; /* pink-500 */
      outline: none;
    }
    #modalFooter .likes {
      font-weight: 700;
      margin-bottom: 0.25rem;
    }
    #modalFooter .date {
      font-size: 0.75rem;
      color: #9ca3af; /* gray-400 */
      margin-bottom: 0.5rem;
    }
    #modalFooter form {
      display: flex;
      gap: 0.5rem;
      align-items: center;
    }
    #modalFooter form button.emojiBtn {
      font-size: 1.5rem;
      background: none;
      border: none;
      color: #9ca3af;
      cursor: pointer;
      transition: color 0.3s ease;
      outline-offset: 2px;
    }
    #modalFooter form button.emojiBtn:hover,
    #modalFooter form button.emojiBtn:focus {
      color: #ec4899;
      outline: none;
    }
    #modalFooter form input[type="text"] {
      flex-grow: 1;
      background: transparent;
      border: none;
      border-bottom: 1px solid #4b5563; /* gray-600 */
      color: white;
      font-size: 0.875rem;
      padding: 0.25rem 0.5rem;
      outline: none;
      transition: border-color 0.3s ease;
    }
    #modalFooter form input[type="text"]::placeholder {
      color: #6b7280; /* gray-500 */
    }
    #modalFooter form input[type="text"]:focus {
      border-color: #ec4899;
      outline: none;
    }
    #modalFooter form button.submitBtn {
      background: none;
      border: none;
      color: #3b82f6; /* blue-500 */
      font-weight: 600;
      font-size: 0.875rem;
      cursor: pointer;
      opacity: 0.5;
      transition: opacity 0.3s ease;
      outline-offset: 2px;
    }
    #modalFooter form button.submitBtn:enabled {
      opacity: 1;
    }
    #modalFooter form button.submitBtn:hover:enabled,
    #modalFooter form button.submitBtn:focus:enabled {
      text-decoration: underline;
      outline: none;
    }
  </style>
 </head>
 <body>
  <section aria-label="Sección galería con icono y modal" id="gallerySection">
   <button aria-controls="modal" aria-haspopup="dialog" aria-label="Abrir galería" id="openModalBtn" title="Abrir galería" type="button">
    <i class="fas fa-trophy">
    </i>
    <span>
     Galería
    </span>
   </button>
   <div aria-label="Galería de fotos" id="galleryGrid">
    <!-- 30 fotos con tamaños variados -->
    <img alt="Foto 1 paisaje" class="size-2x" height="300" src="https://storage.googleapis.com/a1aa/image/d420c71f-ba1e-451d-2b33-57a2e1a80a1b.jpg" width="300"/>
    <img alt="Foto 2 ciudad" height="150" src="https://storage.googleapis.com/a1aa/image/7084a3f7-9a2e-4f75-3ef3-380b61aa4ae9.jpg" width="150"/>
    <img alt="Foto 3 flores" height="150" src="https://storage.googleapis.com/a1aa/image/0852a9e0-a88e-46b2-3fa5-5f16b05313e5.jpg" width="150"/>
    <img alt="Foto 4 playa" class="size-2x-wide" height="150" src="https://storage.googleapis.com/a1aa/image/ffc3ec54-7d66-40a3-2158-d9b3c512ee1e.jpg" width="300"/>
    <img alt="Foto 5 bosque" class="size-2x-tall" height="300" src="https://storage.googleapis.com/a1aa/image/d07a1911-8e89-436b-c398-ea703a40b0aa.jpg" width="150"/>
    <img alt="Foto 6 atardecer" height="150" src="https://storage.googleapis.com/a1aa/image/b5f8573d-51d5-4abe-0b09-e3efca8a076c.jpg" width="150"/>
    <img alt="Foto 7 ciudad nocturna" class="size-2x-wide" height="150" src="https://storage.googleapis.com/a1aa/image/88110771-8c89-4afb-c402-d2bd6990a2ea.jpg" width="300"/>
    <img alt="Foto 8 montaña" height="150" src="https://storage.googleapis.com/a1aa/image/ea6dddd2-6300-4305-9e24-6eeacbbc6020.jpg" width="150"/>
    <img alt="Foto 9 río" height="150" src="https://storage.googleapis.com/a1aa/image/b8d1dd79-a6f8-4c99-e993-e9dbb1921313.jpg" width="150"/>
    <img alt="Foto 10 desierto" class="size-2x" height="300" src="https://storage.googleapis.com/a1aa/image/c0628cfe-5d05-4050-2548-44db080cf4e9.jpg" width="300"/>
    <img alt="Foto 11 lago" height="150" src="https://storage.googleapis.com/a1aa/image/05bc298c-67d5-4919-6a48-f2ae0c8a9905.jpg" width="150"/>
    <img alt="Foto 12 ciudad vieja" height="150" src="https://storage.googleapis.com/a1aa/image/ed833a82-7655-4bb7-e570-35f701420741.jpg" width="150"/>
    <img alt="Foto 13 cascada" class="size-2x-tall" height="300" src="https://storage.googleapis.com/a1aa/image/7652e8e6-c9c1-4968-9918-0216c5ad636d.jpg" width="150"/>
    <img alt="Foto 14 campo" height="150" src="https://storage.googleapis.com/a1aa/image/18449b14-8950-4a71-0a8f-764c65db4568.jpg" width="150"/>
    <img alt="Foto 15 puente" height="150" src="https://storage.googleapis.com/a1aa/image/25cb4377-a7c7-4430-edf9-4b23935af302.jpg" width="150"/>
    <img alt="Foto 16 montaña nevada" class="size-2x" height="300" src="https://storage.googleapis.com/a1aa/image/295442b3-01ae-47b4-6f5c-2a40035228e5.jpg" width="300"/>
    <img alt="Foto 17 playa al atardecer" height="150" src="https://storage.googleapis.com/a1aa/image/7d559da9-b634-4efe-ca84-feced378bb24.jpg" width="150"/>
    <img alt="Foto 18 bosque otoñal" height="150" src="https://storage.googleapis.com/a1aa/image/0860f3f0-b712-423d-9e58-54028d085efa.jpg" width="150"/>
    <img alt="Foto 19 ciudad moderna" class="size-2x-wide" height="150" src="https://storage.googleapis.com/a1aa/image/db73a11a-678a-4352-07c1-fc84ec84f510.jpg" width="300"/>
    <img alt="Foto 20 río con puente" height="150" src="https://storage.googleapis.com/a1aa/image/57418735-7e11-4045-5f41-708b13d0c4b7.jpg" width="150"/>
    <img alt="Foto 21 desierto con dunas" height="150" src="https://storage.googleapis.com/a1aa/image/571f91b8-a65b-4786-bd6a-f392319bd086.jpg" width="150"/>
    <img alt="Foto 22 lago con reflejo" class="size-2x-tall" height="300" src="https://storage.googleapis.com/a1aa/image/e49abef0-6146-4ae5-6f06-968f459f0222.jpg" width="150"/>
    <img alt="Foto 23 ciudad antigua" height="150" src="https://storage.googleapis.com/a1aa/image/8eb5fba0-ad6d-4e9c-13ef-0f7345374e98.jpg" width="150"/>
    <img alt="Foto 24 cascada en bosque" height="150" src="https://storage.googleapis.com/a1aa/image/0a787fdb-c17f-4a61-852b-a171cdc0874f.jpg" width="150"/>
    <img alt="Foto 25 campo verde" class="size-2x" height="300" src="https://storage.googleapis.com/a1aa/image/d57a18d1-36a2-475e-f082-cf48e1ce5f8b.jpg" width="300"/>
    <img alt="Foto 26 puente colgante" height="150" src="https://storage.googleapis.com/a1aa/image/b42e5939-0478-4f6f-5318-0fd62e7cf2c6.jpg" width="150"/>
    <img alt="Foto 27 montaña rocosa" height="150" src="https://storage.googleapis.com/a1aa/image/1cba3329-1e9f-44ad-2db2-574ed94c8d3a.jpg" width="150"/>
    <img alt="Foto 28 playa con palmeras" class="size-2x-wide" height="150" src="https://storage.googleapis.com/a1aa/image/77d981e1-fdb8-4543-e52c-31c59f9aca1e.jpg" width="300"/>
    <img alt="Foto 29 bosque nevado" height="150" src="https://storage.googleapis.com/a1aa/image/16717d42-21d5-4f75-c7aa-611645d3968b.jpg" width="150"/>
    <img alt="Foto 30 ciudad iluminada" height="150" src="https://storage.googleapis.com/a1aa/image/096667af-e41d-4bc2-bab5-25ae07bc1968.jpg" width="150"/>
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
     <section aria-label="Comentarios" id="commentsContainer" tabindex="0">
      <article class="comment">
       <div class="commentHeader">
        <img alt="Perfil andreina01_" height="28" src="https://storage.googleapis.com/a1aa/image/4e378944-d828-4622-1815-eb252d10e781.jpg" width="28"/>
        <span class="username">
         andreina01_
        </span>
       </div>
       <p class="commentText">
        Ella sentía la cuestión rara pero no pensó en irse 😳🥲
       </p>
       <small style="color:#9ca3af;">
        2 días · 2409 Me gusta
       </small>
      </article>
      <article class="comment">
       <div class="commentHeader">
        <img alt="Perfil ettla_mh" height="28" src="https://storage.googleapis.com/a1aa/image/0d5528c6-5e9e-4b6a-0d38-366a7c894c47.jpg" width="28"/>
        <span class="username">
         ettla_mh
        </span>
       </div>
       <p class="commentText">
        😳🥲😳
       </p>
       <small style="color:#9ca3af;">
        2 días · 20 Me gusta
       </small>
      </article>
      <article class="comment">
       <div class="commentHeader">
        <img alt="Perfil kim_dan_chan_o_o" height="28" src="https://storage.googleapis.com/a1aa/image/5378e7a5-315e-4bee-93ee-05d0fbfe2ea4.jpg" style="border: 2px solid #ec4899; border-radius: 9999px;" width="28"/>
        <span class="username">
         kim_dan_chan_o_o
        </span>
       </div>
       <p class="commentText">
        Ella era muy linda
       </p>
       <small style="color:#9ca3af;">
        19 h · 32 Me gusta
       </small>
      </article>
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
       <input aria-label="Añade un comentario" autocomplete="off" id="commentInput" placeholder="Añade un comentario..." type="text"/>
       <button class="submitBtn" disabled="" id="postCommentBtn" type="submit">
        Publicar
       </button>
      </form>
     </footer>
    </div>
   </div>
  </div>
  <script>
   const images = [
      {
        src: "https://placehold.co/600x800/png?text=Imagen+1+de+5",
        alt: "Imagen 1 de 5 en carrusel de galería",
      },
      {
        src: "https://placehold.co/600x800/png?text=Imagen+2+de+5",
        alt: "Imagen 2 de 5 en carrusel de galería",
      },
      {
        src: "https://placehold.co/600x800/png?text=Imagen+3+de+5",
        alt: "Imagen 3 de 5 en carrusel de galería",
      },
      {
        src: "https://placehold.co/600x800/png?text=Imagen+4+de+5",
        alt: "Imagen 4 de 5 en carrusel de galería",
      },
      {
        src: "https://placehold.co/600x800/png?text=Imagen+5+de+5",
        alt: "Imagen 5 de 5 en carrusel de galería",
      },
    ];

    let currentIndex = 0;

    const openModalBtn = document.getElementById("openModalBtn");
    const closeModalBtn = document.getElementById("closeModalBtn");
    const modal = document.getElementById("modal");
    const modalBackdrop = document.getElementById("modalBackdrop");

    const carouselImage = document.getElementById("carouselImage");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const commentInput = document.getElementById("commentInput");
    const postCommentBtn = document.getElementById("postCommentBtn");
    const commentsContainer = document.getElementById("commentsContainer");

    function showModal() {
      modal.style.display = "flex";
      modalBackdrop.style.display = "block";
      document.body.style.overflow = "hidden";
      currentIndex = 0;
      updateCarousel();
      commentInput.value = "";
      postCommentBtn.disabled = true;
      commentInput.focus();
    }

    function hideModal() {
      modal.style.display = "none";
      modalBackdrop.style.display = "none";
      document.body.style.overflow = "";
    }

    openModalBtn.addEventListener("click", showModal);
    closeModalBtn.addEventListener("click", hideModal);
    modalBackdrop.addEventListener("click", hideModal);

    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && modal.style.display === "flex") {
        hideModal();
      }
    });

    prevBtn.addEventListener("click", () => {
      currentIndex = (currentIndex - 1 + images.length) % images.length;
      updateCarousel();
    });

    nextBtn.addEventListener("click", () => {
      currentIndex = (currentIndex + 1) % images.length;
      updateCarousel();
    });

    function updateCarousel() {
      carouselImage.src = images[currentIndex].src;
      carouselImage.alt = images[currentIndex].alt;
    }

    commentInput.addEventListener("input", () => {
      postCommentBtn.disabled = commentInput.value.trim() === "";
    });

    function addComment() {
      const text = commentInput.value.trim();
      if (!text) return;

      const commentDiv = document.createElement("article");
      commentDiv.className = "comment";

      const commentHeader = document.createElement("div");
      commentHeader.className = "commentHeader";

      const userImg = document.createElement("img");
      userImg.src = "https://placehold.co/30x30/png?text=U";
      userImg.alt = "Perfil usuario actual";
      userImg.width = 28;
      userImg.height = 28;
      userImg.style.borderRadius = "9999px";
      userImg.style.objectFit = "cover";

      const userName = document.createElement("span");
      userName.className = "username";
      userName.textContent = "Tú";

      commentHeader.appendChild(userImg);
      commentHeader.appendChild(userName);

      const commentText = document.createElement("p");
      commentText.className = "commentText";
      commentText.textContent = text;

      commentDiv.appendChild(commentHeader);
      commentDiv.appendChild(commentText);

      commentsContainer.insertBefore(commentDiv, commentsContainer.firstChild);

      commentInput.value = "";
      postCommentBtn.disabled = true;
      commentsContainer.scrollTop = 0;
    }
  </script>
 </body>
</html>
