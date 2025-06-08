<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle - <?= htmlspecialchars($registro['apellidos_nombres']) ?> - Sistema Militar</title>
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

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--military-light) 0%, #f8f9fa 100%);
            min-height: 100vh;
        }

        /* Navigation */
        .navbar-military {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--military-primary) !important;
            font-size: 1.5rem;
        }

        .back-btn {
            background: var(--military-light);
            border: 1px solid var(--border-color);
            color: var(--military-primary);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .back-btn:hover {
            background: var(--military-primary);
            color: white;
            border-color: var(--military-primary);
        }

        /* Header del Registro */
        .record-header {
            background: linear-gradient(135deg, var(--military-primary) 0%, var(--military-secondary) 100%);
            color: white;
            padding: 3rem 0;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
        }

        .record-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="stars" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23stars)"/></svg>');
            opacity: 0.3;
        }

        .record-header .container {
            position: relative;
            z-index: 2;
        }

        .record-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .record-meta {
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

        /* Cards de Información */
        .info-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 1px solid var(--border-color);
        }

        .info-card h3 {
            color: var(--military-primary);
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.3rem;
        }

        /* Tabla de Pagos Mensuales */
        .monthly-payments {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .month-card {
            background: var(--military-light);
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .month-card:hover {
            transform: translateY(-3px);
            border-color: var(--military-accent);
            box-shadow: 0 5px 15px rgba(26, 95, 63, 0.2);
        }

        .month-name {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--military-dark);
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .month-amount {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--military-primary);
            font-family: 'Courier New', monospace;
        }

        .month-amount.zero {
            color: var(--text-light);
        }

        .month-amount.positive {
            color: var(--success-color);
        }

        /* Tabla de Deudas */
        .debt-table {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .debt-table table {
            margin: 0;
        }

        .debt-table thead th {
            background: var(--military-primary);
            color: white;
            font-weight: 600;
            border: none;
            padding: 1rem;
            font-size: 0.9rem;
        }

        .debt-table tbody td {
            padding: 1rem;
            border-bottom: 1px solid #f1f3f4;
            vertical-align: middle;
        }

        .debt-table tbody tr:hover {
            background: var(--military-light);
        }

        .debt-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Resumen Financiero */
        .financial-summary {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .summary-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .summary-card.total-payments {
            border-color: var(--success-color);
        }

        .summary-card.total-debt {
            border-color: var(--danger-color);
        }

        .summary-card.balance {
            border-color: var(--gold-accent);
        }

        .summary-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 auto 1rem;
        }

        .summary-icon.payments {
            background: rgba(40, 167, 69, 0.1);
            color: var(--success-color);
        }

        .summary-icon.debt {
            background: rgba(220, 53, 69, 0.1);
            color: var(--danger-color);
        }

        .summary-icon.balance {
            background: rgba(212, 175, 55, 0.1);
            color: var(--gold-accent);
        }

        .summary-amount {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-family: 'Courier New', monospace;
        }

        .summary-amount.positive {
            color: var(--success-color);
        }

        .summary-amount.negative {
            color: var(--danger-color);
        }

        .summary-amount.neutral {
            color: var(--gold-accent);
        }

        .summary-label {
            color: var(--text-light);
            font-size: 0.9rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Botones de Acción */
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

        /* Responsive */
        @media (max-width: 768px) {
            .record-title {
                font-size: 2rem;
            }
            
            .record-meta {
                gap: 1rem;
            }
            
            .monthly-payments {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            }
            
            .financial-summary {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: center;
            }
        }

        /* Print Styles */
        @media print {
            .navbar-military,
            .action-buttons {
                display: none !important;
            }
            
            .record-header {
                background: var(--military-primary) !important;
                -webkit-print-color-adjust: exact;
            }
            
            .info-card {
                box-shadow: none;
                border: 1px solid #ddd;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-military">
        <div class="container">
            <a class="navbar-brand" href="index.php?action=finanzas-public/index">
                <i class="fas fa-shield-alt me-2"></i>Sistema Militar
            </a>
            <a href="index.php?action=finanzas-public/index" class="back-btn">
                <i class="fas fa-arrow-left me-2"></i>Volver al Registro
            </a>
        </div>
    </nav>

    <!-- Header del Registro -->
    <header class="record-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <h1 class="record-title">
                        <i class="fas fa-user-tie me-3"></i>
                        <?= htmlspecialchars($registro['apellidos_nombres']) ?>
                    </h1>
                    
                    <div class="record-meta">
                        <div class="meta-item">
                            <i class="fas fa-id-badge"></i>
                            <span>N/O: <?= htmlspecialchars($registro['numero_orden']) ?></span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span><?= htmlspecialchars($registro['lugar']) ?></span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-calendar"></i>
                            <span><?= date('d \d\e F \d\e Y', strtotime($registro['fecha'])) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Pagos Mensuales -->
                <div class="info-card">
                    <h3><i class="fas fa-calendar-alt"></i>Pagos Mensuales</h3>
                    <div class="monthly-payments">
                        <?php 
                        $meses = [
                            'ene' => 'Enero', 'feb' => 'Febrero', 'mar' => 'Marzo', 'abr' => 'Abril',
                            'may' => 'Mayo', 'jun' => 'Junio', 'jul' => 'Julio', 'ago' => 'Agosto',
                            'sep' => 'Septiembre', 'oct' => 'Octubre', 'nov' => 'Noviembre', 'dic' => 'Diciembre'
                        ];
                        
                        foreach ($meses as $key => $nombre): 
                            $amount = floatval($registro[$key]);
                        ?>
                            <div class="month-card">
                                <div class="month-name"><?= $nombre ?></div>
                                <div class="month-amount <?= $amount > 0 ? 'positive' : 'zero' ?>">
                                    $<?= number_format($amount, 2) ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Deudas por Año -->
                <div class="info-card">
                    <h3><i class="fas fa-exclamation-triangle"></i>Registro de Deudas</h3>
                    <div class="debt-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Año</th>
                                    <th>Monto</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $deudas = [
                                    '2025' => $registro['deuda_2025'],
                                    '2024' => $registro['deuda_2024'],
                                    '2023' => $registro['deuda_2023'],
                                    '2022' => $registro['deuda_2022'],
                                    '2021' => $registro['deuda_2021'],
                                    'Otras' => $registro['otros_deudas']
                                ];
                                
                                foreach ($deudas as $año => $monto): 
                                    $amount = floatval($monto);
                                ?>
                                    <tr>
                                        <td><strong><?= $año ?></strong></td>
                                        <td>
                                            <span class="amount-display <?= $amount > 0 ? 'amount-negative' : 'amount-neutral' ?>">
                                                $<?= number_format($amount, 2) ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?php if ($amount > 0): ?>
                                                <span class="status-badge debt">Pendiente</span>
                                            <?php else: ?>
                                                <span class="status-badge paid">Saldado</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Sidebar con Resumen -->
            <div class="col-lg-4">
                <!-- Resumen Financiero -->
                <div class="info-card">
                    <h3><i class="fas fa-chart-pie"></i>Resumen Financiero</h3>
                    <div class="financial-summary">
                        <div class="summary-card total-payments">
                            <div class="summary-icon payments">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="summary-amount positive">
                                $<?= number_format($registro['total_pagos'], 2) ?>
                            </div>
                            <div class="summary-label">Total Pagos</div>
                        </div>
                        
                        <div class="summary-card total-debt">
                            <div class="summary-icon debt">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="summary-amount negative">
                                $<?= number_format($registro['total_deuda'], 2) ?>
                            </div>
                            <div class="summary-label">Total Deuda</div>
                        </div>
                        
                        <div class="summary-card balance">
                            <div class="summary-icon balance">
                                <i class="fas fa-balance-scale"></i>
                            </div>
                            <?php 
                            $balance = $registro['total_pagos'] - $registro['total_deuda'];
                            $balance_class = $balance > 0 ? 'positive' : ($balance < 0 ? 'negative' : 'neutral');
                            ?>
                            <div class="summary-amount <?= $balance_class ?>">
                                $<?= number_format($balance, 2) ?>
                            </div>
                            <div class="summary-label">Balance</div>
                        </div>
                    </div>
                </div>

                <!-- Información Adicional -->
                <div class="info-card">
                    <h3><i class="fas fa-info-circle"></i>Información del Registro</h3>
                    <table class="table table-borderless">
                        <tr>
                            <td><strong>ID del Registro:</strong></td>
                            <td><?= htmlspecialchars($registro['id']) ?></td>
                        </tr>
                        <tr>
                            <td><strong>Número de Orden:</strong></td>
                            <td><?= htmlspecialchars($registro['numero_orden']) ?></td>
                        </tr>
                        <tr>
                            <td><strong>Lugar:</strong></td>
                            <td><?= htmlspecialchars($registro['lugar']) ?></td>
                        </tr>
                        <tr>
                            <td><strong>Fecha de Registro:</strong></td>
                            <td><?= date('d/m/Y', strtotime($registro['fecha'])) ?></td>
                        </tr>
                        <tr>
                            <td><strong>Estado General:</strong></td>
                            <td>
                                <?php if ($balance > 0): ?>
                                    <span class="status-badge paid">Al Día</span>
                                <?php elseif ($balance == 0): ?>
                                    <span class="status-badge pending">Equilibrado</span>
                                <?php else: ?>
                                    <span class="status-badge debt">Con Deuda</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- Acciones -->
                <div class="action-buttons">
              
                    <a href="index.php?action=finanzas-public/index" class="btn-military gold">
                        <i class="fas fa-list"></i>
                        Ver Todos
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animaciones de entrada
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.info-card, .summary-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.5s ease';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });

            // Animación para las tarjetas de meses
            const monthCards = document.querySelectorAll('.month-card');
            monthCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'scale(0.9)';
                card.style.transition = 'all 0.3s ease';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'scale(1)';
                }, 500 + (index * 50));
            });
        });

        // Smooth scroll para enlaces internos
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
    </script>
</body>
</html>
