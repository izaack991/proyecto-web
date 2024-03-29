<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formacion Academica</title>
  <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/styles.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/notificacion_usuario.js"></script>

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

  <!-- {*Conexion al archivo de JavasScript para la ubicacion y bootstrap*} -->
  <script src="../js/ubicacion.js"></script>

  <!-- {*Barra de navegacion para Usuarios*} -->
  <?php include ("navbar_usuario.php") ?>

  <div class="container-fluid">
    <!-- {*Formulario de Formacion Academica*} -->
    <form id="formFormacionAcademica" method="POST">
      <!-- {*Card de formacion academica*}                -->
      <div class="card shadow mb-3" style="max-width: 30rem; margin:auto; margin-top:30px; border-radius:25px;">
        <div class="card-header text-center bg-primary" style="border-top-left-radius:25px;border-top-right-radius:25px;">
          <h4 class="text-white">FORMACIÓN ACADÉMICA</h4>
        </div>
        <div class="card-body">
          <label class="text-primary">Los campos marcados con asterisco (*) son obligatorios</label><br>

          <!-- {*Campos para los datos de formacion academica*} -->
          <div class="form-floating mb-3 mt-4">
            <input class="form-control" type="text" name="descripcion" placeholder="Nombre de la Institución Educativa" maxLength="50" required="true">
            <label for="floatingInput">Nombre de la Institución Educativa *</label>
          </div>
          <div class="form-floating mb-3 mt-4">
            <input class="form-control" type="text" name="ubicacion" placeholder="Ubicación" maxLength="100" required="true">
            <label for="floatingInput">Ubicación *</label>
          </div>
          <div class="form-floating mb-3 mt-4">
            <input class="form-control" type="text" name="periodo" placeholder="Periodo" maxLength="20" required="true">
            <label for="floatingInput">Periodo *</label>
          </div>

          <!-- {*Campos internos para la ubicacion*} -->
          <input name="txtlatitud" id="latitud" type="hidden">
          <input name="txtlongitud" id="longitud" type="hidden">

          <!-- {*Boton para guardar la formacion academica*} -->
          <div class="container text-center mt-4">
            <input class="btn btn-primary w-50" type="submit" value="Guardar">
          </div>
        </div>
      </div>

    </form>
  </div>

  <!-- {*Conexion de librerias de JavaScript y bootstrap*} -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="../js/insert.js"></script>
</body>

</html>