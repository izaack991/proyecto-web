<?php
session_start();

// Comentar la linea de abajo para poder ver los errores en la pagina
error_reporting(0);

// Define el rol y el script correspondiente basado en el valor de $_GET['xd']
switch ($_GET['xd']) {
    case '1':
        $regRol = 'regEmpresa.php';
        $_SESSION['rol'] = 1;
        $sesionLabel = "EMPRESA";
        break;
    case '2':
        $regRol = 'regUsuario.php';
        $_SESSION['rol'] = 2;
        $sesionLabel = "USUARIO";
        break;
    case '3':
        $sesionLabel = "ADMINISTRADOR";
        // No hay un caso específico en el código original para $_GET['xd'] == 3
        // en términos de $regRol y $_SESSION['rol'], 
        // pero se podría agregar lógica aquí si es necesario.
        break;
    default:
        // Este bloque se ejecuta si $_GET['xd'] no es 1, 2, o 3, o si $_GET['xd'] es false
        echo '<script src="../js/login.js"></script>';
        $sesionLabel = "NADIE";
        break;
    }
// if ($_GET['xd'] == 1) {
//     $regRol='regEmpresa.php';
// }
// if ($_GET['xd'] == 2) {
//     $regRol='regUsuario.php';
// }
// if ($_GET['xd'] == false) {
//     echo (
//         '<script src="../js/login.js"></script>'
//     );
// }
// if ($_GET['xd'] == 1) {
//     $_SESSION['rol'] = 1;
// }
// if ($_GET['xd'] == 2) {
//     $_SESSION['rol'] = 2;
// }
// if ($_GET['xd'] == 1) {
//     $sesionLabel = "EMPRESA";
// } elseif ($_GET['xd'] == 2) {
//     $sesionLabel = "USUARIO";
// } elseif ($_GET['xd'] == 3) {
//     $sesionLabel = "ADMINISTRADOR";
// } else {
//     $sesionLabel = "NADIE";
// }
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<?php
    if ($_GET['xd'] == false) {
        echo ('<script src="../js/login.js" data-error="1"></script>');
    }
    if ($_SESSION['iusuario']) {
        if ($_SESSION['irol'] == 1) {
            echo (
                '<script src="../js/login.js" data-error="2"></script>'
            );
        } else if ($_SESSION['irol'] == 2) {
            echo (
                '<script src="../js/login.js" data-error="3"></script>'
            );
        }
    }
?>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8"> <!-- Utiliza col-md-8 para que la imagen ocupe el 100% del ancho en dispositivos medianos y grandes -->
            <img src="../../assets/images/Workele1.jpg" class="img-fluid" alt="Placeholder: Image cap">
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 col-lg-4">
                <div class="card border-gray shadow mb-3" style="border-radius:15px;">
                    <div class="card-header bg-primary text-white border-gray" style="font-weight: bold;font-size:1.5rem;border-top-left-radius:15px;border-top-right-radius:15px;" align="center">INICIO DE SESIÓN DE <?php echo $sesionLabel; ?></div>
                    <div class="card-body">

                        <form action="../php/login.php" method="post">
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
                                    <button id="login" class="btn btn-primary w-100" type="submit">Iniciar sesión</button>
                                </div>

                                <div class="col">
                                    <a href="<?php echo $regRol ?>" class="btn btn-info w-100" type="submit">Registrarse</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Conexion de librerias de JavaScript y bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="../js/login.js"></script>
</body>

</html>