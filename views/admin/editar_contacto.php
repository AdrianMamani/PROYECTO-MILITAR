<?php
// Obtener los datos del contacto, si están disponibles
$correo = isset($contacto['correo']) ? $contacto['correo'] : '';
$celular = isset($contacto['celular']) ? $contacto['celular'] : '';
$lugar = isset($contacto['lugar']) ? $contacto['lugar'] : '';
$redes_sociales = isset($contacto['redes_sociales']) ? $contacto['redes_sociales'] : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Contacto</h1>

        <!-- Mostrar los datos actuales -->
        <h3>Datos Actuales:</h3>
        <p><strong>Correo:</strong> <?= htmlspecialchars($contacto['correo']); ?></p>
        <p><strong>Celular:</strong> <?= htmlspecialchars($contacto['celular']); ?></p>
        <p><strong>Lugar:</strong> <?= htmlspecialchars($contacto['lugar']); ?></p>
        <p><strong>Redes Sociales:</strong> <?= htmlspecialchars($contacto['redes_sociales']); ?></p>

        <form action="index.php?controller=contacto&action=guardarEdicion" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($contacto['id']); ?>">

            <div class="mb-3">
                <label for="correo" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" value="<?= htmlspecialchars($correo); ?>" required>
            </div>

            <div class="mb-3">
                <label for="celular" class="form-label">Celular</label>
                <input type="text" class="form-control" id="celular" name="celular" value="<?= htmlspecialchars($celular); ?>" required>
            </div>

            <div class="mb-3">
                <label for="lugar" class="form-label">Lugar</label>
                <input type="text" class="form-control" id="lugar" name="lugar" value="<?= htmlspecialchars($lugar); ?>" required>
            </div>

            <div class="mb-3">
                <label for="redes_sociales" class="form-label">Redes Sociales</label>
                <input type="text" class="form-control" id="redes_sociales" name="redes_sociales" value="<?= htmlspecialchars($redes_sociales); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>

        <a href="index.php?controller=admin&action=dashboard" class="btn btn-secondary mt-3">Volver al Dashboard</a>
    </div>
</body>
</html>
