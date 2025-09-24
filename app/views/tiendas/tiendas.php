<!-- Se incluyen archivos php -->
<?php
require_once __DIR__ . '../../../config/config.php';
require_once __DIR__ . '../../../config/CRUD.php';
include __DIR__ . '../../layout/sidebar.php'; // MENÚ LATERAL

$crud = new CRUD();
$sql = "SELECT t.*, c.nombre_cliente FROM tiendas t JOIN clientes c ON t.id_cliente = c.id_cliente ORDER BY t.id_tienda ASC";
$tiendas = $crud->select($sql);
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
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/tiendas/tiendas.css">
</head>
<body class="main-tiendas">
    <div class="main-content">
        <div class="container">
            <h1>VISUALIZACIÓN Y REGISTRO DE TIENDAS 🏪</h1>

            <!-- Tabla de tiendas -->
            <div class="tiendas-table-container">
                <div class="table-header">
                    <h3>Lista de tiendas</h3>
                    <div class="header-actions">
                        <div class="search-box">
                            <input type="text" id="buscar-tienda" placeholder="Buscar tienda...">
                        </div>
                        <a href="<?php echo BASE_URL; ?>index.php?module=tiendas_add" class="btn-agregar" id="btn-agregar-tienda">+ Agregar tienda</a>
                    </div>
                </div>

                <table class="tiendas-table" id="tiendas-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tienda</th>
                            <th>Cliente</th>
                            <th>Dirección</th>
                            <th>Ciudad</th>
                            <th>Estado</th>
                            <th>Responsable</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($tiendas)): ?>
                            <?php $contador = 1; ?>
                            <?php foreach ($tiendas as $tienda): ?>
                                <tr>
                                    <td><?php echo $contador++; ?></td>
                                    <td><?php echo htmlspecialchars($tienda['nombre_tienda']); ?></td>
                                    <td><?php echo htmlspecialchars($tienda['nombre_cliente']); ?></td>
                                    <td><?php echo htmlspecialchars($tienda['direccion']); ?></td>
                                    <td><?php echo htmlspecialchars($tienda['ciudad']); ?></td>
                                    <td><?php echo htmlspecialchars($tienda['estado']); ?></td>
                                    <td><?php echo htmlspecialchars($tienda['nombre_responsable']); ?></td>
                                    <td class="acciones">
                                        <button class="btn-ver" title="Ver"><i class="fa-solid fa-eye"></i></button>
                                        <button class="btn-editar" title="Editar"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <button class="btn-eliminar" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8">No hay tiendas registradas.</td>
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
    <script src="<?php echo BASE_URL; ?>public/js/tiendas/tiendas.js"></script>
</body>
</html>