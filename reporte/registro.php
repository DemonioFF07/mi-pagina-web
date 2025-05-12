<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];
    $condicion = $_POST['condicion'];

    $sql = "INSERT INTO Productos_Nuevos (nombre_producto, marca, categoria, precio, condicion)
            VALUES ('$nombre', '$marca', '$categoria', '$precio', '$condicion')";

    if ($conexion->query($sql) === TRUE) {
        header("Location: confirmacion.php?nombre=$nombre&marca=$marca&categoria=$categoria&precio=$precio&condicion=$condicion");
        exit();
    } else {
        echo "Error: " . $conexion->error;
    }

    $conexion->close();
}
?>