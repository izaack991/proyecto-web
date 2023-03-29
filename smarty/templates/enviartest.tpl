<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enviar Test</title>
  <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/devresume.css">
  <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/theme-1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
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
        {if $COUNTPOS >= 1} 
										<a class="btn demo-btn-on-bg text-white font-weight-bold ml-2 mt-2 mt-lg-0" data-toggle="modal" data-target="#exampleModal">
										<span class="fa-layers fa-fw mr-2 fa-lg">
											<i class="fas fa-bell"></i>
											<span class="fa-layers-counter" style="background:Tomato">{$COUNTPOS}</span>
										</span>{$smarty.session.nomusuario}</a></li>
                    {else}
                      <li class="nav-link active">{$smarty.session.nomusuario}</li>
										{/if}	
                   {* MODAL *}
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

        <a class="nav-link active text-danger" href="indexPrincipal.php" style="font-weight:bold;">Cerrar Sesión</a>
      </ul>
    </div>
  </div>
</nav>
  <div class="card border-primary shadow p-3 mb-5 bg-body rounded"
    style="max-width: 60rem; margin:auto; margin-top:30px;">
    <div class="card-header text-center">
      <h4 class="card-title">Enviar test a postulante</h4>
    </div>
  
      </div>
    {* </center> *}
    <form action="" method="POST">
  <div class="card border-primary shadow p-3 mb-5 bg-body rounded"
    style="max-width: 30rem; margin:auto; margin-top:30px;">
    <h6>Seleccione los test que desee enviar al postulante seleccionado:</h6>  <br><br>
    <div class="container text-center">
      <div class="row">
    <div class="col align-self-start">
    <div style= "text-align: left">
            <div>
                <input type="checkbox" name="test_moss" value="A" />Test de Moss      <br>
            </div>

            <div>
                <input type="checkbox" name="test_raven" value="A" />Test de Raven    <br>
            </div>

            <div>
                <input type="checkbox" name="test_sjt" value="A" />Test SJT           <br>
           </div>

            <div>
                <input type="checkbox" name="test_merril" value="A" />Test de Merril   <br>
            </div>

            <div>
                <input type="checkbox" name="test_cleaver" value="A" />Test Cleaver    <br>
           </div>
           </div>
</div>
          <div class="col align-self-center">
          <input class="btn btn-primary" name="btnenviar" type="submit" value="ENVIAR TEST"  style="max-width: 30rem; margin:auto; margin-top:-10px;">
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.2/moment.min.js"></script>

</body>

</html>