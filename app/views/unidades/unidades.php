<!-- Se incluyen archivos php -->
<?php
require_once __DIR__ . '../../../config/config.php';
require_once __DIR__ . '../../../config/CRUD.php';
include __DIR__ . '../../layout/sidebar.php'; // MENÚ LATERAL

$crud = new CRUD();
$unidades = $crud->select("SELECT * FROM unidades ORDER BY id_unidad ASC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Unidades</title>
    <!-- Icono en la pestaña -->
    <link rel="icon" href="<?php echo BASE_URL; ?>public/img/favicon.ico" type="image/x-icon">
    <!-- Iconos de Boxicon -->
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
    <!-- Iconos de FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Llamando los estilos con la BASE_URL -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/unidades/unidades.css">
</head>
<body class="main-unidades">
    <div class="main-content">
        <div class="container">
            <h1>VISUALIZACIÓN Y REGISTRO DE UNIDADES 🚛</h1>

            <!-- Tabla de unidades -->
            <div class="unidades-table-container">
                <div class="table-header">
                    <h3>Lista de unidades</h3>
                    <div class="header-actions">
                        <div class="search-box">
                            <input type="text" id="buscar-unidad" placeholder="Buscar unidades...">
                        </div>
                        <a href="<?php echo BASE_URL; ?>index.php?module=unidades_add" class="btn-agregar" id="btn-agregar-unidad">+ Agregar unidad</a>
                    </div>
                </div>

                <table class="unidades-table" id="unidades-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tipo de vehículo</th>
                            <th>Número económico</th>
                            <th>Placas</th>
                            <th>Número de serie</th>
                            <th>Póliza de seguro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($unidades)): ?>
                            <?php $contador = 1; ?>
                            <?php foreach ($unidades as $unidad): ?>
                                <tr>
                                    <td><?php echo $contador++; ?></td>
                                    <td><?php echo htmlspecialchars($unidad['tipo_unidad']); ?></td>
                                    <td><?php echo htmlspecialchars($unidad['numero_economico']); ?></td>
                                    <td><?php echo htmlspecialchars($unidad['placas']); ?></td>
                                    <td><?php echo htmlspecialchars($unidad['numero_serie']); ?></td>
                                    <td><?php echo htmlspecialchars($unidad['poliza_seguro']); ?></td>
                                    <td class="acciones">
                                        <a href="<?php echo BASE_URL; ?>index.php?module=unidades_view&id=<?= $unidad['id_unidad'] ?>" class="btn-ver" title="Ver"><i class="fa-solid fa-eye"></i></a>
                                        
                                        <a href="<?php echo BASE_URL; ?>index.php?module=unidades_edit&id=<?= $unidad['id_unidad'] ?>" class="btn-editar" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                                        
                                        <button class="btn-eliminar" title="Eliminar" data-id="<?= $unidad['id_unidad'] ?>"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7">No hay unidades registradas.</td>
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
    <script src="<?php echo BASE_URL; ?>public/js/unidades/unidades.js"></script>
</body>
</html>