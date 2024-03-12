$(document).ready(function(){
    // Hacemos una solicitud AJAX para obtener el valor actualizado de la variable
    function actualizarVariable() {
        $.ajax({
            url: '../php/notificacion.php',
            success: function(data) {
                // Actualizamos el contenido de la etiqueta <a> con el valor obtenido
                $('#notpos').text('Tienes ' + data + ' postulaciones pendientes');
                $('#notifi').text(data);
            }
        });
    }

    // Llamamos a la función para actualizar la variable cada 1 segundo
    setInterval(actualizarVariable, 1000);
});