<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Curriculum</title>
    <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/notificacion.js"></script>
=======
    <title>{$titulo}</title>
    <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
>>>>>>> d365ff2d93300d6f61e18e59ec05cab5024bafd7
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

    <!-- {*Barra de navegacion para Empresa*} -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="indexEmpresa.php">Inicio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03"aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor03">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="vacantes.php">Vacantes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="postulacion.php">Postulaciones</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="btn demo-btn-on-bg text-white font-weight-bold ml-2 mt-2 mt-lg-0" data-toggle="modal"data-target="#exampleModal">
                <span class="fa-layers fa-fw mr-2 fa-lg">
                  <i class="fas fa-bell"></i>
                  <span class="fa-layers-counter" id="notifi" style="background:Tomato;border-radius:0.3rem;padding-left:0.2rem;padding-right:0.2rem"></span>
                </span></a></li>
            <li class="nav-link active"></li>

            <!--Creacion de la modal de notificaciones-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-bell"></i> Notificaciones</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <a class="nav-link" id="notpos" href="postulacion.php" style="color: blue;">Tienes 0 postulaciones pendientes</a>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>

            <!--Boton para cerrar la sesion-->        
            <a class="nav-link active text-danger" onclick="openAlert()" style="font-weight:bold;">Cerrar Sesión </a>


              <script>        
                  function redireccionindex() {
                    window.location.href='../pagina/index.php';
                  }      
                  function openAlert() {
                    Swal.fire({
                    title: "¿Seguro que quieres Cerrar Sesion?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Aceptar"
                      }).then((result) => {
                          if (result.isConfirmed) {
                            onClose: redireccionindex();
                    }
                  });
              }
              </script>
          </ul>
        </div>
      </div>
    </nav>
    
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