<?php 
error_reporting(0);
session_start();
include('../clases/save.class.php');
include('../clases/function.class.php');

$_finduser = Functions::singleton_functions();

if(isset($_POST['id_vacante']))
{
    $id_vacante = $_POST['id_vacante'];
    $_SESSION['id_vacante'] = $id_vacante;
    $resultado = $_finduser->seleccionar_vacantes($id_vacante);
    echo json_encode($resultado);
}

?>