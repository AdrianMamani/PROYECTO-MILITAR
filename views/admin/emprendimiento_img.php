<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Emprendimientos</title>
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
                                <a href="index.php?action=emprendimientoimg" class="nav-link active">
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

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Admin Emprendimientos</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item active">Emprendimientos</li>
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
                                <i class="fas fa-plus"></i> Agregar Nuevo Emprendimiento
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Emprendimiento</th>
                                        <th>Tipo</th>
                                        <th>Archivo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($galeria)): ?>
                                        <tr><td colspan="5">No hay archivos en la galería</td></tr>
                                    <?php else: ?>
                                        <?php foreach ($galeria as $item): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($item['id']) ?></td>
                                                <td><?= htmlspecialchars($item['nombre_emprendimiento']) ?></td>
                                                <td><?= htmlspecialchars($item['tipo_archivo']) ?></td>
                                                <td>
                                                    <?php if ($item['tipo_archivo'] === 'imagen'): ?>
                                                        <button class="btn btn-primary" data-toggle="modal" data-target="#viewImageModal" data-imagen="<?= htmlspecialchars($item['url_archivo']) ?>">Ver Imagen</button>
                                                        <div class="modal fade" id="viewImageModal" tabindex="-1" role="dialog" aria-labelledby="viewImageModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="viewImageModalLabel">Vista de la Imagen</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                    <?php elseif ($item['tipo_archivo'] === 'video'): ?>
                                                        <button class="btn btn-primary" data-toggle="modal" data-target="#videoModal<?= $item['id'] ?>">Ver Video</button>
                                                        <div class="modal fade" id="videoModal<?= $item['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="videoModalLabel">Ver Video</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?= htmlspecialchars($item['url_archivo']) ?>" ...></iframe>
                                                                        </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm edit-button" 
                                                            data-id="<?= htmlspecialchars($item['id']) ?>"
                                                            data-emprendimiento="<?= htmlspecialchars($item['nombre_emprendimiento']) ?>"
                                                            data-tipo="<?= htmlspecialchars($item['tipo_archivo']) ?>"
                                                            data-archivo="<?= htmlspecialchars($item['url_archivo']) ?>"
                                                            data-toggle="modal" data-target="#editModal">
                                                        <i class="fas fa-edit"></i> Editar
                                                    </button>
                                                    <a href="index.php?action=emprendimientoimg/delete&id=<?= $item['id'] ?>" class="btn btn-danger btn-sm" 
                                                       onclick="return confirm('¿Estás seguro de eliminar este archivo de la galería?')">
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
    </div>
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="editForm" method="POST" action="index.php?action=emprendimientoimg/update" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Editar Emprendimiento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <input type="hidden" name="id" id="edit-id">
          
          <div class="form-group">
            <label>Nombre del Emprendimiento</label>
            <input type="text" name="nombre_emprendimiento" class="form-control" id="edit-emprendimiento" required readonly>
          </div>

          <div class="form-group">
            <label>Tipo de Archivo</label>
            <select name="tipo_archivo" class="form-control" id="edit-tipo" required>
              <option value="imagen">Imagen</option>
              <option value="video">Video</option>
            </select>
          </div>

          <!-- Para video: Código de YouTube -->
          <div class="form-group" id="video-input-group">
            <label>Escribe el Código de YouTube</label>
            <div class="input-group">
              <input type="text" name="url_archivo" class="form-control" id="edit-archivo">
              <div class="input-group-append">
                <button type="button" class="btn btn-success" id="verify-video">
                  <i class="fas fa-check"></i>
                </button>
              </div>
            </div>
          </div>

          <!-- Para imagen: Selección de archivo -->
          <div class="form-group" id="image-input-group" style="display: none;">
            <label>Selecciona una Imagen</label>
            <input type="file" name="imagen_archivo" id="edit-imagen" accept="image/*" class="form-control">
          </div>

          <!-- Vista previa de video -->
          <div id="video-preview" class="mt-3" style="display: none;">
            <label>Vista previa del Video:</label>
            <div class="embed-responsive embed-responsive-16by9">
              <iframe id="video-frame" class="embed-responsive-item" src="" allowfullscreen></iframe>
            </div>
          </div>

          <!-- Vista previa de imagen -->
          <div id="image-preview" class="mt-3" style="display: none;">
            <label>Vista previa de la Imagen:</label><br>
            <img id="image-frame" src="" alt="Vista previa" class="img-fluid" style="max-height: 300px;">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
      </div>
    </form>
  </div>
</div>

    <!-- Scripts -->
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
        // Mostrar imagen en modal
        $('#viewImageModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Botón que abrió el modal
            var imagen = button.data('imagen');  // Obtiene el valor de 'data-imagen'
            var modal = $(this);
            modal.find('#full-image').attr('src', '/PROYECTO-MILITAR/' + imagen);
        });

        // Inicializar DataTable
        $('#example1').DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        // Al abrir el modal
  $('.edit-button').click(function() {
    const id = $(this).data('id');
    const emprendimiento = $(this).data('emprendimiento');
    const tipo = $(this).data('tipo');
    const archivo = $(this).data('archivo');

    $('#edit-id').val(id);
    $('#edit-emprendimiento').val(emprendimiento);
    $('#edit-tipo').val(tipo);
    $('#edit-archivo').val(archivo);

    $('#video-preview').hide();
    $('#image-preview').hide();
    $('#video-frame').attr('src', '');
    $('#image-frame').attr('src', '');

    if (tipo === 'video') {
      $('#video-input-group').show();
      $('#image-input-group').hide();
      if (archivo.trim() !== '') {
        $('#video-preview').show();
        $('#video-frame').attr('src', 'https://www.youtube.com/embed/' + archivo);
      }
    } else if (tipo === 'imagen') {
      $('#video-input-group').hide();
      $('#image-input-group').show();
      if (archivo.trim() !== '') {
        $('#image-preview').show();
        $('#image-frame').attr('src', archivo);
      }
    }
  });

  // Cuando se cambia el tipo
  $('#edit-tipo').change(function() {
    if ($(this).val() === 'video') {
      $('#video-input-group').show();
      $('#image-input-group').hide();
      $('#video-preview').hide();
      $('#image-preview').hide();
      $('#image-frame').attr('src', '');
    } else {
      $('#video-input-group').hide();
      $('#image-input-group').show();
      $('#video-preview').hide();
      $('#video-frame').attr('src', '');
    }
  });

  // Verificar video
  $('#verify-video').click(function() {
    const codigo = $('#edit-archivo').val().trim();
    if (codigo !== '') {
      $('#video-preview').show();
      $('#video-frame').attr('src', 'https://www.youtube.com/embed/' + codigo);
    } else {
      $('#video-preview').hide();
      $('#video-frame').attr('src', '');
    }
  });

  // Mostrar imagen cuando seleccionas archivo
  $('#edit-imagen').change(function(e) {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(event) {
        $('#image-preview').show();
        $('#image-frame').attr('src', event.target.result);
      }
      reader.readAsDataURL(file);
    } else {
      $('#image-preview').hide();
      $('#image-frame').attr('src', '');
    }
  });
</script>
</body>
</html>