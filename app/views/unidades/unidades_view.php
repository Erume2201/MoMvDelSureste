<?php
// Muestra todos los campos del cliente en modo solo lectura.
include __DIR__ . '../../../controllers/php/actionUnidades/unidades_view_action.php';
require_once __DIR__ . '../../../config/config.php';
require_once __DIR__ . '../../../config/CRUD.php';
include __DIR__ . '../../layout/sidebar.php'; // MENÚ LATERAL
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de unidad - <?= e($unidad['nombre']) ?></title>
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
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/unidades/unidades_view.css">
</head>
<body class="main-unidades-view">
    <div class="main-content">
        <div class="container">
            <div class="titulo-view">
                <a href="<?php echo BASE_URL; ?>index.php?module=unidades" class="btn-flecha" title="Regresar">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <h1>DETALLE DE LA UNIDAD: <?= e($unidad['numero_economico']) ?></h1>
                <span class="espaciador"></span> <!-- Truco para balancear el flex -->
            </div>

            <div class="view-section">
                    <h3><i class="fa-solid fa-truck-moving icon-title"></i> Identificación y Tipo</h3>
                    <div class="data-grid grid-2-cols">
                        
                        <div class="data-item">
                            <span class="label">Tipo de unidad</span>
                            <p class="value"><?= e($unidad['tipo_unidad']) ?></p>
                        </div>
                        
                        <div class="data-item">
                            <span class="label">Número económico</span>
                            <p class="value"><?= e($unidad['numero_economico']) ?></p>
                        </div>
                        
                        <div class="data-item">
                            <span class="label">Placas</span>
                            <p class="value"><?= e($unidad['placas']) ?></p>
                        </div>
                        
                    </div>
                </div>
                
                <div class="view-section">
                    <h3><i class="fa-solid fa-file-invoice icon-title"></i> Datos Técnicos y Seguro</h3>
                    <div class="data-grid grid-2-cols">
                        
                        <div class="data-item">
                            <span class="label">Número de serie (VIN)</span>
                            <p class="value"><?= e($unidad['numero_serie']) ?></p>
                        </div>
                        
                        <div class="data-item">
                            <span class="label">Póliza de seguro</span>
                            <p class="value"><?= e($unidad['poliza_seguro']) ?></p>
                        </div>
                        
                    </div>
                </div>
            </div> 
            
            <!-- Botón de imprimir -->
            <div class="form-actions">
                <button type="submit" class="btn-imprimir"><i class="fa-solid fa-file-pdf"></i>Imprimir</button>
            </div> 
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