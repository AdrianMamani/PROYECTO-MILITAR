<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="<?= BASE_URL ?>views/assets/css/especialidades.css">
</head>

<body>
    <?php include 'layout/header.php'; ?>
    <div class="header-bar">Especialidades</div>
    <main>
        <div class="description-logo-container">
            <div>
                <div class="title-row">
                    <?php if ($especialidades): ?>
                        <h2 class="title"><?= htmlspecialchars($especialidades['nombre']) ?></h2>
                    <?php else: ?>
                        <h2 class="title"></h2>
                    <?php endif; ?>
                    <div class="members-badge" aria-label="Cantidad de miembros: <?= count($miembros) ?>">
                        <i class="fas fa-user-friends" aria-hidden="true"></i>
                        <span><?= count($miembros) ?></span>
                        <span>Miembro<?= count($miembros) !== 1 ? 's' : '' ?></span>
                    </div>
                </div>
                <?php if ($especialidades): ?>
                    <p class="description">
                        <?= htmlspecialchars($especialidades['descripcion']) ?>
                    </p>
                <?php else: ?>
                    <p></p>
                <?php endif; ?>
            </div>
        </div>

        <section aria-labelledby="gallery-title">
            <h3 id="gallery-title" class="section-title">Galería de Fotos</h3>
            <div class="gallery-grid">
                <?php foreach ($imagenes as $img): ?>
                    <img
                        src="<?= BASE_URL ?><?= htmlspecialchars($img['nombre_imagen']) ?>"
                        class="zoom-img"
                        width="600"
                        height="400"
                        loading="lazy"
                        tabindex="0" />
                <?php endforeach; ?>
            </div>
        </section>


        <section aria-labelledby="members-title">
            <h3 id="members-title" class="section-title">Miembros de la Especialidad</h3>

            <?php if (!empty($miembros)): ?>
                <ul class="members-list">
                    <?php foreach ($miembros as $miembro): ?>
                        <li class="member-card">
                            <img
                                src="<?= BASE_URL ?>views/assets/img/miembros/<?= htmlspecialchars($miembro['imagen']) ?>"
                                alt="Foto de <?= htmlspecialchars($miembro['nombre']) ?>"
                                class="member-photo"
                                width="80"
                                height="80"
                                loading="lazy" />
                            <div class="member-info">
                                <h4 class="member-name"><?= htmlspecialchars($miembro['nombre']) ?></h4>
                                <p class="member-specialty"><?= htmlspecialchars($miembro['descripcion'] ?? '') ?></p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No hay miembros registrados para esta especialidad.</p>
            <?php endif; ?>
        </section>
    </main>
    <!-- Modal -->
    <div id="imageModal" class="image-modal" aria-hidden="true" role="dialog">
        <div class="image-modal-content">
            <span class="image-modal-close" aria-label="Cerrar modal">&times;</span>
            <img id="modalImage" src="" alt="" />
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImage');
            const closeBtn = modal.querySelector('.image-modal-close');
            
            document.querySelectorAll('.zoom-img').forEach(img => {
                img.addEventListener('click', () => {
                    modal.classList.add('active');
                    modal.setAttribute('aria-hidden', 'false');
                    modalImg.src = img.src;
                    modalImg.alt = img.alt || '';
                });
            });

            function closeModal() {
                modal.classList.remove('active');
                modal.setAttribute('aria-hidden', 'true');
                modalImg.src = '';
                modalImg.alt = '';
            }

            closeBtn.addEventListener('click', closeModal);

            modal.addEventListener('click', (e) => {
                if (e.target === modal) closeModal();
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && modal.classList.contains('active')) {
                    closeModal();
                }
            });
        });
    </script>

</body>

</html>