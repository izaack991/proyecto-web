<?php
session_start();
include('../clases/function.class.php');

// Verificar si el usuario está autenticado
if (isset($_SESSION['iusuario'])) {
    header("location:login.php?xd=1");
    exit; // Detener la ejecución del script después de la redirección
}

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



$ECOUNT = 2;

echo $ECOUNT;