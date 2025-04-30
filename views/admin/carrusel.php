<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Carrusel</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/promomilitar/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/promomilitar/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/promomilitar/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/promomilitar/plugins/bootstrap/css/bootstrap.min.css">
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
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Admin Carrusel</h1>
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
                            <i class="fas fa-plus"></i> Agregar Nuevo Carrusel
                        </button>
                    </div>
                    
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($carruselItems)): ?>
                                    <tr><td colspan="4">No hay items en el carrusel</td></tr>
                                <?php else: ?>
                                    <?php foreach ($carruselItems as $item): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($item['id']) ?></td>
                                        <td><?= htmlspecialchars($item['titulo']) ?></td>
                                        <td><?= htmlspecialchars($item['descripcion']) ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm edit-button" 
                                                    data-id="<?= $item['id'] ?>" 
                                                    data-titulo="<?= htmlspecialchars($item['titulo']) ?>" 
                                                    data-descripcion="<?= htmlspecialchars($item['descripcion']) ?>"
                                                    data-toggle="modal" data-target="#editModal">
                                                <i class="fas fa-edit"></i> Editar
                                            </button>
                                            <a href="index.php?action=carrusel/eliminar/<?= $item['id'] ?>" class="btn btn-danger btn-sm" 
                                               onclick="return confirm('¿Estás seguro de eliminar este carrusel?')">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
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
                    <h5 class="modal-title" id="addModalLabel">Agregar Nuevo Carrusel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="index.php?action=carrusel/agregar" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
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
                    <h5 class="modal-title" id="editModalLabel">Editar Carrusel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm" method="POST" action="">
                    <input type="hidden" name="id" id="edit-id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit-titulo">Título</label>
                            <input type="text" class="form-control" id="edit-titulo" name="titulo" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-descripcion">Descripción</label>
                            <textarea class="form-control" id="edit-descripcion" name="descripcion" rows="3" required></textarea>
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
<script src="/promomilitar/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/promomilitar/dist/js/adminlte.min.js"></script>
<script src="/promomilitar/dist/js/demo.js"></script>
<script src="/promomilitar/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/promomilitar/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/promomilitar/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/promomilitar/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/promomilitar/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/promomilitar/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/promomilitar/plugins/jszip/jszip.min.js"></script>
<script src="/promomilitar/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/promomilitar/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/promomilitar/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/promomilitar/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/promomilitar/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
$(document).ready(function() {
    // Manejar el botón de editar
    $('.edit-button').on('click', function() {
        var id = $(this).data('id');
        var titulo = $(this).data('titulo');
        var descripcion = $(this).data('descripcion');
        
        $('#edit-id').val(id);
        $('#edit-titulo').val(titulo);
        $('#edit-descripcion').val(descripcion);
        
        // Actualizar el action del formulario con el ID correcto
        $('#editForm').attr('action', 'index.php?action=carrusel/editar/' + id);
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