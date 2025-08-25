<!--  -->
<?php 
require_once __DIR__ . '/../config/config.php'; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <!--icono en la pestaña-->
    <link rel="icon" href="public/img/favicon.ico" type="image/x-icon">
    <!-- Llamando los estilos con la BASE_URL -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/dashboard.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/estilos.css">
</head>
<body>
    <!-- Sidebar -->
  <div class="sidebar">
    <h2>Menú</h2>
    <a href="index.php?module=">Dashboard</a>
    <!-- Menu Generales -->
    <div class="menu-item">
        <a href="#">Generales</a>
        <div class="submenu" style="display:block">
            <a href="index.php?module=usuarios">&#x1F464; Usuarios</a> <!-- 👤 -->
            <a href="index.php?module=clientes">&#x1F465; Clientes</a> <!-- 👥 -->
            <a href="index.php?module=tiendas">&#x1F3EA; Tiendas</a> <!-- 🏪 -->
        </div>
    </div>

    <!-- Menu Cotizaciones -->
    <div class="menu-item">
        <a href="#">Cotizaciones</a>
        <div class="submenu" style="display:block">
            <a href="index.php?module=cotizar">&#x270F;&#xFE0F; Cotizar</a> <!-- ✏️ -->
            <a href="index.php?module=ver_cotizaciones">&#x1F4C3; Ver cotizaciones</a> <!-- 📃 -->
            <a href="index.php?module=calendario">&#x1F4C5; Calendario de Cotizaciones</a> <!-- 📅 -->
        </div>
    </div>

    <a href="index.php?module=facturacion">&#x1F4B3; Facturación</a> <!-- 💳 -->
</div>


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

            <section style="margin-top:30px;">
                <h3>Progreso de Ventas</h3>
                <canvas id="graficaVentas" width="400" height="200"></canvas>
            </section>
        </main>
    </div>
</body>
</html>

