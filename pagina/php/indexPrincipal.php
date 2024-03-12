<?php
session_start();
// include('../../smarty-master/libs/smarty.class.php');
include('../clases/function.class.php');
$titulo = "Pagina Principal Usuario";

// $smarty=new smarty;

// Verificar si el usuario está autenticado
if (isset($_SESSION['iusuario'])) {
    header("location:login.php?xd=2");
    exit; // Detener la ejecución del script después de la redirección
}
$nuevoSingleton = Functions::singleton_functions();
$iusuario = $_SESSION['iusuario'];
$notificacionexperiencia = $nuevoSingleton->notificacionexperiencia($iusuario);
$notificacionformacion = $nuevoSingleton->notificacionformacion($iusuario);
$notificacionaficiones = $nuevoSingleton->notificacionaficiones($iusuario);
$notificacioninteres = $nuevoSingleton->notificacioninteres($iusuario);

if(isset($_GET['vacante']))
{
    $vac = $_GET['vacante'];
    header("location:seleccionar_vacantes.php?vacante=$vac");
}
if($notificacionexperiencia==0)
{
    $COUNTLAB=1;

}
else 
{
    $COUNTLAB=0;
}
if($notificacionformacion==0)
{
    $COUNFOR=1;
}
else 
{
    $COUNFOR=0;
}
if($notificacionaficiones==0)
{
    $COUNTAFI=1;
}
else 
{
    $COUNTAFI=0;
}
if($notificacioninteres==0)
{
    $COUNTINT=1;
}
else 
{
    $COUNTINT=0;
}

$COUNT = $COUNTLAB + $COUNFOR + $COUNTAFI + $COUNTINT;
?>