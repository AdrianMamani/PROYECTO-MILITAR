<?php
// Si $blogs no está definida, se inicializa como array vacío
if (!isset($blogs)) {
    $blogs = [];
}
require_once 'models/BlogAdmin.php';
$blogModel = new BlogAdmin();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Blogs</title>
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
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1>Administrar Blogs</h1>

    <!-- Botón para abrir modal de Crear Blog -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#crearBlogModal">
        Crear Blog
    </button>

    <!-- Modal Crear Blog -->
    <div class="modal fade" id="crearBlogModal" tabindex="-1" aria-labelledby="crearBlogModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <form action="index.php?controller=blogadmin&action=guardar" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearBlogModalLabel">Crear Blog</h5>
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
                    <button type="submit" class="btn btn-primary">Guardar Blog</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
         </div>
      </div>
    </div>

    <!-- Tabla de blogs -->
    <h2>Lista de Blogs</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Subtítulo</th>
                <th>Imágenes</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($blogs as $blog): ?>
                <?php $imagenes = $blogModel->obtenerImagenes($blog['id']); ?>
                <tr>
                    <td><?= htmlspecialchars($blog['id']) ?></td>
                    <td><?= htmlspecialchars($blog['titulo']) ?></td>
                    <td><?= htmlspecialchars($blog['subtitulo']) ?></td>
                    <td>
                        <?php if (!empty($imagenes)): ?>
                            <?php foreach ($imagenes as $img): ?>
                                <div class="img-container">
                                    <img src="views/assets/img/blog/<?= htmlspecialchars($img['nombre_imagen']) ?>" class="thumbnail" alt="Imagen">
                                    <a href="index.php?controller=blogadmin&action=eliminarImagen&imagen_id=<?= $img['id'] ?>" class="img-delete" onclick="return confirm('¿Eliminar imagen?')">&times;</a>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            No hay imágenes
                        <?php endif; ?>
                    </td>
                    <td>
                        <!-- Botón para abrir modal de editar -->
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarBlogModal<?= $blog['id'] ?>">
                            Editar
                        </button>
                        <a href="index.php?controller=blogadmin&action=eliminar&id=<?= $blog['id'] ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este blog?')">Eliminar</a>
                    </td>
                </tr>

                <!-- Modal Editar Blog para este blog -->
                <div class="modal fade" id="editarBlogModal<?= $blog['id'] ?>" tabindex="-1" aria-labelledby="editarBlogModalLabel<?= $blog['id'] ?>" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form action="index.php?controller=blogadmin&action=guardar" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                          <h5 class="modal-title" id="editarBlogModalLabel<?= $blog['id'] ?>">Editar Blog</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                          <div class="mb-3">
                              <label for="titulo<?= $blog['id'] ?>" class="form-label">Título</label>
                              <input type="text" class="form-control" id="titulo<?= $blog['id'] ?>" name="titulo" value="<?= htmlspecialchars($blog['titulo']) ?>" required>
                          </div>
                          <div class="mb-3">
                              <label for="subtitulo<?= $blog['id'] ?>" class="form-label">Subtítulo</label>
                              <input type="text" class="form-control" id="subtitulo<?= $blog['id'] ?>" name="subtitulo" value="<?= htmlspecialchars($blog['subtitulo']) ?>" required>
                          </div>
                          <div class="mb-3">
                              <label for="descripcion<?= $blog['id'] ?>" class="form-label">Descripción</label>
                              <textarea class="form-control" id="descripcion<?= $blog['id'] ?>" name="descripcion" rows="3" required><?= htmlspecialchars($blog['descripcion']) ?></textarea>
                          </div>
                          <div class="mb-3">
                              <label for="imagenes<?= $blog['id'] ?>" class="form-label">Agregar Imágenes</label>
                              <input type="file" class="form-control" id="imagenes<?= $blog['id'] ?>" name="imagenes[]" multiple>
                              <small class="form-text text-muted">Seleccione una o más imágenes para agregar.</small>
                          </div>
                          <!-- Campo oculto con el id del blog -->
                          <input type="hidden" name="id" value="<?= $blog['id'] ?>">
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
