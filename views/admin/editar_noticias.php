<?php
// Si la variable $noticia no está definida (modo creación), se inicializa como array vacío.
if (!isset($noticia)) {
    $noticia = [];
}

// Instanciar el modelo NoticiaAdmin para obtener la lista de noticias
require_once 'models/NoticiaAdmin.php';
$noticiaModel = new NoticiaAdmin();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrar Noticias</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .thumbnail {
      width: 100px;
      height: 100px;
      object-fit: cover;
      margin: 5px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    .img-container {
      position: relative;
      display: inline-block;
    }
    .delete-btn {
      position: absolute;
      top: 0;
      right: 0;
      background: rgba(255,0,0,0.8);
      color: #fff;
      border: none;
      border-radius: 50%;
      width: 20px;
      height: 20px;
      line-height: 18px;
      text-align: center;
      cursor: pointer;
      text-decoration: none;
    }
  </style>
</head>
<body>
<div class="container my-5">
  <h1>Administrar Noticias</h1>

  <!-- Formulario para crear o editar una noticia -->
  <div class="card mb-4">
    <div class="card-header">
      <?= isset($noticia['id']) ? 'Editar Noticia' : 'Crear Noticia' ?>
    </div>
    <div class="card-body">
      <form action="index.php?controller=noticiaAdmin&action=guardar" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="titulo" class="form-label">Título</label>
          <input type="text" class="form-control" id="titulo" name="titulo" value="<?= isset($noticia['titulo']) ? htmlspecialchars($noticia['titulo']) : '' ?>" required>
        </div>
        <div class="mb-3">
          <label for="subtitulo" class="form-label">Subtítulo</label>
          <input type="text" class="form-control" id="subtitulo" name="subtitulo" value="<?= isset($noticia['subtitulo']) ? htmlspecialchars($noticia['subtitulo']) : '' ?>" required>
        </div>
        <div class="mb-3">
          <label for="descripcion" class="form-label">Texto Completo</label>
          <textarea class="form-control" id="descripcion" name="descripcion" rows="5" required><?= isset($noticia['descripcion']) ? htmlspecialchars($noticia['descripcion']) : '' ?></textarea>
        </div>
        <div class="mb-3">
          <label for="imagenes" class="form-label">Agregar Imágenes</label>
          <input type="file" class="form-control" id="imagenes" name="imagenes[]" multiple <?= isset($noticia['id']) ? '' : 'required' ?>>
          <small class="form-text text-muted">Seleccione una o más imágenes.</small>
        </div>
        <?php if (isset($noticia['id'])): ?>
          <input type="hidden" name="id" value="<?= $noticia['id'] ?>">
        <?php endif; ?>
        <button type="submit" class="btn btn-primary"><?= isset($noticia['id']) ? 'Actualizar Noticia' : 'Crear Noticia' ?></button>
        <?php if (isset($noticia['id'])): ?>
          <a href="index.php?controller=noticiaAdmin&action=index" class="btn btn-secondary">Cancelar</a>
        <?php endif; ?>
      </form>
    </div>
  </div>

  <!-- Si se está editando, mostrar las imágenes asociadas -->
  <?php if (isset($noticia['id'])): ?>
    <?php $imagenes = $noticiaModel->obtenerImagenes($noticia['id']); ?>
    <?php if (!empty($imagenes)): ?>
      <div class="mb-4">
        <h3>Imágenes Asociadas</h3>
        <div>
          <?php foreach ($imagenes as $img): ?>
            <div class="img-container d-inline-block">
              <img src="views/assets/img/noticias/<?= htmlspecialchars($img['nombre_imagen']) ?>" class="thumbnail" alt="Imagen">
              <a href="index.php?controller=noticiaAdmin&action=eliminarImagen&imagen_id=<?= $img['id'] ?>&noticia_id=<?= $noticia['id'] ?>" class="delete-btn" onclick="return confirm('¿Desea eliminar esta imagen?')">&times;</a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>
  <?php endif; ?>

  <!-- Lista de noticias -->
  <h2>Lista de Noticias</h2>
  <?php
    $todosNoticias = $noticiaModel->getAll();
  ?>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Subtítulo</th>
        <th>Texto</th>
        <th>Imágenes</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($todosNoticias)): ?>
        <?php foreach ($todosNoticias as $n): ?>
          <tr>
            <td><?= htmlspecialchars($n['id']) ?></td>
            <td><?= htmlspecialchars($n['titulo']) ?></td>
            <td><?= htmlspecialchars($n['subtitulo']) ?></td>
            <td><?= htmlspecialchars($n['descripcion']) ?></td>
            <td>
              <?php
                $imgs = $noticiaModel->obtenerImagenes($n['id']);
                if (!empty($imgs)):
                  foreach ($imgs as $im):
              ?>
                    <img src="views/assets/img/noticias/<?= htmlspecialchars($im['nombre_imagen']) ?>" class="thumbnail" alt="Imagen">
              <?php
                  endforeach;
                else:
                  echo "Sin imágenes";
                endif;
              ?>
            </td>
            <td>
              <a href="index.php?controller=noticiaAdmin&action=editar&id=<?= $n['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
              <a href="index.php?controller=noticiaAdmin&action=eliminar&id=<?= $n['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar esta noticia?')">Eliminar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="6" class="text-center">No hay noticias registradas.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
