<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias - Portal de Información</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background-color: #ffffff;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1d4ed8 100%);
            color: white;
            padding: 2rem 0;
            margin-bottom: 3rem;
        }

        .header h1 {
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* Search Bar */
        .search-container {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin: -1rem 0 3rem 0;
            position: relative;
            z-index: 10;
        }

        .search-input {
            border: 2px solid var(--border-color);
            border-radius: 50px;
            padding: 1rem 1.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .search-btn {
            background: var(--primary-color);
            border: none;
            border-radius: 50px;
            padding: 1rem 2rem;
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        /* News Cards */
        .news-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid var(--border-color);
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .news-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .news-card:hover .news-image {
            transform: scale(1.05);
        }

        .news-content {
            padding: 1.5rem;
        }

        .news-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.75rem;
            line-height: 1.4;
        }

        .news-subtitle {
            color: var(--text-light);
            font-size: 0.95rem;
            margin-bottom: 1rem;
        }

        .news-excerpt {
            color: var(--text-light);
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .news-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            font-size: 0.85rem;
            color: var(--text-light);
        }

        .media-indicators {
            display: flex;
            gap: 1rem;
        }

        .media-indicator {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.8rem;
            color: var(--text-light);
        }

        .read-more-btn {
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .read-more-btn:hover {
            background: #1d4ed8;
            color: white;
            transform: translateX(5px);
        }

        /* Pagination */
        .pagination-container {
            margin: 4rem 0 2rem 0;
            display: flex;
            justify-content: center;
        }

        .pagination .page-link {
            border: 2px solid var(--border-color);
            color: var(--text-dark);
            padding: 0.75rem 1rem;
            margin: 0 0.25rem;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .pagination .page-link:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }

        .pagination .page-item.active .page-link {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* Search Results */
        .search-results {
            display: none;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-top: 1rem;
            max-height: 400px;
            overflow-y: auto;
        }

        .search-result-item {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .search-result-item:hover {
            background: var(--bg-light);
        }

        .search-result-item:last-child {
            border-bottom: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }
            
            .search-container {
                margin: -0.5rem 0 2rem 0;
                padding: 1.5rem;
            }
            
            .news-image {
                height: 200px;
            }
        }

        /* Loading Animation */
        .loading {
            display: none;
            text-align: center;
            padding: 2rem;
        }

        .spinner {
            border: 3px solid var(--border-color);
            border-top: 3px solid var(--primary-color);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto 1rem;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--text-light);
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1><i class="fas fa-newspaper me-3"></i>Portal de Noticias</h1>
                    <p>Mantente informado con las últimas noticias y acontecimientos</p>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <!-- Search Bar -->
        <div class="search-container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="input-group">
                        <input type="text" class="form-control search-input" id="searchInput" 
                               placeholder="Buscar noticias...">
                        <button class="btn search-btn" type="button" onclick="buscarNoticias()">
                            <i class="fas fa-search me-2"></i>Buscar
                        </button>
                    </div>
                    <div class="search-results" id="searchResults"></div>
                </div>
            </div>
        </div>

        <!-- Loading -->
        <div class="loading" id="loading">
            <div class="spinner"></div>
            <p>Buscando noticias...</p>
        </div>

        <!-- News Grid -->
        <div class="row" id="newsGrid">
            <?php if (empty($noticias)): ?>
                <div class="col-12">
                    <div class="empty-state">
                        <i class="fas fa-newspaper"></i>
                        <h3>No hay noticias disponibles</h3>
                        <p>Vuelve más tarde para ver las últimas noticias</p>
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
                            <div class="news-image d-flex align-items-center justify-content-center bg-light">
                                <i class="fas fa-image fa-3x text-muted"></i>
                            </div>
                        <?php endif; ?>
                        
                        <div class="news-content">
                            <div class="news-meta">
                                <span><i class="fas fa-calendar me-1"></i><?= date('d/m/Y', strtotime($noticia['fecha_creacion'])) ?></span>
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
                            
                            <h2 class="news-title"><?= htmlspecialchars($noticia['titulo']) ?></h2>
                            
                            <?php if (!empty($noticia['subtitulo'])): ?>
                                <p class="news-subtitle"><?= htmlspecialchars($noticia['subtitulo']) ?></p>
                            <?php endif; ?>
                            
                            <p class="news-excerpt">
                                <?= strlen($noticia['descripcion']) > 150 ? 
                                    substr(htmlspecialchars($noticia['descripcion']), 0, 150) . '...' : 
                                    htmlspecialchars($noticia['descripcion']) ?>
                            </p>
                            
                            <a href="index.php?action=noticias-public/detalle&id=<?= $noticia['id'] ?>" 
                               class="read-more-btn">
                                Leer más <i class="fas fa-arrow-right"></i>
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
                    
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
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
                resultsContainer.innerHTML = '<div class="search-result-item">No se encontraron noticias</div>';
            } else {
                resultsContainer.innerHTML = noticias.map(noticia => `
                    <div class="search-result-item" onclick="window.location.href='index.php?action=noticias-public/detalle&id=${noticia.id}'">
                        <div class="d-flex">
                            ${noticia.imagen_principal ? 
                                `<img src="${noticia.imagen_principal}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px; margin-right: 1rem;">` : 
                                '<div style="width: 60px; height: 60px; background: #f1f5f9; border-radius: 8px; margin-right: 1rem; display: flex; align-items: center; justify-content: center;"><i class="fas fa-image text-muted"></i></div>'
                            }
                            <div>
                                <h6 class="mb-1">${noticia.titulo}</h6>
                                <small class="text-muted">${new Date(noticia.fecha_creacion).toLocaleDateString('es-ES')}</small>
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
    </script>
</body>
</html>
