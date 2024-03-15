<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacantes</title>
    <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <?php include("navbar_empresa.php") ?>

    <!-- {*Formulario de vacantes*} -->
    <form action="Vacantes.php" method="POST">

      <!-- {*Mensaje de guardado correctamente*} -->
      <!-- {$alerta}   -->

      <!-- {*Card de vacantes*} -->
      <div class="card  mb-3" style="max-width: 36rem; margin:auto; margin-top:30px;">
        <div class="card-body">
          <h4 class="card-title">Datos de Vacantes</h4>
          <label>Los campos marcados con asterisco son obligatorios</label> <br>


        <label for="name" class="form__label"> Puesto *</label> <br>
        <input class="form-control" onkeypress="return validarLetras(event)" type="text" required name="txtpuesto" placeholder="Ingresa el Puesto" maxlength="50"><br>

        <label for="name" class="form__label"> Empresa *</label> <br>
        <input class="form-control" onkeypress="return validarLetras(event)" type="text" required name="txtempresa" placeholder="Ingresa la empresa" maxlength="50"> <br>
       
        <label for="name" class="form__label"> Sueldo *</label><br>
        <div class="input-group mb-3">
        <span class="input-group-text">$</span>
        <input class="form-control " type="text" required name="txtsueldo" placeholder="Ingresa el Sueldo" oninput="this.value = this.value.replace(/[^0-9]/g, ''); if(this.value < 0) this.value = '';" maxlength="10"> <br>
        </div>

        <label for="name" class="form__label"> Lugar*</label> <br>
        <div class="form-row" text-align: center;>
        <div class="col">
        <!-- <select class="btn btn-light disabled" name="cmbpais" required>
             <option value="">Elige una opción</option>
            <script>
              {foreach $Paises as $pais} 
                <option value={$pais.id_paises}>{$pais.nombre}</option>
                {/foreach}
             </script>
             
          </select> -->
            <select id="select_paises" class="btn btn-light disabled" name="cmbpais" required>
              <option value="">Elige una opción</option>
              
          </select>
        </div>
      </div>
      <br>

        <label for="name" class="form__label"> Datos Adicionales </label> <br>
        <textarea name="txtdatos" type="text" class="form-control" cols="1" rows="10" placeholder="Ingresa los Datos"></textarea><br>
        
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="dateFECHA">Seleccione Fecha de Inicio: *</label><br>
            <input class="form-control" type="date" id="dateInicio" required name="dateInicio" value="2023-01-01">
        </div>
        <br>
        <div class="form-group col-md-6">
            <label for="dateFECHA">Seleccione Fecha de Vencimiento *</label><br>
            <input class="form-control" type="date" id="dateFin" required name="dateFin" value="2023-01-01">
        </div>
        <br>

            <!-- {*Campos internos para la ubicacion*} -->
            <input name="txtlatitud" id="latitud" type="hidden">
            <input name="txtlongitud" id="longitud" type="hidden">
            
            <!-- {*Boton de guardar vacante*} -->
            <input class="btn btn-primary" style="margin-left:224px;" type="submit" value="Guardar">
            <script>
                $(document).ready(function() {
                    $.ajax({
                        url: '../php/Vacantes.php',
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            var select = ''; // Inicializa la variable select
                            // Iterar sobre los datos recibidos y generar opciones para cada país
                            $.each(data, function(index, pais) {
                                select += '<option value="' + pais.id_paises + '">' + pais.nombre + '</option>';  
                            });
                            $("#select_paises").html(select); // Establece las opciones en el elemento select con id "select_paises"
                        },
                        error: function(xhr, status, error) {
                            console.error('Error al obtener la lista de países:', error);
                        }
                    });
                });
            </script> 
             <script>        
                    function redireccionindex() {
                      window.location.href='../pagina/indexEmpresa.php';
                        }      
                      function openAlert() {
                        Swal.fire({
                          title: 'Vacante Guardada Correctamente!',
                          icon: 'success',
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "Ok"
                          }).then((result) => {
                              if (result.isConfirmed) {
                                onClose: redireccionindex();
                              }
                            });
                       }
                </script>
               

          </div>
        </div>
      </div>

      <!-- {*Conexion de librerias de JavaScript y bootstrap*} -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      
  </body>

</html>