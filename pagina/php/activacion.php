<?php
session_start();

include("../clases/save.class.php");
include("../clases/function.class.php");

// // Verificar si el usuario está autenticado
// if (isset($_SESSION['iusuario'])) {
//     header("location:login.php?xd=2");
//     exit; // Detener la ejecución del script después de la redirección
// }

$buscarempresa = Functions::singleton_functions();
$iusuario = $_SESSION['iusuario'];
$b_empresa = $buscarempresa->buscarEmpresa();
$activarempresa = Save::singleton_guardar();

if(isset($_POST['index']))
{
    $index = $_POST['index'];
    $activar_emp=$activarempresa->actualizar_status_empresa($index);
    $b_empresa = $buscarempresa->buscarEmpresa();
}

echo json_encode($b_empresa);
?>