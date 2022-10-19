<?php 
session_start();
include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$smarty=new smarty;
$titulo="Experiencia Laboral";
$nuevoExperiencia = save::singleton_guardar();
$_findExperiencia = Functions::singleton_functions();

if(isset($_POST['txtdescripcion']) && isset($_POST['txtempresa']) && isset($_POST['txtperiodo']))
{
    $_idusuario = $_SESSION['iusuario'];
    $_descripcion = $_POST['txtdescripcion'];
    $_empresa = $_POST['txtempresa'];
    $_periodo = $_POST['txtperiodo'];
    $f_idexperiencia = $_findExperiencia->consec_experiencia();
    $newExperiencia = $nuevoExperiencia->guardar_experiencia_laboral($f_idexperiencia,$_idusuario,$_descripcion,$_empresa,$_periodo);
}

$smarty->assign("titulo",$titulo);
$smarty->display("../smarty/templates/experiencia_laboral.tpl");
?>