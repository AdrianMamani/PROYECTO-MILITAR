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
                                <a href="index.php?action=logrovideo" class="nav-link active">
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

        <!-- Sección principal -->
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addVideoModal">
                    <i class="fas fa-plus"></i> Agregar Nuevo Video
                </button>
            </div>
            <div class="card-body">
                <table id="tablaVideos" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Vista Previa</th>
                            <th>Logro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php if (empty($videos)): ?>
        <tr><td colspan="4">No hay videos de eventos</td></tr>
    <?php else: ?>
        <?php foreach ($videos as $video): ?>
            <tr>
                <td><?= htmlspecialchars($video['id']) ?></td>
                <td>
                    <img src="https://img.youtube.com/vi/<?= htmlspecialchars($video['codigo_video']) ?>/0.jpg"
                         alt="Miniatura YouTube" class="img-thumbnail"
                         style="max-width: 120px; cursor: pointer;"
                         data-toggle="modal" data-target="#viewVideoModal"
                         data-codigo="<?= htmlspecialchars($video['codigo_video']) ?>">
                </td>
                <td><?= htmlspecialchars($video['titulo_logro']) ?></td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm edit-video-button"
                        data-id="<?= htmlspecialchars($video['id']) ?>"
                        data-codigo="<?= htmlspecialchars($video['codigo_video']) ?>"
                        data-evento-id="<?= htmlspecialchars($video['logro_id']) ?>"
                        data-evento-nombre="<?= htmlspecialchars($video['titulo_logro']) ?>"
                        data-toggle="modal" data-target="#editVideoModal">
                        <i class="fas fa-edit"></i> Editar
                    </button>
                    <a href="index.php?action=logrovideo/delete&id=<?= $video['id'] ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('¿Estás seguro de eliminar este video?')">
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
<div class="modal fade" id="addVideoModal" tabindex="-1" role="dialog" aria-labelledby="addVideoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="addVideoForm" action="index.php?action=logrovideo/store" method="POST">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar Nuevo Video de YouTube</h5>
          <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="codigo_youtube">ID del Video de YouTube</label>
            <input type="text" class="form-control" name="codigo_video" id="codigo_youtube" placeholder="Ej: dQw4w9WgXcQ" required>
            <small class="form-text text-muted">Solo el ID del video (no la URL completa).</small>
          </div>

          <!-- Vista previa -->
          <div id="preview-container" class="mb-3" style="display: none;">
            <label>Vista previa del video:</label>
            <div class="embed-responsive embed-responsive-16by9">
              <iframe id="youtube-preview" class="embed-responsive-item" src="" allowfullscreen></iframe>
            </div>
          </div>

          <div class="form-group mt-3">
            <label for="evento_video_id">Logro</label>
            <select class="form-control" id="logro_id" name="logro_id" required>
              <option value="">Seleccione un logro</option>
              <?php foreach ($logros as $logro): ?>
                <option value="<?= $logro['id']; ?>"><?= $logro['titulo']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal para editar video -->
<div class="modal fade" id="editVideoModal" tabindex="-1">
  <div class="modal-dialog">
    <form id="editVideoForm" action="index.php?action=logrovideo/update" method="POST">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Video</h5>
          <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="edit-video-id">

          <div class="form-group">
            <label for="edit-codigo-video">ID de YouTube</label>
            <input type="text" class="form-control" name="codigo_video" id="edit-codigo-video" required>
          </div>

          <!-- Vista previa del video -->
          <div id="edit-preview-container" class="mb-3" style="display: none;">
            <label>Vista previa:</label>
            <div class="embed-responsive embed-responsive-16by9">
              <iframe id="edit-youtube-preview" class="embed-responsive-item" src="" allowfullscreen></iframe>
            </div>
          </div>

          <div class="form-group">
            <label for="edit-evento-nombre">Evento</label>
            <input type="text" class="form-control" id="edit-evento-nombre" readonly>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal para ver imagen -->
<div class="modal fade" id="viewVideoModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Vista del Video</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <div class="modal-body text-center" id="video-view-content"></div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
   // Mostrar inputs según tipo de video
  document.getElementById('codigo_youtube').addEventListener('input', function () {
    const videoId = this.value.trim();
    const previewContainer = document.getElementById('preview-container');
    const previewFrame = document.getElementById('youtube-preview');

    if (videoId.match(/^[a-zA-Z0-9_-]{11}$/)) {
      previewFrame.src = `https://www.youtube.com/embed/${videoId}`;
      previewContainer.style.display = 'block';
    } else {
      previewFrame.src = '';
      previewContainer.style.display = 'none';
    }
  });

  // Mostrar la vista previa en vivo al escribir el nuevo ID
  document.getElementById('edit-codigo-video').addEventListener('input', function () {
    const videoId = this.value.trim();
    const previewContainer = document.getElementById('edit-preview-container');
    const previewFrame = document.getElementById('edit-youtube-preview');

    if (videoId.match(/^[a-zA-Z0-9_-]{11}$/)) {
      previewFrame.src = `https://www.youtube.com/embed/${videoId}`;
      previewContainer.style.display = 'block';
    } else {
      previewFrame.src = '';
      previewContainer.style.display = 'none';
    }
  });

  // Rellenar modal con datos cuando se hace clic en "Editar"
  document.querySelectorAll('.edit-video-button').forEach(button => {
    button.addEventListener('click', function () {
      const id = this.dataset.id;
      const codigo = this.dataset.codigo;
      const eventoNombre = this.dataset.eventoNombre;

      document.getElementById('edit-video-id').value = id;
      document.getElementById('edit-codigo-video').value = codigo;
      document.getElementById('edit-evento-nombre').value = eventoNombre;

      // Cargar la vista previa del video actual
      const previewFrame = document.getElementById('edit-youtube-preview');
      const previewContainer = document.getElementById('edit-preview-container');

      if (codigo.match(/^[a-zA-Z0-9_-]{11}$/)) {
        previewFrame.src = `https://www.youtube.com/embed/${codigo}`;
        previewContainer.style.display = 'block';
      } else {
        previewFrame.src = '';
        previewContainer.style.display = 'none';
      }
    });
  });

  $('#viewVideoModal').on('show.bs.modal', function (event) {
    const button = $(event.relatedTarget);
    const codigo = button.data('codigo');

    // Solo trabajamos con YouTube
    const iframe = `<div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item"
                              src="https://www.youtube.com/embed/${codigo}"
                              allowfullscreen></iframe>
                    </div>`;
    $('#video-view-content').html(iframe);
  });

  $('#viewVideoModal').on('hidden.bs.modal', function () {
    // Detener video al cerrar
    $('#video-view-content').html('');
  });
  // Inicializar DataTables
  $('#example1').DataTable({
    responsive: true,
    autoWidth: false,
  });
</script>