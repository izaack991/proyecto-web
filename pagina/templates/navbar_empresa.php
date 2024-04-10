<link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/notificacion_empresa.js"></script>
<script src="../js/sesion.js"></script>
<?php 
session_start();
if ($_SESSION['irol'] == 2) {
  echo (
      '<script src="../js/login.js" data-error="4"></script>'
  );
}
?>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #FFFFFF;">
      <div class="container-fluid">
      <a class="navbar-brand" href="indexEmpresa.php" style="color: #54B689;">
    <img src="../../assets/images/index_usuario/WORKELE.png" alt="Inicio" style="width: 150px; height: 150px;">
</a>
        <button class="navbar-toggler" type="button"  data-bs-toggle="collapse" data-bs-target="#navbarColor03"aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor03">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="vacante.php"  style="color: #54B689;">VACANTES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="postulacion.php" style="color: #54B689;">POSTULACIONES</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown" >
              <a class="nav-link active font-weight-bold dropdown-toggle" id="nombreUsuario" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li class="text-center"><a class="nav-link active text-primary font-weight-bold" href="#">Ver Perfil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li class="text-center">
                  <!-- {*Boton para cerrar la sesion*} -->
                  <a class="nav-link active text-danger" href='#' onclick="openAlert()" style="font-weight:bold;">Cerrar Sesión</a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="btn demo-btn-on-bg text-white font-weight-bold mt-2 mt-lg-0" data-toggle="modal"data-target="#exampleModal">
                <span class="fa-layers fa-fw fa-lg">
                  <i class="fas fa-bell" style="color: #54B689;"></i>
                  <span id="contador">
                  </span>
                </span>
              </a>
            </li>


            
        <!--Creacion de la modal de notificaciones-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-bell"></i><b>
                    Notificaciones</b></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div id="sinnot"></div>
                <a class="link-primary" id="notpos" href="postulacion.php">No tiene postulaciones pendientes</a>
              </div>
            </div>
          </div>
        </div>


        <script>
          // function redireccionindex() {
          //   window.location.href = 'https://www.workele.com';
          // }
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
            // xhr.onreadystatechange = function() {
            //   if (xhr.readyState == 4 && xhr.status == 200) {
            //     Swal.fire({
            //     title: "¿Seguro que quieres Cerrar Sesion?",
            //     icon: "question",
            //     showCancelButton: true,
            //     confirmButtonColor: "#3085d6",
            //     cancelButtonColor: "#d33",
            //     confirmButtonText: "Aceptar"
            //       }).then((result) => {
            //           if (result.isConfirmed) {
            //             onClose: redireccionindex();
            //     }
            //   });
            //   }};
          }
        </script>
      </ul>
    </div>
  </div>
</nav>