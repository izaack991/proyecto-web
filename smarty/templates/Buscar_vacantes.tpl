<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$titulo}</title>
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/theme-1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  </head>

  <body>

    {*Conexion al archivo de JavasScript para la ubicacion y bootstrap*}
    <script src="../smarty/js/ubicacion.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    {*Barra de navegacion para Usuarios*}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="indexPrincipal.php">Inicio</a>
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
            <li class="nav-item">
              <a class="nav-link active" href="Usuario-test.php">Tests</a>
            </li>
          </ul>
          {*Boton para cerrar la sesion*}
          <ul class="navbar-nav ml-auto">
            <li class="nav-link active">{$smarty.session.nomusuario}</li>
            <a class="nav-link active text-danger" href="index.php" style="font-weight:bold;">Cerrar Sesión</a>
          </ul>
        </div>
      </div>
    </nav>

    {*Buscador de vacantes con ajax*}
    <div class="alert alert-dismissible">
      <div>
        <center>
          <input type="text" class="btn btn-light disabled" placeholder="Busque una vacante" style="display:inline; width:510px;" id="bvac" name="bvac">
        </center>
      </div>
    </div>
    
    <div class="row align-items-center">

      {*Cards de vacantes dinamicas (Primera Columna)*}
      <div class="col">
        {foreach $Vacantes1 as $vacantes}
          <div id="cardv" class="card border-primary shadow p-3 mb-5 bg-body rounded" style="width: 25rem; margin:auto;">
            <div class="card-body">
              <!-- Codigo de imagen en las cards -->
              <!--<center><img src="../pagina/img/{$vacantes.ruta_imagen}" alt="Imagen" style="width: 15rem;"></center><br>-->
              <h4 class="card-title, text-danger" style="display:inline;">{$vacantes.puesto}</h4> <br><br>
              <h4 class="card-title" style="display:inline;">{$vacantes.empresa}</h4> <br><br>
              <p align="justify" class="card-text">{$vacantes.datos_adicionales}</p>
              
              <form action="seleccionar_vacantes.php?vacante=0" method="POST">

                {*Campo interno para ver la vacante seleccionada*}
                <input value={$vacantes.id_vacante} type="hidden" name="txt_id_vacante">

                {*Boton para ver la vacante completa*}
                <input type="submit" value="Leer más" class="btn btn-primary">
              </form>

            </div>
          </div>
        {/foreach}
      </div>
      
      {*Cards de vacantes dinamicas (Segunda Columna)*}
      <div class="col">
        {foreach $Vacantes2 as $vacantes}
          <div id="cardv" class="card border-primary shadow p-3 mb-5 bg-body rounded" style="width: 25rem; margin:auto;">
            <div class="card-body">
              <!-- Codigo de imagen en las cards -->
              <!--<center><img src="../pagina/img/{$vacantes.ruta_imagen}" alt="Imagen" style="width: 15rem;"></center><br>-->
              <h4 class="card-title, text-danger" style="display:inline;">{$vacantes.puesto}</h4> <br><br>
              <h4 class="card-title" style="display:inline;">{$vacantes.empresa}</h4> <br><br>
              <p align="justify" class="card-text">{$vacantes.datos_adicionales}</p>

              <form action="seleccionar_vacantes.php?vacante=0" method="POST">

                {*Campo interno para ver la vacante seleccionada*}
                <input value={$vacantes.id_vacante} type="hidden" name="txt_id_vacante">

                {*Boton para ver la vacante completa*}
                <input type="submit" value="Leer más" class="btn btn-primary">

              </form>

            </div>
          </div>
        {/foreach}
      </div>
      
      {*Cards de vacantes dinamicas (Tercera Columna)*}
      <div class="col">
        {foreach $Vacantes3 as $vacantes}
          <div id="cardv" class="card border-primary shadow p-3 mb-5 bg-body rounded" style="width: 25rem; margin:auto;">
            <div class="card-body">
              <!-- Codigo de imagen en las cards -->
              <!--<center><img src="../pagina/img/{$vacantes.ruta_imagen}" alt="Imagen" style="width: 15rem;"></center><br>-->
              <h4 class="card-title, text-danger" style="display:inline;">{$vacantes.puesto}</h4> <br><br>
              <h4 class="card-text" style="display:inline;">{$vacantes.empresa}</h4> <br><br>
              <p align="justify" class="card-text">{$vacantes.datos_adicionales}</p>

              <form action="seleccionar_vacantes.php?vacante=0" method="POST">

                {*Campo interno para ver la vacante seleccionada*}
                <input value={$vacantes.id_vacante} type="hidden" name="txt_id_vacante">

                {*Boton para ver la vacante completa*}
                <input type="submit" value="Leer más" class="btn btn-primary">

              </form>

            </div>
          </div>
        {/foreach}
      </div>

    </div>

  </body>

  {*Codigo JavaScript para el buscador con ajax*}
  <script>
    $(document).ready(function () {
      $("#bvac").keyup(function () {
        _this = this;
        $.each($("#cardv "), function () {
          if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
            $(this).hide();
          else
            $(this).show();
        });
      });
    });
  </script>

  {*Conexion a archivo JavaScript para el funcionamiento del contador*}
  <script src="../smarty/js/contador-buscar-vacantes.js"></script>

</html>