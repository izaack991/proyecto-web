$(document).ready(function() {
    var id_vacante = $('#id_vacante').val();
    
    $.ajax({
        url: '../php/seleccionar_vacantes.php',
        type: 'POST',
        dataType: 'json',
        data: { id_vacante: id_vacante },
        success: function(data) {
            if (data.vacante && data.vacante.length > 0) {
                $.each(data.vacante, function(index, vacante){
                    if (vacante.id_vacante == id_vacante) {
                        var card = '<div class="col">';
                        card += '<div class="card shadow p-3 mb-5 bg-body rounded" style="width: 70rem; margin:auto;">';
                        card += '<div class="card-header" style="display:flex; justify-content: space-between; align-items: center;">';
                        card += '<h5 class="card-title text-danger text-center mb-1 ">' + vacante.puesto + '</h5>';
                        card += '<h5 class="card-title text-center mb-1" style="display:inline; margin-left: 1rem;">' + vacante.empresa + '</h5>';
                        card += '</div>';
                        card += '<div class="card-body">';
                        card += '<h6 class="card-title">' + vacante.ciudad + ', ' + vacante.region + '</h6>';
                        card += '<h6 class="card-title" style="color: #54B689;">$' + vacante.sueldo + '</h6>';
                        card += '<pre align="justify" class="card-text" style="font-family: Arial;">' + vacante.datos_adicionales + '</pre>';
                        if(data.compVacante == 0) {
                            card += '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#postularseModal">Postularse</button>';
                        } else if (data.compVacante == 1) {
                            card += '<button disabled type="button" class="btn btn-secondary" data-toggle="modal" data-target="#postularseModal">Ya te has postulado a esta vacante</button>';
                        }
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
