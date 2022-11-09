<?php 
session_start();
include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$smarty=new smarty;
$titulo="Lista de vacantes";
$nuevaPostulacion = save::singleton_guardar();
$_findExperiencia = Functions::singleton_functions();
$_findPais = Functions::singleton_functions();
$_vacantes = $_findExperiencia->buscarVacante();
$_pais = $_findPais->buscaPaises();

$smarty->assign("Paises",$_pais);
$smarty->assign("Vacantes",$_vacantes);
$smarty->assign("titulo",$titulo);
$smarty->display("../smarty/templates/Buscar_vacantes.tpl");
?>