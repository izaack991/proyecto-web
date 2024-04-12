<?php
session_start();

include("../clases/save.class.php");
include("../clases/function.class.php");

$buscarpostulacion = Functions::singleton_functions();
$iusuario = $_SESSION['iusuario'];
$b_postulacion = $buscarpostulacion->buscarPostulacion($iusuario);
$NuevoC = Save::singleton_guardar();

if(isset($_POST['index']))
{
    $index = $_POST['index'];
    $UCerrar=$NuevoC->actualizar_status($index);
    $b_postulacion = $buscarpostulacion->buscarPostulacion($iusuario);
}

echo json_encode($b_postulacion);
?>