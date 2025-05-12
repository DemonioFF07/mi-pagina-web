<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conexion->query("DELETE FROM productos WHERE id_producto = $id");
}

header("Location: ver_datos.php");
exit();
?>