<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación</title>
    <style>
        body {
            background-image: url('fondo.jpg');
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .cuadro {
            background-color: rgba(0, 0, 0, 0.75);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px #000;
            text-align: center;
        }
        .cuadro h2 {
            margin-bottom: 20px;
            color: #4efc5a;
        }
    </style>
</head>
<body>
    <div class="cuadro">
        <h2>Datos Enviados</h2>
        <p><strong>Nombre:</strong> <?= $_GET['nombre'] ?></p>
        <p><strong>Marca:</strong> <?= $_GET['marca'] ?></p>
        <p><strong>Categoría:</strong> <?= $_GET['categoria'] ?></p>
        <p><strong>Precio:</strong> <?= $_GET['precio'] ?></p>
        <p><strong>Condición:</strong> <?= $_GET['condicion'] ?></p>
        <hr>
        <p><em>✅ Datos enviados con éxito</em></p>
        <br>
        <a href="ver_datos.php" style="color: #fff;">Ver todos los datos</a>
    </div>
</body>
</html>