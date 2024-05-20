<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de vacantes</title>
  <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/styles.css">
  <link rel="icon" href="../../assets/images/WorkeleWB.ico" type="image/x-icon">
  <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/notificacion_usuario.js"></script>

  <script>
    $(document).ready(function() {
  $("#bvac").keyup(function() {
    var query = $(this).val().toLowerCase();
    filterVacancies(query);
  });

  // Escuchar el evento de clic del checkbox "Se Precisa Urgente"
  $("#urgentCheckbox").click(function() {
    filterVacancies($("#bvac").val().toLowerCase());
  });

  // Escuchar el evento de clic del checkbox "Prácticas"
  $("#practicesCheckbox").click(function() {
    filterVacancies($("#bvac").val().toLowerCase());
  });

  // Función para filtrar las vacantes
  function filterVacancies(query) {
    var showUrgent = $("#urgentCheckbox").is(":checked");
    var showPractices = $("#practicesCheckbox").is(":checked");

    $("#vacantesContainer").children().each(function() {
      var text = $(this).text().toLowerCase();
      var showVacancy = true;

      // Filtrar por texto de búsqueda
      if (query !== "" && text.indexOf(query) === -1) {
        showVacancy = false;
      }

      // Crear expresiones regulares para los filtros
      var urgentRegex = new RegExp("se precisa urgente", "i");
      var practicesRegex = new RegExp("prácticas", "i");

      // Filtrar por "Se Precisa Urgente"
      if (showUrgent && !urgentRegex.test($(this).text())) {
        showVacancy = false;
      }

      // Filtrar por "Prácticas"
      if (showPractices && !practicesRegex.test($(this).text())) {
        showVacancy = false;
      }

      // Mostrar u ocultar vacante según los filtros
      if (showVacancy) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  }
});

  </script>
  
</head>

<body style="background-color: #F8F6F3;">

  <!-- {*Conexion a librerias de JavasScript para la ubicacion y bootstrap*} -->
  <script src="../js/ubicacion.js"></script>

  <!-- {*Barra de navegacion para Usuarios*} -->
  <?php include ("navbar_usuario.php") ?>

  <!-- Campos internos para la ubicacion -->
  <input name="txtlatitud" id="latitud" type="hidden">
  <input name="txtlongitud" id="longitud" type="hidden">

<br>
<div class="text-center px-0">
        <input type="text" class="form-control" placeholder="Busque una vacante"
          style="display: flex; margin: 0 10%; width: 80%; text-align: center;" id="bvac"
          onkeydown="return event.key != 'Enter';"><br>

        <div style="display: inline-block; margin-right: 10px;">
          <input type="checkbox" id="urgentCheckbox">
          <label for="urgentCheckbox"><strong>Se Precisa Urgente</strong></label>
        </div>

        <div style="display: inline-block;">
          <input type="checkbox" id="practicesCheckbox">
          <label for="practicesCheckbox"><strong>Prácticas</strong></label>
        </div>
      </div>

    <!-- Contenido de las vacantes -->
    <div id="vacantesContainer" class="row justify-content-center mx-2">
  
      <?php include ("../php/busqueda.php"); ?>
      <?php include ("../php/resultados.php"); ?>

  </div>


  <!-- Conexion de librerias de JavaScript y bootstrap -->
  <script>

          $(document).on("mouseover", "#btnfavoritos", function(event) {
            // Obtener la posición y dimensiones del botón
            var boton = $(this);
            var posicion = boton.offset();
            var anchoBoton = boton.outerWidth();
            var altoBoton = boton.outerHeight();
            
            // Crear un elemento span para mostrar el mensaje
            var mensaje = $('<span class="mensaje-favoritos font-weight-bold shadow px-2">Agregar a Favoritos</span>');
        
            // Estilo del mensaje emergente
            mensaje.css({
                backgroundColor: '#fff',
                color: '#54b689',
                padding: '5px',
                borderRadius: '5px',
                border:'1px solid #dfdfdf',
                position: 'absolute',
                top: (posicion.top - altoBoton - 12) + 'px', // Posición arriba del botón con 5px de espacio
                left: (posicion.left + (anchoBoton / 2) - (mensaje.outerWidth() / 2)) + 'px',
                transform: 'translateX(-50%)'
            });
        
            // Agregar el mensaje al botón
            $("body").append(mensaje);
        });
        
        $(document).on("mouseout", "#btnfavoritos", function(event) {
            // Eliminar el mensaje
            $("span.mensaje-favoritos").remove();
        });

    // Agregar evento click a los botones "Guardar" de experiencia
    $(document).on("click", ".btn-vacante", function() {
        var id_vacante = $(this).data("vacante2");
        var latitud = $("#latitud").val();
        var longitud = $("#longitud").val();

        // Enviar datos al servidor utilizando AJAX
            $.ajax({
                url: '../php/guardar_logusuario.php',
                type: 'POST',
                data: {
                    id_vacante: id_vacante,
                    latitud: latitud,
                    longitud: longitud,
                },
                success: function(response) {
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    // Manejar errores aquí
                }
            });
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
                    $('.alert').fadeOut();
                }, 1000);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
  </script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="../js/insert.js"></script>

</body>

</html>