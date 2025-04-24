<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Detalle de Miembro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
  <div class="container my-4">
    <a href="javascript:history.back()" class="btn btn-secondary mb-4">
      &larr; Volver
    </a>

    <?php if ($miembro): ?>
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <?php 
              // Obtener las imágenes del miembro
              $imagenes = Miembro::obtenerImagenes($miembro['id']);
              if (!empty($imagenes)) {
                // Mostrar la primera imagen asociada
                $imagen = $imagenes[0]; // Tomamos la primera imagen asociada
                echo '<img src="assets/img/miembros/' . htmlspecialchars($imagen['nombre_imagen']) . '" class="card-img-top" alt="' . htmlspecialchars($miembro['nombre']) . '" style="max-height: 200px; object-fit: cover;" />';
              }
            ?>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($miembro['nombre']) ?></h5>
              <p class="card-text"><?= htmlspecialchars($miembro['descripcion']) ?></p>
              <p><strong>Especialidad:</strong> <?= htmlspecialchars($miembro['especialidad']) ?></p>
            </div>
          </div>
        </div>
      </div>

      <!-- Mostrar todas las imágenes asociadas al miembro -->
      <h4>Imágenes adicionales</h4>
      <div class="row">
        <?php foreach ($imagenes as $imagen): ?>
          <div class="col-md-3 mb-3">
            <img src="assets/img/miembros/<?= htmlspecialchars($imagen['nombre_imagen']) ?>" class="img-fluid" alt="Imagen miembro" />
          </div>
        <?php endforeach; ?>
      </div>

    <?php else: ?>
      <p>No se encontró el miembro solicitado.</p>
    <?php endif; ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
