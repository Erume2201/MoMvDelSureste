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
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Ejemplo estático -->
                        <tr>
                            <td>1</td>
                            <td>Efren</td>
                            <td>Olán López</td>
                            <td>0108GT629</td>
                            <td>efre_ol78@gmail.com</td>
                            <td>Administrador</td>
                            <td class="acciones">
                                <button class="btn-ver" title="Ver"><i class="fa-solid fa-eye"></i></button>
                                <button class="btn-editar" title="Editar"><i class="fa-solid fa-pen-to-square"></i></button>
                                <button class="btn-eliminar" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Ricardo Arturo</td>
                            <td>García García</td>
                            <td>0108PS7231</td>
                            <td>richard3300@gmail.com</td>
                            <td>Supervisor</td>
                            <td class="acciones">
                                <button class="btn-ver" title="Ver"><i class="fa-solid fa-eye"></i></button>
                                <button class="btn-editar" title="Editar"><i class="fa-solid fa-pen-to-square"></i></button>
                                <button class="btn-eliminar" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Botón de imprimir -->
                <div class="form-actions">
                    <button type="submit" class="btn-imprimir"><i class="fa-solid fa-file-pdf"></i>Imprimir</button>
                </div>
            </div>
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