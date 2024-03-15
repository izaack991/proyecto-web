<?php
session_start();
include('../clases/function.class.php');

// Verificar si el usuario está autenticado
// if (isset($_SESSION['iusuario'])) {
//     header("location:login.php?xd=2");
//     exit; // Detener la ejecución del script después de la redirección
// }
$nuevoSingleton = Functions::singleton_functions();
$iusuario = $_SESSION['iusuario'];

$comprobarRaven = $nuevoSingleton->comprobarRaven($iusuario);
$comprobarMoss = $nuevoSingleton->comprobarMoss($iusuario);
$comprobarCleaver = $nuevoSingleton->comprobarCleaver($iusuario);
$comprobarMerril = $nuevoSingleton->comprobarMerril($iusuario);
$comprobarSjt = $nuevoSingleton->comprobarSjt($iusuario);

if(isset($_GET['vacante']))
{
    $vac = $_GET['vacante'];
    header("location:seleccionar_vacantes.php?vacante=$vac");
}
?>