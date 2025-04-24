<?php
// Suponiendo que $noticias se pasa desde el controlador
if (!isset($noticias)) {
    $noticias = [];
}
require_once 'models/NoticiaAdmin.php';
$noticiaModel = new NoticiaAdmin();
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <!-- LLAMADA DE CABEZERA -->
  <?php include(__DIR__ . '/../layout/header.php'); ?>
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

    <!-- Navbar -->
    <?php include(__DIR__ . '/../layout/navbar.php'); ?>

    <!-- Breadcrumbs -->
    <section class="bg-gray-7">
      <div class="breadcrumbs-custom box-transform-wrap context-dark">
        <div class="container">
          <h3 class="breadcrumbs-custom-title">NOTICIAS</h3>
          <div class="breadcrumbs-custom-decor"></div>
        </div>
        <div class="box-transform" style="background-image: url(views/assets/template/images/bg-1.jpg);"></div>
      </div>
      <div class="container">
        <ul class="breadcrumbs-custom-path">
          <li><a href="index.php">Inicio</a></li>
          <li class="active">Noticias Destacadas</li>
        </ul>
      </div>
    </section>

    <!-- Sección de Noticias -->
    <section class="section section-lg bg-default text-md-left">
      <div class="container">
        <div class="row row-60 justify-content-center">
          <div class="col-lg-12">
            <h3 class="mb-4 font-weight-bold text-uppercase text-center">Últimas Noticias</h3>
            <p class="mb-5 text-muted text-center">Mantente informado sobre eventos, reconocimientos y novedades.</p>
            <br>
            <div class="blog-list">
              <div class="row">
                <?php if (!empty($noticias)): ?>
                  <?php foreach ($noticias as $noticia): ?>
                    <div class="col-md-4 mb-3">
                      <div class="card border-0 noticia-card h-100">
                        <div class="card-img-container position-relative">
                          <?php
                          // Obtener las imágenes asociadas a la noticia
                          $imagenes = $noticiaModel->obtenerImagenes($noticia['id']);
                          if (!empty($imagenes)): ?>
                            <img src="views/assets/img/noticias/<?= htmlspecialchars($imagenes[0]['nombre_imagen']) ?>" 
                                 class="card-img-top" 
                                 alt="Imagen de la noticia" 
                                 style="max-height: 200px; object-fit: cover;">
                          <?php else: ?>
                            <img src="views/assets/img/noticias/default.png" 
                                 class="card-img-top" 
                                 alt="Imagen por defecto" 
                                 style="max-height: 200px; object-fit: cover;">
                          <?php endif; ?>
                          
                          <a class="center-button position-absolute w-100 h-100 d-flex align-items-center justify-content-center text-white"
                             href="index.php?controller=noticia&action=detalle&id=<?= $noticia['id'] ?>">
                            Leer Más
                          </a>
                        </div>
                        
                        <div class="card-body text-center">
                          <h5 class="card-title"><?= htmlspecialchars($noticia['titulo']) ?></h5>
                          <p class="card-text"><?= htmlspecialchars($noticia['subtitulo']) ?></p>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <p class="text-center">No hay noticias registradas.</p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- LLAMADA DE FOOTER -->
    <?php include(__DIR__ . '/../layout/footer.php'); ?>
  </body>
</html>

<!-- Estilos CSS -->
<style>
  /* Estilos para la tarjeta de noticias */
  .noticia-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: none;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1); /* Sombra ligera inicial */
    overflow: hidden;
  }

  .noticia-card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
  }

  /* Estilo del botón centrado (overlay) */
  .center-button {
    opacity: 0;
    transition: opacity 0.3s ease;
    background-color: rgba(0, 0, 0, 0.5); /* Fondo semitransparente */
    text-decoration: none;
    text-align: center;
    padding: 10px;
    font-size: 18px;
    font-weight: bold;
    text-transform: uppercase;
  }

  /* Mostrar el botón al hacer hover sobre la imagen */
  .card-img-container:hover .center-button {
    opacity: 1;
  }
</style>
