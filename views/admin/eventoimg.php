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
                                <a href="index.php?action=especialidadimg" class="nav-link active">
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
                        <h1>Admin Carrusel de Imágenes</h1>
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
                            <i class="fas fa-plus"></i> Agregar Nueva Imagen
                        </button>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Imagen</th>
                                    <th>Evento</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
        <?php if (empty($imagenes)): ?>
            <tr><td colspan="4">No hay imágenes de eventos</td></tr>
        <?php else: ?>
            <?php foreach ($imagenes as $imagen): ?>
                <tr>
                    <td><?= htmlspecialchars($imagen['id']) ?></td>
                    <td>
                        <img src="/PROYECTO-MILITAR/uploads/evento/<?= htmlspecialchars($imagen['nombre_imagen']) ?>" 
                             alt="Imagen del Evento" 
                             class="img-thumbnail view-image-button"
                             data-toggle="modal" data-target="#viewImageModal"
                             data-imagen="<?= htmlspecialchars($imagen['nombre_imagen']) ?>"
                             style="max-width: 120px; cursor: pointer;">
                    </td>
                    <td><?= htmlspecialchars($imagen['titulo_evento']); ?></td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm edit-button" 
        data-id="<?= htmlspecialchars($imagen['id']) ?>" 
        data-imagen="/PROYECTO-MILITAR/uploads/evento/<?= htmlspecialchars($imagen['nombre_imagen']) ?>"
        data-evento-id="<?= htmlspecialchars($imagen['evento_id']) ?>"
        data-evento-nombre="<?= htmlspecialchars($imagen['titulo_evento']) ?>"
        data-toggle="modal" data-target="#editModal">
    <i class="fas fa-edit"></i> Editar
</button>
                        <a href="index.php?action=eventoimg/delete&id=<?= $imagen['id'] ?>" class="btn btn-danger btn-sm" 
                           onclick="return confirm('¿Estás seguro de eliminar esta imagen?')">
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
    <!-- Modal para agregar nueva imagen -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Agregar Nueva Imagen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addForm" action="index.php?action=eventoimg/store" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" class="form-control-file" id="imagen" name="imagen" required>
            <small class="form-text text-muted">Seleccione la imagen para el evento.</small>
            <div class="mt-2">
              <img id="preview-add" src="" alt="Vista previa" class="img-fluid d-none" style="max-height: 200px;">
            </div>
          </div>
          <div class="form-group">
            <label for="evento_id">Evento</label>
            <select class="form-control" id="evento_id" name="evento_id" required>
              <option value="">Seleccione un evento</option>
              <?php foreach ($eventos as $evento): ?>
                <option value="<?= $evento['id']; ?>"><?= $evento['titulo']; ?></option>
              <?php endforeach; ?>
            </select>
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

<!-- Modal para editar imagen -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Editar Imagen del Evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editForm" method="POST" action="index.php?action=eventoimg/update" enctype="multipart/form-data">
        <input type="hidden" name="id" id="edit-id">
        <div class="modal-body">
          <div class="form-group">
            <label for="edit-imagen">Imagen</label>
            <input type="file" class="form-control-file" id="edit-imagen" name="imagen">
            <div class="mt-2">
              <img id="preview-edit" src="" alt="Vista previa" class="img-fluid d-none" style="max-height: 200px;">
            </div>
            <small class="form-text text-muted">Seleccione la nueva imagen para el evento.</small>
          </div>
          <div class="form-group">
  <label for="edit-evento_nombre">Evento</label>
  <input type="text" class="form-control" id="edit-evento_nombre" name="evento_nombre" readonly>
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
        <h5 class="modal-title" id="viewImageModalLabel">Vista de la Imagen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img id="full-image" src="" class="img-fluid" alt="Imagen Completa">
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
<script src="dist/js/adminlte.min.js"></script>
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
  // Previsualización imagen en AGREGAR
  $('#imagen').on('change', function () {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        $('#preview-add').attr('src', e.target.result).removeClass('d-none');
      };
      reader.readAsDataURL(file);
    }
  });

  // Previsualización imagen en EDITAR
  $('#editModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var id = button.data('id');
  var imagen = button.data('imagen');
  var eventoNombre = button.data('evento-nombre');

  var modal = $(this);
  modal.find('#edit-id').val(id);
  modal.find('#edit-evento_nombre').val(eventoNombre);
  modal.find('#preview-edit').attr('src', imagen).removeClass('d-none');
});

  // Subida por AJAX en formulario AGREGAR (sin renombrar)
  $('#addForm').submit(function (e) {
    e.preventDefault();

    const file = $('#imagen')[0].files[0];
    const eventoId = $('#evento_id').val();
    const formData = new FormData();

    if (!file || !eventoId) {
      alert('Debe completar todos los campos');
      return;
    }

    formData.append('imagen', file);
    formData.append('evento_id', eventoId);

    $.ajax({
      url: 'index.php?action=eventoimg/store',
      method: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      success: function () {
        alert('Imagen agregada correctamente');
        location.reload();
      },
      error: function () {
        alert('Hubo un error al subir la imagen');
      }
    });
  });

  // Ver imagen completa
  $('#viewImageModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var imagen = button.data('imagen');
    var modal = $(this);
    modal.find('#full-image').attr('src', '/PROYECTO-MILITAR/uploads/evento/' + imagen);
  });

  // Inicializar DataTables
  $('#example1').DataTable({
    responsive: true,
    autoWidth: false,
  });
</script>