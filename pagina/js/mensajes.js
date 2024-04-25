// ajax.js

$(document).ready(function() {
    // Realizar la solicitud AJAX para obtener la variable desde el servidor
    $.ajax({
        url: '../php/conversaciones.php',  // Ruta del archivo PHP
        type: "POST",
        data: {valor: 4},           // Envío de datos
        success: function(response) {
          console.log("Respuesta recibida:", response);
      
          try {
            // Intentar parsear la respuesta a JSON
            var datos = JSON.parse(response);
            var id_us = datos.id_us; // Acceder a 'id_us' del objeto
            console.log("Valor recibido:", id_us);                    
            localStorage.setItem("id_us", id_us);
            
          } catch (e) {
            console.error("Error al convertir a JSON:", e.message); // Manejo del error de parseo
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.error("Error al obtener datos:", textStatus, errorThrown);
        }
      });
});

function SeleccionarChat(event) {
    var elemento = $(event.currentTarget);
    var id_c = elemento.attr('id'); // Obtiene el ID_c de la conversación
    console.log("ID_c de la conversación seleccionada:", id_c);
    localStorage.setItem("id_c", id_c);

    cargarMensajes(id_c);
    // Aquí puedes hacer lo que necesites con el ID de la conversación
}
$(document).ready(function() {
    cargarMensajes();
});


    function actualizarMensaje() {
        var id_m = localStorage.getItem("id_m"); // Inicializar la variable para almacenar el último ID de mensaje
        var id_c = localStorage.getItem("id_c");        
        var id_us = localStorage.getItem("id_us");        

        $.ajax({
            url: '../php/conversaciones.php', // El archivo PHP que contiene la función buscarMensaje
            type: 'POST', // Método de solicitud (puede ser GET o POST según tu lógica)
            data: {
    
                valor: 2, id:id_c,id_m:id_m
            },
            dataType: 'json', // Esperamos una respuesta en formato JSON
            success: function(respuesta) {
                // Limpiar el área del chat
                $('#chat').empty();
    
                // Iterar sobre los datos y construir el HTML para cada mensaje
                respuesta.forEach(function(mensaje) {
                    if (mensaje.id_usuario == id_us) {
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
                    if (mensaje.id_mensaje > id_m) {
                        id_m = mensaje.id_mensaje; // Guardar el ID más alto
                    }
                    else    {
                        localStorage.setItem("id_m", id_m);
                    }
                });
    
                console.log('Último ID de mensaje:', id_m);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error al cargar mensajes: ', textStatus, errorThrown);
            }
        });
    }

    // Llamamos a la función para actualizar la variable cada 1 segundo
    setInterval(actualizarMensaje, 1000);


var id_usuario = 123; // El ID del usuario

// Función para cargar mensajes
function cargarMensajes(id_c) {
    var id_m = 0; // Inicializar la variable para almacenar el último ID de mensaje
    var id_us = localStorage.getItem("id_us");        

    $.ajax({
        url: '../php/conversaciones.php', // El archivo PHP que contiene la función buscarMensaje
        type: 'POST', // Método de solicitud (puede ser GET o POST según tu lógica)
        data: {

            valor: 2, id:id_c
        },
        dataType: 'json', // Esperamos una respuesta en formato JSON
        success: function(respuesta) {
            // Limpiar el área del chat
            $('#chat').empty();
            // Iterar sobre los datos y construir el HTML para cada mensaje
            respuesta.forEach(function(mensaje) {
                if (mensaje.id_usuario == id_us) {
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
                if (mensaje.id_mensaje > id_m) {
                    id_m = mensaje.id_mensaje; // Guardar el ID más alto
                }
                else    {
                    localStorage.setItem("id_m", id_m);
                }
            });

            console.log('Último ID de mensaje:', id_m);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error al cargar mensajes: ', textStatus, errorThrown);
        }
    });
}

window.onbeforeunload = function() {
localStorage.removeItem("id_u");
localStorage.removeItem("id_c");
localStorage.removeItem("id_us");
};