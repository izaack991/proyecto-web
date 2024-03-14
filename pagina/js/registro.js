function RegistrarUsuario() 
{$(document).ready(function() {
    $.ajax({
        url: '../php/Usuario.php',
        method: 'POST', // o 'GET' dependiendo de lo que necesites
        data: { }, // datos opcionales que deseas enviar al archivo PHP
        success: function(response) {
            // Maneja la respuesta del archivo PHP aquí
            console.log(response);
            if (response == true) {
                Swal.fire({
                    title: 'Listo!',
                    text: 'Usuario Guardado',
                    icon: 'success'});
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'No se guardó el usuario',
                    icon: 'error'});
            }

        },
        error: function(xhr, status, error) {
            // Maneja cualquier error que ocurra durante la solicitud AJAX
            console.error(error);
        }
    });
})};