<?php
// Incluir el modelo para obtener logros
require_once 'models/LogroAdmin.php';

$logroModel = new LogroAdmin();
$logrosTodos = $logroModel->getAll();
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<!-- LLAMADA DE CABEZERA -->
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
            <h3 class="breadcrumbs-custom-title">NUESTROS LOGROS</h3>
            <div class="breadcrumbs-custom-decor"></div>
          </div>
          <div class="box-transform" style="background-image: url(views/assets/template/images/bg-1.jpg);"></div>
        </div>
        <div class="container">
          <ul class="breadcrumbs-custom-path">
            <li><a href="index.php">Inicio</a></li>
            <li class="active">Nuestros LOGROS</li>
          </ul>
        </div>
      </section>
    

      <section class="section section-lg bg-default text-md-left">
  <div class="container">
    <div class="row row-60 justify-content-center">
      <div class="col-lg-12">
        <h3 class="mb-4 font-weight-bold text-uppercase">Explora Nuestros Logros</h3>
        <p class="mb-5 text-muted">Un legado de esfuerzo, disciplina y servicio a la patria.</p>
        <br>
        <div class="blog-list">


        <div class="row">
  <?php if (!empty($logrosTodos)): ?>
    <?php foreach ($logrosTodos as $logro): ?>
      <div class="col-md-4 mb-3">
        <div class="card border-0 empr-card h-100">
          <div class="card-img-container position-relative">
            <?php
              // Obtener imágenes asociadas al logro
              $imagenes = $logroModel->obtenerImagenes($logro['id']);
              if (!empty($imagenes)):
            ?>
              <img src="views/assets/img/logros/<?= htmlspecialchars($imagenes[0]['nombre_imagen']) ?>" 
                   class="card-img-top" 
                   alt="Imagen del logro" 
                   style="max-height: 200px; object-fit: cover;">
            <?php else: ?>
              <img src="views/assets/img/placeholder.jpg" 
                   class="card-img-top" 
                   alt="Imagen del logro" 
                   style="max-height: 200px; object-fit: cover;">
            <?php endif; ?>
            
            <a class="center-button position-absolute w-100 h-100 d-flex align-items-center justify-content-center text-white" 
               href="index.php?controller=logro&action=detalle&id=<?= $logro['id'] ?>">
              Ver Más
            </a>
          </div>
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($logro['titulo']) ?></h5>
            <p class="card-text"><?= htmlspecialchars($logro['subtitulo']) ?></p>
          
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p class="text-center">No hay logros disponibles.</p>
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

<style>
  /* Sombra en toda la tarjeta y efecto de hover */
  .empr-card {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border: none;
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1); /* Sombra ligera inicial */
  overflow: hidden;
}

.empr-card:hover {
  transform: translateY(-5px);
  box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
}

/* Estilo del botón centrado */
.center-button {
  opacity: 0;
  transition: opacity 0.3s ease;
  background-color: rgba(0, 0, 0, 0.5); /* Fondo oscuro */
  text-decoration: none;
  text-align: center;
  padding: 10px;
  font-size: 18px;
  font-weight: bold;
  text-transform: uppercase;
}

.card-img-container:hover .center-button {
  opacity: 1;
}

</style>