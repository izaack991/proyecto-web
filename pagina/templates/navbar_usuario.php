<link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
<link rel="stylesheet" href="../../assets/css/styles.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/notificacion_usuario.js"></script>
<script src="../js/sesion.js"></script>
<?php 
session_start();
if ($_SESSION['irol'] == 1) {
  echo (
      '<script src="../js/login.js" data-error="5"></script>'
  );
}
?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFFFFF;">
  <div class="container-fluid">
    <a class="navbar-brand" href="indexPrincipal.php">
      <img src="../../assets/images/index_usuario/WORKELE.png" alt="Inicio" style="width: 150px; height: 150px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03"
      aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- CONTENIDO DEL NAVBAR -->
    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" style="color: #54B689;" role="button" aria-haspopup="true" aria-expanded="false">REGISTRO</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="experiencia_laboral.php" style="color: #54B689;">EXPERIENCIA LABORAL</a>
            <a class="dropdown-item" href="formacion_academica.php" style="color: #54B689;">FORMACION ACADEMICA</a>
            <a class="dropdown-item" href="Aficiones.php" style="color: #54B689;">AFICIONES</a>
            <a class="dropdown-item" href="interes.php" style="color: #54B689;">INTERES</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="buscar_vacantes.php" style="color: #54B689;">BUSCAR VACANTES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="Usuario-test.php" style="color: #54B689;">TESTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="chat.php" style="color: #54B689;">CHAT</a>
        </li>
        <li class="nav-item" id="nav_video"></li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link active font-weight-bold dropdown-toggle" style="color: #54B689;" href="#"
          id="nombreUsuario" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li class="text-center"><a class="nav-link active text-primary font-weight-bold" href="#">VER PERFIL</a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="text-center">
              <a class="nav-link active text-danger" href='#' onclick="openAlert()" style="font-weight:bold;">CERRAR SESIÓN</a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <button class="btn demo-btn-on-bg text-white font-weight-bold mt-2 mt-lg-0" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            <span class="fa-layers fa-fw fa-lg">
              <i class="fas fa-bell" style="color: #54B689;"></i>
              <span id="contador"></span>
            </span>
          </button>
        </li>
        <!-- {* Creacion de la modal de notificaciones *} -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-bell"></i>
                  <b>Notificaciones</b>
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div id="contador_exp"></div>
                <div id="contador_for"></div>
                <div id="contador_afi"></div>
                <div id="contador_int"></div>
                <div id="contador_not"></div>
              </div>
            </div>
          </div>
        </div>
        <script>
          $(document).ready(function () {
            // Verificar si el elemento está registrado en la base de datos
            $.ajax({
              url: '../php/verificar_video.php',
              type: 'GET',
              success: function (response) {
                // Si el elemento está registrado, lo eliminamos del navbar
                if (response === 'no_registrado') {
                  $('#nav_video').html(
                    '<a class="nav-link active" href="video_curriculum.php" style="color: #54B689;">VIDEO CURRICULUM</a>'
                    );
                }
              }
            });
          });

          function openAlert() {
            Swal.fire({
              title: '¿Estás seguro?',
              text: '¿Quieres cerrar sesión?',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Sí, cerrar sesión',
              cancelButtonText: 'Cancelar'
            }).then((result) => {
              if (result.isConfirmed) {
                // Envía una solicitud al servidor para destruir la sesión utilizando Ajax
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "../php/logout.php", true);
                xhr.onreadystatechange = function () {
                  if (xhr.readyState == 4 && xhr.status == 200) {
                    window.location.href = 'https://www.workele.com';
                  }
                };
                xhr.send();
              }
            });
          }
        </script>
      </ul>
    </div>
  </div>
</nav>
<script>


</script>
</ul>
</div>
</div>
</nav>