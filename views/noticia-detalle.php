<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($noticia['titulo']) ?> - Portal Militar</title>
    <link rel="icon" href="/PROYECTO-MILITAR/views/assets/img/logo.jpg" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css" rel="stylesheet">
    <style>
        :root {
            --military-primary: #1a5f3f;
            --military-secondary: #2d7a57;
            --military-accent: #4a9d6f;
            --military-light: #e8f5e8;
            --military-dark: #0f3d2a;
            --gold-accent: #d4af37;
            --text-dark: #1a1a1a;
            --text-light: #6c757d;
            --border-color: #dee2e6;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.7;
            color: var(--text-dark);
            background: linear-gradient(135deg, var(--military-light) 0%, #f8f9fa 100%);
            min-height: 100vh;
        }

        /* Navigation */
        .navbar-military {
            background: white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            padding: 1.25rem 0;
            border-bottom: 3px solid var(--military-primary);
        }

        .navbar-brand {
            font-weight: 800;
            color: var(--military-primary) !important;
            font-size: 1.6rem;
        }

        .back-btn {
            background: var(--military-light);
            border: 2px solid var(--military-accent);
            color: var(--military-primary);
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .back-btn:hover {
            background: var(--military-primary);
            color: white;
            border-color: var(--military-primary);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(26, 95, 63, 0.3);
        }

       
        .article-header {
            background: linear-gradient(135deg, var(--military-primary) 0%, var(--military-secondary) 100%);
            color: white;
            padding: 4rem 0;
            margin-bottom: 4rem;
            position: relative;
            overflow: hidden;
        }

        .article-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="stars" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23stars)"/></svg>');
            opacity: 0.3;
        }

        .article-header .container {
            position: relative;
            z-index: 2;
        }

        .article-title {
            font-size: 3rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .article-subtitle {
            font-size: 1.4rem;
            opacity: 0.9;
            margin-bottom: 2rem;
            font-weight: 300;
        }

        .article-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 2.5rem;
            font-size: 1rem;
            opacity: 0.9;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: rgba(255,255,255,0.1);
            padding: 0.75rem 1.25rem;
            border-radius: 50px;
            backdrop-filter: blur(10px);
        }

        .classification-badge {
            background: var(--gold-accent);
            color: var(--military-dark);
            padding: 0.5rem 1.25rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 1rem;
            display: inline-block;
        }

      
        .article-content {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            margin-bottom: 3rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 2px solid var(--military-light);
            font-size: 1.15rem;
            line-height: 1.8;
        }

        .article-content p {
            margin-bottom: 2rem;
        }

 
        .media-section {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            margin-bottom: 3rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 2px solid var(--military-light);
        }

        .media-section h3 {
            color: var(--military-primary);
            font-weight: 700;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .media-section h3::after {
            content: '';
            flex: 1;
            height: 3px;
            background: linear-gradient(90deg, var(--military-primary), var(--gold-accent));
            border-radius: 2px;
        }

     
        .image-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .gallery-item {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            transition: all 0.4s ease;
            border: 3px solid transparent;
        }

        .gallery-item:hover {
            transform: translateY(-8px);
            border-color: var(--military-accent);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }

        .gallery-image {
            width: 100%;
            height: 280px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .gallery-item:hover .gallery-image {
            transform: scale(1.05);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(26, 95, 63, 0.8), rgba(212, 175, 55, 0.8));
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-overlay i {
            color: white;
            font-size: 2.5rem;
        }


        .video-container {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%;
            margin-bottom: 2rem;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            border: 3px solid var(--military-light);
        }

        .video-container iframe,
        .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

      
        .related-news {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 2px solid var(--military-light);
        }

        .related-news h3 {
            color: var(--military-primary);
            font-weight: 700;
            margin-bottom: 2rem;
            font-size: 1.4rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .related-item {
            background: var(--military-light);
            border-radius: 15px;
            padding: 1.75rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
            display: block;
            border: 2px solid transparent;
        }

        .related-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            color: inherit;
            border-color: var(--military-accent);
            background: white;
        }

        .related-item h5 {
            color: var(--military-dark);
            font-weight: 600;
            margin-bottom: 0.75rem;
            font-size: 1.1rem;
        }

        .related-item .text-muted {
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

      
        .share-section {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 2px solid var(--military-light);
        }

        .share-section h3 {
            color: var(--military-primary);
            margin-bottom: 2rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .share-buttons {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .share-btn {
            padding: 1rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
        }

        .share-btn:hover {
            transform: translateY(-3px);
            color: white;
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }

        .share-facebook { background: #1877f2; }
        .share-twitter { background: #1da1f2; }
        .share-whatsapp { background: #25d366; }
        .share-linkedin { background: #0077b5; }

        /* Info Panel */
        .info-panel {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 2px solid var(--military-light);
        }

        .info-panel h3 {
            color: var(--military-primary);
            font-weight: 700;
            margin-bottom: 2rem;
            font-size: 1.3rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-table {
            border: none;
        }

        .info-table td {
            padding: 0.75rem 0;
            border: none;
            border-bottom: 1px solid var(--military-light);
        }

        .info-table td:first-child {
            font-weight: 600;
            color: var(--military-primary);
            width: 40%;
        }

        .status-badge {
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-badge.official {
            background: rgba(40, 167, 69, 0.1);
            color: var(--success-color);
        }

        .status-badge.classified {
            background: rgba(255, 193, 7, 0.1);
            color: var(--warning-color);
        }

        .status-badge.urgent {
            background: rgba(220, 53, 69, 0.1);
            color: var(--danger-color);
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 2rem;
        }

        .btn-military {
            background: var(--military-primary);
            border: none;
            color: white;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
        }

        .btn-military:hover {
            background: var(--military-secondary);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(26, 95, 63, 0.3);
        }

        .btn-military.secondary {
            background: var(--military-accent);
        }

        .btn-military.gold {
            background: var(--gold-accent);
            color: var(--military-dark);
        }

    
        @media (max-width: 768px) {
            .article-title {
                font-size: 2.2rem;
            }
            
            .article-subtitle {
                font-size: 1.2rem;
            }
            
            .article-meta {
                gap: 1rem;
            }
            
            .meta-item {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }
            
            .article-content,
            .media-section,
            .info-panel {
                padding: 2rem;
            }
            
            .image-gallery {
                grid-template-columns: 1fr;
            }
            
            .share-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: center;
            }
        }

 
        @media print {
            .navbar-military,
            .action-buttons,
            .share-section {
                display: none !important;
            }
            
            .article-header {
                background: var(--military-primary) !important;
                -webkit-print-color-adjust: exact;
            }
            
            .media-section,
            .info-panel {
                box-shadow: none;
                border: 1px solid #ddd;
            }
        }

   
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .article-content,
        .media-section,
        .info-panel {
            animation: fadeInUp 0.6s ease forwards;
        }

        .article-content { animation-delay: 0.1s; }
        .media-section:nth-of-type(1) { animation-delay: 0.2s; }
        .media-section:nth-of-type(2) { animation-delay: 0.3s; }
        .info-panel { animation-delay: 0.4s; }
    </style>
</head>
<body>
 <?php
    include 'layout/header.php';
    ?>


    <header class="article-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <h1 class="article-title"><?= htmlspecialchars($noticia['titulo']) ?></h1>
                    
                    <?php if (!empty($noticia['subtitulo'])): ?>
                        <p class="article-subtitle"><?= htmlspecialchars($noticia['subtitulo']) ?></p>
                    <?php endif; ?>
                    
                    <div class="article-meta">
                        <div class="meta-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span><?= date('d \d\e F \d\e Y', strtotime($noticia['fecha_creacion'])) ?></span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-clock"></i>
                            <span><?= date('H:i', strtotime($noticia['fecha_creacion'])) ?> hrs</span>
                        </div>
                        <?php if (count($imagenes) > 0): ?>
                            <div class="meta-item">
                                <i class="fas fa-images"></i>
                                <span><?= count($imagenes) ?> imagen<?= count($imagenes) > 1 ? 'es' : '' ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if (count($videos) > 0): ?>
                            <div class="meta-item">
                                <i class="fas fa-video"></i>
                                <span><?= count($videos) ?> video<?= count($videos) > 1 ? 's' : '' ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="classification-badge">
                        <i class="fas fa-star me-2"></i>
                        Comunicado Oficial
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
         
                <div class="article-content">
                    <?= nl2br(htmlspecialchars($noticia['descripcion'])) ?>
                </div>

            
                <?php if (!empty($imagenes)): ?>
                <div class="media-section">
                    <h3><i class="fas fa-images"></i>Galería de Imágenes</h3>
                    <div class="image-gallery">
                        <?php foreach ($imagenes as $index => $imagen): ?>
                            <div class="gallery-item">
                                <a href="<?= htmlspecialchars($imagen['url']) ?>" 
                                   data-lightbox="gallery" 
                                   data-title="Imagen <?= $index + 1 ?> de <?= count($imagenes) ?>">
                                    <img src="<?= htmlspecialchars($imagen['url']) ?>" 
                                         alt="Imagen oficial del comunicado" 
                                         class="gallery-image">
                                    <div class="gallery-overlay">
                                        <i class="fas fa-search-plus"></i>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

           
                <?php if (!empty($videos)): ?>
                <div class="media-section">
                    <h3><i class="fas fa-video"></i>Material Audiovisual</h3>
                    <?php foreach ($videos as $video): ?>
                        <div class="video-container">
                            <?php if ($video['tipo'] === 'youtube'): ?>
                                <iframe src="<?= htmlspecialchars($video['url']) ?>" 
                                        frameborder="0" 
                                        allowfullscreen>
                                </iframe>
                            <?php else: ?>
                                <video controls>
                                    <source src="<?= htmlspecialchars($video['url']) ?>" type="video/mp4">
                                    Su navegador no soporta la reproducción de video.
                                </video>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

         
                <div class="share-section">
                    <h3>Compartir Comunicado</h3>
                    <div class="share-buttons">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) ?>" 
                           target="_blank" class="share-btn share-facebook">
                            <i class="fab fa-facebook-f"></i>Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url=<?= urlencode($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) ?>&text=<?= urlencode($noticia['titulo']) ?>" 
                           target="_blank" class="share-btn share-twitter">
                            <i class="fab fa-twitter"></i>Twitter
                        </a>
                        <a href="https://wa.me/?text=<?= urlencode($noticia['titulo'] . ' - ' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) ?>" 
                           target="_blank" class="share-btn share-whatsapp">
                            <i class="fab fa-whatsapp"></i>WhatsApp
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) ?>" 
                           target="_blank" class="share-btn share-linkedin">
                            <i class="fab fa-linkedin-in"></i>LinkedIn
                        </a>
                    </div>
                </div>
            </div>

          
            <div class="col-lg-4">
           
                <div class="info-panel">
                    <h3><i class="fas fa-info-circle"></i>Información del Comunicado</h3>
                    <table class="table info-table">
                        <tr>
                            <td>ID del Comunicado:</td>
                            <td><?= htmlspecialchars($noticia['id']) ?></td>
                        </tr>
                        <tr>
                            <td>Fecha de Publicación:</td>
                            <td><?= date('d/m/Y H:i', strtotime($noticia['fecha_creacion'])) ?></td>
                        </tr>
                        <tr>
                            <td>Imágenes Adjuntas:</td>
                            <td><?= count($imagenes) ?></td>
                        </tr>
                        <tr>
                            <td>Videos Adjuntos:</td>
                            <td><?= count($videos) ?></td>
                        </tr>
                        <tr>
                            <td>Clasificación:</td>
                            <td><span class="status-badge official">Oficial</span></td>
                        </tr>
                        <tr>
                            <td>Estado:</td>
                            <td><span class="status-badge classified">Público</span></td>
                        </tr>
                    </table>
                </div>

      
                <?php if (!empty($noticias_relacionadas)): ?>
                <div class="related-news">
                    <h3><i class="fas fa-newspaper"></i>Comunicados Relacionados</h3>
                    <?php foreach ($noticias_relacionadas as $relacionada): ?>
                        <a href="index.php?action=noticias-public/detalle&id=<?= $relacionada['id'] ?>" 
                           class="related-item">
                            <div class="d-flex">
                                <?php if ($relacionada['imagen_principal']): ?>
                                    <img src="<?= htmlspecialchars($relacionada['imagen_principal']) ?>" 
                                         style="width: 90px; height: 70px; object-fit: cover; border-radius: 10px; margin-right: 1.25rem;">
                                <?php else: ?>
                                    <div style="width: 90px; height: 70px; background: var(--military-accent); border-radius: 10px; margin-right: 1.25rem; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-shield-alt text-white"></i>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <h5><?= htmlspecialchars($relacionada['titulo']) ?></h5>
                                    <small class="text-muted">
                                        <i class="fas fa-calendar me-1"></i>
                                        <?= date('d/m/Y', strtotime($relacionada['fecha_creacion'])) ?>
                                    </small>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

           
                <div class="action-buttons">
                  
                    <a href="index.php?action=noticias-public/index" class="btn-military secondary">
                        <i class="fas fa-list"></i>
                        Ver Todos
                    </a>
                    <a href="index.php?action=finanzas-public/index" class="btn-military gold">
                        <i class="fas fa-dollar-sign"></i>
                        Finanzas
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/js/lightbox.min.js"></script>
    <script>
  
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'albumLabel': 'Imagen %1 de %2'
        });


        document.addEventListener('DOMContentLoaded', function() {
      
            const header = document.querySelector('.article-header');
            header.style.opacity = '0';
            header.style.transform = 'translateY(-30px)';
            header.style.transition = 'all 1s ease';
            
            setTimeout(() => {
                header.style.opacity = '1';
                header.style.transform = 'translateY(0)';
            }, 100);

         
            const galleryItems = document.querySelectorAll('.gallery-item');
            galleryItems.forEach((item, index) => {
                item.style.opacity = '0';
                item.style.transform = 'scale(0.9)';
                item.style.transition = 'all 0.5s ease';
                
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'scale(1)';
                }, 800 + (index * 100));
            });

      
            const relatedItems = document.querySelectorAll('.related-item');
            relatedItems.forEach((item, index) => {
                item.style.opacity = '0';
                item.style.transform = 'translateX(20px)';
                item.style.transition = 'all 0.4s ease';
                
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateX(0)';
                }, 1000 + (index * 150));
            });
        });

     
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

 
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const header = document.querySelector('.article-header');
            if (header) {
                header.style.transform = `translateY(${scrolled * 0.5}px)`;
            }
        });
    </script>
    <?php
    include 'layout/footer.php';
    ?>
</body>
</html>
