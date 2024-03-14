<?php 
error_reporting(0);
session_start();
include '../google-api/redirect.php';
    if ($_GET['xd'] == 2) {
        $_SESSION['rol'] = 2;
    }
    if ($_GET['xd'] == 1) {
        $_SESSION['rol'] = 1;
    }

    if ($_SESSION['nombre']) {
        $nombre = $_SESSION['nombre'];
    }

    if($_SESSION['cuenta']) {
        $correo = $_SESSION['cuenta'];
    }

    if($_SESSION['apellido']) {
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
    // Tiempo de inactividad en milisegundos (por ejemplo, 5 minutos)
  var tiempoInactividad = 5 * 60 * 1000; 

  // Página a la que se redireccionará después de la inactividad
  var paginaRedireccion = "index.php";

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
    </script>
    </head>

    <body>
        <p> <?php $_SESSION['rol'] ?>
        <!-- Conexion a un archivo javascript -->
        <script src="../smarty/js/curp.js"></script>    
           
        
        <!-- Form para el registrod de usuarios -->
        <form method="POST" action="../js/registro.js">

        <!-- Mensaje de guardado correctamente -->
            <!-- Card del registro de usuarios -->
            <div class="card  mb-3" style="max-width: 50rem; margin:auto; margin-top:50px;">
                <FONT COLOR="black">
                    <!-- Header para empresa -->
                    <div class="card-header bg-primary" align="center" id="headerEmpresa">REGISTRO DE NUEVA EMPRESA</div>
                    <!-- Header para usuario -->
                    <div class="card-header bg-primary" align="center" id="headerUsuario">REGISTRO DE NUEVO USUARIO</div>
                </FONT>
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <label></label>
                    <label>Los campos marcados con asterisco (*) son obligatorios</label>
                    <br>
                    <br>   

                    <!-- Campos para empresa -->
                    <div id="DivEmpresa">
                    <label>Razón Social: *</label><br>
                    <input class="form-control" type="text" name="txt_razon" class="texto" id="razon" placeholder="Ingresa el Nombre de la Empresa" pattern="[A-Z a-z]+" required="true">

                    <label for="formFile" class="form-label mt-4">Seleccionar Imagen de Perfil: *</label>
                    <input class="form-control" type="file" name="txtruta" id="txtruta"><br>

                    <label>Correo Electronico: *</label><br>
                    <input class="form-control" type="email" name="txt_CORREO" class="texto" id="correo"placeholder="Ejemplo@dominio.com" pattern=".+.com" required value="<?php if ($correo != "") { $correo; } ?>'"><br>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Contraseña: *</label><br>
                            <input oninput="verificarContrasenas()" class="form-control" type="password" name="txt_PASSWORD" class="texto" minlength="8" id="txt_PASSWORD" maxLength="30" placeholder="Escriba la Contraseña" required="true"><br>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Confirme Contraseña: *</label><br>
                            <input oninput="verificarContrasenas()" class="form-control" type="password" name="txt_PASSWORD2" class="texto" minlength="8" id="txt_PASSWORD2" maxLength="30" placeholder="Confirme la Contraseña" required="true"><br>
                            <p id="passwordMatchMessage"></p>
                        </div>
                    </div>


                    <div class="form-row">
                    <div class="form-group col-md-6">
                            <label>Region: *</label><br>
                            <select class="btn btn-light disabled" name="cmb_REGION" id="region">
                                <div>
                                    <option value="54">Argentina</option>
                                    <option value="591">Bolivia</option>
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
                                    <option value="52">México</option>
                                    <option value="505">Nicaragua</option>
                                    <option value="507">Panamá</option>
                                    <option value="595">Paraguay</option>
                                    <option value="51">Perú</option>
                                    <option value="1">Puerto Rico</option>
                                    <option value="1809">República Dominicana</option>
                                    <option value="597">Surinam</option>
                                    <option value="598">Uruguay</option>
                                    <option value="58">Venezuela</option>
                                </div>
                            </select><br>
                        </div>
                            <div class="col">
                                <label>Telefono: *</label><br>
                                <input class="form-control" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="txt_TELEFONO" class="texto" id="telefono"minlength="10" maxLength="10" placeholder="Escriba su Número" required="true"><br>
                            </div>
                    </div>
                            <label>Domicilio: *</label><br>
                            <input class="form-control" type="text" name="txt_DOMICILIO" class="texto" id="domicilio" placeholder="Escriba su Domicilio" required="true"><br>

                        <center>
                            <button class="btn btn-primary" type="submit" onclick="RegistrarUsuario()">Guardar</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='login.php?xd=1'">Volver</button>
                        </center>
                    </div>
        </form>
        <form method="POST" id="FormRegistro">
                    <!-- Campos para usuario -->
                    <div id="DivUsuario">
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nombre: *</label><br>
                            <input class="form-control" type="text" name="txt_NOMBRE" class="texto" id="nombre"placeholder="Escriba el Nombre" pattern="[A-Z a-z]+" required="true" value="<?php if ($nombre != "") { echo $nombre; } ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Apellidos: *</label><br>
                            <input class="form-control" type="text" name="txt_APELLIDOS" class="texto" id="apellido"placeholder="Escriba sus Apellidos" pattern="[A-Z a-z]+" required="true" value="<?php if ($apellido == true) { echo $apellido; } ?>">
                        </div>
                    </div>

                    <label for="formFile" class="form-label mt-4">Seleccionar Imagen de Perfil: </label>
                    <input class="form-control" type="file" name="txtruta" id="txtruta"><br>

                    <label>Correo Electronico: *</label><br>
                    <input class="form-control" type="email" name="txt_CORREO" class="texto" id="correo"placeholder="Ejemplo@dominio.com" pattern=".+.com" required value="<?php if ($correo != "") { echo $correo; } ?>"><br>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="dateFECHA">Seleccione su Fecha de Nacimineto: *</label><br>
                            <input class="form-control" type="date" id="dateFECHA" name="dateFECHA" value="2022-01-01">
                        </div>
                        <br>
                        <div class="form-group col-md-6">
                            <label>CURP: *</label><br>
                            <input class="form-control" type="text" id="curp" name="txt_CURP" oninput="validarInput(this)" maxLength="18" minLength="18" pattern="[A-Z0-9]+" style="width:100%;"placeholder="Ingrese su CURP">
                            <pre id="resultado"></pre>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Contraseña: *</label><br>
                            <input oninput="verificarContrasenas()" class="form-control" type="password" name="txt_PASSWORD" class="texto" minlength="8" id="txt_PASSWORD" maxLength="30" placeholder="Escriba la Contraseña" required="true"><br>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Confirme Contraseña: *</label><br>
                            <input oninput="verificarContrasenas()" class="form-control" type="password" name="txt_PASSWORD2" class="texto" minlength="8" id="txt_PASSWORD2" maxLength="30" placeholder="Confirme la Contraseña" required="true"><br>
                            <p id="passwordMatchMessage"></p>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col-3">
                            <label>Sexo: *</label><br>
                            <select class="btn btn-light disabled" name="cmb_SEXO" id="sexo">
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                                <option value="3">Otro</option>
                            </select><br>
                        </div>
                        <div class="col">
                            <label>Region: *</label><br>
                            <select class="btn btn-light disabled" name="cmb_REGION" id="region">
                                <div>
                                    <option value="54">Argentina</option>
                                    <option value="591">Bolivia</option>
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
                                    <option value="52">México</option>
                                    <option value="505">Nicaragua</option>
                                    <option value="507">Panamá</option>
                                    <option value="595">Paraguay</option>
                                    <option value="51">Perú</option>
                                    <option value="1">Puerto Rico</option>
                                    <option value="1809">República Dominicana</option>
                                    <option value="597">Surinam</option>
                                    <option value="598">Uruguay</option>
                                    <option value="58">Venezuela</option>
                                </div>
                            </select><br>
                        </div>
                            <div class="col">
                                <label>Telefono: *</label><br>
                                <input class="form-control" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="txt_TELEFONO" class="texto" id="telefono"minlength="10" maxLength="10" placeholder="Escriba su Número" required="true"><br>
                            </div>
                    </div>
                            <label>Domicilio: *</label><br>
                            <input class="form-control" type="text" name="txt_DOMICILIO" class="texto" id="domicilio" placeholder="Escriba su Domicilio" required="true"><br>

                        <center>
                            <button class="btn btn-primary" type="submit" onclick="RegistrarUsuario()">Guardar</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='#'">Volver</button>
                        </center>
                    </div>
                </div>
        </form>

        <script>
        function enviarFormulario() {
            var formData = new FormData(document.getElementById('formulario'));

            $.ajax({
                url: 'ruta_a_tu_script_php.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'Éxito!',
                            text: response.message,
                            icon: 'success'
                        });
                        window.location.href = "nueva_pagina.php";
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: response.message,
                            icon: 'error'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Ha ocurrido un error en el servidor. Por favor, inténtelo de nuevo más tarde.',
                        icon: 'error'
                    });
                }
            });
        }
            // Funcion para ocultar los campos dependiendo si es usuario o empresa
            // Obtener el valor de la variable de sesión en JavaScript
            var rol = <?php echo json_encode($_SESSION['rol']); ?>;

            // Lógica condicional con JavaScript
            if (rol == '2') {
                var registroEmpresa = document.getElementById("DivEmpresa");
                registroEmpresa.style.display = 'none';
                registroEmpresa.disabled = true;
                document.getElementById('headerEmpresa').style.display = 'none';

                
            } else if (rol == '1') {
                var registroUsuario = document.getElementById("DivUsuario");
                registroUsuario.style.display = 'none';
                registroUsuario.disabled = true;
                document.getElementById('headerUsuario').style.display = 'none';
            }
        </script>

        <!-- Conexion de librerias de JavaScript y bootstrap -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        

        <script src="../js/password.js"></script>
        <script src="../js/registro.js"></script>
    </body>

</html>