<?php 
require_once __DIR__ . '/../config/config.php'; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <!--icono en la pestaña-->
    <link rel="icon" href="<?php echo BASE_URL; ?>public/img/favicon.ico" type="image/x-icon">
    <!-- Llamando los estilos con la BASE_URL -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/estilos.css">
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
        <h1>Cotizaciones realizadas</h1>
        <a href="index.php?module=cerrar_sesion">Cerrar Sesión</a>
    </header>
<main>
    <section class="cards-container">
        <!-- Generamos hasta 20 tarjetas -->
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <div class="card">
                <img src="<?php echo BASE_URL; ?>public/img/LOGO_MV_transparente.png" alt="Logo MV" 
                 style="width:200px; height:auto; margin-bottom:5px;">
                <button class="btn-ver-cotizacion">
                    Ver Cotización-<?php echo str_pad($i, 3, '0', STR_PAD_LEFT); ?>
                </button>
                
            </div>
        <?php endfor; ?>
    </section>
</main>
    </div>
</body>
</html>