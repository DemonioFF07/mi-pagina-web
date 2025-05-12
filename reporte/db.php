<?php
$host = 'localhost';
$usuario = 'root';
$contraseña = '';
$bd = 'capital_movil';

$conexion = new mysqli($host, $usuario, $contraseña, $bd);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}