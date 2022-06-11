<h1 class="nombre-pagina">Restablecer contraseña</h1>
<p class="descripcion-pagina">Ingrese la nueva contraseña:</p>

<?php
include_once __DIR__ . "/../templates/alertas.php";
?>

<?php if ($error) return; ?>
<form class="formulario" method="POST">
    <div class="campo">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Tu Nuevo Password" />
    </div>
    <input type="submit" class="boton" value="Enviar">

</form>

<div class="acciones">
    <a href="/" class="enlaces_auth">Volver al inicio de sesión</a>
    <a href="/crear-cuenta" class="enlaces_auth">Crear cuanta nueva</a>
</div>