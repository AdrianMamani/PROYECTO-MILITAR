<?php
// Si la variable $logros no está definida, se inicializa como array vacío
if (!isset($logros)) {
    $logros = [];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrar Logros</title>
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
    .img-delete {
      position: absolute;
      top: 0;
      right: 0;
      background: rgba(255,0,0,0.7);
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
<div class="container mt-5">
  <h1>Administrar Logros</h1>

  <!-- Botón para abrir el modal de Crear Logro -->
  <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#crearLogroModal">
    Crear Logro
  </button>

  <!-- Modal Crear Logro -->
  <div class="modal fade" id="crearLogroModal" tabindex="-1" aria-labelledby="crearLogroModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
      <form action="index.php?controller=logro&action=guardar" method="POST" enctype="multipart/form-data">

          <div class="modal-header">
            <h5 class="modal-title" id="crearLogroModalLabel">Crear Logro</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="titulo" class="form-label">Título</label>
              <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="mb-3">
              <label for="subtitulo" class="form-label">Subtítulo</label>
              <input type="text" class="form-control" id="subtitulo" name="subtitulo" required>
            </div>
            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripción</label>
              <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="mb-3">
              <label for="imagenes" class="form-label">Imágenes</label>
              <input type="file" class="form-control" id="imagenes" name="imagenes[]" multiple required>
              <small class="form-text text-muted">Seleccione una o más imágenes.</small>
            </div>
            <!-- Campo oculto para id (vacío en creación) -->
            <input type="hidden" name="id" value="">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Guardar Logro</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Lista de Logros -->
  <h2>Lista de Logros</h2>
  <?php
    // Se vuelve a instanciar el modelo para obtener la lista
    require_once 'models/LogroAdmin.php';
    $logroModel = new LogroAdmin();
    $todosLogros = $logroModel->getAll();
  ?>
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Título</th>
        <th>Subtítulo</th>
        <th>Descripción</th>
        <th>Imágenes</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($todosLogros as $l): ?>
        <?php $imgs = $logroModel->obtenerImagenes($l['id']); ?>
        <tr>
          <td><?= htmlspecialchars($l['id']) ?></td>
          <td><?= htmlspecialchars($l['titulo']) ?></td>
          <td><?= htmlspecialchars($l['subtitulo']) ?></td>
          <td><?= htmlspecialchars($l['descripcion']) ?></td>
          <td>
            <?php if (!empty($imgs)): ?>
              <?php foreach ($imgs as $im): ?>
                <div class="img-container d-inline-block">
                  <img src="views/assets/img/logros/<?= htmlspecialchars($im['nombre_imagen']) ?>" class="thumbnail" alt="Imagen">
                  <a href="index.php?controller=logro&action=eliminarImagen&id=<?= $im['id'] ?>" 
   class="img-delete" 
   onclick="return confirm('¿Eliminar imagen?')">
   &times;
</a>

                </div>
              <?php endforeach; ?>
            <?php else: ?>
              Sin imágenes
            <?php endif; ?>
          </td>
          <td>
            <!-- Botón para abrir el modal de editar -->
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarLogroModal<?= $l['id'] ?>">
              Editar
            </button>
    
            <a href="index.php?controller=logro&action=eliminar&id=<?= $l['id'] ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este logro?')">Eliminar</a>

          </td>
        </tr>

        <!-- Modal Editar Logro para este logro -->
        <div class="modal fade" id="editarLogroModal<?= $l['id'] ?>" tabindex="-1" aria-labelledby="editarLogroModalLabel<?= $l['id'] ?>" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
            <form action="index.php?controller=logro&action=guardar" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                  <h5 class="modal-title" id="editarLogroModalLabel<?= $l['id'] ?>">Editar Logro</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="titulo<?= $l['id'] ?>" class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo<?= $l['id'] ?>" name="titulo" value="<?= htmlspecialchars($l['titulo']) ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="subtitulo<?= $l['id'] ?>" class="form-label">Subtítulo</label>
                    <input type="text" class="form-control" id="subtitulo<?= $l['id'] ?>" name="subtitulo" value="<?= htmlspecialchars($l['subtitulo']) ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="descripcion<?= $l['id'] ?>" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion<?= $l['id'] ?>" name="descripcion" rows="3" required><?= htmlspecialchars($l['descripcion']) ?></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="imagenes<?= $l['id'] ?>" class="form-label">Agregar Imágenes</label>
                    <input type="file" class="form-control" id="imagenes<?= $l['id'] ?>" name="imagenes[]" multiple>
                    <small class="form-text text-muted">Seleccione una o más imágenes para agregar.</small>
                  </div>
                  <!-- Campo oculto con el id del logro -->
                  <input type="hidden" name="id" value="<?= $l['id'] ?>">
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
