function cargarConversaciones() {
var valor = 1;    
$.ajax({
        url: 'obtener_conversaciones.php', // Cambia 'obtener_conversaciones.php' por la ruta correcta a tu script PHP que maneja la solicitud de datos
        type: 'GET',
        dataType: 'json', // Esperamos recibir datos en formato JSON
        data: {valor: valor},
        success: function(response) {
            // Manejar la respuesta del servidor
            if (response.success) {
                // Limpiar la lista de conversaciones antes de agregar nuevas
                $('#lista-conversaciones').empty();

                // Iterar sobre las conversaciones recibidas y agregarlas a la lista
                response.conversaciones.forEach(function(conversacion) {
                    // Crear el elemento de la lista de conversaciones
                    var listItem = $('<li class="list-group-item d-flex align-items-center"></li>');

                    // Agregar la imagen del perfil
                    var profileImage = $('<img src="' + conversacion.imagenPerfil + '" class="rounded-circle img-thumbnail" alt="Imagen de perfil" style="width: 50px; height: 50px; margin-right: 10px;">');
                    listItem.append(profileImage);

                    // Agregar el nombre del usuario y el mensaje
                    var userInfo = $('<div><strong>' + conversacion.nombreUsuario + '</strong><br><small>' + conversacion.ultimoMensaje + '</small></div>');
                    listItem.append(userInfo);

                    // Agregar el ID de usuario 1
                    var userId1 = $('<input type="hidden" name="userId1" value="' + conversacion.idUsuario1 + '">');
                    listItem.append(userId1);

                    // Agregar el elemento de lista a la lista de conversaciones
                    $('#lista-conversaciones').append(listItem);
                });
            } else {
                // Manejar errores si la solicitud no tiene éxito
                console.error('Error al cargar las conversaciones:', response.error);
            }
        },
        error: function(xhr, status, error) {
            // Manejar errores de la solicitud AJAX
            console.error('Error al cargar las conversaciones:', error);
        }
    });
}

// Llamar a la función para cargar las conversaciones al cargar la página
$(document).ready(function() {
    cargarConversaciones();
});
