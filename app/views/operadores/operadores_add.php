<!-- Se incluyen archivos php -->
<?php
require_once __DIR__ . '../../../config/config.php';
include __DIR__ . '../../layout/sidebar.php'; // MENÚ LATERAL
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Operadores</title>
    <!-- Icono en la pestaña -->
    <link rel="icon" href="<?php echo BASE_URL; ?>public/img/favicon.ico" type="image/x-icon">
    <!-- Iconos de Boxicon -->
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
    <!-- Iconos de FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Llamando los estilos con la BASE_URL -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/operadores/operadores_add.css">
<body class="main-operadores-add">
    <div class="main-content">
        <div class="container">
            <h1>➕ Agregar Operadores</h1>

            <!-- Formulario -->
            <form id="form-operadores" class="form-operadores">

                <!-- Campos en 2 columnas -->
                <div class="form-grid">

                    <div class="form-group">
                        <label for="nombre_operador">Nombre(s).</label>
                        <input type="text" id="nombre_operador" name="nombre_operador" required>
                    </div>

                    <div class="form-group">
                        <label for="apellidos_operador">Apellidos.</label>
                        <input type="text" id="apellidos_operador" name="apellidos_operador" required>
                    </div>

                    <div class="form-group">
                        <label for="licencia">Licencia.</label>
                        <input type="text" id="licencia" name="licencia" required>
                    </div>

                    <div class="form-group">
                        <label for="tipo_licencia">Tipo de licencia.</label>
                        <input type="text" id="tipo_licencia" name="tipo_licencia" required>
                    </div>

                </div>

                <!-- Botónes -->
                <div class="form-actions">
                    <button type="submit" class="btn-guardar"><i class="fa-solid fa-user-plus"></i>Agregar operador</button>
                    <a href="<?php echo BASE_URL; ?>index.php?module=operadores" class="btn-cancelar"><i class="fa-solid fa-xmark"></i>Cancelar</a>
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