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

      // funcion para solo letras mayúsculas, minúsculas y espacios
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
  </style>

  <body>

    

    <!-- {*Conexion de librerias de JavaScript y bootstrap*} -->
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!--Barra de navegacion para Empresa-->
    <?php include("navbar_empresa.php") ?>
    
    <!-- {*Card del curriculum del usuario*} -->
    <div class="card border-primary shadow mb-5 bg-body rounded" style="max-width: 80%; margin:auto; margin-top:30px;">
      <div class="card-header text-center bg-primary">
        <h2 class="card-title titulo text-white">CURRICULUM</h2>
      </div>
    
      <center>
        <div class="card-body">
          <div class="row">
            <div class="col"></div>
            <div class="col">
              <!-- {*Boton para enviar tests*} -->
              <div class="row justify-content-center" id="btn_enviartest">
              </div>
            </div>
          </div>
          <div class="row align-items-center pregresp">

            <!-- {*Datos del usuario*} -->
            
              <div class="col">
                <h4 class="titulo">Usuario</h4>
                <div id="tabla_usuario">
                </div>
              </div>

            <!-- {*Datos de la vacante*} -->
              <div class="col">
                  <h4 class="titulo">Vacante</h4>
                  <div id="tabla_vacante">
                  </div>
              </div>

          </div> 

          <!-- {*Datos de la experiencia laboral del usuario*} -->
          <div class="pregresp">
            <h4 class="titulo">Experiencia Laboral</h4>
            <div id="tabla_exp">
              
            </div><br>
          </div>
          
          <div class="pregresp">
            <h4 class="titulo">Formación Academica</h4>
            <div id='tabla_formacion'>
              
            </div><br>
          </div>
          
          <!-- {*Datos de las aficiones del usuario*} -->
          <div class="pregresp">
            <h4 class="titulo">Aficiones</h4>
            <div class="row align-items-center">
              <div class="col">
                <div id="tabla_aficion">
                </div>
              </div>
            </div><br>
          </div>
          
          <!-- {*Datos de los intereses del usuario*} -->
          <div class="pregresp">
            <h4 class="titulo">Interes</h4>
            <div class="row align-items-center">
              <div class="col">
                <div id="tabla_interes">
                </div>
              </div>
            </div><br>
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
                url: "../php/seleccionar_postulacion.php",
                type: "GET",
                data: { id_postulacion: id_postulacion, id_usuario: id_usuario },
                dataType: "json",
                success: function(data) {
                  //Mostrar datos del Usuario y la Vacante
                  tabla_usuario = "<table class='table table-hover mt-4'><thead class='bg-dark text-white'><tr><th class='text-center'>NOMBRE</th></thead></tr>"
                  tabla_vacante = "<table class='table table-hover mt-4'><thead class='bg-dark text-white'><tr><th class='text-center'>PUESTO</th></thead></tr>"
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
                    btn_enviartest = `<div class="col-sm-4"><a href="../php/enviartest.php?vac=`+postulaciones.puesto+`&ie=`+postulaciones.id_usuario+`"><input class="btn btn-info w-100" name="btntest" type="submit" value="ENVIAR TEST"></a></div>`
                    btn_enviartest += `<div class="col-sm-4"><a href="../php/pdf.php?vac=`+postulaciones.id_postulacion+`&ie=`+postulaciones.id_usuario+`" target="_blank"><input class="btn btn-success text-white w-100" name="btnpdf" type="submit" value="IMPRIMIR"></a><div>`
                  });
                  tabla_usuario += "</table>"
                  tabla_vacante += "</table>"
                  $("#tabla_usuario").html(tabla_usuario);
                  $("#tabla_vacante").html(tabla_vacante);
                  $("#btn_enviartest").html(btn_enviartest);

                  //Mostrar datos de la Experiencia Laboral
                  tabla_exp = "<table class='table table-hover mt-4'><thead class='bg-dark text-white'><tr><th class='text-center'>DESCRIPCION</th><th class='text-center'>EMPRESA</th><th class='text-center'>PERIODO</th></thead></tr>"
                  $.each(data.experiencia, function(index, experiencia) {
                    tabla_exp += `<tbody class='text-center'>
                                      <tr>
                                        <td>` + experiencia.descripcion_puesto + `</td>
                                        <td>` + experiencia.empresa + `</td>
                                        <td>` + experiencia.periodo + `</td>
                                      </tr>
                                  </tbody>`;
                  });
                  tabla_exp += "</table>"
                  $("#tabla_exp").html(tabla_exp);

                  //Mostrar datos de la Formacion Academica
                  tabla_formacion = "<table class='table table-hover mt-4'><thead class='bg-dark text-white'><tr><th class='text-center'>DESCRIPCION</th><th class='text-center'>UBICACION</th><th class='text-center'>PERIODO</th></thead></tr>"
                  $.each(data.formacion, function(index, formacion) {
                    tabla_formacion += `<tbody class='text-center'>
                                            <tr>
                                              <td>` + formacion.descripcion + `</td>
                                              <td>` + formacion.ubicacion + `</td>
                                              <td>` + formacion.periodo + `</td>
                                            </tr>
                                          </tbody>`;
                  });
                  tabla_formacion += "</table>"
                  $("#tabla_formacion").html(tabla_formacion);

                  //Mostrar datos de las Aficiones
                  tabla_aficion = "<table class='table table-hover mt-4'><thead class='bg-dark text-white'><tr><th class='text-center'>DESCRIPCION</th></thead></tr>"
                  $.each(data.aficion, function(index, aficion) {
                    tabla_aficion += `<tbody class='text-center'>
                                            <tr>
                                              <td>` + aficion.descripcion + `</td>
                                            </tr>
                                          </tbody>`;
                  });
                  tabla_aficion += "</table>"
                  $("#tabla_aficion").html(tabla_aficion);

                  //Mostrar datos de los Intereses
                  tabla_interes = "<table class='table table-hover mt-4'><thead class='bg-dark text-white'><tr><th class='text-center'>DESCRIPCION</th></thead></tr>"
                  $.each(data.interes, function(index, interes) {
                    tabla_interes += `<tbody class='text-center'>
                                            <tr>
                                              <td>` + interes.descripcion + `</td>
                                            </tr>
                                          </tbody>`;
                  });
                  tabla_interes += "</table>"
                  $("#tabla_interes").html(tabla_interes);
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