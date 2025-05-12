<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['clave'] == '265') {
    $_SESSION['autenticado'] = true;
}

if (!isset($_SESSION['autenticado'])) {
?>
 <div class="circulo" >
    <form method="POST">
        <h3>Ingrese la contraseña para ver los datos:</h3>
        <input type="password" name="clave" required>
        <button type="submit">Entrar</button>
    </form>
    </div>
<?php
    exit();
}

// Mostrar datos si está autenticado
$resultado = $conexion->query("SELECT * FROM Productos_Nuevos");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver datos</title>
    <style>
        body { font-family: Arial; background: #eef2f5; padding: 30px; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { padding: 12px; border: 1px solid #ccc; }
        th { background: #333; color: white; }
        a { text-decoration: none; color: red; }
        .botones a { margin: 0 10px; }
    </style>
</head>
<body>
    <h2>📋 Registros en la base de datos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Condición</th>
            <th>Acciones</th>
        </tr>
        <?php while($row = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id_producto'] ?></td>
            <td><?= $row['nombre_producto'] ?></td>
            <td><?= $row['marca'] ?></td>
            <td><?= $row['categoria'] ?></td>
            <td><?= $row['precio'] ?></td>
            <td><?= $row['condicion'] ?></td>
            <td class="botones">
                <a href="editar.php?id=<?= $row['id_producto'] ?>">Editar</a>
                <a href="eliminar.php?id=<?= $row['id_producto'] ?>" onclick="return confirm('¿Seguro que deseas eliminar este registro?');">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br><br>
<div style="text-align: center;">
    <a href="index.php" style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 8px;">
        ⬅️ Volver al inicio
    </a>
</div>
</body>
</html>