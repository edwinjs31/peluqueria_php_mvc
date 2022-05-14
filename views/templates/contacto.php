
<h1 class="nombre-pagina">Contacto</h1>

<div class="info-empresa">
    <h3>AppSalon</h3>
    <ul class="servicios">
        <li><i class="fa fa-map-marker"></i> Calle Constitución </li>
        <li><i class="fa fa-mobile"></i> 555 555 000</li>
        <li><i class="fa fa-envelope"></i> info@empresa.com</li>
    </ul>
</div>

<?php
include_once __DIR__ . "/../templates/alertas.php";
?>

<form class="formulario" method="POST" action="">

    <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Tu Nombre" value="" />
    </div>


    <div class="campo">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="Tu E-mail" value="" />
    </div>

    <div class="campo">
        <label for="mensaje">Escribe tu mensaje aquí:</label>
        <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea>

    </div>


    <input type="submit" value="Enviar" class="boton">


</form>