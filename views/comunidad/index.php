<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<!-- LLAMADA DE CABEZERA -->
<?php include(__DIR__ . '/../layout/header.php'); ?>
<body>
    <!-- Preloader (Si aún deseas eliminarlo, borra esta sección) -->
    <div class="preloader">
        <div class="wrapper-triangle">
            <div class="pen">
                <div class="line-triangle">
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                </div>
                <div class="line-triangle">
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                </div>
                <div class="line-triangle">
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- LLAMADA DE NAVBAR -->
    <?php include(__DIR__ . '/../layout/navbar.php'); ?>

    <!-- Sección de encabezado con imagen de fondo -->
    <section class="bg-gray-7">
        <div class="breadcrumbs-custom box-transform-wrap context-dark">
            <div class="container">
                <h3 class="breadcrumbs-custom-title">RESEÑAS DE NUESTROS LOGROS</h3>
                <div class="breadcrumbs-custom-decor"></div>
            </div>
            <div class="box-transform" style="background-image: url(views/assets/template/images/bg-1.jpg);"></div>
        </div>
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="index.php">Inicio</a></li>
                <li class="active">Reseñas</li>
            </ul>
        </div>
    </section>

<!-- Botón para agregar un nuevo comentario -->
<div class="container mt-4">
    <button class="btn btn-success mb-3" data-toggle="modal" data-target="#modalComentario">
        Agregar Comentario
    </button>
</div>

<!-- Modal para agregar comentario -->
<div class="modal fade mt-4" id="modalComentario" tabindex="-1" role="dialog" aria-labelledby="modalComentarioLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin-top: 7%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalComentarioLabel">Agregar Comentario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="comentarioForm" action="index.php?controller=comentarioweb&action=agregar" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="titulo" placeholder="Título" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="correo" name="subtitulo" placeholder="Correo" required>
                        <small id="emailError" class="text-danger d-none">Ingrese un correo válido.</small>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="descripcion" rows="3" placeholder="Descripción" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Publicar</button>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- Script de Bootstrap 5.3.0 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <section class="section section-lg bg-default text-md-left">
    <div class="container">
        <h3 class="mb-4 font-weight-bold text-uppercase text-center">Lo que dicen nuestros usuarios</h3>
        <p class="mb-5 text-muted text-center">Comentarios sinceros sobre nuestro legado y esfuerzo.</p>

        <div class="row">
            <?php foreach ($comentarios as $index => $comentario): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-chat-quote-fill"></i> <?= htmlspecialchars($comentario['titulo']); ?></h5>
                            <h6 class="card-subtitle text-muted"><?= htmlspecialchars($comentario['subtitulo']); ?></h6>
                            <p class="card-text mt-2"><?= nl2br(htmlspecialchars($comentario['descripcion'])); ?></p>
                        </div>
                    </div>
                </div>

                <?php if (($index + 1) % 3 == 0): ?>
                    <div class="w-100"></div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- LLAMADA DE FOOTER -->
    <?php include(__DIR__ . '/../layout/footer.php'); ?>

</body>
</html>
