window.onload = function verificarSesion() {
    $.ajax({
        url: '../php/sesion.php',
        type: 'POST',
        success: function (response) {
            console.log(response);
            if (response == 'no_user') {
                Swal.fire({
                    title: 'Error!',
                    text: 'No hay una sesión iniciada',
                    icon: 'error'
                }).then(function () {
                    window.location.href = 'https://www.workele.com';
                });
            }
        }
    });
}