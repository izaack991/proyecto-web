<?php 
session_start();
// Comentar la linea de abajo para poder ver los errores en la pagina
error_reporting(0);

if ($_GET['xd'] == 1) {
    $regRol='regEmpresa.php';
}
if ($_GET['xd'] == 2) {
    $regRol='regUsuario.php';
}
if ($_GET['xd'] == false) {
    echo (
        '<script src="../js/login.js"></script>'
    );
}
if ($_GET['xd'] == 1) {
    $_SESSION['rol'] = 1;
}
if ($_GET['xd'] == 2) {
    $_SESSION['rol'] = 2;
}
if ($_GET['xd'] == 1) {
    $sesionLabel = "EMPRESA";
} elseif ($_GET['xd'] == 2) {
    $sesionLabel = "USUARIO";
} elseif ($_GET['xd'] == 3) {
    $sesionLabel = "ADMINISTRADOR";
} else {
    $sesionLabel = "NADIE";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Log in</title>
<link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
<link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
<link id="theme-style" rel="stylesheet" href="../../assets/css/styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body >

<!-- Formuario de Login -->
<!-- <form id="login-form" method="post"> -->
<form action="../php/login.php" method="post">

    <!-- Mensaje para los errores al ingresar -->
    <script> <?php echo $Alerta ?> </script> 
    <div class="row justify-content-center mt-4" >
        <img src="../../assets/images/Workele1.jpg" class="d-block user-select-none" aria-label="Placeholder: Image cap" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem; max-width: 100%; height: auto;" />
    </div>


    <div class="d-flex justify-content-center mt-5">
        <!-- Card del login -->
        <div class="card border-gray shadow mb-3" style="width: 25rem;border-radius:15px;">
            <FONT COLOR="black"><div class="card-header bg-primary text-white border-gray" style="font-weight: bold;font-size:1.5rem;border-top-left-radius:15px;border-top-right-radius:15px;" align="center">INICIO DE SESIÓN DE <?php echo $sesionLabel; ?></div></FONT>
            <div class="card-body">

                <!-- Campos para los datos del login -->
                <div class="form-floating mb-3 mt-4">
                    <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingresa tu correo electronico">
                    <label for="floatingInput">Ingresa tu correo electrónico</label>
                </div>
                <div class="form-floating mb-3 mt-4">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Ingresa tu contraseña">
                    <label for="floatingInput">Ingresa tu contraseña</label>
                </div>

                <div class="row text-center mt-5">
                    <div class="col">
                        <!-- Boton para iniciar sesion --> 
                        <button id="login" class="btn btn-primary w-100" type="submit">Iniciar sesion</button>
                    </div>

                    <div class="col">
                        <!-- Boton para registrarse -->
                        <a href="<?php echo $regRol ?>" class="btn btn-info w-100" style="padding-top:9px;" type="submit">Registrarse</a>
                    </div>
                </div>    


            </div>
        </div>


    </div>
    <div id="mensaje"></div>

<!-- Conexion de librerias de JavaScript y bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>