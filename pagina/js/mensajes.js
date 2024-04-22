$(document).ready(function() {
    // Cargar mensajes al cargar la página
    cargarMensajes();

    // Función para cargar mensajes
    function cargarMensajes() {
        $.ajax({
            url: '../php/mensajes.php',
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                // Limpiar el contenedor de mensajes antes de agregar nuevos mensajes
                $('#chat').empty();

                // Iterar sobre los mensajes recibidos y enviados
                for (var i = 0; i < Math.max(response.mensaje1.length, response.mensaje2.length); i++) {
                    // Agregar mensaje enviado si existe
                    if (response.mensaje1[i]) {
                        $('#chat').append(
                            '<div class="sent-message">' +
                            '<p>' + response.mensaje1[i] + '</p>' +
                            '<small>' + response.fecha1[i] + '</small>' +
                            '</div>'
                        );
                    }
                    // Agregar mensaje recibido si existe
                    if (response.mensaje2[i]) {
                        $('#chat').append(
                            '<div class="received-message">' +
                            '<p>' + response.mensaje2[i] + '</p>' +
                            '<small style="text-align: right;">' + response.fecha2[i] + '</small>' +
                            '</div>'
                        );
                    }
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    // Evento al presionar Enter en el input
    $('#txtmsj').keypress(function(event) {
        if (event.which === 13) { // 13 es el código de la tecla Enter
            enviarMensaje();
        }
    });

    // Evento al hacer clic en el botón de enviar
    $('#enviarMensajeBtn').click(function() {
        enviarMensaje();
    });

    // Función para enviar el mensaje mediante AJAX
    function enviarMensaje() {
        var mensaje = $('#txtmsj').val(); // Obtener el mensaje del input

        // Realizar la petición AJAX para enviar el mensaje
        $.ajax({
            url: '../php/mensajes.php',
            type: 'POST',
            data: { mensaje: mensaje }, // Enviar el mensaje al archivo PHP
            success: function(response) {
                // Recargar los mensajes después de enviar el mensaje
                cargarMensajes();
                // Limpiar el input después de enviar el mensaje
                $('#txtmsj').val('');
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
});
