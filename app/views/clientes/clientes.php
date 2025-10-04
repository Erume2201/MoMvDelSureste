<!-- Se incluyen archivos php -->
<?php
require_once __DIR__ . '../../../config/config.php';
require_once __DIR__ . '../../../config/CRUD.php';
include __DIR__ . '../../layout/sidebar.php'; // MENÚ LATERAL

$crud = new CRUD();
$clientes = $crud->select("SELECT * FROM clientes ORDER BY id_cliente ASC");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <!-- Icono en la pestaña -->
    <link rel="icon" href="<?php echo BASE_URL; ?>public/img/favicon.ico" type="image/x-icon">
    <!-- Iconos de Boxicon -->
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
    <!-- Iconos de FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Llamando los estilos con la BASE_URL -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/clientes/clientes.css">
</head>
<body class="main-clientes">
    <div class="main-content">
        <div class="container">
            <h1>VISUALIZACIÓN Y REGISTRO DE CLIENTES ✍🏼</h1>

            <!-- Tabla de clientes-->
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

                <!-- Tabla dinámica -->
                <table class="clientes-table" id="clientes-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre o razón social</th>
                            <th>RFC</th>
                            <th>Ciudad</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($clientes)): ?>
                            <?php $contador = 1; ?>
                            <?php foreach ($clientes as $cliente): ?>
                                <tr>
                                    <td><?php echo $contador++; ?></td>
                                    <td><?php echo htmlspecialchars($cliente['nombre_cliente']); ?></td>
                                    <td><?php echo htmlspecialchars($cliente['rfc']); ?></td>
                                    <td><?php echo htmlspecialchars($cliente['ciudad']); ?></td>
                                    <td><?php echo htmlspecialchars($cliente['telefono']); ?></td>
                                    <td><?php echo htmlspecialchars($cliente['email']); ?></td>
                                    <td class="acciones">
                                        <a href="<?php echo BASE_URL; ?>index.php?module=clientes_view&id=<?= $cliente['id_cliente'] ?>" class="btn-ver" title="Ver"><i class="fa-solid fa-eye"></i></a>
                                        
                                        <a href="<?php echo BASE_URL; ?>index.php?module=clientes_edit&id=<?= $cliente['id_cliente'] ?>" class="btn-editar" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                                        
                                        <button class="btn-eliminar" title="Eliminar" data-id="<?= $cliente['id_cliente'] ?>"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7">No hay clientes registrados.</td>
                            </tr>
                        <?php endif; ?>
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
    <!-- Script que controla el buscador -->
    <script src="<?php echo BASE_URL; ?>public/js/clientes/clientes.js"></script>

</body>
</html>