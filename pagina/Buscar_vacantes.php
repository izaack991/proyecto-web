<?php 
session_start();
include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$smarty=new smarty;
$titulo="Lista de vacantes";
if($_SESSION['iusuario'] == "")
{  
        header("location:login.php");
}
else
{
$nuevaPostulacion = save::singleton_guardar();
$_findExperiencia = Functions::singleton_functions();
$_findPais = Functions::singleton_functions();
$_vacantes1 = $_findExperiencia->buscarVacante1();
$_vacantes2 = $_findExperiencia->buscarVacante2();
$_vacantes3 = $_findExperiencia->buscarVacante3();

$smarty->assign("Vacantes1",$_vacantes1);
$smarty->assign("Vacantes2",$_vacantes2);
$smarty->assign("Vacantes3",$_vacantes3);
$smarty->assign("titulo",$titulo);
$smarty->display("../smarty/templates/Buscar_vacantes.tpl");}
?>