document.addEventListener('DOMContentLoaded', function () {
    
    const btnEliminarCita = document.getElementById('btn-eliminar-cita');
    const btnEliminarServicio = document.getElementById('btn-aliminar-servicio');

    if (btnEliminarCita) {
        btnEliminarCita.addEventListener('click', function (e) {
            e.preventDefault();
            const form = e.target.form;
            title = 'Se borrará la cita, está seguro?';
            icon = 'warning';
            alertaModal(title, icon, form);
        });
    }

    if (btnEliminarServicio) {
        btnEliminarServicio.addEventListener('click', function (e) {
            e.preventDefault();
            const form = e.target.form;
            title = 'Se borrará el servicio, está seguro?';
            icon = 'warning';
            alertaModal(title, icon, form);
        });
    }
});

function alertaModal(titulo, icono, formulario) {
    Swal.fire({
        title: titulo,
        icon: icono,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Eliminar',
    })
        .then((result) => {
            if (result.value) {
                formulario.submit();
            }
        })
        .then(() => {
            Swal.fire('Eliminado!', 'El registro ha sido eliminado.', 'success');
        });
}
