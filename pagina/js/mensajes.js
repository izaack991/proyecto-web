function SeleccionarChat(event) {
    var id = $(event.currentTarget).data('conversacion-id'); // Obtiene el ID de la conversación
    console.log("ID de la conversación seleccionada:", id);
    cargarMensajes(id);
    // Aquí puedes hacer lo que necesites con el ID de la conversación
}
$(document).ready(function() {
    cargarMensajes();
});

$(document).ready(function(){
    function actualizarMensaje() {
        $.ajax({
            url: '../php/notificacion_usuario.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                 {
            }}
        });
    }

    // Llamamos a la función para actualizar la variable cada 1 segundo
    setInterval(actualizarMensaje, 1000);
});

var id_empresa = 2; // El ID de la empresa
var id_usuario = 123; // El ID del usuario

// Función para cargar mensajes
function cargarMensajes(id) {
    var id_u = 0; // Inicializar la variable para almacenar el último ID de mensaje

    $.ajax({
        url: '../php/conversaciones.php', // El archivo PHP que contiene la función buscarMensaje
        type: 'POST', // Método de solicitud (puede ser GET o POST según tu lógica)
        data: {

            valor: 2, id:id
        },
        dataType: 'json', // Esperamos una respuesta en formato JSON
        success: function(respuesta) {
            // Limpiar el área del chat
            $('#chat').empty();

            // Iterar sobre los datos y construir el HTML para cada mensaje
            respuesta.forEach(function(mensaje) {
                if (mensaje.id_usuario == id_usuario) {
                    // Mensaje enviado por el usuario (derecha)
                    $('#chat').append(
                        '<div class="message-container-sent"><div class="sent-message">' +
                        '<p>' + mensaje.mensaje + '</p>' +
                        '<small>' + mensaje.fecha + '</small>' +
                        '</div></div>'
                    );
                } else {
                    // Mensaje recibido (izquierda)
                    $('#chat').append(
                        '<div class="message-container-received"><div class="received-message">' +
                        '<p>' + mensaje.mensaje + '</p>' +
                        '<small>' + mensaje.fecha + '</small>' +
                        '</div></div>'
                    );
                }
                // Actualizar el último ID de mensaje
                if (mensaje.id_mensaje > id_u) {
                    id_u = mensaje.id_mensaje; // Guardar el ID más alto
                }
                else    {
                    alert(id_u);
                }
            });

            console.log('Último ID de mensaje:', id_u);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error al cargar mensajes: ', textStatus, errorThrown);
        }
    });
}

