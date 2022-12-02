<?php 
session_start();
include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$smarty=new smarty;
$titulo="Postulacion";
$_finduser = Functions::singleton_functions();
$nuevoUsuario = Save::singleton_guardar();


if(isset($_POST['txt_id_postulacion']) && isset($_POST['txt_id_usuario']))
{
    $id_postulacion = $_POST['txt_id_postulacion']; 
    $id_usuario = $_POST['txt_id_usuario']; 
    $postulaciones = $_finduser->seleccionar_postulacion($id_postulacion);
    $experiencia = $_finduser->seleccionar_experiencia($id_usuario);
    $formacion = $_finduser->seleccionar_formacion($id_usuario);
    $aficiones = $_finduser->seleccionar_aficiones($id_usuario);
    $interes = $_finduser->seleccionar_interes($id_usuario);
}

$smarty->assign("Postulacion",$postulaciones);
$smarty->assign("Experiencia",$experiencia);
$smarty->assign("Formacion",$formacion);
$smarty->assign("Aficiones",$aficiones);
$smarty->assign("Interes",$interes);
$smarty->display("../smarty/templates/seleccionar_postulacion.tpl");
?>