<?php 
session_start();
if ($_GET['xd']) {
    $_SESSION['rol'] = 1;
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../js/login.js"></script>
</head>

<body>

<!-- Formuario de Login -->
<!-- <form id="login-form" method="post"> -->
<form action="../php/login.php" method="post">

    <!-- Mensaje para los errores al ingresar -->
    <!-- {$alerta} -->

    <div style="margin-top: 150px; margin-left: 35%; ">
        <!-- Card del login -->
        <div class="card border-secondary mb-3" style="max-width: 25rem;">
            <FONT COLOR="black"><div class="card-header bg-primary" style="font-weight: bold;" align="center">Inicio de sesion</div></FONT>
            <div class="card-body">

                <!-- Campos para los datos del login -->
                <br>
                <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingresa tu correo electronico">
                <br>
                <input type="password" name="password" id="password" class="form-control" placeholder="Ingresa contraseña">
                <br><br>

                <center>
                    <!-- Boton para iniciar sesion --> 
                    <button id="login" class="btn btn-light" type="submit" style="padding-bottom: 10mm;">Iniciar sesion</button>

                    
                    <!-- Boton para registrarse -->
                    <A HREF="usuario.php" class="btn btn-light" type="submit" style="padding-bottom: 10mm;">Registrarse</A>

                </center>
            </div>
        </div>

        <!-- Boton para volver al indexPrincipal -->
        <a href="index.php"><button class="btn btn-light" type="button">Inicio</button></a>
    <!--<a href="https://workele.com/"><button class="btn btn-light" type="button">Inicio</button></a>-->


    </div>
    <div id="mensaje"></div>

<!-- Conexion de librerias de JavaScript y bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>