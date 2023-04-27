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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="indexEmpresa.php">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="Vacantes.php">Vacantes
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="postulacion.php">Postulaciones
          </a>
        </li> 
        </ul>
        <ul class="navbar-nav ml-auto">
        <li class="nav-link active">{$smarty.session.nomusuario}</li>
        <a class="nav-link active text-danger" href="indexPrincipal.php" style="font-weight:bold;">Cerrar Sesión</a>
      </ul>
    </div>
  </div>
</nav>
<div class="card border-dark mb-3 shadow-lg  mb-5 bg-body rounded" style="max-width: 80rem; margin:auto; margin-top:30px;">
<div class="card-header text-center">
  <h4 class="card-title">Postulaciones</h4>
</div>
<div class="card-body">
<table class="table table-hover">
<thead>
  <tr>
    <th scope="col" class="text-center">Curriculum</th>
    <th scope="col" class="text-center">Acción</th>
    <th scope="col"  class="text-center">Usuario</th>
    <th scope="col"  class="text-center">Correo</th>
    <th scope="col"  class="text-center">Vacante</th>
  </tr>
</thead>
<tbody>
  <center>
  {foreach $Postulacion as $postulacion}
    <tr class="table-light">
    <form action="seleccionar_postulacion.php" method="POST">
    <input value={$postulacion.id_postulacion} type="hidden" name="txt_id_postulacion">
    <input value={$postulacion.id_usuario} type="hidden" name="txt_id_usuario">
    <td class="text-center"><center><input type="submit" value="Ver" class="btn btn-info"></center></td>
    </form>
    <form action="postulacion.php" method="POST">
    <input value="0" type="hidden" name="btn_cerrar">
    <input value={$postulacion.id_postulacion} type="hidden" name="txt_id_postulacion">
    <td class="text-right"><right><input type="submit" value="cerrar" class="btn btn-danger"></right></td>
    </form>

    <td class="text-center">{$postulacion.nombreUsuario}</td>
    <td class="text-center">{$postulacion.correo}</td>
    <td class="text-center">{$postulacion.puesto}</td>
    </tr>
  {/foreach}
  </center>
</tbody>
</table>
  </div>
</div>
  
  
  
</div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>