<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Cabo Alberto Reyes Gamarra</title>
    <link rel="icon" href="/PROYECTO-MILITAR/views/assets/img/logo.jpg" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>views/assets/css/home.css">

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap"
        rel="stylesheet" />
</head>

<body class="loaded">
    <?php
    include 'layout/header.php';
    ?>
    <header class="carrusel-principal">
        <div class="carrusel-slides-container">
            <?php if (!empty($itemsCarrusel) && is_array($itemsCarrusel)): ?>
                <?php foreach ($itemsCarrusel as $index => $item): ?>
                    <div class="carrusel-slide <?= $index === 0 ? 'active' : '' ?>">
                        <?php if (!empty($item['img'])): ?>
                            <?php
                            // DEBUG: Descomenta la siguiente línea para ver qué valor tiene $item['img'] en el fuente HTML
                            echo "<!-- DEBUG IMG FILENAME: " . htmlspecialchars($item['img']) . " -->";
                            // Ruta corregida si 'uploads' está en la raíz junto a este index.php
                            ?>
                            <img src="<?= BASE_URL ?>uploads/carrusel/<?= htmlspecialchars($item['img']) ?>" alt="Imagen: <?= htmlspecialchars($item['titulo'] ?? 'Imagen del carrusel') ?>">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/1920x900.png?text=Imagen+no+disponible" alt="Imagen no disponible">
                        <?php endif; ?>
                        <div class="slide-contenido">
                            <h1 class="lema"><?= htmlspecialchars($item['titulo'] ?? 'Título no disponible') ?></h1>
                            <p class="sublema"><?= htmlspecialchars($item['descripcion'] ?? 'Descripción no disponible') ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="carrusel-slide active">
                    <?php /* Ruta corregida para la imagen de fallback */ ?>
                    <img src="uploads/67dd77800ef0a.png" alt="No hay items en carrusel o imagen por defecto no encontrada">
                    <div class="slide-contenido">
                        <h1 class="lema">Sin contenido</h1>
                        <p class="sublema">No hay elementos para mostrar en el carrusel.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Controles del Carrusel -->
        <?php if (!empty($itemsCarrusel) && count($itemsCarrusel) > 1): ?>
            <button class="carrusel-control prev" aria-label="Anterior">&#10094;</button>
            <button class="carrusel-control next" aria-label="Siguiente">&#10095;</button>
        <?php endif; ?>
        <!-- Indicadores de slides (dots) -->
        <?php if (!empty($itemsCarrusel) && count($itemsCarrusel) > 1): ?>
            <div class="carrusel-indicadores">
                <?php foreach ($itemsCarrusel as $index => $item): ?>
                    <span class="indicador-dot <?= $index === 0 ? 'active' : '' ?>" data-slide-to="<?= $index ?>"></span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </header>
    <main>
        <!--Seccion Nosotros-->
        <section class="sobre-nosotros">
            <div class="contenido">
                <?php if (!empty($itemsCarrusel) && is_array($itemsCarrusel)): ?>
                    <?php $item = $itemsCarrusel[0]; ?>

                    <div class="imagen-slider">
                        <?php if (isset($item['tipo_archivo']) && $item['tipo_archivo'] === 'video'): ?>
                            <div class="video-responsive">
                                <iframe
                                    src="https://www.youtube.com/embed/<?= htmlspecialchars($item['url_archivo']) ?>"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                        <?php else: ?>
                            <img src="<?= htmlspecialchars($item['url_archivo']) ?>" alt="Imagen nosotros">
                        <?php endif; ?>
                    </div>

                    <div class="texto">
                        <h2>Sobre Nosotros</h2>
                        <p><?= htmlspecialchars($itemsCarrusel[0]['nosotros'] ?? 'Descripción no disponible') ?></p>
                        <div class="botones">
                            <a href="#" class="btn-leer-mas">Leer más</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <section>
    <div class="container">
        <header>
            <h1>Especialidades</h1>
            <p>Las 13 áreas en las que nos destacamos con orgullo y compromiso.</p>
        </header>
        <div class="grid" id="especialidadesGrid">
            <?php foreach ($especialidades as $especialidad): ?>
                <a href="<?= BASE_URL ?>especialidad_index/<?= $especialidad['id'] ?>" class="card" tabindex="0" 
                style="display: block; text-decoration: none; color: inherit;">
                    <img alt="Imagen de la especialidad <?= htmlspecialchars($especialidad['nombre']) ?>" height="220" width="400" src="<?= htmlspecialchars($especialidad['imagen']) ?>" />
                    <div class="overlay">
                        <h2><?= htmlspecialchars($especialidad['nombre']) ?></h2>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
        <section>
            <div class="banner" role="banner" aria-label="Banner con texto principal y subtítulo">
                <h1>FORJANDO UN LEGADO DE HONOR Y COMPROMISO</h1>
                <p>Una historia de valentía, compromiso y excelencia</p>

                <!-- Redes Sociales -->
                <ul class="social-wrapper">
                    <li class="social-icon facebook">
                        <span class="social-tooltip">Facebook</span>
                        <svg viewBox="0 0 320 512" height="1.2em" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path>
                        </svg>
                    </li>
                    <li class="social-icon twitter">
                        <span class="social-tooltip">Twitter</span>
                        <svg height="1.8em" fill="currentColor" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path d="M42,12.429c-1.323,0.586-2.746,0.977-4.247,1.162c1.526-0.906,2.7-2.351,3.251-4.058c-1.428,0.837-3.01,1.452-4.693,1.776C34.967,9.884,33.05,9,30.926,9c-4.08,0-7.387,3.278-7.387,7.32c0,0.572,0.067,1.129,0.193,1.67c-6.138-0.308-11.582-3.226-15.224-7.654c-0.64,1.082-1,2.349-1,3.686c0,2.541,1.301,4.778,3.285,6.096c-1.211-0.037-2.351-0.374-3.349-0.914c0,0.022,0,0.055,0,0.086c0,3.551,2.547,6.508,5.923,7.181c-0.617,0.169-1.269,0.263-1.941,0.263c-0.477,0-0.942-0.054-1.392-0.135c0.94,2.902,3.667,5.023,6.898,5.086c-2.528,1.96-5.712,3.134-9.174,3.134c-0.598,0-1.183-0.034-1.761-0.104C9.268,36.786,13.152,38,17.321,38c13.585,0,21.017-11.156,21.017-20.834c0-0.317-0.01-0.633-0.025-0.945C39.763,15.197,41.013,13.905,42,12.429"></path>
                        </svg>
                    </li>
                    <li class="social-icon instagram">
                        <span class="social-tooltip">Instagram</span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1.2em" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
                        </svg>
                    </li>
                </ul>
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

        <!-- Sección de Emprendimientos -->
        <section class="emprendimientos">
            <div class="emprendimientos-header">
                <h1 class="emprendimientos-titulo">Mis Emprendimientos</h1>
                <p class="emprendimientos-descripcion">Descubre los proyectos y negocios que he creado con pasión y dedicación.</p>
            </div>
            <div class="emprendimientos-container">
                <?php if (!empty($emprendimientos)): ?>
                    <?php foreach ($emprendimientos as $emprendimiento): ?>
                        <article>
                            <?php
                            // Valor por defecto si no hay imagen
                            $imagenMostrar = '/PROYECTO-MILITAR/uploads/emprendimiento/default.png';

                            // Buscar la primera imagen de la galería si existe
                            if (!empty($emprendimiento['galeria'])) {
                                foreach ($emprendimiento['galeria'] as $media) {
                                    if (!empty($media['nombre_imagen'])) {
                                        $imagenMostrar = '/PROYECTO-MILITAR/uploads/emprendimiento/' . $media['nombre_imagen'];
                                        break;
                                    }
                                }
                            }
                            ?>

                            <img src="<?= htmlspecialchars($imagenMostrar) ?>"
                                alt="<?= htmlspecialchars($emprendimiento['nombre_emprendimiento']) ?>">

                            <div class="content">
                                <h2><?= htmlspecialchars($emprendimiento['nombre_emprendimiento']) ?></h2>
                                <p><?= htmlspecialchars($emprendimiento['descripcion']) ?></p>
                                <a href="<?= BASE_URL ?>emprendimientos/<?= $emprendimiento['id'] ?>">Visitar sitio</a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="no-emprendimientos">Actualmente no hay emprendimientos para mostrar.</p>
                <?php endif; ?>
            </div>
            <div class="ver-mas-container">
                <a href="index.php?action=negocios" class="btn-ver-mas">Ver Más <i class="fas fa-arrow-right"></i></a>
            </div>
        </section>
        <button id="btnAbrirChat">Abrir Chat</button>


        <form id="chatFormulario" method="POST" action="index.php?action=comentarios/agregar">
            <h3>
                <span>💬 Chat Mensajes</span>
                <button type="button" class="cerrar" id="btnCerrarChat">×</button>
            </h3>
            <input type="text" name="nombre" placeholder="Tu nombre" required>
            <input type="email" name="correo" placeholder="tu@email.com" required>
            <textarea name="comentario" rows="4" placeholder="Escribe tu comentario" required></textarea>
            <button type="submit" class="enviar">Enviar</button>
        </form>

        <div class="comentarios-container">
            <h2 class="titulo-comentarios">Comentarios</h2>

            <div class="swiper comentarios-swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($comentarios as $comentario): ?>
                        <div class="swiper-slide comentario-card">
                            <div class="usuario-header">
                                <div class="avatar">
                                    <?= strtoupper(mb_substr($comentario['nombre'], 0, 1, 'UTF-8')) ?>
                                </div>
                                <div class="info">
                                    <h3 class="nombre"><?= htmlspecialchars($comentario['nombre']) ?></h3>
                                    <p class="correo"><?= htmlspecialchars($comentario['correo']) ?></p>
                                </div>
                            </div>
                            <p class="mensaje"><?= htmlspecialchars($comentario['comentario']) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Controles -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>



        <script>
            // Select all cards
            const cards = document.querySelectorAll('.card');

            // Add event listeners for mouse and keyboard accessibility
            cards.forEach((card) => {
                card.addEventListener('mouseenter', () => {
                    card.classList.add('active');
                });
                card.addEventListener('mouseleave', () => {
                    card.classList.remove('active');
                });
                card.addEventListener('focus', () => {
                    card.classList.add('active');
                });
                card.addEventListener('blur', () => {
                    card.classList.remove('active');
                });
            });
        </script>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="<?= BASE_URL ?>views/assets/js/home.js" defer></script>
    <script src="<?= BASE_URL ?>views/assets/js/nosotros.js"></script>
    <script src="<?= BASE_URL ?>views/assets/js/miembros.js"></script>
    <script src="<?= BASE_URL ?>views/assets/js/chat.js"></script>
    <?php
    include 'layout/footer.php';
    ?>
</body>

</html>