<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vacantes</title>
  <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/styles.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/notificacion_empresa.js"></script>

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

<body style="background-color: #F8F6F3;">

  <!-- {*Conexion a librerias de JavasScript para la ubicacion y bootstrap*} -->
  <script src="../js/ubicacion.js"></script>

  <!--Barra de navegacion para Empresa-->
  <?php include ("navbar_empresa.php") ?>

  <div class="container-fluid">
    <!-- {*Formulario de vacantes*} -->
    <form method="POST" id="formVacante">
      <!-- {*Card de vacantes*} -->
      <div class="card mb-3 shadow" style="max-width: 50rem; margin:auto; margin-top:30px; border-radius:25px;">
        <div class="card-header text-center bg-primary" style="border-top-left-radius:25px;border-top-right-radius:25px;">
          <h4 class="text-white">DATOS DE VACANTE</h4>
        </div>
        <div class="card-body">
          <label class="text-primary">Los campos marcados con asterisco (*) son obligatorios</label><br>
          <!-- {*Campos para los datos*} -->
          <div class="form-floating mb-3 mt-4">
            <input class="form-control" id="txtdescripcion" type="text" name="txtdescripcion" placeholder="Descripcion de Puesto" maxLength="100" required="true" pattern="[A-Z a-z]+" title="Favor de ingresar solamente palabras al momento de describir su puesto de trabajo, NO se aceptan numeros ni caracteres especiales.">
            <label for="floatingInput">Descripcion de Puesto *</label>
          </div>
          <div class="form-floating mb-3 mt-4">
            <input class="form-control" onkeypress="return validarLetras(event)" type="text" required id="txtempresa" name="txtempresa" placeholder="Ingresa la empresa" maxlength="50"> <br>
            <label for="floatingInput">Nombre de la empresa *</label>
          </div>
          <div class="row">
            <div class="col-sm-1">
              <span class="input-group-text py-3" style="margin-right: 0px;">$</span>
            </div>
            <div class="col px-0">
              <div class="form-floating">
                <input class="form-control" type="text" required id="txtsueldo" name="txtsueldo" placeholder="Ingresa el Sueldo" oninput="this.value = this.value.replace(/[^0-9]/g, ''); if(this.value < 0) this.value = '';" maxlength="10"> <br>
                <label for="floatingInput">Ingresa el Sueldo *</label>
              </div>
            </div>
          </div>
          <div class="form row mt-4">
            <div class="form-group col-md">
              <div class="form-floating">
                <select id="cmbpais" class="form-select" name="cmbpais">
                  <option value="52">México</option>
                  <option value="591">Bolivia</option>
                  <option value="54">Argentina</option>
                  <option value="55">Brasil</option>
                  <option value="56">Chile</option>
                  <option value="57">Colombia</option>
                  <option value="506">Costa Rica</option>
                  <option value="53">Cuba</option>
                  <option value="593">Ecuador</option>
                  <option value="503">El Salvador</option>
                  <option value="1473">Granada</option>
                  <option value="502">Guatemala</option>
                  <option value="592">Guayana</option>
                  <option value="509">Haití</option>
                  <option value="504">Honduras</option>
                  <option value="1876">Jamaica</option>
                  <option value="505">Nicaragua</option>
                  <option value="507">Panamá</option>
                  <option value="595">Paraguay</option>
                  <option value="51">Perú</option>
                  <option value="1">Puerto Rico</option>
                  <option value="1809">República Dominicana</option>
                  <option value="597">Surinam</option>
                  <option value="598">Uruguay</option>
                  <option value="58">Venezuela</option>
                </select>
                <label for="cmbpais" class="form_label">Pais *</label>
              </div>
            </div>
            <div class="col-md">
              <div class="form-floating">
                <input class="form-control" type="text" required id="txtregion" name="txtregion" placeholder="Ingresa el estado/region"> <br>
                <label for="txtregion" class="form__label"> Estado/region *</label><br>
              </div>
            </div>
            <div class="col-md">
              <div class="form-floating">
                <input class="form-control" id="txtciudad" type="text" required name="txtciudad" placeholder="Ingresa la ciudad/poblacion"> <br>
                <label for="txtciudad" class="form__label"> Ciudad/Poblacion *</label><br>
              </div>
            </div>
          </div>
          <div class="form-floating">
            <textarea name="txtdatos" id="txtdatos" style="resize:none; height: 150px;" type="text" class="form-control" cols="1" rows="10" placeholder="Ingresa los Datos"></textarea><br>
            <label for="txtdatos" class="form_label"> Datos Adicionales </label> <br>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <div class="form-floating">
                <input class="form-control" type="date" id="dateInicio" required name="dateInicio" value="2024-01-01">
                <label for="dateInicio">Seleccione Fecha de Inicio: *</label><br>
              </div>
            </div>
            <br>
            <div class="form-group col-md-6">
              <div class="form-floating">
                <input class="form-control" type="date" id="dateFin" required name="dateFin" value="2025-01-01">
                <label for="dateFin">Seleccione Fecha de Vencimiento *</label><br>
              </div>
            </div>
            <br>

            <!-- {*Campos internos para la ubicacion*} -->
            <input name="txtlatitud" id="latitud" type="hidden">
            <input name="txtlongitud" id="longitud" type="hidden">

            <!-- {*Boton de guardar vacante*} -->
            <div class="container text-center mt-4">
              <input class="btn btn-primary w-50" type="submit" value="Guardar">
            </div>
            <!-- <script>     
                        function openAlertGuardar() {
                          Swal.fire({
                            title: 'Listo!',
                            text: 'Elemento Guardado',
                            icon: 'success'
                        }).then(function () {
                            window.location.href = "../templates/vacante.php";
                        });
                          }
          </script> -->
          </div>
        </div>
    </form>

    <!-- {*Conexion de librerias de JavaScript y bootstrap*} -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="../js/insert.js"></script>

</body>

</html>