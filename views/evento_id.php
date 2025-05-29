<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Historia de la Promoción</title>
  <style>
    /* Reset y base */
    * {
      box-sizing: border-box;
    }
    #preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: white;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        transition: opacity 0.5s ease;
    }
    
    #preloader img {
        max-width: 300px; /* Ajusta según el tamaño de tu logo */
        width: auto;
        height: auto;
        animation: fadeIn 1s ease;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.9); }
        to { opacity: 1; transform: scale(1); }
    }
    
    body.loaded #preloader {
        opacity: 0;
        pointer-events: none;
    }
    
    /* Ocultar el contenido inicialmente */
    body:not(.loaded) > *:not(#preloader) {
        visibility: hidden;
    }

    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    /* Reset and base */
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #fff;
      color: #000;
    }
    /* Header */
    header {
      background-color:rgb(20, 83, 1);
      padding: 2rem 1rem;
      text-align: center;
    }
    header h1 {
      font-family: "Poppins", sans-serif; /* Aqui cambiar el tipo de letra */
      font-size: 35px; /* Aqui mover el px para hacerlo mas grande */
      font-weight: 600;
      line-height: 38px;
      letter-spacing: 0.1em;
      color: #fff;
      margin: 0;
      text-transform: uppercase;
    }
    h1, h2 {
      font-weight: 900;
      margin: 0 0 8px 0;
    }
    h1 {
      font-size: 25px;
      line-height: 1.2;
    }
    h2 {
      font-size: 26px;
      text-align: center;
      margin-top: 32px;
      margin-bottom: 16px;
    }
    p {
      font-size: 24px;
      line-height: 1.3;
      margin: 0 0 12px 0;
    }
    .titulo-evento {
    text-align: center;
    margin-bottom: 1rem;
          max-width: 1570px;
      margin: auto;
    }

    .titulo-evento h1 {
    font-size: 50px;
    font-weight: bold;
    margin-top: 30px;
    margin-bottom: 15px;
    text-align: initial;
    }

    /* Contenedores de diseño */
    .seccion-superior {
      display: flex;
      flex-direction: column;
      gap: 16px;
      max-width: 1570px;
      margin: auto;
    }
    @media (min-width: 600px) {
      .seccion-superior {
        flex-direction: row;
        align-items: flex-start;
        gap: 24px;
        padding: 10px 100px;
      }
      .contenedor-recuerdos {
        padding: 10px 50px;
    }
    .contenedor-mapa{
      padding: 10px 100px !important; 
    }

    .imagenes-ocultas {
        padding: 10px 50px;
    }
    }
    @media (max-width: 599px) {
    .seccion-superior,
    .titulo-evento {
        padding: 10px 20px;
    }
    }

    .contenido-texto {
      font-size: 12px;
      line-height: 1.3;
      flex: 1;
      padding: 0 120px;
    }
    .contenedor-fecha-imagen {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 300px;
      flex-shrink: 0;
      margin:auto;
    }
    .fecha {
      font-weight: 900;
      font-size: 23px;
      margin-bottom: 8px;
      text-align: end;
    }
    .contenedor-fecha-imagen img {
      width: 230px;
      height: 230px;
      object-fit: cover;
      display: block;
      margin-bottom: 8px;
    }
    .imagen-extra {
      width: 230px;
      height: 230px;
      object-fit: cover;
      display: block;
      margin-top: 0;
    }
    /* Sección video */
    .seccion-video {
      margin-top: 24px;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 12px;
      background-color: rgb(204, 204, 204);
    }
    @media (min-width: 600px) {
      .seccion-video {
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 24px;
      }
    }
    .video-iframe {
      width: 100%;
      max-width: 700px;
      aspect-ratio: 16 / 9;
      border: none;
      padding: 10px;
    }
    .texto-video {
      font-weight: 900;
      font-size: 14px;
      display: flex;
      align-items: center;
      gap: 8px;
      white-space: nowrap;
    }
    .texto-video i {
      font-style: normal;
      border: solid black;
      border-width: 0 3px 3px 0;
      display: inline-block;
      padding: 3px;
      transform: rotate(135deg);
      -webkit-transform: rotate(135deg);
    }
    /* Recuerdos del evento */
.contenedor-recuerdos {
  display: grid;
  grid-template-columns: repeat(3, 1fr); /* 3 columnas fijas */
  gap: 16px;
  padding: 16px 24px;
  justify-items: center;
  max-width: 1200px;
  margin: 0 auto;
}

.contenedor-recuerdos img {
  width: 100%;
  height: 350px;
  object-fit: cover;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.imagenes-ocultas {
  display: none;
  gap: 16px;
  margin-top: 16px;
  padding: 0 24px;
  justify-items: center;
  grid-template-columns: repeat(3, 1fr);
}

.imagenes-ocultas img {
  width: 100%;
  height: 250px;
  object-fit: cover;
  border-radius: 8px;
}

.boton-mostrar-mas {
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 16px auto 0 auto;
  cursor: pointer;
  border: none;
  background: black;
  color: white;
  font-size: 24px;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  box-shadow: 0 2px 6px rgba(0,0,0,0.3);
  transition: transform 0.3s ease;
}

.boton-mostrar-mas:focus {
  outline: 2px solid black;
  outline-offset: 2px;
}

.boton-mostrar-mas.rotado {
  transform: rotate(180deg);
}

/* Responsive: celulares y pantallas pequeñas */
@media (max-width: 960px) {
  .contenedor-recuerdos,
  .imagenes-ocultas {
    grid-template-columns: repeat(2, 1fr); /* Una columna en móviles */
    padding: 0 32px;
  }

  .contenedor-recuerdos img,
  .imagenes-ocultas img {
    height: 300px;
  }
}

@media (max-width: 680px) {
  .contenedor-recuerdos,
  .imagenes-ocultas {
    grid-template-columns: repeat(1, 1fr); /* Una columna en móviles */
    padding: 0 12px;
  }

  .contenedor-recuerdos img,
  .imagenes-ocultas img {
    height: 300px;
    width: 80%;
  }
}

    /* Mapa ubicación */
    .contenedor-mapa {
    display: flex;
    justify-content: center;
    padding: 0 20px;
    }

    .mapa-ubicacion {
    width: 100%;
    max-width: 1000px; /* Tamaño máximo */
    aspect-ratio: 16 / 9;
    border: none;
    margin-bottom: 32px;
    display: block;
    }
  </style>
</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <img src="/PROYECTO-MILITAR/views/assets/img/logo.jpg" alt="Cargando..."> <!-- Cambia por la ruta de tu logo -->
    </div>
    <?php
include 'layout/header.php';
?>
<header>
    <h1>DETALLES BLOG</h1>
  </header>
<!-- <div class="titulo-evento">
  <h1>Desfile Militar Nacional 2025 - El Desfile Militar Nacional 2025 reunió a más de 10,000</h1>
</div> -->
<section class="seccion-superior">
  <div class="contenido-texto">
    <div class="titulo-evento">
      <h1><?php echo htmlspecialchars($evento['titulo']); ?></h1>
    </div>
    <?php
$descripcion = htmlspecialchars($evento['descripcion']);

// Divide solo en puntos que están al final de una oración (punto seguido de espacio o salto de línea)
$oraciones = preg_split('/(?<=\.)\s+/', $descripcion);

foreach ($oraciones as $oracion) {
    if (trim($oracion) !== '') {
        echo '<p>' . $oracion . '</p>';
    }
}
?>
    <div class="fecha"><?= htmlspecialchars(date('d/m/Y', strtotime($evento['fecha']))) ?></div>
  </div>
  </div>

  <!-- <div class="contenedor-fecha-imagen">
    <div class="fecha">12/05/2025</div>
    <img src="https://storage.googleapis.com/a1aa/image/777b411b-3d45-4a7f-69e0-a345ae4db8db.jpg" alt="Soldados en formación militar con uniforme camuflaje, en un campo abierto" />
    <img class="imagen-extra" src="https://storage.googleapis.com/a1aa/image/45ac4cf3-4970-439f-ea68-109d71a3df03.jpg" alt="Imagen extra debajo de la fecha, cuadrado gris con texto" />
  </div> -->
</section>

<h2>Ubicación</h2>
<div class="contenedor-mapa"><iframe
  class="mapa-ubicacion"
  src="https://maps.google.com/maps?q=<?php echo $evento['latitud']; ?>,<?php echo $evento['longitud']; ?>&z=15&output=embed"
  allowfullscreen
></iframe>
</div>

<h2>Recuerdos del evento</h2>
<section aria-label="Galería de recuerdos del evento">
  <div class="contenedor-recuerdos" id="imagenes-visibles">
    <img src="/PROYECTO-MILITAR/views/img/01.png" alt="Soldados en formación militar con uniforme camuflaje, en un campo abierto" />
    <img src="/PROYECTO-MILITAR/views/img/02.png" alt="Soldados en formación militar con uniforme camuflaje, en un campo abierto" />
    <img src="/PROYECTO-MILITAR/views/img/03.png" alt="Soldados en formación militar con uniforme camuflaje, en un campo abierto" />
  <img src="/PROYECTO-MILITAR/views/img/04.jpeg" alt="Soldados en formación militar con uniforme camuflaje, en un campo abierto" />
    <img src="/PROYECTO-MILITAR/views/img/05.jpeg" alt="Soldados en formación militar con uniforme camuflaje, en un campo abierto" />
    <img src="/PROYECTO-MILITAR/views/img/07.png" alt="Soldados en formación militar con uniforme camuflaje, en un campo abierto" />
  </div>
  <!-- <div class="imagenes-ocultas" id="imagenes-ocultas">
    <img src="https://storage.googleapis.com/a1aa/image/777b411b-3d45-4a7f-69e0-a345ae4db8db.jpg" alt="Soldados en formación militar con uniforme camuflaje, en un campo abierto" />
  </div> -->
  <button aria-expanded="false" aria-controls="imagenes-ocultas" class="boton-mostrar-mas" id="boton-toggle" title="Mostrar más imágenes">
    ▼
  </button>
</section>

<section aria-label="Video del evento" class="seccion-video">
  <iframe class="video-iframe" src="https://www.youtube.com/embed/fwk4oyGsugo" title="Video del evento" allowfullscreen></iframe>
  <!-- <div class="texto-video">VIDEO DEL EVENTO <i></i></div> -->
</section>





</div>

  <script>
    // Obtener referencias a elementos
    var botonToggle = document.getElementById('boton-toggle');
    var imagenesOcultas = document.getElementById('imagenes-ocultas');

    // Si no hay imágenes ocultas, ocultar el botón
    if (!imagenesOcultas || imagenesOcultas.children.length === 0) {
      botonToggle.style.display = 'none';
    }

    // Función para alternar visibilidad de imágenes ocultas
    botonToggle.addEventListener('click', function() {
      var expandido = botonToggle.getAttribute('aria-expanded') === 'true';
      if (expandido) {
        imagenesOcultas.style.display = 'none';
        botonToggle.setAttribute('aria-expanded', 'false');
        botonToggle.classList.remove('rotado');
        botonToggle.title = 'Mostrar más imágenes';
      } else {
        imagenesOcultas.style.display = 'flex';
        botonToggle.setAttribute('aria-expanded', 'true');
        botonToggle.classList.add('rotado');
        botonToggle.title = 'Ocultar imágenes';
      }
    });
  </script>
  <script>
    // Script para manejar el preloader
    document.addEventListener('DOMContentLoaded', function() {
        const preloader = document.getElementById('preloader');
        const body = document.body;
        
        // Forzar el repintado para asegurar que la animación funcione
        void preloader.offsetWidth;
        
        // Mostrar por exactamente 3 segundos
        setTimeout(function() {
            body.classList.add('loaded');
            
            // Eliminar el preloader después de la animación
            setTimeout(function() {
                preloader.remove();
                // Mostrar todo el contenido
                document.querySelectorAll('body > *:not(script)').forEach(el => {
                    el.style.visibility = 'visible';
                });
            }, 500); // Medio segundo para la transición de desvanecimiento
        }, 3000); // 3 segundos exactos
    });
</script>
</body>
</html>