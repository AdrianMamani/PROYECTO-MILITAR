<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Miembros</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
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

        <!-- Sidebar -->
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
                                <a href="index.php?action=carrusel" class="nav-link ">
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
                                <a href="index.php?action=usuarios" class="nav-link">
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
                                <a href="index.php?action=miembros_videos" class="nav-link active">
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

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Administrar Videos</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item active">Miembros</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main Content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                                <i class="fas fa-plus"></i> Agregar Nuevo Video
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="miembrosVideosTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Video</th>
                                        <th>Miembro</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Agregar Nuevo Video</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="addForm" method="POST" enctype="multipart/form-data" action="index.php?action=miembros_videos/agregar">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="miembro_id">Miembro</label>
                                        <select class="form-control" id="miembro_id" name="miembro_id" required>
                                            <option value="">Seleccione un Miembro</option>
                                            <?php foreach ($miembros as $miembro): ?>
                                                <option value="<?= $miembro['id']; ?>"><?= htmlspecialchars($miembro['nombre']); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-nombre">Codigo</label>
                                        <input type="text" class="form-control" id="codigo" name="codigo" required>
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


        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar Video</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editForm" method="POST">
                        <input type="hidden" name="id" id="edit-id">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="edit-nombre">Codigo</label>
                                        <input type="text" class="form-control" id="edit-codigo" name="codigo" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="miembro_id">Miembro</label>
                                        <select class="form-control" id="miembro_id_edit" name="miembro_id_edit" required>
                                            <option value="">Seleccione un Miembro</option>
                                            <?php foreach ($miembros as $miembro): ?>
                                                <option value="<?= $miembro['id']; ?>"><?= htmlspecialchars($miembro['nombre']); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Vista Previa del Video</label>
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe id="edit-video-preview" class="embed-responsive-item" src="" allowfullscreen></iframe>
                                        </div>
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

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
        <script src="dist/js/adminlte.min.js"></script>
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                // Inicializar DataTable
                $('#miembrosVideosTable').DataTable({
                    ajax: {
                        url: 'index.php?action=miembros_videos/listar',
                        dataSrc: ''
                    },
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'codigo_video',
                            render: function(codigo) {
                                if (codigo && codigo.length === 11) {
                                    return `
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/${codigo}" allowfullscreen></iframe>
                    </div>
                `;
                                }
                                return 'Sin video';
                            }
                        },
                        {
                            data: 'nombre_miembro',
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return `
                                <button class="btn btn-warning btn-sm edit-button"
                                data-id="${row.id}"
                                data-usuario="${row.id_miembro}"
                                data-video="${row.codigo_video}"
                                data-toggle="modal"
                                data-target="#editModal">
                                <i class="fas fa-edit"></i> Editar
                                </button>
                                <button class="btn btn-danger btn-sm delete-button"
                                data-id="${row.id}"
                                <i class="fas fa-trash"></i> Eliminar
                                </button>`;
                            }
                        }
                    ]
                });


                // Manejar el botón de editar
                $(document).on('click', '.edit-button', function() {
                    var id = $(this).data('id');
                    var id_miembro = $(this).data('usuario');
                    var video = $(this).data('video');
                    $('#edit-id').val(id);
                    $('#miembro_id_edit').val(id_miembro);
                    $('#edit-codigo').val(video);

                    const previewFrame = $('#edit-video-preview');
                    console.log(video)

                    const url = `https://www.youtube.com/embed/${video}`;
                    previewFrame.attr('src', url);

                });

                $('#addForm').on('submit', function(e) {
                    e.preventDefault();
                    const form = this;
                    const formData = new FormData(form);
                    $.ajax({
                        url: $(form).attr('action'),
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(respuesta) {
                            $('#addModal').modal('hide');
                            console.log(respuesta)
                            alert('Video agregado correctamente');
                            form.reset();
                            $('#miembrosVideosTable').DataTable().ajax.reload(null, false);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error al guardar:', error);
                            alert('Ocurrió un error al guardar');
                        }
                    });
                });


                $('#editForm').on('submit', function(e) {
                    e.preventDefault();
                    const form = this;
                    const formData = new FormData(form);

                    const id = $('#edit-id').val(); // input hidden
                    $.ajax({
                        url: 'index.php?action=miembros_videos/editar&id=' + id,
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(res) {
                            const respuesta = JSON.parse(res);
                            if (respuesta.success) {
                                $('#editModal').modal('hide');
                                alert(respuesta.mensaje);
                                $('#miembrosVideosTable').DataTable().ajax.reload(null, false);
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


                $(document).on('click', '.delete-button', function() {
                    const id = $(this).data('id');
                    console.log(id)

                    if (!confirm('¿Estás seguro de eliminar este miembro?')) return;

                    $.ajax({
                        url: 'index.php?action=miembros_videos/eliminar&id=' + id,
                        type: 'POST',
                        success: function(respuesta) {
                            $('#miembrosVideosTable').DataTable().ajax.reload(null, false);
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




            });
        </script>
</body>

</html>