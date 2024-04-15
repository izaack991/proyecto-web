<?php
session_start();
include('../clases/function.class.php');

$nuevoSingleton = Functions::singleton_functions();
$iusuario = $_SESSION['iusuario'];
$nombreUsuario = $_SESSION['nomusuario'];
$notificacionpostulaciones = $nuevoSingleton->notificacionpostulaciones($iusuario);

if($notificacionpostulaciones>=1)
{
    $COUNTPOS=$notificacionpostulaciones;
}
else 
{
    $COUNTPOS=0;
}

$ECOUNT = $COUNTPOS;
$contador = $ECOUNT;

echo json_encode(array(
    'contador' => $contador,
    'nombreUsuario' => $nombreUsuario
));
?>