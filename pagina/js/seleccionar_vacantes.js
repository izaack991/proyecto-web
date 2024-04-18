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
                        card += '<div class="card shadow p-3 mb-5 bg-body rounded" style="width: 70rem; margin:auto;">';
                        card += '<div class="card-body">';
                        card += '<div style="display:flex; justify-content: space-between; align-items: center;">'; // Contenedor para el título y la empresa
                        card += '<h4 class="card-title text-danger" style="display:inline;">' + vacante.puesto + '</h4>';
                        card += '<h4 class="card-title" style="display:inline; margin-left: 1rem;">' + vacante.empresa + '</h4>';
                        card += '</div>'; // Cierre del contenedor
                        card += '<h6 class="card-title">' + vacante.ciudad + ', ' + vacante.region + '</h6>';
                        card += '<h6 class="card-title" style="color: #54B689;">$' + vacante.sueldo + '</h6>';
                        card += '<pre align="justify" class="card-text" style="font-family: Arial;">' + vacante.datos_adicionales + '</pre>';
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
