<?php 
  session_start();
  include_once "../clases/conexion.class.php";
  if(!isset($_SESSION['rol'])){
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat</title>
  <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- <script src="../php/Buscar_vacantes.php'"></script> -->
  <script src="../js/Buscar_vacantes.js"></script>
  <script>
    // Tiempo de inactividad en milisegundos (por ejemplo, 5 minutos)
    var tiempoInactividad = 5 * 60 * 1000;

    // Página a la que se redireccionará después de la inactividad
    var paginaRedireccion = "https://www.workele.com";

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

    $(document).ready(function(){
            // Función para actualizar el chat
            function updateChat(){
                $.ajax({
                    url: "get_messages.php",
                    type: "GET",
                    success: function(response){
                        $("#chat").html(response);
                    }
                });
            }

            // Llama a la función para actualizar el chat cada segundo
            setInterval(updateChat, 1000);

            // Enviar mensaje del usuario
            $("#send").click(function(){
                var message = $("#message").val();
                $.ajax({
                    url: "send_message.php",
                    type: "POST",
                    data: { message: message },
                    success: function(response){
                        $("#message").val("");
                    }
                });
            });
        });

  </script>
</head> 
<body>
<div id="chat"></div>
    <input type="text" id="message" placeholder="Ingrese su mensaje aquí">
    <button id="send">Enviar</button>
</body>
</html>