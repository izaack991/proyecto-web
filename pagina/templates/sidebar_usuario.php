<link rel="stylesheet" href="../../assets/css/styles_sb.css">
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
<script src="../js/notificacion_usuario.js"></script>
<script src="../js/sesion.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
// session_start();
// if ($_SESSION['irol'] == 1) {
//   echo (
//       '<script src="../js/login.js" data-error="5"></script>'
//   );
// }
?>

<div class="sidebar locked">
    <div class="logo-details">
        <a href="indexPrincipal.php">
            <i class='bx bxl-c-plus-plus'></i>
        </a>
        <span class="logo_name">CodingLab</span>
    </div>

    <ul class="nav-links">
        <li>
            <a href="experiencia_laboral.php">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Experiencia Laboral</span>
            </a>
        </li>
        <li>
            <div class="iocn-link">
                <a href="formacion_academica.php">
                    <i class='bx bx-collection'></i>
                    <span class="link_name">Formacion Academica</span>
                </a>
            </div>
        </li>
        <li>
            <div class="iocn-link">
                <a href="Aficiones.php">
                    <i class='bx bx-book-alt'></i>
                    <span class="link_name">Aficion</span>
                </a>
            </div>
        </li>
        <li>
            <div class="iocn-link">
                <a href="interes.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="link_name">Interes</span>
                </a>
            </div>
        </li>
        <li>
            <div class="iocn-link">
                <a href="buscar_vacantes.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="link_name">Buscar Vacantes</span>
                </a>
            </div>
        </li>
        <li>
            <div class="iocn-link">
                <a href="Usuario-test.php">
                    <i class='bx bx-plug'></i>
                    <span class="link_name">Tests</span>
                </a>
            </div>
        </li>
        <li class="nav-item" id="nav_video"></li>
        <li>
            <a href="#">
                <i class='bx bx-history'></i>
                <span class="link_name">History</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">History</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-cog'></i>
                <span class="link_name">Setting</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Setting</a></li>
            </ul>
        </li>
        <li>
            <div class="profile-details">
                <div class="profile-content">
                    <img src="image/profile.jpg" alt="profileImg">
                </div>
                <div class="name-job">
                    <div class="profile_name">Prem Shahi</div>
                    <div class="job">Web Desginer</div>
                </div>
                <i class='bx bx-log-out'></i>
            </div>
        </li>
    </ul>
</div>
<section class="home-section">
    <div class="home-content">
        <i class='bx'></i>
        <span class="text">Workele</span>
    </div>
</section>

<script src="../js/script.js"></script>
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
                        '<a class="nav-link active" href="video_curriculum.php">Video Curriculum</a>'
                        );
                }
            }
        });
    });
</script>