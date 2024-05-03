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
  <script src="../js/buscar_pais.js"></script>


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
            <input class="form-control" id="txtpuesto" type="text" name="txtpuesto" placeholder="Descripcion de Puesto" maxLength="100" required="true">
            <label for="floatingInput">Descripcion de Puesto *</label>
          </div>
          <!--<div class="form-floating mb-3 mt-4">
            <input class="form-control"  type="text" required id="txtempresa" name="txtempresa" placeholder="Ingresa la empresa" maxlength="50"> <br>
            <label for="floatingInput">Nombre de la empresa *</label>
          </div>-->
          <div class="input-group mb-3">
            <label class="input-group-text" style="height: 3.625rem;">$</label>
            <div class="form-floating form-floating-group flex-grow-1">
              <input class="form-control" type="text" required id="txtsueldo" name="txtsueldo" placeholder="Ingresa el Sueldo" oninput="this.value = this.value.replace(/[^0-9]/g, ''); if(this.value < 0) this.value = '';" maxlength="10"> <br>
              <label for="floatingInput">Ingresa el Sueldo *</label>
            </div>
          </div>
          <div class="form row mt-4">
            <div class="form-group col-md-6">
              <div class="form-floating">
                <select id="region" class="form-select" name="cmbpais" style="width: 100%;">
                
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
          <div>
            <label for="txtdatos" class="text-primary"> Datos Adicionales </label> <br>
            <textarea name="txtdatos" id="txtdatos" style="resize:none; height: 300px;" type="text" class="form-control" cols="1" rows="10" placeholder="Ingresa los Datos"></textarea><br>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <div class="form-floating">
                <input class="form-control" type="date" id="dateInicio" required name="dateInicio">
                <label for="dateInicio">Seleccione Fecha de Inicio: *</label><br>
              </div>
            </div>
            <br>
            <div class="form-group col-md-6">
              <div class="form-floating">
                <input class="form-control" type="date" id="dateFin" required name="dateFin">
                <label for="dateFin">Seleccione Fecha de Vencimiento *</label><br>
              </div>
            </div>
            <br>

            <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>

            <script>
              ClassicEditor
                .create(document.querySelector('#txtdatos'), {
                  minHeight: '300px',
                  toolbar: ['undo', 'redo', '|', 'bold', 'italic', 'blockQuote', 'bulletedList', 'numberedList', '|', 'outdent', 'indent']
                })
                .then(editor => {
                  window.editor = editor;
                })
                .catch(error => {
                  console.error('Hubo un problema al instanciar el editor:', error);
                });
            </script> 

            <!-- <script src="https://cdn.tiny.cloud/1/opxm67vw96dfzavzjry6r53rgqrio3a3nzg3o57ii9livoei/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script> -->
            <script>
            // tinymce.init({
            //   menubar: false,
            //   language: 'es',
            //   selector: 'textarea',
            //   plugins: 'autolink lists link image charmap print preview anchor',
            //   toolbar: 'undo redo | formatselect | ' +
            //   'bold italic backcolor | alignleft aligncenter ' +
            //   'alignright alignjustify | bullist numlist outdent indent | ' +
            //   'removeformat | help'
            // });
             
            // Obtener la fecha actual
            var today = new Date();

            // Establecer fecha de inicio y fecha fin, donde fecha inicio es la fecha actual y fecha fin es 3 dias despues de la fecha actual
            var startDate = new Date(today);
            var endDate = new Date(today);
            endDate.setDate(endDate.getDate() + 3);

            var formattedStartDate = startDate.getFullYear() + '-' + ('0' + (startDate.getMonth() + 1)).slice(-2) + '-' + ('0' + startDate.getDate()).slice(-2);
            var formattedEndDate = endDate.getFullYear() + '-' + ('0' + (endDate.getMonth() + 1)).slice(-2) + '-' + ('0' + endDate.getDate()).slice(-2);

            document.getElementById('dateInicio').value = formattedStartDate;
            document.getElementById('dateFin').value = formattedEndDate;
            </script>

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
<!-- {*Footer*} -->
<?php include ("footer.php") ?>

</html>