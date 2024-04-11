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

    <div style="max-width: 100%; padding: 5vw; background-image: url('../../assets/images/index_usuario/PERSONAL2.svg'); background-size: cover; background-position: center; display: flex; justify-content: center; align-items: center;">
    <div style="display: flex; flex-direction: column; justify-content: center; background-color: rgba(0, 0, 0, 0.7); padding: 2vw; border-radius: 10px; text-align: center;">
        <h2 style="margin: 0; color: white;">Únete a nuestra comunidad y obtén 3 meses de prueba para publicar tus ofertas laborales</h2>
        <p style="margin: 2vw 0; color: white;">Permítenos optimizar tus procesos de reclutamiento y descubrir el talento que necesitas. Explora nuestros planes diseñados para adaptarse a tus necesidades específicas</p>
        <div style="display: flex; justify-content: center;">
            <a href="postulacion.php" style="width: 120px; height: 60px; display: inline-block; background-color: #FF5733; color: #fff; padding: 15px 20px; font-size: 1rem; text-decoration: none; border-radius: 5px; margin-bottom: 20px;">Ver planes</a>
        </div>
    </div>
</div>
 
    <div style="display: flex; flex-wrap: wrap; justify-content: space-around; padding: 2vw;">
    <div style="text-align: center; flex: 1 0 25%;">
        <img src="../../assets/images/index_usuario/VACANTE.svg" alt="Publica tus vacantes" style="width: 170px; height: 170px; border-radius: 50%; box-shadow: 0 0 20px rgba(0, 0, 0, 0.3); max-width: 100%;">
        <div style="margin-top: 20px;">
            <h3 style="color: #333;">Publica tus vacantes</h3>
            <p style="color: #666;">Maximiza la visibilidad de tus oportunidades laborales al publicarlas con nosotros</p>
        </div>
    </div>
    <div style="text-align: center; flex: 1 0 25%;">
        <img src="../../assets/images/index_usuario/BUSCAR.svg" alt="Revisa las postulaciones" style="width: 170px; height: 170px; border-radius: 50%; box-shadow: 0 0 20px rgba(0, 0, 0, 0.3); max-width: 100%;">
        <div style="margin-top: 20px;">
            <h3 style="color: #333;">Revisa las postulaciones</h3>
            <p style="color: #666;">Explora las postulaciones recibidas y selecciona a los candidatos ideales para tus vacantes</p>
        </div>
    </div>
    <div style="text-align: center; flex: 1 0 25%;">
        <img src="../../assets/images/index_usuario/CONTRATA.svg" alt="Contrata" style="width: 170px; height: 170px; border-radius: 50%; box-shadow: 0 0 20px rgba(0, 0, 0, 0.3); max-width: 100%;">
        <div style="margin-top: 20px;">
            <h3 style="color: #333;">Contrata</h3>
            <p style="color: #666;">Descubre talento excepcional para tu empresa. ¡Contrata a los mejores profesionales hoy mismo!</p>
        </div>
    </div>
</div>


<div class="container" style="max-width: 100%; text-align: center; background-color: #B0E0E6;">
    <p style="font-size: 2rem; line-height: 1.5; padding-top: 20px; padding-bottom: 20px; max-width: 60%; margin: auto;">
        <strong>Publica tu oferta en Workele,</strong> y recluta con la web de empleo preferida por las empresas y candidatos
    </p>
    <a href="postulacion.php" style="display: inline-block; background-color: #FF5733; color: #fff; padding: 15px 30px; font-size: 1.25rem; text-decoration: none; border-radius: 5px; margin-bottom: 20px;">Encontrar candidatos</a>
</div>
    
    <!--Conexion de librerias de JavaScript y bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  </body>
<!-- {*Footer*} -->
<?php include("footer.php") ?>

</html>