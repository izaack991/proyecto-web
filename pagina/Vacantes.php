<?php
session_start();
if(isset($_SESSION['tiempo']) ) {
    $vida_session = time() - $_SESSION['tiempo'];
}
$_SESSION['tiempo'] = time();
include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$smarty=new smarty;
$titulo="Proyecto Web";
if($_SESSION['iusuario'] == "")
{  
        header("location:login.php");
}
else
{
$nuevoUsuario = Save::singleton_guardar();
$_findUser = Functions::singleton_functions();
$_findPais = Functions::singleton_functions();
$_pais = $_findPais->buscaPaises();
$nuevoSingleton = Functions::singleton_functions();
$iusuario = $_SESSION['iusuario'];
$notificacionpostulaciones = $nuevoSingleton->notificacionpostulaciones($iusuario);
$alerta = '';

// if(isset($_POST['txtpuesto'])&& isset($_POST['txtempresa'])&& isset($_POST['txtsueldo'])&& isset($_POST['cmbpais'])&& isset($_POST['txtdatos'])&& isset($_POST['txtlatitud'])&& isset($_POST['txtlongitud'])&& isset($_POST['dateInicio'])&& isset($_POST['dateFin'])&& isset($_POST['txtruta']))
if(isset($_POST['enviar']))
{
    $_ruta = $_POST['txtruta'];
	
    if ($_ruta != "") 
    {
    
        $_idusuario = $_SESSION['iusuario'];
    $_puesto = $_POST['txtpuesto'];
    $_empresa = $_POST['txtempresa'];
    $_sueldo = $_POST['txtsueldo'];
    $_lugar = $_POST['cmbpais'];
    $_datos = $_POST['txtdatos'];
    
    $_fechainicio = $_POST['dateInicio'];
    
    $_fechafin = $_POST['dateFin'];
	$f_id_vacantes = $_findUser->consec_vacantes();
	$newuser = $nuevoUsuario->Guardar_id_vacantes($f_id_vacantes,$_idusuario,$_puesto,$_empresa,$_sueldo,$_lugar,$_datos,$_ruta,$_fechainicio,$_fechafin);
    $tipo = $_FILES['txtruta']['name'];
	date_default_timezone_set('America/Mexico_City');
    $_movimiento = 'Vacantes(Guardar)';
    $_fecha = date('Y-m-d H:m:s');
    $_hora = $vida_session;
    $_latitud = $_POST['txtlatitud']; 
    $_longitud = $_POST['txtlongitud']; 
    $_ubicacion = 'Latitud: '.$_latitud.' Longitud: '.$_longitud;
    $newlogusuario = $nuevoUsuario->guardar_log_usuario($_idusuario,$_ubicacion,$_movimiento,$_fecha,$_hora);

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
    $alerta = "<script>swal({
		title: '',
		text: 'Se ha publicado la vacante correctamente!',
		type: 'success',
	  });</script>";

    if($notificacionpostulaciones>=1)
    {
    $COUNTPOS=$notificacionpostulaciones;
    }
    else 
    {
    $COUNTPOS=0;
    }
    $ECOUNT = $COUNTPOS;
    $smarty->assign("COUNTPOS",$COUNTPOS);
    $smarty->assign("ECOUNT",$ECOUNT);
	$smarty->assign("titulo",$titulo);
	$smarty->assign("alerta",$alerta);
    $smarty->assign("Paises",$_pais);
	$smarty->display("../smarty/templates/Vacantes.tpl");

} else
{
    if($notificacionpostulaciones>=1)
    {
    $COUNTPOS=$notificacionpostulaciones;
    }
    else 
    {
    $COUNTPOS=0;
    }
    $ECOUNT = $COUNTPOS;
    $smarty->assign("COUNTPOS",$COUNTPOS);
    $smarty->assign("ECOUNT",$ECOUNT);
    $smarty->assign("titulo", $titulo);
    $smarty->assign("alerta",$alerta);
    $smarty->assign("Paises",$_pais);
    $smarty->display("../smarty/templates/Vacantes.tpl");
}}
?>
