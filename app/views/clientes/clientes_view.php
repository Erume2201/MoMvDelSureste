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
                <h1>DETALLE DE CLIENTE: <?= e($cliente['nombre_cliente']) ?></h1>
                <span class="espaciador"></span> <!-- Truco para balancear el flex -->
            </div>

            <div class="view-section">
                <h3><i class="fa-solid fa-address-card icon-title"></i> Datos de identificación y contacto</h3>
                <div class="data-grid grid-2-cols">
                    <div class="data-item">
                        <span class="label">Nombre / Razón social</span>
                      <!--  <input type="text" name="nombre_cliente" value="<?= e($cliente['nombre_cliente']) ?>" />-->
                        <p class="value"><?= e($cliente['nombre_cliente']) ?></p>
                    </div>
                    <div class="data-item">
                        <span class="label">RFC</span>
                        <p class="value"><?= e($cliente['rfc']) ?></p>
                    </div>
                    <div class="data-item">
                        <span class="label">Nombre apoderado</span>
                        <p class="value"><?= e($cliente['nombre_apoderado']) ?></p>
                    </div>
                    <div class="data-item">
                        <span class="label">Contacto cuentas</span>
                        <p class="value"><?= e($cliente['contacto_cuentas']) ?></p>
                    </div>
                    <div class="data-item">
                        <span class="label">Email</span>
                        <p class="value"><?= e($cliente['email']) ?></p>
                    </div>
                    <div class="data-item">
                        <span class="label">Teléfono</span>
                        <p class="value"><?= e($cliente['telefono']) ?></p>
                    </div>
                </div>
            </div>

            <div class="view-section">
                <h3><i class="fa-solid fa-map-marker-alt icon-title"></i> Ubicación</h3>
                <div class="data-grid grid-2-cols">
                    <div class="data-item">
                        <span class="label">Domicilio fiscal</span>
                        <p class="value"><?= e($cliente['domicilio_fiscal']) ?></p>
                    </div>
                    <div class="data-item">
                        <span class="label">Colonia</span>
                        <p class="value"><?= e($cliente['colonia']) ?></p>
                    </div>
                    <div class="data-item">
                        <span class="label">Ciudad</span>
                        <p class="value"><?= e($cliente['ciudad']) ?></p>
                    </div>
                    <div class="data-item">
                        <span class="label">Estado</span>
                        <p class="value"><?= e($cliente['estado']) ?></p>
                    </div>
                    <div class="data-item">
                        <span class="label">Código postal</span>
                        <p class="value"><?= e($cliente['codigo_postal']) ?></p>
                    </div>
                    <div class="data-item">
                        <span class="label">Tipo localidad</span>
                        <p class="value"><?= e($cliente['tipo_localidad']) ?></p>
                    </div>
                </div>
            </div>

            <div class="view-section">
                <h3><i class="fa-solid fa-money-bill-wave icon-title"></i> Datos Fiscales y de Pago</h3>
                <div class="data-grid grid-2-cols">
                    <div class="data-item">
                        <span class="label">Forma de pago</span>
                        <p class="value">
                            <?= e(FORMA_PAGO_MAP[$cliente['forma_pago']] ?? $cliente['forma_pago']) ?>
                        </p>
                    </div>
                    <div class="data-item">
                        <span class="label">Método de pago</span>
                        <p class="value">
                            <?= e(METODO_PAGO_MAP[$cliente['metodo_pago']] ?? $cliente['metodo_pago']) ?>
                        </p>
                    </div>
                    <div class="data-item">
                        <span class="label">Uso CFDI</span>
                        <p class="value">
                            <?= e(USO_CFDI_MAP[$cliente['uso_cfdi']] ?? $cliente['uso_cfdi']) ?>
                        </p>
                    </div>
                    <div class="data-item">
                        <span class="label">Régimen fiscal</span>
                        <p class="value">
                            <?= e(REGIMEN_FISCAL_MAP[$cliente['regimen_fiscal']] ?? $cliente['regimen_fiscal']) ?>
                        </p>
                    </div>
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
</body>
</html>