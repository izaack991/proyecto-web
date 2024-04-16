<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Suscripciones</title>
  <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/notificacion.js"></script>

  <script>
    function validarLetras(event) {
      var charCode = event.charCode;
      // Permitir letras (mayúsculas y minúsculas) y espacios
      return (charCode >= 65 && charCode <= 90) || // Letras mayúsculas
        (charCode >= 97 && charCode <= 122) || // Letras minúsculas
        charCode === 32; // Espacio
    }
  </script>

</head>

<!-- {*Codigo de CSS para el diseño personalisado del curriculum*} -->
<style>
  .pregresp {
    border: 1px solid #20c997;
    padding: 10px;
    margin: 10px;
    border-radius: 0.4rem;
  }

  .bcol {
    border: 1px solid #cacaca;
    padding: 5px;
    margin: 20px;
    border-radius: 0.4rem;
  }

  .titulo {
    color: #20c997;
  }

  .card.selected {
    border-color: #e50914;
    /* Cambia el color del borde cuando se selecciona */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    /* Agrega una sombra cuando se selecciona */
  }
</style>

<body>

  <!-- {*Conexion de librerias de JavaScript y bootstrap*} -->

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <!--Barra de navegacion para Empresa-->
  <?php include ("navbar_empresa.php") ?>

  <!-- Suscripciones por Postulaciones -->
  <div class="container text-center">
    <div class="row align-items-start" style="Margin-top: 2em;">
      <div class="col">
        <div class="card shadow border-primary mb-3" style="max-width: 20rem;" onclick="toggleSelection(this)">
          <div class="card-header bg-primary text-white"><strong>BASICA</strong></div>
          <div class="card-body">
            <h4 class="card-title">$1</h4>
            <p class="card-text">- Opcion de Realizar 1 postulaciones mensuales</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadow border-primary mb-3" style="max-width: 20rem;" onclick="toggleSelection(this)">
          <div class="card-header bg-primary text-white"><strong>ESTANDAR</strong></div>
          <div class="card-body">
            <h4 class="card-title">$2</h4>
            <p class="card-text">- Opcion de Realizar 3 postulaciones mensuales</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadow border-primary mb-3" style="max-width: 20rem;" onclick="toggleSelection(this)">
          <div class="card-header bg-primary text-white"><strong>PRO</strong></div>
          <div class="card-body">
            <h4 class="card-title">$3</h4>
            <p class="card-text">- Opcion de Realizar postulaciones ilimitadas mensuales</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../js/suscripcion.js"></script>


</body>

</html>