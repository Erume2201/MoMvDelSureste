<?php
// Muestra todos los campos del cliente en modo solo lectura.
include __DIR__ . '../../../controllers/php/actionClientes/clientes_view_action.php';
require_once __DIR__ . '../../../config/config.php';
require_once __DIR__ . '../../../config/CRUD.php';
include __DIR__ . '../../layout/sidebar.php'; // MENÚ LATERAL
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de cliente - <?= e($cliente['nombre_cliente']) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Icono en la pestaña -->
    <link rel="icon" href="<?php echo BASE_URL; ?>public/img/favicon.ico" type="image/x-icon">
    <!-- Iconos de Boxicon -->
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
    <!-- Iconos de FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Llamando los estilos con la BASE_URL -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/clientes/clientes_view.css">
</head>
<body class="main-clientes-view">
    <div class="main-content">
        <div class="container">
            <div class="titulo-view">
                <a href="<?php echo BASE_URL; ?>index.php?module=clientes" class="btn-flecha" title="Regresar">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <h1>DETALLE DE CLIENTE <?= e($cliente['nombre_cliente']) ?></h1>
                <span class="espaciador"></span> <!-- Truco para balancear el flex -->
            </div>

            <div class="view-section">
                <h3>Información</h3>
                <div>
                    <table>
                        <tbody>
                            <tr><th>Nombre / Razón social</th><td><?= e($cliente['nombre_cliente']) ?></td></tr>
                            <tr><th>RFC</th><td><?= e($cliente['rfc']) ?></td></tr>
                            <tr><th>Domicilio fiscal</th><td><?= e($cliente['domicilio_fiscal']) ?></td></tr>
                            <tr><th>Colonia</th><td><?= e($cliente['colonia']) ?></td></tr>
                            <tr><th>Ciudad</th><td><?= e($cliente['ciudad']) ?></td></tr>
                            <tr><th>Estado</th><td><?= e($cliente['estado']) ?></td></tr>
                            <tr><th>Código postal</th><td><?= e($cliente['codigo_postal']) ?></td></tr>
                            <tr><th>Tipo localidad</th><td><?= e($cliente['tipo_localidad']) ?></td></tr>
                            <tr><th>Nombre apoderado</th><td><?= e($cliente['nombre_apoderado']) ?></td></tr>
                            <tr><th>Forma de pago</th><td><?= e($cliente['forma_pago']) ?></td></tr>
                            <tr><th>Método de pago</th><td><?= e($cliente['metodo_pago']) ?></td></tr>
                            <tr><th>Uso CFDI</th><td><?= e($cliente['uso_cfdi']) ?></td></tr>
                            <tr><th>Régimen fiscal</th><td><?= e($cliente['regimen_fiscal']) ?></td></tr>
                            <tr><th>Contacto cuentas</th><td><?= e($cliente['contacto_cuentas']) ?></td></tr>
                            <tr><th>Email</th><td><?= e($cliente['email']) ?></td></tr>
                            <tr><th>Teléfono</th><td><?= e($cliente['telefono']) ?></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>

        <!-- Botón de imprimir -->
        <div class="form-actions">
            <button type="submit" class="btn-imprimir"><i class="fa-solid fa-file-pdf"></i>Imprimir</button>
        </div>
    </div>

    <!-- ===SCRIPTS=== -->
    <script src="<?php echo BASE_URL; ?>public/js/sidebar.js"></script>
    <!-- Librería de SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Script de los mensajes de alerta -->
    <script src="<?php echo BASE_URL; ?>public/js/alerts.js"></script>
    <!-- Script que controla el buscador -->
    <script src="<?php echo BASE_URL; ?>public/js/clientes/clientes_view.js"></script>
</body>
</html>