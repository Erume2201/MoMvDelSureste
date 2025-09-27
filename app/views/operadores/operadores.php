<!-- Se incluyen archivos php -->
<?php
require_once __DIR__ . '../../../config/config.php';
require_once __DIR__ . '../../../config/CRUD.php';
include __DIR__ . '../../layout/sidebar.php'; // MENÚ LATERAL

$crud = new CRUD();
$operadores = $crud->select("SELECT * FROM operadores ORDER BY id_operador ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Operadores</title>
    <!-- Icono en la pestaña -->
    <link rel="icon" href="<?php echo BASE_URL; ?>public/img/favicon.ico" type="image/x-icon">
    <!-- Iconos de Boxicon -->
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
    <!-- Iconos de FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Llamando los estilos con la BASE_URL -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/operadores/operadores.css">
</head>
<body class="main-operadores">
    <div class="main-content">
        <div class="container">
            <h1>VISUALIZACIÓN Y REGISTRO DE OPERADORES 👤</h1>

            <!-- Tabla operadores -->
            <div class="operadores-table-container">
                <div class="table-header">
                    <h3>Lista de operadores</h3>
                    <div class="header-actions">
                        <div class="search-box">
                            <input type="text" id="buscar-operador" placeholder="Buscar operador...">
                        </div>
                        <a href="<?php echo BASE_URL; ?>index.php?module=operadores_add" class="btn-agregar" id="btn-agregar-operador">+ Agregar operador</a>
                    </div>
                </div>

                <table class="operadores-table" id="operadores-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Licencia</th>
                            <th>Tipo de licencia</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($operadores)): ?>
                            <?php $contador = 1; ?>
                            <?php foreach ($operadores as $operador): ?>
                                <tr>
                                    <td><?php echo $contador++; ?></td>
                                    <td><?php echo htmlspecialchars($operador['nombre']); ?></td>
                                    <td><?php echo htmlspecialchars($operador['apellidos']); ?></td>
                                    <td><?php echo htmlspecialchars($operador['licencia']); ?></td>
                                    <td><?php echo htmlspecialchars($operador['tipo_licencia']); ?></td>
                                    <td class="acciones">
                                        <a href="<?php echo BASE_URL; ?>index.php?module=operadores_view&id=<?= $operador['id_operador'] ?>" class="btn-ver" title="Ver"><i class="fa-solid fa-eye"></i></a>
                                        
                                        <a href="<?php echo BASE_URL; ?>index.php?module=operadores_edit&id=<?= $operador['id_operador'] ?>" class="btn-editar" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                                        
                                        <button class="btn-eliminar" title="Eliminar" data-id="<?= $operador['id_operador'] ?>"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">No hay operadores registrados.</td>
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
    <script src="<?php echo BASE_URL; ?>public/js/operadores/operadores.js"></script>
</body>
</html>