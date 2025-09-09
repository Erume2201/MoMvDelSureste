<!-- Se incluyen archivos php -->
<?php
require_once __DIR__ . '/../config/config.php';
include __DIR__ . '../layout/sidebar.php'; // MENÚ LATERAL
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <!-- Icono en la pestaña -->
    <link rel="icon" href="<?php echo BASE_URL; ?>public/img/favicon.ico" type="image/x-icon">
    <!-- Iconos de Boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Llamando los estilos con la BASE_URL -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/clientes.css">
</head>
<body class="main-clientes">
    <div class="main-content">
        <div class="container">
            <h1>VISUALIZACIÓN Y REGISTRO DE CLIENTES ✍🏼</h1>

            <!-- Tabla -->
            <div class="clientes-table-container">
                <div class="table-header">
                    <h3>Lista de clientes</h3>
                    <div class="header-actions">
                        <div class="search-box">
                            <input type="text" id="buscar-cliente" placeholder="Buscar cliente...">
                        </div>
                        <a href="<?php echo BASE_URL; ?>index.php?module=clientes_add" class="btn-agregar" id="btn-agregar-cliente">+ Agregar cliente</a>
                    </div>
                </div>

                <table class="clientes-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre o razón social</th>
                            <th>RFC</th>
                            <th>Ciudad</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Ejemplo estático -->
                        <tr>
                            <td>1</td>
                            <td>Empresa de Ejemplo S.A. de C.V.</td>
                            <td>ABC123456XYZ</td>
                            <td>Mérida</td>
                            <td>999-123-4567</td>
                            <td class="acciones">
                                <button class="btn-ver">Ver</button>
                                <button class="btn-editar">Editar</button>
                                <button class="btn-eliminar">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Empresa de Ejemplo Dos S.A. de C.V.</td>
                            <td>XYZ987654ABC</td>
                            <td>Villahemosa</td>
                            <td>998-765-4321</td>
                            <td class="acciones">
                                <button class="btn-ver">Ver</button>
                                <button class="btn-editar">Editar</button>
                                <button class="btn-eliminar">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
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