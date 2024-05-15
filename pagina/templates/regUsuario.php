<?php
error_reporting(0);
session_start();
include '../google-api/redirect.php';
$_SESSION['rol'] = 2;

if ($_SESSION['nombre']) {
  $nombre = $_SESSION['nombre'];
}
if ($_SESSION['cuenta']) {
  $correo = $_SESSION['cuenta'];
}
if ($_SESSION['apellido']) {
  $apellido = $_SESSION['apellido'];
}

//print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro Usuario</title>
  <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
  <link rel="icon" href="../../assets/images/WorkeleWB.ico" type="image/x-icon">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/styles.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/inactividad.js"></script>
  <script src="../js/buscar_pais.js"></script>

  
</head>

<body style="background-color: #F8F6F3;">
  <p>
    <?php $_SESSION['rol'] ?>
  </p>
  <!-- Conexion a un archivo javascript -->
  <script src="../js/curp.js"></script>

  <div class="container-fluid">
    <!-- Form para el registrod de usuarios -->
    <form method="POST" id="miFormulario">
      <!-- Card del registro de usuarios -->
      <div class="card shadow mb-3" style="max-width: 50rem; margin:auto; margin-top:30px; border-radius:25px;">
        <div class="card-header text-center bg-primary" style="border-top-left-radius:25px;border-top-right-radius:25px;">
          <!-- Header para usuario -->
          <h4 class="text-white">REGISTRO DE NUEVO USUARIO</h4>
        </div>
        <div class="card-body">
          <h4 class="card-title"></h4>
          <label class="text-primary">Los campos marcados con asterisco (*) son obligatorios</label><br>

          <!-- Campos para usuario -->
          <div class="form-row">
            <div class="form-group col-md-6">
              <div class="form-floating" style="height: 4rem;">
                <input class="form-control" type="text" name="txt_NOMBRE" class="texto" id="nombre" placeholder="Escriba el Nombre" required="true" value="<?php if ($nombre != "") {
                  echo $nombre;
                } ?>">
                <label>Nombre: *</label><br>
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="form-floating">
                <input class="form-control" type="text" name="txt_APELLIDOS" class="texto" id="apellido" placeholder="Escriba sus Apellidos" required="true" value="<?php if ($apellido == true) {
                  echo $apellido;
                } ?>">
                <label>Apellidos: *</label><br>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="formFile" class="text-primary">Seleccionar Imagen de Perfil: </label>
            <input class="form-control" type="file" name="txtruta" id="txtruta"><br>
          </div>
          <div class="form-floating">
            <input class="form-control" type="email" name="txt_CORREO" class="texto" id="correo" placeholder="Ejemplo@dominio.com" pattern=".+.com" maxlength="100" required value="<?php if ($correo != "") {
              echo $correo;
            } ?>"><br>
            <label class="text-primary">Correo Electronico: *</label><br>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6 mb-3">
              <div class="form-floating">
                <input class="form-control" type="date" id="dateFECHA" name="dateFECHA" value="2000-01-01">
                <label for="dateFECHA">Seleccione su Fecha de Nacimineto: *</label><br>
              </div>
            </div>
            <div class="form-group col-md-6 mb-3">
              <div class="form-floating">
                <input class="form-control" type="text" id="curp" onkeyup="mayus(this);" name="txt_CURP" oninput="validarInput(this)" maxLength="18" minLength="18" pattern="[A-Z0-9]+" style="width:100%;" placeholder="Ingrese su CURP">
                <label>CURP *</label><br>
                <pre id="resultado"></pre>
              </div>
            </div>
          </div>
          <div class="form-row mb-3" id="password_div">
            <div class="form-group col-md-6">
              <div class="form-floating" style="height: 4rem;">
                <input oninput="verificarContrasenas()" onfocus="display_passwordrules()" pattern="(?=.*\d)(?=.*[A-Z]).{8,}" class="form-control" type="password" name="txt_PASSWORD" class="texto" minlength="8" id="txt_PASSWORD" maxLength="30" placeholder="Escriba la Contraseña" required="true"><br>
                <label>Contraseña: *</label><br>
              </div>
              <span class="password-toggle-icon"><i class="fas fa-eye"></i></span>
            </div>
            <div class="form-group col-md-6">
              <div class="form-floating" style="height: 4rem;">
                <input oninput="verificarContrasenas()" onfocus="display_passwordrules()" class="form-control" type="password" name="txt_PASSWORD2" class="texto" minlength="8" id="txt_PASSWORD2" maxLength="30" placeholder="Confirme la Contraseña" required="true"><br>
                <label>Confirme Contraseña: *</label><br>
              </div>
            </div>
          </div>
          <div id="password_rules" style="display: none;">
            <label>Las contraseñas deben cumplir estos requisitos:</label>
            <ul>
              <li class="password_length incomplete">Contener al menos 8 carácteres</li>
              <li class="password_uppercase incomplete">Al menos 1 letra mayuscula</li>
              <li class="password_number incomplete">Al menos 1 numero</li>
              <li class="password_match incomplete">Las contraseñas deben coincidir</li>
            </ul>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6 mb-3">
              <div class="form-floating" style="height: 4rem;">
                <select class="form-select" name="cmb_SEXO" id="sexo" style="width: 100%;">
                  <option value="1">Masculino</option>
                  <option value="2">Femenino</option>
                  <option value="3">Otro</option>
                </select>
                <label class="form_label">Genero *</label>
              </div>
            </div>
            <div class="form-group col-md-6 mb-3">
              <div class="form-floating" style="height: 4rem;">
                <select class="form-select" name="cmb_REGION" id="region" style="width: 100%;">
                </select>
                <label class="form_label">Region *</label>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="form-floating">
                <input class="form-control" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="txt_TELEFONO" class="texto" id="telefono" minlength="10" maxLength="10" placeholder="Escriba su Número" required="true"><br>
                <label>Telefono: *</label><br>
              </div>
            </div>
          </div>
          <div class="form-floating">
            <input class="form-control" type="text" name="txt_DOMICILIO" class="texto" id="domicilio" placeholder="Escriba su Domicilio" required="true"><br>
            <label>Domicilio: *</label><br>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" required="true" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                He leido y acepto el <a href="AvisoPrivacidad.php" target="_blank" class="form-floating  mb-3 mt-4" >Aviso de privacidad</a>
              </label>
            </div>
          </div>
          <div class="container text-center mt-4">
            <input class="btn btn-primary" type="submit" value="Guardar" id="miBoton">
            <button type="button" class="btn btn-secondary" onclick="location.href='login.php?xd=2'">Volver</button>
          </div>
        </div>
      </div>
    </form>
  </div>
    <!-- Modal Editar Foto de Prefil-->
    <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <div>
        <div style="justify-items: center;">
          <h3>Editar Foto del Perfil</h3>
        </div>
      </div>
      <div>
        <img id="img-preview" src="#" alt="Vista previa de la imagen">
      </div>
      <br>
        <div style="margin-top: 1em; display:flex;">
          <button class="btn btn-primary" id="btnGuardar" style="display:flex;margin-left:22em">Guardar</button>
          <button class="btn btn-secondary" id="btnCancelar" style="display:flex; margin-left:1em">Cancelar</button>
        </div>
    </div>
  </div>

  <script>

    function mayus(e) {
        e.value = e.value.toUpperCase();
    }

    // function enviarFormulario() {
    //     var formData = new FormData(document.getElementById('formulario'));

    //     $.ajax({
    //         url: 'ruta_a_tu_script_php.php',
    //         type: 'POST',
    //         data: formData,
    //         dataType: 'json',
    //         contentType: false,
    //         processData: false,
    //         success: function(response) {
    //             if (response.success) {
    //                 Swal.fire({
    //                     title: 'Éxito!',
    //                     text: response.message,
    //                     icon: 'success'
    //                 });
    //                 window.location.href = "nueva_pagina.php";
    //             } else {
    //                 Swal.fire({
    //                     title: 'Error!',
    //                     text: response.message,
    //                     icon: 'error'
    //                 });
    //             }
    //         },
    //         error: function(xhr, status, error) {
    //             Swal.fire({
    //                 title: 'Error!',
    //                 text: 'Ha ocurrido un error en el servidor. Por favor, inténtelo de nuevo más tarde.',
    //                 icon: 'error'
    //             });
    //         }
    //     });
    // }
    // Funcion para ocultar los campos dependiendo si es usuario o empresa
    // Obtener el valor de la variable de sesión en JavaScript
  </script>
  <script>
    var modal = document.getElementById("myModal");
    var img = document.getElementById("img-preview");
    var input = document.getElementById("txtruta");
    var span = document.getElementsByClassName("close")[0];
    var cropper;

    // Cuando se selecciona un archivo, muestra la modal con la imagen cargada
    input.addEventListener("change", function() {
      var file = this.files[0];
      var reader = new FileReader();

      reader.onload = function(e) {
        img.src = e.target.result;
        modal.style.display = "block";

        // Inicializar Cropper.js
        cropper = new Cropper(img, {
          aspectRatio: 1,
          viewMode: 2,
          background: false 
        });
      };

      reader.readAsDataURL(file);
    });

    // Cuando se hace clic en la X (cerrar), cierra la modal
    span.onclick = function() {
      modal.style.display = "none";
    };

    // Manejar el clic en el botón Guardar
    document.getElementById("btnGuardar").onclick = function() {
      // Obtener la imagen recortada como un archivo
      cropper.getCroppedCanvas().toBlob(function(blob) {
        // Crear un objeto de tipo FormData para enviar la imagen al servidor
        var formData = new FormData();
        formData.append("avatar", blob, "avatar.jpg");

        // Cerrar la modal
        modal.style.display = "none";
      });
    };

    // Botón Cancelar
    document.getElementById("btnCancelar").onclick = function() {
      // Cerrar la modal sin guardar cambios
      modal.style.display = "none";
    };
</script>

  <!-- Conexion de librerias de JavaScript y bootstrap -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <script src="../js/password.js"></script>
  <script src="../js/registro.js"></script>
</body>

</html>