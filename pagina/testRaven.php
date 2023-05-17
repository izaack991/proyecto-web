<?php
session_start();
include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$titulo = "Test Raven";
$smarty=new smarty;
$_finduser = Functions::singleton_functions();
$_idusuario = $_SESSION['iusuario'];
$validacion = $_finduser->val_raven($_idusuario);
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
        header("location:login.php");
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
    $preg31 = $_POST["preg31"];
    $preg32 = $_POST["preg32"];
    $preg33 = $_POST["preg33"];
    $preg34 = $_POST["preg34"];
    $preg35 = $_POST["preg35"];
    $preg36 = $_POST["preg36"];
    $preg37 = $_POST["preg37"];
    $preg38 = $_POST["preg38"];
    $preg39 = $_POST["preg39"];
    $preg40 = $_POST["preg40"];
    $preg41 = $_POST["preg41"];
    $preg42 = $_POST["preg42"];
    $preg43 = $_POST["preg43"];
    $preg44 = $_POST["preg44"];
    $preg45 = $_POST["preg45"];
    $preg46 = $_POST["preg46"];
    $preg47 = $_POST["preg47"];
    $preg48 = $_POST["preg48"];
    $preg49 = $_POST["preg49"];
    $preg50 = $_POST["preg50"];
    $preg51 = $_POST["preg51"];
    $preg52 = $_POST["preg52"];
    $preg53 = $_POST["preg53"];
    $preg54 = $_POST["preg54"];
    $preg55 = $_POST["preg55"];
    $preg56 = $_POST["preg56"];
    $preg57 = $_POST["preg57"];
    $preg58 = $_POST["preg58"];
    $preg59 = $_POST["preg59"];
    $preg60 = $_POST["preg60"];
    $nuevasrespuestas = $nuevasRespuestas->guardar_respuestasRAVEN($_idusuario,$preg1,$preg2,$preg3,$preg4,$preg5,$preg6,$preg7,$preg8,$preg9,$preg10,$preg11,$preg12,$preg13,$preg14,$preg15,$preg16,$preg17,$preg18,$preg19,$preg20,$preg21,$preg22,$preg23,$preg24,$preg25,$preg26,$preg27,$preg28,$preg29,$preg30,$preg31,$preg32,$preg33,$preg34,$preg35,$preg36,$preg37,$preg38,$preg39,$preg40,$preg41,$preg42,$preg43,$preg44,$preg45,$preg46,$preg47,$preg48,$preg49,$preg50,$preg51,$preg52,$preg53,$preg54,$preg55,$preg56,$preg57,$preg58,$preg59,$preg60);
}
$smarty->assign("COUNTLAB",$COUNTLAB);
$smarty->assign("COUNFOR",$COUNFOR);
$smarty->assign("COUNTAFI",$COUNTAFI);
$smarty->assign("COUNTINT",$COUNTINT);
$smarty->assign("COUNT",$COUNT);

$smarty->assign("titulo", $titulo);
$smarty->display("../smarty/templates/testRaven.tpl");
}}
?>