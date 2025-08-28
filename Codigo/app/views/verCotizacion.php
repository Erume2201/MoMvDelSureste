<?php
require_once __DIR__ . '/../config/config.php';
include __DIR__ . '../layout/sidebar.php'; // Esto solo carga el sidebar
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <!--icono en la pestaña-->
    <link rel="icon" href="<?php echo BASE_URL; ?>public/img/favicon.ico" type="image/x-icon">
    <!-- Iconos de Boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Llamando los estilos con la BASE_URL -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/estilos.css">
    <!-- Asegúrate de incluir Bootstrap 5 en tu <head> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="main-content">
        <header>
            <h1>Cotizaciones realizadas</h1>
            <a href="index.php?module=cerrar_sesion">Cerrar Sesión</a>
        </header>
        <main>
            <div class="main-container">

                <div class="search-section">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar cotización" aria-label="Buscar">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                </div>
                <h1></h1>
                <div class="cards-container">
                    <?php for ($i = 1; $i <= 20; $i++): ?>
                        <div class="card p-3 text-center">
                            <img src="<?php echo BASE_URL; ?>public/img/pdf.png" alt="Logo PDF" style="width:200px; height:auto; margin-bottom:5px;">
                            <button type="button" class="btn btn-success btn-ver-cotizacion" data-bs-toggle="modal" data-bs-target="#pdfModal" data-pdf="<?php echo BASE_URL; ?>app/pdf/cotizacion-<?php echo str_pad($i, 3, '0', STR_PAD_LEFT); ?>.pdf">
                                Ver Cotización-<?php echo str_pad($i, 3, '0', STR_PAD_LEFT); ?>
                            </button>
                        </div>
                    <?php endfor; ?>
                </div>

                <div class="modal fade" id="pdfModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="pdfTitle">Visualizar cotización</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body p-0">
                                <iframe id="pdfViewer" class="w-100" style="height:80vh; border:0;" src=""></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ===== Paginación (sin funcionalidad) ===== -->
            <nav aria-label="Page navigation example" style="margin: 20px 0; text-align:center;">
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                </ul>
            </nav>
            </section>
        </main>
    </div>
    <!-- Bootstrap 5 JS (bundle con Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASE_URL; ?>app/controllers/js/modalVerPdf.js"></script>
</body>

</html>