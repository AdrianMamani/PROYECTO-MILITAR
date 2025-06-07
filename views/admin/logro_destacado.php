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
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

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
                    <i class="fas fa-plus"></i> Agregar Logro
                </button>
            </div>

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Fecha</th>
                            <th>Descripcion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($eventos)): ?>
                            <tr><td colspan="7">No hay Logros disponibles</td></tr>
                        <?php else: ?>
                            <?php foreach ($eventos as $evento): ?>
                                <tr>
                                    <td><?= htmlspecialchars($evento['id']) ?></td>
                                    <td><?= htmlspecialchars($evento['titulo']) ?></td>
                                    <td><?= htmlspecialchars($evento['fecha']) ?></td>
                                    <td><?= htmlspecialchars($evento['descripcion']) ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm edit-button" 
    data-id="<?= $evento['id'] ?>" 
    data-titulo="<?= htmlspecialchars($evento['titulo']) ?>" 
    data-fecha="<?= htmlspecialchars($evento['fecha']) ?>" 
    data-descripcion="<?= htmlspecialchars($evento['descripcion']) ?>"
    data-toggle="modal" data-target="#editModal">
  <i class="fas fa-edit"></i> Editar
</button>
                                        <a href="index.php?action=evento/eliminar/<?= $evento['id'] ?>" class="btn btn-danger btn-sm"
                                           onclick="return confirm('¿Estás seguro de eliminar este evento?')">
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
<!-- agregar -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Agregar Logro Destacado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="index.php?action=logrodestacado/agregar" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
          </div>
          <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" required>
          </div>
          <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
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
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Editar Evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="index.php?action=evento/actualizar" method="POST">
        <input type="hidden" id="edit_id" name="id" />
        <div class="modal-body">
          <div class="form-group">
            <label for="edit_titulo">Título</label>
            <input type="text" class="form-control" id="edit_titulo" name="titulo" required>
          </div>
          <div class="form-group">
            <label for="edit_fecha">Fecha</label>
            <input type="date" class="form-control" id="edit_fecha" name="fecha" required>
          </div>
          <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
          </div>
          <small class="text-muted">Felicitamos a cada miembro por su heroico logro.</small>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
      </form>
    </div>
  </div>
</div>

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
$(document).ready(function() {
    // Inicializar DataTable si es necesario
    $('#example1').DataTable({
        "responsive": true,
        "autoWidth": false,
    });
});
</script>
<script>
  let editMap;
  let editMarker;

  function reverseGeocodeEdit(lat, lng) {
    const url = `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`;

    fetch(url)
      .then(response => response.json())
      .then(data => {
        if(data && data.display_name){
          document.getElementById('edit_direccion').value = data.display_name;
        } else {
          document.getElementById('edit_direccion').value = "Dirección no encontrada";
        }
      })
      .catch(() => {
        document.getElementById('edit_direccion').value = "Error al obtener dirección";
      });
  }

  function initEditMap(lat, lng) {
    if(editMap) {
      editMap.setView([lat, lng], 13);
      editMarker.setLatLng([lat, lng]);
      return;
    }

    editMap = L.map('edit_map').setView([lat, lng], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap contributors'
    }).addTo(editMap);

    editMarker = L.marker([lat, lng], { draggable: true }).addTo(editMap);

    editMarker.on('moveend', function(e) {
      const pos = e.target.getLatLng();
      document.getElementById('edit_latitud').value = pos.lat.toFixed(6);
      document.getElementById('edit_longitud').value = pos.lng.toFixed(6);
      reverseGeocodeEdit(pos.lat, pos.lng);
    });
  }

  // Cuando se abra el modal de editar, cargamos los datos y el mapa
  $('#editModal').on('show.bs.modal', function (event) {
    const button = $(event.relatedTarget); // Botón que abrió el modal

    const id = button.data('id');
    const titulo = button.data('titulo');
    const fecha = button.data('fecha'); // Asegúrate que lo pases en data-fecha="YYYY-MM-DD"
    const descripcion = button.data('descripcion');
    const direccion = button.data('direccion');
    const latitud = parseFloat(button.data('latitud'));
    const longitud = parseFloat(button.data('longitud'));

    // Poner valores en inputs
    $('#edit_id').val(id);
    $('#edit_titulo').val(titulo);
    $('#edit_fecha').val(fecha);
    $('#descripcion').val(descripcion);
    $('#edit_direccion').val(direccion);
    $('#edit_latitud').val(latitud.toFixed(6));
    $('#edit_longitud').val(longitud.toFixed(6));

    // Inicializar o mover mapa
    setTimeout(() => {
      initEditMap(latitud, longitud);
    }, 200);
  });
</script>

<script>
  let map;
  let marker;

  function reverseGeocode(lat, lng) {
    // Usamos Nominatim para reverse geocoding (gratuito)
    const url = `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`;

    fetch(url)
      .then(response => response.json())
      .then(data => {
        if(data && data.display_name){
          document.getElementById('direccion').value = data.display_name;
        } else {
          document.getElementById('direccion').value = "Dirección no encontrada";
        }
      })
      .catch(() => {
        document.getElementById('direccion').value = "Error al obtener dirección";
      });
  }

  function initMapLeaflet() {
    const limaCoords = [-12.0464, -77.0428]; // Lima, Perú

    map = L.map('map').setView(limaCoords, 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    marker = L.marker(limaCoords, { draggable: true }).addTo(map);

    // Inicializar inputs
    document.getElementById('latitud').value = limaCoords[0].toFixed(6);
    document.getElementById('longitud').value = limaCoords[1].toFixed(6);
    reverseGeocode(limaCoords[0], limaCoords[1]);

    // Al mover el marcador actualizamos lat, lng y dirección
    marker.on('moveend', function(e) {
      const pos = e.target.getLatLng();
      document.getElementById('latitud').value = pos.lat.toFixed(6);
      document.getElementById('longitud').value = pos.lng.toFixed(6);
      reverseGeocode(pos.lat, pos.lng);
    });
  }

  // Inicializar el mapa cuando se abra el modal
  $('#addModal').on('shown.bs.modal', function () {
    setTimeout(() => {
      if (!map) {
        initMapLeaflet();
      } else {
        map.invalidateSize();
      }
    }, 200);
  });
</script>
</body>
</html>