<?php
// Muestra todos los campos del cliente en modo solo lectura.
include __DIR__ . '../../../controllers/php/actionOperadores/operadores_view_action.php';
require_once __DIR__ . '../../../config/config.php';
require_once __DIR__ . '../../../config/CRUD.php';
include __DIR__ . '../../layout/sidebar.php'; // MENÚ LATERAL
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de operador - <?= e($operador['nombre']) ?></title>
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
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/operadores/operadores_view.css">
</head>
<body class="main-operadores-view">
    <div class="main-content">
        <div class="container">
            <div class="titulo-view">
                <a href="<?php echo BASE_URL; ?>index.php?module=operadores" class="btn-flecha" title="Regresar">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <h1>DETALLE DE OPERADOR: <?= e($operador['nombre']) . ' ' . e($operador['apellidos']) ?></h1>
                <span class="espaciador"></span> <!-- Truco para balancear el flex -->
            </div>

            <div class="view-section">
                <h3><i class="fa-solid fa-user-gear icon-title"></i> Identificación y Licencia</h3>
                <div class="data-grid grid-2-cols">
                    
                    <div class="data-item">
                        <span class="label">Nombre(s)</span>
                        <p class="value"><?= e($operador['nombre']) ?></p>
                    </div>
                    
                    <div class="data-item">
                        <span class="label">Apellidos</span>
                        <p class="value"><?= e($operador['apellidos']) ?></p>
                    </div>
                    
                    <div class="data-item">
                        <span class="label">Licencia</span>
                        <p class="value"><?= e($operador['licencia']) ?></p>
                    </div>
                    
                    <div class="data-item">
                        <span class="label">Tipo de licencia</span>
                        <p class="value">
                            <?= e(TIPO_LICENCIA_MAP[$operador['tipo_licencia']] ?? $operador['tipo_licencia']) ?>
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