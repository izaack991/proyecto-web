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
    <script src="../js/notificacion_usuario.js"></script>
 
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
  </head>

  <body>

  <?php include("navbar_usuario.php") ?>
    <!-- {*Barra de navegacion para Usuarios*} 
  

     <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true"
      style="max-width: 20rem; margin:auto; margin-top:30px;">
      <div class="toast-header">
        <strong class="me-auto">Pagina Principal</strong>
        <button type="button" class="btn-close ms-2 mb-1" data-bs-dismiss="toast" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="toast-body">
        Bienvenido!
      </div>
    </div> -->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner text-center">
    <div class="carousel-item active">
      <img src="../../assets/images/index_usuario/DECORACION-CHIC.png" class="img-fluid" alt="Slide 1">
      </div>
    </div>
    <div class="carousel-item">
    <img src="../../assets/images/index_usuario/ARTICS-SOLUCIONES.png" class="d-block w-100" alt="Slide 1">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
    <img src="../../assets/images/index_usuario/ENSIGNA.png" class="d-block w-100" alt="Slide 1">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

    <!-- {*Conexion de librerias de JavaScript y bootstrap*}      -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
    <!-- {* <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.5/push.js" integrity="sha512-dzuBh7UxT5g4MmnbR3ybHMK2g2zxGXILXHuLsUwo8XJmoW2JTTqcg4bFFu0RnBO+kPTvKafgVYh8hnCN/l8ijQ=="crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.5/push.min.js" integrity="sha512-1zotA6QprPWXVvgx8KFnvanxTZhm7P/uadmELhEUs3fHYvGDqkYa0ZUc3Q0m+3w7AUcgG5k4rUiFDdSkRJhqaA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> *} -->

  </body>

</html>