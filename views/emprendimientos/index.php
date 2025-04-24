<?php
require_once 'models/Emprendimiento.php';
$emprendimientoModel = new Emprendimiento();
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
            <h3 class="breadcrumbs-custom-title">NUESTROS EMPRENDIMIENTOS</h3>
            <div class="breadcrumbs-custom-decor"></div>
          </div>
          <div class="box-transform" style="background-image: url(views/assets/template/images/bg-1.jpg);"></div>
        </div>
        <div class="container">
          <ul class="breadcrumbs-custom-path">
            <li><a href="index.php">Inicio</a></li>
            <li class="active">Nuestros Emprendimientos</li>
          </ul>
        </div>
      </section>
    

      <section class="section section-lg bg-default text-md-left">
  <div class="container">
    <div class="row row-60 justify-content-center">
      <div class="col-lg-12">
        <h3 class="mb-4 font-weight-bold text-uppercase">Explora Nuestros Emprendimientos</h3>
        <p class="mb-5 text-muted">Iniciativas y proyectos de nuestros miembros en la vida civil.</p>
        <br>
        <div class="blog-list">


        <div class="row">
        <?php
if (!empty($emprendimientos)) {
  foreach ($emprendimientos as $emprendimiento) {
    // Fetch images associated with the emprendimiento
    $imagenes = $emprendimientoModel->obtenerImagenes($emprendimiento['id']);
    
    echo '<div class="col-md-4 mb-3">';
      echo '<div class="card border-0 empr-card">';
      
      // Contenedor para la imagen y el botón centrado
      echo '<div class="card-img-container position-relative">';
        // Check if there are images, show the first image
        if (!empty($imagenes)) {
          // Only show the first image
          echo '<img src="assets/img/emprendimientos/' . htmlspecialchars($imagenes[0]['nombre_imagen']) . '" class="card-img-top" alt="Imagen de ' . htmlspecialchars($emprendimiento['nombre']) . '" style="max-height: 200px; object-fit: cover;">';
        } else {
          // Placeholder image if no images are associated
          echo '<img src="assets/img/placeholder.jpg" class="card-img-top" alt="Imagen de ' . htmlspecialchars($emprendimiento['nombre']) . '" style="max-height: 200px; object-fit: cover;">';
        }
        // Botón centrado que aparece al hacer hover sobre la imagen
        echo '<a class="center-button position-absolute w-100 h-100 d-flex align-items-center justify-content-center text-white" href="index.php?controller=emprendimiento&action=detalle&id=' . htmlspecialchars($emprendimiento['id']) . '">Ver Más</a>';
      echo '</div>';
      
      echo '<div class="card-body">';
        echo '<h5 class="card-title">' . htmlspecialchars($emprendimiento['nombre']) . '</h5>';
        echo '<p><strong>Ubicación:</strong> ' . htmlspecialchars($emprendimiento['ubicacion']) . '</p>';
        echo '<p><strong>Contacto:</strong> ' . htmlspecialchars($emprendimiento['contactos']) . '</p>';
      echo '</div>';
      
      echo '</div>';
    echo '</div>';
  }
} else {
  echo '<p>No hay emprendimientos registrados.</p>';
}
?>

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