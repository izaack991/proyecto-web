$(document).ready(function () {
    $("#buscarC").keyup(function () {
      var query = $(this).val().toLowerCase();
      $("#contenedorC").children().each(function () {
        if ($(this).text().toLowerCase().indexOf(query) === -1)
          $(this).hide();
        else
          $(this).show();
      });
    });
  });


$(document).ready(function() {
    // Hacer la solicitud AJAX al cargar la página
    obtenerConversaciones();

    function obtenerConversaciones() {
        $.ajax({
            url: '../php/conversaciones.php', // Ruta al script PHP que obtiene las conversaciones
            type: 'POST',
            data: { valor: 1 }, // Datos que se enviarán al servidor
            dataType: 'json', // Esperamos recibir datos en formato JSON
            success: function(response) {
                // Manejar la respuesta del servidor
                mostrarConversaciones(response);
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener conversaciones:', error);
            }
        });
    }
    
    function mostrarConversaciones(conversaciones) {
        // Limpiar la lista de conversaciones
        //$('.list-group').empty();

        // Iterar sobre las conversaciones recibidas y agregarlas a la lista
        conversaciones.forEach(function(conversacion) {
            
            var listItem = `
                <li class="list-group-item d-flex align-items-center" 
                    id="${conversacion.id}" 
                    idc="${conversacion.idc}"
                    scri="${conversacion.ruta}"
                    nombrei="${conversacion.nombre}"  
                    onclick="SeleccionarChat(event)">
                    <img src="${conversacion.ruta}" class="rounded-circle img-thumbnail" alt="Imagen de perfil" style="width: 50px; height: 50px; margin-right: 10px;">
                    <div>
                        <strong>${conversacion.nombre}</strong>
                        <br>
                        <small>${conversacion.fecha}</small>
                    </div>
                </li>
            `;
            $('.list-group').append(listItem);
        });
    }
});


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
    idc = localStorage.getItem("idc");
    var mensaje = $('#txtmsj').val();
    // Realizar la petición AJAX para enviar el mensaje
    $.ajax({
        url: '../php/mensajes.php',
        type: 'POST',
        data: { mensaje: mensaje,idc:idc }, // Enviar el mensaje al archivo PHP
        success: function(response) {
            // Recargar los mensajes después de enviar el mensaje
            $('#txtmsj').val('');
        },
        error: function(xhr, status, error) {
            console.error(error);
            $('#txtmsj').val('');
        }
    });
}
// Objeto para representar un mensaje
var id_m;
class Mensaje {
    constructor(mensaje, id_us) {
        this.id_mensaje = mensaje.id_mensaje;
        this.id_usuario = mensaje.id_usuario;
        this.mensaje = mensaje.mensaje;
        this.fecha = mensaje.fecha;
        this.id_us = id_us;
    }

    // Método para construir el HTML del mensaje
    construirHTML() {
    //console.log("id_cuonversacion_usuario", this.id_usuario);
    //console.log("id_usuario", this.id_us);

        if (this.id_usuario == this.id_us) {            
            // Mensaje enviado por el usuario (derecha)
            return `
                <div class="message-container-sent">
                    <div class="sent-message">
                        <p>${this.mensaje}</p>
                        <small>${this.fecha}</small>
                    </div>
                </div>`;
        } else {            

            // Mensaje recibido (izquierda)
            return `
                <div class="message-container-received">
                    <div class="received-message">
                        <p>${this.mensaje}</p>
                        <small>${this.fecha}</small>
                    </div>
                </div>`;
        }
        
    }
}

// Función para manejar errores AJAX
function manejarError(jqXHR, textStatus, errorThrown) {
    console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
}

// Función para mostrar mensajes en el chat
function mostrarMensajes(respuesta, id_us) {
    respuesta.forEach(function (mensaje) {
        const msg = new Mensaje(mensaje, id_us);
        $('#chat').append(msg.construirHTML());
        scrollToBottom();
        if (msg.id_mensaje > id_m) {
            id_m = msg.id_mensaje;
            localStorage.setItem("id_m", id_m);
        }
    });
}

// Función para realizar solicitudes AJAX
function realizarSolicitudAjax(data, successCallback) {
    $.ajax({
        url: '../php/conversaciones.php',
        type: 'POST',
        data: data,
        dataType: 'json', // Esperamos una respuesta en formato JSON
        success: successCallback,
        error: manejarError,
    });
}

// Acción inicial al cargar el documento
$(document).ready(function () {
    // Limpiar elementos en localStorage
    ["id_u", "id_cu", "id_us", "id_m"].forEach(item => localStorage.removeItem(item));

    // Obtener el valor de `id_us`
    realizarSolicitudAjax({ valor: 4 }, function (response) {
        try {
            id_us = JSON.parse(response);
           // id_us = datos.id_us; // Acceder a 'id_us'
            localStorage.setItem("id_us", id_us);
            //console.log("Error al convertir a JSON:", id_us);
        } catch (e) {
            console.error("Error al convertir a JSON:", e.message);
        }
    });
});

// Selección de chat
function SeleccionarChat(event) {
    const elemento = $(event.currentTarget);
    const id_cu = elemento.attr('id');
    const idc = elemento.attr('idc');
    const scr = elemento.attr('scri');
    const nombrei= elemento.attr('nombrei'); // Obtiene el ID de la conversación
    //console.log("ID_cu de la conversación seleccionada:", id_cu);
    //console.log("ID_cu de la conversación seleccionada:", idc);
    //console.log("ID_cu de la conversación seleccionada:", scr);
    //console.log("ID_cu de la conversación seleccionada:", nombrei);


    localStorage.setItem("id_cu", id_cu);
    localStorage.setItem("idc", idc);
    document.getElementById("imagen").src = scr;
    document.getElementById("nombrei").innerHTML = nombrei;

    cargarMensajes(id_cu);
}

// Carga mensajes según el ID de conversación
function cargarMensajes(id_cu) {
     id_us = localStorage.getItem("id_us");

    realizarSolicitudAjax({ valor: 2, id: id_cu }, function (respuesta) {
        $('#chat').empty(); // Limpiar el área del chat
        mostrarMensajes(respuesta, id_us); // Mostrar los mensajes
    });
}

// Actualiza mensajes periódicamente
function actualizarMensaje() {
     id_m = localStorage.getItem("id_m") || 0;
     id_cu = localStorage.getItem("id_cu");
    const id_us = localStorage.getItem("id_us");
    console.log('utlimo_mensaje',id_m);
    realizarSolicitudAjax({ valor: 3, id: id_cu, id_m: id_m }, function (respuesta) {
        mostrarMensajes(respuesta, id_us); // Mostrar los mensajes
    });
}

// Configura el intervalo para actualizar mensajes
setInterval(actualizarMensaje, 1000);

const cardBody = document.getElementById('chat');

// Función para desplazar al final del card-body
function scrollToBottom() {
    cardBody.scrollTop = cardBody.scrollHeight;
}