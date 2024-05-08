<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Interés </title>
  <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
  <link rel="icon" href="../../assets/images/WorkeleWB.ico" type="image/x-icon">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/styles.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/notificacion_usuario.js"></script>

  <script>
    // funcion para solo letras mayúsculas, minúsculas y espacios
    function validarLetras(event) {
      var charCode = event.charCode;
      // Permitir letras (mayúsculas y minúsculas) y espacios
      return (charCode >= 65 && charCode <= 90) || // Letras mayúsculas
        (charCode >= 97 && charCode <= 122) || // Letras minúsculas
        charCode === 32; // Espacio
    }
  </script>

</head>

<body style="background-color: #F8F6F3;">

  <!-- {*Conexion a librerias de JavasScript para la ubicacion y bootstrap*} -->
  <script src="../js/ubicacion.js"></script>

  <!-- {*Barra de navegacion para Usuarios*} -->
  <?php include ("navbar_usuario.php") ?>

  <div class="container-fluid" style="margin-bottom: 10%;">
    <!-- Formulario de interes -->
    <form id="formInteres" method="POST">

      <!-- Card de interes -->
      <div class="card shadow mb-3" style="max-width: 30rem; margin:auto; margin-top:30px;border-radius:25px;">
        <div class="card-header text-center bg-primary" style="border-top-left-radius:25px;border-top-right-radius:25px;">
          <h4 class="text-white">DATOS DE INTERÉS</h4>
        </div>
        <div class="card-body">
          <button id="btnAbrirModal" valor="FA4" type="button" class="btn btn-primary btn-sm rounded-circle py-0 px-0 border-green align-center" style="right:0; top: 85px; margin-right:25px; position: absolute;border-width:0.1rem; font-size: 1em; width: 26px; height:26px;">?</button>
          <label class="text-primary">Los campos marcados con asterisco (*) son obligatorios</label><br>

          <!-- Campos para los datos de interes -->
          <div class="form-floating mb-3 mt-4">
            <textarea name="txtdesc" type="text" style="height: 90px; resize:none;" class="form-control" maxlength="100" cols="1" rows="10" required="true" placeholder="Ingrese sus datos de interes"></textarea>
            <label for="floatingInput">Descripcion *</label>
          </div>

          <!-- Campos internos para la ubicacion -->
          <input name="txtlatitud" id="latitud" type="hidden">
          <input name="txtlongitud" id="longitud" type="hidden">

          <!-- Boton para guardar interes -->
          <div class="container text-center mt-4">
            <input class="btn btn-primary w-50" type="submit" value="Guardar">
          </div>
        </div>
      </div>
    </form>
  </div>

  <!-- Conexion de librerias de JavaScript y bootstrap -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="../js/insert.js"></script>
</body>

<?php include ("footer.php") ?>
</html>