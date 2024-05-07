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
  <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/notificacion_usuario.js"></script>
  
</head>

<body style="background-color: #F8F6F3;">

  <!-- {*Conexion a librerias de JavasScript para la ubicacion y bootstrap*} -->
  <script src="../js/ubicacion.js"></script>

  <!-- {*Barra de navegacion para Usuarios*} -->
  <?php include ("navbar_usuario.php") ?>


<br>
    <!-- Contenido de las vacantes -->
    <div class="row justify-content-center mx-2">
  
      <?php include ("../php/busqueda.php"); ?>
      <?php include ("../php/resultados.php"); ?>

  </div>


  <!-- Conexion de librerias de JavaScript y bootstrap -->
  <script>
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