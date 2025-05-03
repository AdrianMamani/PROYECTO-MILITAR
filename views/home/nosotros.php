<!-- views/home/index.php -->
<!DOCTYPE html>
<html>

<body>
    <section class="sobre-nosotros">
    <div class="carousel-wrapper">
        <div class="carousel-container"></div>
        <div class="carousel-dots"></div>
    </div>
        <div class="sobre-texto">
            <h2>Sobre Nosotros</h2>
            <p>
                En 1986, un grupo de jóvenes inició su formación militar con el nombre de Cabo Alberto Reyes Gamarra,
                destacándose por su disciplina, entrega y espíritu de hermandad. Durante su entrenamiento, enfrentaron
                desafíos físicos y mentales, fortaleciendo sus habilidades y compromiso con la institución. Su preparación rigurosa
                los convirtió en soldados ejemplares, listos para cumplir con honor su deber.
            </p>
            <div class="botones">
                <button class="boton-leer">Leer más</button>
                <button class="boton-play" aria-label="Reproducir"></button>
            </div>
        </div>
    </section>
</body>

<script>
  const images = [
    "./views/assets/img/nosotros/image1.png",
    "./views/assets/img/nosotros/image2.png",
    "./views/assets/img/nosotros/image3.png",
    "./views/assets/img/nosotros/image4.png",
  ];

  const carouselContainer = document.querySelector(".carousel-container");
  const dotsContainer = document.querySelector(".carousel-dots");

  images.forEach((image, index) => {
    const img = document.createElement("img");
    img.src = image;
    img.classList.add("carousel-slide");
    if (index === 0) img.classList.add("active");
    carouselContainer.appendChild(img);

    const dot = document.createElement("span");
    dot.classList.add("dot");
    if (index === 0) dot.classList.add("active"); 
    dot.onclick = () => goToSlide(index); 
    dotsContainer.appendChild(dot);
  });

  let currentSlide = 0;
  const slides = document.querySelectorAll(".carousel-slide");
  const dots = document.querySelectorAll(".dot");

  function showSlide(index) {
    slides.forEach((slide, i) => {
      slide.classList.toggle("active", i === index);
      dots[i].classList.toggle("active", i === index);
    });
    currentSlide = index;
  }

  function nextSlide() {
    let next = (currentSlide + 1) % slides.length;
    showSlide(next);
  }

  function goToSlide(index) {
    showSlide(index);
  }

  setInterval(nextSlide, 4000); 
</script>

<style>
  .sobre-texto {
    flex:1;
    max-width: 600px;

  }

  .sobre-texto h2 {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 1rem;
  }

  .sobre-texto p {
    font-size: 1.2rem;
    line-height: 1.6;
    margin-bottom: 1.5rem;
  }

  .botones {
    display: flex;
    gap: 1rem;
  }

  .boton-leer {
    background-color: #00c800;
    color: white;
    padding: 0.75rem 3rem;
    border-radius: 999px;
    border: none;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .boton-leer:hover {
    background-color: #00a000;
  }

  .boton-play {
    background-color: #00c800;
    border: none;
    border-radius: 50%;
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .boton-play::before {
    content: '▶';
    color: white;
    font-size: 20px;
    padding-left: 2px;
  }

  .boton-play:hover {
    background-color: #00a000;
  }

  .sobre-nosotros{
    display: flex;
    justify-content: center; 
    align-items: start;
    max-width: 1600px;
    margin-inline: auto;
    padding: 2rem;
    gap: 2.5rem;
  }

  .carousel-wrapper {
      flex: 1;
      max-width: 600px;
    
  }

  .carousel-container {
      position: relative;
      aspect-ratio:3/2;
      overflow: hidden;
  
  }

  .carousel-slide {
    width: 100%;
    height: 100%;
    object-fit: cover; 
    position: absolute;
    top: 0;
    left: 0;
    display: none;
  }

  .carousel-slide.active {
    display: block;
  }

  .carousel-dots {
    text-align: center;
    margin-top: 20px;
  }

  .dot {
      height: 15px;
      width: 15px;
      margin: 0 5px;
      background-color: #bbb;
      border-radius: 50%;
        display: inline-block;
      transition: background-color 0.3s;
      cursor: pointer;
  }

  .dot.active {
      background-color: #00A724;
  }
</style>
</html>
