<!-- Se incluyen archivos php -->
<?php
require_once __DIR__ . '../../../config/config.php';
include __DIR__ . '../../layout/sidebar.php'; // MENÚ LATERAL
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Clientes</title>
    <!-- Icono en la pestaña -->
    <link rel="icon" href="<?php echo BASE_URL; ?>public/img/favicon.ico" type="image/x-icon">
    <!-- Iconos de Boxicon -->
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
    <!-- Iconos de FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Llamando los estilos con la BASE_URL -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/clientes/clientes_add.css">
</head>
<body class="main-clientes-add"">
    <div class="main-content">
        <div class="container">
            <h1>➕ Agregar Cliente</h1>

            <!-- Formulario -->
            <form id="form-clientes" class="form-clientes">

                <!-- Campos en 2 columnas -->
                <div class="form-grid">

                    <div class="form-group">
                        <label for="nombre">Nombre o Razón social.</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="rfc">RFC.</label>
                        <input type="text" id="rfc" name="rfc" maxlength="13" required>
                    </div>

                    <div class="form-group">
                        <label for="domicilio">Domicilio Fiscal.</label>
                        <input type="text" id="domicilio" name="domicilio" required>
                    </div>

                    <div class="form-group">
                        <label for="colonia">Colonia.</label>
                        <input type="text" id="colonia" name="colonia" required>
                    </div>

                    <div class="form-group">
                        <label for="ciudad">Ciudad.</label>
                        <input type="text" id="ciudad" name="ciudad" required>
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado.</label>
                        <input type="text" id="estado" name="estado" required>
                    </div>

                    <div class="form-group">
                        <label for="cp">Código postal.</label>
                        <input type="text" id="cp" name="cp" required>
                    </div>

                    <div class="form-group">
                        <label for="tipo_localidad">Tipo de localidad.</label>
                        <input type="text" id="tipo_localidad" name="tipo_localidad" required>
                    </div>

                    <div class="form-group">
                        <label for="apoderado">Nombre del apoderado legal.</label>
                        <input type="text" id="apoderado" name="apoderado" required>
                    </div>

                    <div class="form-group">
                        <label for="forma_pago">Forma de pago.</label>
                        <input type="text" id="forma_pago" name="forma_pago" required>
                    </div>

                    <div class="form-group">
                        <label for="metodo_pago">Método de pago.</label>
                        <input type="text" id="metodo_pago" name="metodo_pago" required>
                    </div>

                    <div class="form-group">
                        <label for="uso_cfdi">Uso CFDI.</label>
                        <input type="text" id="uso_cfdi" name="uso_cfdi" required>
                    </div>

                    <div class="form-group">
                        <label for="regimen">Régimen fiscal.</label>
                        <input type="text" id="regimen" name="regimen" required>
                    </div>

                    <div class="form-group">
                        <label for="contacto">Contacto de cuentas por pagar.</label>
                        <input type="text" id="contacto" name="contacto" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email.</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono.</label>
                        <input type="tel" id="telefono" name="telefono" required>
                    </div>

                </div>

                <!-- Botónes -->
                <div class="form-actions">
                    <button type="submit" class="btn-guardar"><i class="fa-solid fa-user-plus"></i>Agregar Cliente</button>
                    <a href="<?php echo BASE_URL; ?>index.php?module=clientes" class="btn-cancelar"><i class="fa-solid fa-xmark"></i>Cancelar</a>
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