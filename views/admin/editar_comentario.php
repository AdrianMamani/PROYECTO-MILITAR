<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Comentarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <h1>Administrar Comentarios</h1>

        <!-- Botón para agregar un nuevo comentario -->
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalComentario">Agregar Comentario</button>

        <!-- Modal para agregar comentario -->
        <div class="modal fade" id="modalComentario" tabindex="-1" aria-labelledby="modalComentarioLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalComentarioLabel">Agregar Comentario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <form action="index.php?controller=comentarioadmin&action=agregar" method="POST">
                            <!-- Campo oculto para el token -->
                            <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">

                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título</label>
                                <input type="text" class="form-control" name="titulo" required>
                            </div>

                            <div class="mb-3">
                                <label for="subtitulo" class="form-label">Subtítulo</label>
                                <input type="text" class="form-control" name="subtitulo" required>
                            </div>

                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" name="descripcion" rows="3" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Publicar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla de comentarios -->
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Subtítulo</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comentarios as $comentario): ?>
                    <tr>
                        <td><?= htmlspecialchars($comentario['id']); ?></td>
                        <td><?= htmlspecialchars($comentario['titulo']); ?></td>
                        <td><?= htmlspecialchars($comentario['subtitulo']); ?></td>
                        <td><?= nl2br(htmlspecialchars($comentario['descripcion'])); ?></td>
                        <td>
                            <!-- Botón de Eliminar -->
                            <a href="index.php?controller=comentarioadmin&action=eliminar&id=<?= $comentario['id']; ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Botón para ir al Dashboard -->
        <a href="index.php?controller=admin&action=dashboard" class="btn btn-secondary mt-3">Volver al Dashboard</a>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
