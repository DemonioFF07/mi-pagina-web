<?php
// Conexión a la base de datos
$host = "localhost";
$user = "root";
$password = "";
$database = "capital_movil";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Orden personalizado
$orderedTables = [
    "iphone",
    "samsung",
    "motorola",
    "xiaomi",
    "infinix",
    "tecno",
    "cubot",
    "otros",
    "laptops",
    "accesorios",
    "Productos_Nuevos"
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario de Dispositivos</title>
    <style>
        body {
        background-color: #001f3f;
        color: #ffffff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 20px;
    }

    h1 {
        text-align: center;
        color: #00aced;
        margin-bottom: 40px;
    }

    h2 {
        color: #00aced;
        border-bottom: 2px solid #00aced;
        padding-bottom: 5px;
        margin-top: 40px;
        margin-bottom: 10px;
    }

    .search-box {
        margin-bottom: 15px;
        text-align: center;
    }

    .search-box input {
        padding: 8px 12px;
        width: 300px;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    table {
        width: 100%;
        margin-bottom: 40px;
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 10px;
        overflow: hidden;
        background-color: #ffffff;
        color: #000000;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #0074D9;
        color: white;
        font-weight: bold;
    }

    tr:last-child td {
        border-bottom: none;
    }

    .boton-volver-container {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 999;
}

.boton-volver-container {
    position: fixed;
    top: 20px;
    right: 20px; 
    z-index: 999;
}

.boton-volver {
    background-color: #ffffff;
    color: #001f3f;
    padding: 10px 20px;
    text-decoration: none;
    font-weight: bold;
    border-radius: 8px;
    border: 2px solid #0074D9;
    transition: background-color 0.3s ease;
    display: inline-block;
}

.boton-volver:hover {
    background-color: #0074D9;
    color: white;
}
    
    </style>
    <script>
        function buscarEnTabla(inputId, tableId) {
            let input = document.getElementById(inputId).value.toLowerCase();
            let table = document.getElementById(tableId);
            let rows = table.getElementsByTagName("tr");

            for (let i = 1; i < rows.length; i++) {
                let show = false;
                let cells = rows[i].getElementsByTagName("td");
                for (let j = 0; j < cells.length; j++) {
                    if (cells[j].textContent.toLowerCase().includes(input)) {
                        show = true;
                        break;
                    }
                }
                rows[i].style.display = show ? "" : "none";
            }
        }
    </script>
</head>
<body>
    <div style="margin: 20px 0;">
    <a href="index.php" class="boton-volver">🏠 Volver al inicio</a>
</div>

<h1>Tablas de la BD</h1>

<?php
foreach ($orderedTables as $index => $table) {
    // Verificar si existe la tabla
    $check = $conn->query("SHOW TABLES LIKE '$table'");
    if ($check->num_rows === 0) continue;

    $tableId = "tabla_" . $index;
    $inputId = "input_" . $index;

    echo "<h2>Tabla: $table</h2>";
    echo "<div class='search-box'>
            <label for='$inputId'>Buscar en $table: </label>
            <input type='text' id='$inputId' onkeyup=\"buscarEnTabla('$inputId', '$tableId')\" placeholder='Buscar modelo, marca, etc.'>
          </div>";

    $res = $conn->query("SELECT * FROM `$table`");

    if ($res && $res->num_rows > 0) {
        echo "<table id='$tableId'><tr>";
        while ($field = $res->fetch_field()) {
            echo "<th>{$field->name}</th>";
        }
        echo "</tr>";

        while ($row = $res->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No hay registros en esta tabla.</p>";
    }
}
$conn->close();
?>

</body>
</html>