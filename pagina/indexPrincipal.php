<?php
session_start();
include('../../smarty-master/libs/smarty.class.php');
include('../smarty/clases/function.class.php');
$titulo = "Index";
$smarty=new smarty;
$_findvacante = Functions::singleton_functions();
$_noticia = $_findvacante->buscarNota();

$_vacantes = $_findvacante->buscarVacanteImg();

$smarty->assign("titulo", $titulo);
$smarty->assign("Noticias",$_noticia);
$smarty->assign("Vacantes",$_vacantes);
$smarty->display("../smarty/templates/indexPrincipal.tpl");
?>