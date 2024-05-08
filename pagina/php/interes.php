<?php
// Comentar la linea de abajo si desea mostrar los errores
error_reporting(0);
session_start();
if(isset($_SESSION['tiempo']) ) {
    $vida_session = time() - $_SESSION['tiempo'];
}
$_SESSION['tiempo'] = time();
include('../clases/save.class.php');
include('../clases/function.class.php');

$nuevoInteres = Save::singleton_guardar();
$CInteres = Functions::singleton_functions();
$nuevoSingleton = Functions::singleton_functions();

$iusuario = $_SESSION['iusuario'];
$notificacionexperiencia = $nuevoSingleton->notificacionexperiencia($iusuario);
$notificacionformacion = $nuevoSingleton->notificacionformacion($iusuario);
$notificacionaficiones = $nuevoSingleton->notificacionaficiones($iusuario);
$notificacioninteres = $nuevoSingleton->notificacioninteres($iusuario);

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
    $_ubicacion = $_latitud.' ,: '.$_longitud;
    $newlogusuario = $nuevoInteres->guardar_log_usuario($_idusuario,$_ubicacion,$_movimiento,$_fecha,$_hora);
	
    if($newInteres) {
        echo "true";
    }
}
else{
    echo "errorSave";
}
?>