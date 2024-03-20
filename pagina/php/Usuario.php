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
	$_ruta = $_POST['txtruta'];
	$_cons = $_POST['txtcons'];
	if($_POST['txt_PASSWORD']!=$_POST['txt_PASSWORD2'])
	{
		$alerta = "<script> Swal.fire('¡Las Contraseñas NO coinciden!');</script>";
		echo "errorPassword";
	}
	else
	{
		if($irol==1 && $_ruta == ""){
			$alerta = "<script> Swal.fire('¡No subió la Imagen de la Empresa!');</script>";
			echo "errorImagenEmpresa";
		}
		else if ($irol==1 && $_cons == "")
		{
			echo "errorConstancia";
		} else {
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
			
			//Obtenemos algunos datos necesarios sobre el archivo de la imagen
			$tipo = $_FILES['txtruta']['name'];
			$tipo = $_FILES['txtruta']['type'];
			$tamano = $_FILES['txtruta']['size'];
			$temp = $_FILES['txtruta']['tmp_name'];

			//Obtenemos algunos datos necesarios sobre el archivo de la constancia
			$tipoCons = $_FILES['txtcons']['name'];
			$tipoCons = $_FILES['txtcons']['type'];
			$tamanoCons = $_FILES['txtcons']['size'];
			$tempCons = $_FILES['txtcons']['tmp_name'];

			if($_POST['txtruta']  != null)
			{
				//Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
				if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
					
					$alerta = "<script> Swal.fire({
						title: 'Error!',
						text: 'La extensión o el tamaño de los archivos no es correcta. Solo se permite: .gif, .jpg, .png. y de 200 kb como máximo.',
						icon: 'error');</script>";
					echo "errorImagen";
				}
				else {
					//Si la imagen es correcta en tamaño y tipo
					//Se intenta subir al servidor
					if (move_uploaded_file($temp, 'pagina/userfiles/img/'.$_ruta)) {
						//Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
						chmod('pagina/userfiles/img/'.$_ruta, 0777);
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
						echo "errorImagenServer";
						}
					}
				}

				if($_POST['txtcons']  != null)
				{
					//Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
					if (!((strpos($tipoCons, "jpeg") || strpos($tipoCons, "jpg") || strpos($tipoCons, "png")) && ($tamanoCons < 20000000))) {
						
						$alerta = "<script> Swal.fire({
							title: 'Error!',
							text: 'La extensión o el tamaño de los archivos no es correcta. Solo se permite: .jpg, .png. y de 200 kb como máximo.',
							icon: 'error');</script>";
						echo "errorConstanciaTipoTamaño";
					}
					else {
						//Si la imagen es correcta en tamaño y tipo
						//Se intenta subir al servidor
						if (move_uploaded_file($tempCons, 'pagina/userfiles/pdf/'.$_cons)) {
							//Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
							chmod('pagina/userfiles/pdf/'.$_cons, 0777);
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
							echo "errorConsServer";
							}
						}
					}
				
				$f_id_usuario = $_findUser -> consec_usuario();
				$newuser = $nuevoUsuario->guardar_usuario($f_id_usuario, $_nombre, $_apellido, $_correo, $_fecha_nac, $_no_identificacion, $_password, $_sexo, $_region, $_telefono, $_domicilio, $irol, $_status, $_ruta, $_cons, $_razon);
				
			}
			if ($newuser == true) {
				if($irol == 1) {
					echo "true1";
				} else if ($irol == 2) {
					echo "true2";
				}
			}
		}
}
$irol=$_SESSION['rol'];
?>