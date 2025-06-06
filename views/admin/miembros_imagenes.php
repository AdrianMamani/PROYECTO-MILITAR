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
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Administrar Imagenes</h1>
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
                                <i class="fas fa-plus"></i> Agregar Nuevo Imagen
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="miembrosImgTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Imagen</th>
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
                        <h5 class="modal-title" id="addModalLabel">Agregar Nueva Imagen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="addForm" method="POST" enctype="multipart/form-data" action="index.php?action=miembros_imagenes/agregar">
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
                                        <label for="imagen">Imagen</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="imagen" name="imagen" required>
                                            <label class="custom-file-label" for="imagen">Seleccionar archivo</label>
                                        </div>
                                        <small class="form-text text-muted">Formatos: JPG, PNG, GIF. Tamaño máximo: 2MB</small>
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
                        <h5 class="modal-title" id="editModalLabel">Editar Imagen</h5>
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
                                        <label for="miembro_id">Miembro</label>
                                        <select class="form-control" id="miembro_id_edit" name="miembro_id_edit" required>
                                            <option value="">Seleccione un Miembro</option>
                                            <?php foreach ($miembros as $miembro): ?>
                                                <option value="<?= $miembro['id']; ?>"><?= htmlspecialchars($miembro['nombre']); ?></option>
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
                        <img id="view-image" src="" class="img-fluid" alt="Imagen del miembro" style="max-height: 70vh;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
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
                $('#miembrosImgTable').DataTable({
                    ajax: {
                        url: 'index.php?action=miembros_imagenes/listar',
                        dataSrc: ''
                    },
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'nombre_miembro'
                        },
                        {
                            data: 'nombre_imagen',
                            render: function(data, type, row) {
                                return `<img src="/PROYECTO-MILITAR/uploads/usuarios/imagenes/${data}" class="img-thumbnail view-image-button" data-toggle="modal"  data-target="#viewImageModal" data-imagen="${data}" style="max-width: 120px; cursor: pointer; ">`;
                            }
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return `
                                <button class="btn btn-warning btn-sm edit-button"
                                data-id="${row.id}"
                                data-usuario="${row.id_miembro}"
                                data-imagen="/PROYECTO-MILITAR/uploads/usuarios/imagenes/${row.nombre_imagen}"
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


                // Inicializar custom file input
                bsCustomFileInput.init();

                // Mostrar imagen en modal
                $('#viewImageModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget);
                    var imagen = button.data('imagen');
                    $(this).find('#full-image').attr('src', imagen);
                });

                // Manejar el botón de editar
                $(document).on('click', '.edit-button', function() {
                    var id = $(this).data('id');
                    var id_miembro = $(this).data('usuario');
                    var imagen = $(this).data('imagen');
                    console.log(id, id_miembro, imagen)
                    $('#edit-id').val(id);
                    $('#miembro_id_edit').val(id_miembro);
                    $('#edit-imagen-preview').attr('src', imagen);

                    // Resetear el input file
                    $('#edit-imagen').next('.custom-file-label').html('Seleccionar archivo');
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
                            console.log(respuesta)
                            alert('Imagen agregada correctamente');
                            form.reset();
                            $('#miembrosImgTable').DataTable().ajax.reload(null, false);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error al guardar:', error);
                            alert('Ocurrió un error al guardar');
                        }
                    });
                });



                $('#viewImageModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget);
                    var imagen = button.data('imagen');
                    var modal = $(this);
                    modal.find('#view-image').attr('src', '/PROYECTO-MILITAR/uploads/usuarios/imagenes/' + imagen);
                });

                $('#editForm').on('submit', function(e) {
                    e.preventDefault();
                    const form = this;
                    const formData = new FormData(form);
                    const fileInput = $(form).find('input[type="file"]')[0];
                    if (fileInput && fileInput.files.length > 0) {
                        const file = fileInput.files[0];
                        if (file.size > 2 * 1024 * 1024) {
                            alert('La imagen no debe exceder los 2MB');
                            return false;
                        }
                        const validExtensions = ['image/jpeg', 'image/png', 'image/gif'];
                        if (!validExtensions.includes(file.type)) {
                            alert('Formato no permitido (solo JPG, PNG o GIF)');
                            return false;
                        }
                    }

                    const id = $('#edit-id').val(); // input hidden
                    $.ajax({
                        url: 'index.php?action=miembros_imagenes/editar&id=' + id,
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(res) {
                            const respuesta = JSON.parse(res);
                            if (respuesta.success) {
                                $('#editModal').modal('hide');
                                alert(respuesta.mensaje);
                                $('#miembrosImgTable').DataTable().ajax.reload(null, false);
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
                        url: 'index.php?action=miembros_imagenes/eliminar&id=' + id,
                        type: 'POST',
                        success: function(respuesta) {
                            $('#miembrosImgTable').DataTable().ajax.reload(null, false);
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