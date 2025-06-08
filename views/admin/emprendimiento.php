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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                                <a href="index.php?action=emprendimiento" class="nav-link active">
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
                                <i class="fas fa-plus"></i> Agregar Emprendimiento
                            </button>
                        </div>
                        <ul class="nav nav-tabs" id="usuarioTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="emprendimiento-tab" data-toggle="tab" href="#emprendimiento" role="tab" aria-controls="emprendimiento" aria-selected="true">Emprendimiento</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="redes-tab" data-toggle="tab" href="#redes" role="tab" aria-controls="redes" aria-selected="false">Redes Sociales</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-3">
                            <div class="tab-pane fade show active" id="emprendimiento" role="tabpanel" aria-labelledby="emprendimiento-tab">
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Titulo</th>
                                                <th>Contacto</th>
                                                <th>Ubicacion</th>
                                                <th>Descripcion</th>
                                                <th>Sub-Descripcion</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($carruselItems)): ?>
                                                <tr><td colspan="6">No hay items en emprendimiento</td></tr>
                                            <?php else: ?>
                                                <?php foreach ($carruselItems as $item): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($item['id']) ?></td>
                                                    <td><?= htmlspecialchars($item['nombre_emprendimiento']) ?></td>
                                                    <td><?= htmlspecialchars($item['contacto']) ?></td>
                                                    <td><?= htmlspecialchars($item['ubicacion']) ?></td>
                                                    <td><?= htmlspecialchars($item['descripcion']) ?></td>
                                                    <td><?= htmlspecialchars($item['subdescripcion']) ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-warning btn-sm edit-button"
                                                                data-id="<?= $item['id'] ?>"
                                                                data-titulo="<?= htmlspecialchars($item['nombre_emprendimiento']) ?>"
                                                                data-contacto="<?= htmlspecialchars($item['contacto']) ?>"
                                                                data-ubicacion="<?= htmlspecialchars($item['ubicacion']) ?>"
                                                                data-descripcion="<?= htmlspecialchars($item['descripcion']) ?>"
                                                                data-subdescripcion="<?= htmlspecialchars($item['subdescripcion']) ?>"
                                                                data-facebook="<?= htmlspecialchars($item['facebook']) ?>"
                                                                data-instagram="<?= htmlspecialchars($item['instagram']) ?>"
                                                                data-whatsapp="<?= htmlspecialchars($item['whatsapp']) ?>"
                                                                data-toggle="modal" data-target="#editModal">
                                                            <i class="fas fa-edit"></i> Editar
                                                        </button>
                                                        <a href="index.php?action=emprendimiento/eliminar/<?= $item['id'] ?>" class="btn btn-danger btn-sm"
                                                           onclick="return confirm('¿Estás seguro de eliminar este carrusel?')">
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
                            <div class="tab-pane fade" id="redes" role="tabpanel" aria-labelledby="redes-tab">
                                <div class="card-body">
                                    <table class="table table-bordered table-striped" id="socialTable">
                                        <h3>Redes Sociales de Emprendimientos</h3>
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre Emprendimiento</th>
                                                <th>Facebook</th>
                                                <th>Instagram</th>
                                                <th>Whatsapp</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($carruselItems)): ?>
                                                <tr><td colspan="4">No hay redes sociales para mostrar</td></tr>
                                            <?php else: ?>
                                                <?php foreach ($carruselItems as $item): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($item['id']) ?></td>
                                                    <td><?= htmlspecialchars($item['nombre_emprendimiento']) ?></td>
                                                    <td><?= htmlspecialchars($item['facebook']) ?></td>
                                                    <td><?= htmlspecialchars($item['instagram']) ?></td>
                                                    <td><?= htmlspecialchars($item['whatsapp']) ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-warning btn-sm edit-red-button"
                                                            data-id="<?= $item['id'] ?>"
                                                            data-nombre-emprendimiento="<?= htmlspecialchars($item['nombre_emprendimiento']) ?>"
                                                            data-facebook="<?= htmlspecialchars($item['facebook']) ?>"
                                                            data-instagram="<?= htmlspecialchars($item['instagram']) ?>"
                                                            data-whatsapp="<?= htmlspecialchars($item['whatsapp']) ?>"
                                                            data-toggle="modal" data-target="#editred">
                                                            <i class="fas fa-edit"></i> Editar
                                                        </button>
                                                        <a href="index.php?action=emprendimiento/eliminar/<?= $item['id'] ?>" class="btn btn-danger btn-sm"
                                                           onclick="return confirm('¿Estás seguro de eliminar este carrusel?')">
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
                    </div>
                </div>
            </section>
        </div>

        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Agregar Emprendimiento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="index.php?action=emprendimiento/agregar" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombre_emprendimiento">Nombre</label>
                                <input type="text" class="form-control" id="nombre_emprendimiento" name="nombre_emprendimiento" required>
                            </div>
                            <div class="form-group">
                                <label for="contacto">Contacto</label>
                                <input type="text" class="form-control" id="contacto" name="contacto" required>
                            </div>
                            <div class="form-group">
                                <label for="ubicacion_map">Ubicación</label>
                                <div id="ubicacion_map" style="height: 300px;"></div>
                                <!-- Este input guardará la ubicación seleccionada -->
                                <input type="hidden" id="ubicacion" name="ubicacion" required>
                                <small id="direccion_text" class="form-text text-muted mt-2"></small>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="subdescripcion">Sub-Descripción</label>
                                <textarea class="form-control" id="subdescripcion" name="subdescripcion" rows="5" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <textarea class="form-control" id="facebook" name="facebook" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <textarea class="form-control" id="instagram" name="instagram" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="whatsapp">Whatsapp</label>
                                <textarea class="form-control" id="whatsapp" name="whatsapp"required placeholder="Ej: +51 999 999 999 o +51 999999999"></textarea>
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

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar Emprendimiento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editForm" method="POST" action="">
                        <input type="hidden" name="id" id="edit-id">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="edit-nombre_emprendimiento">Nombre</label>
                                <input type="text" class="form-control" id="edit-nombre_emprendimiento" name="nombre_emprendimiento" required>
                            </div>
                            <div class="form-group">
                                <label for="edit-contacto">Contacto</label>
                                <input type="text" class="form-control" id="edit-contacto" name="contacto" required>
                            </div>
                            <div class="form-group">
                                <label for="edit-ubicacion_map">Ubicación</label>
                                <div id="edit-ubicacion_map" style="height: 300px;"></div>
                                <input type="hidden" id="edit-ubicacion" name="ubicacion" required>
                                <small><strong>Dirección:</strong> <span id="edit-direccion_text">Selecciona una ubicación</span></small>
                            </div>
                            <div class="form-group">
                                <label for="edit-descripcion">Descripción</label>
                                <textarea class="form-control" id="edit-descripcion" name="descripcion" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="edit-subdescripcion">Sub-Descripción</label>
                                <textarea class="form-control" id="edit-subdescripcion" name="subdescripcion" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editred" tabindex="-1" role="dialog" aria-labelledby="editRedLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editRedLabel">Editar Redes Sociales</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editRedForm" method="POST" action="">
                        <input type="hidden" name="id" id="editred-id">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="editred-nombre_emprendimiento">Nombre Emprendimiento</label>
                                <input type="text" class="form-control" id="editred-nombre_emprendimiento" name="nombre_emprendimiento" readonly>
                            </div>
                            <div class="form-group">
                                <label for="editred-facebook">Facebook</label>
                                <input type="text" class="form-control" id="editred-facebook" name="facebook">
                            </div>
                            <div class="form-group">
                                <label for="editred-instagram">Instagram</label>
                                <input type="text" class="form-control" id="editred-instagram" name="instagram">
                            </div>
                            <div class="form-group">
                                <label for="editred-whatsapp">Whatsapp</label>
                                <input type="text" class="form-control" id="editred-whatsapp" name="whatsapp" placeholder="Ej: +51 999 999 999 o +51 999999999">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
        $(document).ready(function() {
            $('.edit-button').on('click', function() {
                var id = $(this).data('id');
                $('#edit-id').val(id);
                $('#edit-nombre_emprendimiento').val($(this).data('titulo'));
                $('#edit-contacto').val($(this).data('contacto'));
                $('#edit-ubicacion').val($(this).data('ubicacion'));
                $('#edit-descripcion').val($(this).data('descripcion'));
                $('#edit-subdescripcion').val($(this).data('subdescripcion'));

                $('#editForm').attr('action', 'index.php?action=emprendimiento/editar/' + id);
            });

            $('.edit-red-button').on('click', function() {
                var id = $(this).data('id');
                var nombreEmprendimiento = $(this).data('nombre-emprendimiento');
                var facebook = $(this).data('facebook');
                var instagram = $(this).data('instagram');
                var whatsapp = $(this).data('whatsapp');

                $('#editred-id').val(id);
                $('#editred-nombre_emprendimiento').val(nombreEmprendimiento);
                $('#editred-facebook').val(facebook);
                $('#editred-instagram').val(instagram);
                $('#editred-whatsapp').val(whatsapp);
                $('#editRedForm').attr('action', 'index.php?action=emprendimiento/editar_redes/' + id);
            });

            // Inicializar DataTable si es necesario
            $('#example1').DataTable({
                "responsive": true,
                "autoWidth": false,
            });

            // DataTable para tabla de redes sociales
            $('#socialTable').DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
   <script>
$(document).ready(function() {
    var map;
    var marker;

    function actualizarDireccion(latlng) {
        $('#ubicacion').val(latlng.lat + ',' + latlng.lng);

        // Petición AJAX a Nominatim para geocoding inverso
        $.getJSON('https://nominatim.openstreetmap.org/reverse', {
            format: 'json',
            lat: latlng.lat,
            lon: latlng.lng,
            zoom: 18,
            addressdetails: 1
        }, function(data) {
            if(data && data.display_name) {
                $('#direccion_text').text(data.display_name);
            } else {
                $('#direccion_text').text('Dirección no encontrada');
            }
        }).fail(function() {
            $('#direccion_text').text('Error al obtener la dirección');
        });
    }

    $('#addModal').on('shown.bs.modal', function () {
        if (!map) {
            map = L.map('ubicacion_map').setView([-12.0464, -77.0428], 13); // Cambia por coordenadas por defecto

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            marker = L.marker([-12.0464, -77.0428], {draggable:true}).addTo(map);

            marker.on('dragend', function(e) {
                actualizarDireccion(marker.getLatLng());
            });

            map.on('click', function(e) {
                marker.setLatLng(e.latlng);
                actualizarDireccion(e.latlng);
            });

            // Inicializar con dirección y coordenadas
            actualizarDireccion(marker.getLatLng());

        } else {
            setTimeout(function() {
                map.invalidateSize();
            }, 200);
        }
    });

    $('#addModal').on('hidden.bs.modal', function () {
        if(marker) {
            marker.setLatLng([-12.0464, -77.0428]);
            $('#ubicacion').val('');
            $('#direccion_text').text('');
        }
    });
});
</script>
<script>
let editMap;
let editMarker;

function initEditMap() {
    editMap = L.map('edit-ubicacion_map').setView([-12.0464, -77.0428], 13); // Lima por defecto

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(editMap);

    editMap.on('click', function (e) {
        setEditMarker(e.latlng);
        actualizarDireccionEdit(e.latlng);
    });
}

function setEditMarker(latlng) {
    if (editMarker) {
        editMarker.setLatLng(latlng);
    } else {
        editMarker = L.marker(latlng).addTo(editMap);
    }
}

function actualizarDireccionEdit(latlng) {
    $.getJSON('https://nominatim.openstreetmap.org/reverse', {
        format: 'json',
        lat: latlng.lat,
        lon: latlng.lng,
        zoom: 18,
        addressdetails: 1
    }, function (data) {
        if (data && data.display_name) {
            $('#edit-direccion_text').text(data.display_name);
            $('#edit-ubicacion').val(data.display_name); // Guardamos la dirección
        } else {
            $('#edit-direccion_text').text('Dirección no encontrada');
            $('#edit-ubicacion').val('');
        }
    }).fail(function () {
        $('#edit-direccion_text').text('Error al obtener la dirección');
        $('#edit-ubicacion').val('');
    });
}

// Inicializa el mapa cuando se abre el modal de edición
$('#editModal').on('shown.bs.modal', function () {
    if (!editMap) {
        initEditMap();
    }

    setTimeout(() => {
        editMap.invalidateSize();

        const direccionActual = $('#edit-ubicacion').val();
        if (direccionActual) {
            $.getJSON('https://nominatim.openstreetmap.org/search', {
                format: 'json',
                q: direccionActual,
                limit: 1
            }, function (results) {
                if (results.length > 0) {
                    const lat = results[0].lat;
                    const lon = results[0].lon;
                    const latlng = L.latLng(lat, lon);
                    editMap.setView(latlng, 16);
                    setEditMarker(latlng);
                    $('#edit-direccion_text').text(direccionActual);
                }
            });
        }
    }, 200);
});
</script>

</body>
</html>