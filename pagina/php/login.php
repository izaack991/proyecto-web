<?php
require_once '../clases/login.class.php';
// include('../../smarty-master/libs/smarty.class.php');

// Definición de variables
$titulo = "Login";
$nuevoSingleton = Login::singleton_login();
$alerta = "";

// Manejo de sesiones y redirección según el tipo de usuario
if ($_GET['xd'] == 1) {
    $_SESSION['t_user'] = 1;
}
if ($_GET['xd'] == 2) {
    $_SESSION['t_user'] = 2;
}

if (isset($_POST['usuario']) && isset($_POST['password'])) {
    $_usuario = $_POST['usuario'];
    $_password = $_POST['password'];

    $usuario = $nuevoSingleton->login_users($_usuario, $_password, $_SESSION['t_user']);
    $status = $nuevoSingleton->login_status($_usuario, $_password, $_SESSION['t_user']);

    $_ROL = $_SESSION['t_user'];
        //condicional si es usuario (el 2 se usa para la secion del usuario)
        //Si rol el un "2", manda al formulario de index que es el index de los usuarios
    if ($usuario == TRUE) {
        if ($_ROL == 2) {
            header("location:indexPrincipal.php");
        } elseif ($_ROL == 1 && $status == TRUE) {
            header("location:indexEmpresa.php");
        } else {
            $alerta = "<script> 
                Swal.fire({
                    title: 'Usuario NO verificado',
                    text: 'Esta cuenta está en proceso de verificación, por favor espere hasta que sea aprobada',
                    icon: 'error'
                  });
            </script>";

            $loginrol = $_GET['xd'];


            include("../templates/login.php");
        }
    } else {
        $alerta = "<script> 
            Swal.fire({
                title: 'Error al ingresar',
                text: 'Verifique sus datos. Correo y/o Contraseña.',
                icon: 'error'
              });
        </script>";

        $loginrol = $_GET['xd'];

        include("../templates/login.php");
    }
} else {
    $loginrol = $_GET['xd'];

    include("../templates/login.php");
}
?>