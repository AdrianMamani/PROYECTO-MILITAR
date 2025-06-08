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
                            <i class="nav-icon fas fa-sliders-h"></i>
                            <p>
                                Admin Carrusel
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index.php?action=carrusel" class="nav-link">
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
                            <i class="nav-icon fas fa-briefcase"></i>
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
                            <i class="nav-icon fas fa-lightbulb"></i>
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
                                <a href="index.php?action=videoemprendimiento" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Videos</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Admin Nosotros
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index.php?action=nosotros" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nosotros</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?action=nosotrosimg" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Imágenes</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?action=nosotrosVideo" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Videos</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>
                                Miembros
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index.php?action=usuarios" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Miembros</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?action=miembros_imagenes" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Imágenes</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?action=miembros_videos" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Videos</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>
                                Eventos
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index.php?action=evento" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Evento</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?action=eventoimg" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Imágenes</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?action=videoevento" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Videos</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-trophy"></i>
                            <p>
                                Logros
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index.php?action=logrodestacado" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Destacados</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?action=logroimg" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Imágenes</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?action=logrovideo" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Videos</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-camera-retro"></i>
                            <p>
                                Nuestras Fotos
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index.php?action=admingaleria" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fotos Destacadas</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-comments"></i>
                            <p>
                                Comentarios
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index.php?action=comentarios" class="nav-link" active>
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Comentarios</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Admin Noticias
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?action=noticias/index" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Noticias</p>
                            </a>
                        </li>
             
                    </ul>
                </li>
                <!-- Finanzas -->
                <li class="nav-item">
                    <a href="index.php?action=finanzas/index" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>Registro de Aportaciones</p>
                    </a>
                </li>
                </ul>
            </nav>
            <div class="mt-4 p-3">
        <a href="index.php?action=auth/loginForm" class="btn btn-danger btn-block">
            <i class="fas fa-sign-out-alt"></i> Cerrar sesión
        </a>
    </div>
        </div>
    </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Admin Usuarios</h1>
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
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarModal">
                                <i class="fas fa-plus"></i> Agregar Usuario
                            </button>
                        </div>


                        <ul class="nav nav-tabs" id="usuarioTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="usuarios-tab" data-toggle="tab" href="#usuarios" role="tab" aria-controls="usuarios" aria-selected="true">Usuarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="fallecidos-tab" data-toggle="tab" href="#fallecidos" role="tab" aria-controls="fallecidos" aria-selected="false">Fallecidos</a>
                            </li>
                        </ul>

                        <div class="tab-content mt-3">
                            <div class="tab-pane fade show active" id="usuarios" role="tabpanel" aria-labelledby="usuarios-tab">
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Especialidad</th>
                                                <th>Descripcion</th>
                                                <th>Estado</th>
                                                <th>Fecha de Registro</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($usuarios)): ?>
                                                <?php foreach ($usuarios as $usuario): ?>
                                                    <tr>
                                                        <td><?= htmlspecialchars($usuario['id']) ?></td>
                                                        <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                                                        <td><?= htmlspecialchars($usuario['nombre_especialidad']) ?></td>
                                                        <td><?= htmlspecialchars($usuario['descripcion']) ?></td>
                                                        <td><?= $usuario['estado_vivo'] == 1 ? 'Vivo' : 'Muerto' ?></td>
                                                        <td><?= htmlspecialchars($usuario['fecha_registro']) ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-warning edit-usuario"
                                                                data-id="<?= $usuario['id'] ?>"
                                                                data-nombre="<?= htmlspecialchars($usuario['nombre']) ?>"
                                                                data-especialidad="<?= htmlspecialchars($usuario['especialidad_id']) ?>"
                                                                data-descripcion="<?= htmlspecialchars($usuario['descripcion']) ?>"
                                                                data-estado="<?= htmlspecialchars($usuario['estado_vivo']) ?>"
                                                                data-toggle="modal"
                                                                data-target="#editarUsuario">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-warning edit-usuarioE"
                                                                data-id="<?= $usuario['id'] ?>"
                                                                data-toggle="modal"
                                                                data-target="#editarUsuarioE">
                                                                <i class="fas fa-ribbon"></i>
                                                            </button>
                                                            <a href="index.php?action=usuarios/eliminar/<?= $usuario['id'] ?>"
                                                                onclick="return confirm('¿Estás seguro de eliminar este usuario?')"
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

                            <div class="tab-pane fade" id="fallecidos" role="tabpanel" aria-labelledby="fallecidos-tab">
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Miembro</th>
                                                <th>Motivio Fallecimiento</th>
                                                <th>Fecha de Fallecimiento</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($usuariosF)): ?>
                                                <?php foreach ($usuariosF as $usuarioF): ?>
                                                    <tr>
                                                        <td><?= htmlspecialchars($usuarioF['id']) ?></td>
                                                        <td><?= htmlspecialchars($usuarioF['nombre_usuario']) ?></td>
                                                        <td><?= htmlspecialchars($usuarioF['motivo_fallecimiento']) ?></td>
                                                        <td><?= htmlspecialchars($usuarioF['fecha_fallecimiento']) ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-warning edit-usuarioF"
                                                                data-id="<?= $usuarioF['id'] ?>"
                                                                data-motivo="<?= htmlspecialchars($usuarioF['motivo_fallecimiento']) ?>"
                                                                data-fallecimiento="<?= htmlspecialchars($usuarioF['fecha_fallecimiento']) ?>"
                                                                data-toggle="modal"
                                                                data-target="#editarUsuarioF">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <a href="index.php?action=usuarios/eliminarF/<?= $usuarioF['id'] ?>"
                                                                onclick="return confirm('¿Estás seguro de eliminar este usuario?')"
                                                                class="btn btn-sm btn-danger">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="5">No hay imágenes registradas</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>

        <div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Agregar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="index.php?action=usuarios/agregar" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="especialidad">Especialidad</label>
                                <select class="form-control" id="especialidad" name="especialidad" required>
                                    <option value="">Seleccione una especialidad</option>
                                    <?php foreach ($especialidades as $esp): ?>
                                        <option value="<?= htmlspecialchars($esp['id']) ?>">
                                            <?= htmlspecialchars($esp['nombre']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Imagen</label>
                                <input type="file" class="form-control" id="imagen" name="imagen" required>
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
        <div class="modal fade" id="editarUsuario" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <input type="hidden" name="id" id="edit-id">
                    <form id="editForm" method="POST" action="index.php?action=usuarios/editar">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre_edit" name="nombre_edit" required>
                            </div>
                            <div class="form-group">
                                <label for="especialidad">Especialidad</label>
                                <select class="form-control" id="especialidad_edit" name="especialidad_edit" required>
                                    <option value="">Seleccione una especialidad</option>
                                    <?php foreach ($especialidades as $esp): ?>
                                        <option value="<?= htmlspecialchars($esp['id']) ?>">
                                            <?= htmlspecialchars($esp['nombre']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" class="form-control" id="descripcion_edit" name="descripcion_edit" required>
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

        <!--editar estado-->
        <div class="modal fade" id="editarUsuarioE" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editFormE" method="POST" action="index.php?action=usuarios/editarE">
                        <input type="hidden" name="id" id="edit-id1">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombre">Motivo</label>
                                <input type="text" class="form-control" id="motivo" name="motivo" required>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Fecha de Fallecimiento</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" required>
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
        <div class="modal fade" id="editarUsuarioF" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editFormF" method="POST" action="index.php?action=usuarios/editarE1">
                        <input type="hidden" name="id" id="edit-id2">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombre">Motivo</label>
                                <input type="text" class="form-control" id="motivo_edit" name="motivo_edit" required>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Fecha de Fallecimiento</label>
                                <input type="date" class="form-control" id="fecha_edit" name="fecha_edit" required>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('.edit-usuario').on('click', function() {
                $('#edit-id').val($(this).data('id'));
                $('#nombre_edit').val($(this).data('nombre'));
                $('#especialidad_edit').val($(this).data('especialidad'));
                $('#descripcion_edit').val($(this).data('descripcion'));
                $('#estado_edit').val($(this).data('estado'));

                $('#editForm').attr('action', 'index.php?action=usuarios/editar/' + $(this).data('id'));
            });
            $('.edit-usuarioE').on('click', function() {
                $('#edit-id1').val($(this).data('id'));
                $('#editFormE').attr('action', 'index.php?action=usuarios/editarE/' + $(this).data('id'));
            });
            $('.edit-usuarioF').on('click', function() {
                $('#edit-id2').val($(this).data('id'));
                $('#motivo_edit').val($(this).data('motivo'));
                $('#fecha_edit').val($(this).data('fallecimiento'));
                $('#editFormF').attr('action', 'index.php?action=usuarios/editarF/' + $(this).data('id'));
            });
        });
    </script>
</body>

</html>