document.addEventListener('DOMContentLoaded', function () {
    iniciar();
});

function iniciar() {
    confirmacionEliminarCita();
    confirmacionEliminarServicio();
    actualizarServicio();
    guardarServicio();
}

function confirmacionEliminarCita() {
    const botones = document.querySelectorAll('.boton-eliminar');
    botones.forEach(function (boton) {
        boton.addEventListener('click', function (e) {
            e.preventDefault();
            const form = e.target.form;
            title = 'Se borrará la cita, está seguro?';
            icon = 'warning';
            confirmacionModal(title, icon, form);
        });
    });
}

function confirmacionEliminarServicio() {
    const btnEliminarServicio = document.getElementById('btn-aliminar-servicio');

    if (btnEliminarServicio) {
        btnEliminarServicio.addEventListener('click', function (e) {
            e.preventDefault();
            const form = e.target.form;
            title = 'Se borrará el servicio, está seguro?';
            icon = 'warning';
            confirmacionModal(title, icon, form);
        });
    }
}

//Sin implementar
function actualizarServicio() {
    const btnActualizarServicio = document.getElementById('btn-actualizar-servicio');

    if (btnActualizarServicio) {
        btnActualizarServicio.addEventListener('click', function (e) {
            e.preventDefault();
            const form = e.target.form;
            title = 'Actualizando servicio...';
            text = 'Por favor espere...';
            alertaModal(form, title, text);
        });
    }
}

function guardarServicio() {
    const btnGuardarServicio = document.getElementById('btn-guardar-servicio');

    if (btnGuardarServicio) {
        btnGuardarServicio.addEventListener('click', function (e) {
            e.preventDefault();
            const form = e.target.form;
            title = 'Guardando servicio...';
            text = 'Por favor espere...';
            alertaModal(form, title, text);
        });
    }
}

function confirmacionModal(titulo, icono, formulario) {
    Swal.fire({
        title: titulo,
        icon: icono,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Eliminar',
    }).then((result) => {
        if (result.value) {
            formulario.submit();
        }
    });
}

function alertaModal(formulario, titulo, texto) {
    Swal.fire({
        title: titulo,
        text: texto,
        icon: 'info',
        allowOutsideClick: false,
    });
    Swal.showLoading();
    setTimeout(function () {
        formulario.submit();
    }, 1000);
}
