
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Especialidades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <h1>Administrar Especialidades</h1>

        <h3>Agregar Nueva Especialidad</h3>
        <a href="index.php?controller=admin&action=dashboard" class="btn btn-secondary mt-3">Volver al Dashboard</a>

        <form action="index.php?controller=especialidad&action=guardar" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="imagenes" class="form-label">Imágenes</label>
                <input type="file" class="form-control" id="imagenes" name="imagenes[]" multiple>
                <small>Selecciona una o más imágenes (PNG, JPG, JPEG)</small>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Especialidad</button>
        </form>

        <h3 class="mt-5">Lista de Especialidades</h3>
        <table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Imágenes</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($especialidades as $especialidad): ?>
            <tr>
                <td><?= htmlspecialchars($especialidad['nombre']) ?></td>
                <td><?= htmlspecialchars($especialidad['descripcion']) ?></td>
                <td>
                    <!-- Mostrar las imágenes asociadas a la especialidad -->
                    <div>
        <?php
        $imagenes = Especialidad::getImagenesByEspecialidad($especialidad['id']);
        foreach ($imagenes as $imagen) {
            echo '<div>';
            echo '<img src="views/assets/img/especialidad/' . htmlspecialchars($imagen['nombre_imagen']) . '" width="100" height="100" class="img-thumbnail" alt="Imagen Especialidad">';
            echo '<p>ID: ' . htmlspecialchars($imagen['id']) . '</p>';
            // Botón de eliminar imagen dentro de la columna de imágenes
            echo '<a href="index.php?controller=especialidad&action=eliminarImagen&especialidad_id=' . $especialidad['id'] . '&imagen_id=' . $imagen['id'] . '" class="btn btn-danger" onclick="return confirm(\'¿Estás seguro de que deseas eliminar esta imagen?\')">Eliminar Imagen</a>';
            echo '</div>';
        }
        ?>
    </div>
                </td>
                <td>
                    <!-- Botón de editar especialidad -->
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $especialidad['id'] ?>">Editar</button>

                    <!-- Modal de Edición -->
                    <div class="modal fade" id="editModal<?= $especialidad['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Editar Especialidad</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="index.php?controller=especialidad&action=actualizar" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?= $especialidad['id'] ?>" />
                                        <div class="mb-3">
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($especialidad['nombre']) ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="descripcion" class="form-label">Descripción</label>
                                            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required><?= htmlspecialchars($especialidad['descripcion']) ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="imagenes" class="form-label">Imágenes</label>
                                            <input type="file" class="form-control" id="imagenes" name="imagenes[]" multiple>
                                            <small>Selecciona una o más imágenes (PNG, JPG, JPEG)</small>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Actualizar Especialidad</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botón de eliminar especialidad -->
                    <a href="index.php?controller=especialidad&action=eliminar&id=<?= $especialidad['id'] ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta especialidad?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
