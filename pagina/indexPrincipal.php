<?php
session_start();
include('../../smarty-master/libs/smarty.class.php');
include('../smarty/clases/function.class.php');
$titulo = "Index";
$smarty=new smarty;
$_findExperiencia = Functions::singleton_functions();
$_noticia = $_findExperiencia->buscarNota();



$smarty->assign("titulo", $titulo);
$smarty->assign("Noticias",$_noticia);
$smarty->display("../smarty/templates/indexPrincipal.tpl");
?>