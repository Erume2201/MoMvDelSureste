
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
    <a href="<?php echo BASE_URL; ?>index.php?module=" class="secciones" data-module="">
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
            <a href="<?php echo BASE_URL; ?>index.php?module=usuarios" class="submenu-link" data-module="usuarios">
                <i class='bx bxs-user'></i>
                Usuarios
            </a>
            <a href="<?php echo BASE_URL; ?>index.php?module=clientes" class="submenu-link" data-module="clientes">
                <i class='bx bxs-group'></i>
                Clientes
            </a>
            <a href="<?php echo BASE_URL; ?>index.php?module=tiendas" class="submenu-link" data-module="tiendas">
                <i class='bx bxs-store'></i>
                Tiendas
            </a>
            <a href="<?php echo BASE_URL; ?>index.php?module=operadores" class="submenu-link" data-module="Operador">
                <i class='bx  bx-steering-wheel'></i> 
                Operadores
            </a>
            <a href="<?php echo BASE_URL; ?>index.php?module=unidades" class="submenu-link" data-module="Unidades">
                <i class='bx  bx-car'></i> 
                Unidades
            </a>
        </div>
    </div>

    <!-- Menú Contratos -->
    <div class="menu-item" data-group="Contratos">
        <a href="javascript:void(0);" class="secciones submenu-toggle" data-group="Contratos-toggle" aria-expanded="false">
            <i class='bx  bx-pencil-draw'></i> 
            Contratos
            <i class='bx bx-chevron-down arrow'></i>
        </a>
        <div class="submenu" id="submenu-Contratos">
            <a href="<?php echo BASE_URL; ?>index.php?module=contratos" class="submenu-link" data-module="cotizar">
                <i class='bx  bx-file-plus'></i> 
                Generar contrato
            </a>
            <a href="<?php echo BASE_URL; ?>index.php?module=contratos_ver" class="submenu-link" data-module="ver_Contratos">
                <i class='bx  bx-file-detail'></i> 
                Visualizar contratos
            </a>
            
        </div>
    </div>

    <!-- Menú Viajes -->
    <div class="menu-item" data-group="Viajes">
        <a href="javascript:void(0);" class="secciones submenu-toggle" data-group="Viajes-toggle" aria-expanded="false">
            <i class='bx  bx-van'></i> 
            Viajes
            <i class='bx bx-chevron-down arrow'></i>
        </a>
        <div class="submenu" id="submenu-Viajes">
            <a href="<?php echo BASE_URL; ?>index.php?module=calendario" class="submenu-link" data-module="calendario">
                <i class='bx  bx-calendar-alt'></i> 
                Calendario de recolección
            </a>
            <a href="<?php echo BASE_URL; ?>index.php?module=generarManifiestos" class="submenu-link" data-module="generarManifiesto">
                <i class='bx  bx-calendar-plus'></i> 
                Generar Manifiesto
            </a>
            
        </div>
    </div>

    <!-- Facturación
    <div class="menu-item" data-group="facturacion">
        <a href="<?php echo BASE_URL; ?>index.php?module=facturacion" class="secciones" data-module="facturacion">
            <i class='bx bxs-credit-card'></i>
            Facturación
        </a>
    </div> -->

    <!-- Cerrar Sesión -->
    <div class="logout-item">
        <a href="#" id="btn-cerrar-sesion" class="logout-link">
            <i class="bx bx-arrow-out-left-square-half "></i>
            <span>Cerrar sesión</span>
        </a>
    </div>
</div>

<script>const BASE_URL = "<?php echo BASE_URL; ?>";</script>
