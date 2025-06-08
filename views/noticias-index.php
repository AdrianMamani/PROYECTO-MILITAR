<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Noticias</title>
    <link rel="icon" href="/PROYECTO-MILITAR/views/assets/img/logo.jpg" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="/PROYECTO-MILITAR/views/assets/css/evento.css" />    
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background: linear-gradient(135deg, var(--military-light) 0%, #f8f9fa 100%);
            min-height: 100vh;
        }

        /* Header Militar */
        .military-header {
            background: linear-gradient(135deg, var(--military-primary) 0%, var(--military-secondary) 100%);
            color: white;
            padding: 3rem 0;
            position: relative;
            overflow: hidden;
        }

        .military-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="stars" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23stars)"/></svg>');
            opacity: 0.3;
        }

        .military-header .container {
            position: relative;
            z-index: 2;
        }

        .military-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .military-subtitle {
            font-size: 1.3rem;
            opacity: 0.9;
            font-weight: 300;
            margin-bottom: 2rem;
        }

        .military-badge {
            display: inline-flex;
            align-items: center;
            background: var(--gold-accent);
            color: var(--military-dark);
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Search Section */
        .search-container {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
            margin: -2rem 0 4rem 0;
            position: relative;
            z-index: 10;
            border: 2px solid var(--military-light);
        }

        .search-input {
            border: 3px solid var(--military-light);
            border-radius: 50px;
            padding: 1.25rem 1.75rem 1.25rem 4rem;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            background: #fafafa;
        }

        .search-input:focus {
            border-color: var(--military-primary);
            box-shadow: 0 0 0 4px rgba(26, 95, 63, 0.1);
            background: white;
            outline: none;
        }

        .search-icon {
            position: absolute;
            left: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--military-primary);
            font-size: 1.2rem;
        }

        .btn-military {
            background: var(--military-primary);
            border: none;
            border-radius: 50px;
            padding: 1.25rem 2.5rem;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-military:hover {
            background: var(--military-secondary);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(26, 95, 63, 0.3);
        }

        /* News Cards */
        .news-grid {
            margin-bottom: 4rem;
        }

        .news-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            transition: all 0.4s ease;
            height: 100%;
            border: 2px solid transparent;
            position: relative;
        }

        .news-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(0,0,0,0.15);
            border-color: var(--military-accent);
        }

        .news-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--military-primary), var(--gold-accent));
        }

        .news-image {
            width: 100%;
            height: 280px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .news-card:hover .news-image {
            transform: scale(1.05);
        }

        .news-content {
            padding: 2rem;
        }

        .news-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--military-dark);
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .news-subtitle {
            color: var(--military-primary);
            font-size: 1rem;
            margin-bottom: 1rem;
            font-weight: 500;
        }

        .news-excerpt {
            color: var(--text-light);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .news-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-top: 1rem;
            border-top: 1px solid var(--military-light);
        }

        .news-date {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            color: var(--text-light);
            font-weight: 500;
        }

        .media-indicators {
            display: flex;
            gap: 1rem;
        }

        .media-indicator {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.85rem;
            color: var(--military-accent);
            background: var(--military-light);
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-weight: 500;
        }

        .read-more-btn {
            background: var(--military-primary);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 0.9rem 2rem;
            font-size: 0.95rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .read-more-btn:hover {
            background: var(--military-secondary);
            color: white;
            transform: translateX(8px);
            box-shadow: 0 5px 15px rgba(26, 95, 63, 0.3);
        }

        /* Search Results */
        .search-results {
            display: none;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            margin-top: 1rem;
            max-height: 400px;
            overflow-y: auto;
            border: 2px solid var(--military-light);
        }

        .search-result-item {
            padding: 1.25rem;
            border-bottom: 1px solid var(--military-light);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-result-item:hover {
            background: var(--military-light);
        }

        .search-result-item:last-child {
            border-bottom: none;
        }

        /* Pagination */
        .pagination-container {
            margin: 4rem 0 3rem 0;
            display: flex;
            justify-content: center;
        }

        .pagination .page-link {
            border: 2px solid var(--military-light);
            color: var(--military-primary);
            padding: 1rem 1.5rem;
            margin: 0 0.3rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            background: white;
        }

        .pagination .page-link:hover {
            background: var(--military-primary);
            border-color: var(--military-primary);
            color: white;
            transform: translateY(-2px);
        }

        .pagination .page-item.active .page-link {
            background: var(--military-primary);
            border-color: var(--military-primary);
            color: white;
        }

        /* Loading Animation */
        .loading {
            display: none;
            text-align: center;
            padding: 3rem;
        }

        .spinner {
            border: 4px solid var(--military-light);
            border-top: 4px solid var(--military-primary);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 0 auto 1.5rem;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 5rem 2rem;
            color: var(--text-light);
        }

        .empty-state i {
            font-size: 5rem;
            margin-bottom: 2rem;
            opacity: 0.5;
            color: var(--military-accent);
        }

        .empty-state h3 {
            color: var(--military-dark);
            margin-bottom: 1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .military-title {
                font-size: 2.2rem;
            }
            
            .military-subtitle {
                font-size: 1.1rem;
            }
            
            .search-container {
                margin: -1rem 0 3rem 0;
                padding: 2rem;
            }
            
            .news-image {
                height: 220px;
            }
            
            .news-content {
                padding: 1.5rem;
            }
        }

        /* Animations */
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

        .news-card {
            animation: fadeInUp 0.6s ease forwards;
        }

        .news-card:nth-child(1) { animation-delay: 0.1s; }
        .news-card:nth-child(2) { animation-delay: 0.2s; }
        .news-card:nth-child(3) { animation-delay: 0.3s; }
        .news-card:nth-child(4) { animation-delay: 0.4s; }
        .news-card:nth-child(5) { animation-delay: 0.5s; }
        .news-card:nth-child(6) { animation-delay: 0.6s; }
    </style>
</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <img src="/PROYECTO-MILITAR/views/assets/img/logo.jpg" alt="Cargando..."> <!-- Cambia por la ruta de tu logo -->
    </div>
    <?php
    include 'layout/header.php';
    ?>
    <!-- Header Militar -->
    <header class="military-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto text-center">
                    <h1 class="military-title">
                        <i class="fas fa-shield-alt me-3"></i>
                        Portal de Noticias Militar
                    </h1>
                    <p class="military-subtitle">Centro de Información y Comunicaciones Oficiales</p>
                    <div class="military-badge">
                        <i class="fas fa-star me-2"></i>
                        Información Clasificada
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <!-- Search Bar -->
        <div class="search-container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="position-relative">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" class="form-control search-input" id="searchInput" 
                               placeholder="Buscar noticias, comunicados oficiales...">
                        <div class="search-results" id="searchResults"></div>
                    </div>
                    <div class="text-center mt-3">
                        <button class="btn-military" type="button" onclick="buscarNoticias()">
                            <i class="fas fa-search me-2"></i>Buscar Información
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Loading -->
        <div class="loading" id="loading">
            <div class="spinner"></div>
            <p><strong>Procesando información clasificada...</strong></p>
        </div>

        <!-- News Grid -->
        <div class="row news-grid" id="newsGrid">
            <?php if (empty($noticias)): ?>
                <div class="col-12">
                    <div class="empty-state">
                        <i class="fas fa-newspaper"></i>
                        <h3>No hay comunicados disponibles</h3>
                        <p>No se encontraron noticias o comunicados oficiales en este momento</p>
                    </div>
                </div>
            <?php else: ?>
                <?php foreach ($noticias as $noticia): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <article class="news-card">
                        <?php if ($noticia['imagen_principal']): ?>
                            <img src="<?= htmlspecialchars($noticia['imagen_principal']) ?>" 
                                 alt="<?= htmlspecialchars($noticia['titulo']) ?>" 
                                 class="news-image">
                        <?php else: ?>
                            <div class="news-image d-flex align-items-center justify-content-center" 
                                 style="background: linear-gradient(135deg, var(--military-light), var(--military-accent));">
                                <i class="fas fa-shield-alt fa-4x" style="color: var(--military-primary); opacity: 0.3;"></i>
                            </div>
                        <?php endif; ?>
                        
                        <div class="news-content">
                            <h2 class="news-title"><?= htmlspecialchars($noticia['titulo']) ?></h2>
                            
                            <?php if (!empty($noticia['subtitulo'])): ?>
                                <p class="news-subtitle"><?= htmlspecialchars($noticia['subtitulo']) ?></p>
                            <?php endif; ?>
                            
                            <p class="news-excerpt">
                                <?= strlen($noticia['descripcion']) > 150 ? 
                                    substr(htmlspecialchars($noticia['descripcion']), 0, 150) . '...' : 
                                    htmlspecialchars($noticia['descripcion']) ?>
                            </p>
                            
                            <div class="news-meta">
                                <div class="news-date">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span><?= date('d/m/Y', strtotime($noticia['fecha_creacion'])) ?></span>
                                </div>
                                <div class="media-indicators">
                                    <?php if (count($noticia['imagenes']) > 0): ?>
                                        <span class="media-indicator">
                                            <i class="fas fa-images"></i>
                                            <?= count($noticia['imagenes']) ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php if (count($noticia['videos']) > 0): ?>
                                        <span class="media-indicator">
                                            <i class="fas fa-video"></i>
                                            <?= count($noticia['videos']) ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <a href="index.php?action=noticias-public/detalle&id=<?= $noticia['id'] ?>" 
                               class="read-more-btn">
                                Leer Comunicado <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <?php if ($total_pages > 1): ?>
        <div class="pagination-container">
            <nav>
                <ul class="pagination">
                    <?php if ($page > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?action=noticias-public/index&page=<?= $page - 1 ?>">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                    
                    <?php for ($i = max(1, $page - 2); $i <= min($total_pages, $page + 2); $i++): ?>
                        <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                            <a class="page-link" href="?action=noticias-public/index&page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                    
                    <?php if ($page < $total_pages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?action=noticias-public/index&page=<?= $page + 1 ?>">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
        <?php endif; ?>
    </div>

    <!-- Footer Militar -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let searchTimeout;

        // Búsqueda en tiempo real
        document.getElementById('searchInput').addEventListener('input', function() {
            clearTimeout(searchTimeout);
            const query = this.value.trim();
            
            if (query.length < 3) {
                document.getElementById('searchResults').style.display = 'none';
                return;
            }
            
            searchTimeout = setTimeout(() => {
                buscarNoticiasEnTiempoReal(query);
            }, 300);
        });

        function buscarNoticiasEnTiempoReal(query) {
            document.getElementById('loading').style.display = 'block';
            
            fetch(`index.php?action=noticias-public/buscar&q=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('loading').style.display = 'none';
                    
                    if (data.success) {
                        mostrarResultadosBusqueda(data.noticias);
                    } else {
                        console.error('Error en búsqueda:', data.message);
                    }
                })
                .catch(error => {
                    document.getElementById('loading').style.display = 'none';
                    console.error('Error:', error);
                });
        }

        function mostrarResultadosBusqueda(noticias) {
            const resultsContainer = document.getElementById('searchResults');
            
            if (noticias.length === 0) {
                resultsContainer.innerHTML = '<div class="search-result-item"><i class="fas fa-exclamation-triangle me-2"></i>No se encontraron comunicados</div>';
            } else {
                resultsContainer.innerHTML = noticias.map(noticia => `
                    <div class="search-result-item" onclick="window.location.href='index.php?action=noticias-public/detalle&id=${noticia.id}'">
                        <div class="d-flex">
                            ${noticia.imagen_principal ? 
                                `<img src="${noticia.imagen_principal}" style="width: 70px; height: 50px; object-fit: cover; border-radius: 8px; margin-right: 1rem;">` : 
                                '<div style="width: 70px; height: 50px; background: var(--military-light); border-radius: 8px; margin-right: 1rem; display: flex; align-items: center; justify-content: center;"><i class="fas fa-shield-alt text-muted"></i></div>'
                            }
                            <div>
                                <h6 class="mb-1" style="color: var(--military-dark);">${noticia.titulo}</h6>
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    ${new Date(noticia.fecha_creacion).toLocaleDateString('es-ES')}
                                </small>
                            </div>
                        </div>
                    </div>
                `).join('');
            }
            
            resultsContainer.style.display = 'block';
        }

        function buscarNoticias() {
            const query = document.getElementById('searchInput').value.trim();
            if (query.length >= 3) {
                window.location.href = `index.php?action=noticias-public/index&search=${encodeURIComponent(query)}`;
            }
        }

        // Cerrar resultados al hacer clic fuera
        document.addEventListener('click', function(event) {
            const searchContainer = document.querySelector('.search-container');
            if (!searchContainer.contains(event.target)) {
                document.getElementById('searchResults').style.display = 'none';
            }
        });

        // Búsqueda con Enter
        document.getElementById('searchInput').addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                buscarNoticias();
            }
        });

        // Animaciones de entrada
        document.addEventListener('DOMContentLoaded', function() {
            // Animación del header
            const header = document.querySelector('.military-header');
            header.style.opacity = '0';
            header.style.transform = 'translateY(-20px)';
            header.style.transition = 'all 0.8s ease';
            
            setTimeout(() => {
                header.style.opacity = '1';
                header.style.transform = 'translateY(0)';
            }, 100);

            // Animación del search container
            const searchContainer = document.querySelector('.search-container');
            searchContainer.style.opacity = '0';
            searchContainer.style.transform = 'translateY(30px)';
            searchContainer.style.transition = 'all 0.6s ease';
            
            setTimeout(() => {
                searchContainer.style.opacity = '1';
                searchContainer.style.transform = 'translateY(0)';
            }, 300);
        });
    </script>
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
</body>
</html>
