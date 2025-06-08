<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Miembros del equipo</title>
    <link rel="icon" href="/PROYECTO-MILITAR/views/assets/img/logo.jpg" type="image/png">
    <link rel="stylesheet" href="<?= BASE_URL ?>views/assets/css/miembros.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>views/assets/css/efecto.css">
</head>

<body>
    <div id="preloader">
        <img src="/PROYECTO-MILITAR/views/assets/img/logo.jpg" alt="Cargando..."> <!-- Cambia por la ruta de tu logo -->
    </div>
    <?php
    include 'layout/header.php';
    ?>
    <section class="team-section">
        <h2 class="team-title">Nuestros Miembros</h2>

        <div class="cards-container">
            <?php foreach ($miembros as $miembro): ?>
                <div class="card">
                    <div class="card-header">
                        <div class="profile-info">
                            <span class="username"><?= htmlspecialchars($miembro['nombre']) ?></span>
                            <i class="fas fa-check-circle icono-verificado"></i>
                        </div>
                    </div>
                    <a class="link-miembro" href="miembro.php?id=<?= $miembro['id'] ?>">
                        <img src="<?= BASE_URL ?>uploads/usuarios/imagenes/<?= htmlspecialchars($miembro['imagen_usuario']) ?>" alt="Miembro" class="post-image">
                    </a>
                    <div class="card-footer">
                        <div class="button-container"><a class="button-link" href="<?= BASE_URL ?>miembro/<?= $miembro['id'] ?>">Ver Información</a></div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </section>

</body>
<script>
    // Script para manejar el preloader
    document.addEventListener('DOMContentLoaded', function() {
        const preloader = document.getElementById('preloader');
        const body = document.body;
        
        // Forzar el repintado para asegurar que la animación funcione
        void preloader.offsetWidth;
        
        // Mostrar por exactamente 3 segundos
        setTimeout(function() {
            body.classList.add('loaded');
            
            // Eliminar el preloader después de la animación
            setTimeout(function() {
                preloader.remove();
                // Mostrar todo el contenido
                document.querySelectorAll('body > *:not(script)').forEach(el => {
                    el.style.visibility = 'visible';
                });
            }, 500); // Medio segundo para la transición de desvanecimiento
        }, 3000); // 3 segundos exactos
    });
</script>
<?php
    include 'layout/footer.php';
    ?>
</html>
