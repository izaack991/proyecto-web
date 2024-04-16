$(document).ready(function(){
    function actualizarVariable() {
        $.ajax({
            url: '../php/notificacion_estudiante.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data.contador >=1) {
                    $('#contador').html('<span class="fa-layers-counter" id="notifi" style="background:Tomato;border-radius:0.3rem;padding-left:0.2rem;padding-right:0.2rem">'+data.contador+'</span>');
                }else {
                    $('#contador').empty();
                    $('#contador_exp').empty();
                    $('#contador_for').empty();
                    $('#contador_afi').empty();
                    $('#contador_int').empty();
                    $('#contador_not').html('No tiene notificaciones en este momento');
                }
                // if (data.contador_exp >= 1) {
                //     $('#contador_exp').html('<a class="link-primary" href="experiencia_laboral.php">Aun no ha registrado sus datos de Experiencia Laboral, click aqui para ir al registro</a>');
                // }
                // if (data.contador_for >= 1) {
                //     $('#contador_for').html('<a class="link-primary" href="formacion_academica.php">Aun no ha registrado sus datos de Formación Academica, click aqui para ir al registro</a>');
                // }
                // if (data.contador_afi >= 1) {
                //     $('#contador_afi').html('<a class="link-primary" href="aficiones.php">Aun no ha registrado sus datos de Aficiones, click aqui para ir al registro</a>');
                // }
                // if (data.contador_int >= 1) {
                //     $('#contador_int').html('<a class="link-primary" href="interes.php">Aun no ha registrado sus datos de Interes, click aqui para ir al registro</a>');
                // }
                $('#nombreUsuario').text(data.nombreUsuario);
            }
        });
    }

    // Llamamos a la función para actualizar la variable cada 1 segundo
    setInterval(actualizarVariable, 1000);
});