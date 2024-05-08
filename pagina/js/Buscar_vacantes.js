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
                        card += '<div id="notification-container" class="fixed-bottom mb-3" style="z-index: 1000; right: 0;"></div>';
                        card += '<div class="card-header">';
                        card += '<div class="d-flex justify-content-between align-items-center"><h4 class="card-title text-danger mb-0">' + vacante.puesto + '</h4>';
                        
                        if (vacante.verificacionFav == null){
                            card += `<div class="ml-auto">
                                        <button type="button" id="btnfavoritos" class="border-0 bg-white text-secondary p-0 mt-2" data-vacante="`+vacante.id_vacante+`" style="outline: none;"><i id="campana`+vacante.id_vacante+`" class="far fa-bookmark text-primary" style="font-size:1.8rem;transition: transform 0.1s ease;background-color:#f7f7f7;"></i></button>
                                     </div></div>`;
                        }else {
                            card += `<div class="ml-auto">
                                        <button type="button" id="btnfavoritos" class="border-0 bg-white text-secondary p-0 mt-2" data-vacante="`+vacante.id_vacante+`" style="outline: none;"><i id="campana`+vacante.id_vacante+`" class="fas fa-bookmark text-primary" style="font-size:1.8rem;transition: transform 0.1s ease;background-color:#f7f7f7;"></i></button>
                                     </div></div>`;
                        }
                        
                        card += '</div>';
                        card += '<div class="card-body">';
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

    $(document).on("click", "#btnfavoritos", function(event) {
        event.preventDefault();
        var vacanteID = $(this).data("vacante");
         // Evita que la página se recargue
        var bell = document.getElementById('campana' + vacanteID);
        bell.style.transform = 'rotate(15deg)'; // Rotate bell to the right
        setTimeout(function() {
            bell.style.transform = 'rotate(-15deg)'; // Rotate bell to the left
        }, 100);
        setTimeout(function() {
            bell.style.transform = 'rotate(10deg)'; // Rotate bell to the right again
        }, 200);
        setTimeout(function() {
            bell.style.transform = 'rotate(-10deg)'; // Rotate bell to the left again
        }, 300);
        setTimeout(function() {
            bell.style.transform = 'rotate(5deg)'; // Rotate bell to the right again
        }, 400);
        setTimeout(function() {
            bell.style.transform = 'rotate(0deg)'; // Rotate bell back to its original position
        }, 500);
        var icono = this.querySelector('i');
        if (icono.classList.contains('far')) {
          icono.classList.remove('far');
          icono.classList.add('fas');
        } else {
          icono.classList.remove('fas');
          icono.classList.add('far');
        }

        $.ajax({
            url: '../php/actualizar_favoritos.php', 
            type: 'POST',
            data: {
                vacanteID: vacanteID,
            },
            success: function(response) {
                // Determinar el tipo de alerta
                var alertType = response === "Se agregó a favoritos" ? "success" : "danger";

                // Crear la alerta de Bootstrap
                var alertHtml = '<div class="alert alert-' + alertType + ' fade show position-absolute text-center" style="right: 15px; bottom: 15px; left: auto;" role="alert">';
                alertHtml += response;
                alertHtml += '</div>';

                // Agregar la alerta al contenedor
                $('#notification-container').html(alertHtml);

                // Desvanecer la alerta después de un segundo
                setTimeout(function() {
                    $('.alert-success').fadeOut();
                    $('.alert-danger').fadeOut();
                }, 1000);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    

    // Cargar las vacantes al cargar la página
    cargarVacantes();

    // Manejar el evento de clic en el botón "Siguiente"
    $('#siguienteBtn').click(function(e){
        e.preventDefault();
        cargarVacantes();
    });
});

