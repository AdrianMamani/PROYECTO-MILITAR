<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<!-- LLAMADA DE CABEZERA -->
<?php
// Incluir el modelo para obtener los registros en memoria
require_once 'models/EnMemoria.php';
$enMemoriaModel = new EnMemoria();

// Se asume que $memorias se obtiene desde el controlador público, 
// pero si no está definido, lo obtenemos aquí para el ejemplo:
if (!isset($memorias)) {
    $memorias = $enMemoriaModel->getAll();
}
?>

<?php include(__DIR__ . '/../layout/header.php'); ?>
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
<?php include(__DIR__ . '/../layout/navbar.php'); ?>


      <!-- parallax top-->
      <!-- Breadcrumbs -->
      <section class="bg-gray-7">
        <div class="breadcrumbs-custom box-transform-wrap context-dark">
          <div class="container">
            <h3 class="breadcrumbs-custom-title">EN MEMORIA</h3>
            <div class="breadcrumbs-custom-decor"></div>
          </div>
          <div class="box-transform" style="background-image: url(views/assets/template/images/bg-1.jpg);"></div>
        </div>
        <div class="container">
          <ul class="breadcrumbs-custom-path">
            <li><a href="index.php">Inicio</a></li>
            <li class="active">En Memoria</li>
          </ul>
        </div>
      </section>
    
<!-- Our Team -->
<section class="section section-lg section-bottom-md-70 bg-default">
  <div class="container">
    <h3 class="oh">
      <span class="d-inline-block wow slideInUp" data-wow-delay="0s">En Memoria</span>
    </h3>
    <p>Siguen presentes en nuestra historia, en nuestro espíritu y en cada misión cumplida con honor. ¡Siempre en nuestros corazones!</p>
    <div class="row row-lg row-40 justify-content-center">

    <?php if (!empty($memorias) && is_array($memorias)): ?>
    <?php foreach ($memorias as $memoria): ?>
        <div class="col-sm-6 col-lg-3 wow fadeInLeft" data-wow-delay=".2s" data-wow-duration="1s">
            <!-- Estilo Team Modern para En Memoria -->
            <article class="team-modern">
                <a class="team-modern-figure" href="index.php?controller=enMemoria&action=detalle&id=<?= htmlspecialchars($memoria['id']) ?>">
                    <?php 
                        $imagenes = $enMemoriaModel->obtenerImagenes($memoria['id']);
                        if (!empty($imagenes)) {
                            // Tomamos la primera imagen asociada a la memoria
                            $imagen = $imagenes[0];
                            echo '<img src="views/assets/img/in_memoria/' . htmlspecialchars($imagen['nombre_imagen']) . '" style="width: 270px; height: 236px; object-fit: cover;" alt="' . htmlspecialchars($memoria['titulo']) . '" />';
                        } else {
                            echo '<img src="views/assets/img/in_memoria/default.jpg" style="width: 270px; height: 236px; object-fit: cover;" alt="Imagen por defecto" />';
                        }
                    ?>
                </a>
                <div class="team-modern-caption">
                    <h6 class="team-modern-name">
                        <a href="index.php?controller=enMemoria&action=detalle&id=<?= htmlspecialchars($memoria['id']) ?>">
                            <?= htmlspecialchars($memoria['titulo']) ?>
                        </a>
                    </h6>
                    <?php if (!empty($memoria['subtitulo'])): ?>
                        <p class="team-modern-subtitle text-muted"><?= htmlspecialchars($memoria['subtitulo']) ?></p>
                    <?php endif; ?>
                    <ul class="list-inline team-modern-social-list">
                        <li>
                            <a class="button button-xs button-primary button-winona" href="index.php?controller=enMemoria&action=detalle&id=<?= htmlspecialchars($memoria['id']) ?>">
                                Ver Más
                            </a>
                        </li>
                    </ul>
                </div>
            </article>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="col-12">
        <p class="text-muted">No hay registros en memoria.</p>
    </div>
<?php endif; ?>


    </div>
  </div>
</section>


      


     <!-- LLAMADA DE FOOTER -->
     <?php include(__DIR__ . '/../layout/footer.php'); ?>

  </body>
</html>