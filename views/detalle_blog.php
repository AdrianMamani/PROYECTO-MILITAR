
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <!-- LLAMADA DE CABEZERA -->
  <?php include 'layout/header.php'; ?>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Blog</title>
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
    <?php include 'layout/navbar.php'; ?>

<!-- Breadcrumbs -->
<section class="bg-gray-7">
  <div class="breadcrumbs-custom box-transform-wrap context-dark">
    <div class="container">
      <h3 class="breadcrumbs-custom-title">Detalle de Blog</h3>
      <div class="breadcrumbs-custom-decor"></div>
    </div>
    <div class="box-transform" style="background-image: url(views/assets/template/images/bg-1.jpg);"></div>
  </div>
  <div class="container">
    <ul class="breadcrumbs-custom-path">
      <li><a href="index.php">Inicio</a></li>
      <li class="active">Detalle de Blog</li>
    </ul>
  </div>
</section>

<!-- Verificamos si existe el miembro -->
<?php if (isset($blog)) { ?>
  <!-- Sección: Información del miembro -->
  <section class="section section-lg bg-default text-md-left">
    <div class="container">
      <div class="row row-60 justify-content-center">
        <!-- Columna para el texto (aproximadamente 60%) -->
        <div class="col-md-7">
          <div class="offset-left-xl-70">
            <h3 class="heading-3"><?= htmlspecialchars($blog['titulo']); ?></h3>
            <div class="slick-quote">
              <article class="quote-modern">
                <p class="quote-modern-status"><?= htmlspecialchars($blog['subtitulo']); ?></p>
                <h5 class="quote-modern-text"></h5>
                <p class="q"><?= nl2br(htmlspecialchars($blog['descripcion'])); ?></p>
              </article>
            </div>
          </div>
        </div>
        <!-- Columna para las imágenes (aproximadamente 40%) -->
        <div class="col-md-4">
          <?php 
            if (!empty($imagenes)) {
              // Mostrar solo las primeras 3 imágenes en el lateral
              $sideImages = array_slice($imagenes, 0, 3);
              foreach ($sideImages as $img) {
                echo '<div class="mb-3">';
                echo '<img src="views/assets/img/blog/' . htmlspecialchars($img['nombre_imagen']) . '" class="img-grid img-fluid" alt="Imagen del blog" style="width:100%; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">';
                echo '</div>';
              }
            } else {
              echo '<div class="col-12"><p>No hay imágenes adicionales para este blog.</p></div>';
            }
          ?>
        </div>
      </div>
    </div>
  </section>
  
  <?php 
    // Si hay más de 3 imágenes, mostramos las adicionales en otra sección
    if (!empty($imagenes) && count($imagenes) > 3) {
      $additionalImages = array_slice($imagenes, 3);
  ?>
    <section class="section bg-default">
      <div class="container">
        <h4>Más Imágenes</h4>
        <div class="row">
          <?php 
            foreach ($additionalImages as $img) {
              echo '<div class="col-md-4 mb-4">';
              echo '<img src="views/assets/img/blog/' . htmlspecialchars($img['nombre_imagen']) . '" class="img-grid img-fluid" alt="Imagen adicional del blog" style="width:100%; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">';
              echo '</div>';
            }
          ?>
        </div>
      </div>
    </section>
  <?php } ?>
  
<?php } else { ?>
  <p>No se encontró el blog.</p>
  <a href="index.php?controller=blog&action=index" class="btn btn-primary">Volver al Blog</a>
<?php } ?>


    <!-- LLAMADA DE FOOTER -->
    <?php include 'layout/footer.php'; ?>
  </body>
</html>
