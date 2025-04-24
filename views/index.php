

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


   
      <!-- Swiper-->
      <section class="section swiper-container swiper-slider swiper-slider-2 swiper-slider-3" data-loop="true" data-autoplay="5000" data-simulate-touch="false" data-slide-effect="fade">
        <div class="swiper-wrapper text-sm-left">

        <?php foreach ($diapositivas as $index => $slide): ?>
          <div class="swiper-slide context-dark" data-slide-bg="views/assets/img/carrusel/<?= htmlspecialchars($slide['imagen']) ?>">
        

            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row">
                  <div class="col-sm-9 col-md-8 col-lg-7 col-xl-7 offset-lg-1 offset-xxl-0">
                    <h1 class="oh swiper-title"><span class="d-inline-block" data-caption-animate="slideInUp" data-caption-delay="0"><?= htmlspecialchars($slide['titulo']) ?></span></h1>
                    <p class="big swiper-text" data-caption-animate="fadeInLeft" data-caption-delay="300"><?= htmlspecialchars($slide['subtitulo']) ?></p><a class="button button-lg button-primary button-winona button-shadow-2" href="#" data-caption-animate="fadeInUp" data-caption-delay="300">Comunidad</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
       
          </div>
        </div>
        <!-- Swiper Pagination-->
        <div class="swiper-pagination" data-bullet-custom="true"></div>
        <!-- Swiper Navigation-->
        <div class="swiper-button-prev">
          <div class="preview">
            <div class="preview__img"></div>
          </div>
          <div class="swiper-button-arrow"></div>
        </div>
        <div class="swiper-button-next">
          <div class="swiper-button-arrow"></div>
          <div class="preview">
            <div class="preview__img"></div>
          </div>
        </div>
      </section>


      <section class="section section-lg bg-gray-100 text-left section-relative">
        <div class="container">
        <?php if (!empty($nosotros)): ?>
          <?php foreach ($nosotros as $info): ?>
          <div class="row row-60 justify-content-center justify-content-xxl-between">
            
            <div class="col-lg-6 col-xxl-5 position-static">
              <h3><?= htmlspecialchars($info['titulo']); ?></h3>
              <div class="tabs-custom" id="tabs-5">
                <div class="tab-content tab-content-1">
                
                  <div class="tab-pane fade show active" id="tabs-5-4">
                    <h5 class="font-weight-normal text-transform-none text-spacing-75"><?= htmlspecialchars($info['subtitulo']); ?></h5>
                    <p><?= nl2br(htmlspecialchars($info['descripcion'])); ?></p>
                    <p><?= nl2br(htmlspecialchars($info['descripcion2'])); ?></p>
                    
                  </div>
                 
                </div>
               
              </div>
            </div>
            <div class="col-md-9 col-lg-6 position-static index-1">
              <div class="bg-image-right-1 bg-image-right-lg"> <img src="views/assets/img/<?= htmlspecialchars($info['imagen']); ?>" class="img-fluid rounded-start" alt="Imagen de <?= htmlspecialchars($info['titulo']); ?>">
                <div class="link-play-modern"><a class="icon mdi mdi-play" data-lightgallery="item" href="https://www.youtube.com/watch?v=1UWpbtUupQQ"></a>
                  <div class="link-play-modern-title">Conocenos<span>Ver</span></div>
                  <div class="link-play-modern-decor"></div>
                </div>
                <div class="box-transform" style="background-image: url(views/assets/img/<?= htmlspecialchars($info['imagen']); ?>);"></div>
                
              </div>
            </div>
          </div>
          <?php endforeach; ?>
      <?php else: ?>
        <p>No hay información disponible sobre nosotros.</p>
      <?php endif; ?>
        </div>
      </section>

  <!-- What We Offer-->
<section class="section section-md bg-default">
  <div class="container">
 
    <h3 class="oh-desktop text-center">
      <span class="d-inline-block wow slideInUp">Especialidades</span>
     
    </h3> <p class=" text-center">Las 13 áreas en las que nos destacamos con orgullo y compromiso.</p>
    
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




      <!-- Section CTA-->
      <section class="primary-overlay section parallax-container" data-parallax-img="views/assets/template/images/bg-3.jpg">
        <div class="parallax-content section-xl context-dark text-md-left">
          <div class="container">
            <div class="row justify-content-end">
              <div class="col-sm-8 col-md-7 col-lg-5">
                <div class="cta-modern">
                  <h3 class="cta-modern-title wow fadeInRight">Forjando un legado de honor y compromiso</h3>
                  <p class="lead">Una historia de valentía, compromiso y excelencia.</p>
                 <a class="button button-md button-secondary-2 button-winona wow fadeInUp" href="#" data-wow-delay=".2s">Más logros</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

<!-- Our Shop -->
<section class="section section-lg bg-default">
  <div class="container">
    <h3 class="oh-desktop text-center">
      <span class="d-inline-block wow slideInUp">Nuestros Logros</span>
      
    </h3><p class=" text-center">Un legado de esfuerzo, disciplina y servicio a la patria.</p>
    <div class="row row-lg row-30">

      <?php if (!empty($logrosTres)): ?>
        <?php foreach ($logrosTres as $logro): ?>
          <div class="col-sm-6 col-lg-4 col-xl-3 d-flex">
            <!-- Product -->
            <article class="product wow fadeInLeft d-flex flex-column h-100" data-wow-delay=".15s">
              <div class="product-figure">
                <?php
                // Obtener la primera imagen asociada a este logro
                $imagenes = $logroModel->obtenerImagenes($logro['id']);
                if (!empty($imagenes)):
                ?>
                  <img src="views/assets/img/logros/<?= htmlspecialchars($imagenes[0]['nombre_imagen']) ?>" 
                       class="w-100" style="height: 160px; object-fit: cover;" 
                       alt="Imagen del logro">
                <?php endif; ?>
              </div>
              <div class="product-rating">
                <span class="mdi mdi-star"></span>
                <span class="mdi mdi-star"></span>
                <span class="mdi mdi-star"></span>
                <span class="mdi mdi-star"></span>
                <span class="mdi mdi-star"></span>
              </div>
              <h6 class="product-title"><?= htmlspecialchars($logro['titulo']) ?></h6>
              <div class="product-price-wrap">
                <div class="product-price"><?= htmlspecialchars($logro['subtitulo']) ?></div>
              </div>
              <div class="product-button mt-auto">
                <div class="button-wrap">
                  <a class="button button-xs button-primary button-winona" 
                     href="index.php?controller=logro&action=detalle&id=<?= $logro['id'] ?>">
                    Ver Detalle
                  </a>
                </div>
              </div>
            </article>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="text-center">No hay logros disponibles.</p>
      <?php endif; ?>

    </div>

    <!-- Botón centrado -->
    <div class="text-center mt-4">
      <a class="button button-xs button-primary button-winona" href="index.php?controller=logro&action=index">Ver más logros</a>
    </div>
  </div>
</section>


      
      <!-- Section CTA-->
      <section class="primary-overlay section parallax-container" data-parallax-img="views/assets/template/images/bg-5.jpg">
        <div class="parallax-content section-xxl context-dark text-md-left">
          <div class="container">
            <div class="row justify-content-end">
              <div class="col-sm-9 col-md-7 col-lg-5">
                <div class="cta-modern">
                  <h3 class="cta-modern-title cta-modern-title-2 oh-desktop"><span class="d-inline-block wow fadeInLeft">Nuestros Emprendimientos</span></h3>
                  <p class="cta-modern-text cta-modern-text-2 oh-desktop" data-wow-delay=".1s"><span class="cta-modern-decor cta-modern-decor-2 wow slideInLeft"></span><span class="d-inline-block wow slideInUp">Convertimos nuestra disciplina en éxito, impulsando negocios y proyectos que fortalecen nuestra comunidad.</span></p><a class="button button-lg button-secondary button-winona wow fadeInRight" href="contacts.html" data-wow-delay=".2s">Impulsamos Juntos</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <section class="section section-lg bg-default">
  <div class="container">
    <h3 class="text-center">Emprendimientos</h3>
    <p class="text-center">Iniciativas y proyectos de nuestros miembros en la vida civil.</p>
    
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php 
        require_once 'controllers/EmprendimientoController.php';
        $emprendimientoController = new EmprendimientoController();
        $emprendimientos = $emprendimientoController->emprendimientoModel->getFirstThree();

        if (!empty($emprendimientos)):
          foreach ($emprendimientos as $emprendimiento): ?>
            <div class="col d-flex">
              <!-- Agregamos 'text-center' a la card para centrar todo su contenido -->
              <div class="card h-100 w-100 text-center">
                <?php
                  $imagenes = $emprendimientoController->emprendimientoModel->obtenerImagenes($emprendimiento['id']);
                  if (!empty($imagenes)):
                ?>
                  <img 
                    src="assets/img/emprendimientos/<?= htmlspecialchars($imagenes[0]['nombre_imagen']) ?>" 
                    class="card-img-top mx-auto"
                    style="height: 230px; object-fit: cover;"
                    alt="Imagen del emprendimiento"
                  >
                <?php endif; ?>

                <div class="card-body">
                  <h5 class="card-title"><?= htmlspecialchars($emprendimiento['nombre']) ?></h5>
                  <p class="card-text text-muted">
                    <?= htmlspecialchars(mb_strimwidth($emprendimiento['descripcion'], 0, 100, '...')) ?>
                  </p>
                  <p class="card-text">
                    <?= htmlspecialchars($emprendimiento['contactos']) ?>
                  </p>
                </div>

                <!-- Botón Ver Detalle centrado -->
           

                <div class="text-center mt-4">
      <a class="button button-xs button-primary button-winona" href="index.php?controller=emprendimiento&action=detalle&id=<?= $emprendimiento['id'] ?>">Información</a>
    </div>
     <br>
              </div>
            </div>
          <?php endforeach; 
        else: ?>
          <p class="text-center">No hay emprendimientos disponibles.</p>
        <?php endif; ?>
    </div>

    <!-- Botón Ver más -->

      <div class="text-center mt-4">
      <mient class="button button-xs button-primary button-winona" href="index.php?controller=emprendimiento&action=index">Ver más Emprendimientos</a>
    </div>
  </div>
</section>



<!-- Our Shop -->
<section class="section section-lg bg-default">
  <div class="container">
    <h3 class="oh-desktop text-center">
      <span class="d-inline-block wow slideInUp">Últimas Noticias</span>
      
    </h3>
    <p class=" text-center"> Mantente informado sobre eventos, reconocimientos y novedades.</p>
    <div class="row row-lg row-30">

      <?php if (!empty($noticiasTres)): ?>
        <?php foreach ($noticiasTres as $noticia): ?>
          <div class="col-sm-6 col-lg-4 col-xl-3 d-flex">
            <!-- Product -->
            <article class="product wow fadeInLeft d-flex flex-column h-100" data-wow-delay=".15s">
              <div class="product-figure">
                <?php 
                  // Obtener imágenes asociadas a esta noticia
                  $imagenes = $noticiaModel->obtenerImagenes($noticia['id']);
                  if (!empty($imagenes)):
                ?>
                   <img src="views/assets/img/noticias/<?= htmlspecialchars($imagenes[0]['nombre_imagen']) ?>" class="card-img-top" alt="Imagen de la noticia">
                <?php endif; ?>
              </div>
             
              <h6 class="product-title"><?= htmlspecialchars($noticia['titulo']) ?></h6>
              <div class="product-price-wrap">
                <div class="product-price"><?= htmlspecialchars(mb_strimwidth($noticia['subtitulo'], 0, 100, '...')) ?></div>
              </div>
              <div class="product-button mt-auto">
                <div class="button-wrap">
                  <a class="button button-xs button-primary button-winona" 
                     href="index.php?controller=noticia&action=detalle&id=<?= $noticia['id'] ?>">
                    Ver Detalle
                  </a>
                </div>
              </div>
            </article>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="text-center">No hay noticias disponibles.</p>
      <?php endif; ?>

    </div>

    <!-- Botón centrado -->
    <div class="text-center mt-4">
      <a class="button button-xs button-primary button-winona" href="index.php?controller=noticia&action=index">Ver más noticias</a>
    </div>
</section>

        <!-- LLAMADA DE FOOTER -->
<?php include 'layout/footer.php'; ?>


  </body>
</html>