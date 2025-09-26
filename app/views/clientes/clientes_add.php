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
            <a href="<?php echo BASE_URL; ?>index.php?module=clientes" class="btn-flecha" title="Regresar">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h1>➕ Agregar Cliente</h1>

            <!-- Formulario -->
            <form id="form-clientes" class="form-clientes" action="<?php echo BASE_URL; ?>app/controllers/php/actionClientes/clientes_add_action.php" method="POST">

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
                        <div class="select-container">
                            <select name="forma_pago" id="forma_pago" required>
                                <option value="">Seleccione una opción</option>
                                <option value="01">01 - Efectivo</option>
                                <option value="02">02 - Cheque nominativo</option>
                                <option value="03">03 - Transferencia electrónica de fondos</option>
                            </select>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="metodo_pago">Método de pago.</label>
                        <div class="select-container">
                            <select name="metodo_pago" id="metodo_pago" required>
                                <option value="">Seleccione una opción</option>
                                <option value="PUE">PUE - Pago en una sola exhibición</option>
                                <option value="PPD">PPD - Pago en parcialidades o diferido</option>
                            </select>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="uso_cfdi">Uso CFDI.</label>
                        <div class="select-container">
                            <select name="uso_cfdi" id="uso_cfdi" required>
                                <option value="">Seleccione una opción</option>
                                <option value="G01">G01 - Adquisición de mercancías</option>
                                <option value="P01">P01 - Por definir</option>
                            </select>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="regimen">Régimen fiscal.</label>
                        <div class="select-container">
                            <select name="regimen" id="regimen" required>
                                <option value="">Seleccione una opción</option>
                                <option value="601">601 - General de Ley Personas Morales</option>
                                <option value="605">605 - Sueldos y Salarios</option>
                            </select>
                            <i class="fas fa-chevron-down"></i>
                        </div>
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