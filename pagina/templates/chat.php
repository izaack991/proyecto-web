<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Chat Flotante</title>
    <style>
        /* Contenedor del chat flotante */
        .chat-container {
            position: fixed;
            right: -300px; /* Oculto inicialmente */
            top: 15%;
            width: 300px;
            height: 400px;
            background-color: #3d3d3d; /* Temática oscura */
            border: 1px solid #3d3d3d; /* Borde oscuro */
            z-index: 10000; /* Alto valor para estar sobre otros elementos */
            transition: right 0.3s;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Sombra para efecto de profundidad */
        }

        /* Botón para abrir/cerrar el chat */
        .chat-toggle {
            position: fixed;
            right: 0px;
            top: 15%;
            padding: 10px;
            background-color: #54b689; /* Verde */
            color: white;
            border: none;
            cursor: pointer;
            z-index: 10001; /* Debe estar por encima del contenedor del chat */
        }

        /* Sección para la selección de chats */
        .chat-list {
            height: 100%; /* Ajusta el tamaño según sea necesario */
            overflow-y: auto;
            border-bottom: 1px solid #3d3d3d; /* Borde oscuro */
        }

        /* Estilo para cada chat en la lista */
        .chat-item {
            display: flex; /* Para alinear la imagen y el texto */
            align-items: center; /* Centra verticalmente */
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            cursor: pointer;
            background-color: #ffffff; /* Fondo oscuro */
            margin-bottom: 5px; /* Espaciado entre ítems */
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1); /* Sombra para efecto de profundidad */
        }

        .chat-item img {
            border-radius: 50%; /* Imagen circular */
            width: 30px;
            height: 30px; /* Tamaño ajustable */
            margin-right: 10px; /* Espaciado entre imagen y texto */
        }

        .chat-item:hover {
            background-color: #3a3a3a; /* Color al pasar el cursor */
        }

        /* Sección para mostrar mensajes */
        .chat-messages {
            height: 75%;
            overflow-y: auto;
            padding: 10px;
            display: none; /* Oculto hasta que se seleccione un chat */
        }

        /* Botón para volver a la lista de chats */
        .back-to-chats {
            display: none; /* Oculto por defecto */
            padding: 10px;
            width: 44px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            background-color: #54b689; /* Verde */
            color: white;
            cursor: pointer;
            text-align: center;
        }

        /* Estilo para mensajes recibidos y enviados */
        .message {
            display: flex; /* Para alinear imagen y texto */
            align-items: center; /* Centra verticalmente */
            padding: 10px;
            margin: 5px 0;
            border-radius: 10px;
            color: white; /* Texto blanco */
        }

        .message-received {
            background-color: #54b689; /* Verde */
            width: 90%;
            text-align: left; /* Mensajes recibidos alineados a la izquierda */
        }

        .message-sent {
            background-color: #1a1a1a; /* Fondo oscuro */
            width: 90%;
            right: 0px;
            margin-left: 10%;            
            text-align: left; /* Mensajes enviados alineados a la derecha */
        }

        /* Caja de texto para enviar mensajes */
        .message-input {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 10px;
            background-color: #333; /* Fondo oscuro */
            border-top: 1px solid #444; /* Borde oscuro */
            display: none; /* Oculto por defecto */
        }
    </style>
</head>
<body>
<!-- Botón para abrir/cerrar el chat -->
<button class="chat-toggle">
    <i id="chatAbrir" class="fas fa-comments"></i>
    <i id="chatCerrar" class="fa fa-times" aria-hidden="true"></i>
</button>
<!-- Contenedor del chat flotante -->
<div class="chat-container rounded-left rounded-top">
    <div class="headerC" style="display: flex; align-items: center; background-color: #1a1a1a;">
        <div class="back-to-chats"><i class="fas fa-arrow-left"></i></div>
        <img id="imagen" src="../../assets/images/usernoprofile.png" class="rounded-circle img-thumbnail d-block" alt="Imagen de perfil" style="width: 38px; height: 38px; margin-right: 10px; margin-left: 5px;">
        <strong id="nombrei" style="color: #54b689;">usuario</strong>
    </div>
    <div id="headerM" style="padding: 5px; padding-left: 10px; padding-right: 10px; height: 44px; background-color: #1a1a1a;">
        <input id="buscarC" name="buscarC" type="text" class="form-control" placeholder="Buscar" style="display: flex; height:99% ; width: 100%; text-align: center; color: #54b689;">
    </div>
    <div class="chat-list" id="chat-list" style="background-color: #333;">
    </div>
    <div class="chat-messages" id="chat-messages">
        Selecciona un chat para ver los mensajes
    </div>
    <div class="message-input" id="message-input" style="display: flex; align-items: center;">
        <input class="form-control" style="height: 44px; background-color: #1a1a1a; color: white; border: 1px solid #444;" type="text" id="txtmsj" placeholder="Escribe un mensaje">
        <button class="btn btn-outline-secondary" id="enviarMensajeBtn" type="button">
            <i class="fas fa-arrow-right" style="color: #54b689;"></i>
        </button>
    </div>
</div>
<script>
localStorage.removeItem("id_us");
localStorage.removeItem("id_cu");
localStorage.removeItem("idc");
localStorage.removeItem("id_m");

    const chatData = new Map();

    function obtenerConversaciones() {
        $.ajax({
            url: '../php/conversaciones.php',
            type: 'POST',
            data: { valor: 1 },
            dataType: 'json',
            success: function(response) {
                mostrarConversaciones(response);
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener conversaciones:', error);
            }
        });
    }
    
    function mostrarConversaciones(conversaciones) {
        $('.chat-list').empty();
        conversaciones.forEach(function(conversacion) {
            chatData.set(conversacion.id, {
                idc: conversacion.idc,
                ruta: conversacion.ruta,
                nombre: conversacion.nombre
            });

            const listItem = `
                <div class="chat-item" 
                    data-chat-id="${conversacion.id}" 
                    onclick="SeleccionarChat(event)">
                    <img src="${conversacion.ruta}" class="rounded-circle img-thumbnail" alt="Imagen de perfil" style="width: 30px; height: 30px; margin-right: 10px;">
                    <strong>${conversacion.nombre}</strong>
                </div>
            `;
            $('#chat-list').append(listItem);
        });
    }

    $('.headerC').hide();
    $('#chatCerrar').hide();
    $('#message-input').hide();

    $('.chat-toggle').click(function() {
        if ($('#chatCerrar').is(':hidden')) {
            $('#chatAbrir').hide();
            $('#chatCerrar').show();
        } else {
            $('#chatAbrir').show();
            $('#chatCerrar').hide();
        }

        const chatContainer = $('.chat-container');
        const currentPosition = chatContainer.css('right');

        if (currentPosition === '-300px') {
            chatContainer.css('right', '10px');
        } else {
            chatContainer.css('right', '-300px');
        }

        const chatContainerB = $('.chat-toggle');
        const currentPositionB = chatContainerB.css('right');

        if (currentPositionB === '0px') {
            chatContainerB.css('right', '310px');
        } else {
            chatContainerB.css('right', '0px');
        }
    });

    $(document).on('click', '.chat-item', function() {
        $('.headerC').show();
        $('#headerM').hide();
        const chatId = $(this).data('chat-id');
        const chatInfo = chatData.get(chatId);
        if (!chatInfo) {
            console.error('Información del chat no encontrada');
            return;
        }

        $('.chat-list').hide();
        $('.back-to-chats').show();
        $('#chat-messages').show();
        $('#message-input').show();

        document.getElementById("imagen").src = chatInfo.ruta;
        document.getElementById("nombrei").innerHTML = chatInfo.nombre;
        localStorage.setItem("idc", chatInfo.idc);

        cargarMensajes(chatId);
    });

    $('.back-to-chats').click(function() {
        localStorage.removeItem("id_m");
        localStorage.removeItem("id_cu");
        $('#headerM').show();
        $('.headerC').hide();
        $('.chat-list').show();
        $('.chat-messages').hide();
        $('#message-input').hide();
        $(this).hide();
        obtenerConversaciones();
    });

    $('#txtmsj').keypress(function(event) {
        if (event.which === 13) {
            enviarMensaje();
        }
    });

    $('#enviarMensajeBtn').click(function() {
        enviarMensaje();
    });

    function enviarMensaje() {
        const idc = localStorage.getItem("idc");
        const mensaje = $('#txtmsj').val();
        if (mensaje.trim() !== "") {
            $.ajax({
                url: '../php/mensajes.php',
                type: 'POST',
                data: { mensaje: mensaje, idc: idc },
                success: function(response) {
                    $('#txtmsj').val('');
                    // Aquí deberías actualizar los mensajes del chat
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    $('#txtmsj').val('');
                }
            });
        } else {
            console.log("caja de texto vacia");
        }
    }

    class Mensaje {
        constructor(mensaje, id_us) {
            this.id_mensaje = mensaje.id_mensaje;
            this.id_usuario = mensaje.id_usuario;
            this.mensaje = mensaje.mensaje;
            this.fecha = mensaje.fecha;
            this.id_us = id_us;
        }

        construirHTML() {
            if (this.id_usuario == this.id_us) {
                return `<div class="message message-sent">${this.mensaje}</div>`;
            } else {
                return `<div class="message message-received">${this.mensaje}</div>`;
            }
        }
    }

    function manejarError(jqXHR, textStatus, errorThrown) {
        console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
    }

    function mostrarMensajes(respuesta, id_us) {
        respuesta.forEach(function(mensaje) {
            const msg = new Mensaje(mensaje, id_us);
            $('#chat-messages').append(msg.construirHTML());
            scrollToBottom();
            if (msg.id_mensaje > id_m) {
            id_m = msg.id_mensaje;
            localStorage.setItem("id_m", id_m);
        }
        });
    }

    function realizarSolicitudAjax(data, successCallback) {
        $.ajax({
            url: '../php/conversaciones.php',
            type: 'POST',
            data: data,
            dataType: 'json',
            success: successCallback,
            error: manejarError,
        });
    }

    $(document).ready(function() {
        obtenerConversaciones();
        // Obtener el valor de `id_us`
        realizarSolicitudAjax({ valor: 4 }, function(response) {
            try {
                id_us = JSON.parse(response);
                localStorage.setItem("id_us", id_us);
            } catch (e) {
                console.error("Error al convertir a JSON:", e.message);
            }
        });
    });

    function SeleccionarChat(event) {
        const elemento = $(event.currentTarget);
        const chatId = elemento.data('chat-id');
        const chatInfo = chatData.get(chatId);

        if (chatInfo) {
            localStorage.setItem("id_cu", chatId);
            localStorage.setItem("idc", chatInfo.idc);
            document.getElementById("imagen").src = chatInfo.ruta;
            document.getElementById("nombrei").innerHTML = chatInfo.nombre;
            cargarMensajes(chatId);
        } else {
            console.error('Información del chat no encontrada');
        }
    }

    function cargarMensajes(chatId) {
        realizarSolicitudAjax({ valor: 2, id: chatId }, function(response) {
            const id_us = localStorage.getItem("id_us");
            $('#chat-messages').empty();
            mostrarMensajes(response, id_us);
        });
    }

    function actualizarMensaje() {
         id_m = localStorage.getItem("id_m") || 0;
         //console.log(id_m);
         id_cu = localStorage.getItem("id_cu");
         id_us = localStorage.getItem("id_us");
         if(id_m && id_cu){
        realizarSolicitudAjax({ valor: 3, id: id_cu, id_m: id_m }, function (respuesta) {
            mostrarMensajes(respuesta, id_us);
        });}else{
            console.log("Selecciona un chat");
        }
    }

    setInterval(actualizarMensaje, 1000);

    function scrollToBottom() {
        const chatMessages = document.getElementById('chat-messages');
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    $("#buscarC").keyup(function () {
        const query = $(this).val().toLowerCase();
        $("#chat-list").children().each(function () {
            const messageText = $(this).text().toLowerCase();
            if (messageText.indexOf(query) === -1) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    });
</script>
</body>
</html>