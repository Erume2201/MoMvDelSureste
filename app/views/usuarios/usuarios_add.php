<!-- Se incluyen archivos php -->
<?php
require_once __DIR__ . '../../../config/config.php';
include __DIR__ . '../../layout/sidebar.php'; // MENÚ LATERAL
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Agregar Usuarios</title>
    <!-- Icono en la pestaña -->
    <link rel="icon" href="<?php echo BASE_URL; ?>public/img/favicon.ico" type="image/x-icon">
    <!-- Iconos de Boxicon -->
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
    <!-- Iconos de FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Llamando los estilos con la BASE_URL -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/usuarios/usuarios_add.css">
</head>

<body class="main-usuarios-add">
    <div class=" main-content">
        <div class="container">
            <a href="<?php echo BASE_URL; ?>index.php?module=usuarios" class="btn-flecha" title="Regresar">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h1>➕ Agregar Usuario</h1>
            <!-- Formulario -->
            <form id="form-usuarios" class="form-usuarios">
                <!-- Campos en 2 columnas -->
                <div class="form-grid">

                    <div class="form-group">
                        <label for="nombre_usuario">Nombre(s).</label>
                        <input type="text" id="nombre_usuario" name="nombre_usuario" required>
                    </div>

                    <div class="form-group">
                        <label for="apellidos_usuario">Apellidos.</label>
                        <input type="text" id="apellidos_usuario" name="apellidos_usuario" required>
                    </div>

                    <div class="form-group">
                        <label for="rfc_usuario">RFC.</label>
                        <input type="text" id="rfc_usuario" name="rfc_usuario" maxlength="13" required>
                    </div>

                    <div class="form-group">
                        <label for="email_usuario">Email.</label>
                        <input type="email" id="email_usuario" name="email_usuario" required>
                    </div>

                    <div class="form-group">
                        <label for="contraseña_usuario">Contraseña.</label>
                        <input type="text" id="contraseña_usuario" name="contraseña_usuario" required>
                    </div>

                    <div class="form-group">
                        <label for="rol_usuario">Rol</label>
                        <select id="rol_usuario" name="rol_usuario" required>
                            <option value="">-- Selecciona un rol --</option>
                            <option value="administrador">Administrador</option>
                            <option value="supervisor">Supervisor</option>
                            <option value="operador">Operador</option>
                        </select>
                    </div>

                </div>

                <div class="form-actions">
                    <button type="submit" id="btn-guardar" class="btn-guardar">
                        <i class="fa-solid fa-user-plus"></i> Agregar usuario
                    </button>
                    <button type="button" id="btn-cancelar" class="btn-cancelar">
                        <i class="fa-solid fa-xmark"></i> Cancelar
                    </button>
                </div>

            </form>
        </div>
    </div>


    <!-- ===SCRIPTS=== -->
    <script src="<?php echo BASE_URL; ?>public/js/sidebar.js"></script>
    <!-- === SCRIPTS === -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Librería de SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Script de los mensajes de alerta -->
    <script src="<?php echo BASE_URL; ?>public/js/alerts.js"></script>
    <!-- Scrip agregar usuario -->
    <script src="<?php echo BASE_URL; ?>app/controllers/js/addUser/addUser.js"></script>

</body>

</html>