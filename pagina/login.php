<?php
require_once '../smarty/clases/login.class.php';
include('../../smarty-master/libs/smarty.class.php');
$smarty=new smarty;
$titulo="Login";
$nuevoSingleton = Login::singleton_login();
$alerta = "";

if($_GET['xd'] == 1)
{
	$_SESSION['t_user'] = 1 ;
}
if($_GET['xd'] == 2)
{
	$_SESSION['t_user'] = 2;
}
if (isset($_POST['usuario'])&&isset($_POST['password']))
{   
    $_usuario = $_POST['usuario'];
    $_password = $_POST['password'];

    $usuario = $nuevoSingleton->login_users($_usuario,$_password,$_SESSION['t_user']);
    $status = $nuevoSingleton->login_status($_usuario,$_password,$_SESSION['t_user']);

        $_ROL= $_SESSION['t_user'];
        //condicional si es usuario (el 2 se usa para la secion del usuario)
        //Si rol el un "2", manda al formulario de index que es el index de los usuarios
        if($usuario == TRUE)
        {
            if ($_ROL==2)
            {
                header("location:index.php");
            }
            if ($_ROL==1 && $status==TRUE)
            {
                header("location:indexEmpresa.php");
            }
            else
            {
                $alerta="<script> 
                swal({
                    title: '',
                    html: 'Error al ingresar, esta cuenta esta en proceso de verificacion, por favor espere hasta que se complete la verificacion<strong></strong>',
                type: 'warning',
                });</script>";
    
                $loginrol = $_GET['xd'];
    
                $smarty->assign("loginrol",$loginrol);
                $smarty->assign("alerta",$alerta);			
                $smarty->assign("titulo",$titulo);
                $smarty->display("../smarty/templates/login.tpl");
            }
            //condicional si es empresa (el 1 se usa para las empresas)
        }
        else
	    {	
			$alerta="<script> 
			swal({
				title: '',
				html: 'Error al ingresar, verifique sus datos,si aun no esta registrado, vaya a la opcion registrarme, <strong>Si es empresa vaya a la pagina principal y seleccione soy empresa</strong>',
			type: 'warning',
			});</script>";

            $loginrol = $_GET['xd'];

            $smarty->assign("loginrol",$loginrol);
			$smarty->assign("alerta",$alerta);			
			$smarty->assign("titulo",$titulo);
			$smarty->display("../smarty/templates/login.tpl");
		
	    }
}
else
{
        $loginrol = $_GET['xd'];

        $smarty->assign("loginrol",$loginrol);
        $smarty->assign("alerta",$alerta);	
        $smarty->assign("titulo", $titulo);
        $smarty->display("../smarty/templates/login.tpl");

}

    


?>