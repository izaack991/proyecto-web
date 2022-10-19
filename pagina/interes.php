<?php
session_start();
include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$smarty=new smarty;
$titulo="Datos de Interes";
$nuevoInteres = Save::singleton_guardar();
$CInteres = Functions::singleton_functions();

if(isset($_POST['txtdesc']))
{
	$diusuario = $_SESSION['iusuario'];
	$didesc = $_POST['txtdesc'];
	$id_di = $CInteres->consecutivo_interes();
	$newInteres = $nuevoInteres->guardar_interes($id_di,$diusuario,$didesc);
}
	$smarty->assign("titulo",$titulo);
	$smarty->display("../smarty/templates/interes.tpl");

?>

