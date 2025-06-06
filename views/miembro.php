<?php include 'layout/header.php'; ?>

<section class="miembro-detalle">
    <?php if ($miembros): ?>
        <h1><?= htmlspecialchars($miembros['nombre']) ?></h1>
        <img src="<?= BASE_URL ?>uploads/usuarios/imagenes/<?= htmlspecialchars($miembros['imagen']) ?>" width="200" alt="Foto de <?= htmlspecialchars($miembros['nombre']) ?>">
        <p><strong>Descripción:</strong> <?= htmlspecialchars($miembros['descripcion']) ?></p>
    <?php else: ?>
        <p>Miembro no encontrado.</p>
    <?php endif; ?>
</section>

