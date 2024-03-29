<h1 class="nombre-pagina">Iniciar Sesión</h1>
<p class="descripcion-pagina">Bienvenido</p>

<?php 
    include_once __DIR__ . "/../templates/alertas.php";
?>

<form class="formulario" method="POST" action="/" autocomplete="off">
    <div class="campo">
        <label for="email">Email</label>
        <input
            type="email"
            id="email"
            placeholder="Tu Email"
            name="email"
        />
    </div>

    <div class="campo">
        <label for="password">Password</label>
        <input 
            type="password"
            id="password"
            placeholder="Tu Password"
            name="password"
        />
    </div>

    <input type="submit" class="boton" value="Iniciar Sesión">
</form>

<div class="acciones">
    <span>¿No tienes una cuenta? <a href="/crear-cuenta" class="enlaces_auth">Regístrate</a></span>
    <a class="olvide enlaces_auth" href="/olvide">¿Has olvidado la contraseña?</a>
</div>