//ajax para cargar el select de pais
$(document).ready(function(){
    $.ajax({
        url: '../php/buscar_pais.php',
        type: 'POST',
        dataType: 'json',
        success: function(data) {
            if(data.error) {
                console.error('Error al buscar países:', data.error);
            } else {
                $.each(data, function(index, pais) {
                    $('#region').append('<option value="' + pais.id_paises + '">' + pais.nombre + '</option>');
                });
            }
        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
});
