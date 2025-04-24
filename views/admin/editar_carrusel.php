<?php
// Si la variable $slide no está definida (modo creación), se inicializa como array vacío.
if (!isset($slide)) {
    $slide = [];
}

// Instanciar el modelo para obtener la lista de slides
require_once 'models/Carrusel.php';
$carruselModel = new Carrusel();
$slides = $carruselModel->getAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administrar Carrusel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .thumbnail {
      width: 150px;
      height: auto;
      object-fit: cover;
      margin: 5px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
  </style>
</head>
<body>
<div class="container my-4">
  <h1>Administrar Carrusel</h1>
  
  <!-- Formulario para crear o editar un slide -->
  <div class="card mb-4">
    <div class="card-header">
      <?= isset($slide['id']) ? 'Editar Slide' : 'Agregar Slide' ?>
    </div>
    <div class="card-body">
      <form action="index.php?controller=carruselAdmin&action=guardar" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="titulo" class="form-label">Título</label>
          <input type="text" class="form-control" id="titulo" name="titulo" value="<?= isset($slide['titulo']) ? htmlspecialchars($slide['titulo']) : '' ?>" required>
        </div>
        <div class="mb-3">
          <label for="subtitulo" class="form-label">Subtítulo</label>
          <input type="text" class="form-control" id="subtitulo" name="subtitulo" value="<?= isset($slide['subtitulo']) ? htmlspecialchars($slide['subtitulo']) : '' ?>" required>
        </div>
        <div class="mb-3">
          <label for="descripcion" class="form-label">Descripción</label>
          <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?= isset($slide['descripcion']) ? htmlspecialchars($slide['descripcion']) : '' ?></textarea>
        </div>
        <div class="mb-3">
          <label for="imagen" class="form-label">Imagen</label>
          <input type="file" class="form-control" id="imagen" name="imagen" <?= isset($slide['id']) ? '' : 'required' ?>>
          <small class="form-text text-muted">Seleccione la imagen del slide.</small>
        </div>
        <?php if (isset($slide['id'])): ?>
          <input type="hidden" name="id" value="<?= $slide['id'] ?>">
        <?php endif; ?>
        <button type="submit" class="btn btn-primary"><?= isset($slide['id']) ? 'Actualizar Slide' : 'Agregar Slide' ?></button>
        <?php if (isset($slide['id'])): ?>
          <a href="index.php?controller=carruselAdmin&action=index" class="btn btn-secondary">Cancelar</a>
        <?php endif; ?>
      </form>
    </div>
  </div>
  
  <!-- Lista de slides -->
  <h2>Lista de Slides del Carrusel</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Subtítulo</th>
        <th>Descripción</th>
        <th>Imagen</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($slides)): ?>
        <?php foreach ($slides as $s): ?>
          <tr>
            <td><?= htmlspecialchars($s['id']) ?></td>
            <td><?= htmlspecialchars($s['titulo']) ?></td>
            <td><?= htmlspecialchars($s['subtitulo']) ?></td>
            <td><?= htmlspecialchars($s['descripcion']) ?></td>
            <td>
              <img src="views/assets/img/carrusel/<?= htmlspecialchars($s['imagen']) ?>" class="thumbnail" alt="Imagen">
            </td>
            <td>
              <a href="index.php?controller=carruselAdmin&action=editar&id=<?= $s['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
              <?php if ($carruselModel->countAll() > 1): ?>
                <a href="index.php?controller=carruselAdmin&action=eliminar&id=<?= $s['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este slide?')">Eliminar</a>
              <?php else: ?>
                <button class="btn btn-danger btn-sm" disabled>Eliminar</button>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="6" class="text-center">No hay slides en el carrusel.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
