<?php
// Incluir los modelos necesarios
require_once 'models/Miembro.php';
require_once 'models/Especialidad.php';
// El código sigue aquí...
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <!-- LLAMADA DE CABEZERA -->
  <?php include(__DIR__ . '/../layout/header.php'); ?>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle En Memoria</title>
    <style>
      /* Estilos para la galería */
      .gallery-img {
        width: 100%;
        height: auto;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }
      .gallery-img:hover {
        transform: scale(1.08);
      }
      .hover-effect {
        transition: transform 0.3s ease;
      }
      .hover-effect:hover {
        transform: scale(1.05);
      }
      h4 {
        text-align: center;
        margin-bottom: 20px;
      }
      .gallery-img {
  width: 400px; /* Ajusta el ancho fijo */
  height: 300px; /* Ajusta la altura fija */
  object-fit: cover; /* Recorta la imagen sin deformarla */
  transition: transform 0.3s ease;
}
    </style>
  </head>
  <body>
    <!-- Preloader -->
    <div class="preloader">
      <div class="wrapper-triangle">
        <div class="pen">
          <div class="line-triangle">
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
          </div>
          <div class="line-triangle">
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
          </div>
          <div class="line-triangle">
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- LLAMADA DE CABEZERA -->
    <?php include(__DIR__ . '/../layout/navbar.php'); ?>
    <!-- Breadcrumbs -->
    <section class="bg-gray-7">
      <div class="breadcrumbs-custom box-transform-wrap context-dark">
        <div class="container">
          <h3 class="breadcrumbs-custom-title">Detalle En Memoria</h3>
          <div class="breadcrumbs-custom-decor"></div>
        </div>
        <div class="box-transform" style="background-image: url(views/assets/template/images/bg-1.jpg);"></div>
      </div>
      <div class="container">
        <ul class="breadcrumbs-custom-path">
          <li><a href="index.php">Inicio</a></li>
          <li class="active">Detalle En Memoria</li>
        </ul>
      </div>
    </section>


    <?php if ($memoria): ?>
<!-- Sección: Información del miembro -->
<section class="section section-lg bg-default text-md-left">
  <div class="container">
    <div class="row row-60 justify-content-center flex-lg-row-reverse">
      <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="offset-left-xl-70">
          <h3 class="heading-3"><?= htmlspecialchars($memoria['titulo']); ?></h3>
          <div class="slick-quote">
            <article class="quote-modern">
              <h5 class="quote-modern-text">
                <span class="q"><?= htmlspecialchars($memoria['subtitulo']); ?></span>
              </h5>
              <p class="quote-modern-status"><?= nl2br(htmlspecialchars($memoria['descripcion'])); ?></p>
            </article>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-xl-7">
      <?php 
        if (!empty($imagenes)) {
          $imagen = $imagenes[0];
          // Imagen principal más pequeña
          echo '<img src="views/assets/img/in_memoria/' . htmlspecialchars($imagen['nombre_imagen']) . '" class="img-thumbnail w-75" alt="' . htmlspecialchars($memoria['titulo']) . '">';
        } else {
          // Imagen por defecto si no hay imágenes
          echo '<img src="views/assets/img/in_memoria/default.jpg" class="img-thumbnail w-75" alt="' . htmlspecialchars($memoria['titulo']) . '" />';
        }
      ?>
      </div>
    </div>
  </div>
</section>

<!-- Sección: Galería de Fotos -->
<section class="section section-lg bg-gray-100 text-left section-relative">
  <div class="container">
    <div class="row row-60 justify-content-center">
      <div class="col-12">
      <?php if (count($imagenes) > 1): ?>  
  <h4>Galería de Fotos de <?= htmlspecialchars($memoria['titulo']) ?></h4>
  <div class="tabs-custom" id="tabs-5">
    <div class="tab-content tab-content-1">
      <div class="row">
        <?php 
          // Recorrer las imágenes omitiendo la primera (índice 0)
          foreach ($imagenes as $index => $img):
            if ($index === 0) continue;
        ?>
          <div class="col-md-4 mb-3">
            <div class="gallery-item">
              <img src="views/assets/img/in_memoria/<?= htmlspecialchars($img['nombre_imagen']); ?>" 
                   class="img-fluid gallery-img" 
                   alt="Imagen de <?= htmlspecialchars($memoria['titulo']); ?>">
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
<?php endif; ?>

      </div>
    </div>
  </div>
</section>
  
<?php else: ?>
  <p>No se encontró el registro.</p>
<?php endif; ?>


    <!-- LLAMADA DE FOOTER -->
    <?php include(__DIR__ . '/../layout/footer.php'); ?>
  </body>
</html>
