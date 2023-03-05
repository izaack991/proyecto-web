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
$alerta = '';
$nuevoSingleton = Functions::singleton_functions();
$iusuario = $_SESSION['iusuario'];
$notificacionexperiencia = $nuevoSingleton->notificacionexperiencia($iusuario);
$notificacionformacion = $nuevoSingleton->notificacionformacion($iusuario);
$notificacionaficiones = $nuevoSingleton->notificacionaficiones($iusuario);
$notificacioninteres = $nuevoSingleton->notificacioninteres($iusuario);
$alerta = '';
if($notificacionexperiencia==0)
{
    $COUNTLAB=1;

}
else 
{
    $COUNTLAB=0;
}
if($notificacionformacion==0)
{
    $COUNFOR=1;
}
else 
{
    $COUNFOR=0;
}
if($notificacionaficiones==0)
{
    $COUNTAFI=1;
}
else 
{
    $COUNTAFI=0;
}
if($notificacioninteres==0)
{
    $COUNTINT=1;
}
else 
{
    $COUNTINT=0;
}
$COUNT = $COUNTLAB + $COUNFOR + $COUNTAFI + $COUNTINT;
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

	$alerta = "<script>swal({
		title: '',
		text: 'Se guardo correctamente el interes',
		type: 'success',
	  });</script>";
	  $smarty->assign("COUNTLAB",$COUNTLAB);
	  $smarty->assign("COUNFOR",$COUNFOR);
	  $smarty->assign("COUNTAFI",$COUNTAFI);
	  $smarty->assign("COUNTINT",$COUNTINT);
	  $smarty->assign("COUNT",$COUNT);
	  $smarty->assign("iusuario",$iusuario);
	$smarty->assign("titulo",$titulo);
	$smarty->assign("alerta",$alerta);
	$smarty->display("../smarty/templates/interes.tpl");
}
else{
	$smarty->assign("COUNTLAB",$COUNTLAB);
	$smarty->assign("COUNFOR",$COUNFOR);
	$smarty->assign("COUNTAFI",$COUNTAFI);
	$smarty->assign("COUNTINT",$COUNTINT);
	$smarty->assign("COUNT",$COUNT);
	$smarty->assign("iusuario",$iusuario);
	$smarty->assign("titulo",$titulo);
	$smarty->assign("alerta",$alerta);
	$smarty->display("../smarty/templates/interes.tpl");
}



?>

