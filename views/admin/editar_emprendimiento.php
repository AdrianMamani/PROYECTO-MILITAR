<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Administrar Emprendimientos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <h1>Administrar Emprendimientos</h1>

        <!-- Botón para agregar un nuevo emprendimiento -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#crearModal">
            Agregar Emprendimiento
        </button>

        <!-- Tabla de emprendimientos -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Ubicación</th>
                    <th>Imágenes</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($emprendimientos)): ?>
                    <?php foreach ($emprendimientos as $emprendimiento): ?>
                        <tr>
                            <td><?= htmlspecialchars($emprendimiento['nombre']) ?></td>
                            <td><?= htmlspecialchars(mb_strimwidth($emprendimiento['descripcion'], 0, 50, '...')) ?></td>
                            <td><?= htmlspecialchars($emprendimiento['ubicacion']) ?></td>
                            <td>
                                <?php
                                // Se obtiene un listado de imágenes para el emprendimiento
                                $imgs = (new Emprendimiento())->obtenerImagenes($emprendimiento['id']);
                                if (!empty($imgs)):
                                    foreach ($imgs as $img):
                                        echo '<img src="assets/img/emprendimientos/' . htmlspecialchars($img['nombre_imagen']) . '" alt="Imagen" style="width:50px; height:50px; object-fit:cover; margin-right:5px;">';
                                    endforeach;
                                else:
                                    echo 'Sin imágenes';
                                endif;
                                ?>
                            </td>
                            <td>
                                <!-- Botón para editar -->
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarModal<?= $emprendimiento['id'] ?>">
                                    Editar
                                </button>
                                <!-- Botón para eliminar -->
                                <a href="index.php?controller=emprendimiento&action=eliminar&id=<?= $emprendimiento['id'] ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este emprendimiento?')">
                                    Eliminar
                                </a>
                            </td>
                        </tr>

                        <!-- Modal para editar emprendimiento -->
                        <div class="modal fade" id="editarModal<?= $emprendimiento['id'] ?>" tabindex="-1" aria-labelledby="editarModalLabel<?= $emprendimiento['id'] ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarModalLabel<?= $emprendimiento['id'] ?>">Editar Emprendimiento</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="index.php?controller=emprendimiento&action=guardar" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?= $emprendimiento['id'] ?>">
                                            <div class="mb-3">
                                                <label for="nombre<?= $emprendimiento['id'] ?>" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="nombre<?= $emprendimiento['id'] ?>" name="nombre" value="<?= htmlspecialchars($emprendimiento['nombre']) ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="descripcion<?= $emprendimiento['id'] ?>" class="form-label">Descripción</label>
                                                <textarea class="form-control" id="descripcion<?= $emprendimiento['id'] ?>" name="descripcion" rows="3" required><?= htmlspecialchars($emprendimiento['descripcion']) ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="contactos<?= $emprendimiento['id'] ?>" class="form-label">Contactos</label>
                                                <input type="text" class="form-control" id="contactos<?= $emprendimiento['id'] ?>" name="contactos" value="<?= htmlspecialchars($emprendimiento['contactos']) ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="ubicacion<?= $emprendimiento['id'] ?>" class="form-label">Ubicación</label>
                                                <input type="text" class="form-control" id="ubicacion<?= $emprendimiento['id'] ?>" name="ubicacion" value="<?= htmlspecialchars($emprendimiento['ubicacion']) ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="segunda_descripcion<?= $emprendimiento['id'] ?>" class="form-label">Segunda Descripción</label>
                                                <textarea class="form-control" id="segunda_descripcion<?= $emprendimiento['id'] ?>" name="segunda_descripcion" rows="3"><?= htmlspecialchars($emprendimiento['segunda_descripcion']) ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="imagenes<?= $emprendimiento['id'] ?>" class="form-label">Agregar Imágenes</label>
                                                <input type="file" class="form-control" id="imagenes<?= $emprendimiento['id'] ?>" name="imagenes[]" multiple>
                                            </div>
                                            <?php
                                            // Mostrar imágenes existentes con opción para eliminar
                                            $imgs = (new Emprendimiento())->obtenerImagenes($emprendimiento['id']);
                                            if (!empty($imgs)):
                                            ?>
                                            <div class="mb-3">
                                                <label class="form-label">Imágenes existentes:</label>
                                                <div class="d-flex flex-wrap">
                                                    <?php foreach ($imgs as $img): ?>
                                                        <div class="me-2 mb-2 position-relative">
                                                            <img src="assets/img/emprendimientos/<?= htmlspecialchars($img['nombre_imagen']) ?>" alt="Imagen" style="width:100px; height:100px; object-fit:cover;">
                                                            <a href="index.php?controller=emprendimiento&action=eliminarImagen&imagen_id=<?= $img['id'] ?>" class="btn btn-sm btn-danger position-absolute top-0 end-0" onclick="return confirm('¿Eliminar imagen?')">X</a>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No hay emprendimientos disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal para crear un nuevo emprendimiento -->
    <div class="modal fade" id="crearModal" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearModalLabel">Crear Emprendimiento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form action="index.php?controller=emprendimiento&action=guardar" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="contactos" class="form-label">Contactos</label>
                            <input type="text" class="form-control" id="contactos" name="contactos" required>
                        </div>
                        <div class="mb-3">
                            <label for="ubicacion" class="form-label">Ubicación</label>
                            <input type="text" class="form-control" id="ubicacion" name="ubicacion" required>
                        </div>
                        <div class="mb-3">
                            <label for="segunda_descripcion" class="form-label">Segunda Descripción</label>
                            <textarea class="form-control" id="segunda_descripcion" name="segunda_descripcion" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="imagenes" class="form-label">Agregar Imágenes</label>
                            <input type="file" class="form-control" id="imagenes" name="imagenes[]" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Emprendimiento</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
