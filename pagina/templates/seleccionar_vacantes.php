<?php 
  $id_vacante = $_POST['id_vacante'];
  echo'<input type="hidden" name="id_vacante" id="id_vacante" value="'.$id_vacante.'">';
  $_SESSION['id_vacante'] = $id_vacante;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>"Selección de Vacante"</title>
  <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/notificacion_usuario.js"></script>
  <script src="../js/seleccionar_vacantes.js"></script>


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
  </script>

</head>

<body style="background-color: #F8F6F3;">

  <!-- Barra de navegación para Usuarios -->
  <?php include("navbar_usuario.php"); ?>

  <div style="margin-top:4%" id="vacantesContainer"></div>

  <!-- Modal -->
  <div class="modal" id="postularseModal" tabindex="-1" role="dialog">
    <form action="../php/guardar_postulacion.php" method="POST">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Confirmación de postulación</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ¿Estás seguro de que deseas postularte a esta vacante?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <input type="submit" value="Aceptar" class="btn btn-primary">
          </div>
        </div>
      </div>
    </form>
  </div>

  <!-- Conexión de librerías de JavaScript y Bootstrap -->
  <!-- Se removió la duplicación de la inclusión de jQuery. Ahora solo se incluye la versión más reciente (3.6.4) -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <!-- Popper.js se incluye ahora a través de bootstrap.bundle.min.js, por lo que su inclusión separada fue removida. -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <!-- Se eliminó la inclusión de Bootstrap 5 ya que puede causar conflictos con Bootstrap 4. Es mejor usar una versión. -->
  <script src="../js/insert.js"></script>

</body>


</html>