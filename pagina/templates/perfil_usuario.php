<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/css/styles.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/perfil_usuario.js"></script>
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
  
  <body>
    <!--Barra de navegacion para Empresa-->
    <?php include("navbar_usuario.php") ?>

    <!-- Card de potulaciones -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-auto mx-auto">
                <div class="card border-light shadow-lg bg-body mt-4 mb-4" style="width:35rem;max-width:35rem;border-radius:0.6rem;">
                  <div class="card-header text-center bg-primary" style="border-radius:0.5rem;">
                    <h2 class="card-title text-white mb-0">MI PERFIL</h2>
                  </div>
                  <div class="card-body">
                    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="usuario-tab" data-bs-toggle="tab" data-bs-target="#usuario" type="button" role="tab" aria-controls="home" aria-selected="true">Usuario</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="competencias-tab" data-bs-toggle="tab" data-bs-target="#competencias" type="button" role="tab" aria-controls="profile" aria-selected="false">Competencias</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="usuario" role="tabpanel" >
                        <div class="row">
                                <div class="col">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div id="imagenPerfil" class=" w-100">
                                        </div>
                                        <div class="ml-auto">
                                            <button id="btncardimagenPerfil" class="border-0 bg-white text-secondary"><i class="fas fa-edit" style="font-size:1.3rem;"></i></button>
                                        </div>
                                        
                                    </li>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <label class="my-auto text-primary font-weight-bold">Nombre</label><br>
                                            <label id="nomUsuario" class="form-label"></label>
                                        </div>
                                        <div class="ml-auto">
                                            <button id="btncardnombre" class="border-0 bg-white text-secondary"><i class="fas fa-edit" style="font-size:1.3rem;"></i></button>
                                        </div>
                                    </li>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <label class="my-auto text-primary font-weight-bold">Correo</label><br>
                                            <label id="correoUsuario" class="form-label"></label>
                                        </div>
                                        <div class="ml-auto">
                                            <button id="btncardcorreo"  class="border-0 bg-white text-secondary"><i class="fas fa-edit" style="font-size:1.3rem;"></i></button>
                                        </div>
                                    </li>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <label class="my-auto text-primary font-weight-bold">Teléfono</label><br>
                                            <label id="telefonoUsuario" class="form-label"></label>
                                        </div>
                                        <div class="ml-auto">
                                            <button id="btncardtelefono" class="border-0 bg-white text-secondary"><i class="fas fa-edit" style="font-size:1.3rem;"></i></button>
                                        </div>
                                    </li>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <label class="my-auto text-primary font-weight-bold">Región</label><br>
                                            <label id="regionUsuario" class="form-label"></label>
                                        </div>
                                        <div class="ml-auto">
                                            <button id="btncardregion" class="border-0 bg-white text-secondary"><i class="fas fa-edit" style="font-size:1.3rem;"></i></button>
                                        </div>
                                    </li>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <label class="my-auto text-primary font-weight-bold">Domicilio</label><br>
                                            <label id="domicilioUsuario" class="form-label"></label>
                                        </div>
                                        <div class="ml-auto">
                                            <button id="btncarddomicilio" class="border-0 bg-white text-secondary"><i class="fas fa-edit" style="font-size:1.3rem;"></i></button>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="competencias" role="tabpanel" aria-labelledby="competencias-tab">
                        <div class="row mb-2 justify-content-center">
                                <div class="container">
                                    <label class="mx-3">Ten en cuenta que puedes editar tu información si así lo requieres en cualquier momento.</label>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fas fa-briefcase text-center align-middle" style="font-size:1.3rem;color:#54b689;width:21px;"></i>
                                    </div>
                                    <div class="mx-3">
                                        <label class="my-auto" style="font-size:1.1rem; font-weight:bold;">Experiencia Laboral</label>
                                    </div>
                                    <div class="ml-auto">
                                        <button id="btncardexp" class="border-0 bg-white text-secondary"><i class="fas fa-edit" style="font-size:1.3rem;"></i></button>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fas fa-book text-center align-middle" style="font-size:1.3rem;color:#54b689;width:21px;"></i>
                                    </div>
                                    <div class="mx-3">
                                        <label class="my-auto" style="font-size:1.1rem; font-weight:bold;">Formación Académica</label>
                                    </div>
                                    <div class="ml-auto">
                                        <button id="btncardfor" class="border-0 bg-white text-secondary"><i class="fas fa-edit" style="font-size:1.3rem;"></i></button>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fas fa-running text-center align-middle" style="font-size:1.3rem;color:#54b689;width:21px;"></i>
                                    </div>
                                    <div class="mx-3">
                                        <label class="my-auto" style="font-size:1.1rem; font-weight:bold;">Aficiones</label>
                                    </div>
                                    <div class="ml-auto">
                                        <button id="btncardafi" class="border-0 bg-white text-secondary"><i class="fas fa-edit" style="font-size:1.3rem;"></i></button>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fas fa-clipboard text-center align-middle" style="font-size:1.3rem;color:#54b689;width:21px;"></i>
                                    </div>
                                    <div class="mx-3">
                                        <label class="my-auto" style="font-size:1.1rem; font-weight:bold;">Intereses</label>
                                    </div>
                                    <div class="ml-auto">
                                        <button id="btncardint" class="border-0 bg-white text-secondary"><i class="fas fa-edit" style="font-size:1.3rem;"></i></button>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fas fa-film text-center align-middle" style="font-size:1.3rem;color:#54b689;width:21px;"></i>
                                    </div>
                                    <div class="mx-3">
                                        <label class="my-auto" style="font-size:1.1rem; font-weight:bold;">Video Curriculum</label>
                                    </div>
                                    <div class="ml-auto">
                                        <button id="btncardvid" class="border-0 bg-white text-secondary"><i class="fas fa-edit" style="font-size:1.3rem;"></i></button>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fas fa-address-card text-center align-middle" style="font-size:1.3rem;color:#54b689;width:21px;"></i>
                                    </div>
                                    <div class="mx-3">
                                        <label class="my-auto" style="font-size:1.1rem; font-weight:bold;">Postulaciones</label>
                                    </div>
                                    <div class="ml-auto">
                                        <button id="btncardpos" class="border-0 bg-white text-secondary"><i class="fas fa-edit" style="font-size:1.3rem;"></i></button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                      
                  </div>
                </div>
            </div>
            <!-- Card de Experiencia Laboral -->
            <div class="col-auto mr-auto mt-4" id="cardExperiencia" style="display:none;">
                <div class="card border-light shadow-lg bg-body" style="width:35rem;border-radius:0.6rem;">
                    <div class="card-header text-center bg-primary" style="border-radius:0.5rem;">
                        <h4 class="card-title text-white mb-0 d-inline">EDITAR EXPERIENCIA LABORAL</h4>
                        <button type="button d-inline" id="btncancelarEXP" class="close text-white" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="contenedorExperiencia"></div>
                    </div>
                </div>
            </div>
            <!-- Card de Formación Académica -->
            <div class="col-auto mr-auto mt-4" id="cardFormacion" style="display:none;">
                <div class="card border-light shadow-lg bg-body" style="width:35rem;border-radius:0.6rem;">
                    <div class="card-header text-center bg-primary" style="border-radius:0.5rem;">
                        <h4 class="card-title text-white d-inline mb-0">EDITAR FORMACIÓN ACADÉMICA</h4>
                        <button type="button d-inline" id="btncancelarFOR" class="close text-white" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="contenedorFormacion"></div>
                    </div>
                </div>
            </div>
            <!-- Card de Aficiones -->
            <div class="col-auto mr-auto mt-4" id="cardAficion" style="display:none;">
                <div class="card border-light shadow-lg bg-body" style="width:35rem;border-radius:0.6rem;">
                    <div class="card-header text-center bg-primary" style="border-radius:0.5rem;">
                        <h4 class="card-title text-white d-inline mb-0">EDITAR AFICIONES</h4>
                        <button type="button d-inline" id="btncancelarAFI" class="close text-white" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="contenedorAficion"></div>
                    </div>
                </div>
            </div>
            <!-- Card de Intereses -->
            <div class="col-auto mr-auto mt-4" id="cardInteres" style="display:none;">
                <div class="card border-light shadow-lg bg-body" style="width:35rem;border-radius:0.6rem;">
                    <div class="card-header text-center bg-primary" style="border-radius:0.5rem;">
                        <h4 class="card-title text-white d-inline mb-0">EDITAR INTERESES</h4>
                        <button type="button d-inline" id="btncancelarINT" class="close text-white" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="contenedorInteres"></div>
                    </div>
                </div>
            </div>
            <!-- Card de Video  Curriculum -->
            <div class="col-auto mr-auto mt-4" id="cardVideoCurriculum" style="display:none;">
                <div class="card border-light shadow-lg bg-body" style="width:35rem;border-radius:0.6rem;">
                    <div class="card-header text-center bg-primary" style="border-radius:0.5rem;">
                        <h4 class="card-title text-white d-inline mb-0">EDITAR VIDEO CURRICULUM</h4>
                        <button type="button d-inline" id="btncancelarVID" class="close text-white" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="contenedorVideoCurriculum"></div>
                    </div>
                </div>
            </div>
            <!-- Card de Postulacion -->
            <div class="col-auto mr-auto mt-4" id="cardPostulacion" style="display:none;">
                <div class="card border-light shadow-lg bg-body" style="width:35rem;border-radius:0.6rem;">
                    <div class="card-header text-center bg-primary" style="border-radius:0.5rem;">
                        <h4 class="card-title text-white d-inline mb-0">EDITAR POSTULACIONES</h4>
                        <button type="button d-inline" id="btncancelarPOS" class="close text-white" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="contenedorPostulacion"></div>
                    </div>
                </div>
            </div>
            <!-- Card de Imagen de Perfil -->
            <div class="col-auto mr-auto mt-4" id="cardImagenPerfil" style="display:none;">
                <div class="card border-light shadow-lg bg-body" style="width:35rem;border-radius:0.6rem;">
                    <div class="card-header text-center bg-primary" style="border-radius:0.5rem;">
                        <h4 class="card-title text-white d-inline mb-0">EDITAR IMAGEN DE PERFIL</h4>
                        <button type="button d-inline" id="btncancelarImagenPerfil" class="close text-white" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="contenedorImagenP"></div>
                    </div>
                </div>
            </div>
            <!-- Card de Nombre -->
            <div class="col-auto mr-auto mt-4" id="cardNombre" style="display:none;">
                <div class="card border-light shadow-lg bg-body" style="width:35rem;border-radius:0.6rem;">
                    <div class="card-header text-center bg-primary" style="border-radius:0.5rem;">
                        <h4 class="card-title text-white d-inline mb-0">EDITAR NOMBRE</h4>
                        <button type="button d-inline" id="btncancelarNombre" class="close text-white" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="contenedorNombre"></div>
                    </div>
                </div>
            </div>
            <!-- Card de Correo -->
            <div class="col-auto mr-auto mt-4" id="cardCorreo" style="display:none;">
                <div class="card border-light shadow-lg bg-body" style="width:35rem;border-radius:0.6rem;">
                    <div class="card-header text-center bg-primary" style="border-radius:0.5rem;">
                        <h4 class="card-title text-white d-inline mb-0">EDITAR CORREO</h4>
                        <button type="button d-inline" id="btncancelarCorreo" class="close text-white" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="contenedorCorreo"></div>
                    </div>
                </div>
            </div>
            <!-- Card de Telefono -->
            <div class="col-auto mr-auto mt-4" id="cardTelefono" style="display:none;">
                <div class="card border-light shadow-lg bg-body" style="width:35rem;border-radius:0.6rem;">
                    <div class="card-header text-center bg-primary" style="border-radius:0.5rem;">
                        <h4 class="card-title text-white d-inline mb-0">EDITAR TELEFONO</h4>
                        <button type="button d-inline" id="btncancelarTelefono" class="close text-white" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="contenedorTelefono"></div>
                    </div>
                </div>
            </div>
            <!-- Card de Region -->
            <div class="col-auto mr-auto mt-4" id="cardRegion" style="display:none;">
                <div class="card border-light shadow-lg bg-body" style="width:35rem;border-radius:0.6rem;">
                    <div class="card-header text-center bg-primary" style="border-radius:0.5rem;">
                        <h4 class="card-title text-white d-inline mb-0">EDITAR REGIÓN</h4>
                        <button type="button d-inline" id="btncancelarRegion" class="close text-white" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="contenedorRegion"></div>
                    </div>
                </div>
            </div>
            <!-- Card de Domicilio -->
            <div class="col-auto mr-auto mt-4" id="cardDomicilio" style="display:none;">
                <div class="card border-light shadow-lg bg-body" style="width:35rem;border-radius:0.6rem;">
                    <div class="card-header text-center bg-primary" style="border-radius:0.5rem;">
                        <h4 class="card-title text-white d-inline mb-0">EDITAR DOMICILIO</h4>
                        <button type="button d-inline" id="btncancelarDomicilio" class="close text-white" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="contenedorDomicilio"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Script para mostrar/ocultar el formulario -->
<script>
  $(document).ready(function(){
    // CODIGO JAVASCRIPT PARA LAS VENTANAS DE USUARIO
    $("#btncardimagenPerfil").click(function(){
        $("#cardCorreo").hide();
        $("#cardRegion").hide();
        $("#cardDomicilio").hide();
        $("#cardTelefono").hide();
        $("#cardNombre").hide();
        $("#cardImagenPerfil").slideDown();
    });

    $("#btncardnombre").click(function(){
        $("#cardCorreo").hide();
        $("#cardRegion").hide();
        $("#cardDomicilio").hide();
        $("#cardTelefono").hide();
        $("#cardNombre").slideDown();
    });

    $("#btncardcorreo").click(function(){
        $("#cardNombre").hide();
        $("#cardRegion").hide();
        $("#cardDomicilio").hide();
        $("#cardTelefono").hide();
        $("#cardCorreo").slideDown();
    });

    $("#btncardregion").click(function(){
        $("#cardNombre").hide();
        $("#cardCorreo").hide();
        $("#cardDomicilio").hide();
        $("#cardTelefono").hide();
        $("#cardRegion").slideDown();
    });

    $("#btncarddomicilio").click(function(){
        $("#cardNombre").hide();
        $("#cardCorreo").hide();
        $("#cardRegion").hide();
        $("#cardTelefono").hide();
        $("#cardDomicilio").slideDown();
    });

    $("#btncardtelefono").click(function(){
        $("#cardNombre").hide();
        $("#cardCorreo").hide();
        $("#cardRegion").hide();
        $("#cardDomicilio").hide();
        $("#cardTelefono").slideDown();
    });

    // CODIGO JAVASCRIPT PARA LAS VENTANAS DE COMPETENCIAS
    $("#btncardexp").click(function(){
        $("#cardFormacion").hide();
        $("#cardAficion").hide();
        $("#cardInteres").hide();
        $("#cardVideoCurriculum").hide();
        $("#cardPostulacion").hide();
        $("#cardExperiencia").slideDown();
    });
    $("#btncardfor").click(function(){
        $("#cardExperiencia").hide();
        $("#cardAficion").hide();
        $("#cardInteres").hide();
        $("#cardVideoCurriculum").hide();
        $("#cardPostulacion").hide();
        $("#cardFormacion").slideDown();
    });
    $("#btncardafi").click(function(){
        $("#cardExperiencia").hide();
        $("#cardFormacion").hide();
        $("#cardInteres").hide();
        $("#cardVideoCurriculum").hide();
        $("#cardPostulacion").hide();
        $("#cardAficion").slideDown();
    });
    $("#btncardint").click(function(){
        $("#cardExperiencia").hide();
        $("#cardFormacion").hide();
        $("#cardAficion").hide();
        $("#cardVideoCurriculum").hide();
        $("#cardPostulacion").hide();
        $("#cardInteres").slideDown();
    });
    $("#btncardvid").click(function(){
        $("#cardExperiencia").hide();
        $("#cardFormacion").hide();
        $("#cardAficion").hide();
        $("#cardInteres").hide();
        $("#cardPostulacion").hide();
        $("#cardVideoCurriculum").slideDown();
    });
    $("#btncardpos").click(function(){
        $("#cardExperiencia").hide();
        $("#cardFormacion").hide();
        $("#cardAficion").hide();
        $("#cardInteres").hide();
        $("#cardVideoCurriculum").hide();
        $("#cardPostulacion").slideDown();
    });
    $("#usuario-tab").click(function(){
        $("#cardExperiencia").hide();
        $("#cardFormacion").hide();
        $("#cardAficion").hide();
        $("#cardInteres").hide();
        $("#cardVideoCurriculum").hide();
        $("#cardPostulacion").hide();
    });
    $("#competencias-tab").click(function(){
        $("#cardNombre").hide();
        $("#cardCorreo").hide();
        $("#cardRegion").hide();
        $("#cardDomicilio").hide();
        $("#cardTelefono").hide();
    });
    $("#btncancelarEXP").click(function(){
        $("#cardExperiencia").slideUp();
    });
    $("#btncancelarFOR").click(function(){
        $("#cardFormacion").slideUp();
    });
    $("#btncancelarAFI").click(function(){
        $("#cardAficion").slideUp();
    });
    $("#btncancelarINT").click(function(){
        $("#cardInteres").slideUp();
    });
    $("#btncancelarVID").click(function(){
        $("#cardVideoCurriculum").slideUp();
    });
    $("#btncancelarPOS").click(function(){
        $("#cardPostulacion").slideUp();
    });
    $("#btncancelarNombre").click(function(){
        $("#cardNombre").slideUp();
    });
    $("#btncancelarCorreo").click(function(){
        $("#cardCorreo").slideUp();
    });
    $("#btncancelarTelefono").click(function(){
        $("#cardTelefono").slideUp();
    });
    $("#btncancelarRegion").click(function(){
        $("#cardRegion").slideUp();
    });
    $("#btncancelarDomicilio").click(function(){
        $("#cardDomicilio").slideUp();
    });
    $("#btncancelarImagenPerfil").click(function(){
        $("#cardImagenPerfil").slideUp();
    });
    
  });
</script>

    <!-- Conexion de librerias de JavaScript y bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  </body>
</html>