<?php
// Si la variable $item no está definida (modo creación), se inicializa como array vacío.
if (!isset($item)) {
    $item = [];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrar En Memoria</title>
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
      background-color: rgba(255,0,0,0.8);
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
  <h1>Administrar En Memoria</h1>

  <!-- Formulario para crear o editar un registro -->
  <div class="card mb-4">
    <div class="card-header">
      <?= isset($item['id']) ? 'Editar En Memoria' : 'Crear En Memoria' ?>
    </div>
    <div class="card-body">
      <form action="index.php?controller=inMemoriaAdmin&action=guardar" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="titulo" class="form-label">Título</label>
          <input type="text" class="form-control" id="titulo" name="titulo" value="<?= isset($item['titulo']) ? htmlspecialchars($item['titulo']) : '' ?>" required>
        </div>
        <div class="mb-3">
          <label for="subtitulo" class="form-label">Subtítulo</label>
          <input type="text" class="form-control" id="subtitulo" name="subtitulo" value="<?= isset($item['subtitulo']) ? htmlspecialchars($item['subtitulo']) : '' ?>" required>
        </div>
        <div class="mb-3">
          <label for="descripcion" class="form-label">Descripción</label>
          <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?= isset($item['descripcion']) ? htmlspecialchars($item['descripcion']) : '' ?></textarea>
        </div>
        <div class="mb-3">
          <label for="imagenes" class="form-label">Agregar Imágenes</label>
          <input type="file" class="form-control" id="imagenes" name="imagenes[]" multiple <?= isset($item['id']) ? '' : 'required' ?>>
          <small class="form-text text-muted">Seleccione una o más imágenes.</small>
        </div>
        <?php if (isset($item['id'])): ?>
          <input type="hidden" name="id" value="<?= $item['id'] ?>">
        <?php endif; ?>
        <button type="submit" class="btn btn-primary"><?= isset($item['id']) ? 'Actualizar En Memoria' : 'Crear En Memoria' ?></button>
        <?php if (isset($item['id'])): ?>
          <a href="index.php?controller=inMemoriaAdmin&action=index" class="btn btn-secondary">Cancelar</a>
        <?php endif; ?>
      </form>
    </div>
  </div>

  <!-- Si se está editando, mostrar las imágenes asociadas -->
  <?php if (isset($item['id'])): ?>
    <?php
      // Instanciar el modelo para obtener las imágenes asociadas
      require_once 'models/EnMemoria.php';
      $enMemoriaModel = new EnMemoria();
      $imagenes = $enMemoriaModel->obtenerImagenes($item['id']);
    ?>
    <?php if (!empty($imagenes)): ?>
      <div class="mb-4">
        <h3>Imágenes Asociadas</h3>
        <div>
          <?php foreach ($imagenes as $img): ?>
            <div class="img-container d-inline-block">
              <img src="views/assets/img/in_memoria/<?= htmlspecialchars($img['nombre_imagen']) ?>" class="thumbnail" alt="Imagen">
              <a href="index.php?controller=inMemoriaAdmin&action=eliminarImagen&imagen_id=<?= $img['id'] ?>&item_id=<?= $item['id'] ?>" class="delete-btn" onclick="return confirm('¿Desea eliminar esta imagen?')">&times;</a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>
  <?php endif; ?>

  <!-- Lista de registros en memoria -->
  <h2>Lista de Registros en Memoria</h2>
  <?php
    // Instanciar el modelo para obtener la lista completa
    // (Si ya no se ha instanciado, lo hacemos aquí)
    if (!isset($enMemoriaModel)) {
        require_once 'models/EnMemoria.php';
        $enMemoriaModel = new EnMemoria();
    }
    $todosItems = $enMemoriaModel->getAll();
  ?>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Subtítulo</th>
        <th>Descripción</th>
        <th>Imágenes</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($todosItems)): ?>
        <?php foreach ($todosItems as $memoria): ?>
          <tr>
            <td><?= htmlspecialchars($memoria['id']) ?></td>
            <td><?= htmlspecialchars($memoria['titulo']) ?></td>
            <td><?= htmlspecialchars($memoria['subtitulo']) ?></td>
            <td><?= htmlspecialchars($memoria['descripcion']) ?></td>
            <td>
              <?php
                $imgs = $enMemoriaModel->obtenerImagenes($memoria['id']);
                if (!empty($imgs)):
                  foreach ($imgs as $im):
              ?>
                    <img src="views/assets/img/in_memoria/<?= htmlspecialchars($im['nombre_imagen']) ?>" class="thumbnail" alt="Imagen">
              <?php
                  endforeach;
                else:
                  echo "Sin imágenes";
                endif;
              ?>
            </td>
            <td>
              <a href="index.php?controller=inMemoriaAdmin&action=editar&id=<?= $memoria['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
              <a href="index.php?controller=inMemoriaAdmin&action=eliminar&id=<?= $memoria['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este registro?')">Eliminar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="6" class="text-center">No hay registros en memoria.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
