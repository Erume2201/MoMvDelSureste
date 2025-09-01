
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
    <a href="index.php?module=" class="secciones" data-module="">
        <i class='bx bxs-dashboard'></i>
        Dashboard
    </a>

    <!-- Menú Generales -->
    <div class="menu-item" data-group="generales">
        <a href="javascript:void(0);" class="secciones submenu-toggle" data-group="generales-toggle" aria-expanded="false">
            <i class='bx bxs-cog'></i>
            Generales
            <i class='bx bx-chevron-down arrow'></i>
        </a>
        <div class="submenu" id="submenu-generales">
            <a href="index.php?module=usuarios" class="submenu-link" data-module="usuarios">
                <i class='bx bxs-user'></i>
                Usuarios
            </a>
            <a href="index.php?module=clientes" class="submenu-link" data-module="clientes">
                <i class='bx bxs-group'></i>
                Clientes
            </a>
            <a href="index.php?module=tiendas" class="submenu-link" data-module="tiendas">
                <i class='bx bxs-store'></i>
                Tiendas
            </a>
        </div>
    </div>

    <!-- Menú Cotizaciones -->
    <div class="menu-item" data-group="cotizaciones">
        <a href="javascript:void(0);" class="secciones submenu-toggle" data-group="cotizaciones-toggle" aria-expanded="false">
            <i class='bx bxs-briefcase'></i>
            Cotizaciones
            <i class='bx bx-chevron-down arrow'></i>
        </a>
        <div class="submenu" id="submenu-cotizaciones">
            <a href="index.php?module=cotizar" class="submenu-link" data-module="cotizar">
                <i class='bx bxs-edit-alt'></i>
                Cotizar
            </a>
            <a href="index.php?module=ver_cotizaciones" class="submenu-link" data-module="ver_cotizaciones">
                <i class='bx bxs-file'></i>
                Visualizar
            </a>
            <a href="index.php?module=calendario" class="submenu-link" data-module="calendario">
                <i class='bx bxs-calendar'></i>
                Calendario
            </a>
        </div>
    </div>

    <!-- Facturación -->
    <div class="menu-item" data-group="facturacion">
        <a href="index.php?module=facturacion" class="secciones" data-module="facturacion">
            <i class='bx bxs-credit-card'></i>
            Facturación
        </a>
    </div>

    <!-- Cerrar Sesión -->
    <div class="logout-item">
        <a href="#" id="btn-cerrar-sesion" class="logout-link">
            <i class='bx bx-log-out'></i>
            <span>Cerrar sesión</span>
        </a>
    </div>
</div>