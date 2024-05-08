<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de vacantes</title>
  <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/styles.css">
  <link rel="icon" href="../../assets/images/WorkeleWB.ico" type="image/x-icon">
  <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/notificacion_usuario.js"></script>

  <!-- <script src="../php/Buscar_vacantes.php'"></script> -->
  <script src="../js/Buscar_vacantes.js"></script>

  <script>
    // Codigo JavaScript para el buscador con ajax
    $(document).ready(function () {
      $("#bvac").keyup(function () {
        var query = $(this).val().toLowerCase();
        $("#vacantesContainer").children().each(function () {
          if ($(this).text().toLowerCase().indexOf(query) === -1)
            $(this).hide();
          else
            $(this).show();
        });
      });
    });

  </script>

</head>

<body style="background-color: #F8F6F3;">
  <!-- {*Barra de navegacion para Usuarios*} -->
  <?php include ("navbar_usuario.php") ?>
  <br>
  <div class="container-fluid" style="min-height: 65vh;">

  <form action="buscar_vacante.php" method="GET">
    
    <!-- Buscador de vacantes con ajax  -->
    <div class="alert alert-dismissible text-center px-0">
      <input type="text" class="form-control" placeholder="Busque una vacante" style="display: flex; margin: 0 10%; width: 80%; text-align: center;" id="bvac">
    </div>

    <!-- <input type="hidden" name="pagina" id="inputPagina" value="2">
    <input type="submit" value="Siguiente" class="btn btn-primary" id="siguienteBtn"> -->

    <!-- Contenedor de las vacantes -->
    <div id="vacantesContainer" class="row justify-content-center mx-2"></div>

  </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

<?php include ("footer.php") ?>
</html>