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

  {*Codigo de CSS para el diseño personalisado del curriculum*}
  <style>
    .pregresp {
      border: 1px solid #20c997;
      padding: 10px;
      margin: 10px;
      border-radius: 0.4rem;
    }

    .bcol {
      border: 1px solid #cacaca;
      padding: 5px;
      margin: 20px;
      border-radius: 0.4rem;
    }

    .titulo {
      color: #20c997;
    }
  </style>

  <body>

    {*Conexion al archivo javascript para la ubicacion*}
    <script src="../smarty/js/ubicacion.js"></script>

    {*Conexion de librerias de JavaScript y bootstrap*}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    {*Barra de navegacion para Empresa*}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="indexEmpresa.php">Inicio</a>
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
            {*Boton para cerrar la sesion*}            
            <a class="nav-link active text-danger" href="index.php" style="font-weight:bold;">Cerrar Sesión</a>
          </ul>
        </div>
      </div>
    </nav>
    
    {*Card del curriculum del usuario*}
    <div class="card border-primary shadow p-3 mb-5 bg-body rounded" style="max-width: 80%; margin:auto; margin-top:30px;">
      <div class="card-header text-center">
        <h4 class="card-title titulo">CURRICULUM</h4>
        {foreach $Postulacion as $postu}
        
        {*Boton para enviar tests*}
        <a href="enviartest.php?vac={$postu.puesto}&ie={$postu.id_usuario}"><input class="btn btn-primary" name="btntest" type="submit" value="ENVIAR TEST" style="float: right;"></a>
        
        {*Boton para imprimir el curriculum*}
        <a href="pdf.php?vac={$vac}&ie={$postu.id_usuario}" target="_blank"><input class="btn btn-primary" name="btnpdf" type="submit" value="imprimir" style="float: right;margin-right:4%;"></a>
        {/foreach}
      </div>

      <center>
        <div class="card-body">
          <div class="row align-items-center pregresp">

            {*Datos del usuario*}
            {foreach $Postulacion as $pos}
              <div class="col">
                <h4 class="titulo">Usuario</h4>
                <label for="name" class="col-form-label mt-4"><b>Nombre</b></label> <br>
                <label for="name" class="col-form-label mt-1">{$pos.nombreUsuario}</label> <br>
              </div>
            {/foreach}

            {*Datos de la vacante*}
            {foreach $Postulacion as $pos}
              <div class="col">
                  <h4 class="titulo">Vacante</h4>
                  <label for="name" class="col-form-label mt-4"><b>Puesto</b></label> <br>
                  <label for="name" class="col-form-label mt-1">{$pos.puesto}</label> <br>
              </div>
            {/foreach}

          </div> 

          {*Datos de la experiencia laboral del usuario*}
          <div class="pregresp">
            <h4 class="titulo">Experiencia Laboral</h4><br>
            <div class="row align-items-center">
              {foreach $Experiencia as $exp}
              <div class="col">
                <label for="name" class="col-form-label mt-4"><b>Descripción</b></label> <br>
                <label for="name" class="col-form-label mt-1">{$exp.descripcion_puesto}</label> <br>
                <label for="name" class="col-form-label mt-4"><b>Empresa</b></label> <br>
                <label for="name" class="col-form-label mt-1">{$exp.empresa}</label> <br>
                <label for="name" class="col-form-label mt-4"><b>Periodo</b></label> <br>
                <label for="name" class="col-form-label mt-1">{$exp.periodo}</label> <br>
              </div>
              {/foreach}
            </div><br>
          </div>
          
          {*Datos de la formacion academica del usuario*}
          <div class="pregresp">
            <h4 class="titulo">Formación Academica</h4>
            <div class="row align-items-center">
              {foreach $Formacion as $for}
              <div class="col">
                <label for="name" class="col-form-label mt-4"><b>Descripción</b></label> <br>
                <label for="name" class="col-form-label mt-1">{$for.descripcion}</label> <br>
                <label for="name" class="col-form-label mt-4"><b>Ubicación</b></label> <br>
                <label for="name" class="col-form-label mt-1">{$for.ubicacion}</label> <br>
                <label for="name" class="col-form-label mt-4"><b>Periodo</b></label> <br>
                <label for="name" class="col-form-label mt-1">{$for.periodo}</label> <br>
              </div>
            {/foreach}
            </div><br>
          </div>
          
          {*Datos de las aficiones del usuario*}
          <div class="pregresp">
            <h4 class="titulo">Aficiones</h4>
            <div class="row align-items-center">
              {foreach $Aficiones as $afi}
              <div class="col">
                <label for="name" class="col-form-label mt-4"><b>Descripción</b></label> <br>
                <label for="name" class="col-form-label mt-1">{$afi.descripcion}</label> <br>
              </div>
            {/foreach}
            </div><br>
          </div>
          
          {*Datos de los intereses del usuario*}
          <div class="pregresp">
            <h4 class="titulo">Interes</h4>
            <div class="row align-items-center">
              {foreach $Interes as $int}
              <div class="col">
                <label for="name" class="col-form-label mt-4"><b>Descripción</b></label> <br>
                <label for="name" class="col-form-label mt-1">{$int.descripcion}</label> <br>
              </div> 
            {/foreach}
            </div><br>
          </div>

        </div>
      </center>
    </div>
    
  </body>

</html>