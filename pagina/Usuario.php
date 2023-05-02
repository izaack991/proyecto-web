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
$irol=$_SESSION['t_user'];

if(isset($_POST['txt_PASSWORD'])&&(isset($_POST['txt_PASSWORD2'])))
{
	$_ruta = $_POST['txtruta'];
	
    if ($_ruta != "") 

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
		$_status = 0;
		$f_id_usuario = $_findUser -> consec_usuario();
		$newuser = $nuevoUsuario->guardar_usuario($f_id_usuario, $_nombre, $_apellido, $_correo, $_fecha_nac, $_no_identificacion, $_password, $_sexo, $_region, $_telefono, $_domicilio, $irol,$_status,$_ruta);
		
		$tipo = $_FILES['txtruta']['name'];
		//Obtenemos algunos datos necesarios sobre el archivo
		$tipo = $_FILES['txtruta']['type'];
		$tamano = $_FILES['txtruta']['size'];
		$temp = $_FILES['txtruta']['tmp_name'];
		//Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
		if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
			echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
			- Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
		}
		else {
			//Si la imagen es correcta en tamaño y tipo
			//Se intenta subir al servidor
			if (move_uploaded_file($temp, 'pagina/img/'.$_ruta)) {
				//Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
				chmod('pagina/img/'.$_ruta, 0777);
				//Mostramos el mensaje de que se ha subido co éxito
				//echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
				//Mostramos la imagen subida
				//echo '<p><img src="assets/images/'.$archivo.'"></p>';
			}
			else {
			//Si no se ha podido subir la imagen, mostramos un mensaje de error
			//echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
			}
		}
	}
		if ($newuser== true)
		{
			header("location:login.php?xd=$irol");
		}
	}
	
}
$irol=$_SESSION['t_user'];

	$smarty->assign("titulo",$titulo);
	$smarty->assign("irol",$irol);
	$smarty->display("../smarty/templates/Usuario.tpl");
		
?>