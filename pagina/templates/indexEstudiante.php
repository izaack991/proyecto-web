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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/notificacion_estudiante.js"></script>

</head>

<body style="background-color: #F8F6F3;">

  <!-- {*Barra de navegacion para Usuarios*} -->
  <?php include("navbar_estudiante.php") ?>

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
    <div style="display: flex; flex-direction: column; justify-content: center; background-color: rgba(0, 0, 0, 0.7); padding: 2vw; border-radius: 10px; text-align: center;">
      <h2 style="margin: 0; color: white;">Descubre oportunidades profesionales excepcionales al asociarte con algunas de las empresas más destacadas</h2>
      <p style="margin: 2vw 0; color: white;">Explora una amplia gama de oportunidades laborales adaptadas a tus habilidades y preferencias con Workele. Nuestro proceso de búsqueda de trabajo es eficiente y personalizado, diseñado para maximizar tus posibilidades de éxito. ¡Descubre un mundo de emocionantes oportunidades laborales con nosotros!</p>
      <div style="display: flex; justify-content: center;">
        <a href="#" style="width: 140px; height: 50px; display: inline-block; background-color: #FF5733; color: #fff; padding: 12px 20px; font-size: 1rem; text-decoration: none; border-radius: 5px; margin-bottom: 20px;">PRUEBA</a>
      </div>
    </div>
  </div>


  <div style="background-color: #F0E68C; padding: 20px; text-align: center;">
    <h3 style=" margin: 0; color: #333;">Empresas contratando</h3>
    <p style="font-size: 18px; margin: 10px 0; color: #666;">Con las mejores vacantes esperándote</p>
  </div>
  <br>
  <div style="display: flex; flex-wrap: wrap; gap: 50px; justify-content: center;">
    <div style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
      <img src="../../assets/images/index_usuario/DIAMOND.svg" alt="Logo Empresa 1" style="max-width: 100%; max-height: 100%;">
    </div>
    <div style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
      <img src="../../assets/images/index_usuario/LION.svg" alt="Logo Empresa 2" style="max-width: 100%; max-height: 100%;">
    </div>
    <div style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
      <img src="../../assets/images/index_usuario/MANGO.svg" alt="Logo Empresa 3" style="max-width: 100%; max-height: 100%;">
    </div>
    <div style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
      <img src="../../assets/images/index_usuario/SAMIRA.svg" alt="Logo Empresa 4" style="max-width: 100%; max-height: 100%;">
    </div>
    <div style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
      <img src="../../assets/images/index_usuario/SALFORD.svg" alt="Logo Empresa 5" style="max-width: 100%; max-height: 100%;">
    </div>
  </div>

  <br>

  <div style="display: flex; flex-wrap: wrap; gap: 50px; justify-content: center;">
    <div style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
      <img src="../../assets/images/index_usuario/COLOR.svg" alt="Logo Empresa 6" style="max-width: 100%; max-height: 100%;">
    </div>
    <div style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
      <img src="../../assets/images/index_usuario/BORCELLE.svg" alt="Logo Empresa 7" style="max-width: 100%; max-height: 100%;">
    </div>
    <div style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
      <img src="../../assets/images/index_usuario/PHANTOM.svg" alt="Logo Empresa 8" style="max-width: 100%; max-height: 100%;">
    </div>
    <div style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
      <img src="../../assets/images/index_usuario/WIND.svg" alt="Logo Empresa 9" style="max-width: 100%; max-height: 100%;">
    </div>
    <div style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
      <img src="../../assets/images/index_usuario/FAUGET.svg" alt="Logo Empresa 10" style="max-width: 100%; max-height: 100%;">
    </div>
  </div>

  <br>

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