<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Carrusel</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contacto</a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">Panel de Administración</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-images"></i>
                                <p>
                                    Admin Carrusel
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="index.php?action=carrusel" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Carrusel</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?action=carruselimg" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Carrusel de Imágenes</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-images"></i>
                                <p>
                                    Admin Especialidad
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="index.php?action=especialidad" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Especialidades</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?action=especialidadimg" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Imágenes</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-images"></i>
                                <p>
                                    Admin Emprendimiento
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="index.php?action=emprendimiento" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Especialidades</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?action=emprendimientoimg" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Imágenes</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?action=emprendimiento_comentarios" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Comentarios</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-images"></i>
                                <p>
                                    Admin Comentarios
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="index.php?action=comentarios" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Comentarios</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-images"></i>
                                <p>
                                    Admin In Memoriam
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="index.php?action=en_memoria" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>In Memoriam</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-images"></i>
                                <p>
                                    Admin Miembros
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="index.php?action=miembros" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Miembros</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="miembros_imagenes" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Miembros Imagenes</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="miembros_videos" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Miembros Videos</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Admin Usuario Videos</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item active">Carrusel</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#videoUsuarioModal">
                                <i class="fas fa-plus"></i> Agregar Video
                            </button>
                        </div>

                        <div class="card-body">
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Miembro</th>
                                        <th>Video</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($videos)): ?>
                                        <?php foreach ($videos as $video): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($video['id']) ?></td>
                                                <td><?= htmlspecialchars($video['nombre_usuario']) ?></td>
                                                <td>
                                                    <iframe width="400" height="213"
                                                        src="https://www.youtube.com/embed/<?= htmlspecialchars($video['codigo_video']) ?>"
                                                        frameborder="0"
                                                        allowfullscreen>
                                                    </iframe>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-warning edit-video"
                                                        data-id="<?= $video['id'] ?>"
                                                        data-codigo="<?= htmlspecialchars($video['codigo_video']) ?>"
                                                        data-toggle="modal"
                                                        data-target="#editarVideoModal">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <a href="index.php?action=usuarios_videos/eliminar/<?= $video['id'] ?>"
                                                        onclick="return confirm('¿Estás seguro de eliminar este video?')"
                                                        class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="3">No hay datos registrados</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="modal fade" id="videoUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Agregar Video</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="index.php?action=usuarios_videos/agregar" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="especialidad">Miembro</label>
                                <select class="form-control" id="miembro" name="miembro" required>
                                    <option value="">Seleccione un miembro</option>
                                    <?php foreach ($miembros as $miembro): ?>
                                        <option value="<?= htmlspecialchars($miembro['id']) ?>">
                                            <?= htmlspecialchars($miembro['nombre']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="contacto">Codigo</label>
                                <input type="text" class="form-control" id="codigo_video" name="codigo_video" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--editar-->
        <div class="modal fade" id="editarVideoModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar Video</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <input type="hidden" name="id" id="edit-id">
                    <form id="editFormVideo" method="POST" action="">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="especialidad">Miembro</label>
                                <select class="form-control" id="miembro_edit" name="miembro_edit" required>
                                    <option value="">Seleccione un miembro</option>
                                    <?php foreach ($miembros as $miembro): ?>
                                        <option value="<?= htmlspecialchars($miembro['id']) ?>">
                                            <?= htmlspecialchars($miembro['nombre']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="edit-codigo">Codigo</label>
                                <input type="text" class="form-control" id="edit-codigo" name="edit-codigo" required>
                            </div>
                            <div class="form-group">
                                <label>Vista Previa</label>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe id="preview-video" class="embed-responsive-item"
                                        src=""
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/demo.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.edit-video').on('click', function() {
                const id = $(this).data('id');
                const titulo = $(this).data('titulo');
                const codigo = $(this).data('codigo');

                $('#edit-id').val(id);
                $('#edit-codigo').val(codigo);
                $('#editFormVideo').attr('action', 'index.php?action=usuarios_videos/editar/' + id);
                const embedURL = `https://www.youtube.com/embed/${codigo}?modestbranding=1&rel=0`;
                $('#preview-video').attr('src', embedURL);
            });
            $('#editarVideoModal').on('hidden.bs.modal', function() {
                $('#preview-video').attr('src', '');
            });
        });
    </script>
</body>

</html>