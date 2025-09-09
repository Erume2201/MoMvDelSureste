<!-- Se incluyen archivos php -->
<?php
require_once __DIR__ . '/../config/config.php';
include __DIR__ . '../layout/sidebar.php'; // MENÚ LATERAL
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Clientes</title>
    <!-- Icono en la pestaña -->
    <link rel="icon" href="<?php echo BASE_URL; ?>public/img/favicon.ico" type="image/x-icon">
    <!-- Iconos de Boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Llamando los estilos con la BASE_URL -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/clientes_add.css">
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
                        <input type="text" id="nombre" name="nombre" require>
                    </div>

                    <div class="form-group">
                        <label for="rfc">RFC.</label>
                        <input type="text" id="rfc" name="rfc" maxlength="13" require>
                    </div>

                    <div class="form-group">
                        <label for="domicilio">Domicilio Fiscal.</label>
                        <input type="text" id="domicilio" name="domicilio" require>
                    </div>

                    <div class="form-group">
                        <label for="colonia">Colonia.</label>
                        <input type="text" id="colonia" name="colonia" require>
                    </div>

                    <div class="form-group">
                        <label for="ciudad">Ciudad.</label>
                        <input type="text" id="ciudad" name="ciudad" require>
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado.</label>
                        <input type="text" id="estado" name="estado" require>
                    </div>

                    <div class="form-group">
                        <label for="cp">Código postal.</label>
                        <input type="text" id="cp" name="cp" require>
                    </div>

                    <div class="form-group">
                        <label for="tipo_localidad">Tipo de localidad.</label>
                        <input type="text" id="tipo_localidad" name="tipo_localidad" require>
                    </div>

                    <div class="form-group">
                        <label for="apoderado">Nombre del apoderado legal.</label>
                        <input type="text" id="apoderado" name="apoderado" require>
                    </div>

                    <div class="form-group">
                        <label for="forma_pago">Forma de pago.</label>
                        <input type="text" id="forma_pago" name="forma_pago" require>
                    </div>

                    <div class="form-group">
                        <label for="metodo_pago">Método de pago.</label>
                        <input type="text" id="metodo_pago" name="metodo_pago" require>
                    </div>

                    <div class="form-group">
                        <label for="uso_cfdi">Uso CFDI.</label>
                        <input type="text" id="uso_cfdi" name="uso_cfdi" require>
                    </div>

                    <div class="form-group">
                        <label for="regimen">Régimen fiscal.</label>
                        <input type="text" id="regimen" name="regimen" require>
                    </div>

                    <div class="form-group">
                        <label for="contacto">Contacto de cuentas por pagar.</label>
                        <input type="text" id="contacto" name="contacto" require>
                    </div>

                    <div class="form-group">
                        <label for="email">Email.</label>
                        <input type="email" id="email" name="email" require>
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono.</label>
                        <input type="tel" id="telefono" name="telefono" require>
                    </div>

                </div>

                <!-- Botónes -->
                <div class="form-actions">
                    <button type="submit" class="btn-guardar">💾 Agregar Cliente</button>
                    <a href="<?php echo BASE_URL; ?>index.php?module=clientes" class="btn-cancelar">❌ Cancelar</a>
                </div>

            </form>
        </div>
    </div>
    

    <!-- ===SCRIPTS=== -->
    <script src="<?php echo BASE_URL; ?>public/js/sidebar.js"></script>
    <!-- Librería de SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Script de los mensajes de alerta -->
    <script>
        document.getElementById("form-clientes").addEventListener("submit", function(e) {
            e.preventDefault(); // Evita recargar
            Swal.fire({
                icon: 'success',
                title: 'Cliente agregado',
                text: 'El cliente se registró correctamente',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = "<?php echo BASE_URL; ?>index.php?module=clientes";
            });
        });
    </script>
    <script src="<?php echo BASE_URL; ?>public/js/alerts.js"></script>

</body>
</html>