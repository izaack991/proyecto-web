<?php
session_start();
include('../clases/function.class.php');

// // Verificar si el usuario está autenticado
// if (isset($_SESSION['iusuario'])) {
//     header("location:login.php?xd=3");
//     exit; // Detener la ejecución del script después de la redirección
// }

$nuevoSingleton = Functions::singleton_functions();
$iusuario = $_SESSION['iusuario'];
$total_usuarios = $nuevoSingleton->total_usuarios();
$total_empresas = $nuevoSingleton->total_empresas();

echo json_encode(array(
    'total_usuarios' => $total_usuarios,
    'total_empresas' => $total_empresas
));