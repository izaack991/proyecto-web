$(document).ready(function(){
    $.ajax({
        url: "../php/Buscar_vacantes.php",
        type: "POST",
        dataType: "json", // Especifica el tipo de datos que esperas recibir
        success: function(data){
            // Éxito: procesar los datos recibidos
            if (data.length > 0) {
                // Recorrer el arreglo y agregar tarjetas al contenedor
                $.each(data, function(index, vacante){
                    // Construir la estructura de la tarjeta
                    var card = '<div class="col-lg-4 col-md-6 col-sm-12">';
                            card += '<div class="card border-primary shadow p-3 mb-5 bg-body rounded">';
                            card += '<div class="card-body">';
                            card += '<h4 class="card-title text-danger">' + vacante.puesto + '</h4>';
                            card += '<h5 class="card-title">' + vacante.empresa + '</h5>';
                            card += '<h6 class="card-title">' + vacante.region + '</h6>';
                            card += '<p class="card-text">' + vacante.datos_adicionales + '</p>';
                            card += '<form action="seleccionar_vacantes.php" method="POST">';
                            card += '<input type="text" value="'+vacante.id_vacante+'" name="id_vacante" id="id_vacante" hidden>';
                            card += '<input type="submit" value="Leer más" class="btn btn-primary">';
                            card += '</form></div></div></div>';

                    // Agregar la tarjeta al contenedor
                    $('#vacantesContainer').append(card);
                });
            } else {
                // No se encontraron vacantes
                $('#vacantesContainer').html('No se encontraron vacantes.');
            }
        },
        error: function(xhr, status, error){
            // Error al llamar al script PHP
            console.error(xhr.responseText);
        }
    });

});
