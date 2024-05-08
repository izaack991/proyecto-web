<?php
// Comentar la linea de abajo si desea mostrar los errores
error_reporting(0);
session_start();
$alerta = '';
if(isset($_SESSION['tiempo']) ) {
    $vida_session = time() - $_SESSION['tiempo'];
}
$_SESSION['tiempo'] = time();
include('../clases/save.class.php');
include('../clases/function.class.php');

$_findUser = Functions::singleton_functions();
$nuevoUsuario = Save::singleton_guardar();
$_findUser = Functions::singleton_functions();
$nuevoSingleton = Functions::singleton_functions();
$iusuario = $_SESSION['iusuario'];

if(isset($_POST['descripcion'])&& isset($_POST['ubicacion'])&&isset($_POST['fechaInicio'])&&isset($_POST['fechaFin'])&& isset($_POST['txtlatitud'])&& isset($_POST['txtlongitud']))
{
    $_idusuario = $_SESSION['iusuario'];
    $id_formacion = $_findUser->consec_formacion();
	$descripcion = $_POST['descripcion'];
	$ubicacion = $_POST['ubicacion'];
    $_fechaInicio = $_POST['fechaInicio'];
    $_fechaFin = $_POST['fechaFin'];
	$newuser = $nuevoUsuario->guardar_formacion($_idusuario,$id_formacion,$descripcion,$ubicacion,$_fechaInicio,$_fechaFin);
    
    date_default_timezone_set('America/Mexico_City');
    $_movimiento = 'Formación Academica(Guardar)';
    $_fecha = date('Y-m-d H:m:s');
    $_hora = $vida_session;
    $_latitud = $_POST['txtlatitud']; 
    $_longitud = $_POST['txtlongitud']; 
    $_ubicacion = $_latitud.' ,: '.$_longitud;
    $newlogusuario = $nuevoUsuario->guardar_log_usuario($_idusuario,$_ubicacion,$_movimiento,$_fecha,$_hora);
     
    // Envio de la alerta de guardado
    if($newuser == true) {
        echo "true";
    }
} else {
    // Envio de la alerta de que no se guardo
    echo "errorSave";
}
?>