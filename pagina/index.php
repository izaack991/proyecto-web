<?php
session_start();
include('../../smarty-master/libs/smarty.class.php');
$titulo = "Index";
$smarty=new smarty;
$smarty->assign("titulo", $titulo);
$smarty->display("../smarty/templates/index.tpl");
?>