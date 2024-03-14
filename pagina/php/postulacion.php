<?php
include("../clases/save.class.php");
include("../clases/function.class.php");

// Verificar si el usuario está autenticado
if (isset($_SESSION['iusuario'])) {
    header("location:login.php?xd=2");
    exit; // Detener la ejecución del script después de la redirección
}

$buscarpostulacion = Functions::singleton_functions();
$iusuario = $_SESSION['iusuario'];
$b_postulacion = $buscarpostulacion->buscarPostulacion($_idusuario);
$NuevoC = Save::singleton_guardar();

if(isset($_POST['index']))
{
    $index = $_POST['index'];
    $UCerrar=$NuevoC->actualizar_status($index);
    $b_postulacion = $buscarpostulacion->buscarPostulacion($_idusuario);
}

echo json_encode($b_postulacion);
?>