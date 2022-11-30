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
<script src="../smarty/js/ubicacion.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
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

<div class="alert alert-dismissible">
  <div>
    <center>
      <input type="text" class="btn btn-light disabled" placeholder="Busque una vacante" style="display:inline; width:510px;" id="bvac" name="bvac">
        </center>
    </div>
</div>


    {foreach $Vacantes as $vacantes}
      <div id="cardv" class="card border-primary shadow p-3 mb-5 bg-body rounded" style="max-width: 40rem; margin:auto; margin-top:30px;">
          <div class="card-body">
            <h4 class="card-title" style="display:inline;">{$vacantes.puesto}</h4> <br><br>
            <h5 class="card-text">{$vacantes.nombrePais}</h5>
            <h4 class="card-title text-primary">${$vacantes.sueldo}</h4>
              <p class="card-text">{$vacantes.datos_adicionales}</p>
              <form action="seleccionar_vacantes.php" method="POST">
              <input value={$vacantes.id_vacante} type="hidden" name="txt_id_vacante">
              <input type="submit" value="Leer más" class="btn btn-primary" >
              </form>
          </div>
      </div>
    {/foreach}

</body>
<script>
          $(document).ready(function(){
          $("#bvac").keyup(function(){
          _this = this;
          $.each($("#cardv "), function() {
          if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
          $(this).hide();
          else
          $(this).show();
          });
          });
        });
</script>

</html>