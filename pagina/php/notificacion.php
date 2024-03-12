<?php
include('../clases/function.class.php');

$nuevoSingleton = Functions::singleton_functions();
$iusuario = 2;
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