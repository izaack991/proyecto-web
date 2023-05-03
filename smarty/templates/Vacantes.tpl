<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacantes</title>
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/theme-1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
  </head>

  <body>

    {*Conexion al archivo javascript para la ubicacion*}
    <script src="../smarty/js/ubicacion.js"></script>

    
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
            {*Boton para cerrar la sesion*}            
            <a class="nav-link active text-danger" href="indexPrincipal.php" style="font-weight:bold;">Cerrar Sesión</a>
          </ul>
        </div>
      </div>
    </nav>

    {*Formulario de vacantes*}
    <form action="Vacantes.php" method="POST">

      {*Mensaje de guardado correctamente*}
      {$alerta}

      {*Card de vacantes*}
      <div class="card  mb-3" style="max-width: 36rem; margin:auto; margin-top:30px;">
        <div class="card-body">
          <h4 class="card-title">Datos de Vacantes</h4>
          <label>Los campos marcados con asterisco son obligatorios</label> <br>


        <label for="name" class="form__label"> Puesto *</label> <br>
        <input class="form-control" type="text" required name="txtpuesto" placeholder="Ingresa el Puesto"> <br>

        <label for="name" class="form__label"> Empresa *</label> <br>
        <input class="form-control" type="text" required name="txtempresa" placeholder="Ingresa la empresa"> <br>
       
        <label for="name" class="form__label"> Sueldo *</label><br>
        <div class="input-group mb-3">
        <span class="input-group-text">$</span>
        <input class="form-control " type="text" required name="txtsueldo" placeholder="Ingresa el Sueldo"> <br>
        </div>

        <label for="name" class="form__label"> Lugar*</label> <br>
        <div class="form-row" text-align: center;>
        <div class="col">
        <select class="btn btn-light disabled" name="cmbpais">
             <option value="">Elige una opción</option>
             {foreach $Paises as $pais} 
               <option value={$pais.id_paises}>{$pais.nombre}</option>
             {/foreach}
          </select></div></div><br>

        <label for="name" class="form__label"> Datos Adicionales *</label> <br>
        <input class="form-control" type="text" name="txtdatos" required placeholder="Ingresa los Datos" maxlength=""> <br>
        
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="dateFECHA">Seleccione Fecha de Inicio: *</label><br>
            <input class="form-control" type="date" id="dateInicio" required name="dateInicio" value="2023-01-01">
        </div>
        <br>
        <div class="form-group col-md-6">
            <label for="dateFECHA">Seleccione Fecha de Vencimiento *</label><br>
            <input class="form-control" type="date" id="dateFin" required name="dateFin" value="2023-01-01">
        </div>
        <br>

            {*Campos internos para la ubicacion*}
            <input name="txtlatitud" id="latitud" type="hidden">
            <input name="txtlongitud" id="longitud" type="hidden">
            
            {*Boton de guardar vacante*}
            <input class="btn btn-primary" style="margin-left:224px;" type="submit" id="enviar" value="Guardar">
          </div>
        </div>
      </div>

      {*Conexion de librerias de JavaScript y bootstrap*}
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      
  </body>

</html>