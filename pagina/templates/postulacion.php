<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Postulaciones</title>
    <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/postulacion.js"></script>
 
  </head>
  
  <body style="background-color: #F8F6F3;">
    <!--Barra de navegacion para Empresa-->
    <?php include("navbar_empresa.php") ?>

    <!-- Card de potulaciones -->
    <div class="container-fluid" style="min-height: 65vh;">
      <div class="card border-light shadow-lg bg-body rounded mt-4">
        <div class="card-header text-center bg-primary">
          <h2 class="card-title text-white mb-0">POSTULACIONES</h2>
        </div>
        <div class="card-body">
          <!-- Tabla de postulaciones -->
          <div id="tablaUsuarios" class="table-responsive"></div>
        </div>
      </div>
    </div>
            

    <!-- Conexion de librerias de JavaScript y bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  </body>

<?php include ("footerEmpresa.php") ?>
</html>