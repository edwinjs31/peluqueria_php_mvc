document.addEventListener('DOMContentLoaded', function (event) {
    cambiarImagen();
});

function cambiarImagen() {
    var fondo = document.getElementById('fondo-imagen');
    fondo.style.backgroundImage = 'url(../build/img/imagen' + (Math.floor(Math.random() * 9) + 1) + '.jpg)';
    fondo.style.backgroundSize = 'cover';
    fondo.style.backgroundPosition = 'center center';
    fondo.style.backgroundRepeat = 'no-repeat';
}
