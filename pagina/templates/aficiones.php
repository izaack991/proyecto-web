<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aficiones</title>
    <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
    <link rel="stylesheet" href="estilos.css" type="text/css">
    <script src="../php/Aficiones.php"></script>
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

    <!--Conexion a archivo de JavaScript para el funcionamiento de la ubicacion-->
    <script src="../smarty/js/ubicacion.js"></script>

    <!-- {*Barra de navegacion para Usuarios*} -->
    <?php include("navbar_usuario.php") ?>

    <!-- Formulario de aficiones -->
    <form action="Aficiones.php" method="POST">
      
      <!-- Card de aficiones -->
      <div class="card  mb-3" style="max-width: 20rem; margin:auto; margin-top:30px;">
        <div class="card-body">
          <h4 class="card-title" style="margin-left:85px;">Aficiones</h4>
          <label>Los campos marcados con asterisco son obligatorios</label> <br>
          
          <!-- Campos para los datos de aficiones -->
          <label class="col-form-label mt-4" for="name">Descripcion *</label><br>
          <textarea name="txtdesc" type="text" title="ESTE CAMPO NO ADMITE NÚMEROS NI CARACTERES ESPECIALES" class="form-control" maxlength="100"  cols="1" rows="10" onkeypress="return validarLetras(event)" required="true" placeholder="Ingrese sus datos de interes"></textarea><br><br>
          
          <!-- Campos internos para la ubicacion -->
          <input name="txtlatitud" id="latitud" type="hidden">
          <input name="txtlongitud" id="longitud" type="hidden">
          
          <!-- Boton para guardar aficiones -->
          <input class="btn btn-primary" style="margin-left:90px;" type="submit" value="Guardar">
        </div>
      </div>

    </form>
    
    <!-- Conexion de librerias de JavaScript y bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
  
</html>