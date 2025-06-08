<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Aportacion.php';

$model = new AportacionesModel();
$emprendimientos = $model->getAll();

// Procesar acciones
$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'nombre' => $_POST['nombre'],
        'descripcion' => $_POST['descripcion'],
        'fecha_registro' => $_POST['fecha_registro']
    ];

    if ($action === 'agregar') {
        if ($model->create($data)) {
            header('Location: index.php?seccion=emprendimiento');
            exit();
        }
    } elseif ($action === 'editar' && $id) {
        if ($model->update($id, $data)) {
            header('Location: index.php?seccion=emprendimiento');
            exit();
        }
    }
}

if ($action === 'eliminar' && $id) {
    if ($model->delete($id)) {
        header('Location: index.php?seccion=emprendimiento');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Emprendimientos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
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
                            <i class="nav-icon fas fa-sliders-h"></i>
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
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Contenido Principal -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <h1>Gestión de Emprendimientos</h1>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Emprendimientos</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregar">
                                <i class="fas fa-plus"></i> Nuevo Emprendimiento
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Fecha registro</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($emprendimientos as $emp): ?>
                                <tr>
                                    <td><?= htmlspecialchars($emp['id']) ?></td>
                                    <td><?= htmlspecialchars($emp['nombre']) ?></td>
                                    <td><?= htmlspecialchars($emp['descripcion']) ?></td>
                                    <td><?= htmlspecialchars($emp['fecha_registro']) ?></td>
                                    <td>
                                        <button class="btn btn-info btn-sm" onclick="mostrarDetalles(<?= $emp['id'] ?>)">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning btn-sm" onclick="editarEmprendimiento(<?= $emp['id'] ?>)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm" onclick="confirmarEliminar(<?= $emp['id'] ?>)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal Agregar -->
    <div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="modalAgregarLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="index.php?seccion=emprendimiento&action=agregar">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAgregarLabel">Agregar Emprendimiento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="fecha_registro">Fecha de registro</label>
                            <input type="date" class="form-control" id="fecha_registro" name="fecha_registro" required>
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

    <!-- Modal Editar -->
    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="" id="formEditar">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditarLabel">Editar Emprendimiento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_nombre">Nombre</label>
                            <input type="text" class="form-control" id="edit_nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_descripcion">Descripción</label>
                            <textarea class="form-control" id="edit_descripcion" name="descripcion" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit_fecha_registro">Fecha de Creación</label>
                            <input type="date" class="form-control" id="edit_fecha_registro" name="fecha_registro" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Ver Detalles -->
    <div class="modal fade" id="modalDetalles" tabindex="-1" role="dialog" aria-labelledby="modalDetallesLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetallesLabel">Detalles del Emprendimiento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre</label>
                        <p class="form-control-static" id="detalle_nombre"></p>
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <p class="form-control-static" id="detalle_descripcion"></p>
                    </div>
                    <div class="form-group">
                        <label>Fecha de Creación</label>
                        <p class="form-control-static" id="detalle_fecha"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Confirmar Eliminar -->
    <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEliminarLabel">Confirmar Eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro que deseas eliminar este emprendimiento?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a href="#" id="btnEliminar" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

    <script>
        // Mostrar detalles del emprendimiento
        function mostrarDetalles(id) {
            $.get(`index.php?seccion=emprendimiento&action=getEmprendimiento&id=${id}`, function(data) {
                $('#detalle_nombre').text(data.nombre);
                $('#detalle_descripcion').text(data.descripcion);
                $('#detalle_fecha').text(data.fecha_registro);
                $('#modalDetalles').modal('show');
            }, 'json');
        }

        // Editar emprendimiento
        function editarEmprendimiento(id) {
            $.get(`index.php?seccion=emprendimiento&action=getEmprendimiento&id=${id}`, function(data) {
                $('#edit_nombre').val(data.nombre);
                $('#edit_descripcion').val(data.descripcion);
                $('#edit_fecha_registro').val(data.fecha_registro);
                $('#formEditar').attr('action', `index.php?seccion=emprendimiento&action=editar&id=${id}`);
                $('#modalEditar').modal('show');
            }, 'json');
        }

        // Confirmar eliminación
        function confirmarEliminar(id) {
            $('#btnEliminar').attr('href', `index.php?seccion=emprendimiento&action=eliminar&id=${id}`);
            $('#modalEliminar').modal('show');
        }
    </script>
</div>
</body>
</html>