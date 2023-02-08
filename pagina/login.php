<?php
session_start();
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$smarty=new smarty;
$titulo="Login";
$buscarUsuario = Functions::singleton_functions();
$_SESSION['irol']=$_GET['xd'];


if (isset($_POST['usuario'])&&isset($_POST['password']))
{   
    $_usuario = $_POST['usuario'];
    $_password = $_POST['password'];

    $usuario = $buscarUsuario->login($_usuario, $_password);
 //
        foreach ($usuario as $usuario => $value) {
            $_SESSION['iusuario']=$value['id_usuario'];
            $_SESSION['nomusuario']=$value['nombre'];
            $_ROL=$value['rol'];
            $vac=$_GET['vacante'];
        }
        //condicional si es usuario (el 2 se usa para la secion del usuario)
        //Si rol el un "2", manda al formulario de index que es el index de los usuarios
        if ($_ROL==2)
        {
            header("location:index.php");
        }
        //condicional si es empresa (el 1 se usa para las empresas)
        if ($_ROL==1)
        {
            header("location:indexEmpresa.php");
        }
        
    //
}


        $smarty->assign("titulo", $titulo);
        $smarty->display("../smarty/templates/login.tpl");



?>