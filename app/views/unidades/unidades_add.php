<!-- Se incluyen archivos php -->
<?php
require_once __DIR__ . '../../../config/config.php';
include __DIR__ . '../../layout/sidebar.php'; // MENÚ LATERAL
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Unidades</title>
    <!-- Icono en la pestaña -->
    <link rel="icon" href="<?php echo BASE_URL; ?>public/img/favicon.ico" type="image/x-icon">
    <!-- Iconos de Boxicon -->
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
    <!-- Iconos de FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Llamando los estilos con la BASE_URL -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/unidades/unidades_add.css">
</head>
<body class="main-unidades-add"">
    <div class="main-content">
        <div class="container">
            <h1>➕ Agregar Unidad</h1>

            <!-- Formulario -->
            <form id="form-unidades" class="form-unidades" action="<?php echo BASE_URL; ?>app/controllers/php/addUnidades/unidades_add_action.php" method="POST">

                <!-- Campos en 2 columnas -->
                <div class="form-grid">

                    <div class="form-group">
                        <label for="tipo_unidad">Tipo de unidad.</label>
                        <div class="select-container">   
                            <select id="tipo_unidad" name="tipo_unidad" required>
                                <option value="">Seleccione un tipo</option>
                                <option value="Camión">Camión</option>
                                <option value="Camioneta">Camioneta</option>
                                <option value="Vehículo Ligero">Vehículo Ligero</option>
                                <option value="Tractocamión">Tractocamión</option>
                                <option value="Trailer">Trailer</option>
                            </select>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="numero_economico">Número económico.</label>
                        <input type="text" id="numero_economico" name="numero_economico" required>
                    </div>

                    <div class="form-group">
                        <label for="placas">Placas.</label>
                        <input type="text" id="placas" name="placas" required>
                    </div>

                    <div class="form-group">
                        <label for="numero_serie">Número de serie.</label>
                        <input type="text" id="numero_serie" name="numero_serie" maxlength="17" required>
                    </div>

                    <div class="form-group">
                        <label for="poliza_seguro">Póliza de seguro.</label>
                        <input type="text" id="poliza_seguro" name="poliza_seguro" required>
                    </div>

                </div>

                <!-- Botónes -->
                <div class="form-actions">
                    <button type="submit" class="btn-guardar"><i class="fa-solid fa-user-plus"></i>Agregar unidad</button>
                    <a href="<?php echo BASE_URL; ?>index.php?module=unidades" class="btn-cancelar"><i class="fa-solid fa-xmark"></i>Cancelar</a>
                </div>

            </form>
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