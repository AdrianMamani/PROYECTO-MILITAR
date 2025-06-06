<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Noticia Creada</title>
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
                    <h1>¡Noticia Creada Exitosamente!</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-check-circle"></i> Noticia Creada
                            </h3>
                        </div>
                        
                        <div class="card-body">
                            <div class="alert alert-success">
                                <h5><i class="icon fas fa-check"></i> ¡Éxito!</h5>
                                La noticia "<strong><?= htmlspecialchars($noticia['titulo']) ?></strong>" ha sido creada correctamente.
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Información de la Noticia:</h5>
                                    <p><strong>Título:</strong> <?= htmlspecialchars($noticia['titulo']) ?></p>
                                    <p><strong>Subtítulo:</strong> <?= htmlspecialchars($noticia['subtitulo']) ?></p>
                                    <p><strong>Fecha:</strong> <?= htmlspecialchars($noticia['fecha_creacion']) ?></p>
                                </div>
                                <div class="col-md-6">
                                    <h5>¿Qué quieres hacer ahora?</h5>
                                    <div class="btn-group-vertical d-block">
                                        <a href="index.php?action=noticiasimg/index&noticia_id=<?= $noticia['id'] ?>" 
                                           class="btn btn-primary btn-block mb-2">
                                            <i class="fas fa-images"></i> Agregar Imágenes
                                        </a>
                                        <a href="index.php?action=noticiasvideos/index&noticia_id=<?= $noticia['id'] ?>" 
                                           class="btn btn-info btn-block mb-2">
                                            <i class="fas fa-video"></i> Agregar Videos
                                        </a>
                                        <a href="index.php?action=noticias/agregar" 
                                           class="btn btn-success btn-block mb-2">
                                            <i class="fas fa-plus"></i> Crear Otra Noticia
                                        </a>
                                        <a href="index.php?action=noticias/index" 
                                           class="btn btn-secondary btn-block">
                                            <i class="fas fa-list"></i> Ver Todas las Noticias
                                        </a>
                                    </div>
                                </div>
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