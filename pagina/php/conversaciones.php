<?php 
session_start();
include("../clases/function.class.php");
$buscar = Functions::singleton_functions();

$id_usuario = $_SESSION['iusuario'];

$conversacion = $buscar->buscarConversacion($id_usuario);

// Imprimir la respuesta JSON después de obtenerla
echo json_encode($conversacion);
?>
