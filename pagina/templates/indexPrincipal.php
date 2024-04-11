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
        
        // Verificar si el elemento está registrado en la base de datos
        $.ajax({
            url: '../php/verificar_video.php',
            type: 'GET',
            success: function(response){
                      // Si el elemento está registrado, lo eliminamos del navbar
                      if(response === 'no_registrado'){
                            document.addEventListener("DOMContentLoaded", function () {
                              var modal = document.getElementById('popupNotification');
                              $(modal).modal('show');
                            });
                      }
                    }
                });
    </script>
</head>

<body style="background-color: #F8F6F3;">

    <!-- {*Barra de navegacion para Usuarios*} -->
    <?php include("navbar_usuario.php") ?>

    <!-- <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true"
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
    </div>  -->

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
            // Redirige al usuario a la ventana deseada
            window.location.href = "video_curriculum.php";
        });
        document.getElementById("btnCerrar").addEventListener("click", function () {
            var modal = document.getElementById('popupNotification');
            $(modal).modal('hide');
        });
    </script>




<div style="max-width: 100%; padding: 5vw; background-size: cover; background-position: center; display: grid; grid-template-columns: auto 1fr; gap: 5vw; color: white; align-items: center;">
    <!-- Imagen a la izquierda -->
    <div style="display: flex; flex-direction: column; justify-content: center; background-color: rgba(0, 0, 0, 0.7); padding: 2vw; border-radius: 20px;">
       <div style="max-width: 40vw;">
        <img src="../../assets/images/index_usuario/OFICINA.svg" alt="Imagen" width="300" height="230" style="width: 100%; border-radius: 20px;">
        <h3 style="text-align: center; margin: 0; color: white;">Descubre oportunidades profesionales excepcionales al asociarte con algunas de las empresas más destacadas</h3>
        <p style="text-align: justify; margin: 2vw 0;">Explora una amplia gama de oportunidades laborales adaptadas a tus habilidades y preferencias con Workele. Nuestro proceso de búsqueda de trabajo es eficiente y personalizado, diseñado para maximizar tus posibilidades de éxito. ¡Descubre un mundo de emocionantes oportunidades laborales con nosotros!</p>
    </div>
</div>

<!-- Segunda imagen a la derecha -->
<div style="display: flex; flex-direction: column; justify-content: center; background-color: rgba(0, 0, 0, 0.7); padding: 2vw; border-radius: 20px;">
   <div style="max-width: 40vw;">
    <img src="../../assets/images/index_usuario/OFICINA.svg" alt="Imagen" width="300" height="230" style="width: 100%; border-radius: 20px;">
    <h3 style="text-align: center; margin: 0; color: white;">Descubre oportunidades profesionales excepcionales al asociarte con algunas de las empresas más destacadas</h3>
    <p style="text-align: justify; margin: 2vw 0;">Explora una amplia gama de oportunidades laborales adaptadas a tus habilidades y preferencias con Workele. Nuestro proceso de búsqueda de trabajo es eficiente y personalizado, diseñado para maximizar tus posibilidades de éxito. ¡Descubre un mundo de emocionantes oportunidades laborales con nosotros!</p>
</div>
</div>
</div> 



<div style="max-width: 100%; background-color: red;">
    <div style="display: flex;">
        <!-- Imagen a la izquierda -->
        <div style="flex: 0 0 40%; max-width: 40%;">
            <img src="../../assets/images/index_usuario/OFICINA.svg" alt="Imagen" width="300" height="230" style="width: 100%; border-radius: 20px;">
        </div>
        <!-- Contenido de la tarjeta a la derecha -->
        <div style="flex: 1;">
            <div style="padding: 1rem;">
                <h5 style="margin-top: 0;">Encuentra el empleo o las prácticas adecuadas para ti</h5>
                <p style="margin-bottom: 0;">Explora una amplia gama de oportunidades laborales adaptadas a tus habilidades y preferencias con Workele. Nuestro proceso de búsqueda de trabajo es eficiente y personalizado, diseñado para maximizar tus posibilidades de éxito. ¡Descubre un mundo de emocionantes oportunidades laborales con nosotros!</p>
            </div>
        </div>
    </div>
</div>



    <!-- {*Conexion de librerias de JavaScript y bootstrap*}      -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <!-- {* <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.5/push.js" integrity="sha512-dzuBh7UxT5g4MmnbR3ybHMK2g2zxGXILXHuLsUwo8XJmoW2JTTqcg4bFFu0RnBO+kPTvKafgVYh8hnCN/l8ijQ=="crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.5/push.min.js" integrity="sha512-1zotA6QprPWXVvgx8KFnvanxTZhm7P/uadmELhEUs3fHYvGDqkYa0ZUc3Q0m+3w7AUcgG5k4rUiFDdSkRJhqaA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> *} -->

</body>

<!-- {*Footer*} -->
<?php include("footer.php") ?>

</html>