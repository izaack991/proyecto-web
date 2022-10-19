<?php
session_start();
include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$smarty=new smarty;
$titulo="Proyecto Web";
$nuevoUsuario = Save::singleton_guardar();
$_findUser = Functions::singleton_functions();
if(isset($_POST['id_usuario'])&&isset($_POST['descripcion']))
{
	$_id_usuario = $_SESSION['isuario'];
    $_descripcion = $_POST['descripcion'];
	$newuser = $nuevoUsuario->Guardar_id_pasatiempo($_id_usuario,$_descripcion);
}
$smarty ->assign("titulo",$titulo);
$smarty->display("../smarty/templates/Aficiones.tpl"); 
?>