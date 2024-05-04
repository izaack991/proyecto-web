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
                        card += '<div id="notification-container" class="fixed-top mt-3" style="z-index: 1000;"></div>'; 
                        card += '<div class="card-header" style="display:flex; justify-content: space-between; align-items: center;">';
                        card += '<h5 class="card-title text-danger text-center mb-1 ">' + vacante.puesto + '</h5>';
                        card += '<div class="d-flex justify-content-between align-items-center"><h5 class="card-title text-center mb-1 mr-5"">' + vacante.empresa + '</h5>';
                        
                        if (vacante.verificacionFav == null){
                            card += `<div class="ml-auto">
                                        <button type="button" title="Añadir a Favoritos" id="btnfavoritos" class="border-0 bg-white text-secondary p-0 mt-2" data-vacante="`+vacante.id_vacante+`" style="outline: none;"><i id="campana`+vacante.id_vacante+`" class="far fa-bookmark text-primary" style="font-size:1.8rem;transition: transform 0.1s ease;background-color:#f7f7f7;"></i></button>
                                     </div></div>`;
                        }else {
                            card += `<div class="ml-auto">
                                        <button type="button" id="btnfavoritos" class="border-0 bg-white text-secondary p-0 mt-2" data-vacante="`+vacante.id_vacante+`" style="outline: none;"><i id="campana`+vacante.id_vacante+`" class="fas fa-bookmark text-primary" style="font-size:1.8rem;transition: transform 0.1s ease;background-color:#f7f7f7;"></i></button>
                                     </div></div>`;
                        }

                        card += '</div>';
                        card += '<div class="card-body">';
                        card += '<h6 class="card-title">' + vacante.ciudad + ', ' + vacante.region + '</h6>';
                        card += '<h6 class="card-title" style="color: #54B689;">$' + vacante.sueldo + '</h6>';
                        card += '<pre align="justify" class="card-text" style="font-family: Arial;">' + vacante.datos_adicionales + '</pre>';
                        card += '<button type="button" class="btn btn-primary mx-auto" data-toggle="modal" data-target="#postularseModal">Postularse</button>';
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
                // Crear la alerta de Bootstrap de éxito
                var alertHtml = '<div class="alert alert-success fade show w-25 text-center mx-auto" role="alert">';
                alertHtml += response;
                alertHtml += '</div>';

                // Agregar la alerta al contenedor
                $('#notification-container').html(alertHtml);

                // Desvanecer la alerta después de un segundo
                setTimeout(function() {
                    $('.alert-success').fadeOut();
                }, 1000);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});
