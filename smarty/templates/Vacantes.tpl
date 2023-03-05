<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/devresume.css">
	<link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/theme-1.css">  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
</head>
<body>
<script src="../smarty/js/ubicacion.js"></script>
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

        <li class="nav-item">
        {if $ECOUNT >= 1} 
										<a class="btn demo-btn-on-bg text-white font-weight-bold ml-2 mt-2 mt-lg-0" data-toggle="modal" data-target="#exampleModal">
										<span class="fa-layers fa-fw mr-2 fa-lg">
											<i class="fas fa-bell"></i>
											<span class="fa-layers-counter" style="background:Tomato">{$ECOUNT}</span>
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
									<a class="nav-link" href="postulacion.php" style="color: blue;">Tienes postulaciones nuevas</a>
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
<form action="Vacantes.php" method="POST">
{$alerta}
    <div class="card  mb-3" style="max-width: 36rem; margin:auto; margin-top:30px;">
      <div class="card-body">
        <h4 class="card-title">Datos de Vacantes</h4>
        <label>Los campos marcados con asterisco son obligatorios</label> <br>


        <label for="name" class="form__label"> Puesto *</label> <br>
        <input class="form-control" type="text" name="txtpuesto" placeholder="Ingresa el Puesto"> <br>

       
        <label for="name" class="form__label"> Sueldo *</label><br>
        <div class="input-group mb-3">
        <span class="input-group-text">$</span>
        <input class="form-control " type="text" name="txtsueldo" placeholder="Ingresa el Sueldo"> <br>
        </div>

        <label for="name" class="form__label"> Lugar*</label> <br>
        <div class="form-row" text-align: center;>
        <div class="col">
        <select class="btn btn-light disabled" name="cmbpais">
            <option value="">Elige una opción</option>
            <div>
            <<option value="54">Argentina</option>
            <option value="591">Bolivia</option>
            <option value="55">Brasil</option>
            <option value="56">Chile</option>
            <option value="57">Colombia</option>
            <option value="506">Costa Rica</option>
            <option value="53">Cuba</option>
            <option value="593">Ecuador</option>
            <option value="503">El Salvador</option>
            <option value="1473">Granada</option>
            <option value="502">Guatemala</option>
            <option value="592">Guayana</option>
            <option value="509">Haití</option>
            <option value="504">Honduras</option>
            <option value="1876">Jamaica</option>
            <option value="52">México</option>
            <option value="505">Nicaragua</option>
            <option value="507">Panamá</option>
            <option value="595">Paraguay</option>
            <option value="51">Perú</option>
            <option value="1">Puerto Rico</option>
            <option value="1809">República Dominicana</option>
            <option value="597">Surinam</option>
            <option value="598">Uruguay</option>
            <option value="58">Venezuela</option>
            <select><br>
         </div></div><br>

        <label for="name" class="form__label"> Datos Adicionales *</label> <br>
        <input class="form-control" type="text" name="txtdatos" placeholder="Ingresa los Datos"> <br>


        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="dateFECHA">Seleccione Fecha de Inicio: *</label><br>
            <input class="form-control" type="date" id="dateInicio" name="dateInicio" value="2023-01-01">
        </div>
        <br>
        <div class="form-group col-md-6">
            <label for="dateFECHA">Seleccione Fecha de Vencimiento *</label><br>
            <input class="form-control" type="date" id="dateFin" name="dateFin" value="2023-01-01">
        </div>
        <br>

        <input name ="txtlatitud" id="latitud"type="hidden">
				<input name="txtlongitud" id="longitud" type="hidden">

      <input class="btn btn-primary" style="margin-left:224px;" type="submit"  value="Guardar">
      </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
  integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
  integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>