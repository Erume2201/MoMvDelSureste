<!-- Se incluyen archivos php -->
<?php
require_once __DIR__ . '/../../config/config.php';
include __DIR__ . '../../layout/sidebar.php'; // MENÚ LATERAL
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/estilos.css">
    <!-- Iconos de Boxicon -->
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="main-content">
        <div class="dashboard-container">
            <header class="dashboard-header">
                <div class="header-profile dropdown-menu-container">
                    <i class='bx bxs-user-circle' id="profile-icon"></i>
                    <ul class="dropdown-menu">
                        <li><a href="?module=perfil">Perfil</a></li>
                        <li><a href="?module=cerrar_mes">Cerrar Mes</a></li>
                    </ul>
                </div>
                <div class="header-nav">
                    <h1>Dashboard, Bienvenido: <?= htmlspecialchars($_SESSION['nombre_usuario']); ?></h1>
                </div>
            </header>

            <div class="main-grid">
                <div class="card metric-card traffic">
                    <div class="card-title">TOTAL DE COTIZACIONES</div>
                    <div class="metric-value">325,456</div>
                    <div class="metric-trend">
                        <span class="trend-number positive">+5%</span>
                        <span class="trend-text">DESDE EL MES PASADO</span>
                        <i class='bx bx-trending-up trend-icon'></i>
                    </div>
                </div>
                <div class="card metric-card users">
                    <div class="card-title">TOTAL DE COTIZACIONES PAGADAS</div>
                    <div class="metric-value">3,006</div>
                    <div class="metric-trend">
                        <span class="trend-number negative">-4.54%</span>
                        <span class="trend-text"> PERDIDA / GANANCIA</span>
                        <i class='bx bx-trending-down trend-icon'></i>
                    </div>
                </div>
                <div class="card metric-card performance">
                    <div class="card-title">AVANCE EN COTIZACIONES REALIZADAS / PAGADAS</div>
                    <div class="metric-value">60%</div>
                    <div class="metric-trend">
                        <span class="trend-number positive">+2.54%</span>
                        <span class="trend-text"> ESTE MES</span>
                        <i class='bx bx-trending-up trend-icon'></i>
                    </div>
                </div>
                <div class="card metric-card sales">
                    <div class="card-title">GENERADO EN VENTAS</div>
                    <div class="metric-value">$852</div>
                    <div class="metric-trend">
                        <span class="trend-number positive">+8.54%</span>
                        <span class="trend-text">ESTE MES</span>
                        <i class='bx bx-trending-up trend-icon'></i>
                    </div>
                </div>

                <div id="health-card" class="card nav-card health">
                    <span>HEALTH CARE</span>
                    <i class='bx bxs-heart'></i>
                </div>

                <div class="card chart-card line-chart">
                    <div class="card-title">LINEA DE VENTAS DE ESTE AÑO</div>
                    <div class="chart-container">
                        <canvas id="percentageChart"></canvas>
                    </div>
                </div>

                <div class="card update-card">
                    <div class="update-icon">
                        <i class='bx bxs-download'></i>
                    </div>
                    <div class="update-text">UPDATES</div>
                </div>

                <div class="card chart-card bar-chart">
                    <div class="card-title">TOTAL DE COTIZACIONES PAGADAS</div>
                    <div class="chart-container">
                        <canvas id="ordersChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo BASE_URL; ?>public/js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/dashboard.js"></script>
    <!-- Librería de SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Script de los mensajes de alerta -->
    <script src="public/js/alerts.js"></script>
</body>

</html>