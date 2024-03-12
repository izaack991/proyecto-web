<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title></title>
    <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
=======
    <title>"Lista de Postulaciones"</title>
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/theme-1.css">
>>>>>>> 25834eaf2952b7fe0718c4e00ee9c6f4b8128f19
  </head>
  
  <body>
<<<<<<< HEAD
    <!--Conexion al archivo de JavasScript para la ubicacion y bootstrap-->
    <script src="../smarty/js/ubicacion.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    <!--Barra de navegacion para Empresa-->
=======
    <!-- Conexion al archivo de JavasScript para la ubicacion y bootstrap -->
    <!-- <script src="../smarty/js/ubicacion.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- Barra de navegacion para Empresa -->
>>>>>>> 25834eaf2952b7fe0718c4e00ee9c6f4b8128f19
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="indexEmpresa.php"> <span> Inicio </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03"aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor03">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="vacantes.php"> <span> Vacantes </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="postulacion.php"> <span> Postulaciones </span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
<<<<<<< HEAD
              <a class="btn demo-btn-on-bg text-white font-weight-bold ml-2 mt-2 mt-lg-0" data-toggle="modal"data-target="#exampleModal">
                <span class="fa-layers fa-fw mr-2 fa-lg">
                  <i class="fas fa-bell"></i>
                  <span class="fa-layers-counter" style="background:Tomato"></span>
                </span></a></li>
            <li class="nav-link active"></li>
            
            <!--Creacion de la modal de notificaciones-->
=======
            <!-- {if $ECOUNT >= 1}
              <a class="btn demo-btn-on-bg text-white font-weight-bold ml-2 mt-2 mt-lg-0" data-toggle="modal"data-target="#exampleModal">
                <span class="fa-layers fa-fw mr-2 fa-lg">
                  <i class="fas fa-bell"></i>
                  <span class="fa-layers-counter" style="background:Tomato">{$COUNTPOS}</span>
                  </span>{$smarty.session.nomusuario}</a></li>
            {else}
             <li class="nav-link active">{$smarty.session.nomusuario}</li>
            {/if} -->

            <!-- Creacion de la modal de notificaciones -->
>>>>>>> 25834eaf2952b7fe0718c4e00ee9c6f4b8128f19
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-bell"></i> <span> Notificaciones </span> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <!-- <span aria-hidden="true">&times; </span> -->
                    </button>
                  </div>
                  <div class="modal-body">
<<<<<<< HEAD
                    <a class="nav-link" href="postulacion.php" style="color: blue;">Tienes  postulaciones pendientes</a>
=======
                    <!-- {if $COUNTPOS >= 1}
                    <a class="nav-link" href="postulacion.php" style="color: blue;">Tienes {$COUNTPOS} postulaciones pendientes</a>
                    {/if} -->
>>>>>>> 25834eaf2952b7fe0718c4e00ee9c6f4b8128f19
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"> <span> Cerrar </span> </button>
                  </div>
                </div>
              </div>
            </div>
<<<<<<< HEAD
            <!--Boton para cerrar la sesion-->         
            <a class="nav-link active text-danger" href="index.php" style="font-weight:bold;">Cerrar Sesión</a>
=======
            <!-- Boton para cerrar la sesion -->
            <a class="nav-link active text-danger" href="index.php" style="font-weight:bold;"> <span> Cerrar Sesión </span> </a>
>>>>>>> 25834eaf2952b7fe0718c4e00ee9c6f4b8128f19
          </ul>
        </div>
      </div>
    </nav>
<<<<<<< HEAD
    
    <!--Card de potulaciones-->
=======

    <!-- Card de potulaciones -->
>>>>>>> 25834eaf2952b7fe0718c4e00ee9c6f4b8128f19
    <div class="card border-dark mb-3 shadow-lg  mb-5 bg-body rounded" style="max-width: 80rem; margin:auto; margin-top:30px;">
      <div class="card-header text-center"><h4 class="card-title"> <span> Postulaciones </span> </h4></div>
      <div class="card-body">
<<<<<<< HEAD
        <!--Tabla de postulaciones-->
=======
        <!-- Tabla de postulaciones -->
>>>>>>> 25834eaf2952b7fe0718c4e00ee9c6f4b8128f19
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col" class="text-center">Curriculum</th>
              <th scope="col" class="text-center">Acción</th>
              <th scope="col" class="text-center">Usuario</th>
              <th scope="col" class="text-center">Correo</th>
              <th scope="col" class="text-center">Vacante</th>
            </tr>
          </thead>
          <tbody>
            <center>
<<<<<<< HEAD
              <tr class="table-light">

                <form action="seleccionar_postulacion.php" method="POST">
                  <!--Campos internos para el funcionamiento del boton ver-->
                  <input value={$postulacion.id_postulacion} type="hidden" name="txt_id_postulacion">
                  <input value={$postulacion.id_usuario} type="hidden" name="txt_id_usuario">
                  <td class="text-center">
                  <!--Boton para ver la postulacion completa-->
=======
              <!-- {foreach $Postulacion as $postulacion} -->
              <tr class="table-light">

                <form action="seleccionar_postulacion.php" method="POST">
                  <!-- Campos internos para el funcionamiento del boton ver -->
                  <input value={$postulacion.id_postulacion} type="hidden" name="txt_id_postulacion">
                  <input value={$postulacion.id_usuario} type="hidden" name="txt_id_usuario">
                  <td class="text-center">
                  <!-- Boton para ver la postulacion completa -->
>>>>>>> 25834eaf2952b7fe0718c4e00ee9c6f4b8128f19
                    <center><input type="submit" value="Ver" class="btn btn-info"></center>
                  </td>
                </form>

                <form action="postulacion.php" method="POST">
<<<<<<< HEAD
                  <!--Modal para la confirmacion de cerrar postulacion-->
=======
                  <!-- Modal para la confirmacion de cerrar postulacion -->
>>>>>>> 25834eaf2952b7fe0718c4e00ee9c6f4b8128f19
                  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">ALERTA</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <!-- <span aria-hidden="true">&times;</span> -->
                          </button>
                        </div>
                        <div class="modal-body">
                          ¿Desea cerrar esta postulacion? 
                        </div>
                        <div class="modal-body">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                          <input type="submit" value="Aceptar" class="btn btn-primary">
                        </div>
                      </div>
                    </div>
                  </div>
<<<<<<< HEAD
                  <!--Campos internos para el funcionamiento del boton cerrar-->
                  <input value="0" type="hidden" name="btn_cerrar">
                  <input value={$postulacion.id_postulacion} type="hidden" name="txt_id_postulacion">
                  <!--Boton para cerrar postulacion-->
=======
                  <!-- Campos internos para el funcionamiento del boton cerrar -->
                  <input value="0" type="hidden" name="btn_cerrar">
                  <input value={$postulacion.id_postulacion} type="hidden" name="txt_id_postulacion">
                  <!-- Boton para cerrar postulacion -->
>>>>>>> 25834eaf2952b7fe0718c4e00ee9c6f4b8128f19
                  <td class="text-center">
                    <right><input type="button" value="Cerrar" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2"></right>
                  </td>
                </form>

<<<<<<< HEAD

                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>

              </tr>
=======
                <!-- <td class="text-center">{$postulacion.nombreUsuario}</td>
                <td class="text-center">{$postulacion.correo}</td>
                <td class="text-center">{$postulacion.puesto}</td> -->

              </tr>
            <!-- {/foreach} -->
>>>>>>> 25834eaf2952b7fe0718c4e00ee9c6f4b8128f19
            </center>
          </tbody>
        </table>
      </div>
    </div>

<<<<<<< HEAD
    <!--Conexion de librerias de JavaScript y bootstrap-->
=======
    <!-- Conexion de librerias de JavaScript y bootstrap -->
>>>>>>> 25834eaf2952b7fe0718c4e00ee9c6f4b8128f19
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  </body>
</html>