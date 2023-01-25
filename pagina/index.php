<?php
session_start();
include('../../smarty-master/libs/smarty.class.php');
$titulo = "Index";
$smarty=new smarty;

if(isset($_GET['vacante']))
{
    $vac = $_GET['vacante'];
    header("location:seleccionar_vacantes.php?vacante=$vac");
}

$smarty->assign("titulo", $titulo);
$smarty->display("../smarty/templates/index.tpl");
?>