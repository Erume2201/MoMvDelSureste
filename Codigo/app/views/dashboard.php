<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/../public/css/estilos.css">

    <style>

               body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
        }

        /* Estilos del sidebar */
        .sidebar {
            width: 220px;
            background: #2c3e50;
            color: white;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 20px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #34495e;
        }

        .submenu {
            display: none;
            background: #3b4a5a;
        }

        .submenu a {
            padding-left: 40px;
        }

        .sidebar .menu-item:hover .submenu {
            display: block;
        }

        /* Contenido principal */
        .main-content {
            margin-left: 220px;
            padding: 20px;
            width: calc(100% - 220px);
        }

        header {
            display:flex; 
            justify-content:space-between; 
            align-items:center; 
            margin-bottom: 20px;
        }

        header h1 {
            margin: 0;
        }

        header a {
            padding:8px 12px; 
            background:#d9534f; 
            color:#fff; 
            text-decoration:none; 
            border-radius:5px;
        }

        .card {
            flex:1; 
            background:#eee; 
            padding:15px; 
            border-radius:5px;
        }

        section {
            display:flex; 
            gap:20px;
        }
    </style>
    
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Menú</h2>
        <div class="menu-item">
            <a href="#">Generales</a>
            <div class="submenu">
                <a href="index.php?module=usuarios">Usuarios</a>
                <a href="index.php?module=clientes">Clientes</a>
                <a href="index.php?module=tiendas">Tiendas</a>
            </div>
        </div>
        <a href="index.php?module=cotizacion">Cotización</a>
        <a href="index.php?module=facturacion">Facturación</a>
    </div>

    <!-- Contenido principal -->
    <div class="main-content">
        <header>
            <h1>Bienvenido, <?= htmlspecialchars($_SESSION['usuario']); ?></h1>
            <a href="index.php?module=cerrar_sesion">Cerrar Sesión</a>
        </header>

        <main>
            <section>
                <div class="card">
                    <h3>Total Ventas del Mes</h3>
                    <p>$12,000</p>
                </div>
                <div class="card">
                    <h3>Ventas vs Objetivo</h3>
                    <p>$12,000 / $15,000</p>
                </div>
            </section>

            <section style="margin-top:30px;">
                <h3>Progreso de Ventas</h3>
                <canvas id="graficaVentas" width="400" height="200"></canvas>
            </section>
        </main>
    </div>
</body>
</html>

