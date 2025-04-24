
<body>
  <div class="container my-4">
    <?php if (isset($blog)) { ?>
      <!-- Datos principales del blog -->
      <h1><?= htmlspecialchars($blog['titulo']); ?></h1>
      <h5 class="text-muted"><?= htmlspecialchars($blog['subtitulo']); ?></h5>
      <p><?= nl2br(htmlspecialchars($blog['descripcion'])); ?></p>
      <hr>

      <!-- Sección de imágenes -->
      <h4>Imágenes del Blog</h4>
      <div class="row">
        <?php 
          if (!empty($imagenes)) {
            // Si hay imágenes, mostrar la primera imagen o todas según el caso
            foreach ($imagenes as $img) {
              echo '<div class="col-md-4 mb-3">';
              echo '<img src="views/assets/img/blog/' . htmlspecialchars($img['nombre_imagen']) . '" class="img-grid img-fluid" alt="Imagen del blog">';
              echo '</div>';
            }
          } else {
            echo '<div class="col-12"><p>No hay imágenes adicionales para este blog.</p></div>';
          }
        ?>
      </div>

      <a href="index.php?controller=blog&action=index" class="btn btn-primary">Volver al Blog</a>
    <?php } else { ?>
      <p>No se encontró el blog.</p>
      <a href="index.php?controller=blog&action=index" class="btn btn-primary">Volver al Blog</a>
    <?php } ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>