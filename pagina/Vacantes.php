<?php
session_start();
include('../../smarty-master/libs/smarty.class.php');
include('../smarty/clases/function.class.php');
$titulo = "Index";
$smarty=new smarty;
$smarty->assign("titulo", $titulo);
$smarty->display("../smarty/templates/Vacantes.tpl");
?>