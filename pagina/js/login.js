$(document).ready(function() {
    $('#login-form').submit(function(event) {
        event.preventDefault(); // Evitar el envío del formulario por defecto

        var formData = $(this).serialize(); // Obtener los datos del formulario en formato de cadena

        $.ajax({
            type: "POST",
            url: "../php/login.php",
            data: formData,
            success: function(response) {
                // Manejar la respuesta del servidor
                $('#mensaje').html(response); // Mostrar la respuesta en un elemento HTML
            }
        });
    });
});