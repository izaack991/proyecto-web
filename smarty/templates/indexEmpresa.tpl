<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Empresa</title>
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/theme-1.css">
  </head>

  <body>

    {*Barra de navegacion para Empresa*}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Inicio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03"aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor03">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="vacantes.php">Vacantes
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="postulacion.php">Postulaciones
              </a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            {if $ECOUNT >= 1}
              <a class="btn demo-btn-on-bg text-white font-weight-bold ml-2 mt-2 mt-lg-0" data-toggle="modal"data-target="#exampleModal">
                <span class="fa-layers fa-fw mr-2 fa-lg">
                  <i class="fas fa-bell"></i>
                  <span class="fa-layers-counter" style="background:Tomato">{$COUNTPOS}</span>
                </span>{$smarty.session.nomusuario}</a></li>
            {else}
            <li class="nav-link active">{$smarty.session.nomusuario}</li>
            {/if}

            {* Creacion de la modal de notificaciones *}
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-bell"></i> Notificaciones</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    {if $COUNTPOS >= 1}
                    <a class="nav-link" href="postulacion.php" style="color: blue;">Tienes {$COUNTPOS} postulaciones pendientes</a>
                    {/if}
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>

            {* Creacion de la modal de cerrar sesion *}
            <div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-bell"></i> cerrar sesion</h5>
                  </div>
                  <div class="modal-body">
                    <h6 class="modal-body" id="exampleModalLabel"><i class="fas fa-bell"></i>seguro que desea cerrar la sesion?</h6>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>


            
            {*Boton para cerrar la sesion*}            
            <a class="nav-link active text-danger" onclick="openModal()" style="font-weight:bold;">Cerrar Sesión</a>
           
            <title>Modal</title>
        <style>
            /* Estilos para la modal */
            .modal {
                display: none; /* Por defecto, la modal está oculta */
                position: fixed; /* Posición fija para que esté sobre el contenido */
                z-index: 1; /* Valor alto para asegurarnos de que esté encima de todo */
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto; /* Añadir un desplazamiento si la modal es demasiado grande */
                background-color: rgba(0,0,0,0.4); /* Fondo semi-transparente */
            }

            .modal-content {
                background-color: #fefefe;
                margin: 15% auto; /* Centrar la modal verticalmente */
                padding: 20px;
                border: 1px solid #888;
                width: 80%; /* Anchura de la modal */
            }
        </style>
        </head>
        <body>

        <!-- La modal -->
        <div id="myModal" class="modal">
          <div class="modal-content">
            <p>Seguro que quieres Cerrar Sesion?</p>
            <div class="modal-footer">
             <a ><button type="button" class="btn btn-primary" onclick="redireccionindex()" data-dismiss="modal">Aceptar</button></a>
              <button type="button" class="btn btn-primary" onclick="closeModal()" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>

        <script>
        // Función para abrir la modal
        function openModal() {
            document.getElementById('myModal').style.display = 'block';
        }

        // Función para cerrar la modal
        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
        }
        
        function redireccionindex(){
            window.location.href='../pagina/index.php';
        }
        // Cerrar la modal si el usuario hace clic fuera de ella
        window.onclick = function(event) {
            var modal = document.getElementById('myModal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        </script>
          </ul>
        </div>
      </div>
    </nav>


    {*Conexion de librerias de JavaScript y bootstrap*}                
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  </body>

</html>