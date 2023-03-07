<?php
session_start();
include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$titulo = "Index";
$smarty=new smarty;
$nuevasRespuestas = Save::singleton_guardar();
$smarty->assign("titulo", $titulo);
$smarty->display("../smarty/templates/enviartest.tpl");
?>