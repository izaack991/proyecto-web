<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio Empresa</title>
  <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/indexAdmin.js"></script>
  
</head>

<body>

  <!--Barra de navegacion para Empresa-->
  <?php include ("navbar_admin.php") ?>
  <div class="d-flex justify-content-center align-items-center" style="margin-top: 5rem;">
    <div class="card shadow w-75">
      <div class="card-header bg-primary text-center">
        <h1 class="text-white"><b>USUARIOS</b></h1>
      </div>
      <div class="card-body">
        <div class="row mt-3 mb-4 justify-content-center">
          <div class="col" style="margin-left:0.8rem;">
            <div class="card rounded shadow">
              <div class="row g-0">
                <div class="col-md-4 bg-primary rounded d-flex justify-content-center align-items-center">
                  <span class="fa-lg text-white">
                    <i class="fas fa-users" style="font-size:8rem;"></i>
                  </span>
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">PERFILES REGISTRADOS</h5>
                    <h1 id="cont_usuario" style="font-size:4rem;">0</h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card rounded shadow">
              <div class="row g-0">
                <div class="col-md-4 bg-primary rounded d-flex justify-content-center align-items-center">
                  <span class="fa-lg text-white">
                    <i class="fas fa-city" style="font-size:7rem;"></i>
                  </span>
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">EMPRESAS REGISTRADAS</h5>
                    <h1 id="cont_empresa" style="font-size:4rem;">0</h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!--Conexion de librerias de JavaScript y bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>