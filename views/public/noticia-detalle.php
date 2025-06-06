<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($noticia['titulo']) ?> - Portal de Noticias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #64748b;
            --accent-color: #f59e0b;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --bg-light: #f8fafc;
            --border-color: #e2e8f0;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.7;
            color: var(--text-dark);
        }

        /* Navigation */
        .navbar-custom {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color) !important;
            font-size: 1.5rem;
        }

        .back-btn {
            background: var(--bg-light);
            border: 1px solid var(--border-color);
            color: var(--text-dark);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        /* Article Header */
        .article-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1d4ed8 100%);
            color: white;
            padding: 3rem 0;
            margin-bottom: 3rem;
        }

        .article-title {
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        .article-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 1.5rem;
        }

        .article-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            font-size: 0.95rem;
            opacity: 0.9;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Article Content */
        .article-content {
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 3rem;
        }

        .article-content p {
            margin-bottom: 1.5rem;
        }

        /* Media Sections */
        .media-section {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 3rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            border: 1px solid var(--border-color);
        }

        .media-section h3 {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        /* Image Gallery */
        .image-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .gallery-item {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
        }

        .gallery-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
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
            background: rgba(0,0,0,0.5);
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
            font-size: 2rem;
        }

        /* Video Section */
        .video-container {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%;
            margin-bottom: 1.5rem;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .video-container iframe,
        .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        /* Related News */
        .related-news {
            background: var(--bg-light);
            border-radius: 20px;
            padding: 2rem;
        }

        .related-news h3 {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .related-item {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .related-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            color: inherit;
        }

        .related-item h5 {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .related-item .text-muted {
            font-size: 0.85rem;
        }

        /* Share Buttons */
        .share-section {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            border: 1px solid var(--border-color);
        }

        .share-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .share-btn {
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            text-decoration: none;
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .share-btn:hover {
            transform: translateY(-2px);
            color: white;
        }

        .share-facebook { background: #1877f2; }
        .share-twitter { background: #1da1f2; }
        .share-whatsapp { background: #25d366; }
        .share-linkedin { background: #0077b5; }

        /* Responsive */
        @media (max-width: 768px) {
            .article-title {
                font-size: 2rem;
            }
            
            .article-subtitle {
                font-size: 1.1rem;
            }
            
            .article-meta {
                gap: 1rem;
            }
            
            .image-gallery {
                grid-template-columns: 1fr;
            }
            
            .share-buttons {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="index.php?action=noticias-public/index">
                <i class="fas fa-newspaper me-2"></i>Portal de Noticias
            </a>
            <a href="index.php?action=noticias-public/index" class="back-btn">
                <i class="fas fa-arrow-left me-2"></i>Volver a Noticias
            </a>
        </div>
    </nav>

    <!-- Article Header -->
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
                            <i class="fas fa-calendar"></i>
                            <span><?= date('d \d\e F \d\e Y', strtotime($noticia['fecha_creacion'])) ?></span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-clock"></i>
                            <span><?= date('H:i', strtotime($noticia['fecha_creacion'])) ?></span>
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
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Article Content -->
                <div class="article-content">
                    <?= nl2br(htmlspecialchars($noticia['descripcion'])) ?>
                </div>

                <!-- Image Gallery -->
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
                                         alt="Imagen de la noticia" 
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

                <!-- Videos -->
                <?php if (!empty($videos)): ?>
                <div class="media-section">
                    <h3><i class="fas fa-video"></i>Videos</h3>
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
                                    Tu navegador no soporta el elemento video.
                                </video>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <!-- Share Section -->
                <div class="share-section">
                    <h3 class="mb-3">Compartir esta noticia</h3>
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

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Related News -->
                <?php if (!empty($noticias_relacionadas)): ?>
                <div class="related-news">
                    <h3>Noticias Relacionadas</h3>
                    <?php foreach ($noticias_relacionadas as $relacionada): ?>
                        <a href="index.php?action=noticias-public/detalle&id=<?= $relacionada['id'] ?>" 
                           class="related-item">
                            <div class="d-flex">
                                <?php if ($relacionada['imagen_principal']): ?>
                                    <img src="<?= htmlspecialchars($relacionada['imagen_principal']) ?>" 
                                         style="width: 80px; height: 60px; object-fit: cover; border-radius: 8px; margin-right: 1rem;">
                                <?php else: ?>
                                    <div style="width: 80px; height: 60px; background: var(--bg-light); border-radius: 8px; margin-right: 1rem; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <h5><?= htmlspecialchars($relacionada['titulo']) ?></h5>
                                    <small class="text-muted">
                                        <?= date('d/m/Y', strtotime($relacionada['fecha_creacion'])) ?>
                                    </small>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/js/lightbox.min.js"></script>
    <script>
        // Configurar Lightbox
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'albumLabel': 'Imagen %1 de %2'
        });

        // Smooth scroll para enlaces internos
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>
