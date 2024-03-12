<?php 
session_start();
include('../clases/save.class.php');
include('../clases/function.class.php');
// include('../../smarty-master/libs/smarty.class.php');
// $smarty=new smarty;

// Verificar si el usuario está autenticado
if (isset($_SESSION['iusuario'])) {
  header("location:login.php?xd=2");
  exit; // Detener la ejecución del script después de la redirección
}
$nuevaPostulacion = save::singleton_guardar();
$_findExperiencia = Functions::singleton_functions();
$_findPais = Functions::singleton_functions();
$_vacantes1 = $_findExperiencia->buscarVacante1();
$_vacantes2 = $_findExperiencia->buscarVacante2();
$_vacantes3 = $_findExperiencia->buscarVacante3();

// $smarty->display("../smarty/templates/Buscar_vacantes.tpl");
?>