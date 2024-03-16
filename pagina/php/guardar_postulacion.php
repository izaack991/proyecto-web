<?php 
session_start();
//if($_SESSION['id_vacante'])
//{
include('../clases/save.class.php');
include('../clases/function.class.php');
$nuevoUsuario = Save::singleton_guardar();

$_finduser = Functions::singleton_functions();
    $id_vacante = $_SESSION['id_vacante'];
    $resultado = $_finduser->seleccionar_vacantes($id_vacante);
    $id_usuario = $_SESSION['iusuario'];
    //$id_usuario = 123;
    $id_postulacion = $_finduser->consec_postulacion();
    $newlogusuario = $nuevoUsuario->guardar_postulacion($id_usuario,$id_vacante,$id_postulacion);
//}else{echo'no se encontro la vacante';}
header("Location: ../templates/buscar_vacantes.php");
exit();
?>