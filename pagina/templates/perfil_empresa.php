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
    <link rel="icon" href="../../assets/images/WorkeleWB.ico" type="image/x-icon">
    <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/perfil_empresa.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>

    <script>
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
    <?php include("navbar_empresa.php") ?>

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
                            <button class="nav-link active" id="usuario-tab" data-bs-toggle="tab" data-bs-target="#usuario" type="button" role="tab"  aria-selected="true" style="outline:none;">Empresa</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="vacantes-tab" data-bs-toggle="tab" data-bs-target="#vacantes" type="button" role="tab" aria-selected="false" style="outline:none;">Vacantes</button>
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
                                            <button id="btncardimagenPerfil" class="border-0 bg-white text-secondary"style="outline:none;"><i class="fas fa-edit" style="font-size:1.3rem;"></i></button>
                                        </div>
                                        
                                    </li>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <label class="my-auto text-primary font-weight-bold">Constancia de Situación Fiscal</label><br>
                                            <label id="constanciaEmpresa" class="form-label"></label>
                                        </div>
                                        <div class="ml-auto">
                                            <button id="btncardconstancia" class="border-0 bg-white text-secondary"style="outline:none;"><i class="fas fa-edit" style="font-size:1.3rem;"></i></button>
                                        </div>
                                    </li>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <label class="my-auto text-primary font-weight-bold">Razón Social</label><br>
                                            <label id="nomUsuario" class="form-label"></label>
                                        </div>
                                        <div class="ml-auto">
                                            <button id="btncardnombre" class="border-0 bg-white text-secondary" style="outline:none;"><i class="fas fa-edit" style="font-size:1.3rem;"></i></button>
                                        </div>
                                    </li>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <label class="my-auto text-primary font-weight-bold">Correo</label><br>
                                            <label id="correoUsuario" class="form-label"></label>
                                        </div>
                                        <div class="ml-auto">
                                            <button id="btncardcorreo"  class="border-0 bg-white text-secondary" style="outline:none;"><i class="fas fa-edit" style="font-size:1.3rem;"></i></button>
                                        </div>
                                    </li>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <label class="my-auto text-primary font-weight-bold">Teléfono</label><br>
                                            <label id="telefonoUsuario" class="form-label"></label>
                                        </div>
                                        <div class="ml-auto">
                                            <button id="btncardtelefono" class="border-0 bg-white text-secondary" style="outline:none;"><i class="fas fa-edit" style="font-size:1.3rem;"></i></button>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="vacantes" role="tabpanel" aria-labelledby="competencias-tab" style="outline:none;">
                            <div id="containerVacantes">
                            </div>
                        </div>
                    </div>
                      
                  </div>
                </div>
            </div>

            <!-- Contenedor donde iran almacenadas las modales -->
            <div id="containerModales"></div>

            <!-- Card de Imagen de Perfil -->
            <div class="col-auto mr-auto mt-4" id="cardImagenPerfil" style="display:none;">
                <div class="card border-light shadow-lg bg-body" style="width:35rem;border-radius:0.6rem;">
                    <div class="card-header text-center bg-primary" style="border-radius:0.5rem;">
                        <h4 class="card-title text-white d-inline mb-0">EDITAR IMAGEN DE PERFIL</h4>
                        <button type="button d-inline" id="btncancelarImagenPerfil" class="close text-white" style="outline:none;" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="contenedorImagenP"></div>
                    </div>
                </div>
            </div>
            <!-- Card de Imagen de Perfil -->
            <div class="col-auto mr-auto mt-4" id="cardConstancia" style="display:none;">
                <div class="card border-light shadow-lg bg-body" style="width:36rem;border-radius:0.6rem;">
                    <div class="card-header text-center bg-primary" style="border-radius:0.5rem;">
                        <h4 class="card-title text-white d-inline mb-0">EDITAR CONSTANCIA DE SITUACIÓN FISCAL</h4>
                        <button type="button d-inline" id="btncancelarConstancia" class="close text-white" style="outline:none;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="contenedorConstancia"></div>
                    </div>
                </div>
            </div>
            <!-- Card de Nombre -->
            <div class="col-auto mr-auto mt-4" id="cardNombre" style="display:none;">
                <div class="card border-light shadow-lg bg-body" style="width:35rem;border-radius:0.6rem;">
                    <div class="card-header text-center bg-primary" style="border-radius:0.5rem;">
                        <h4 class="card-title text-white d-inline mb-0">EDITAR NOMBRE</h4>
                        <button type="button d-inline" id="btncancelarNombre" class="close text-white" style="outline:none;">
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
                        <button type="button d-inline" id="btncancelarCorreo" class="close text-white" style="outline:none;">
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
                        <button type="button d-inline" id="btncancelarTelefono" class="close text-white" style="outline:none;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="contenedorTelefono"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script>
  $(document).ready(function(){
    // CODIGO JAVASCRIPT PARA LAS VENTANAS DE USUARIO
    $("#btncardimagenPerfil").click(function(){
        $("#cardCorreo").hide();
        $("#cardRegion").hide();
        $("#cardDomicilio").hide();
        $("#cardTelefono").hide();
        $("#cardNombre").hide();
        $("#cardConstancia").hide();
        $("#cardImagenPerfil").slideDown();
    });
    $("#btncardconstancia").click(function(){
        $("#cardCorreo").hide();
        $("#cardRegion").hide();
        $("#cardDomicilio").hide();
        $("#cardTelefono").hide();
        $("#cardNombre").hide();
        $("#cardImagenPerfil").hide();
        $("#cardConstancia").slideDown();
    });

    $("#btncardnombre").click(function(){
        $("#cardCorreo").hide();
        $("#cardRegion").hide();
        $("#cardDomicilio").hide();
        $("#cardTelefono").hide();
        $("#cardImagenPerfil").hide();
        $("#cardConstancia").hide();
        $("#cardNombre").slideDown();
    });

    $("#btncardcorreo").click(function(){
        $("#cardNombre").hide();
        $("#cardRegion").hide();
        $("#cardDomicilio").hide();
        $("#cardTelefono").hide();
        $("#cardImagenPerfil").hide();
        $("#cardConstancia").hide();
        $("#cardCorreo").slideDown();
    });

    $("#btncardtelefono").click(function(){
        $("#cardNombre").hide();
        $("#cardCorreo").hide();
        $("#cardRegion").hide();
        $("#cardDomicilio").hide();
        $("#cardImagenPerfil").hide();
        $("#cardConstancia").hide();
        $("#cardTelefono").slideDown();
    });

    $("#vacantes-tab").click(function(){
        $("#cardNombre").hide();
        $("#cardCorreo").hide();
        $("#cardRegion").hide();
        $("#cardDomicilio").hide();
        $("#cardImagenPerfil").hide();
        $("#cardConstancia").hide();
        $("#cardTelefono").hide();
    });

    // CODIGO JAVASCRIPT PARA CERRAR LAS VENTANAS DE EDICION
    $("#btncancelarImagenPerfil").click(function(){
        $("#cardImagenPerfil").slideUp();
    });
    $("#btncancelarConstancia").click(function(){
        $("#cardConstancia").slideUp();
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
    
  });

</script>
    
    <!-- Conexion de librerias de JavaScript y bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>

<?php include ("footerEmpresa.php") ?>
</html>