<?php 
session_start();
include("../clases/function.class.php");
$buscar = Functions::singleton_functions();

$id_usuario2 = $_SESSION['iusuario'];
$id_usuario1 = 2;
$conversacion = $buscar->buscarMensaje($id_usuario1 = 2,$id_usuario2);
//print_r($conversacion);
// Imprimir la respuesta JSON después de obtenerla
echo json_encode($conversacion);
?>
