// $(document).ready(function(){
//     $.ajax({
//         url: "../php/Buscar_vacantes.php",
//         type: "POST",
//         dataType: "json",
//         success: function(data){
//             if (data.length > 0) {
//                 var maxHeight = 0;
//                 $.each(data, function(index, vacante){
//                     var datosAdicionales = vacante.datos_adicionales.substring(0, 200); // Limitar texto en la card
//                     var card = '<div class="col-lg-4 col-md-6 col-sm-12">';
//                     card += '<div class="card shadow p-3 mb-5 bg-body rounded">';
//                     card += '<div class="card-body">';
//                     card += '<h4 class="card-title text-danger">' + vacante.puesto + '</h4>';
//                     card += '<h5 class="card-title">' + vacante.empresa + '</h5>';
//                     card += '<h6 class="card-title">' + vacante.ciudad + ', ' + vacante.region + '</h6>';
//                     card += '<p class="card-text" style="text-align: justify;">' + datosAdicionales + '...</p>'; // Usar el texto limitado
//                     card += '<form action="seleccionar_vacantes.php" method="POST">';
//                     card += '<input type="text" value="'+vacante.id_vacante+'" name="id_vacante" id="id_vacante" hidden>';
//                     card += '<input type="submit" value="Leer más" class="btn btn-primary">';
//                     card += '</form></div></div></div>';
//                     $('#vacantesContainer').append(card);

//                     // Encontrar la altura máxima
//                     var cardHeight = $('.card').last().height();
//                     if (cardHeight > maxHeight) {
//                         maxHeight = cardHeight;
//                     }
//                 });

//                 // Establecer la altura máxima para todas las tarjetas
//                 $('.card').height(maxHeight);
//             } else {
//                 $('#vacantesContainer').html('No se encontraron vacantes.');
//             }
//         },
//         error: function(xhr, status, error){
//             console.error(xhr.responseText);
//         }
//     });
// });
$(document).ready(function(){
    var offset = 0; // Variable para llevar el seguimiento del offset de las vacantes cargadas

    function cargarVacantes() {
        $.ajax({
            url: "../php/Buscar_vacantes.php",
            type: "POST",
            dataType: "json",
            data: { offset: offset }, // Enviar el offset al servidor
            success: function(data){
                if (data.length > 0) {
                    var maxHeight = 0;
                    $.each(data, function(index, vacante){
                        var datosAdicionales = vacante.datos_adicionales.substring(0, 200); // Limitar texto en la card
                        var card = '<div class="col-lg-4 col-md-6 col-sm-12">';
                        card += '<div class="card shadow p-3 mb-5 bg-body rounded">';
                        card += '<div class="card-body">';
                        card += '<h4 class="card-title text-danger">' + vacante.puesto + '</h4>';
                        card += '<h5 class="card-title">' + vacante.empresa + '</h5>';
                        card += '<h6 class="card-title">' + vacante.ciudad + ', ' + vacante.region + '</h6>';
                        card += '<p class="card-text" style="text-align: justify;">' + datosAdicionales + '...</p>'; // Usar el texto limitado
                        card += '<form action="seleccionar_vacantes.php" method="POST">';
                        card += '<input type="text" value="'+vacante.id_vacante+'" name="id_vacante" id="id_vacante" hidden>';
                        card += '<input type="submit" value="Leer más" class="btn btn-primary">';
                        card += '</form></div></div></div>';
                        $('#vacantesContainer').append(card);

                        // Encontrar la altura máxima
                        var cardHeight = $('.card').last().height();
                        if (cardHeight > maxHeight) {
                            maxHeight = cardHeight;
                        }
                    });

                    // Establecer la altura máxima para todas las tarjetas
                    $('.card').height(maxHeight);

                    // Incrementar el offset para la próxima carga
                    offset += 9;
                } else {
                    $('#vacantesContainer').html('No se encontraron más vacantes.');
                }
            },
            error: function(xhr, status, error){
                console.error(xhr.responseText);
            }
        });
    }

    // Cargar las vacantes al cargar la página
    cargarVacantes();

    // Manejar el evento de clic en el botón "Siguiente"
    $('#siguienteBtn').click(function(e){
        e.preventDefault();
        cargarVacantes();
    });
});

