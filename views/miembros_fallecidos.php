<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Miembros fallecidos</title>
    <link rel="icon" href="/PROYECTO-MILITAR/views/assets/img/logo.jpg" type="image/png">
    <link rel="stylesheet" href="<?= BASE_URL ?>views/assets/css/miembros.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <?php
    include 'layout/header.php';
    ?>
    <section class="team-section">
        <h2 class="team-title">Miembros Fallecidos</h2>

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
                        <div class="card-actions">
                            <i class="far fa-heart"></i>
                            <i class="fas fa-ribbon"></i>
                            <i class="far fa-paper-plane"></i>
                        </div>
                        <div class="button-container"><a class="button-link" href="<?= BASE_URL ?>miembro/<?= $miembro['id'] ?>">Ver Información</a></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</body>
<?php
    include 'layout/footer.php';
    ?>

</html>