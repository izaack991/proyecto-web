<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio Usuario</title>
  <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
  <link rel="icon" href="../../assets/images/WorkeleWB.ico" type="image/x-icon">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/notificacion_usuario.js"></script>
  <script src="../js/BuscadorUsuario.js"></script>
 


  <script>
    // Verificar si el elemento está registrado en la base de datos
    $.ajax({
      url: '../php/verificar_video.php',
      type: 'GET',
      success: function (response) {
        // Si el elemento está registrado, lo eliminamos del navbar
        if (response === 'no_registrado') {
          document.addEventListener("DOMContentLoaded", function () {
            var modal = document.getElementById('popupNotification');
            $(modal).modal('show');
          });
        }
      }
    });
  </script>


</head>

<body style="background-color: #F8F6F3;">

  <!-- {*Barra de navegacion para Usuarios*} -->
  <?php include ("navbar_usuario.php") ?>

  <!-- Modal -->
  <div class="modal" id="popupNotification" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header pb-2 bg-primary">
          <h3 class="text-white w-100">NOVEDAD!!!</h3>
          <button type="button" id="btnCerrar" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row justify-content-center">
              Nueva función de video currículum disponible, pruebala ahora.
            </div>
            <div class="row mt-3 mx-2">
              <button type="button" class="btn btn-primary w-100" id="btnProbar">Probar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- NO FUNCIONA SI SE COLOCA ARRIBA JUNTO A LOS DEMÁS SCRIPTS -->
  <script>
    // Función para redirigir al usuario cuando haga clic en el botón "Probar"
    document.getElementById("btnProbar").addEventListener("click", function () {
      window.location.href = "video_curriculum.php";
    });
    document.getElementById("btnCerrar").addEventListener("click", function () {
      var modal = document.getElementById('popupNotification');
      $(modal).modal('hide');
    });
  </script>


<div style="max-width: 100%; padding: 5vw; background-image: url('../../assets/images/index_usuario/VIDEO.gif'); background-size: cover; background-position: center; display: flex; justify-content: center; align-items: center;">
    <div style="display: flex; flex-direction: column; justify-content: center; background-color: rgba(0, 0, 0, 0.7); padding: 2vw; border-radius: 10px;">
      <h2 style="margin: 0; color: white; text-align: center;">Descubre oportunidades profesionales excepcionales al asociarte con algunas de las empresas más destacadas</h2>

<!-- Buscador de Vacantes en indexusuario-->
<div class="container mt-4">
  <div class="col-12">
    <div class="mb-2">
      <h4 class="form-label"></h4>
      <input onkeyup="buscar_ahora(this.value);" type="text" class="form-control" placeholder="Busque una vacante" style="text-align: center;" name="buscar_1" id="buscar_1">
    </div>
    
    <div id="resultados" class="card col-12 mt-2" style="display: none; max-height: 200px; overflow-y: auto;">
    <div class="card-body">
        <ul id="lista-resultados" class="list-group"></ul>
    </div>
</div>

  </div>
</div>

    </div>
  </div>


  <div style="background-color: #FFD700; padding: 20px; text-align: center;">
    <h3 style=" margin: 0; color: #333;">Empresas contratando</h3>
    <p style="font-size: 18px; margin: 10px 0; color: #666;">Completa todos los formularios para crear un currículum integral y profesional</p>
  </div>
 
  <div class="box b_radius_none posRel" style="background-color: #B0E0E6; padding: 30px;">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3 class="fs-4">Si buscas trabajo ¡Workele es tu mejor aliado!</h3>

          <div class="mt-5">
            <p class="fs-5 mt-3">Miles de ofertas de empleo están esperándote</p>
            <p class="fs-5">Te ayudamos a encontrar un empleo mejor</p>
            <p class="fs-6 mb-5">Haz que tu currículum sea visible para miles de empresas en nuestra bolsa de trabajo</p>
          </div>
        </div>
        <div class="col-md-6">
          <img src="../../assets/images/index_usuario/OFICINAS.svg" alt="Encontrar empleo" class="img-fluid" style="max-width: 100%; height: auto;">
        </div>
      </div>
    </div>
  </div>



  <!-- {*Conexion de librerias de JavaScript y bootstrap*}      -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>

</body>

<!-- {*Footer*} -->
<?php include ("footer.php") ?>

</html>