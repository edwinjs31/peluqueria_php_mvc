<h1 class="nombre-pagina">Actualizar Servicio</h1>
<p class="descripcion-pagina">Modifica los valores del formulario</p>

<?php
include_once __DIR__ . '/../templates/barra.php';
include_once __DIR__ . '/../templates/alertas.php';
?>

<form method="POST" class="formulario">
    <?php include_once __DIR__ . '/formulario.php'; ?>
    <input type="submit" id="btn-actualizar-servicio" class="boton" value="Actualizar">
</form>

<?php
$script = "
<script src='../build/js/alertasUI.js'></script>
<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
";
?>