<?php
include('../smarty/clases/function.class.php');
$_findExperiencia = Functions::singleton_functions();
$_vacantes1 = $_findExperiencia->ajax_vacante();

foreach($_vacantes1 as $index => $value){
    $nombrePais  = $value['nombrePais'];
}
$json = json_encode($_vacantes1);

echo $json;
?>