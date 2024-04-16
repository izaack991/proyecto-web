<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formacion Academica</title>
  <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/styles.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../js/notificacion_usuario.js"></script>

</head>

<body style="background-color: #F8F6F3;">

  <!-- {*Conexion al archivo de JavasScript para la ubicacion y bootstrap*} -->
  <script src="../js/ubicacion.js"></script>

  <!-- {*Barra de navegacion para Usuarios*} -->
  <?php include ("navbar_usuario.php") ?>

  <div class="container-fluid">
    <!-- {*Formulario de Formacion Academica*} -->
    <form id="formFormacionAcademica" method="POST">
      <!-- {*Card de formacion academica*}                -->
      <div class="card shadow mb-3" style="max-width: 30rem; margin:auto; margin-top:30px; border-radius:25px;">
        <div class="card-header text-center bg-primary" style="border-top-left-radius:25px;border-top-right-radius:25px;">
          <h4 class="text-white">FORMACIÓN ACADÉMICA</h4>
        </div>
        <div class="card-body">
        <button id="btnAbrirModal" valor="FA2" type="button" class="btn btn-primary btn-sm rounded-circle py-0 px-0 border-green align-center" style="right:0; top: 85px; margin-right:25px; position: absolute;border-width:0.1rem; font-size: 1em; width: 26px; height:26px;" >?</button>
          <label class="text-primary">Los campos marcados con asterisco (*) son obligatorios</label>
          <!-- {*Campos para los datos de formacion academica*} -->
          <div class="form-floating mb-3 mt-4">
            <input class="form-control" type="text" name="descripcion" placeholder="Nombre de la Institución Educativa" maxLength="50" required="true">
            <label for="floatingInput">Nombre de la Institución Educativa *</label>
          </div>
          <div class="form-floating mb-3 mt-4">
            <input class="form-control" type="text" name="ubicacion" placeholder="Ubicación" maxLength="100" required="true">
            <label for="floatingInput">Ubicación *</label>
          </div>
          <div class="form-floating mb-3 mt-4">
                <input class="form-control" type="date" id="fechaInicio" name="fechaInicio" value="2022-01-01">
                <label for="fechaInicio">Seleccione su Fecha de inicio: *</label><br>
          </div>
          <div class="form-floating mb-3 mt-4">
                <input class="form-control" type="date" id="fechaFin" name="fechaFin" value="2022-01-01">
                <label for="fechaFin">Seleccione su Fecha fin: *</label><br>
          </div>

          <!-- {*Campos internos para la ubicacion*} -->
          <input name="txtlatitud" id="latitud" type="hidden">
          <input name="txtlongitud" id="longitud" type="hidden">
          <!-- {*Boton para guardar la formacion academica*} -->
          <div class="container text-center mt-4">
            <input class="btn btn-primary w-50" type="submit" value="Guardar">

          </div>
        </div>
      </div>

    </form>
  </div>

  <!-- {*Conexion de librerias de JavaScript y bootstrap*} -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="../js/insert.js"></script>
</body>

</html>