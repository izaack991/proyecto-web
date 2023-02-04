<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{$titulo}</title>
  <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/devresume.css">
  <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/theme-1.css">
</head>
<body>
  <script src="../smarty/js/ubicacion.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="experiencia_laboral.php">Experiencia Laboral
          </a>
        </li> 
        <li class="nav-item">
          <a class="nav-link active" href="formacion_academica.php">Formacion Academica
          </a>
        </li> 
        <li class="nav-item">
          <a class="nav-link active" href="Aficiones.php">Aficiones
          </a>
        </li> 
        <li class="nav-item">
        <a class="nav-link active" href="interes.php">Interes
        </a>
        </li> 
        <li class="nav-item">
        <a class="nav-link active" href="buscar_vacantes.php">Buscar Vacantes
        </a>
        </li> 
        <li class="nav-link active">{$smarty.session.nomusuario}</li>
        <a class="nav-link active text-danger" href="indexPrincipal.php" style="font-weight:bold;">Cerrar Sesión</a>
      </ul>
    </div>
  </div>
</nav>
  <div {foreach $vacantes as $va} class="card border-primary shadow p-3 mb-5 bg-body rounded"
    style="max-width: 40rem; margin:auto; margin-top:30px;">
    <div class="card-body">
      <form action="seleccionar_vacantes.php?vacante=0" method="POST">
        <h4 class="card-title" style="display:inline;">{$va.puesto}</h4> <br><br>
        <h5 class="card-text">{$va.nombrePais}</h5><br>
        <h4 class="card-title text-primary">${$va.sueldo}</h4>
        <p class="card-text">{$va.datos_adicionales}</p>

        <!-- boton para el modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Postularse
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ALERTA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                ¿Desea postularse?
              </div>
              <div class="modal-body">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <input value={$va.id_vacante} type="hidden" name="id_vacante">
                <input type="submit" value="Aceptar" class="btn btn-primary">
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div {/foreach}> </body> </html>