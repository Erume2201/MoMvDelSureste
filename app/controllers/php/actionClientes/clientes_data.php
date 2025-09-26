<!-- <?php
// ===============================================
// BACKEND PAGINACIÓN CLIENTES (clientes_data.php)
// ===============================================

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../config/CRUD.php';

$crud = new CRUD();

// 1️⃣ Parámetros de paginación y búsqueda
$page     = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = isset($_GET['per_page']) ? (int)$_GET['per_page'] : 15;
$search   = isset($_GET['search']) ? trim($_GET['search']) : '';

if ($page < 1) $page = 1;
if ($per_page < 1) $per_page = 15;
$offset = ($page - 1) * $per_page;

// 2️⃣ Contar registros totales (seguro con params)
if ($search !== '') {
    $countQuery = "SELECT COUNT(*) as total FROM clientes
                   WHERE nombre_cliente LIKE :search1 
                      OR rfc LIKE :search2 
                      OR ciudad LIKE :search3
                      OR telefono LIKE :search4 
                      OR email LIKE :search5";
    // IMPORTANTE: usar clave SIN ':' para execute() (compatibilidad)
    $countParams = [
        ':search1' => "%$search%",
        ':search2' => "%$search%",
        ':search3' => "%$search%",
        ':search4' => "%$search%",
        ':search5' => "%$search%",
    ];
} else {
    $countQuery = "SELECT COUNT(*) as total FROM clientes";
    $countParams = []; // sin parámetros
}

$countResult = $crud->selectOne($countQuery, $countParams);

// Validar el resultado
$total_registros = isset($countResult['total']) ? (int)$countResult['total'] : 0;
$total_paginas = ($per_page > 0) ? max(1, ceil($total_registros / $per_page)) : 1;

// 3️⃣ Obtener registros paginados
// NOTA: interpolamos $offset y $per_page (enteros sanitizados arriba) para evitar inconsistencias al bindear LIMIT
if ($search !== '') {
    $query = "SELECT * FROM clientes
              WHERE nombre_cliente LIKE :search 
                 OR rfc LIKE :search 
                 OR ciudad LIKE :search 
                 OR telefono LIKE :search 
                 OR email LIKE :search
              ORDER BY id_cliente ASC
              LIMIT $offset, $per_page";
    $stmt = $crud->getConexion()->prepare($query);
    // bindear el search (usamos bindValue para garantizar el tipo)
    $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
} else {
    $query = "SELECT * FROM clientes ORDER BY id_cliente ASC LIMIT $offset, $per_page";
    $stmt = $crud->getConexion()->prepare($query);
}

// Ejecutar y obtener resultados
$stmt->execute();
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ============================================
// 4️⃣ Generar HTML de las filas de la tabla
// ============================================
$tablaHTML = "";

if (!empty($clientes)) {
    $contador = $offset + 1;
    foreach ($clientes as $cliente) {
        $tablaHTML .= "<tr>";
        $tablaHTML .= "<td>{$contador}</td>";
        $tablaHTML .= "<td>" . htmlspecialchars($cliente['nombre_cliente']) . "</td>";
        $tablaHTML .= "<td>" . htmlspecialchars($cliente['rfc']) . "</td>";
        $tablaHTML .= "<td>" . htmlspecialchars($cliente['ciudad']) . "</td>";
        $tablaHTML .= "<td>" . htmlspecialchars($cliente['telefono']) . "</td>";
        $tablaHTML .= "<td>" . htmlspecialchars($cliente['email']) . "</td>";
        $tablaHTML .= "<td class='acciones'>
            <button class='btn-ver' title='Ver'><i class='fa-solid fa-eye'></i></button>
            <button class='btn-editar' title='Editar'><i class='fa-solid fa-pen-to-square'></i></button>
            <button class='btn-eliminar' title='Eliminar'><i class='fa-solid fa-trash'></i></button>
        </td>";
        $tablaHTML .= "</tr>";
        $contador++;
    }
} else {
    $tablaHTML .= "<tr><td colspan='7' style='text-align:center;color:red;'>No hay resultados.</td></tr>";
}

// ============================================
// 5️⃣ Generar HTML del paginador
// ============================================
$paginacionHTML = "";
if ($total_paginas > 1) { // si sólo hay 1 página no mostramos paginador
    $paginacionHTML .= "<div class='pagination-container'>";

    if ($page > 1) {
        $paginacionHTML .= "<button class='page-btn' data-page='" . ($page - 1) . "'>« Anterior</button>";
    }

    for ($i = 1; $i <= $total_paginas; $i++) {
        $active = ($i == $page) ? "active" : "";
        $paginacionHTML .= "<button class='page-btn $active' data-page='$i'>$i</button>";
    }

    if ($page < $total_paginas) {
        $paginacionHTML .= "<button class='page-btn' data-page='" . ($page + 1) . "'>Siguiente »</button>";
    }

    $paginacionHTML .= "</div>";
}

// 6️⃣ Devolver respuesta en JSON (sin ningún echo/HTML adicional)
header('Content-Type: application/json; charset=utf-8');
echo json_encode([
    "tablaHTML" => $tablaHTML,
    "paginacionHTML" => $paginacionHTML
]);
exit; 
?>
-->