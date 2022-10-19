<?php
 session_start();
include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$smarty=new smarty;
$titulo="PROGWEB";
$_findUser = Functions::singleton_functions();
$nuevoUsuario = Save::singleton_guardar();
$_findUser = Functions::singleton_functions();
$smarty->assign("titulo",$titulo);
if(isset($_POST['descripcion'])&& isset($_POST['ubicacion'])&&isset($_POST['periodo']))
{
    $id_usuario = $_SESSION['iusuario'];
    $id_formacion = $_findUser->consec_formacion();
	$descripcion = $_POST['descripcion'];
	$ubicacion = $_POST['ubicacion'];
    $periodo = $_POST['periodo'];
	$newuser = $nuevoUsuario->guardar_formacion($id_usuario,$id_formacion,$descripcion,$ubicacion,$periodo);
    
}
$smarty->assign("titulo",$titulo);
$smarty->display("../smarty/templates/formacion_academica.tpl");	
?>