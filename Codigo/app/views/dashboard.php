<?php
// Aseguramos que el usuario esté logueado
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="public/css/estilos.css">
</head>
<body>
    <header style="display:flex; justify-content:space-between; align-items:center;">
        <h1>Bienvenido, <?= htmlspecialchars($_SESSION['usuario']); ?></h1>
       <a href="../../logout.php" style="padding:8px 12px; background:#d9534f; color:#fff; text-decoration:none; border-radius:5px;">
    Cerrar Sesión
</a>

    </header>

    <main>
        <section style="display:flex; gap:20px;">
            <div style="flex:1; background:#eee; padding:15px; border-radius:5px;">
                <h3>Total Ventas del Mes</h3>
                <p>$12,000</p>
            </div>
            <div style="flex:1; background:#eee; padding:15px; border-radius:5px;">
                <h3>Ventas vs Objetivo</h3>
                <p>$12,000 / $15,000</p>
            </div>
        </section>

        <section style="margin-top:30px;">
            <h3>Progreso de Ventas</h3>
            <canvas id="graficaVentas" width="400" height="200"></canvas>
        </section>
    </main>

    

</body>
</html>
