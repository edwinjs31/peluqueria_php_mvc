<h1 class="nombre-pagina">Información general</h1>

<div class="info_empresa">
    <ul class="">
        <li><i class="fa fa-map-marker"></i> Av. Constitución 14, 30550 Abarán-Murcia </li>
        <li><i class="fa fa-mobile"></i> 961 664 030</li>
        <li><i class="fa-brands fa-whatsapp"></i> 686 045 069</li>
        <li><i class="fa fa-envelope"></i> bluevelvetpeluqueria@gmail.com</li>
        <li></li>
    </ul>
</div>

<?php
include_once __DIR__ . "/../templates/alertas.php";
?>

<form class="formulario" accept-charset="utf-8" method="POST" action="/formulario-contacto" enctype="multipart/form-data" autocomplete="off">

    <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Tu Nombre" />
    </div>

    <div class="campo">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="Tu E-mail" />
    </div>
    <div class="campo">
        <label for="asunto">Asunto</label>
        <input type="text" id="asunto" name="asunto" placeholder="El asunto" />
    </div>

    <div class="campo">
        <label for="mensaje">Escribe tu mensaje aquí:</label>
        <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea>

    </div>

    <input type="submit" value="Enviar" class="boton">

</form>