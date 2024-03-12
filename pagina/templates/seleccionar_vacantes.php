<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>"Seleccion de Vacante"</title>
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/theme-1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
  </head>

  <body>

    <!-- Mensaje de guardado correctamente
    {$alerta} -->

    <!-- Barra de navegacion de Usuarios -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="indexPrincipal.php"> <span> Inicio </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor03">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="experiencia_laboral.php">E <span> xperiencia Laboral </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="formacion_academica.php"> <span> Formacion Academica </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="Aficiones.php"> <span> Aficiones </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="interes.php"> <span> Interes </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="buscar_vacantes.php"> <span> Buscar Vacantes </span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item">
            {if $COUNT >= 1}
              <a class="btn demo-btn-on-bg text-white font-weight-bold ml-2 mt-2 mt-lg-0" data-toggle="modal" data-target="#exampleModal2">
                <span class="fa-layers fa-fw mr-2 fa-lg">
                  <i class="fas fa-bell"></i>
                  <span class="fa-layers-counter" style="background:Tomato">{$COUNT}</span>
                </span>{$smarty.session.nomusuario}</a>
            </li>
            {else}
              <li class="nav-link active">{$smarty.session.nomusuario}</li>
            {/if} -->

            <!-- Creacion de la modal de notificaciones -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-bell"></i> <span> Notificaciones </span> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <!-- <span aria-hidden="true">&times;</span> -->
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- {if $COUNTLAB >= 1}
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
                    {/if} -->
                  </div>
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

    <!-- Card de seleccionar vacantes -->
    <div {foreach $vacantes as $va} class="card border-primary shadow p-3 mb-5 bg-body rounded" style="max-width: 40rem; margin:auto; margin-top:9rem;">
      
      <!-- Formulario de seleccionar vacantes -->
      <form action="seleccionar_vacantes.php?vacante=0" method="POST">
        <!-- <h4 class="card-title, text-danger" style="display:inline;">{$va.puesto}</h4> <br><br>
        <h4 class="card-title" style="display:inline;">{$va.empresa}</h4> <br><br>
        <h5 class="card-text">{$va.nombrePais}</h5><br>
        <h4 class="card-title text-primary">${$va.sueldo}</h4>
        <p class="card-text">{$va.datos_adicionales}</p> -->

        <!-- Boton para llamar la modal de confirmacion -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Postularse</button>
        
        <!-- Modal para la confirmacion de la postulacion -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ALERTA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <!-- <span aria-hidden="true">&times;</span> -->
                </button>
              </div>
              <div class="modal-body">
                ¿Desea postularse?
              </div>
              <div class="modal-body">
                <!-- Boton para cerrar la modal -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                
                <!-- Campo interno para el funcionaiento del boton de aceptar -->
                <input value={$va.id_vacante} type="hidden" name="id_vacante">

                <!-- Boton para aceptar la postulacion -->
                <input type="submit" value="Aceptar" class="btn btn-primary">
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    
    <!-- Conexion de librerias de JavaScript y bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  </body>

</html>