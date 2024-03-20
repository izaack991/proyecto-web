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
  <script>  
      // Tiempo de inactividad en milisegundos (por ejemplo, 5 minutos)
    var tiempoInactividad = 5 * 60 * 1000; 

    // Página a la que se redireccionará después de la inactividad
    var paginaRedireccion = "index.php";

    var tiempoInactivo;

    // Función para redireccionar
    function redireccionar() {
      window.location.href = paginaRedireccion;
    }

    // Reiniciar el temporizador de inactividad
    function reiniciarTemporizador() {
      clearTimeout(tiempoInactivo);
      tiempoInactivo = setTimeout(redireccionar, tiempoInactividad);
    }

    // Cuando se cargue la página, iniciar el temporizador
    reiniciarTemporizador();

    // Reiniciar el temporizador si se detecta actividad
    document.addEventListener("mousemove", reiniciarTemporizador);
    document.addEventListener("keypress", reiniciarTemporizador);
  </script>
  <body style="background-color: #F8F6F3;">

    <!--Barra de navegacion para Empresa-->
    <?php include("navbar_empresa.php") ?>

    <br>
    <div style="display: flex; justify-content: space-around; padding: 20px;">
    <div style="text-align: center;">
        <img src="../../assets/images/index_usuario/PUBLICAR.png" alt="Imagen 1" style="width: 200px; height: auto;">
        <div>
            <h3>Publica tus vacantes</h3>
            <p>Maximiza la visibilidad de tus oportunidades laborales al publicarlas con nosotros</p>
        </div>
    </div>
    <div style="text-align: center;">
        <img src="../../assets/images/index_usuario/REVISAR.png" alt="Imagen 2" style="width: 200px; height: auto;">
        <div>
            <h3>Revisa las postulaciones</h3>
            <p>Explora las postulaciones recibidas y selecciona a los candidatos ideales para tus vacantes</p>
        </div>
    </div>
    <div style="text-align: center;">
        <img src="../../assets/images/index_usuario/CONTRATAR.png" alt="Imagen 3" style="width: 200px; height: auto;">
        <div>
            <h3>Contrata</h3>
            <p>Descubre talento excepcional para tu empresa. ¡Contrata a los mejores profesionales hoy mismo!</p>
        </div>
    </div>
</div>


<br>

<!-- <h3 style="text-align: center;">Trabajamos con las empresas más destacadas, ofreciéndote la oportunidad de encontrar las mejores vacantes disponibles</h3> -->


<div class="card border-0 rounded-0" style="background-color: #000000;">
    <div id="carouselExample" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-md-4">
                        <img src="../../assets/images/index_usuario/DECORACION-CHIC.jpeg" class="d-block w-100" alt="Slide 1" style="max-width: 300px; margin-left: 20px;">
                    </div>
                    <div class="col-md-4">
                        <img src="../../assets/images/index_usuario/ARTICS-SOLUCIONES.jpeg" class="d-block w-100" alt="Slide 2" style="max-width: 300px; margin-left: 100px;">
                    </div>
                    <div class="col-md-4">
                        <img src="../../assets/images/index_usuario/ENSIGNA.jpeg" class="d-block w-100" alt="Slide 3" style="max-width: 300px; margin-left: 137px;">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-md-4">
                        <img src="../../assets/images/index_usuario/SEBASTIAN BENNETT.jpeg" class="d-block w-100" alt="Slide 4" style="max-width: 300px; margin-left: 20px;">
                    </div>
                    <div class="col-md-4">
                        <img src="../../assets/images/index_usuario/BRAIS-PERNAS.jpeg" class="d-block w-100" alt="Slide 5" style="max-width: 300px; margin-left: 100px;">
                    </div>
                    <div class="col-md-4">
                        <img src="../../assets/images/index_usuario/ARCHIS.jpeg" class="d-block w-100" alt="Slide 6" style="max-width: 300px; margin-left: 137px;">
                    </div>
                </div>
            </div>
        </div>
        <!-- <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a> -->
    </div>
</div>

    
    <!--Conexion de librerias de JavaScript y bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  </body>

<!-- {*Footer*} -->
<?php include("footer.php") ?>

</html>