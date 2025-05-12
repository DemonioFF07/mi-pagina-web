<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Capital Móvil - Análisis Empresarial</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
    <div class="encabezado-flex">
        <img src="logo-transparent.png" alt="Logo Capital Móvil" class="logo">
        <div>
            <h1>Proyecto de Análisis Empresarial: Capital Móvil</h1>
            <p>Explora la evolución de las ventas y dispositivos año tras año.</p>
        </div>
    </div>
    <br>
    <img src="ims.jpg" alt="Gráfico empresarial" class="grafico">
</header>

    <section class="contenido">
        <article class="resumen">
            <h2>Resumen del Proyecto</h2>
            <p>Este sistema tiene como objetivo registrar dispositivos vendidos por Capital Móvil, analizar sus estadísticas por año, marca y condición, y generar reportes empresariales para apoyar la toma de decisiones.</p>
            <br>
            <ul>
                <li>📊 Análisis de ventas por categoría</li>
                <li>📈 Tendencias por año</li>
                <li>💼 Reportes detallados por marca y condición</li>
            </ul>
        </article>

        <div class="boton-ver-graficos-contenedor">
    <a href="grafis.html"
       class="boton-ver-graficos"
       onmouseover="this.innerText='Ir'"
       onmouseout="this.innerText='📈 Ver gráficos'">
       📈 Ver gráficos
    </a>
</div>

<a href="info.php"
       class="boton-investigacion"
       onmouseover="this.innerText='Ir'"
       onmouseout="this.innerText='Investigación sobre esta empresa'">
       🔍 Investigación sobre esta empresa
    </a>
</div>

        <article class="formulario">
            <h2>Registrar nuevo dispositivo</h2>
            <form action="registro.php" method="POST">
                <input type="text" name="nombre" placeholder="Nombre del dispositivo" required>
                <input type="text" name="marca" placeholder="Marca" required>
                <input type="text" name="categoria" placeholder="Categoría (ej. Samsung, Xiaomi)" required>
                <input type="number" name="precio" placeholder="Precio (RD$)" step="0.01" required>
                <input type="text" name="condicion" placeholder="Condición (Nuevo, Grado A...)" required>
                <button type="submit">Registrar</button>
            </form>
        </article>
    </section>

    <section class="ver-base-datos">
    <div style="text-align: center; margin: 40px 0;">
    <a href="ver_tablas.php" class="boton-ver-datos">📂 Ver base de datos</a>
    </div>
    </section>

    <footer>
        <p>© 2025 Capital Móvil. Proyecto ADR - Todos los derechos reservados.</p>
    </footer>
</body>
</html>