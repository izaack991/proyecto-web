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
  <style>
    /* Estilos personalizados */
    .message-container-sent {
      max-width: 80%;
      margin-left: auto;
      text-align: right;
    }
    .message-container-recive {
      max-width: 80%;
      margin-right: auto;
      text-align: left;
    }
    .sent-message {
      background-color: #007bff;
      color: white;
      border-radius: 10px;
      padding: 10px;
      margin-bottom: 10px;
      display: inline-block;
      text-align: left;
    }
    .sent-message small{
      display: block;
    }
    .received-message {
      background-color: #f8f9fa;
      border: 1px solid #ced4da;
      border-radius: 10px;
      padding: 10px;
      margin-bottom: 10px;
      display: inline-block;
      text-align: left;
    }
    .recived-message small{
      display: block;
    }
    .selected-item {
    background-color: #f0f0f0;
}
  </style>
</head>

<body style="background-color: #F8F6F3;">

  <!-- {*Conexion a librerias de JavasScript para la ubicacion y bootstrap*} -->
  <script src="../js/ubicacion.js"></script>

  <!-- {*Barra de navegacion para Usuarios*} -->

  <form id="formInteres" method="POST">
    
    <!-- Chats al lado izuqierdo -->
    <div class="row">
      <div class="col">
        <div class="card shadow mb-3" style="margin-left: 25px; margin-top: 5px; border-radius: 25px; height: 70vh; width: 50vh;">
          <div class="card-header bg-primary" style="border-top-left-radius:25px;border-top-right-radius:25px;">
            <div style="display: flex; align-items: center; justify-content: flex-start;">
             <!-- <img src="../../assets/images/usernoprofile.png" class="rounded-circle img-thumbnail d-block" alt="Imagen de perfil" style="width: 50px; height: 50px; margin-right: 10px;">
                --><input id="buscarC" name="buscarC" type="text" class="form-control" placeholder="Buscar" style="display: flex; width: 100%; text-align: center;" >
            </div>
          </div>
          <div id="contenedorC" name="contenedorC"class="card-body" style="overflow-y: auto;">
            <ul class="list-group list-group-flush">
            </ul> 
            </div>
          </div>         </div>
     
        <!-- Mensajes -->        <div class="row">

          <div class="col">
      <div class="card shadow mb-3" style="margin-right: 25px; margin-top: 5px; border-radius: 25px; height: 70vh; width: 135vh;">
        <div class="card-header bg-primary" style="border-top-left-radius:25px;border-top-right-radius:25px;">
          <div style="display: flex; align-items: center; justify-content: flex-start;">
            <img id="imagen"src="../../assets/images/usernoprofile.png" class="rounded-circle img-thumbnail d-block" alt="Imagen de perfil" style="width: 50px; height: 50px; margin-right: 10px;">
            <strong id="nombrei"></strong>
          </div>
        </div>
        <div class="card-body" id="chat" style="overflow-y: auto;">
        </div>                
        <div class="card-footer d-flex justify-content-between">  
          <input class="form-control" style="height: 44px;" type="text" id="txtmsj" placeholder="Escribe un mensaje">
          <button class="btn btn-outline-secondary" id="enviarMensajeBtn" type="button">
            <i class="fas fa-arrow-right"></i>
          </button>
        </div>
      </div>
    </div>
    <input name="txtlatitud" id="latitud" type="hidden">
    <input name="txtlongitud" id="longitud" type="hidden">
</form>

<!-- Conexion de librerias de JavaScript y bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
  integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
  <script src="../js/insert.js"></script>
  <script src="../js/mensajes.js"></script>

</body>

</html>
