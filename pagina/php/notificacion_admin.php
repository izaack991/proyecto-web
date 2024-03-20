<?php
session_start();
include('../clases/function.class.php');

$nuevoSingleton = Functions::singleton_functions();
$iusuario = $_SESSION['iusuario'];
$nombreUsuario = 'Administrador';
$notificacionempresa = $nuevoSingleton->notificacionempresa();

if($notificacionempresa>=1)
{
    $COUNTEMP=$notificacionempresa;
}
else 
{
    $COUNTEMP=0;
}

$ECOUNT = $COUNTEMP;
$contador = $ECOUNT;

echo json_encode(array(
    'contador' => $contador,
    'nombreUsuario' => $nombreUsuario
));
?>