<!-- Se incluyen archivos php -->
<?php
require_once __DIR__ . '../../../config/config.php';
include __DIR__ . '../../layout/sidebar.php'; // MENÚ LATERAL
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Tiendas</title>
    <!-- Icono en la pestaña -->
    <link rel="icon" href="<?php echo BASE_URL; ?>public/img/favicon.ico" type="image/x-icon">
    <!-- Iconos de Boxicon -->
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
    <!-- Iconos de FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Llamando los estilos con la BASE_URL -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/tiendas/tiendas_add.css">
</head>
<body class="main-tiendas-add">
    <div class="main-content">
        <div class="container">
            <h1>➕ Agregar Tienda</h1>

            <!-- Formulario -->
            <form id="form-tiendas" class="form-tiendas">

                <!-- Campos en 2 columnas -->
                <div class="form-grid">

                    <div class="form-group">
                        <label for="nombre_tienda">Nombre o razón social.</label>
                        <input type="text" id="nombre_tienda" name="nombre_tienda" required>
                    </div>

                    <div class="form-group">
                        <label for="numero_ambiental">Número de registro ambiental.</label>
                        <input type="text" id="numero_ambiental" name="numero_ambiental" required>
                    </div>

                    <div class="form-group">
                        <label for="direccion">Dirección.</label>
                        <input type="text" id="direccion" name="direccion" required>
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
                        <div class="select-container">
                            <select id="estado" name="estado" required>
                                <option value="">Seleccione un estado</option>
                                <option value="Aguascalientes">Aguascalientes</option>
                                <option value="Baja California">Baja California</option>
                                <option value="Baja California Sur">Baja California Sur</option>
                                <option value="Campeche">Campeche</option>
                                <option value="Chiapas">Chiapas</option>
                                <option value="Chihuahua">Chihuahua</option>
                                <option value="Ciudad de México">Ciudad de México</option>
                                <option value="Coahuila">Coahuila</option>
                                <option value="Colima">Colima</option>
                                <option value="Durango">Durango</option>
                                <option value="Estado de México">Estado de México</option>
                                <option value="Guanajuato">Guanajuato</option>
                                <option value="Guerrero">Guerrero</option>
                                <option value="Hidalgo">Hidalgo</option>
                                <option value="Jalisco">Jalisco</option>
                                <option value="Michoacán">Michoacán</option>
                                <option value="Morelos">Morelos</option>
                                <option value="Nayarit">Nayarit</option>
                                <option value="Nuevo León">Nuevo León</option>
                                <option value="Oaxaca">Oaxaca</option>
                                <option value="Puebla">Puebla</option>
                                <option value="Querétaro">Querétaro</option>
                                <option value="Quintana Roo">Quintana Roo</option>
                                <option value="San Luis Potosí">San Luis Potosí</option>
                                <option value="Sinaloa">Sinaloa</option>
                                <option value="Sonora">Sonora</option>
                                <option value="Tabasco">Tabasco</option>
                                <option value="Tamaulipas">Tamaulipas</option>
                                <option value="Tlaxcala">Tlaxcala</option>
                                <option value="Veracruz">Veracruz</option>
                                <option value="Yucatán">Yucatán</option>
                                <option value="Zacatecas">Zacatecas</option>
                            </select>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cp_tienda">Código postal.</label>
                        <input type="number" id="cp_tienda" name="cp_tienda" maxlength="5" required>
                    </div>

                    <div class="form-group">
                        <label for="horario_trabajo">Horario de trabajo.</label>
                        <input type="text" id="horario_trabajo" name="horario_trabajo" required>
                    </div>

                    <div class="form-group">
                        <label for="nombre_responsable">Nombre responsable entrega residuo.</label>
                        <input type="text" id="nombre_responsable" name="nombre_responsable" required>
                    </div>

                    <div class="form-group">
                        <label for="telefono_responsable">Teléfono responsable entrega residuo.</label>
                        <input type="tel" id="telefono_responsable" name="telefono_responsable" maxlength="10" required>
                    </div>

                    <div class="form-group form-full">
                        <label for="refes_recoleccion">Detalles de referencia.</label>
                        <textarea name="refes_recoleccion" id="refes_recoleccion" rows="3" required></textarea>
                    </div>

                    <div class="form-group form-full">
                        <label for="coordenadas_gmaps">URL de Google Maps.</label>
                        <input type="url" id="coordenadas_gmaps" name="coordenadas_gmaps" required>
                    </div>

                </div>

                <!-- Botónes -->
                <div class="form-actions">
                    <button type="submit" class="btn-guardar"><i class="fa-solid fa-user-plus"></i>Agregar Tienda</button>
                    <a href="<?php echo BASE_URL; ?>index.php?module=tiendas" class="btn-cancelar"><i class="fa-solid fa-xmark"></i>Cancelar</a>
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