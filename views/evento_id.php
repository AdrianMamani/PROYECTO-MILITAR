<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Historia de la Promoción</title>
  <link rel="stylesheet" href="/PROYECTO-MILITAR/views/assets/css/evento_id.css" />
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
    <?php if (!empty($imagenes)): ?>
      <?php foreach ($imagenes as $img): ?>
        <img 
          src="/PROYECTO-MILITAR/uploads/evento/<?= htmlspecialchars($img['nombre_imagen']) ?>" 
          alt="Imagen del evento <?= htmlspecialchars($evento['titulo']) ?>" 
        />
      <?php endforeach; ?>
    <?php else: ?>
      <p>No hay imágenes para este evento.</p>
    <?php endif; ?>
  </div>
</section>

<section aria-label="Video del evento" class="seccion-video">
  <?php if (!empty($videos)): ?>
    <?php foreach ($videos as $video): ?>
      <iframe 
        class="video-iframe" 
        src="https://www.youtube.com/embed/<?= htmlspecialchars($video['codigo_video']) ?>" 
        title="Video del evento" 
        allowfullscreen>
      </iframe>
      <?php break; // solo mostrar el primero ?>
    <?php endforeach; ?>
  <?php else: ?>
    <p>No hay video disponible para este evento.</p>
  <?php endif; ?>
</section>
<!-- Comments -->
<section aria-label="Sección de comentarios" class="comments-section">
  <h3>Comentarios</h3>

  <!-- Formulario para agregar comentario -->
  <form class="comment-form" id="comment-form" action="index.php?action=eventos/agregarComentario" method="POST" novalidate>
    <input type="hidden" name="evento_id" value="<?= htmlspecialchars($evento['id']) ?>"> 

    <div class="form-row">
      <label for="name-input">Nombre</label>
      <input id="name-input" name="name" placeholder="Tu nombre" required type="text"/>
    </div>

    <div class="form-row">
      <label for="comment-input">Comentario</label>
      <textarea id="comment-input" name="comment" placeholder="Escribe un comentario..." required rows="3"></textarea>
    </div>

    <div class="form-actions">
      <button type="submit">Publicar</button>
    </div>
  </form>

  <!-- Lista de comentarios -->
  <ul class="comment-list" id="comments-list">
    <?php if (!empty($comentarios)) : ?>
      <?php foreach ($comentarios as $comentario) : ?>
        <li>
          <img
            alt="Avatar de <?= htmlspecialchars($comentario['nombre_usuario']) ?>"
            class="avatar"
            height="48"
            width="48"
            loading="lazy"
            src="https://ui-avatars.com/api/?name=<?= urlencode($comentario['nombre_usuario']) ?>&background=random&size=48"
          />
          <div class="comment-content">
            <div class="comment-header">
              <strong><?= htmlspecialchars($comentario['nombre_usuario']) ?></strong>
              <time><?= date('d/m/Y H:i', strtotime($comentario['fecha_comentario'])) ?></time>
            </div>
            <p class="comment-text"><?= nl2br(htmlspecialchars($comentario['comentario'])) ?></p>
          </div>
        </li>
      <?php endforeach; ?>
    <?php else : ?>
      <li><p>No hay comentarios aún. ¡Sé el primero en comentar!</p></li>
    <?php endif; ?>
  </ul>
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
<script>
document.getElementById('comment-form').addEventListener('submit', async function (e) {
  e.preventDefault(); // Evita que el formulario se envíe de forma tradicional

  const form = e.target;
  const formData = new FormData(form);

  const response = await fetch(form.action, {
    method: 'POST',
    body: formData
  });

  if (response.ok) {
    const text = await response.text(); // Puedes devolver un JSON si prefieres

    // Opcional: Actualizar comentarios sin recargar o mostrar mensaje
    alert('Comentario enviado con éxito');

    // Limpia el formulario
    form.reset();

    // Recarga solo la sección de comentarios (más avanzado), o simplemente refresca toda la página
    // location.reload(); // Descomenta si quieres que se recargue después de enviar
  } else {
    alert('Hubo un error al enviar el comentario');
  }
});
</script>
</body>
</html>