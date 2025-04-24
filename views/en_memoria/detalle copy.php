
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detalle - En Memoria</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .thumbnail {
      width: 100%;
      max-width: 300px;
      height: auto;
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>
  <div class="container my-4">
    <?php if ($memoria): ?>
      <h1><?= htmlspecialchars($memoria['titulo']); ?></h1>
      <h3 class="text-muted"><?= htmlspecialchars($memoria['subtitulo']); ?></h3>
      <p><?= nl2br(htmlspecialchars($memoria['descripcion'])); ?></p>
      
      <hr>
      <h4>Imágenes Asociadas</h4>
      <?php if (!empty($imagenes)): ?>
        <div class="row">
          <?php foreach ($imagenes as $img): ?>
            <div class="col-md-4 mb-3">
              <img src="views/assets/img/in_memoria/<?= htmlspecialchars($img['nombre_imagen']); ?>" class="img-fluid thumbnail" alt="Imagen asociada">
            </div>
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <p>No hay imágenes asociadas a este registro.</p>
      <?php endif; ?>
      <a href="index.php?controller=enMemoria&action=index" class="btn btn-secondary mt-3">&larr; Volver</a>
    <?php else: ?>
      <p>No se encontró el registro.</p>
    <?php endif; ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
