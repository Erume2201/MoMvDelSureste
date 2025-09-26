<?php
// Muestra todos los campos de la tienda en modo solo lectura.
include __DIR__ . '../../../controllers/php/actionTiendas/tiendas_view_action.php';
require_once __DIR__ . '../../../config/config.php';
require_once __DIR__ . '../../../config/CRUD.php';
include __DIR__ . '../../layout/sidebar.php'; // MENÚ LATERAL
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de tienda - <?= e($tienda['nombre_tienda']) ?></title>
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
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/tiendas/tiendas_view.css">
</head>
<body class="main-tiendas-view">
    <div class="main-content">
        <div class="container">
            <div class="titulo-view">
                <a href="<?php echo BASE_URL; ?>index.php?module=tiendas" class="btn-flecha" title="Regresar">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <h1>DETALLE DE TIENDA: <?= e($tienda['nombre_tienda']) ?></h1>
                <span class="espaciador"></span> <!-- Truco para balancear el flex -->
            </div>

            <!-- Datos de identificación y contacto -->
            <div class="view-section">
                <h3><i class="fa-solid fa-store icon-title"></i> Datos de la Tienda</h3>
                <div class="data-grid grid-2-cols">
                    <div class="data-item">
                        <span class="label">Nombre o razón social</span>
                        <p class="value"><?= e($tienda['nombre_tienda']) ?></p>
                    </div>
                    <div class="data-item">
                        <span class="label">Cliente al que pertenece</span>
                        <p class="value"><?= e($tienda['nombre_cliente'] ?? $tienda['id_cliente']) ?></p>
                    </div>
                    <div class="data-item">
                        <span class="label">Número de registro ambiental</span>
                        <p class="value"><?= e($tienda['numero_ambiental']) ?></p>
                    </div>
                    <div class="data-item">
                        <span class="label">Horario de trabajo</span>
                        <p class="value"><?= e($tienda['horario_trabajo']) ?></p>
                    </div>
                </div>
            </div>

            <!-- Datos de Ubicación Geográfica -->
            <div class="view-section">
                <h3><i class="fa-solid fa-map-marked-alt icon-title"></i> Ubicación</h3>
                <div class="data-grid grid-2-cols">
                    <div class="data-item">
                        <span class="label">Dirección</span>
                        <p class="value"><?= e($tienda['direccion']) ?></p>
                    </div>
                    <div class="data-item">
                        <span class="label">Colonia</span>
                        <p class="value"><?= e($tienda['colonia']) ?></p>
                    </div>
                    <div class="data-item">
                        <span class="label">Código postal</span>
                        <p class="value"><?= e($tienda['cp_tienda']) ?></p>
                    </div>
                    <div class="data-item">
                        <span class="label">Ciudad</span>
                        <p class="value"><?= e($tienda['ciudad']) ?></p>
                    </div>
                    <div class="data-item">
                        <span class="label">Estado</span>
                        <p class="value"><?= e($tienda['estado']) ?></p>
                    </div>
                </div>
            </div>            

            <!-- Logística y Referencias de recolección -->
            <div class="view-section">
                <h3><i class="fa-solid fa-people-carry-box icon-title"></i> Contacto y Logística</h3>
                <div class="data-grid grid-2-cols">
                    <div class="data-item">
                        <span class="label">Nombre responsable</span>
                        <p class="value"><?= e($tienda['nombre_responsable']) ?></p>
                    </div>
                    <div class="data-item">
                        <span class="label">Teléfono responsable</span>
                        <p class="value"><?= e($tienda['telefono_responsable']) ?></p>
                    </div>
                </div>
                
                <div class="data-grid grid-1-col">
                    <div class="data-item">
                        <span class="label">Detalles de referencia para recolección</span>
                        <p class="value"><?= e($tienda['refes_recoleccion']) ?></p>
                    </div>
                    <div class="data-item">
                        <span class="label">URL de Google Maps (Coordenadas)</span>
                        <p class="value">
                            <a href="<?= e($tienda['coordenadas_gmaps']) ?>" target="_blank" rel="noopener noreferrer">
                                <?= e($tienda['coordenadas_gmaps']) ?> <i class="fa-solid fa-external-link-alt" style="font-size: 0.8em;"></i>
                            </a>
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