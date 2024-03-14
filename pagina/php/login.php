<?php
session_start(); // Iniciar sesión si aún no está iniciada

require_once '../clases/login.class.php';

// Definición de variables
$nuevoSingleton = Login::singleton_login();
$alerta = "";

if (isset($_POST['usuario'], $_POST['password'])) {
    $_usuario = $_POST['usuario'];
    $_password = $_POST['password'];
    
    $rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : null;

    $usuario = $nuevoSingleton->login_users($_usuario, $_password, $rol);
    $status = $nuevoSingleton->login_status($_usuario, $_password, $rol);
    
    if ($usuario) {
        if ($rol == 2) {
            header("Location: ../templates/indexPrincipal.php");
            exit();
        } elseif ($rol == 1 && $status) {
            header("Location: ../templates/indexEmpresa.php");
            exit();
        }
    } else {
        $redirect_xd = ($rol == 2) ? 2 : 1;
        unset($_SESSION['rol']);
        header("Location: ../templates/login.php?xd=$redirect_xd");
        exit();
    }
} else {
    $loginrol = isset($_SESSION['rol']) ? $_SESSION['rol'] : null;
}

$Loginrol = isset($loginrol) ? $loginrol : '';
$Alerta = $alerta;
?>
