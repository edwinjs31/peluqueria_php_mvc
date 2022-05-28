<h1 class="nombre-pagina">Servicios</h1>
<p class="descripcion-pagina">Administración de Servicios</p>

<?php
include_once __DIR__ . '/../templates/barra.php';
?>

<ul class="servicios">
    <?php foreach ($servicios as $servicio) { ?>
        <li>
            <p>Nombre: <span><?php echo $servicio->nombre; ?></span> </p>
            <p>Precio: <span><?php echo $servicio->precio; ?>€</span> </p>

            <div class="acciones">
                <a class="boton" href="/servicios/actualizar?id=<?php echo $servicio->id; ?>">Actualizar</a>

                <form action="/servicios/eliminar" method="POST">
                    <input type="hidden" name="id" value="<?php echo $servicio->id; ?>">
                    <input type="submit" id="btn-aliminar-servicio" value="Eliminar" class="boton-eliminar">
                </form>
            </div>
        </li>
    <?php }
    $script = "
     <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
     <script src='build/js/alertasUI.js'></script>
 ";
    ?>
</ul>