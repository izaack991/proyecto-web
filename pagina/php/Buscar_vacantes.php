<?php 
session_start();
include('../clases/save.class.php');
include('../clases/function.class.php');

$_idusuario = $_SESSION['iusuario'];

$nuevaPostulacion = save::singleton_guardar();
$_findExperiencia = Functions::singleton_functions();
$_findPais = Functions::singleton_functions();
$_vacantes1 = $_findExperiencia->buscarVacante($_idusuario);

echo json_encode($_vacantes1);
?>