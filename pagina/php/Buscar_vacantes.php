<?php 
session_start();
include('../clases/save.class.php');
include('../clases/function.class.php');

$nuevaPostulacion = save::singleton_guardar();
$_findExperiencia = Functions::singleton_functions();
$_findPais = Functions::singleton_functions();
$_vacantes1 = $_findExperiencia->buscarVacante();

echo json_encode($_vacantes1);
?>