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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                <H1></H1>

                <div class="form-row">
                    <div class="form-field">
                        <label>1. Nombre o Razón Social:</label>
                        <input type="text" name="nombre_razon_social">
                    </div>
                    <div class="form-field">
                        <label>2. RFC:</label>
                        <input type="text" name="rfc">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-field">
                        <label>3. Domicilio Fiscal:</label>
                        <input type="text" name="domicilio_fiscal">
                    </div>
                    <div class="form-field">
                        <label>4. Colonia:</label>
                        <input type="text" name="colonia_fiscal">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-field">
                        <label>5. Ciudad:</label>
                        <input type="text" name="ciudad_fiscal">
                    </div>
                    <div class="form-field">
                        <label>6. Estado:</label>
                        <input type="text" name="estado_fiscal">
                    </div>
                    <div class="form-field">
                        <label>7. CP:</label>
                        <input type="text" name="cp_fiscal">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-field">
                        <label>8. Tipo localidad:</label>
                        <input type="text" name="tipo_localidad">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-field">
                        <label>9. Nombre Del Apoderado Legal:</label>
                        <input type="text" name="nombre_apoderado_legal">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-field">
                        <label>10. Forma de pago:</label>
                        <input type="text" name="forma_pago">
                    </div>
                    <div class="form-field">
                        <label>11. Método de pago:</label>
                        <input type="text" name="metodo_pago">
                    </div>
                    <div class="form-field">
                        <label>12. Uso CFDI:</label>
                        <input type="text" name="uso_cfdi">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-field">
                        <label>13. Régimen Fiscal:</label>
                        <input type="text" name="regimen_fiscal">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-field">
                        <label>14. Contacto de Cuentas por pagar:</label>
                        <input type="text" name="contacto_cuentas">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-field">
                        <label>Email:</label>
                        <input type="email" name="email_contacto">
                    </div>
                    <div class="form-field">
                        <label>Teléfono:</label>
                        <input type="text" name="telefono_contacto">
                    </div>
                </div>
            </div>

            <div class="search-container">
                <input type="text" placeholder="Buscar código tienda...">
                <button type="button">Buscar Código Tienda</button>
            </div>
            <H1></H1>
            <div class="form-section">
                <h3>Datos generales del sitio de recolección de residuos:</h3>
                <div class="form-row">
                    <div class="form-field">
                        <label>15. Nombre o Razón Social:</label>
                        <input type="text" name="nombre_rec_residuos">
                    </div>
                    <div class="form-field">
                        <label>16. Número Registro Ambiental:</label>
                        <input type="text" name="registro_ambiental">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-field">
                        <label>17. Dirección:</label>
                        <input type="text" name="direccion_rec_residuos">
                    </div>
                    <div class="form-field">
                        <label>18. Colonia:</label>
                        <input type="text" name="colonia_rec_residuos">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-field">
                        <label>19. Ciudad:</label>
                        <input type="text" name="ciudad_rec_residuos">
                    </div>
                    <div class="form-field">
                        <label>20. Estado:</label>
                        <input type="text" name="estado_rec_residuos">
                    </div>
                    <div class="form-field">
                        <label>21. CP:</label>
                        <input type="text" name="cp_rec_residuos">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-field">
                        <label>22. Horario de trabajo:</label>
                        <input type="text" name="horario_trabajo">
                    </div>
                    <div class="form-field">
                        <label>23. Nombre responsable entrega residuo:</label>
                        <input type="text" name="nombre_responsable">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-field">
                        <label>24. Teléfono responsable entrega residuo:</label>
                        <input type="text" name="telefono_responsable">
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h3>Referencias específicas de la dirección de recolección:</h3>
                <div class="form-row">
                    <div class="form-field">
                        <input type="text" name="referencias_recoleccion" style="width: 100%; min-width: auto;">
                    </div>
                </div>
                <h3>26. Link de ubicación en Google Maps:</h3>
                <div class="form-row">
                    <div class="form-field">
                        <input type="text" name="google_maps_link" style="width: 100%; min-width: auto;">
                    </div>
                </div>
            </div>
            <H1></H1>
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