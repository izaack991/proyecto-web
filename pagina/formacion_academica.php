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
$titulo="PROGWEB";
$_findUser = Functions::singleton_functions();
$nuevoUsuario = Save::singleton_guardar();
$_findUser = Functions::singleton_functions();
$smarty->assign("titulo",$titulo);
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
     
    $alert = "<script> alert('Se ha guardado correctamente formacion academica!');</script>";
    echo $alert;
}
$smarty->assign("titulo",$titulo);
$smarty->display("../smarty/templates/formacion_academica.tpl");	
?>