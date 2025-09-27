<!-- Se incluyen archivos php -->
<?php
require_once __DIR__ . '../../../config/config.php';
include __DIR__ . '../../layout/sidebar.php'; // MENÚ LATERAL
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
    <!-- Icono en la pestaña -->
    <link rel="icon" href="<?php echo BASE_URL; ?>public/img/favicon.ico" type="image/x-icon">
    <!-- Iconos de Boxicon -->
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
    <!-- Iconos de FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Llamando los estilos con la BASE_URL -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/usuarios/usuarios.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/modales/modal.css">
</head>

<body class="main-usuarios">
    <div class="main-content">
        <div class="container">
            <h1>VISUALIZACIÓN Y REGISTRO DE USUARIOS 💻</h1>
            <!-- Tabla de usuarios-->
            <div class="usuarios-table-container">
                <div class="table-header">
                    <h3>Lista de usuarios</h3>
                    <div class="header-actions">
                        <div class="search-box">
                            <input type="text" id="buscar-usuario" placeholder="Buscar usuario...">
                        </div>
                        <a href="<?php echo BASE_URL; ?>index.php?module=usuarios_add" class="btn-agregar" id="btn-agregar-usuario">+ Agregar usuario</a>
                    </div>
                </div>

                <table class="usuarios-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre(s)</th>
                            <th>Apellidos</th>
                            <th>RFC</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th class="ocultar-columna-id">Id usuario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7" style="text-align: center;">Cargando usuarios...</td>
                        </tr>
                    </tbody>
                </table>

                <!-- Botón de imprimir -->
                <div class="form-actions">
                    <button type="submit" class="btn-imprimir"><i class="fa-solid fa-file-pdf"></i>Imprimir</button>
                </div>
                <nav aria-label="Page navigation example" style="margin: 20px 0; text-align:center;">
                    <ul class="pagination justify-content-center">
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- Modal de editar -->
    <div id="modalEditar" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-btn" data-modal="modalEditar">&times;</span>
            <h2>Editar Usuario</h2>
            <form id="formEditarUsuario">
                <input type="hidden" id="edit-id" name="id_usuario">

                <label for="edit-nombre">Nombre(s):</label>
                <input type="text" id="edit-nombre" name="nombre" required>

                <label for="edit-apellidos">Apellidos:</label>
                <input type="text" id="edit-apellidos" name="apellidos" required>

                <label for="edit-rfc">RFC:</label>
                <input type="text" id="edit-rfc" name="rfc" required>

                <label for="edit-email">Email:</label>
                <input type="email" id="edit-email" name="email" required>

                <label for="edit-rol">Rol:</label>
                <select id="edit-rol" name="rol" required>
                    <option value="Administrador">Administrador</option>
                    <option value="supervisor">Supervisor</option>
                    <option value="operador">Operador</option>
                </select>

                <div style="text-align: right; margin-top: 20px;">
                    <button type="submit" class="btn-guardar">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>


    <!-- ===SCRIPTS=== -->
    <script src="<?php echo BASE_URL; ?>public/js/sidebar.js"></script>
    <!-- Librería de SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Script de los mensajes de alerta -->
    <script src="<?php echo BASE_URL; ?>public/js/alerts.js"></script>
    
    <script src="<?php echo BASE_URL; ?>app/controllers/js/addUser/getUsuario.js"></script>

</body>

</html>