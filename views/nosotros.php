<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros</title>
    <link rel="stylesheet" href="assets/css/nosotros.css">
    <!-- Añadimos Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <?php include 'layout/header.php'; ?>
</head>
<body>
    <!-- Banner principal -->
    <div class="banner-nosotros">
        <h1>Sobre Nosotros</h1>
    </div>

    <!-- Sección de contenido principal -->
    <section class="contenido-nosotros">
        <div class="contenedor">
            <div class="columna-texto">
                <h2>Nuestra Historia</h2>
                <p>
                    Somos una institución comprometida con la excelencia y el servicio a la nación.
                    Nuestra historia se remonta a varias décadas atrás, cuando un grupo de profesionales
                    decidió formar una organización dedicada a la formación y capacitación de personal
                    altamente calificado.
                </p>
                    A lo largo de los años, hemos evolucionado para adaptarnos a las necesidades
                    cambiantes de nuestra sociedad, manteniendo siempre nuestros valores fundamentales
                    de honor, disciplina y compromiso. Nuestro objetivo es seguir siendo un referente
                    en nuestra área, brindando servicios de la más alta calidad y contribuyendo al
                    desarrollo de nuestro país.
                </p>
            </div>
            <div class="columna-imagen">
                <div class="imagen-contenedor">
                    <img src="assets/img/sobre-nosotros.jpg" alt="Imagen Sobre Nosotros">
                </div>
            </div>
        </div>
    </section>
    <!-- Sección de Misión y Visión -->
    <section class="seccion-mision-vision">
        <div class="contenedor-mision-vision">
            <?php
            // Obtener datos de misión y visión desde la base de datos
            $textos_nosotros = [];
            if (!empty($itemsCarrusel) && is_array($itemsCarrusel)) {
                // Asumimos que la misión y visión están en el primer elemento del carrusel
                $mision = $itemsCarrusel[0]['mision'] ?? 'Nuestra misión es proporcionar formación de excelencia, desarrollando profesionales íntegros y comprometidos con los valores de honor, disciplina y servicio a la nación.';
                $vision = $itemsCarrusel[0]['vision'] ?? 'Ser reconocidos como una institución líder en la formación de profesionales de alto nivel, contribuyendo al desarrollo y seguridad del país a través de la excelencia educativa y el compromiso con la sociedad.';
            } else {
                // Valores predeterminados si no hay datos
                $mision = 'Nuestra misión es proporcionar formación de excelencia, desarrollando profesionales íntegros y comprometidos con los valores de honor, disciplina y servicio a la nación.';
                $vision = 'Ser reconocidos como una institución líder en la formación de profesionales de alto nivel, contribuyendo al desarrollo y seguridad del país a través de la excelencia educativa y el compromiso con la sociedad.';
            }
            ?>
            
            <div class="columna-mision-vision">
                <div class="icono-cuadrado">
                    <i class="fas fa-rocket"></i>
                </div>
                <div class="contenido-mision-vision">
                    <h3>Misión</h3>
                    <p><?php echo htmlspecialchars($mision); ?></p>
                </div>
            </div>
            
            <!-- Logo central -->
            <div class="logo-central">
                <img src="../uploads/logo.jpg" alt="Logo Institucional">
            </div>
            
            <div class="columna-mision-vision">
                <div class="icono-cuadrado">
                    <i class="fas fa-globe-americas"></i>
                </div>
                <div class="contenido-mision-vision">
                    <h3>Visión</h3>
                    <p><?php echo htmlspecialchars($vision); ?></p>
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
                require_once '../controllers/web/homeController.php';
                $carruselController = new CarruselController();
                $itemsCarrusel = $carruselController->verCarrusel();
                
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
    <section class="seccion-usuarios">
        <div class="contenedor-usuarios">
            <h2>Nuestros Miembros</h2>            
            
            <!-- Carrusel de usuarios -->
            <div class="contenedor-carrusel">
                <div class="carrusel-usuarios">
                    <button class="boton-carrusel boton-prev"><i class="fas fa-chevron-left"></i></button>
                    
                    <div class="carrusel-track">
                        <!-- Tarjeta Carrusel 1 -->
                        <div class="tarjeta-usuario tarjeta-carrusel">
                            <div class="cabecera-tarjeta">
                                <div class="info-usuario">
                                    <img src="assets/img/usuarios/avatar1.jpg" alt="Avatar de usuario" class="avatar-usuario">
                                    <span class="nombre-usuario">usuario_oficial</span>
                                </div>
                                <i class="fas fa-check-circle icono-verificado"></i>
                            </div>
                            <div class="imagen-tarjeta">
                                <img src="assets/img/usuarios/post1.jpg" alt="Publicación del usuario">
                            </div>
                            <div class="acciones-tarjeta">
                                <div class="iconos-accion">
                                    <i class="far fa-heart"></i>
                                    <i class="far fa-comment"></i>
                                    <i class="far fa-paper-plane"></i>
                                </div>
                                <div class="likes-tarjeta">
                                    <span>125 Me gusta</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tarjeta Carrusel 2 -->
                        <div class="tarjeta-usuario tarjeta-carrusel">
                            <div class="cabecera-tarjeta">
                                <div class="info-usuario">
                                    <img src="assets/img/usuarios/avatar2.jpg" alt="Avatar de usuario" class="avatar-usuario">
                                    <span class="nombre-usuario">experiencia_militar</span>
                                </div>
                                <i class="fas fa-check-circle icono-verificado"></i>
                            </div>
                            <div class="imagen-tarjeta">
                                <img src="assets/img/usuarios/post2.jpg" alt="Publicación del usuario">
                            </div>
                            <div class="acciones-tarjeta">
                                <div class="iconos-accion">
                                    <i class="far fa-heart"></i>
                                    <i class="far fa-comment"></i>
                                    <i class="far fa-paper-plane"></i>
                                </div>
                                <div class="likes-tarjeta">
                                    <span>243 Me gusta</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tarjeta Carrusel 3 -->
                        <div class="tarjeta-usuario tarjeta-carrusel">
                            <div class="cabecera-tarjeta">
                                <div class="info-usuario">
                                    <img src="assets/img/usuarios/avatar3.jpg" alt="Avatar de usuario" class="avatar-usuario">
                                    <span class="nombre-usuario">formacion_elite</span>
                                </div>
                                <i class="fas fa-check-circle icono-verificado"></i>
                            </div>
                            <div class="imagen-tarjeta">
                                <img src="assets/img/usuarios/post3.jpg" alt="Publicación del usuario">
                            </div>
                            <div class="acciones-tarjeta">
                                <div class="iconos-accion">
                                    <i class="far fa-heart"></i>
                                    <i class="far fa-comment"></i>
                                    <i class="far fa-paper-plane"></i>
                                </div>
                                <div class="likes-tarjeta">
                                    <span>187 Me gusta</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tarjeta Carrusel 4 -->
                        <div class="tarjeta-usuario tarjeta-carrusel">
                            <div class="cabecera-tarjeta">
                                <div class="info-usuario">
                                    <img src="assets/img/usuarios/avatar4.jpg" alt="Avatar de usuario" class="avatar-usuario">
                                    <span class="nombre-usuario">cadete_2023</span>
                                </div>
                                <i class="fas fa-check-circle icono-verificado"></i>
                            </div>
                            <div class="imagen-tarjeta">
                                <img src="assets/img/usuarios/post4.jpg" alt="Publicación del usuario">
                            </div>
                            <div class="acciones-tarjeta">
                                <div class="iconos-accion">
                                    <i class="far fa-heart"></i>
                                    <i class="far fa-comment"></i>
                                    <i class="far fa-paper-plane"></i>
                                    
                                </div>
                                <div class="likes-tarjeta">
                                    <span>98 Me gusta</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tarjeta Carrusel 5 -->
                        <div class="tarjeta-usuario tarjeta-carrusel">
                            <div class="cabecera-tarjeta">
                                <div class="info-usuario">
                                    <img src="assets/img/usuarios/avatar5.jpg" alt="Avatar de usuario" class="avatar-usuario">
                                    <span class="nombre-usuario">entrenamiento_avanzado</span>
                    </div>
                                <i class="fas fa-check-circle icono-verificado"></i>
                </div>
                            <div class="imagen-tarjeta">
                                <img src="assets/img/usuarios/post5.jpg" alt="Publicación del usuario">
            </div>
                            <div class="acciones-tarjeta">
                                <div class="iconos-accion">
                                    <i class="far fa-heart"></i>
                                    <i class="far fa-comment"></i>
                                    <i class="far fa-paper-plane"></i>
                                </div>
                                <div class="likes-tarjeta">
                                    <span>156 Me gusta</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tarjeta Carrusel 6 -->
                        <div class="tarjeta-usuario tarjeta-carrusel">
                            <div class="cabecera-tarjeta">
                                <div class="info-usuario">
                                    <img src="assets/img/usuarios/avatar6.jpg" alt="Avatar de usuario" class="avatar-usuario">
                                    <span class="nombre-usuario">liderazgo_militar</span>
                                </div>
                                <i class="fas fa-check-circle icono-verificado"></i>
                            </div>
                            <div class="imagen-tarjeta">
                                <img src="assets/img/usuarios/post6.jpg" alt="Publicación del usuario">
                            </div>
                            <div class="acciones-tarjeta">
                                <div class="iconos-accion">
                                    <i class="far fa-heart"></i>
                                    <i class="far fa-comment"></i>
                                    <i class="far fa-paper-plane"></i>
                                </div>
                                <div class="likes-tarjeta">
                                    <span>211 Me gusta</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tarjeta Carrusel 7 -->
                        <div class="tarjeta-usuario tarjeta-carrusel">
                            <div class="cabecera-tarjeta">
                                <div class="info-usuario">
                                    <img src="assets/img/usuarios/avatar7.jpg" alt="Avatar de usuario" class="avatar-usuario">
                                    <span class="nombre-usuario">estrategia_tactica</span>
                                </div>
                                <i class="fas fa-check-circle icono-verificado"></i>
                            </div>
                            <div class="imagen-tarjeta">
                                <img src="assets/img/usuarios/post7.jpg" alt="Publicación del usuario">
                            </div>
                            <div class="acciones-tarjeta">
                                <div class="iconos-accion">
                                    <i class="far fa-heart"></i>
                                    <i class="far fa-comment"></i>
                                    <i class="far fa-paper-plane"></i>
                                </div>
                                <div class="likes-tarjeta">
                                    <span>178 Me gusta</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button class="boton-carrusel boton-next"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
            
            <!-- Botón Ver Más -->
            <div class="contenedor-boton-ver-mas">
                <a href="#" class="boton-ver-mas">Ver Más <i class="fas fa-arrow-right"></i></a>
        </div>
        </div>
    </section>

    <?php include 'layout/footer.php'; ?>
</body>
<script src="assets/js/nosotros.js"></script>
</html>
