<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Nosotros - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Sección "Nosotros"</h1>
        <a href="index.php?controller=admin&action=dashboard" class="btn btn-secondary mt-3">Volver al Dashboard</a>
        <?php foreach ($nosotros as $info): ?>
            <!-- Mostrar imagen actual en una tabla -->
            <h2 class="mt-4">Datos Actuales:</h2>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Subtítulo</th>
                        <th>Descripción</th>
                        <th>Descripción 2</th>
                        <th>Imagen</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= htmlspecialchars($info['titulo']) ?></td>
                        <td><?= htmlspecialchars($info['subtitulo']) ?></td>
                        <td><?= htmlspecialchars($info['descripcion']) ?></td>
                        <td><?= htmlspecialchars($info['descripcion2']) ?></td>
                        <td>
                            <!-- Mostrar la imagen actual -->
                            <img src="views/assets/img/<?= htmlspecialchars($info['imagen']) ?>" alt="Imagen de Nosotros" style="width: 100px; height: auto;">
                        </td>
                        <td>
                            <!-- Botón para abrir el modal de edición -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= htmlspecialchars($info['id']) ?>">
                                Editar
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Modal de edición -->
            <div class="modal fade" id="editModal<?= htmlspecialchars($info['id']) ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Editar Sección "Nosotros"</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Formulario de edición de "Nosotros" dentro del modal -->
                            <form action="index.php?controller=nosotros&action=update" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($info['id']) ?>" />

                                <div class="mb-3">
                                    <label for="titulo" class="form-label">Título</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?= htmlspecialchars($info['titulo']) ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="subtitulo" class="form-label">Subtítulo</label>
                                    <input type="text" class="form-control" id="subtitulo" name="subtitulo" value="<?= htmlspecialchars($info['subtitulo']) ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required><?= htmlspecialchars($info['descripcion']) ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="descripcion2" class="form-label">Descripción 2</label>
                                    <textarea class="form-control" id="descripcion2" name="descripcion2" rows="4"><?= htmlspecialchars($info['descripcion2']) ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="imagen" class="form-label">Imagen</label>
                                    <input type="file" class="form-control" id="imagen" name="imagen" />
                                    <small>Sube una nueva imagen (si deseas cambiarla).</small>
                                </div>

                                <button type="submit" class="btn btn-success">Guardar cambios</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</body>
</html>
