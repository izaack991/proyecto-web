<!DOCTYPE html>
  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/theme-1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
    <link rel="stylesheet" href="estilos.css" type="text/css">
</head>

<body>
<script src="../smarty/js/ubicacion.js"></script>
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
<form action="Aficiones.php" method="POST">

  <div class="card  mb-3" style="max-width: 20rem; margin:auto; margin-top:30px;">
    <div class="card-body">
      <h4 class="card-title" style="margin-left:45px;">Aficiones</h4>
      <label>Los campos marcados con asterisco son obligatorios</label> <br>

      <label class="col-form-label mt-4" for="name">Descripcion *</label><br>
      <input class="form-control" type="text" name="txtdesc" placeholder="Escriba una descripcion" required="true"><br><br>

      <input name ="txtlatitud" id="latitud"type="hidden">
      <input name="txtlongitud" id="longitud" type="hidden">

      <input class="btn btn-primary" style="margin-left:90px;" type="submit" value="Guardar">
      </div>
    </div>
  </div>
</form>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
</body>
</html>