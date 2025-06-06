<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Crear Noticia</title>
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
                    <h1>Crear Nueva Noticia</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?action=carrusel/index">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="index.php?action=noticias/index">Noticias</a></li>
                        <li class="breadcrumb-item active">Crear</li>
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
                            <h3 class="card-title">Información de la Noticia</h3>
                        </div>
                        
                        <form action="index.php?action=noticias/store" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="titulo">Título <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="titulo" name="titulo" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="subtitulo">Subtítulo</label>
                                    <input type="text" class="form-control" id="subtitulo" name="subtitulo">
                                </div>
                                
                                <div class="form-group">
                                    <label for="descripcion">Descripción <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="6" required></textarea>
                                </div>
                            </div>
                            
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Crear Noticia
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
                            <h3 class="card-title">Información</h3>
                        </div>
                        <div class="card-body">
                            <p><strong>Paso 1:</strong> Completa la información básica de la noticia.</p>
                            <p><strong>Paso 2:</strong> Después de crear la noticia, podrás agregar imágenes o videos.</p>
                            <p><strong>Nota:</strong> Los campos marcados con <span class="text-danger">*</span> son obligatorios.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
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
                                            <a href="index.php?action=noticias/ver&id=<?= $noticia['id'] ?>" 
                                               class="btn btn-info btn-sm" title="Ver">
                                                <i class="fas fa-eye"></i>
                                            </a>
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>