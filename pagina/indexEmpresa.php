<?php
session_start();
include('../../smarty-master/libs/smarty.class.php');
include('../smarty/clases/function.class.php');
$titulo = "Index";

// Verificar si el usuario está autenticado
if (isset($_SESSION['iusuario'])) {
    header("location:login.php?xd=1");
    exit; // Detener la ejecución del script después de la redirección
}

$smarty=new smarty;
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
$smarty->assign("COUNTPOS",$COUNTPOS);
$smarty->assign("ECOUNT",$ECOUNT);
$smarty->assign("titulo", $titulo);
$smarty->display("../smarty/templates/indexEmpresa.tpl");
?>