<?php
//session_start();
require_once '../clases/login.class.php';
// include('../../smarty-master/libs/smarty.class.php');

// Definición de variables
$nuevoSingleton = Login::singleton_login();
$alerta = "";

if (isset($_POST['usuario']) && isset($_POST['password'])) {
    $_usuario = $_POST['usuario'];
    $_password = $_POST['password'];
    
    // if ($_GET['xd'] == 1) {
    //     $sesionLabel .= "Empresa";
    // } elseif ($_GET['xd'] == 2) {
    //     $sesionLabel. = "Usuario";
    // }

    $_ROL = $_SESSION['rol'];

    $usuario = $nuevoSingleton->login_users($_usuario, $_password, $_SESSION['rol']);
    $status = $nuevoSingleton->login_status($_usuario, $_password, $_SESSION['rol']);
    
    if ($usuario == TRUE) {
        if ($_ROL == 2) {
            header("Location: ../templates/indexPrincipal.php");
        } if ($_ROL == 1 && $status == TRUE) {
            echo $usuario;
            header("Location: ../templates/indexEmpresa.php");
        } else {
            
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
        
    }
} else {
    $loginrol = $_SESSION['rol'];
    
}
    $Loginrol = $loginrol;
    $Alerta = $alerta;
?>