$(document).ready(function() {
    cargarMensajes();

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
                            '<div class="message-container-sent"><div class="sent-message">' +
                            '<p>' + response.mensaje1[i] + '</p>' +
                            '<small>' + response.fecha1[i] + '</small>' +
                            '</div></div>'
                        );
                    }
                    // Agregar mensaje recibido si existe
                    if (response.mensaje2[i]) {
                        $('#chat').append(
                            '<div class="message-container-received"><div class="received-message">' +
                            '<p>' + response.mensaje2[i] + '</p>' +
                            '<small style="text-align: right;">' + response.fecha2[i] + '</small>' +
                            '</div></div>'
                        );
                    }
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
});
