<?php
session_start();
include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$smarty=new smarty;
$titulo="Registro Usuario";
$nuevoUsuario = Save::singleton_guardar();
$_findUser = Functions::singleton_functions();
//$id_tipo=$_GET['xd'];
$irol=$_SESSION['irol'];
echo $irol;
if(isset($_POST['txt_PASSWORD'])&&(isset($_POST['txt_PASSWORD2'])))
{

	if($_POST['txt_PASSWORD']!=$_POST['txt_PASSWORD2'])
		{
			echo '¡Las Contraseñas NO coinciden!';
			header("location:Usuario.php");
		}
		
	else
	{
		$_nombre = $_POST['txt_NOMBRE'];
		$_apellido = $_POST['txt_APELLIDOS'];
		$_correo = $_POST['txt_CORREO'];
		$_fecha_nac = $_POST['dateFECHA'];
		$_no_identificacion = $_POST['txt_CURP'];
		$_password = $_POST['txt_PASSWORD'];
		$_sexo = $_POST['cmb_SEXO'];
		$_region = $_POST['cmb_REGION'];
		$_telefono = $_POST['txt_TELEFONO'];
		$_domicilio = $_POST['txt_DOMICILIO'];
		$f_id_usuario = $_findUser -> consec_usuario();
		$newuser = $nuevoUsuario->guardar_usuario($f_id_usuario, $_nombre, $_apellido, $_correo, $_fecha_nac, $_no_identificacion, $_password, $_sexo, $_region, $_telefono, $_domicilio, $irol);
		
		if ($newuser== true)
		{
			header("location:login.php?xd=$irol");
		}
	}
	
}

	$smarty->assign("titulo",$titulo);
	$smarty->display("../smarty/templates/Usuario.tpl");
		

?>