<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Gestión de Noticias</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="dist/css/adminlte.min.css">
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<style>
.status-badge {
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
    border-radius: 0.25rem;
    margin: 0.1rem;
}
.has-images { background-color: #28a745; color: white; }
.has-videos { background-color: #007bff; color: white; }
.no-media { background-color: #6c757d; color: white; }
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index.php?action=carrusel/index" class="nav-link">Inicio</a>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index.php?action=carrusel/index" class="brand-link">
        <span class="brand-text font-weight-light">Panel de Administración</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                <!-- Carrusel -->
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
                            <a href="index.php?action=carrusel/index" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Carrusel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?action=carruselimg/index" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Carrusel de Imágenes</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Especialidad -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                            Admin Especialidad
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?action=especialidad/index" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Especialidades</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?action=especialidadimg/index" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Imágenes</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Emprendimiento -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            Admin Emprendimiento
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?action=emprendimiento/index" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Especialidades</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?action=emprendimientoimg/index" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Imágenes</p>
                            </a>
                        </li>
                    </ul>
                </li>

                  <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Admin Noticias
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?action=noticias/index" class="nav-link active">
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

                <!-- Logout -->
                <li class="nav-item">
                    <a href="index.php?action=auth/logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Cerrar Sesión</p>
                    </a>
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
                    <h1>Gestión de Noticias</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?action=carrusel/index">Inicio</a></li>
                        <li class="breadcrumb-item active">Noticias</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de Noticias</h3>
                    <div class="card-tools">
                        <a href="index.php?action=noticias/agregar" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Nueva Noticia
                        </a>
                    </div>
                </div>
                
                <div class="card-body">
                    <?php if (isset($_SESSION['mensaje'])): ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?= $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?>
                        </div>
                    <?php endif; ?>

                    <table id="noticiasTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Subtítulo</th>
                                <th>Fecha</th>
                                <th>Multimedia</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($noticias)): ?>
                                <tr><td colspan="6" class="text-center">No hay noticias creadas.</td></tr>
                            <?php else: ?>
                                <?php foreach ($noticias as $noticia): ?>
                                <tr>
                                    <td><?= htmlspecialchars($noticia['id']) ?></td>
                                    <td>
                                        <strong><?= htmlspecialchars($noticia['titulo']) ?></strong>
                                        <br>
                                        <small class="text-muted">
                                            <?= strlen($noticia['descripcion']) > 100 ? 
                                                substr(htmlspecialchars($noticia['descripcion']), 0, 100) . '...' : 
                                                htmlspecialchars($noticia['descripcion']) ?>
                                        </small>
                                    </td>
                                    <td><?= htmlspecialchars($noticia['subtitulo']) ?></td>
                                    <td><?= date('d/m/Y H:i', strtotime($noticia['fecha_creacion'])) ?></td>
                                    <td>
                                        <?php 
                                        $imagenes = $this->modelo->obtenerImagenesNoticia($noticia['id']);
                                        $videos = $this->modelo->obtenerVideosNoticia($noticia['id']);
                                        ?>
                                        <?php if (count($imagenes) > 0): ?>
                                            <span class="status-badge has-images">
                                                <i class="fas fa-images"></i> <?= count($imagenes) ?> img
                                            </span>
                                        <?php endif; ?>
                                        <?php if (count($videos) > 0): ?>
                                            <span class="status-badge has-videos">
                                                <i class="fas fa-video"></i> <?= count($videos) ?> vid
                                            </span>
                                        <?php endif; ?>
                                        <?php if (count($imagenes) == 0 && count($videos) == 0): ?>
                                            <span class="status-badge no-media">
                                                <i class="fas fa-minus"></i> Sin multimedia
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                         
                                            <a href="index.php?action=noticias/editar&id=<?= $noticia['id'] ?>" 
                                               class="btn btn-warning btn-sm" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="index.php?action=noticiasimg/index&noticia_id=<?= $noticia['id'] ?>" 
                                               class="btn btn-success btn-sm" title="Gestionar Imágenes">
                                                <i class="fas fa-images"></i>
                                            </a>
                                            <a href="index.php?action=noticiasvideos/index&noticia_id=<?= $noticia['id'] ?>" 
                                               class="btn btn-primary btn-sm" title="Gestionar Videos">
                                                <i class="fas fa-video"></i>
                                            </a>
                                            <button onclick="confirmarEliminacion(<?= $noticia['id'] ?>, '<?= addslashes($noticia['titulo']) ?>')" 
                                                    class="btn btn-danger btn-sm" title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <button onclick="verDetalle(<?= $noticia['id'] ?>)"
                                                    class="btn btn-secondary btn-sm" title="Ver Detalle">
                                                <i class="fas fa-info-circle"></i>
                                            </button>
                                        </div>
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

<!-- Modal de confirmación -->
<div class="modal fade" id="modalEliminar" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirmar Eliminación</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar la noticia "<span id="tituloNoticia"></span>"?</p>
                <p class="text-danger"><strong>Esta acción no se puede deshacer y eliminará también todas las imágenes y videos asociados.</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a href="#" id="btnConfirmarEliminar" class="btn btn-danger">Eliminar</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal de detalle -->
<div class="modal fade" id="modalDetalle" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detalle de la Noticia</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <h3 id="detalle-titulo"></h3>
                        <h5 class="text-muted" id="detalle-subtitulo"></h5>
                        <hr>
                        <div id="detalle-descripcion"></div>
                        
                        <!-- Imágenes -->
                        <div id="seccion-imagenes" style="display: none;">
                            <h5 class="mt-4"><i class="fas fa-images"></i> Imágenes</h5>
                            <div id="galeria-imagenes" class="row"></div>
                        </div>
                        
                        <!-- Videos -->
                        <div id="seccion-videos" style="display: none;">
                            <h5 class="mt-4"><i class="fas fa-video"></i> Videos</h5>
                            <div id="galeria-videos"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>Información</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>ID:</strong> <span id="detalle-id"></span></p>
                                <p><strong>Fecha:</strong> <span id="detalle-fecha"></span></p>
                                <p><strong>Imágenes:</strong> <span id="detalle-num-imagenes"></span></p>
                                <p><strong>Videos:</strong> <span id="detalle-num-videos"></span></p>
                            </div>
                        </div>
                        
                        <div class="mt-3">
                            <a href="#" id="btn-editar-detalle" class="btn btn-warning btn-block">
                                <i class="fas fa-edit"></i> Editar Noticia
                            </a>
                            <a href="#" id="btn-imagenes-detalle" class="btn btn-success btn-block">
                                <i class="fas fa-images"></i> Gestionar Imágenes
                            </a>
                            <a href="#" id="btn-videos-detalle" class="btn btn-info btn-block">
                                <i class="fas fa-video"></i> Gestionar Videos
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function() {
    $('#noticiasTable').DataTable({
        "responsive": true,
        "autoWidth": false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "order": [[0, "desc"]]
    });
});

function confirmarEliminacion(id, titulo) {
    $('#tituloNoticia').text(titulo);
    $('#btnConfirmarEliminar').attr('href', 'index.php?action=noticias/eliminar&id=' + id);
    $('#modalEliminar').modal('show');
}

function verDetalle(id) {
    // Hacer petición AJAX para obtener los detalles
    $.ajax({
        url: 'index.php?action=noticias/detalle&id=' + id,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data.success) {
                const noticia = data.noticia;
                const imagenes = data.imagenes;
                const videos = data.videos;
                
                // Llenar información básica
                $('#detalle-id').text(noticia.id);
                $('#detalle-titulo').text(noticia.titulo);
                $('#detalle-subtitulo').text(noticia.subtitulo || 'Sin subtítulo');
                $('#detalle-descripcion').html('<p>' + noticia.descripcion.replace(/\n/g, '</p><p>') + '</p>');
                $('#detalle-fecha').text(new Date(noticia.fecha_creacion).toLocaleString('es-ES'));
                $('#detalle-num-imagenes').text(imagenes.length);
                $('#detalle-num-videos').text(videos.length);
                
                // Configurar enlaces
                $('#btn-editar-detalle').attr('href', 'index.php?action=noticias/editar&id=' + noticia.id);
                $('#btn-imagenes-detalle').attr('href', 'index.php?action=noticiasimg/index&noticia_id=' + noticia.id);
                $('#btn-videos-detalle').attr('href', 'index.php?action=noticiasvideos/index&noticia_id=' + noticia.id);
                
                // Mostrar imágenes
                if (imagenes.length > 0) {
                    let galeriaHtml = '';
                    imagenes.forEach(function(imagen) {
                        galeriaHtml += `
                            <div class="col-md-6 mb-3">
                                <img src="${imagen.url}" class="img-fluid rounded" style="max-height: 200px; width: 100%; object-fit: cover;">
                            </div>
                        `;
                    });
                    $('#galeria-imagenes').html(galeriaHtml);
                    $('#seccion-imagenes').show();
                } else {
                    $('#seccion-imagenes').hide();
                }
                
                // Mostrar videos
                if (videos.length > 0) {
                    let videosHtml = '';
                    videos.forEach(function(video) {
                        if (video.tipo === 'youtube') {
                            videosHtml += `
                                <div class="mb-3">
                                    <iframe width="100%" height="315" src="${video.url}" frameborder="0" allowfullscreen></iframe>
                                </div>
                            `;
                        } else {
                            videosHtml += `
                                <div class="mb-3">
                                    <video width="100%" height="315" controls>
                                        <source src="${video.url}" type="video/mp4">
                                        Tu navegador no soporta el elemento video.
                                    </video>
                                </div>
                            `;
                        }
                    });
                    $('#galeria-videos').html(videosHtml);
                    $('#seccion-videos').show();
                } else {
                    $('#seccion-videos').hide();
                }
                
                $('#modalDetalle').modal('show');
            } else {
                alert('Error al cargar los detalles: ' + data.message);
            }
        },
        error: function() {
            alert('Error al cargar los detalles de la noticia');
        }
    });
}
</script>
</body>
</html>
