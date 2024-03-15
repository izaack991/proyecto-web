<?php
session_start();
include('../clases/function.class.php');

$nuevoSingleton = Functions::singleton_functions();
$iusuario = $_SESSION['iusuario'];
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
echo $ECOUNT;