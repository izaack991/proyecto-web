<?php
session_start();
include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$smarty=new smarty;
$titulo="Lista de Postulaciones";
$buscarpostulacion = Functions::singleton_functions();
$b_postulacion = $buscarpostulacion->buscarPostulacion();

	$smarty->assign("titulo",$titulo);
	$smarty->assign("Postulacion",$b_postulacion);
	$smarty->display("../smarty/templates/postulacion.tpl");

?>