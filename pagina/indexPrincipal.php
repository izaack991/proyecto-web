<?php
session_start();
include('../../smarty-master/libs/smarty.class.php');
include('../smarty/clases/function.class.php');
$titulo = "Index";
$smarty=new smarty;
$_findvacante = Functions::singleton_functions();
$_noticia = $_findvacante->buscarNota();

$smarty->assign("titulo", $titulo);
$smarty->assign("Noticias",$_noticia);
$smarty->display("../smarty/templates/indexPrincipal.tpl");
?>