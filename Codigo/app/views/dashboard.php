<!-- Se incluyen archivos php -->
<?php 
require_once __DIR__ . '/../config/config.php'; 
include __DIR__ . '../layout/sidebar.php'; // Esto solo carga el sidebar
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <!--icono en la pestaña-->
    <link rel="icon" href="public/img/favicon.ico" type="image/x-icon">
    <!-- Llamando los estilos con la BASE_URL -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/dashboard.css">
    <!-- <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/estilos.css"> -->
</head>
<body>
   <div class="main-content">
        <header>
            <h1>Dashboard, Bienvenido <?= htmlspecialchars($_SESSION['usuario']); ?></h1>
            <a href="index.php?module=cerrar_sesion">Cerrar Sesión</a>
        </header>

        <main>
            <section>
                <div class="card">
                    <h3>Total Ventas del Mes</h3>
                    <p>$12,000</p>
                </div>
                <div class="card">
                    <h3>Ventas vs Objetivo</h3>
                    <p>$12,000 / $15,000</p>
                </div>
            </section>

            <section class="ventas-progreso">
                <h3>Progreso de Ventas</h3>
                <canvas id="graficaVentas" width="400" height="200"></canvas>
            </section>
        </main>
    </div>
</body>
</html>

