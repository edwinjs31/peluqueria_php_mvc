document.addEventListener('DOMContentLoaded', function () {
    const btnEliminarCita = document.getElementById('btn-eliminar-cita');
    if (btnEliminarCita) {
        btnEliminarCita.addEventListener('click', function (e) {
            e.preventDefault();
            const form = e.target.form;
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
            });
        });
    }
});
