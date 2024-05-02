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
        console.log("id_conversacion_usuario", this.id_usuario);
    console.log("id_usuario", this.id_us);

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
    ["id_u", "id_c", "id_us", "id_m"].forEach(item => localStorage.removeItem(item));

    // Obtener el valor de `id_us`
    realizarSolicitudAjax({ valor: 4 }, function (response) {
        try {
            id_us = JSON.parse(response);
           // id_us = datos.id_us; // Acceder a 'id_us'
            localStorage.setItem("id_us", id_us);
            console.log("Error al convertir a JSON:", id_us);
        } catch (e) {
            console.error("Error al convertir a JSON:", e.message);
        }
    });
});

// Selección de chat
function SeleccionarChat(event) {
    const elemento = $(event.currentTarget);
    const id_c = elemento.attr('id'); // Obtiene el ID de la conversación
    console.log("ID_c de la conversación seleccionada:", id_c);
    localStorage.setItem("id_c", id_c);

    cargarMensajes(id_c);
}

// Carga mensajes según el ID de conversación
function cargarMensajes(id_c) {
     id_us = localStorage.getItem("id_us");

    realizarSolicitudAjax({ valor: 2, id: id_c }, function (respuesta) {
        $('#chat').empty(); // Limpiar el área del chat
        mostrarMensajes(respuesta, id_us); // Mostrar los mensajes
    });
}

// Actualiza mensajes periódicamente
function actualizarMensaje() {
     id_m = localStorage.getItem("id_m") || 0;
     id_c = localStorage.getItem("id_c");
    const id_us = localStorage.getItem("id_us");
    console.log('utlimo_mensaje',id_m);
    realizarSolicitudAjax({ valor: 3, id: id_c, id_m: id_m }, function (respuesta) {
        mostrarMensajes(respuesta, id_us); // Mostrar los mensajes
    });
}

// Configura el intervalo para actualizar mensajes
setInterval(actualizarMensaje, 1000);
