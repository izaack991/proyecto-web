<?php
session_start();
include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$titulo = "Test SJT";
$smarty=new smarty;

// Verificar si el usuario está autenticado
if (isset($_SESSION['iusuario'])) {
    header("location:login.php?xd=2");
    exit; // Detener la ejecución del script después de la redirección
}

$_finduser = Functions::singleton_functions();
$_idusuario = $_SESSION['iusuario'];
$validacion = $_finduser->val_sjt($_idusuario);
$iusuario = $_SESSION['iusuario'];
$notificacionexperiencia = $_finduser->notificacionexperiencia($iusuario);
$notificacionformacion = $_finduser->notificacionformacion($iusuario);
$notificacionaficiones = $_finduser->notificacionaficiones($iusuario);
$notificacioninteres = $_finduser->notificacioninteres($iusuario);
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
if($_SESSION['iusuario'] == "")
{  
        header("location:login.php?xd=2");
}
else
{
    if($validacion == TRUE)
    {
        header("location:reenvio.php?xd=2");
    }
    else{
$nuevasRespuestas = Save::singleton_guardar();

if (isset($_POST['btnfinalizar']))
{
    $_idusuario = $_SESSION['iusuario'];
    $preg1 = $_POST["preg1"];
    $preg2 = $_POST["preg2"];
    $preg3 = $_POST["preg3"];
    $preg4 = $_POST["preg4"];
    $preg5 = $_POST["preg5"];
    $preg6 = $_POST["preg6"];
    $preg7 = $_POST["preg7"];
    $preg8 = $_POST["preg8"];
    $preg9 = $_POST["preg9"];
    $preg10 = $_POST["preg10"];
    $preg11 = $_POST["preg11"];
    $preg12 = $_POST["preg12"];

    $nuevasrespuestas = $nuevasRespuestas->guardar_respuestasSJT($_idusuario,$preg1,$preg2,$preg3,$preg4,$preg5,$preg6,$preg7,$preg8,$preg9,$preg10,$preg11,$preg12);
    header("location:indexPrincipal.php");
}

$smarty->assign("COUNTLAB",$COUNTLAB);
$smarty->assign("COUNFOR",$COUNFOR);
$smarty->assign("COUNTAFI",$COUNTAFI);
$smarty->assign("COUNTINT",$COUNTINT);
$smarty->assign("COUNT",$COUNT);
$smarty->assign("titulo", $titulo);
$smarty->display("../smarty/templates/test_sjt.tpl");
}}
?>