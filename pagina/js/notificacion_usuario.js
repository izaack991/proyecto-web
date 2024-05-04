$(document).ready(function () {
    function actualizarVariable() {
        $.ajax({
            url: '../php/notificacion_usuario.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.contador >= 1) {
                    $('#contador').html('<span class="fa-layers-counter" id="notifi" style="background:Tomato;border-radius:0.3rem;padding-left:0.2rem;padding-right:0.2rem">' + data.contador + '</span>');
                } else {
                    $('#contador').empty();
                    $('#contador_exp').empty();
                    $('#contador_for').empty();
                    $('#contador_afi').empty();
                    $('#contador_int').empty();
                    $('#contador_not').html('No tiene notificaciones en este momento');
                }
                if (data.contador_exp >= 1) {
                    $('#contador_exp').show();
                } else {
                    $('#contador_exp').hide();
                }
                if (data.contador_for >= 1) {
                    $('#contador_for').show();
                } else {
                    $('#contador_for').hide();
                }
                if (data.contador_afi >= 1) {
                    $('#contador_afi').show();
                } else {
                    $('#contador_afi').hide();
                }
                if (data.contador_int >= 1) {
                    $('#contador_int').show();
                } else {
                    $('#contador_int').hide();
                }
                $('#nombreUsuario').text(data.nombreUsuario);
                $('#nombreUsuario2').text(data.nombreUsuario);
            }
        });
    }

    // Llamamos a la función para actualizar la variable cada 1 segundo
    setInterval(actualizarVariable, 1000);
});
