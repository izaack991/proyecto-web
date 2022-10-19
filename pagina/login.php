<?php
session_start();
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$smarty=new smarty;
$titulo="Login";
$buscarUsuario = Functions::singleton_functions();

if (isset($_POST['usuario'])&&isset($_POST['password']))
{   
    $_usuario = $_POST['usuario'];
    $_password = $_POST['password'];

    $usuario = $buscarUsuario->login($_usuario, $_password);
    if ($usuario) {
        foreach ($usuario as $usuario => $value) {
            $_SESSION['iusuario']=$value['id_usuario'];
            $_SESSION['nomusuario']=$value['nombre'];
        }
        header("location:index.php");
        header("location:index.php");
    }
}

$smarty->assign("titulo", $titulo);
$smarty->display("../smarty/templates/login.tpl");
?>