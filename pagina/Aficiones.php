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
$nuevoUsuario = Save::singleton_guardar();
$_findUser = Functions::singleton_functions();
if(isset($_POST['txtdesc'])&& isset($_POST['txtlatitud'])&& isset($_POST['txtlongitud']))
{
	$_idusuario = $_SESSION['iusuario'];
    $_descripcion = $_POST['txtdesc'];
	$f_id_Pasatiempo = $_findUser->consec_pasatiempo();
	$newuser = $nuevoUsuario->Guardar_id_pasatiempo($f_id_Pasatiempo,$_idusuario,$_descripcion);
 
	date_default_timezone_set('America/Mexico_City');
    $_movimiento = 'Aficiones(Guardar)';
    $_fecha = date('Y-m-d H:m:s');
    $_hora = $vida_session;
    $_latitud = $_POST['txtlatitud']; 
    $_longitud = $_POST['txtlongitud']; 
    $_ubicacion = 'Latitud: '.$_latitud.' Longitud: '.$_longitud;
    $newlogusuario = $nuevoUsuario->guardar_log_usuario($_idusuario,$_ubicacion,$_movimiento,$_fecha,$_hora);
}
$smarty ->assign("titulo",$titulo);
$smarty->display("../smarty/templates/Aficiones.tpl"); 
?>