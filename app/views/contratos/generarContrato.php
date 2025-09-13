<!-- Se incluyen archivos php -->
<?php
require_once __DIR__ . '/../config/config.php';
include __DIR__ . '../layout/sidebar.php'; // MENÚ LATERAL
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <title>Cotizar</title>
    <!--icono en la pestaña-->
    <link rel="icon" href="public/img/favicon.ico" type="image/x-icon">
    <!-- Iconos de Boxicon -->
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
    <!-- Llamando los estilos con la BASE_URL -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/cotizar.css">

</head>

<body class="main-cotizar">
    <div class="main-content">
        <div class="container">
            <h2>SOLICITUD ALTA DE CLIENTE Y CONTRATO SERVICIOS</h2>

            <div class="form-section">
                <h3>Datos generales de facturación</h3>

                <div class="search-container">
                    <input type="text" placeholder="Código Cliente">
                    <button type="button">Buscar</button>
                </div>

                <!-- Campos Labels + Inputs -->
                <div class="form-grid">
                    <div class="form-field">
                        <label for="nombre_razon_social">1. Nombre o Razón Social.</label>
                        <input type="text" name="nombre_razon_social" id="nombre_razon_social">
                    </div>

                    <div class="form-field">
                        <label for="rfc">2. RFC.</label>
                        <input type="text" name="rfc" id="rfc">
                    </div>

                    <div class="form-field">
                        <label for="domicilio_fiscal">3. Domicilio Fiscal.</label>
                        <input type="text" name="domicilio_fiscal" id="domicilio_fiscal">
                    </div>

                    <div class="form-field">
                        <label for="colonia_fiscal">4. Colonia.</label>
                        <input type="text" name="colonia_fiscal" id="colonia_fiscal">
                    </div>

                    <div class="form-field">
                        <label for="ciudad_fiscal">5. Ciudad.</label>
                        <input type="text" name="ciudad_fiscal" id="ciudad_fiscal">
                    </div>

                    <div class="form-field">
                        <label for="estado_fiscal">6. Estado.</label>
                        <input type="text" name="estado_fiscal" id="estado_fiscal">
                    </div>

                    <div class="form-field">
                        <label for="cp_fiscal">7. CP.</label>
                        <input type="text" name="cp_fiscal" id="cp_fiscal">
                    </div>

                    <div class="form-field">
                        <label for="tipo_localidad">8. Tipo localidad.</label>
                        <input type="text" name="tipo_localidad" id="tipo_localidad">
                    </div>

                    <div class="form-field">
                        <label for="nombre_apoderado_legal">9. Nombre del Apoderado Legal.</label>
                        <input type="text" name="nombre_apoderado_legal" id="nombre_apoderado_legal">
                    </div>

                    <div class="form-field">
                        <label for="forma_pago">10. Forma de pago.</label>
                        <input type="text" name="forma_pago" id="forma_pago">
                    </div>

                     <div class="form-field">
                        <label for="metodo_pago">11. Método de pago.</label>
                        <input type="text" name="metodo_pago" id="metodo_pago">
                    </div>

                    <div class="form-field">
                        <label for="uso_cfdi">12. Uso CFDI.</label>
                        <input type="text" name="uso_cfdi" id="uso_cfdi">
                    </div>

                    <div class="form-field">
                        <label for="regimen_fiscal">13. Régimen Fiscal.</label>
                        <input type="text" name="regimen_fiscal" id="regimen_fiscal">
                    </div>

                    <div class="form-field">
                        <label for="contacto_cuentas">14. Contacto de Cuentas por pagar.</label>
                        <input type="text" name="contacto_cuentas" id="contacto_cuentas">
                    </div>

                    <div class="form-field">
                        <label for="email_contacto">Email.</label>
                        <input type="email" name="email_contacto" id="email_contacto">
                    </div>

                    <div class="form-field">
                        <label for="telefono_contacto">Teléfono.</label>
                        <input type="number" name="telefono_contacto" id="telefono_contacto">
                    </div>
                </div>
            </div>

            <!-- Búscador de códigos de tienda -->
            <div class="search-container">
                <input type="text" placeholder="Buscar código tienda...">
                <button type="button">Buscar</button>
            </div>

            <!-- Segunda sección - recolección de residuos -->
            <div class="form-section">
                <h3>Datos generales del sitio de recolección de residuos</h3>
                <div class="form-grid">

                    <div class="form-field">
                        <label for="nombre_rec_residuos">15. Nombre o Razón social.</label>
                        <input type="text" name="nombre_rec_residuos" id="nombre_rec_residuos">
                    </div>

                    <div class="form-field">
                        <label for="registro_ambiental">16. Número Registro Ambiental.</label>
                        <input type="text" name="registro_ambiental" id="registro_ambiental">
                    </div>

                    <div class="form-field">
                        <label for="direccion_rec_residuos">17. Dirección.</label>
                        <input type="text" name="direccion_rec_residuos" id="direccion_rec_residuos">
                    </div>

                    <div class="form-field">
                        <label for="colonia_rec_residuos">18. Colonia.</label>
                        <input type="text" name="colonia_rec_residuos" id="colonia_rec_residuos">
                    </div>

                    <div class="form-field">
                        <label for="ciudad_rec_residuos">19. Ciudad.</label>
                        <input type="text" name="ciudad_rec_residuos" id="ciudad_rec_residuos">
                    </div>

                    <div class="form-field">
                        <label for="estado_rec_residuos">20. Estado.</label>
                        <input type="text" name="estado_rec_residuos" id="estado_rec_residuos">
                    </div>

                    <div class="form-field">
                        <label for="cp_rec-residuos">21. CP.</label>
                        <input type="text" name="cp_rec_residuos" id="cp_rec-residuos">
                    </div>

                    <div class="form-field">
                        <label for="horario_trabajo">22. Horario de trabajo.</label>
                        <input type="text" name="horario_trabajo" id="horario_trabajo">
                    </div>

                    <div class="form-field">
                        <label for="nombre_responsable">23. Nombre responsable entrega residuo.</label>
                        <input type="text" name="nombre_responsable" id="nombre_responsable">
                    </div>

                    <div class="form-field">
                        <label for="telefono_responsable">24. Teléfono responsable entrega residuo.</label>
                        <input type="text" name="telefono_responsable" id="telefono_responsable">
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h3>Referencias específicas de la dirección de recolección</h3>
                <div class="form-field">
                    <label for="referencias_recoleccion">Detalles de referencia.</label>
                    <input type="text" id="referencias_recoleccion" name="referencias_recoleccion" placeholder="Ingrese referencias específicas">
                </div>

                <h3 class="subtitulo-maps">Link de ubicación en Google Maps</h3>
                <div class="form-field">
                    <label for="google_maps_link">URL de Google Maps.</label>
                    <input type="text" id="google_maps_link" name="google_maps_link" placeholder="Pegue aquí el enlace de ubicación">
                </div>
            </div>

            <!-- Botón para generar PDF -->
            <div class="button">
                <button type="button" id="cotizar">Generar Cotización</button>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>
    <script src="<?php echo BASE_URL; ?>app/controllers/js/generarPdf.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/sidebar.js"></script>
    <!-- Librería de SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Script de los mensajes de alerta -->
    <script src="public/js/alerts.js"></script>

</body>
</html>