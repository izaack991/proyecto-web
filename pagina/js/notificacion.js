$(document).ready(function(){
    // Hacemos una solicitud AJAX para obtener el valor actualizado de la variable
    function actualizarVariable() {
        $.ajax({
            url: '../php/notificacion.php',
            success: function(data) {
                // Actualizamos el contenido de la etiqueta <a> con el valor obtenido
                if (data == 1 ){
                    $('#notpos').text('Tienes ' + data + ' postulacion pendiente');
                }
                if (data >= 2 ){
                    $('#notpos').text('Tienes ' + data + ' postulaciones pendientes');
                }
                if (data >=1) {
                    $('#contador').html('<span class="fa-layers-counter" id="notifi" style="background:Tomato;border-radius:0.3rem;padding-left:0.2rem;padding-right:0.2rem">'+data+'</span>');
                }
            }
        });
    }
    // Llamamos a la función para actualizar la variable cada 1 segundo
    setInterval(actualizarVariable, 1000);
});