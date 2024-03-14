<?php
//session_start();
require_once '../clases/login.class.php';
// include('../../smarty-master/libs/smarty.class.php');

// Definición de variables
$nuevoSingleton = Login::singleton_login();
$alerta = "";
// Manejo de sesiones y redirección según el tipo de usuario
// if ($_GET['xd'] == 1) {
//     $_SESSION['rol'] = 1;
// }
// if ($_GET['xd'] == 2) {
//     $_SESSION['rol'] = 2;
// }

if (isset($_POST['usuario']) && isset($_POST['password'])) {
    $_usuario = $_POST['usuario'];
    $_password = $_POST['password'];
    
    $_ROL = $_SESSION['rol'];

    $usuario = $nuevoSingleton->login_users($_usuario, $_password, $_SESSION['rol']);
    $status = $nuevoSingleton->login_status($_usuario, $_password, $_SESSION['rol']);
    
    //echo '<script> alert("Esto no jaló");</script>';
    //condicional si es usuario (el 2 se usa para la secion del usuario)
    //Si rol el un "2", manda al formulario de index que es el index de los usuarios
    if ($usuario == TRUE) {
        if ($_ROL == 2) {
            header("Location: ../templates/indexPrincipal.php");
        } if ($_ROL == 1 && $status == TRUE) {
            header("Location: ../templates/indexEmpresa.php");
        } else {
            //echo '<script> alert("Esto no jaló");</script>';
            
            $loginrol = $_SESSION['rol'];
        }
    } else {
        if ($_ROL == 2) {
            unset($_SESSION['rol']);
            header("Location: ../templates/login.php?xd=2");
        } else {
            unset($_SESSION['rol']);
            header("Location: ../templates/login.php?xd=1");
        }
        // $alerta = "<script> 
        // Swal.fire({
        //     title: 'Error al ingresar',
        //     text: 'Verifique sus datos. Correo y/o Contraseña.',
        //     icon: 'error'
        // });
        // </script>";
        
        $loginrol = $_SESSION['rol'];
        
        // include("../templates/login.php");
    }
} else {
    $loginrol = $_SESSION['rol'];
    
}
    $Loginrol = $loginrol;
    $Alerta = $alerta;
    // include("../templates/login.php");
?>