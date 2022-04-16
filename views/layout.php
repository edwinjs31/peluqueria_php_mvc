<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Salón</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
    <div class="contenedor-app">
        <!-- imagen de fondo y el navBar -->
        <div class="imagen">
            <div class="navBar">
                <a class="active" href="/">Home</a>
                <a href="#contact">Contacto</a>
                <a href="#about">Sobre nosotros</a>
            </div>
        </div>
        <!-- contenido y funcionalidad de la app -->
        <div class="app">
            <?php echo $contenido; ?>
        </div>
    </div>

    <?php
    echo $script ?? '';
    ?>

</body>

</html>