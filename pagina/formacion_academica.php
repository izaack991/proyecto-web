<?php
session_start();
$alerta = '';
if(isset($_SESSION['tiempo']) ) {
    $vida_session = time() - $_SESSION['tiempo'];
}
$_SESSION['tiempo'] = time();
include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$smarty=new smarty;
$titulo="PROGWEB";
if($_SESSION['iusuario'] == "")
{  
        header("location:login.php");
}
else
{
$_findUser = Functions::singleton_functions();
$nuevoUsuario = Save::singleton_guardar();
$_findUser = Functions::singleton_functions();
$smarty->assign("titulo",$titulo);
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
if(isset($_POST['descripcion'])&& isset($_POST['ubicacion'])&&isset($_POST['periodo'])&& isset($_POST['txtlatitud'])&& isset($_POST['txtlongitud']))
{
    $_idusuario = $_SESSION['iusuario'];
    $id_formacion = $_findUser->consec_formacion();
	$descripcion = $_POST['descripcion'];
	$ubicacion = $_POST['ubicacion'];
    $periodo = $_POST['periodo'];
	$newuser = $nuevoUsuario->guardar_formacion($_idusuario,$id_formacion,$descripcion,$ubicacion,$periodo);
    
    date_default_timezone_set('America/Mexico_City');
    $_movimiento = 'Formación Academica(Guardar)';
    $_fecha = date('Y-m-d H:m:s');
    $_hora = $vida_session;
    $_latitud = $_POST['txtlatitud']; 
    $_longitud = $_POST['txtlongitud']; 
    $_ubicacion = 'Latitud: '.$_latitud.' Longitud: '.$_longitud;
    $newlogusuario = $nuevoUsuario->guardar_log_usuario($_idusuario,$_ubicacion,$_movimiento,$_fecha,$_hora);
     
    $alerta = "<script>swal({
		title: '',
		text: 'Guardo correctamente el formacion academica',
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
    $smarty->display("../smarty/templates/formacion_academica.tpl");	
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
$smarty->display("../smarty/templates/formacion_academica.tpl");
}}
?>