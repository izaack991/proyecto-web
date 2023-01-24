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
$titulo="Datos de Interes";
$nuevoInteres = Save::singleton_guardar();
$CInteres = Functions::singleton_functions();

if(isset($_POST['txtdesc'])&& isset($_POST['txtlatitud'])&& isset($_POST['txtlongitud']))
{
	$_idusuario = $_SESSION['iusuario'];
	$didesc = $_POST['txtdesc'];
	$id_di = $CInteres->consecutivo_interes();
	$newInteres = $nuevoInteres->guardar_interes($id_di,$_idusuario,$didesc);

	date_default_timezone_set('America/Mexico_City');
    $_movimiento = 'Interes(Guardar)';
    $_fecha = date('Y-m-d H:m:s');
    $_hora = $vida_session;
	$_latitud = $_POST['txtlatitud']; 
    $_longitud = $_POST['txtlongitud']; 
    $_ubicacion = 'Latitud: '.$_latitud.' Longitud: '.$_longitud;
    $newlogusuario = $nuevoInteres->guardar_log_usuario($_idusuario,$_ubicacion,$_movimiento,$_fecha,$_hora);

	$alert = "<script> alert('Se ha guardado correctamente interes!');</script>";
    echo $alert;
}
	$smarty->assign("titulo",$titulo);
	$smarty->display("../smarty/templates/interes.tpl");

?>

