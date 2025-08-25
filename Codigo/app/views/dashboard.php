<!--  -->
<?php 
require_once __DIR__ . '/../config/config.php'; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <!-- Llamando los estilos con la BASE_URL -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/dashboard.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/estilos.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Menú</h2>
        <div class="menu-item">
            <a href="#">Generales</a>
             <!-- Submenú siempre visible -->
            <div class="submenu" style="display:block">
                <a href="index.php?module=usuarios">Usuarios</a>
                <a href="index.php?module=clientes">Clientes</a>
                <a href="index.php?module=tiendas">Tiendas</a>
            </div>
        </div>
        <a href="index.php?module=cotizacion">Cotización</a>
        <a href="index.php?module=facturacion">Facturación</a>
    </div>

    <!-- Contenido principal -->
    <div class="main-content">
        <header>
            <h1>Bienvenido, <?= htmlspecialchars($_SESSION['usuario']); ?></h1>
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

            <section style="margin-top:30px;">
                <h3>Progreso de Ventas</h3>
                <canvas id="graficaVentas" width="400" height="200"></canvas>
            </section>
        </main>
    </div>
</body>
</html>

