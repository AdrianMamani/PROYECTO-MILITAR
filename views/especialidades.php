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
    

  <!-- What We Offer-->
  <section class="section section-md bg-default">
  <div class="container">
    <h3 class="oh-desktop">
      <span class="d-inline-block wow slideInDown">Especialidades</span>
    </h3>
    <p>Nuestras 13 Especialidades</p>
    <div class="row row-md row-30">
      <?php
      require_once 'controllers/EspecialidadController.php';
      $especialidadController = new EspecialidadController();
      $especialidades = $especialidadController->listarEspecialidades();

      if (!empty($especialidades)) {
        foreach ($especialidades as $especialidad) {
          echo '<div class="col-sm-6 col-lg-4">';
            // Se envuelve la tarjeta completa en un enlace
            echo '<a href="index.php?controller=especialidad&action=detalle&id=' . $especialidad['id'] . '" class="d-block text-decoration-none">';
              echo '<div class="oh-desktop" style="height: 100%;">';
                
                // Tarjeta con altura fija de 400px y uso de flex para distribuir imagen y texto
                echo '<article class="services-terri wow slideInDown" style="height: 400px; display: flex; flex-direction: column;">';

                  // El contenedor de la imagen usará flex: 2 (2 partes de la altura total)
                  echo '<div class="services-terri-figure" style="flex: 2; overflow: hidden;">';
                    // Obtener las imágenes asociadas a la especialidad
                    $imagenes = Especialidad::getImagenesByEspecialidad($especialidad['id']);
                    if (!empty($imagenes)) {
                      // Mostrar solo la primera imagen
                      echo '<img '
                            .'alt="Especialidad" '
                            .'width="370" '
                            .'height="278" '
                            .'src="views/assets/img/especialidad/' . htmlspecialchars($imagenes[0]['nombre_imagen']) . '" '
                            .'style="width: 100%; height: 100%; object-fit: cover;" '
                            .'alt="Imagen de Especialidad">';
                    }else {
                      // Mostrar imagen por defecto
                      echo '<img '
                            .'alt="Especialidad" '
                            .'width="370" '
                            .'height="278" '
                            .'src="views/assets/template/images/logo.png" '
                            .'style="width: 100%; height: 100%; object-fit: cover;" '
                            .'alt="Imagen por defecto">';
                  }
                  echo '</div>';

                  // El contenedor del texto usará flex: 1 (1 parte de la altura total)
                  echo '<div class="services-terri-caption" style="flex: 1; color: white;">';
                    echo '<span class="services-terri-icon linearicons-star"></span>';
                    echo '<h5 class="services-terri-title">' . htmlspecialchars($especialidad['nombre']) . '</h5>';
                    echo '<p class="services-terri-subtitle">' . htmlspecialchars($especialidad['descripcion']) . '</p>';
                  echo '</div>';

                echo '</article>';
              echo '</div>';
            echo '</a>';
          echo '</div>';
        }
      } else {
        echo '<p style="color: white;">No hay especialidades registradas.</p>';
      }
      ?>
    </div>
  </div>
</section>

      


     <!-- LLAMADA DE FOOTER -->
     <?php include 'layout/footer.php'; ?>

  </body>
</html>