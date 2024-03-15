$(document).ready(function(){
    // Hacemos una solicitud AJAX para obtener el valor actualizado de la variable
    function actualizarVariable() {
        $.ajax({
            url: '../php/notificacion_empresa.php',
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                // Actualizamos el contenido de la etiqueta <a> con el valor obtenido
                if (data.contador == 1 ){
                    $('#notpos').text('Tienes ' + data.contador + ' postulacion pendiente');
                }
                if (data.contador >= 2 ){
                    $('#notpos').text('Tienes ' + data.contador + ' postulaciones pendientes');
                }
                if (data.contador >= 1) {
                    $('#contador').html('<span class="fa-layers-counter" id="notifi" style="background:Tomato;border-radius:0.3rem;padding-left:0.2rem;padding-right:0.2rem">'+data.contador+'</span>');
                }
                $("#nombreUsuario").text(data.nombreUsuario);
            }
        });
    }
    // Llamamos a la función para actualizar la variable cada 1 segundo
    setInterval(actualizarVariable, 1000);
});