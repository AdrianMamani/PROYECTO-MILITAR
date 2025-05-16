<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de Aportaciones</title>
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
                <a href="index.php?action=carrusel/index" class="nav-link">Inicio</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index.php?action=auth/contacto" class="nav-link">Contacto</a>
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
                    <li class="nav-item">
                        <a href="index.php?action=finanzas/index" class="nav-link active">
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
                        <h1>Registro de Aportaciones</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?action=carrusel/index">Inicio</a></li>
                            <li class="breadcrumb-item active">Registro de Aportaciones</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row mb-3">
                    <div class="col-12">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-agregar">
                            <i class="fas fa-plus"></i> Agregar Nuevo Registro
                        </button>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Aportaciones</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tabla-finanzas" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>N/O</th>
                                        <th>Apellidos y Nombres</th>
                                        <th>Total Pagos</th>
                                        <th>Deuda 2025</th>
                                        <th>Total Deuda</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($registros)): ?>
                                        <tr><td colspan="7">No hay registros disponibles</td></tr>
                                    <?php else: ?>
                                        <?php foreach ($registros as $registro): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($registro['id']) ?></td>
                                            <td><?= htmlspecialchars($registro['numero_orden']) ?></td>
                                            <td><?= htmlspecialchars($registro['apellidos_nombres']) ?></td>
                                            <td><?= htmlspecialchars($registro['total_pagos']) ?></td>
                                            <td><?= htmlspecialchars($registro['deuda_2025']) ?></td>
                                            <td><?= htmlspecialchars($registro['total_deuda']) ?></td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-detalle" 
                                                   data-id="<?= $registro['id'] ?>">
                                                    <i class="fas fa-eye"></i> Ver Detalle
                                                </a>
                                                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-editar"
                                                   data-id="<?= $registro['id'] ?>">
                                                    <i class="fas fa-edit"></i> Editar
                                                </a>
                                                <a href="index.php?action=finanzas/eliminar/<?= $registro['id'] ?>" class="btn btn-danger btn-sm" 
                                                   onclick="return confirm('¿Estás seguro de eliminar este registro?')">
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
        </section>
    </div>
</div>

<!-- Modal Agregar -->
<div class="modal fade" id="modal-agregar">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Nuevo Registro</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="index.php?action=finanzas/agregar" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="numero_orden">Número de Orden</label>
                                <input type="number" class="form-control" id="numero_orden" name="numero_orden" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellidos_nombres">Apellidos y Nombres</label>
                                <input type="text" class="form-control" id="apellidos_nombres" name="apellidos_nombres" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Pagos Mensuales</h5>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ene">Enero</label>
                                <input type="number" step="0.01" class="form-control" id="ene" name="ene" value="0.00">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="feb">Febrero</label>
                                <input type="number" step="0.01" class="form-control" id="feb" name="feb" value="0.00">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="mar">Marzo</label>
                                <input type="number" step="0.01" class="form-control" id="mar" name="mar" value="0.00">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="abr">Abril</label>
                                <input type="number" step="0.01" class="form-control" id="abr" name="abr" value="0.00">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="may">Mayo</label>
                                <input type="number" step="0.01" class="form-control" id="may" name="may" value="0.00">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="jun">Junio</label>
                                <input type="number" step="0.01" class="form-control" id="jun" name="jun" value="0.00">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="jul">Julio</label>
                                <input type="number" step="0.01" class="form-control" id="jul" name="jul" value="0.00">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ago">Agosto</label>
                                <input type="number" step="0.01" class="form-control" id="ago" name="ago" value="0.00">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="sep">Septiembre</label>
                                <input type="number" step="0.01" class="form-control" id="sep" name="sep" value="0.00">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="oct">Octubre</label>
                                <input type="number" step="0.01" class="form-control" id="oct" name="oct" value="0.00">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nov">Noviembre</label>
                                <input type="number" step="0.01" class="form-control" id="nov" name="nov" value="0.00">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="dic">Diciembre</label>
                                <input type="number" step="0.01" class="form-control" id="dic" name="dic" value="0.00">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Deudas</h5>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="deuda_2025">Deuda 2025</label>
                                <input type="number" step="0.01" class="form-control" id="deuda_2025" name="deuda_2025" value="0.00">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="deuda_2024">Deuda 2024</label>
                                <input type="number" step="0.01" class="form-control" id="deuda_2024" name="deuda_2024" value="0.00">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="deuda_2023">Deuda 2023</label>
                                <input type="number" step="0.01" class="form-control" id="deuda_2023" name="deuda_2023" value="0.00">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="deuda_2022">Deuda 2022</label>
                                <input type="number" step="0.01" class="form-control" id="deuda_2022" name="deuda_2022" value="0.00">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="deuda_2021">Deuda 2021</label>
                                <input type="number" step="0.01" class="form-control" id="deuda_2021" name="deuda_2021" value="0.00">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="otros_deudas">Otras Deudas</label>
                                <input type="number" step="0.01" class="form-control" id="otros_deudas" name="otros_deudas" value="0.00">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lugar">Lugar</label>
                                <input type="text" class="form-control" id="lugar" name="lugar">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input type="date" class="form-control" id="fecha" name="fecha">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Detalle -->
<div class="modal fade" id="modal-detalle">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detalle del Registro</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="detalle-contenido">
                    <!-- El contenido se cargará dinámicamente -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Editar -->
<div class="modal fade" id="modal-editar">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Registro</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-editar" action="index.php?action=finanzas/update" method="POST">
                <input type="hidden" id="editar-id" name="id">
                <div class="modal-body">
                    <!-- El contenido se cargará dinámicamente -->
                    <div id="editar-contenido"></div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Asegúrate de que estos archivos estén incluidos en el head o antes del script -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<!-- Asegúrate de que estos scripts estén incluidos antes de tu script personalizado -->
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
$(function () {
    // Verificar si DataTable está disponible
    if ($.fn.DataTable) {
        // Inicializar DataTable
        $("#tabla-finanzas").DataTable({
            "responsive": true,
            "autoWidth": false,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
        });
    } else {
        console.error("DataTable no está disponible. Verifica que las bibliotecas estén cargadas correctamente.");
    }

    // Cargar detalles al abrir el modal de detalle
    $('#modal-detalle').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);
        
        console.log("Abriendo modal de detalle para ID:", id);
        
        // Mostrar indicador de carga
        modal.find('#detalle-contenido').html('<div class="text-center"><i class="fas fa-spinner fa-spin fa-3x"></i><p class="mt-2">Cargando...</p></div>');
        
        // Cargar los detalles mediante AJAX
        $.ajax({
            url: 'index.php?action=finanzas/ver&id=' + id,
            type: 'GET',
            success: function(data) {
                console.log("Datos recibidos para detalle");
                modal.find('#detalle-contenido').html(data);
            },
            error: function(xhr, status, error) {
                console.error("Error al cargar detalles:", error);
                modal.find('#detalle-contenido').html('<div class="alert alert-danger">Error al cargar los detalles: ' + error + '</div>');
            }
        });
    });

    // Cargar datos para editar
    $('#modal-editar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);
        
        console.log("Abriendo modal de edición para ID:", id);
        modal.find('#editar-id').val(id);
        
        // Mostrar indicador de carga
        modal.find('#editar-contenido').html('<div class="text-center"><i class="fas fa-spinner fa-spin fa-3x"></i><p class="mt-2">Cargando...</p></div>');
        
        // Cargar los datos mediante AJAX
        $.ajax({
            url: 'index.php?action=finanzas/editar&id=' + id,
            type: 'GET',
            success: function(data) {
                console.log("Datos recibidos para edición");
                modal.find('#editar-contenido').html(data);
            },
            error: function(xhr, status, error) {
                console.error("Error al cargar datos para edición:", error, xhr.responseText);
                modal.find('#editar-contenido').html('<div class="alert alert-danger">Error al cargar los datos: ' + error + '</div>');
            }
        });
    });
    
    // Manejar el envío del formulario de edición
   // Manejar el envío del formulario de edición
$('#form-editar').on('submit', function(e) {
    e.preventDefault();
    
    $.ajax({
        url: 'index.php?action=finanzas/update',
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'text', // Add this line to prevent JSON parsing
        success: function(response) {
            $('#modal-editar').modal('hide');
            // Recargar la página para mostrar los cambios
            location.reload();
        },
        error: function(xhr, status, error) {
            alert('Error al actualizar el registro: ' + error);
        }
    });
});
});
</script>
</body>
</html>