
<!-- Botón hamburguesa (visible solo en pantallas pequeñas) -->
<button id="sidebar-toggle" class="sidebar-toggle" aria-label="Abrir menú">
    <i class='bx bx-menu'></i>
</button>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Icono y encabezado -->
    <div class="sidebar-header">
        <img src="<?php echo BASE_URL; ?>public/img/logo_mv_negro_single.png" alt="Logo MO. MV" class="sidebar-logo">
        <h2 class="sidebar-title">MO. MV DEL SURESTE</h2>
    </div>


    <!-- Dashboard -->
    <a href="index.php?module=" class="secciones">
        <i class='bx bxs-dashboard'></i>
        Dashboard
    </a>

    <!-- Menú Generales -->
    <div class="menu-item">
        <a href="#" class="secciones submenu-toggle">
            <i class='bx bxs-cog'></i>
            Generales
            <i class='bx bx-chevron-down arrow'></i>
        </a>
        <div class="submenu">
            <a href="index.php?module=usuarios">
                <i class='bx bxs-user'></i>
                Usuarios
            </a>
            <a href="index.php?module=clientes">
                <i class='bx bxs-group'></i>
                Clientes
            </a>
            <a href="index.php?module=tiendas">
                <i class='bx bxs-store'></i>
                Tiendas
            </a>
        </div>
    </div>

    <!-- Menú Cotizaciones -->
    <div class="menu-item">
        <a href="#" class="secciones submenu-toggle">
            <i class='bx bxs-briefcase'></i>
            Cotizaciones
            <i class='bx bx-chevron-down arrow'></i>
        </a>
        <div class="submenu">
            <a href="index.php?module=cotizar">
                <i class='bx bxs-edit-alt'></i>
                Cotizar
            </a>
            <a href="index.php?module=ver_cotizaciones">
                <i class='bx bxs-file'></i>
                Visualizar
            </a>
            <a href="index.php?module=calendario">
                <i class='bx bxs-calendar'></i>
                Calendario
            </a>
        </div>
    </div>

    <!-- Facturación -->
    <div class="menu-item">
        <a href="index.php?module=facturacion" class="secciones">
            <i class='bx bxs-credit-card'></i>
            Facturación
        </a>
    </div>

    <!-- Cerrar Sesión -->
    <div class="logout-item">
        <a href="index.php?module=cerrar_sesion" class="logout-link">
            <i class='bx bx-log-out'></i>
            <span>Cerrar sesión</span>
        </a>
    </div>
</div>
