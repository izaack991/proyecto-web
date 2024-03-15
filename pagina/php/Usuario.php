<?php
error_reporting(0);
session_start();
include('../clases/save.class.php');
include('../clases/function.class.php');
$nuevoUsuario = Save::singleton_guardar();
$_findUser = Functions::singleton_functions();
$irol=$_SESSION['rol'];
//print_r($_SESSION);

if(isset($_POST['txt_PASSWORD'])&&(isset($_POST['txt_PASSWORD2'])))
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
			$_razon = $_POST['txt_razon'];
			$_status = 0;
			
			$tipo = $_FILES['txtruta']['name'];
			//Obtenemos algunos datos necesarios sobre el archivo
			$tipo = $_FILES['txtruta']['type'];
			$tamano = $_FILES['txtruta']['size'];
			$temp = $_FILES['txtruta']['tmp_name'];

			$f_id_usuario = $_findUser -> consec_usuario();
			$newuser = $nuevoUsuario->guardar_usuario($f_id_usuario, $_nombre, $_apellido, $_correo, $_fecha_nac, $_no_identificacion, $_password, $_sexo, $_region, $_telefono, $_domicilio, $irol, $_status, $_ruta, $_razon);
			
			if ($newuser == true) {
				if($irol == 1) {
					echo "true1";
				} else if ($irol == 2) {
					echo "true2";
				}
			} else 
			echo "false";
			return false;

	$_ruta = $_POST['txtruta'];
	if($_POST['txt_PASSWORD']!=$_POST['txt_PASSWORD2'])
	{
		$alerta = "<script> Swal.fire('¡Las Contraseñas NO coinciden!');</script>";
		echo $alerta;
	}
	else
	{
		if($irol==1 && $_ruta == ""){
			$alerta = "<script> Swal.fire('¡No subió la Imagen de la Empresa!');</script>";
			echo $alerta;
		}
		else
		{
			
			if($_POST['txtruta']  != null)
			{
				//Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
				if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
					
					$alerta = "<script> Swal.fire({
						title: 'Error!',
						text: 'La extensión o el tamaño de los archivos no es correcta. Solo se permite: .gif, .jpg, .png. y de 200 kb como máximo.',
						icon: 'error');</script>";
					echo $alerta;
				}
				else {
					//Si la imagen es correcta en tamaño y tipo
					//Se intenta subir al servidor
					if (move_uploaded_file($temp, 'pagina/img/'.$_ruta)) {
						//Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
						chmod('pagina/img/'.$_ruta, 0777);
						//Mostramos el mensaje de que se ha subido con éxito
						//echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
						//Mostramos la imagen subida
						//echo '<p><img src="assets/images/'.$archivo.'"></p>';
						}
						else {
						//Si no se ha podido subir la imagen, mostramos un mensaje de error
						$alerta = "<script> Swal.fire({
							title: 'Error!',
							text: 'No se pudo subir la imagen al sevidor.',
							icon: 'error');</script>";
						echo $alerta;
						}
					}
				}
				
				
			}
			if ($newuser == true)
			{
				header("location:login.php?xd=$irol");
				echo '"<script language="javascript">alert("que");"</script>"';
				return true;
			}
		}
}
$irol=$_SESSION['rol'];
unset($_SESSION['rol']);
?>