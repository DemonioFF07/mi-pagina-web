<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Obtener datos actuales
    $resultado = $conexion->query("SELECT * FROM productos WHERE id_producto = $id");
    $producto = $resultado->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];
        $marca = $_POST['marca'];
        $categoria = $_POST['categoria'];
        $precio = $_POST['precio'];
        $condicion = $_POST['condicion'];

        // Actualizar el registro en la base de datos
        $conexion->query("UPDATE productos SET 
            nombre_producto='$nombre',
            marca='$marca',
            categoria='$categoria',
            precio='$precio',
            condicion='$condicion'
            WHERE id_producto=$id");

        header("Location: ver_datos.php");
        exit();
    }
} else {
    echo "ID no especificado.";
    exit();
}
?>

<!-- Formulario para editar -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar dispositivo</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-container label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Editar dispositivo</h2>
        <form method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?= $producto['nombre_producto'] ?>" required>

            <label for="marca">Marca:</label>
            <input type="text" name="marca" id="marca" value="<?= $producto['marca'] ?>" required>

            <label for="categoria">Categoría:</label>
            <input type="text" name="categoria" id="categoria" value="<?= $producto['categoria'] ?>" required>

            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" value="<?= $producto['precio'] ?>" required>

            <label for="condicion">Condición:</label>
            <input type="text" name="condicion" id="condicion" value="<?= $producto['condicion'] ?>" required>

            <button type="submit">Guardar cambios</button>
        </form>
    </div>
    <br><br>
<div style="text-align: center;">
    <a href="ver_datos.php" style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 8px;">
        ⬅️ Volver al inicio
    </a>
</div>
</body>
</html>