<?php
session_start();

include("../clases/save.class.php");
include("../clases/function.class.php");

$buscarcandidatos = Functions::singleton_functions();
$iusuario = $_SESSION['iusuario'];
$b_candidatos = $buscarcandidatos->buscarCandidatos($iusuario);
$NuevoC = Save::singleton_guardar();

if(isset($_POST['index']))
{
    $index = $_POST['index'];
    $UCerrar=$NuevoC->actualizar_status($index);
    $b_candidatos = $buscarcandidatos->buscarCandidatos($iusuario);
}

echo json_encode($b_candidatos);
?>