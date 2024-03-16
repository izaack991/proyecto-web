$(document).ready(function() {
    var id_vacante = $('#id_vacante').val();
    
    $.ajax({
        url: '../php/seleccionar_vacantes.php',
        type: 'POST',
        dataType: 'json',
        data: { id_vacante: id_vacante },
        success: function(data) {
            if (Array.isArray(data) && data.length > 0) {
                $.each(data, function(index, vacante){
                    if (vacante.id_vacante == id_vacante) {
                        var card = '<div class="col">';
                        card += '<div class="card border-primary shadow p-3 mb-5 bg-body rounded" style="width: 25rem; margin:auto;">';
                        card += '<div class="card-body">';
                        card += '<h4 class="card-title, text-danger" style="display:inline;">' + vacante.puesto + '</h4><br><br>';
                        card += '<h4 class="card-title" style="display:inline;">' + vacante.empresa + '</h4><br><br>';
                        card += '<p align="justify" class="card-text">' + vacante.datos_adicionales + '</p>';
                        card += '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#postularseModal">Postularse</button>';
                        card += '</div></div></div>';
                        $('#vacantesContainer').append(card);
                    }
                });
            } else {
                $('#vacantesContainer').html('No se encontraron vacantes.');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error al ejecutar PHP:', error);
        }
    });
});
