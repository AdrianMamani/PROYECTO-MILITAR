<?php
// Incluir los modelos necesarios
require_once 'models/Miembro.php';
require_once 'models/Especialidad.php';

// El código sigue aquí...
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<!-- LLAMADA DE CABEZERA -->
<?php include 'layout/header.php'; ?>

  <body>
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

    <!-- parallax top-->
    <!-- Breadcrumbs -->
    <section class="bg-gray-7">
      <div class="breadcrumbs-custom box-transform-wrap context-dark">
        <div class="container">
          <h3 class="breadcrumbs-custom-title">Especialidades</h3>
          <div class="breadcrumbs-custom-decor"></div>
        </div>
        <div class="box-transform" style="background-image: url(views/assets/template/images/bg-1.jpg);"></div>
      </div>
      <div class="container">
        <ul class="breadcrumbs-custom-path">
          <li><a href="index.php">Inicio</a></li>
          <li class="active">Nuestras Especialidades</li>
        </ul>
      </div>
    </section>

    <?php if ($especialidad): ?>
    <div class="container mt-5">
      <div class="row mb-4">
        <div class="col-md-8 mx-auto">
          <!-- Titulo y descripción de la especialidad -->
          <h3 class="text-center mb-3" style="font-size: 2.5rem; font-weight: 600; color: #333; line-height: 1.3;"> <?= htmlspecialchars($especialidad['nombre']) ?> </h3>
          <p class="text-center" style="font-size: 1.125rem; color: #666; line-height: 1.6;"><?= htmlspecialchars($especialidad['descripcion']) ?></p>
        </div>
      </div>

      <!-- Galería de fotos de la especialidad -->
      <div class="row mb-5">
        <div class="col-md-12">
          <h3 class="text-center mb-4" style="font-size: 2rem; font-weight: 500; color: #333;">Galería de Fotos</h3>
          <div class="row">
            <?php
            // Obtener las imágenes asociadas a la especialidad
            $imagenes = Especialidad::getImagenesByEspecialidad($especialidad['id']);
            if (!empty($imagenes)) {
              foreach ($imagenes as $imagen):
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="image-container">';
                echo '<img src="views/assets/img/especialidad/' . htmlspecialchars($imagen['nombre_imagen']) . '" class="img-fluid rounded shadow-sm" style="object-fit: cover; height: 250px; width: 100%;" alt="' . htmlspecialchars($especialidad['nombre']) . '"/>';
                echo '</div>';
                echo '</div>';
              endforeach;
            }
            ?>
          </div>
        </div>
      </div>

      <!-- Miembros -->
      <h2 class="text-center mb-4" style="font-size: 2rem; font-weight: 500; color: #333;">Miembros de la Especialidad</h2>
      <div class="row row-lg row-40 justify-content-center">
        <?php if (!empty($miembros) && is_array($miembros)): ?>
          <?php foreach ($miembros as $m): ?>
            <div class="col-sm-6 col-lg-3 wow fadeInLeft" data-wow-delay=".2s" data-wow-duration="1s">
              <!-- Team Modern -->
              <article class="team-modern">
                <a class="team-modern-figure mb-4" href="index.php?controller=miembro&action=detalle&id=<?= htmlspecialchars($m['id']) ?>">
                  <?php 
                    $imagenes = Miembro::obtenerImagenes($m['id']);
                    if (!empty($imagenes)) {
                      // Tomamos solo la primera imagen asociada al miembro
                      $imagen = $imagenes[0];
                      echo '<img src="assets/img/miembros/' . htmlspecialchars($imagen['nombre_imagen']) . '" style="width: 270px; height: 236px; object-fit: cover;" alt="' . htmlspecialchars($m['nombre']) . '" />';
                    } else {
                      echo '<img src="assets/img/miembros/placeholder.jpg" style="width: 270px; height: 236px; object-fit: cover;" alt="Imagen no disponible" />';
                    }
                  ?>
                </a>
                <div class="team-modern-caption">
                  <h6 class="team-modern-name">
                    <a href="index.php?controller=miembro&action=detalle&id=<?= htmlspecialchars($m['id']) ?>">
                      <?= htmlspecialchars($m['nombre']) ?>
                    </a>
                  </h6>
                  
                 
                  <ul class="list-inline team-modern-social-list">
                    <li>
                      <a class="button button-xs button-primary button-winona" href="index.php?controller=miembro&action=detalle&id=<?= htmlspecialchars($m['id']) ?>">
                        Información
                      </a>
                    </li>
                  </ul>
                </div>
              </article>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12">
            <p class="text-muted">No hay miembros disponibles en este momento.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <?php else: ?>
      <p class="text-center" style="font-size: 1.2rem; color: #777;">No se encontró la especialidad solicitada.</p>
    <?php endif; ?>

    br
    <!-- LLAMADA DE FOOTER -->
    <?php include 'layout/footer.php'; ?>


<style>
  /* Efecto hover para las imágenes de la galería de fotos */
  .row.mb-5 .image-container img {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .row.mb-5 .image-container img:hover {
    transform: scale(1.05); /* Aumentar el tamaño de la imagen */
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); /* Sombra suave */
  }
</style>

  </body>
</html>
