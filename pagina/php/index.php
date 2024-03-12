<?php
session_start();
include('../../../smarty-master/libs/smarty.class.php');
include('../smarty/clases/function.class.php');
$titulo = "Index";
$smarty=new smarty;
$_findvacante = Functions::singleton_functions();
$_noticia = $_findvacante->buscarNota();

$_bvacantes = $_findvacante->buscarimagenvacante();

$smarty->assign("titulo", $titulo);
$smarty->assign("Noticias",$_noticia);
$smarty->assign("Bvacante",$_bvacantes);
$smarty->display("../smarty/templates/index.tpl");
?>
