<!-- views/emprendimiento/detalle.php -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detalles del Emprendimiento</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Opcional: Estilos para las imágenes en cuadrícula */
    .grid-img {
      width: 100%;
      height: auto;
      margin-bottom: 15px;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <div class="container my-4">
    <?php if ($emprendimiento): ?>
      <h1><?= htmlspecialchars($emprendimiento['nombre']); ?></h1>
      
      <!-- Se muestran todas las imágenes asociadas en una cuadrícula -->
      <?php if (!empty($imagenes)): ?>
        <div class="row mb-4">
          <?php foreach ($imagenes as $img): ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <img src="assets/img/emprendimientos/<?= htmlspecialchars($img['nombre_imagen']); ?>" class="img-fluid grid-img" alt="Imagen">
            </div>
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <img src="assets/img/emprendimientos/default.jpg" class="img-fluid mb-4" alt="Imagen">
      <?php endif; ?>

      <!-- Detalles del emprendimiento -->
      <div class="mb-3">
        <p><strong>Ubicación:</strong> <?= htmlspecialchars($emprendimiento['ubicacion']); ?></p>
        <p><strong>Contacto:</strong> <?= htmlspecialchars($emprendimiento['contactos']); ?></p>
        <p><strong>Descripción:</strong><br><?= nl2br(htmlspecialchars($emprendimiento['descripcion'])); ?></p>
        <p><strong>Segunda Descripción:</strong><br><?= nl2br(htmlspecialchars($emprendimiento['segunda_descripcion'])); ?></p>
      </div>

      <a href="index.php?controller=emprendimiento&action=index" class="btn btn-secondary mt-3">Volver</a>
    <?php else: ?>
      <p>No se encontró el emprendimiento.</p>
    <?php endif; ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
