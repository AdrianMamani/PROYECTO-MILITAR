<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrar Miembros</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
  <div class="container mt-5">
    <h1>Administrar Miembros</h1>

    <!-- Botón para abrir el modal de agregar miembro -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarMiembroModal">
      Agregar Miembro
    </button>

    <!-- Lista de miembros -->
    <h3>Lista de Miembros</h3>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Especialidad</th>
          <th>Imágenes</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php if (isset($miembros) && !empty($miembros)): ?>
          <?php foreach ($miembros as $miembro): ?>
            <tr>
              <td><?= htmlspecialchars($miembro['nombre']) ?></td>
              <td><?= htmlspecialchars($miembro['descripcion']) ?></td>
              <td><?= htmlspecialchars($miembro['especialidad']) ?></td>
              <td>
                <?php 
                $imagenes = Miembro::obtenerImagenes($miembro['id']);
                foreach ($imagenes as $imagen): ?>
                  <div style="display:inline-block; text-align: center; margin-right: 10px;">
                    <img src="assets/img/miembros/<?= htmlspecialchars($imagen['nombre_imagen']) ?>" width="100" height="100" class="img-thumbnail" alt="Imagen Miembro">
                    <small>ID: <?= htmlspecialchars($imagen['id']) ?></small>
                  </div>
                <?php endforeach; ?>
              </td>
              <td>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $miembro['id'] ?>">Editar</button>
                <a href="index.php?controller=miembro&action=eliminar&id=<?= $miembro['id'] ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este miembro?')">Eliminar</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="5">No hay miembros registrados.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <!-- Modal para agregar un miembro -->
  <div class="modal fade" id="agregarMiembroModal" tabindex="-1" aria-labelledby="agregarMiembroModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="agregarMiembroModalLabel">Agregar Miembro</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="index.php?controller=miembro&action=guardar" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripción</label>
              <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="mb-3">
              <label for="especialidad_id" class="form-label">Especialidad</label>
              <select class="form-control" id="especialidad_id" name="especialidad_id" required>
                <?php foreach ($especialidades as $especialidad): ?>
                  <option value="<?= $especialidad['id'] ?>"><?= $especialidad['nombre'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="imagenes" class="form-label">Imágenes</label>
              <input type="file" class="form-control" id="imagenes" name="imagenes[]" multiple>
              <small class="form-text text-muted">Puedes seleccionar varias imágenes.</small>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Miembro</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de Edición -->
  <?php foreach ($miembros as $miembro): ?>
    <div class="modal fade" id="editModal<?= $miembro['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $miembro['id'] ?>" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel<?= $miembro['id'] ?>">Editar Miembro</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="index.php?controller=miembro&action=actualizar&id=<?= $miembro['id'] ?>" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="nombre_<?= $miembro['id'] ?>" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre_<?= $miembro['id'] ?>" name="nombre" value="<?= htmlspecialchars($miembro['nombre']) ?>" required>
              </div>
              <div class="mb-3">
                <label for="descripcion_<?= $miembro['id'] ?>" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion_<?= $miembro['id'] ?>" name="descripcion" rows="3" required><?= htmlspecialchars($miembro['descripcion']) ?></textarea>
              </div>
              <div class="mb-3">
                <label for="especialidad_id_<?= $miembro['id'] ?>" class="form-label">Especialidad</label>
                <select class="form-control" id="especialidad_id_<?= $miembro['id'] ?>" name="especialidad_id" required>
                  <?php foreach ($especialidades as $especialidad): ?>
                    <option value="<?= $especialidad['id'] ?>" <?= $miembro['especialidad_id'] == $especialidad['id'] ? 'selected' : '' ?>>
                      <?= htmlspecialchars($especialidad['nombre']) ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <!-- Mostrar las imágenes actuales del miembro con opción de eliminación -->
              <div class="mb-3">
                <label class="form-label">Imágenes actuales</label>
                <div>
                  <?php $imagenes = Miembro::obtenerImagenes($miembro['id']); ?>
                  <?php foreach ($imagenes as $imagen): ?>
                    <div style="display: inline-block; text-align: center; margin-right: 10px;">
                      <img src="assets/img/miembros/<?= htmlspecialchars($imagen['nombre_imagen']) ?>" alt="Imagen" style="width: 100px; height: 100px; display: block;">
                      <small>ID: <?= htmlspecialchars($imagen['id']) ?></small><br>
                      <a href="index.php?controller=miembro&action=eliminarImagen&imagen_id=<?= $imagen['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta imagen?')">Eliminar Foto</a>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="mb-3">
                <label for="imagenes_<?= $miembro['id'] ?>" class="form-label">Agregar Imágenes</label>
                <input type="file" class="form-control" id="imagenes_<?= $miembro['id'] ?>" name="imagenes[]" multiple>
                <small class="form-text text-muted">Puedes seleccionar varias imágenes.</small>
              </div>
              <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

  <!-- Scripts de Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
