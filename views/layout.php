<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Salón</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/build/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- <script src="lib/sweet-alert.min.js"></script> -->
    <!-- <link rel="stylesheet" type="text/css" href="lib/sweet-alert.css"> -->
</head>

<body>
    <div class="contenedor-app">
        <!-- imagen de fondo y el navBar -->
        <div class="imagen">
            <nav class="navBar">
                <ul>
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="/contacto">Contacto</a></li>
                    <li><a href="/nosotros">Sobre nosotros</a></li>
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
    <!-- form.submit(); -->
    <?php
    echo $script ?? '';
    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#btn-eliminar-cita').click(function(e) {
                e.preventDefault();
                var form = $(this).parents('form');
                Swal.fire({
                    title: 'Se borrará la cita, está seguro?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar',
                }).then((result) => {
                    if (result.value) {
                        form.submit();

                    }
                })
            });
        });
    </script>
</body>

</html>