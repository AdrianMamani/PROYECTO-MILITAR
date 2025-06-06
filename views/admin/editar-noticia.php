<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Editar Noticia</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="dist/css/adminlte.min.css">
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
                            <a href="index.php?action=noticias/index" class="nav-link active">
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
                            <a href="index.php?action=noticiasvideos/index" class="nav-link">
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
                    <h1>Editar Noticia</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?action=carrusel/index">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="index.php?action=noticias/index">Noticias</a></li>
                        <li class="breadcrumb-item active">Editar</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Editar Información de la Noticia</h3>
                        </div>
                        
                        <form action="index.php?action=noticias/update" method="POST">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($noticia['id']) ?>">
                            
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="titulo">Título <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="titulo" name="titulo" 
                                           value="<?= htmlspecialchars($noticia['titulo']) ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="subtitulo">Subtítulo</label>
                                    <input type="text" class="form-control" id="subtitulo" name="subtitulo" 
                                           value="<?= htmlspecialchars($noticia['subtitulo']) ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="descripcion">Descripción <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="6" required><?= htmlspecialchars($noticia['descripcion']) ?></textarea>
                                </div>
                            </div>
                            
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Actualizar Noticia
                                </button>
                                <a href="index.php?action=noticias/index" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Cancelar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Información de la Noticia</h3>
                        </div>
                        <div class="card-body">
                            <p><strong>ID:</strong> <?= htmlspecialchars($noticia['id']) ?></p>
                            <p><strong>Fecha de creación:</strong> <?= date('d/m/Y H:i', strtotime($noticia['fecha_creacion'])) ?></p>
                            
                            <?php 
                            $imagenes = $this->modelo->obtenerImagenesNoticia($noticia['id']);
                            $videos = $this->modelo->obtenerVideosNoticia($noticia['id']);
                            ?>
                            
                            <p><strong>Imágenes:</strong> <?= count($imagenes) ?></p>
                            <p><strong>Videos:</strong> <?= count($videos) ?></p>
                            
                            <hr>
                            
                            <div class="btn-group-vertical d-block">
                                <a href="index.php?action=noticiasimg/index&noticia_id=<?= $noticia['id'] ?>" 
                                   class="btn btn-success btn-block mb-2">
                                    <i class="fas fa-images"></i> Gestionar Imágenes
                                </a>
                                <a href="index.php?action=noticiasvideos/index&noticia_id=<?= $noticia['id'] ?>" 
                                   class="btn btn-info btn-block mb-2">
                                    <i class="fas fa-video"></i> Gestionar Videos
                                </a>
                                <a href="index.php?action=noticias/ver&id=<?= $noticia['id'] ?>" 
                                   class="btn btn-primary btn-block">
                                    <i class="fas fa-eye"></i> Ver Noticia
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
