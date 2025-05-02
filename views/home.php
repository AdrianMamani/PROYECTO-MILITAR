<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Carrusel Promoción</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
    }

    .carrusel {
      position: relative;
      width: 100%;
      height: 60vh;
      overflow: hidden;
    }

    .slide {
      position: absolute;
      width: 100%;
      height: 100%;
      background-color: #333; /* Fondo gris por si no hay imagen */
      opacity: 0;
      transition: opacity 1s ease-in-out;
      display: flex;
      justify-content: flex-start;
      align-items: center;
      flex-direction: column;
      color: white;
      text-align: center;
    }

    .slide.active {
      opacity: 1;
      z-index: 1;
    }

    .titulo {
      font-size: 3em;
      font-weight: bold;
      letter-spacing: 2px;
      margin-top: 40vh; /* Baja el texto */
    }

    .descripcion {
      font-size: 1.4em;
      margin-top: 10px;
    }

    .boton {
      margin-top: 15px;
      background: yellow;
      color: black;
      font-weight: bold;
      padding: 8px 20px;
      border-radius: 30px;
      text-decoration: none;
      font-size: 1em;
    }
  </style>
</head>
<body>
<div class="carrusel">
    <?php foreach ($carruselItems as $index => $item): ?>
        <div class="slide <?= $index === 0 ? 'active' : '' ?>">
            <div class="titulo"><?= htmlspecialchars($item['titulo']) ?></div>
            <div class="descripcion"><?= htmlspecialchars($item['descripcion']) ?></div>
            <a href="#" class="boton">VER MÁS</a>
        </div>
    <?php endforeach; ?>
</div>>

  <script>
    let current = 0;
const slides = document.querySelectorAll('.slide');

// Verifica si existen slides
if (slides.length > 0) {
    setInterval(() => {
        slides[current].classList.remove('active');
        current = (current + 1) % slides.length;
        slides[current].classList.add('active');
    }, 4000);
} else {
    console.error("No slides found in the DOM");
}

  </script>
</body>
</html>