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
       <li class="nav-link active">{$smarty.session.nomusuario}</li>
       <a class="nav-link active text-danger" href="indexPrincipal.php" style="font-weight:bold;">Cerrar Sesión</a>
     </ul>
   </div>
 </div>
</nav>
  <div class="card border-primary shadow p-3 mb-5 bg-body rounded"
    style="max-width: 60rem; margin:auto; margin-top:30px;">
    <div class="card-header text-center">
        <h4 class="card-title">Curriculum</h4>
    </div>
    <center>
    <div class="card-body">
       
            <div class="row align-items-center">
                <div {foreach $Postulacion as $pos} class="col">
                    <h4>Usuario</h4>
                    <label for="name" class="col-form-label mt-4"><b>Nombre</b></label> <br>
                    <label for="name" class="col-form-label mt-1">{$pos.nombreUsuario}</label> <br>
                </div {/foreach}>
                <div {foreach $Postulacion as $pos} class="col">
                    <h4>Vacante</h4>
                    <label for="name" class="col-form-label mt-4"><b>Puesto</b></label> <br>
                    <label for="name" class="col-form-label mt-1">{$pos.puesto}</label> <br>
                </div {/foreach}>
            </div><br>
            <div class="row align-items-center">
                <div {foreach $Experiencia as $exp} class="col">
                    <h4>Experiencia Laboral</h4>
                    <label for="name" class="col-form-label mt-4"><b>Descripción</b></label> <br>
                    <label for="name" class="col-form-label mt-1">{$exp.descripcion_puesto}</label> <br>
                    <label for="name" class="col-form-label mt-4"><b>Empresa</b></label> <br>
                    <label for="name" class="col-form-label mt-1">{$exp.empresa}</label> <br>
                    <label for="name" class="col-form-label mt-4"><b>Periodo</b></label> <br>
                    <label for="name" class="col-form-label mt-1">{$exp.periodo}</label> <br>
                </div {/foreach}>
                <div {foreach $Formacion as $for} class="col">
                    <h4>Formación Academica</h4>
                    <label for="name" class="col-form-label mt-4"><b>Descripción</b></label> <br>
                    <label for="name" class="col-form-label mt-1">{$for.descripcion}</label> <br>
                    <label for="name" class="col-form-label mt-4"><b>Ubicación</b></label> <br>
                    <label for="name" class="col-form-label mt-1">{$for.ubicacion}</label> <br>
                    <label for="name" class="col-form-label mt-4"><b>Periodo</b></label> <br>
                    <label for="name" class="col-form-label mt-1">{$for.periodo}</label> <br>
                </div {/foreach}>
            </div><br>
            <div class="row align-items-center">
                <div {foreach $Aficiones as $afi} class="col">
                    <h4>Aficiones</h4>
                    <label for="name" class="col-form-label mt-4"><b>Descripción</b></label> <br>
                    <label for="name" class="col-form-label mt-1">{$afi.descripcion}</label> <br>
                </div {/foreach}>
                <div {foreach $Interes as $int} class="col">
                    <h4>Interes</h4>
                    <label for="name" class="col-form-label mt-4"><b>Descripción</b></label> <br>
                    <label for="name" class="col-form-label mt-1">{$int.descripcion}</label> <br>
                </div {/foreach}>
            </div>
       
    </div>
    </center>
  </div> 
  </body> 
  </html>