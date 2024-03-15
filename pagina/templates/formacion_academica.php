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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>

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

  <body>

    <!-- {*Conexion al archivo de JavasScript para la ubicacion y bootstrap*} -->
    <script src="../js/ubicacion.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    
    <!-- {*Barra de navegacion para Usuarios*} -->
    <?php include("navbar_usuario.php") ?>
    
    <!-- {*Formulario de Formacion Academica*} -->
    <form id="formFormacionAcademica" method="POST">
      <!-- {*Card de formacion academica*}                -->
      <div class="card  mb-3" style="max-width: 30rem; margin:auto; margin-top:30px;">
        <div class="card-body">
          <h4 class="card-title" style="margin-left:90px;">Formación académica</h4>
          <label>Los campos marcados con asterisco son obligatorios</label> <br>

          <!-- {*Campos para los datos de formacion academica*} -->
          <label class="col-form-label mt-4" for="name"> Nombre de la Institución Educativa *</label> <br>
          <input class="form-control" type="text" name="descripcion" placeholder="Ingrese el nombre de la institución educativa" maxLength="50"  required="true"> <br>
          <label for="name" class="form__label"> Ubicación *</label> <br>
          <input class="form-control" type="text" name="ubicacion" placeholder="Ingrese la ubicación de la Institucion educativa" maxLength="100"  required="true"> <br>
          <label for="name" class="form__label"> Periodo *</label> <br>
          <input class="form-control" type="text" name="periodo" placeholder="Ingrese el tiempo que estudio en años" maxLength="20"  required="true"> <br>
          
          <!-- {*Campos internos para la ubicacion*} -->
          <input name="txtlatitud" id="latitud" type="hidden">
          <input name="txtlongitud" id="longitud" type="hidden">

          <!-- {*Boton para guardar la formacion academica*} -->
          <input class="btn btn-primary" style="margin-left:180px;" type="submit" value="Guardar">

        </div>
      </div>

    </form>
    
    <!-- {*Conexion de librerias de JavaScript y bootstrap*} -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../js/insert.js"></script>
  </body>

</html>