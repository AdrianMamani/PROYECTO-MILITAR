<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros</title>
    <link rel="icon" href="/PROYECTO-MILITAR/views/assets/img/logo.jpg" type="image/png">
    <link rel="stylesheet" href="<?= BASE_URL ?>views/assets/css/nosotros.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>views/assets/css/efecto.css">
    <!-- Añadimos Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <?php include 'layout/header.php'; ?>
</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <img src="/PROYECTO-MILITAR/views/assets/img/logo.jpg" alt="Cargando..."> <!-- Cambia por la ruta de tu logo -->
    </div>
    <!-- Banner principal -->
    <div class="banner-nosotros">
        <h1>Sobre Nosotros</h1>
    </div>

    <!-- Sección de contenido principal -->
    <section class="contenido-nosotros">
        <div class="contenedor">
            <div class="columna-texto">
                <?php if (!empty($nosotrosItems)): ?>
                <?php foreach ($nosotrosItems as $item): ?>
                <h2><?= htmlspecialchars($item['titulo']) ?></h2>
                <?php 
        // Separa la descripción en párrafos usando doble salto de línea como separador
        $parrafos = preg_split('/\r\n|\r|\n/', $item['descripcion'], -1, PREG_SPLIT_NO_EMPTY);
        ?>
        <?php foreach ($parrafos as $p): ?>
            <p><?= htmlspecialchars(trim($p)) ?></p>
                <?php endforeach; ?>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
           <?php if (!empty($imagenId1)): ?>
    <div class="columna-imagen">
        <div class="imagen-contenedor">
            <img src="/PROYECTO-MILITAR/uploads/<?= htmlspecialchars($imagenId1['nombre_imagen']) ?>" alt="Imagen Sobre Nosotros">
        </div>
    </div>
<?php else: ?>
    <div class="columna-imagen">
        <div class="imagen-contenedor">
            <img src="assets/img/sobre-nosotros.jpg" alt="Imagen Sobre Nosotros">
        </div>
    </div>
<?php endif; ?>
        </div>
    </section>
    <!-- Sección de Misión y Visión -->
    <section class="seccion-mision-vision">
    <div class="contenedor-mision-vision">
        <?php
        $mision = 'Nuestra misión es proporcionar formación de excelencia, desarrollando profesionales íntegros y comprometidos con los valores de honor, disciplina y servicio a la nación.';
        $vision = 'Ser reconocidos como una institución líder en la formación de profesionales de alto nivel, contribuyendo al desarrollo y seguridad del país a través de la excelencia educativa y el compromiso con la sociedad.';

        if (!empty($nosotrosItems) && is_array($nosotrosItems)) {
            // Asumimos que solo hay un registro en la tabla (o se toma el primero)
            $mision = $nosotrosItems[0]['mision'] ?? $mision;
            $vision = $nosotrosItems[0]['vision'] ?? $vision;
        }
        ?>

        <div class="columna-mision-vision">
            <div class="icono-cuadrado">
                <i class="fas fa-rocket"></i>
            </div>
            <div class="contenido-mision-vision">
                <h3>Misión</h3>
                <p><?= htmlspecialchars($mision) ?></p>
            </div>
        </div>

        <?php
// Buscar la primera imagen cuyo id no sea 1
$imagenMostrar = null;
foreach ($imagenesNosotros as $imagen) {
    if ($imagen['id'] != 1) {
        $imagenMostrar = $imagen;
        break;
    }
}
?>

<div class="logo-central">
    <?php if ($imagenMostrar): ?>
        <img src="/PROYECTO-MILITAR/uploads/<?= htmlspecialchars($imagenMostrar['nombre_imagen']) ?>" alt="Imagen Institucional">
    <?php else: ?>
        <!-- Imagen por defecto si no hay ninguna -->
        <img src="../uploads/68409105e770c_logo.jpg" alt="Logo Institucional">
    <?php endif; ?>
</div>

        <div class="columna-mision-vision">
            <div class="icono-cuadrado">
                <i class="fas fa-globe-americas"></i>
            </div>
            <div class="contenido-mision-vision">
                <h3>Visión</h3>
                <p><?= htmlspecialchars($vision) ?></p>
            </div>
        </div>
    </div>
</section>
    <!-- Sección de video -->
    <section class="seccion-video">
        <div class="contenedor-video">
            <h2>Conozca más sobre nosotros</h2>
            <div class="video-responsive">
                <?php
                // Incluir el controlador para obtener el video
                
                // Obtener el código de video de YouTube
                $videoCode = '';
                if (!empty($itemsCarrusel) && is_array($itemsCarrusel)) {
                    $videoCode = $itemsCarrusel[0]['url_archivo'] ?? '';
                }
                
                // Si no hay código de video, usar uno predeterminado
                if (empty($videoCode)) {
                    $videoCode = 'dQw4w9WgXcQ'; // Video predeterminado
                }
                ?>
                <iframe 
                    src="https://www.youtube.com/embed/<?php echo htmlspecialchars($videoCode); ?>" 
                    title="Video institucional" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                ></iframe>
            </div>
        </div>
    </section>

    <!-- Sección de Usuarios estilo Instagram (solo carrusel) -->
    <div class="container-usuario">
            <div class="titulo-con-fondo">
                <h2 class="team-title">Nuestros Miembros</h2>
            </div>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php foreach ($miembros as $miembro): ?>
                        <div class="swiper-slide">
                            <div class="card-usuario">
                                <div class="card-header">
                                    <div class="profile-info">
                                        <span class="username"><?= htmlspecialchars($miembro['nombre']) ?></span>
                                        <i class="fas fa-check-circle icono-verificado"></i>
                                    </div>
                                </div>
                                <a href="miembro.php?id=<?= $miembro['id'] ?>">
                                    <img src="<?= BASE_URL ?>uploads/usuarios/imagenes/<?= htmlspecialchars($miembro['imagen_usuario']) ?>" alt="Miembro">
                                </a>
                                <div class="card-footer">
                                    <div class="card-actions">
                                        <i class="far fa-heart"></i>
                                        <i class="far fa-comment"></i>
                                        <i class="far fa-paper-plane"></i>
                                    </div>
                                    <div class="button-container"><a class="button-link" href="<?= BASE_URL ?>miembro/<?= $miembro['id'] ?>">Ver Información</a></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="ver-mas-container">
                <a href="index.php?action=miembros" class="btn-ver-mas">Ver Más <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>

    <?php include 'layout/footer.php'; ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="<?= BASE_URL ?>views/assets/js/nosotros.js"></script>
<script src="<?= BASE_URL ?>views/assets/js/miembros.js"></script>
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

</html>
