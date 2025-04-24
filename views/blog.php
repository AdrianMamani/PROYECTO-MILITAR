<?php
// Incluir el modelo para poder obtener las imágenes asociadas a cada blog
require_once 'models/BlogAdmin.php';
$blogModel = new BlogAdmin();
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
            <h3 class="breadcrumbs-custom-title">BLOG</h3>
            <div class="breadcrumbs-custom-decor"></div>
          </div>
          <div class="box-transform" style="background-image: url(views/assets/template/images/bg-1.jpg);"></div>
        </div>
        <div class="container">
          <ul class="breadcrumbs-custom-path">
            <li><a href="index.php">Inicio</a></li>
            <li class="active">Nuestros Blog</li>
          </ul>
        </div>
      </section>
    

      <section class="section section-lg bg-default text-md-left">
  <div class="container">
    <div class="row row-60 justify-content-center">
      <div class="col-lg-12">
        <h3 class="mb-4 font-weight-bold text-uppercase">Explora Nuestro Blog</h3>
        <p class="mb-5 text-muted">Descubre historias, curiosidades y anécdotas inspiradoras. Mantente al día con nuestras novedades y promociones especiales.</p>
        <br>
        <div class="blog-list">



          <?php
if (!empty($blogs)) {
    foreach ($blogs as $blog) {
        echo '<article class="blog-item p-3 mb-4 shadow-sm rounded" style="cursor: pointer; transition: transform 0.2s ease-in-out;" onclick="window.location.href=\'index.php?controller=blog&action=detalle&id=' . urlencode($blog['id']) . '\'">';
        
        echo '<div class="row align-items-center">';

        // Columna de la imagen
        echo '<div class="col-md-4">';
        $imagenes = $blogModel->obtenerImagenes($blog['id']);
        if (!empty($imagenes)) {
            echo '<img src="views/assets/img/blog/' . htmlspecialchars($imagenes[0]['nombre_imagen']) . '" class="img-fluid rounded" alt="' . htmlspecialchars($blog['titulo']) . '" style="width: 100%; height: 200px; object-fit: cover;">';
        } else {
            echo '<img src="views/assets/img/blog/default.jpg" class="img-fluid rounded" alt="Imagen por defecto" style="width: 100%; height: 200px; object-fit: cover;">';
        }
        echo '</div>'; // Fin de col-md-4

        // Columna del contenido
        echo '<div class="col-md-8">';
        echo '<h4 class="heading-4 mb-2">' . htmlspecialchars($blog['titulo']) . '</h4>';
        echo '<p class="blog-description text-muted"><strong>' . htmlspecialchars($blog['subtitulo']) . '</strong></p>';
 
        echo '<p class="blog-description text-muted">' . htmlspecialchars(substr($blog['descripcion'], 0, 250)) . (strlen($blog['descripcion']) > 250 ? '...' : '') . '</p>';
        echo '</div>'; // Fin de col-md-8

        echo '</div>'; // Fin de row
       
        echo '</article>'; // Fin de blog-item
        echo '<hr>'; // Fin de row
    }
} else {
    echo '<p class="text-muted">No hay blogs disponibles en este momento.</p>';
}
?>


     
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  .blog-item:hover {
    transform: scale(1.02);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

</style>
     <!-- LLAMADA DE FOOTER -->
     <?php include 'layout/footer.php'; ?>

  </body>
</html>