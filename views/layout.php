<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Salón</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/build/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>
    <div class="contenedor-app">
        <!-- imagen de fondo y el navBar -->
        <div class="imagen">
            <nav class="nav">
                <input class="nav__trigger-input" type="checkbox" id="trigger" aria-label="open the navigation" />
                <label class="nav__trigger-finger" for="trigger">
                    <span></span>
                </label>
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="/" class="nav__link">
                            <span class="nav__text">
                            <i class="fa-solid fa-house"></i>
                            </span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="/nosotros" class="nav__link">
                            <span class="nav__text">
                                Nosotros
                            </span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="/contacto" class="nav__link">
                            <span class="nav__text">
                                Contacto
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- <div class="navBar">
                <a class="active" href="/"><i class="fa-solid fa-house"></i></a>
                <a href="/contacto">Contacto</a>
                <a href="/contacto">Contacto</a>
            </div> -->
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