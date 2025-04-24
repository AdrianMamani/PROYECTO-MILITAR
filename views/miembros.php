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
            <h3 class="breadcrumbs-custom-title">Miembros</h3>
            <div class="breadcrumbs-custom-decor"></div>
          </div>
          <div class="box-transform" style="background-image: url(views/assets/template/images/bg-1.jpg);"></div>
        </div>
        <div class="container">
          <ul class="breadcrumbs-custom-path">
            <li><a href="index.php">Inicio</a></li>
            <li class="active">Nuestros Miembros</li>
          </ul>
        </div>
      </section>
    
<!-- Our Team -->
<section class="section section-lg section-bottom-md-70 bg-default">
  <div class="container">
    <h3 class="oh">
      <span class="d-inline-block wow slideInUp" data-wow-delay="0s">Miembros</span>
    </h3>
    <p>Un legado de honor y compromiso</p>
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
                <!-- Se muestra la especialidad -->
                <div class="team-modern-specialty text-primary">
                  <?= htmlspecialchars($m['especialidad']) ?>
                </div>
               
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
</section>

      


     <!-- LLAMADA DE FOOTER -->
     <?php include 'layout/footer.php'; ?>

  </body>
</html>