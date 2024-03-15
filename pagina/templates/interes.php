<!DOCTYPE html>

<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Interés </title>
    <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
    <script src="../php/interes.php"></script>
    <link rel="stylesheet" href="estilos.css" type="text/css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script src="../js/ubicacion.js"></script>
    
    <script>
      // Tiempo de inactividad en milisegundos (por ejemplo, 5 minutos)
      var tiempoInactividad = 5 * 60 * 1000; 

      // Página a la que se redireccionará después de la inactividad
      var paginaRedireccion = "index.php";

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

      // funcion para solo letras mayúsculas, minúsculas y espacios
      function validarLetras(event) {
          var charCode = event.charCode;
          // Permitir letras (mayúsculas y minúsculas) y espacios
          return (charCode >= 65 && charCode <= 90) || // Letras mayúsculas
                (charCode >= 97 && charCode <= 122) || // Letras minúsculas
                charCode === 32; // Espacio
      }
    </script>
 
  </head>

  <body>
    <!-- Barra de navegacion de Usuarios -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="indexPrincipal.php">Inicio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor03">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="experiencia_laboral.php">Experiencia Laboral <span>  </span> 
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="formacion_academica.php"> <span> Formación Academica </span> 
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="Aficiones.php"> <span> Aficiones </span> 
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="interes.php"> <span> Interés </span> 
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="buscar_vacantes.php"> <span> Buscar Vacantes </span> 
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="Usuario-test.php"> <span> Tests </span> 
              </a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
          <!-- <script>
            <li class="nav-item">
            {if $COUNT >= 1}
              <a class="btn demo-btn-on-bg text-white font-weight-bold ml-2 mt-2 mt-lg-0" data-toggle="modal" data-target="#exampleModal">
                  <span class="fa-layers fa-fw mr-2 fa-lg">
                    <i class="fas fa-bell"></i>
                    <span class="fa-layers-counter" style="background:Tomato">{$COUNT}</span>
                  </span>{$session.nomusuario}
                </a>
              </li>
            {else}
              <li class="nav-link active">{$session.nomusuario}</li>
            {/if}
          </script>   -->
          
            <!-- Creacion de la modal de notificaciones -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-bell"></i> Notificaciones</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                   <!-- <div class="modal-body">
                    {if $COUNTLAB >= 1}
                    <a class="nav-link" href="experiencia_laboral.php" style="color: blue;">Aun no ha registrado sus datos de Experiencia Laboral, click aqui para ir al registro</a>
                    {/if}
                    {if $COUNFOR >= 1}
                    <a class="nav-link" href="formacion_academica.php" style="color: blue;">Aun no ha registrado Formacion Academica, click aqui para ir al registro</a>
                    {/if}
                    {if $COUNTAFI >= 1}
                    <a class="nav-link" href="aficiones.php" style="color: blue;">Aun no ha registrado Experiencia Profesional, click aqui para ir al registro</a>
                    {/if}
                    {if $COUNTINT >= 1}
                    <a class="nav-link" href="interes.php" style="color: blue;">Aun no ha registrado sus datos de Interes, click aqui para ir al registro</a>
                    {/if}
                  </div> -->

                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Boton para cerrar la sesion -->
            <a class="nav-link active text-danger" href="index.php" style="font-weight:bold;">Cerrar Sesión</a>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Formulario de interes -->
    <form action="interes.php" method="POST">

      <!-- Card de interes -->
      <div class="card  mb-3" style="max-width: 20rem; margin:auto; margin-top:30px;">
        <div class="card-body">
          <h4 class="card-title" style="margin-left:45px;">Datos de Interés</h4>
          <label>Los campos marcados con asterisco son obligatorios</label> <br>

          <!-- Campos para los datos de interes -->
          <label class="col-form-label mt-4" for="name">Descripción: *</label><br>
          <textarea name="txtdesc" type="text" title="ESTE CAMPO NO ADMITE NÚMEROS NI CARACTERES ESPECIALES" class="form-control" maxlength="100"  cols="1" rows="10" onkeypress="return validarLetras(event)" required="true" placeholder="Ingrese sus datos de interes"></textarea><br><br>

          <!-- Campos internos para la ubicacion -->
          <input name="txtlatitud" id="latitud" type="hidden">
          <input name="txtlongitud" id="longitud" type="hidden">

          <!-- Boton para guardar interes -->
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