<?php
session_start();

include('../templates/indexPrincipal.php');
include('../clases/function.class.php');
$titulo = "Pagina Principal Usuario";

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
    $COUNTFOR=1;
}
else 
{
    $COUNTFOR=0;
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

$COUNT = $COUNTLAB + $COUNTFOR + $COUNTAFI + $COUNTINT;

$contador = $COUNT;
$contador_exp = $COUNTLAB;
$contador_for = $COUNTFOR;
$contador_afi = $COUNTAFI;
$contador_int = $COUNTINT;

?>