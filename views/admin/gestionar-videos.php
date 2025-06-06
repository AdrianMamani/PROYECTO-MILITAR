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
                            <a href="index.php?action=noticias/index" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Noticias</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?action=noticiasimg/index" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Imágenes de Noticias</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?action=noticiasvideos/index" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Videos de Noticias</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="index.php?action=finanzas/index" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>Registro de Aportaciones</p>
                    </a>
                </li>
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
                    <h1>Gestionar Videos</h1>
                    <p class="text-muted">Noticia: <?= htmlspecialchars($noticia['titulo']) ?></p>
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
                            <input type="hidden" name="noticia_id" value="<?= $noticia['id'] ?>">
                            
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
                                    <label for="youtube_url">URL de YouTube <span class="text-danger">*</span></label>
                                    <input type="url" class="form-control" id="youtube_url" name="youtube_url" 
                                           placeholder="https://www.youtube.com/watch?v=...">
                                    <small class="form-text text-muted">
                                        Pega la URL completa del video de YouTube
                                    </small>
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
                                <button type="submit" class="btn btn-primary btn-block">
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
                            <a href="index.php?action=noticias/editar&id=<?= $noticia['id'] ?>" class="btn btn-warning btn-block">
                                <i class="fas fa-edit"></i> Editar Noticia
                            </a>
                            <a href="index.php?action=noticiasimg/index&noticia_id=<?= $noticia['id'] ?>" class="btn btn-success btn-block">
                                <i class="fas fa-images"></i> Gestionar Imágenes
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Lista de videos existentes -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-video"></i> Videos de la Noticia (<?= count($videos) ?>)
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
        videoLocal.value = ''; // Limpiar el campo
    } else {
        youtubeField.style.display = 'none';
        localField.style.display = 'block';
        youtubeUrl.required = false;
        videoLocal.required = true;
        youtubeUrl.value = ''; // Limpiar el campo
    }
}

function confirmarEliminacion(id, tipo) {
    $('#btnConfirmarEliminar').attr('href', 'index.php?action=noticiasvideos/eliminar&id=' + id + '&noticia_id=<?= $noticia['id'] ?>');
    $('#modalEliminar').modal('show');
}

// Validación mejorada del formulario
document.getElementById('videoForm').addEventListener('submit', function(e) {
    const youtubeChecked = document.getElementById('youtube').checked;
    const youtubeUrl = document.getElementById('youtube_url').value.trim();
    const videoLocal = document.getElementById('video_local').files.length;
    
    if (youtubeChecked) {
        if (!youtubeUrl) {
            e.preventDefault();
            alert('Por favor, ingresa una URL de YouTube válida.');
            return false;
        }
        
        // Validar formato de URL de YouTube
        const youtubeRegex = /^(https?:\/\/)?(www\.)?(youtube\.com\/(watch\?v=|embed\/)|youtu\.be\/)[\w-]+/;
        if (!youtubeRegex.test(youtubeUrl)) {
            e.preventDefault();
            alert('La URL de YouTube no tiene un formato válido.');
            return false;
        }
    } else {
        if (videoLocal === 0) {
            e.preventDefault();
            alert('Por favor, selecciona un archivo de video.');
            return false;
        }
        
        // Validar tamaño del archivo
        const file = document.getElementById('video_local').files[0];
        const maxSize = 50 * 1024 * 1024; // 50MB
        
        if (file.size > maxSize) {
            e.preventDefault();
            alert('El archivo es demasiado grande. El tamaño máximo es 50MB.');
            return false;
        }
        
        // Validar tipo de archivo
        const allowedTypes = ['video/mp4', 'video/avi', 'video/mov', 'video/wmv', 'video/webm'];
        if (!allowedTypes.includes(file.type)) {
            e.preventDefault();
            alert('Tipo de archivo no permitido. Use: MP4, AVI, MOV, WMV, WebM');
            return false;
        }
    }
    
    // Mostrar indicador de carga
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Procesando...';
    submitBtn.disabled = true;
    
    // Si todo está bien, el formulario se enviará
    return true;
});

// Mostrar información del archivo seleccionado
document.getElementById('video_local').addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const size = (file.size / (1024 * 1024)).toFixed(2);
        const info = `Archivo: ${file.name} (${size} MB)`;
        
        // Crear o actualizar elemento de información
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
