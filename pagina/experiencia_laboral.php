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
$titulo="Experiencia Laboral";
$nuevoExperiencia = save::singleton_guardar();
$_findExperiencia = Functions::singleton_functions();
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
if(isset($_POST['txtdescripcion']) && isset($_POST['txtempresa']) && isset($_POST['txtperiodo'])&& isset($_POST['txtlatitud'])&& isset($_POST['txtlongitud']))
{
    $_idusuario = $_SESSION['iusuario'];
    $_descripcion = $_POST['txtdescripcion'];
    $_empresa = $_POST['txtempresa'];
    $_periodo = $_POST['txtperiodo'];
    $f_idexperiencia = $_findExperiencia->consec_experiencia();
    $newExperiencia = $nuevoExperiencia->guardar_experiencia_laboral($f_idexperiencia,$_idusuario,$_descripcion,$_empresa,$_periodo);

    date_default_timezone_set('America/Mexico_City');
    $_movimiento = 'Experiencia Laboral(Guardar)';
    $_fecha = date('Y-m-d H:m:s');
    $_hora = $vida_session;
    $_latitud = $_POST['txtlatitud']; 
    $_longitud = $_POST['txtlongitud']; 
    $_ubicacion = 'Latitud: '.$_latitud.' Longitud: '.$_longitud;
    $newlogusuario = $nuevoExperiencia->guardar_log_usuario($_idusuario,$_ubicacion,$_movimiento,$_fecha,$_hora);

    $alerta = "<script>swal({
		title: '',
		text: 'Se ha guardado tu experiencia laboral correctamente!',
		type: 'success',
	  });</script>";

    $smarty->assign("titulo",$titulo);
    $smarty->assign("alerta",$alerta);
    $smarty->display("../smarty/templates/experiencia_laboral.tpl");

} else {
  $smarty->assign("COUNTLAB",$COUNTLAB);
$smarty->assign("COUNFOR",$COUNFOR);
$smarty->assign("COUNTAFI",$COUNTAFI);
$smarty->assign("COUNTINT",$COUNTINT);
$smarty->assign("COUNT",$COUNT);
$smarty->assign("iusuario",$iusuario);
$smarty->assign("titulo",$titulo);
$smarty->assign("alerta",$alerta);
$smarty->display("../smarty/templates/experiencia_laboral.tpl");
}
?>