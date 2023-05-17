<?php
session_start();
include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$titulo = "Text MOSS";
$_finduser = Functions::singleton_functions();
$_idusuario = $_SESSION['iusuario'];
$validacion = $_finduser->val_moss($_idusuario);
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
$smarty=new smarty;
if($_SESSION['iusuario'] == "")
{  
        header("location:login.php?xd=2");
}
else
{
    if($validacion == TRUE)
    {
        header("location:reenvio.php");
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
    $preg13 = $_POST["preg13"];
    $preg14 = $_POST["preg14"];
    $preg15 = $_POST["preg15"];
    $preg16 = $_POST["preg16"];
    $preg17 = $_POST["preg17"];
    $preg18 = $_POST["preg18"];
    $preg19 = $_POST["preg19"];
    $preg20 = $_POST["preg20"];
    $preg21 = $_POST["preg21"];
    $preg22 = $_POST["preg22"];
    $preg23 = $_POST["preg23"];
    $preg24 = $_POST["preg24"];
    $preg25 = $_POST["preg25"];
    $preg26 = $_POST["preg26"];
    $preg27 = $_POST["preg27"];
    $preg28 = $_POST["preg28"];
    $preg29 = $_POST["preg29"];
    $preg30 = $_POST["preg30"];
    $nuevasrespuestas = $nuevasRespuestas->guardar_respuestasMOSS($_idusuario,$preg1,$preg2,$preg3,$preg4,$preg5,$preg6,$preg7,$preg8,$preg9,$preg10,$preg11,$preg12,$preg13,$preg14,$preg15,$preg16,$preg17,$preg18,$preg19,$preg20,$preg21,$preg22,$preg23,$preg24,$preg25,$preg26,$preg27,$preg28,$preg29,$preg30);
    header("location:indexPrincipal.php");
}

$smarty->assign("COUNTLAB",$COUNTLAB);
$smarty->assign("COUNFOR",$COUNFOR);
$smarty->assign("COUNTAFI",$COUNTAFI);
$smarty->assign("COUNTINT",$COUNTINT);
$smarty->assign("COUNT",$COUNT);
$smarty->assign("titulo", $titulo);
$smarty->display("../smarty/templates/test_moss.tpl");}}
?>