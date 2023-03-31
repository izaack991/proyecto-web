<?php
session_start();
include('../../smarty-master/libs/smarty.class.php');
include('../smarty/clases/function.class.php');
$titulo = "Index";

$smarty=new smarty;
if($_SESSION['iusuario'] == "")
{  
        header("location:login.php");
}
else
{
$nuevoSingleton = Functions::singleton_functions();
$iusuario = $_SESSION['iusuario'];
$notificacionexperiencia = $nuevoSingleton->notificacionexperiencia($iusuario);
$notificacionformacion = $nuevoSingleton->notificacionformacion($iusuario);
$notificacionaficiones = $nuevoSingleton->notificacionaficiones($iusuario);
$notificacioninteres = $nuevoSingleton->notificacioninteres($iusuario);
// $notificacionvacantes = $nuevoSingleton->notificacionvacantes($iusuario);

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
// if($notificacionvacantes==0)
// {
//     $COUNTBUS=1;
// }
// else 
// {
//     $COUNTBUS=0;
// }
$COUNT = $COUNTLAB + $COUNFOR + $COUNTAFI + $COUNTINT;
$smarty->assign("titulo", $titulo);
$smarty->assign("COUNTLAB",$COUNTLAB);
$smarty->assign("COUNFOR",$COUNFOR);
$smarty->assign("COUNTAFI",$COUNTAFI);
$smarty->assign("COUNTINT",$COUNTINT);
$smarty->assign("COUNT",$COUNT);
$smarty->assign("iusuario",$iusuario);
$smarty->display("../smarty/templates/reenvio.tpl");

}
?>