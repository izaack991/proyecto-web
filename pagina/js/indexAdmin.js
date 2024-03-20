$(document).ready(function(){
    // Hacemos una solicitud AJAX para obtener el valor actualizado de la variable
    function actualizarVariable() {
        $.ajax({
            url: '../php/indexAdmin.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#cont_usuario').text(data.total_usuarios);
                $('#cont_empresa').text(data.total_empresas);
            }
        });
    }
    // Llamamos a la función para actualizar la variable cada 1 segundo
    setInterval(actualizarVariable, 1000);
});