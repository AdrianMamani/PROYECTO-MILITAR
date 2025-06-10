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
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                                <i class="fas fa-plus"></i> Agregar Nuevo Miembro
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
                                    <table class="table table-bordered table-striped" id="miembrosTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Especialidad</th>
                                                <th>Imagen</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="fallecidos" role="tabpanel" aria-labelledby="fallecidos-tab">
                                <div class="card-body">
                                    <table class="table table-bordered table-striped" id="miembrosFTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Miembro</th>
                                                <th>Motivo</th>
                                                <th>Fecha</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>

        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Agregar Nuevo Miembro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="addForm" action="index.php?action=usuarios/agregar" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="especialidad_id">Especialidad</label>
                                        <select class="form-control" id="especialidad_id" name="especialidad_id" required>
                                            <option value="">Seleccione una especialidad</option>
                                            <?php foreach ($especialidades as $especialidad): ?>
                                                <option value="<?= $especialidad['id']; ?>"><?= htmlspecialchars($especialidad['nombre']); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="imagen">Imagen</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="imagen" name="imagen" required>
                                            <label class="custom-file-label" for="imagen">Seleccionar archivo</label>
                                        </div>
                                        <small class="form-text text-muted">Formatos: JPG, PNG, GIF. Tamaño máximo: 2MB</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <textarea class="form-control" id="descripcion" name="descripcion" rows="5" required></textarea>
                                    </div>
                                </div>
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

        <!-- Modal para editar miembro -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar Miembro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editForm" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="edit-id">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edit-nombre">Nombre</label>
                                        <input type="text" class="form-control" id="edit-nombre" name="nombre" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-especialidad_id">Especialidad</label>
                                        <select class="form-control" id="edit-especialidad_id" name="especialidad_id" required>
                                            <option value="">Seleccione una especialidad</option>
                                            <?php foreach ($especialidades as $especialidad): ?>
                                                <option value="<?= $especialidad['id']; ?>"><?= htmlspecialchars($especialidad['nombre']); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-imagen">Cambiar Imagen (opcional)</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="edit-imagen" name="imagen">
                                            <label class="custom-file-label" for="edit-imagen">Seleccionar archivo</label>
                                        </div>
                                        <small class="form-text text-muted">Dejar en blanco para mantener la imagen actual</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edit-descripcion">Descripción</label>
                                        <textarea class="form-control" id="edit-descripcion" name="descripcion" rows="5" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Imagen Actual</label>
                                        <img id="edit-imagen-preview" src="" class="img-fluid img-thumbnail" style="max-height: 150px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="editModalE" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar Miembro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editFormE" method="POST">
                        <input type="hidden" name="id" id="edit-id1">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="edit-nombre">Motivo</label>
                                        <input type="text" class="form-control" id="edit-motivo" name="motivo" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-nombre">Fecha de Fallecimiento</label>
                                        <input type="date" class="form-control" id="edit-fecha" name="fecha" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal para ver imagen -->
        <div class="modal fade" id="viewImageModal" tabindex="-1" role="dialog" aria-labelledby="viewImageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewImageModalLabel">Imagen del Miembro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="full-image" src="" class="img-fluid" alt="Imagen del miembro" style="max-height: 70vh;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="editModal3" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editForm3" method="POST">
                        <input type="hidden" name="id" id="edit-id3">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="edit-motivo">Motivo</label>
                                <input type="text" class="form-control" id="motivo" name="motivo" required>
                            </div>
                            <div class="form-group">
                                <label for="edit-fecha">Fecha</label>
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

        <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

        <script>
            $(document).ready(function() {
                bsCustomFileInput.init();

                $('#miembrosTable').DataTable({
                    ajax: {
                        url: 'index.php?action=usuarios/listar',
                        dataSrc: ''
                    },
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'nombre'
                        },
                        {
                            data: 'descripcion'
                        },
                        {
                            data: 'nombre_especialidad'
                        },
                        {
                            data: 'imagen_usuario',
                            render: function(data, type, row) {
                                return '<img src="/PROYECTO-MILITAR/views/assets/img/miembros/' + data + '" class="img-thumbnail" style="max-width: 120px;">';
                            }
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return `
                                <button class="btn btn-warning btn-sm edit-button"
                                data-id="${row.id}"
                                data-nombre="${row.nombre}"
                                data-descripcion="${row.descripcion}"
                                data-especialidad-id="${row.especialidad_id}"
                                data-imagen="/PROYECTO-MILITAR/views/assets/img/miembros/${row.imagen_usuario}"
                                data-toggle="modal"
                                data-target="#editModal">
                                <i class="fas fa-edit"></i> Editar
                                </button>

                                <button class="btn btn-danger btn-sm delete-button"
                                data-id="${row.id}"
                                <i class="fas fa-trash"></i> Eliminar
                                </button>

                                <button class="btn btn-warning btn-sm edit-button1"
                                data-id="${row.id}"
                                data-toggle="modal"
                                data-target="#editModalE">
                                <i class="fas fa-ribbon"></i>
                                </button>
                        
                        
                        `;
                            }
                        }
                    ]
                });

                $('#viewImageModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget);
                    var imagen = button.data('imagen');
                    $(this).find('#full-image').attr('src', imagen);
                });


                $(document).on('click', '.edit-button', function() {
                    var id = $(this).data('id');
                    var nombre = $(this).data('nombre');
                    var descripcion = $(this).data('descripcion');
                    var imagen = $(this).data('imagen');
                    var especialidadId = $(this).data('especialidad-id');
                    console.log(id)
                    $('#edit-id').val(id);
                    $('#edit-nombre').val(nombre);
                    $('#edit-descripcion').val(descripcion);
                    $('#edit-especialidad_id').val(especialidadId);
                    $('#edit-imagen-preview').attr('src', imagen);

                    $('#edit-imagen').next('.custom-file-label').html('Seleccionar archivo');
                    $('#editForm').attr('action', 'index.php?action=usuarios/editar/' + id);
                });

                $(document).on('click', '.edit-button1', function() {
                    var id = $(this).data('id');
                    $('#edit-id1').val(id);
                });

                $('#addForm').on('submit', function(e) {
                    e.preventDefault();
                    const form = this;
                    const formData = new FormData(form);
                    const fileInput = $(form).find('input[type="file"]')[0];
                    if (fileInput && fileInput.files.length > 0) {
                        const file = fileInput.files[0];

                        if (file.size > 2 * 1024 * 1024) {
                            alert('El tamaño de la imagen no debe exceder los 2MB');
                            return false;
                        }
                        const validExtensions = ['image/jpeg', 'image/png', 'image/gif'];
                        if (!validExtensions.includes(file.type)) {
                            alert('Solo se permiten archivos JPG, PNG o GIF');
                            return false;
                        }
                    }
                    $.ajax({
                        url: $(form).attr('action'),
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(respuesta) {
                            $('#addModal').modal('hide');
                            alert('Miembro agregado correctamente');
                            form.reset();
                            $('#miembrosTable').DataTable().ajax.reload(null, false);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error al guardar:', error);
                            alert('Ocurrió un error al guardar');
                        }
                    });
                });


                // Previsualizar imagen seleccionada en edición
                $('#edit-imagen').on('change', function(e) {
                    var file = e.target.files[0];
                    if (file && file.type.match('image.*')) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#edit-imagen-preview').attr('src', e.target.result);
                        };
                        reader.readAsDataURL(file);

                        // Actualizar label del input file
                        $(this).next('.custom-file-label').html(file.name);
                    }
                });

                $('#editForm').on('submit', function(e) {
                    e.preventDefault();

                    const form = this;
                    const formData = new FormData(form);
                    const id = $('#edit-id').val(); // ID del miembro editado

                    $.ajax({
                        url: $(form).attr('action'),
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(respuesta) {
                            $('#editModal').modal('hide');
                            alert(respuesta.mensaje || 'Miembro actualizado');
                            $('#miembrosTable').DataTable().ajax.reload(null, false);

                        },
                        error: function(error) {
                            console.error('Error al actualizar', error);
                        }
                    });
                });

                $('#editFormE').on('submit', function(e) {
                    e.preventDefault();

                    const form = this;
                    const formData = new FormData(form);
                    const id = $('#edit-id1').val();

                    $.ajax({
                        url: 'index.php?action=usuarios/editarE&id=' + id,
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(respuesta) {
                            $('#editModalE').modal('hide');
                            alert(respuesta.mensaje || 'Miembro actualizado');
                            $('#miembrosTable').DataTable().ajax.reload(null, false);

                        },
                        error: function(error) {
                            console.error('Error al actualizar', error);
                        }
                    });
                });

                $(document).on('click', '.delete-button', function() {
                    const id = $(this).data('id');
                    console.log(id)

                    if (!confirm('¿Estás seguro de eliminar este miembro?')) return;

                    $.ajax({
                        url: 'index.php?action=usuarios/eliminar&id=' + id,
                        type: 'POST',
                        success: function(respuesta) {
                            $('#miembrosTable').DataTable().ajax.reload(null, false);
                        },
                        error: function(xhr, status, error) {
                            alert('Error al eliminar');
                            console.error(error);
                        }
                    });
                });


                $('#editModal').on('hidden.bs.modal', function() {
                    $('#editForm')[0].reset();
                    $('#edit-imagen-preview').attr('src', '/PROYECTO-MILITAR/uploads/sin_usuario.webp');
                });
                let miembrosFTableInitialized = false;


                $('a[data-toggle="tab"][href="#fallecidos"]').on('shown.bs.tab', function(e) {
                    if (!miembrosFTableInitialized) {
                        $('#miembrosFTable').DataTable({
                            ajax: {
                                url: 'index.php?action=usuarios_fallecidos/listar',
                                dataSrc: ''
                            },
                            columns: [{
                                    data: 'id'
                                },
                                {
                                    data: 'nombre_usuario'
                                },
                                {
                                    data: 'motivo_fallecimiento'
                                },
                                {
                                    data: 'fecha_fallecimiento'
                                },
                                {
                                    data: null,
                                    render: function(data, type, row) {
                                        return `
                            <button class="btn btn-warning btn-sm edit-button3"
                                data-id="${row.id}"
                                data-motivo="${row.motivo_fallecimiento}"
                                data-fecha="${row.fecha_fallecimiento}"
                                data-toggle="modal"
                                data-target="#editModal3">
                                <i class="fas fa-edit"></i> Editar
                            </button>
                            <button class="btn btn-danger btn-sm delete-button3"
                                data-id="${row.id}">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>`;
                                    }
                                }
                            ]
                        });
                        miembrosFTableInitialized = true;
                    }
                });

                $(document).on('click', '.edit-button3', function() {
                        var id = $(this).data('id');
                        var motivo = $(this).data('motivo');
                        var fecha = $(this).data('fecha');
                        $('#edit-id3').val(id);
                        $('#motivo').val(motivo);
                        $('#fecha').val(fecha);
                    });

                    $('#editForm3').on('submit', function(e) {
                        e.preventDefault();
                        const form = this;
                        const formData = new FormData(form);

                        const id = $('#edit-id3').val();
                        $.ajax({
                            url: 'index.php?action=usuarios_fallecidos/editar&id=' + id,
                            type: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(res) {
                                const respuesta = JSON.parse(res);
                                if (respuesta.success) {
                                    $('#editModal3').modal('hide');
                                    alert(respuesta.mensaje);
                                    $('#miembrosFTable').DataTable().ajax.reload(null, false);
                                } else {
                                    alert(respuesta.mensaje);
                                }
                            },
                            error: function(xhr, status, error) {
                                alert('Error en la actualización');
                                console.error(error);
                            }
                        });
                    });

                    $(document).on('click', '.delete-button3', function() {
                        const id = $(this).data('id');
                        console.log(id)

                        if (!confirm('¿Estás seguro de eliminar este miembro?')) return;

                        $.ajax({
                            url: 'index.php?action=usuarios_fallecidos/eliminar&id=' + id,
                            type: 'POST',
                            success: function(respuesta) {
                                $('#miembrosFTable').DataTable().ajax.reload(null, false);
                            },
                            error: function(xhr, status, error) {
                                alert('Error al eliminar');
                                console.error(error);
                            }
                        });
                    });



            });
        </script>
</body>

</html>