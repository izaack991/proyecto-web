<link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="indexPrincipal.php">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03"
      aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="experiencia_laboral.php">Experiencia Laboral
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="formacion_academica.php">Formacion Academica
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="Aficiones.php">Aficiones
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="interes.php">Interes
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="buscar_vacantes.php">Buscar Vacantes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="Usuario-test.php">Tests</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-warning shadow" href="video_curriculum.php">
            <i class="bi bi-camera-video-fill"></i> Novedad: Video Curriculum
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="btn demo-btn-on-bg text-white font-weight-bold ml-2 mt-2 mt-lg-0" data-toggle="modal"
            data-target="#exampleModal">
            <span class="fa-layers fa-fw mr-2 fa-lg">
              <i class="fas fa-bell"></i>
              <span id="contador">
              </span>
            </span>
          </a>
        </li>
        <li class="nav-link active font-weight-bold" id="nombreUsuario"></li>

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

        <!-- {*Boton para cerrar la sesion*} -->
        <a class="nav-link active text-danger" href='#' onclick="openAlert()" style="font-weight:bold;">Cerrar Sesión
        </a>

        <script>
          // function redireccionindex() {
          //   window.location.href='https://www.workele.com';
          //     }
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
            // var xhr = new XMLHttpRequest();
            // xhr.open("GET", "../php/logout.php", true);

            // Swal.fire({
            //   title: "¿Seguro que quieres Cerrar Sesion?",
            //   icon: "question",
            //   showCancelButton: true,
            //   confirmButtonColor: "#3085d6",
            //   cancelButtonColor: "#d33",
            //   confirmButtonText: "Aceptar"
            // }).then((result) => {
            //   if (result.isConfirmed) {
            //     onClose: redireccionindex();
            //   }
            // });
          }
        </script>
      </ul>
    </div>
  </div>
</nav>