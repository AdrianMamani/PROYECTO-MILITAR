<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Aportaciones - Sistema Militar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
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
            padding: 2rem 0;
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
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .military-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            font-weight: 300;
        }

        .military-badge {
            display: inline-flex;
            align-items: center;
            background: var(--gold-accent);
            color: var(--military-dark);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            margin-top: 1rem;
        }

        /* Estadísticas Cards */
        .stats-container {
            margin: -2rem 0 3rem 0;
            position: relative;
            z-index: 10;
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .stat-icon.primary { background: var(--military-light); color: var(--military-primary); }
        .stat-icon.success { background: rgba(40, 167, 69, 0.1); color: var(--success-color); }
        .stat-icon.warning { background: rgba(255, 193, 7, 0.1); color: var(--warning-color); }
        .stat-icon.gold { background: rgba(212, 175, 55, 0.1); color: var(--gold-accent); }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--military-primary);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--text-light);
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Controles */
        .controls-section {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            border: 1px solid var(--border-color);
        }

        .search-container {
            position: relative;
        }

        .search-input {
            border: 2px solid var(--border-color);
            border-radius: 50px;
            padding: 1rem 1.5rem 1rem 3rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            width: 100%;
        }

        .search-input:focus {
            border-color: var(--military-primary);
            box-shadow: 0 0 0 3px rgba(26, 95, 63, 0.1);
            outline: none;
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }

        .btn-military {
            background: var(--military-primary);
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-military:hover {
            background: var(--military-secondary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(26, 95, 63, 0.3);
        }

        .btn-military.secondary {
            background: var(--military-accent);
        }

        .btn-military.gold {
            background: var(--gold-accent);
            color: var(--military-dark);
        }

        /* Tabla Principal */
        .main-table-container {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 1px solid var(--border-color);
        }

        .table-header {
            background: var(--military-primary);
            color: white;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: between;
            align-items: center;
        }

        .table-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin: 0;
        }

        .table-responsive {
            border-radius: 0 0 20px 20px;
        }

        .military-table {
            margin: 0;
            font-size: 0.9rem;
        }

        .military-table thead th {
            background: var(--military-light);
            color: var(--military-dark);
            font-weight: 600;
            border: none;
            padding: 1rem 0.75rem;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .military-table tbody td {
            padding: 1rem 0.75rem;
            border-bottom: 1px solid #f1f3f4;
            vertical-align: middle;
        }

        .military-table tbody tr:hover {
            background: var(--military-light);
        }

        .military-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Badges y Estados */
        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-badge.paid {
            background: rgba(40, 167, 69, 0.1);
            color: var(--success-color);
        }

        .status-badge.pending {
            background: rgba(255, 193, 7, 0.1);
            color: var(--warning-color);
        }

        .status-badge.debt {
            background: rgba(220, 53, 69, 0.1);
            color: var(--danger-color);
        }

        .amount-display {
            font-weight: 600;
            font-family: 'Courier New', monospace;
        }

        .amount-positive {
            color: var(--success-color);
        }

        .amount-negative {
            color: var(--danger-color);
        }

        .amount-neutral {
            color: var(--text-dark);
        }

        /* Botones de Acción */
        .action-btn {
            padding: 0.5rem;
            border: none;
            border-radius: 8px;
            font-size: 0.8rem;
            transition: all 0.3s ease;
            margin: 0 0.25rem;
        }

        .action-btn.view {
            background: var(--military-accent);
            color: white;
        }

        .action-btn.view:hover {
            background: var(--military-secondary);
            transform: scale(1.1);
        }

        /* Paginación */
        .pagination-container {
            margin: 2rem 0;
            display: flex;
            justify-content: center;
        }

        .pagination .page-link {
            border: 2px solid var(--border-color);
            color: var(--military-primary);
            padding: 0.75rem 1rem;
            margin: 0 0.25rem;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .pagination .page-link:hover {
            background: var(--military-primary);
            border-color: var(--military-primary);
            color: white;
        }

        .pagination .page-item.active .page-link {
            background: var(--military-primary);
            border-color: var(--military-primary);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .military-title {
                font-size: 2rem;
            }
            
            .controls-section {
                padding: 1.5rem;
            }
            
            .military-table {
                font-size: 0.8rem;
            }
            
            .military-table thead th,
            .military-table tbody td {
                padding: 0.75rem 0.5rem;
            }
        }

        /* Loading Animation */
        .loading {
            display: none;
            text-align: center;
            padding: 3rem;
        }

        .spinner {
            border: 3px solid var(--border-color);
            border-top: 3px solid var(--military-primary);
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
            color: var(--military-accent);
        }
    </style>
</head>
<body>
    <!-- Header Militar -->
    <header class="military-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="military-title">
                        <i class="fas fa-shield-alt me-3"></i>
                        Registro de Aportaciones
                    </h1>
                    <p class="military-subtitle">Sistema de Control Financiero Militar</p>
                    <div class="military-badge">
                        <i class="fas fa-star me-2"></i>
                        Clasificado - Uso Oficial
                    </div>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="d-flex flex-column align-items-lg-end">
                        <div class="text-white-50 small">Última actualización</div>
                        <div class="text-white fw-bold"><?= date('d/m/Y H:i') ?></div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <!-- Estadísticas -->
        <div class="stats-container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-card">
                        <div class="stat-icon primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-value"><?= number_format($estadisticas['total_registros']) ?></div>
                        <div class="stat-label">Personal Registrado</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-card">
                        <div class="stat-icon success">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="stat-value">$<?= number_format($estadisticas['total_pagos_general'], 2) ?></div>
                        <div class="stat-label">Total Pagos</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-card">
                        <div class="stat-icon warning">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="stat-value">$<?= number_format($estadisticas['total_deuda_general'], 2) ?></div>
                        <div class="stat-label">Total Deudas</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-card">
                        <div class="stat-icon gold">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="stat-value">$<?= number_format($estadisticas['promedio_pagos'], 2) ?></div>
                        <div class="stat-label">Promedio Pagos</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controles -->
        <div class="controls-section">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-3 mb-lg-0">
                    <div class="search-container">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" class="search-input" id="searchInput" 
                               placeholder="Buscar por nombre o número de orden..." 
                               value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                    </div>
                </div>
             
            </div>
        </div>

        <!-- Loading -->
        <div class="loading" id="loading">
            <div class="spinner"></div>
            <p>Buscando registros...</p>
        </div>

        <!-- Tabla Principal -->
        <div class="main-table-container">
            <div class="table-header">
                <h3 class="table-title">
                    <i class="fas fa-table me-2"></i>
                    Registro de Aportaciones
                    <?php if (!empty($_GET['search'])): ?>
                        - Resultados para: "<?= htmlspecialchars($_GET['search']) ?>"
                    <?php endif; ?>
                </h3>
                <div class="text-white-50 small">
                    <?= count($registros) ?> de <?= $total_registros ?> registros
                </div>
            </div>
            
            <div class="table-responsive">
                <?php if (empty($registros)): ?>
                    <div class="empty-state">
                        <i class="fas fa-folder-open"></i>
                        <h3>No hay registros disponibles</h3>
                        <p>No se encontraron registros que coincidan con los criterios de búsqueda</p>
                    </div>
                <?php else: ?>
                    <table class="table military-table">
                        <thead>
                            <tr>
                                <th>N/O</th>
                                <th>Apellidos y Nombres</th>
                                <th>Total Pagos</th>
                                <th>Total Deuda</th>
                                <th>Estado</th>
                                <th>Lugar</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($registros as $registro): ?>
                            <tr>
                                <td>
                                    <span class="fw-bold text-military"><?= htmlspecialchars($registro['numero_orden']) ?></span>
                                </td>
                                <td>
                                    <div class="fw-semibold"><?= htmlspecialchars($registro['apellidos_nombres']) ?></div>
                                </td>
                                <td>
                                    <span class="amount-display amount-<?= $registro['total_pagos'] > 0 ? 'positive' : 'neutral' ?>">
                                        $<?= number_format($registro['total_pagos'], 2) ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="amount-display amount-<?= $registro['total_deuda'] > 0 ? 'negative' : 'neutral' ?>">
                                        $<?= number_format($registro['total_deuda'], 2) ?>
                                    </span>
                                </td>
                                <td>
                                    <?php 
                                    $balance = $registro['total_pagos'] - $registro['total_deuda'];
                                    if ($balance > 0): ?>
                                        <span class="status-badge paid">Al Día</span>
                                    <?php elseif ($balance == 0): ?>
                                        <span class="status-badge pending">Equilibrado</span>
                                    <?php else: ?>
                                        <span class="status-badge debt">Deuda</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <small class="text-muted"><?= htmlspecialchars($registro['lugar']) ?></small>
                                </td>
                                <td>
                                    <small class="text-muted"><?= date('d/m/Y', strtotime($registro['fecha'])) ?></small>
                                </td>
                                <td>
                                    <a href="index.php?action=finanzas-public/detalle&id=<?= $registro['id'] ?>" 
                                       class="action-btn view" title="Ver Detalle">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>

        <!-- Paginación -->
        <?php if ($total_pages > 1): ?>
        <div class="pagination-container">
            <nav>
                <ul class="pagination">
                    <?php if ($page > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?action=finanzas-public/index&page=<?= $page - 1 ?><?= !empty($_GET['search']) ? '&search=' . urlencode($_GET['search']) : '' ?>">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                    
                    <?php for ($i = max(1, $page - 2); $i <= min($total_pages, $page + 2); $i++): ?>
                        <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                            <a class="page-link" href="?action=finanzas-public/index&page=<?= $i ?><?= !empty($_GET['search']) ? '&search=' . urlencode($_GET['search']) : '' ?>">
                                <?= $i ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                    
                    <?php if ($page < $total_pages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?action=finanzas-public/index&page=<?= $page + 1 ?><?= !empty($_GET['search']) ? '&search=' . urlencode($_GET['search']) : '' ?>">
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
            
            searchTimeout = setTimeout(() => {
                if (query.length >= 2 || query.length === 0) {
                    const url = new URL(window.location);
                    if (query.length === 0) {
                        url.searchParams.delete('search');
                    } else {
                        url.searchParams.set('search', query);
                    }
                    url.searchParams.delete('page'); // Reset page
                    window.location.href = url.toString();
                }
            }, 500);
        });

        // Búsqueda con Enter
        document.getElementById('searchInput').addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                clearTimeout(searchTimeout);
                const query = this.value.trim();
                const url = new URL(window.location);
                if (query.length === 0) {
                    url.searchParams.delete('search');
                } else {
                    url.searchParams.set('search', query);
                }
                url.searchParams.delete('page');
                window.location.href = url.toString();
            }
        });

        // Animaciones de entrada
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.stat-card');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    card.style.transition = 'all 0.5s ease';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 100);
                }, index * 100);
            });
        });
    </script>
</body>
</html>
