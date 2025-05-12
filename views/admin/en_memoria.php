<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin InMemoriam</title>
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
                                <a href="index.php?action=miembro" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Miembros</p>
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
                    <h1>Admin In Memoriam</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">In Memoriam</li>
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
                        <i class="fas fa-plus"></i> Agregar Nuevo In Memoriam
                    </button>
                </div>
                
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Sub-Título</th>
                                <th>Descripción</th>
                                <th>Imagen</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
<tbody>
    <?php if (empty($en_memoriaItems)): ?>
        <tr><td colspan="6">No hay items en In Memoriam</td></tr>
    <?php else: ?>
        <?php foreach ($en_memoriaItems as $item): ?>
        <tr>
            <td><?= htmlspecialchars($item['id']) ?></td>
            <td><?= htmlspecialchars($item['titulo']) ?></td>
            <td><?= htmlspecialchars($item['subtitulo']) ?></td>
            <td><?= htmlspecialchars($item['descripcion']) ?></td>
            <td>
                <!-- Botón para ver imagen en modal -->
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewImageModal" 
                        data-imagen="<?= !empty($item['imagen']) ? '/PROYECTO-MILITAR/views/assets/img/en_memoria/'.htmlspecialchars($item['imagen']) : '/PROYECTO-MILITAR/uploads/sin_usuraio.webp' ?>">
                    Ver Imagen
                </button>
            </td>
            <td>
                <button type="button" class="btn btn-warning btn-sm edit-button" 
                        data-id="<?= $item['id'] ?>" 
                        data-titulo="<?= htmlspecialchars($item['titulo']) ?>" 
                        data-subtitulo="<?= htmlspecialchars($item['subtitulo']) ?>" 
                        data-descripcion="<?= htmlspecialchars($item['descripcion']) ?>"
                        data-imagen="<?= htmlspecialchars($item['imagen']) ?>"
                        data-toggle="modal" data-target="#editModal">
                    <i class="fas fa-edit"></i> Editar
                </button>
                <a href="index.php?action=en_memoria/eliminar/<?= $item['id'] ?>" class="btn btn-danger btn-sm" 
                   onclick="return confirm('¿Estás seguro de eliminar este In Memoriam?')">
                    <i class="fas fa-trash"></i> Eliminar
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</tbody>

<!-- Modal para visualizar imagen -->
<div class="modal fade" id="viewImageModal" tabindex="-1" role="dialog" aria-labelledby="viewImageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewImageModalLabel">Vista de la Imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img id="full-image" src="" class="img-fluid" alt="Imagen Completa" style="max-height: 70vh;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Agregar Nuevo In Memoriam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="index.php?action=en_memoria/agregar" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                    </div>
                    <div class="form-group">
                        <label for="subtitulo">Sub-titulo</label>
                        <textarea class="form-control" id="subtitulo" name="subtitulo" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" class="form-control-file" id="imagen" name="imagen" accept="image/*" required>
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar In Memoriam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm" method="POST" action="" enctype="multipart/form-data">
                <input type="hidden" name="id" id="edit-id">
                <input type="hidden" name="imagen_actual" id="edit-imagen-actual">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit-titulo">Título</label>
                        <input type="text" class="form-control" id="edit-titulo" name="titulo" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-subtitulo">Sub-Título</label>
                        <textarea class="form-control" id="edit-subtitulo" name="subtitulo" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit-descripcion">Descripción</label>
                        <textarea class="form-control" id="edit-descripcion" name="descripcion" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                            <label for="edit-imagen">Selecciona una Imagen</label>
                            <input type="file" class="form-control-file" id="edit-imagen" name="imagen" accept="image/*">

                        <label>Vista previa de la imagen</label>
                        <div id="current-image-container">
                            <img id="image-frame" src="" alt="Vista previa" class="img-fluid" style="max-height: 300px;">
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
    // Botón "Editar"
    $('.edit-button').on('click', function () {
        const id = $(this).data('id');
        const titulo = $(this).data('titulo');
        const subtitulo = $(this).data('subtitulo');
        const descripcion = $(this).data('descripcion');
        const imagen = $(this).data('imagen');

        // Llenar campos
        $('#edit-id').val(id);
        $('#edit-titulo').val(titulo);
        $('#edit-subtitulo').val(subtitulo);
        $('#edit-descripcion').val(descripcion);

        // Ruta completa de la imagen
        let rutaImagen = imagen ? `/PROYECTO-MILITAR/views/assets/img/en_memoria/${imagen}` : '/PROYECTO-MILITAR/uploads/sin_usuraio.webp';

        // Mostrar imagen actual
        $('#image-frame').attr('src', rutaImagen).show();
        $('#edit-imagen-actual').val(imagen); // guardar el valor en el hidden
    });

    // Previsualizar nueva imagen seleccionada
    $('#edit-imagen').on('change', function (e) {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function (event) {
                $('#image-frame').attr('src', event.target.result).show();
            };
            reader.readAsDataURL(file);
        }
    });

    // Botón "Ver Imagen"
    $('#viewImageModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const ruta = button.data('imagen');
        $('#full-image').attr('src', ruta);
    });
    // Mostrar imagen en modal
    $('#viewImageModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botón que abrió el modal
        var imagen = button.data('imagen');  // Obtiene el valor de 'data-imagen'
        var modal = $(this);
        modal.find('#full-image').attr('src', '' + imagen);
    });
    // Manejar el botón de editar
    $('.edit-button').on('click', function() {
        var id = $(this).data('id');
        var titulo = $(this).data('titulo');
        var subtitulo = $(this).data('subtitulo');
        var descripcion = $(this).data('descripcion');
        var imagen = $(this).data('imagen');
        
        $('#edit-id').val(id);
        $('#edit-titulo').val(titulo);
        $('#edit-subtitulo').val(subtitulo);
        $('#edit-descripcion').val(descripcion);
        $('#edit-imagen-actual').val(imagen);
        
        // Mostrar la imagen actual
        if (imagen) {
            $('#current-image').attr('src', '/PROYECTO-MILITAR/assets/img/en_memoria/' + imagen);
            $('#current-image-container').show();
        } else {
            $('#current-image-container').hide();
        }
        
        // Actualizar el action del formulario con el ID correcto
        $('#editForm').attr('action', 'index.php?action=en_memoria/editar/' + id);
    });
    
    // Inicializar DataTable si es necesario
    $('#example1').DataTable({
        "responsive": true,
        "autoWidth": false,
    });
});
</script>
</body>
</html>