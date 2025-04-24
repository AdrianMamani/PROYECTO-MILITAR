<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <!-- LLAMADA DE CABEZERA -->
  <?php include(__DIR__ . '/../layout/header.php'); ?>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Emprendimiento</title>
    <style>
      /* Estilos para la galería */
      .grid-img {
        width: 100%;
        height: auto;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }
      .grid-img:hover {
        transform: scale(1.08);
      }
      h4 {
        text-align: center;
        margin-bottom: 20px;
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

    <!-- LLAMADA DE NAVBAR -->
    <?php include(__DIR__ . '/../layout/navbar.php'); ?>

    <!-- Breadcrumbs -->
    <section class="bg-gray-7">
      <div class="breadcrumbs-custom box-transform-wrap context-dark">
        <div class="container">
          <h3 class="breadcrumbs-custom-title">Detalle de Emprendimiento</h3>
          <div class="breadcrumbs-custom-decor"></div>
        </div>
        <div class="box-transform" style="background-image: url(views/assets/template/images/bg-1.jpg);"></div>
      </div>
      <div class="container">
        <ul class="breadcrumbs-custom-path">
          <li><a href="index.php">Inicio</a></li>
          <li class="active">Detalle de Emprendimiento</li>
        </ul>
      </div>
    </section>
<br>
    <!-- Contenedor principal -->
    <div class="container my-4">
      <?php if ($emprendimiento): ?>
        <div class="row">
          <!-- Columna de información (60%) -->
          <div class="col-md-7">
            <!-- Detalles del emprendimiento con énfasis en cursiva y colores -->
             <h3> <?= htmlspecialchars($emprendimiento['nombre']); ?></h3>
             <h5 style="color: #343a40;"><strong>Descripción:</strong><br><i><?= nl2br(htmlspecialchars($emprendimiento['descripcion'])); ?></i></h1>
            <p style="color:rgb(7, 86, 170);"><strong>Ubicación:</strong> <i><?= htmlspecialchars($emprendimiento['ubicacion']); ?></i></p>
            <p style="color: #28a745;"><strong>Contacto:</strong> <i><?= htmlspecialchars($emprendimiento['contactos']); ?></i></p>
            
            <p style="color: #6c757d;"><strong>Segunda Descripción:</strong><br><i><?= nl2br(htmlspecialchars($emprendimiento['segunda_descripcion'])); ?></i></p>
         
            <a class="button button-xs button-primary button-winona" 
                     href="index.php?controller=emprendimiento&action=index">
                  Volver
                  </a>
          </div>
          <!-- Columna para la imagen principal (40%) -->
          <div class="col-md-5">
            <?php if (!empty($imagenes)): ?>
              <?php 
                // Extraemos la primera imagen para la columna principal.
                $imagenPrincipal = array_shift($imagenes);
              ?>
              <img src="assets/img/emprendimientos/<?= htmlspecialchars($imagenPrincipal['nombre_imagen']); ?>" class="img-fluid" alt="Imagen principal">
            <?php else: ?>
              <img src="assets/img/emprendimientos/default.jpg" class="img-fluid" alt="Imagen por defecto">
            <?php endif; ?>
          </div>
        </div>

        <?php 
          // Si hay más de 2 imágenes (después de extraer la principal) se muestran en una cuadrícula abajo.
          if (count($imagenes)): 
        ?>
          <hr>
          <h4>Más Imágenes</h4>
          <div class="row">
          <?php foreach ($imagenes as $img): ?>
  <div class="col-12 col-md-6 col-lg-6 mb-3">
    <img src="assets/img/emprendimientos/<?= htmlspecialchars($img['nombre_imagen']); ?>" class="img-fluid grid-img" alt="Imagen adicional" style="width: 100%; height: auto; max-height: 500px; object-fit: cover;">
  </div>
<?php endforeach; ?>

          </div>
        <?php endif; ?>

      <?php else: ?>
        <p class="text-center">No se encontró el emprendimiento.</p>
      <?php endif; ?>
    </div>

    <!-- LLAMADA DE FOOTER -->
    <?php include(__DIR__ . '/../layout/footer.php'); ?>
  </body>
</html>
