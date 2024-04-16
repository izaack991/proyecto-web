<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Chat </title>
  <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/styles.css"> 
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/notificacion_usuario.js"></script>

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

  <!-- {*Barra de navegacion para Usuarios*} -->
  <?php include("navbar_usuario.php") ?>
  <form id="formInteres" method="POST">

    <!-- Chats al lado izuqierdo -->
    <div class="row">
		
    <div class="col">
    <div class="card shadow mb-3" style="margin-left: 25px; margin-top: 5px; border-radius: 25px; height: 70vh; width: 350px;">
        <div class="card-header bg-primary" style="border-top-left-radius:25px;border-top-right-radius:25px;">
            <div style="display: flex; align-items: center; justify-content: flex-start;">
                <img src="../../assets/images/usernoprofile.png" class="rounded-circle img-thumbnail d-block" alt="Imagen de perfil" style="width: 50px; height: 50px; margin-right: 10px;">
                <strong>Carlos Daniel</strong>
            </div>
        </div>
        <div class="card-body" style="overflow-y: auto;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex align-items-center">
                    <img src="../../assets/images/usernoprofile.png" class="rounded-circle img-thumbnail" alt="Imagen de perfil" style="width: 50px; height: 50px; margin-right: 10px;">
                    <div>
                        <strong>Carlos Daniel</strong>
                        <br>
                        <small>Si es que el otro día estaba...</small>
                    </div>
                </li>
                <li class="list-group-item d-flex align-items-center">
                    <img src="../../assets/images/usernoprofile.png" class="rounded-circle img-thumbnail" alt="Imagen de perfil" style="width: 50px; height: 50px; margin-right: 10px;">
                    <div>
                        <strong>Carlos Daniel</strong>
                        <br>
                        <small>Si es que el otro día estaba...</small>
                    </div>
                </li>
                <li class="list-group-item d-flex align-items-center">
                    <img src="../../assets/images/usernoprofile.png" class="rounded-circle img-thumbnail" alt="Imagen de perfil" style="width: 50px; height: 50px; margin-right: 10px;">
                    <div>
                        <strong>Carlos Daniel</strong>
                        <br>
                        <small>Si es que el otro día estaba...</small>
                    </div>
                </li>
                <li class="list-group-item d-flex align-items-center">
                    <img src="../../assets/images/usernoprofile.png" class="rounded-circle img-thumbnail" alt="Imagen de perfil" style="width: 50px; height: 50px; margin-right: 10px;">
                    <div>
                        <strong>Carlos Daniel</strong>
                        <br>
                        <small>Si es que el otro día estaba...</small>
                    </div>
                </li>
                <li class="list-group-item d-flex align-items-center">
                    <img src="../../assets/images/usernoprofile.png" class="rounded-circle img-thumbnail" alt="Imagen de perfil" style="width: 50px; height: 50px; margin-right: 10px;">
                    <div>
                        <strong>Carlos Daniel</strong>
                        <br>
                        <small>Si es que el otro día estaba...</small>
                    </div>
                </li>
                <!-- Aquí van los demás elementos de la lista -->
              </ul> 
            </div>
          </div>
          
        </div>
        
        <!-- Segunda tarjeta -->
    <div class="row">
		
    <div class="col">
      <div class="card shadow mb-3" style="margin-right: 25px; margin-top: 5px; border-radius: 25px; height: 70vh; width: 135vh;">
          <div class="card-header bg-primary" style="border-top-left-radius:25px;border-top-right-radius:25px;">
              <div style="display: flex; align-items: center; justify-content: flex-start;">
                  <img src="../../assets/images/usernoprofile.png" class="rounded-circle img-thumbnail d-block" alt="Imagen de perfil" style="width: 50px; height: 50px; margin-right: 10px;">
                  <strong>Carlos Daniel</strong>
              </div>
          </div>
          <div class="card-body" style="overflow-y: auto;">
            <div>  
              <input class="form-control" id="txtpuesto" type="text" name="txtpuesto" placeholder="Escribe un mensaje" maxLength="100" required="true" pattern="[A-Z a-z]+" title="Favor de ingresar solamente palabras al momento de describir el puesto de trabajo, NO se aceptan numeros ni caracteres especiales.">
            </div>
          </div>
      </div>
    </div>
     





<input name="txtlatitud" id="latitud" type="hidden">
<input name="txtlongitud" id="longitud" type="hidden">
</form>

  <!-- Conexion de librerias de JavaScript y bootstrap -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
  <script src="../js/insert.js"></script>
  <script src="../js/modalesDinamicos.js"></script>

</body>

</html>