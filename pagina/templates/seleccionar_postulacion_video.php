<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum</title>
    <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/notificacion.js"></script>
 
  </head>

  <!-- {*Codigo de CSS para el diseño personalisado del curriculum*} -->
  <style>
    .pregresp {
      border: 0.5px solid lightgrey;
      padding: 10px;
      margin: 10px;
      border-radius: 0.4rem;
    }

    .titulo {
      color: #20c997;
    }
  </style>

  <body>

    <!-- {*Conexion de librerias de JavaScript y bootstrap*} -->
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!--Barra de navegacion para Empresa-->
    <?php include("navbar_empresa.php") ?>
    
    <!-- {*Card del curriculum del usuario*} -->
    <div class="card border-primary shadow mb-5 rounded" style="max-width: 80%; margin:auto; margin-top:30px;">
      <div class="card-header text-center bg-primary">
        <h2 class="card-title titulo text-white">VIDEO CURRICULUM</h2>
      </div>
    
      <center>
        <div class="card-body">
          <div class="row">
            <div class="col"></div>
            <div class="col">
              <!-- {*Boton para enviar tests*} -->
              <div class="row justify-content-center align-items-center" id="btn_enviartest">
              </div>
            </div>
          </div>
          <div class="row align-items-center pregresp shadow mt-3">

            <!-- {*Datos del usuario*} -->
            
              <div class="col">
                <h4 class="text-white bg-dark py-2"><b>USUARIO</b></h4>
                <div id="tabla_usuario">
                </div>
              </div>

            <!-- {*Datos de la vacante*} -->
              <div class="col">
                  <h4 class="text-white bg-dark py-2"><b>VACANTE</b></h4>
                  <div id="tabla_vacante">
                  </div>
              </div>

          </div>
          
          <!-- {*Datos de los intereses del usuario*} -->
          <div class="pregresp shadow mt-4">
            <h4 class="text-white bg-dark py-2"><b>VIDEO</b></h4>
            <div class="row align-items-center">
              <div class="col">
                <div id="tabla_interes">
                </div>
              </div>
            </div>
          </div>

        </div>
      </center>
    </div>
    
  </body>
  <script>
        $(document).ready(function() {
            // Extraer los parámetros de la URL
            var urlParams = new URLSearchParams(window.location.search);
            var id_postulacion = urlParams.get('id_postulacion');
            var id_usuario = urlParams.get('id_usuario');

            $.ajax({
                url: "../php/seleccionar_postulacion_video.php",
                type: "GET",
                data: { id_postulacion: id_postulacion, id_usuario: id_usuario },
                dataType: "json",
                success: function(data) {
                  //Mostrar datos del Usuario y la Vacante
                  tabla_usuario = "<table class='table table-hover mt-1'><thead class='text-primary'><tr><th class='text-center border-0' style='font-size:1.2rem;'>Nombre</th></thead></tr>"
                  tabla_vacante = "<table class='table table-hover mt-1'><thead class='text-primary'><tr><th class='text-center border-0' style='font-size:1.2rem;'>Puesto</th></thead></tr>"
                  $.each(data.postulaciones, function(index, postulaciones) {
                    tabla_usuario += `<tbody class='text-center'>
                                        <tr>
                                          <td>` + postulaciones.nombreUsuario + `</td>
                                        </tr>
                                      </tbody>`;
                    tabla_vacante += `<tbody class='text-center'>
                                        <tr>
                                          <td>` + postulaciones.puesto + `</td>
                                        </tr>
                                      </tbody>`;
                    btn_enviartest = `<div class="col"><a href="../php/enviartest.php?vac=`+postulaciones.puesto+`&ie=`+postulaciones.id_usuario+`"><input class="btn btn-info w-75" name="btntest" type="submit" value="Enviar Test" hidden></a></div>`
                  });
                  tabla_usuario += "</table>"
                  tabla_vacante += "</table>"
                  $("#tabla_usuario").html(tabla_usuario);
                  $("#tabla_vacante").html(tabla_vacante);
                  $("#btn_enviartest").html(btn_enviartest);
                  
                  card_video = "<video class='w-100' controls>"
                  $.each(data.video_curriculum, function(index, video_curriculum) {
                    card_video += `<source src="`+video_curriculum.ruta_video+`" type="video/webm">
                                    <!-- Agrega soporte para navegadores que no pueden reproducir el formato webm -->
                                    <!-- <source src="`+video_curriculum.ruta_video+`" type="video/mp4"> -->
                                    Tu navegador no admite el elemento <code>video</code>.`;
                  });
                  card_video += "</video>"
                  $("#tabla_interes").html(card_video);
                },
                error: function(xhr, status, error) {
                    // Manejar errores si es necesario
                    alert("Error al obtener los datos del curriculum.");
                    console.error(xhr, status, error);
                }
            });
        });
    </script>
</html>