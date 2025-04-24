<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <!-- LLAMADA DE CABEZERA -->
  <?php include(__DIR__ . '/../layout/header.php'); ?>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Logro</title>
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
          <h3 class="breadcrumbs-custom-title">Detalle de Logro</h3>
          <div class="breadcrumbs-custom-decor"></div>
        </div>
        <div class="box-transform" style="background-image: url(views/assets/template/images/bg-1.jpg);"></div>
      </div>
      <div class="container">
        <ul class="breadcrumbs-custom-path">
          <li><a href="index.php">Inicio</a></li>
          <li class="active">Detalle de Logro</li>
        </ul>
      </div>
    </section>

    <!-- Contenedor principal para la vista Detalle Logro -->
    <div class="container my-4">
      <div class="card">
        <div class="card-header text-center">
          <h2><?= htmlspecialchars($logro['titulo']) ?></h2>
          <h5 class="text-muted"><i><?= htmlspecialchars($logro['subtitulo']) ?></i></h5>
        </div>
        <div class="card-body">
          <p><?= nl2br(htmlspecialchars($logro['descripcion'])) ?></p>
          <?php if (!empty($imagenes)): ?>
            <div class="row">
              <?php foreach ($imagenes as $img): ?>
                <div class="col-md-4 mb-3">
                  <img src="views/assets/img/logros/<?= htmlspecialchars($img['nombre_imagen']) ?>" class="img-fluid gallery-img" alt="Imagen del logro">
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- LLAMADA DE FOOTER -->
    <?php include(__DIR__ . '/../layout/footer.php'); ?>
  </body>
</html>
