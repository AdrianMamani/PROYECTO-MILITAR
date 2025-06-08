<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Gestionar Videos - <?= htmlspecialchars($noticia['titulo']) ?></title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="dist/css/adminlte.min.css">
<style>
.video-card {
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 15px;
    margin-bottom: 15px;
    background: #f9f9f9;
}
.video-preview {
    width: 100%;
    max-width: 400px;
    height: 225px;
}
.preview-container {
    margin-top: 15px;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 5px;
    border: 1px solid #dee2e6;
}
.alert-debug {
    background: #e3f2fd;
    border: 1px solid #2196f3;
    color: #1976d2;
    padding: 10px;
    border-radius: 5px;
    margin: 10px 0;
    font-family: monospace;
    font-size: 12px;
}
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
                                <a href="index.php?action=videoevento" class="nav-link active">
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
                    <h1>Gestionar Videos</h1>
                    <?php if ($noticia && isset($noticia['titulo'])): ?>
                        <p class="text-muted">Noticia: <?= htmlspecialchars($noticia['titulo']) ?></p>
                    <?php else: ?>
                        <p class="text-muted">Noticia: No disponible</p>
                    <?php endif; ?>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?action=carrusel/index">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="index.php?action=noticias/index">Noticias</a></li>
                        <li class="breadcrumb-item active">Videos</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- Mostrar mensajes de error o éxito -->
            <?php if (isset($_SESSION['mensaje'])): ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fas fa-check"></i> <?= $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fas fa-exclamation-triangle"></i> <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <div class="row">
                <!-- Formulario para agregar video -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-plus"></i> Agregar Nuevo Video
                            </h3>
                        </div>
                        
                        <form action="index.php?action=noticiasvideos/store" method="POST" enctype="multipart/form-data" id="videoForm">
                            <input type="hidden" name="noticia_id" value="<?= $noticia ? htmlspecialchars($noticia['id']) : '' ?>">
                            
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tipo de Video <span class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_video" id="youtube" value="youtube" checked onchange="toggleVideoType()">
                                        <label class="form-check-label" for="youtube">
                                            <i class="fab fa-youtube text-danger"></i> Video de YouTube
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_video" id="local" value="local" onchange="toggleVideoType()">
                                        <label class="form-check-label" for="local">
                                            <i class="fas fa-upload text-primary"></i> Subir Video Local
                                        </label>
                                    </div>
                                </div>
                                
                                <!-- Campo para YouTube -->
                                <div class="form-group" id="youtube_field">
                                    <label for="youtube_url">URL de YouTube o ID del Video <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="youtube_url" name="youtube_url" 
                                           placeholder="Ejemplos: https://www.youtube.com/watch?v=ouH2QfZAN1o o simplemente: ouH2QfZAN1o"
                                           onchange="previewYouTubeVideo()" onkeyup="previewYouTubeVideo()">
                                    <small class="form-text text-muted">
                                        Puedes usar:
                                        <br>• URL completa: https://www.youtube.com/watch?v=ouH2QfZAN1o
                                        <br>• URL corta: https://youtu.be/ouH2QfZAN1o  
                                        <br>• Solo el ID: ouH2QfZAN1o
                                    </small>
                                    
                                    <!-- Vista previa del video -->
                                    <div id="youtube_preview" class="preview-container" style="display: none;">
                                        <h6><i class="fab fa-youtube text-danger"></i> Vista Previa:</h6>
                                        <iframe id="youtube_iframe" width="100%" height="200" frameborder="0" allowfullscreen></iframe>
                                        <div class="alert-debug" id="debug_info"></div>
                                    </div>
                                </div>
                                
                                <!-- Campo para video local -->
                                <div class="form-group" id="local_field" style="display: none;">
                                    <label for="video_local">Archivo de Video <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file" id="video_local" name="video_local" 
                                           accept="video/*">
                                    <small class="form-text text-muted">
                                        Formatos: MP4, AVI, MOV, WMV, FLV, WebM. Máximo: 50MB
                                    </small>
                                </div>
                            </div>
                            
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-block" id="submitBtn">
                                    <i class="fas fa-plus"></i> Agregar Video
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Acciones</h3>
                        </div>
                        <div class="card-body">
                            <a href="index.php?action=noticias/index" class="btn btn-secondary btn-block">
                                <i class="fas fa-arrow-left"></i> Volver a Noticias
                            </a>
                            <?php if ($noticia && isset($noticia['id'])): ?>
                                <a href="index.php?action=noticias/editar&id=<?= $noticia['id'] ?>" class="btn btn-warning btn-block">
                                    <i class="fas fa-edit"></i> Editar Noticia
                                </a>
                                <a href="index.php?action=noticiasimg/index&noticia_id=<?= $noticia['id'] ?>" class="btn btn-success btn-block">
                                    <i class="fas fa-images"></i> Gestionar Imágenes
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <!-- Lista de videos existentes -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-video"></i> Videos de la Noticia (<?= is_array($videos) ? count($videos) : 0 ?>)
                            </h3>
                        </div>
                        
                        <div class="card-body">
                            <?php if (empty($videos)): ?>
                                <div class="text-center text-muted py-4">
                                    <i class="fas fa-video fa-3x mb-3"></i>
                                    <p>No hay videos para esta noticia.</p>
                                    <p>Usa el formulario de la izquierda para agregar el primer video.</p>
                                </div>
                            <?php else: ?>
                                <?php foreach ($videos as $video): ?>
                                <div class="video-card">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php if ($video['tipo'] === 'youtube'): ?>
                                                <iframe class="video-preview" 
                                                        src="<?= htmlspecialchars($video['url']) ?>" 
                                                        frameborder="0" 
                                                        allowfullscreen>
                                                </iframe>
                                            <?php else: ?>
                                                <video class="video-preview" controls>
                                                    <source src="<?= htmlspecialchars($video['url']) ?>" type="video/mp4">
                                                    Tu navegador no soporta el elemento video.
                                                </video>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>
                                                <?php if ($video['tipo'] === 'youtube'): ?>
                                                    <i class="fab fa-youtube text-danger"></i> Video de YouTube
                                                <?php else: ?>
                                                    <i class="fas fa-file-video text-primary"></i> Video Local
                                                <?php endif; ?>
                                            </h5>
                                            
                                            <p><strong>Tipo:</strong> <?= ucfirst($video['tipo']) ?></p>
                                            <p><strong>Fecha:</strong> <?= date('d/m/Y H:i', strtotime($video['fecha_creacion'])) ?></p>
                                            
                                            <?php if ($video['tipo'] === 'youtube'): ?>
                                                <p><strong>URL:</strong> 
                                                    <a href="<?= str_replace('/embed/', '/watch?v=', $video['url']) ?>" target="_blank" class="text-primary">
                                                        Ver en YouTube <i class="fas fa-external-link-alt"></i>
                                                    </a>
                                                </p>
                                            <?php endif; ?>
                                            
                                            <button onclick="confirmarEliminacion(<?= $video['id'] ?>, '<?= $video['tipo'] ?>')" 
                                                    class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Eliminar Video
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
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
                <p>¿Estás seguro de que deseas eliminar este video?</p>
                <p class="text-danger"><strong>Esta acción no se puede deshacer.</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a href="#" id="btnConfirmarEliminar" class="btn btn-danger">Eliminar</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

<script>
function toggleVideoType() {
    const youtubeChecked = document.getElementById('youtube').checked;
    const youtubeField = document.getElementById('youtube_field');
    const localField = document.getElementById('local_field');
    const youtubeUrl = document.getElementById('youtube_url');
    const videoLocal = document.getElementById('video_local');
    
    if (youtubeChecked) {
        youtubeField.style.display = 'block';
        localField.style.display = 'none';
        youtubeUrl.required = true;
        videoLocal.required = false;
        videoLocal.value = '';
    } else {
        youtubeField.style.display = 'none';
        localField.style.display = 'block';
        youtubeUrl.required = false;
        videoLocal.required = true;
        youtubeUrl.value = '';
        document.getElementById('youtube_preview').style.display = 'none';
    }
}

function extractYouTubeId(input) {
    input = input.trim();
    
    // Si ya es un ID directo (11 caracteres)
    if (/^[a-zA-Z0-9_-]{11}$/.test(input)) {
        return input;
    }
    
    // Patrones para URLs
    const patterns = [
        /(?:youtube\.com\/watch\?v=)([a-zA-Z0-9_-]{11})/,
        /(?:youtu\.be\/)([a-zA-Z0-9_-]{11})/,
        /(?:youtube\.com\/embed\/)([a-zA-Z0-9_-]{11})/,
        /(?:youtube\.com\/watch\?.*v=)([a-zA-Z0-9_-]{11})/,
        /(?:m\.youtube\.com\/watch\?v=)([a-zA-Z0-9_-]{11})/
    ];
    
    for (let pattern of patterns) {
        const match = input.match(pattern);
        if (match) {
            return match[1];
        }
    }
    
    return null;
}

function previewYouTubeVideo() {
    const input = document.getElementById('youtube_url').value;
    const previewDiv = document.getElementById('youtube_preview');
    const iframe = document.getElementById('youtube_iframe');
    const debugInfo = document.getElementById('debug_info');
    
    if (!input.trim()) {
        previewDiv.style.display = 'none';
        return;
    }
    
    const videoId = extractYouTubeId(input);
    
    debugInfo.innerHTML = `
        <strong>Debug Info:</strong><br>
        Input: ${input}<br>
        Extracted ID: ${videoId || 'No se pudo extraer'}<br>
        Pattern Match: ${videoId ? 'Sí' : 'No'}
    `;
    
    if (videoId) {
        iframe.src = `https://www.youtube.com/embed/${videoId}`;
        previewDiv.style.display = 'block';
    } else {
        previewDiv.style.display = 'none';
    }
}

function confirmarEliminacion(id, tipo) {
    const noticiaId = <?= $noticia && isset($noticia['id']) ? $noticia['id'] : 0 ?>;
    $('#btnConfirmarEliminar').attr('href', 'index.php?action=noticiasvideos/eliminar&id=' + id + '&noticia_id=' + noticiaId);
    $('#modalEliminar').modal('show');
}

// Validación del formulario
document.getElementById('videoForm').addEventListener('submit', function(e) {
    const youtubeChecked = document.getElementById('youtube').checked;
    const youtubeInput = document.getElementById('youtube_url').value.trim();
    const videoLocal = document.getElementById('video_local').files.length;
    
    console.log('Formulario enviado:', {
        youtubeChecked: youtubeChecked,
        youtubeInput: youtubeInput,
        videoLocal: videoLocal
    });
    
    if (youtubeChecked) {
        if (!youtubeInput) {
            e.preventDefault();
            alert('Por favor, ingresa una URL de YouTube o un ID de video.');
            return false;
        }
        
        const videoId = extractYouTubeId(youtubeInput);
        if (!videoId) {
            e.preventDefault();
            alert('No se pudo extraer el ID del video. Verifica que sea una URL válida de YouTube o un ID de 11 caracteres.');
            return false;
        }
        
        console.log('Video ID extraído:', videoId);
    } else {
        if (videoLocal === 0) {
            e.preventDefault();
            alert('Por favor, selecciona un archivo de video.');
            return false;
        }
        
        const file = document.getElementById('video_local').files[0];
        const maxSize = 50 * 1024 * 1024; // 50MB
        
        if (file.size > maxSize) {
            e.preventDefault();
            alert('El archivo es demasiado grande. El tamaño máximo es 50MB.');
            return false;
        }
    }
    
    // Mostrar indicador de carga
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Procesando...';
    submitBtn.disabled = true;
    
    return true;
});

// Mostrar información del archivo seleccionado
document.getElementById('video_local').addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const size = (file.size / (1024 * 1024)).toFixed(2);
        const info = `Archivo: ${file.name} (${size} MB)`;
        
        let infoElement = document.getElementById('file-info');
        if (!infoElement) {
            infoElement = document.createElement('small');
            infoElement.id = 'file-info';
            infoElement.className = 'form-text text-info';
            this.parentNode.appendChild(infoElement);
        }
        infoElement.textContent = info;
    }
});
</script>
</body>
</html>
