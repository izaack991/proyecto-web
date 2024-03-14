<?php 
session_start();
include('../clases/save.class.php');
include('../clases/function.class.php');



// Verificar si el usuario está autenticado
// if (isset($_SESSION['iusuario'])) {
//   header("location:login.php?xd=2");
//   exit; // Detener la ejecución del script después de la redirección
// }

$nuevaPostulacion = save::singleton_guardar();
$_findExperiencia = Functions::singleton_functions();
$_findPais = Functions::singleton_functions();
$_vacantes1 = $_findExperiencia->buscarVacante();



//print_r($_vacantes1);
echo json_encode($_vacantes1);
?>