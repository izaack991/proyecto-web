<?php 


session_start();

include("../clases/function.class.php");
$buscar = Functions::singleton_functions();

$iusuario = $_SESSION['iusuario'];
$b_postulacion = $buscar->buscar($iusuario);
if(isset($_POST['index']))
{
    $index = $_POST['index'];
    $UCerrar=$NuevoC->actualizar_status($index);
    $b_postulacion = $buscar->buscar($iusuario);
}

echo json_encode($b_postulacion);
?>