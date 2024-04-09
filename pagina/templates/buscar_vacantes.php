<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> "Lista de vacantes"</title>
  <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- <script src="../php/Buscar_vacantes.php'"></script> -->
  <script src="../js/Buscar_vacantes.js"></script>
  <script>
    // Tiempo de inactividad en milisegundos (por ejemplo, 5 minutos)
    var tiempoInactividad = 5 * 60 * 1000;

    // Página a la que se redireccionará después de la inactividad
    var paginaRedireccion = "https://www.workele.com";

    var tiempoInactivo;

    // Función para redireccionar
    function redireccionar() {
      window.location.href = paginaRedireccion;
    }

    // Reiniciar el temporizador de inactividad
    function reiniciarTemporizador() {
      clearTimeout(tiempoInactivo);
      tiempoInactivo = setTimeout(redireccionar, tiempoInactividad);
    }

    // Cuando se cargue la página, iniciar el temporizador
    reiniciarTemporizador();

    // Reiniciar el temporizador si se detecta actividad
    document.addEventListener("mousemove", reiniciarTemporizador);
    document.addEventListener("keypress", reiniciarTemporizador);

    // Codigo JavaScript para el buscador con ajax
    $(document).ready(function () {
      $("#bvac").keyup(function () {
        var query = $(this).val().toLowerCase();
        $("#vacantesContainer").children().each(function () {
          if ($(this).text().toLowerCase().indexOf(query) === -1)
            $(this).hide();
          else
            $(this).show();
        });
      });
    });
  </script>

</head>

<body style="background-color: #F8F6F3;">
  <!-- Conexion al archivo de JavasScript para la ubicacion y bootstrap
    <script src="../smarty/js/ubicacion.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"> </script>

  <!-- {*Barra de navegacion para Usuarios*} -->
  <?php include("navbar_usuario.php") ?>

  <div class="container-fluid">
    <!-- Buscador de vacantes con ajax  -->
    <div class="alert alert-dismissible text-center px-0">
      <input type="text" class="btn btn-light disabled" placeholder="Busque una vacante" style="display: flex; margin: 0 10%; width: 80%;" id="bvac" name="bvac">
    </div>
  </div>

  <!-- Contenedor de las vacantes -->
  <div id="vacantesContainer" class="row justify-content-center mx-2"></div>

</body>

</html>