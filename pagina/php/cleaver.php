<?php 
session_start();
include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$titulo="Test Cleaver";
$smarty=new smarty;

// Verificar si el usuario está autenticado
if (isset($_SESSION['iusuario'])) {
    header("location:login.php?xd=2");
    exit; // Detener la ejecución del script después de la redirección
  }

$_finduser = Functions::singleton_functions();
$_idusuario = $_SESSION['iusuario'];
$validacion = $_finduser->val_cleaver($_idusuario);
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
        header("location:reenvio.php");
    }
    else{
$guardarrespuestas = save::singleton_guardar();

if(isset($_POST['resp1']) && isset($_POST['resp2']))
{
    $id_usuario = $_SESSION['iusuario'];
    $p1_resp_pos = $_POST['resp1']; 
    $p1_resp_neg = $_POST['resp2'];
    $p2_resp_pos = $_POST['resp3']; 
    $p2_resp_neg = $_POST['resp4'];
    $p3_resp_pos = $_POST['resp5']; 
    $p3_resp_neg = $_POST['resp6'];
    $p4_resp_pos = $_POST['resp7']; 
    $p4_resp_neg = $_POST['resp8'];
    $p5_resp_pos = $_POST['resp9']; 
    $p5_resp_neg = $_POST['resp10'];
    $p6_resp_pos = $_POST['resp11']; 
    $p6_resp_neg = $_POST['resp12'];
    $p7_resp_pos = $_POST['resp13']; 
    $p7_resp_neg = $_POST['resp14'];
    $p8_resp_pos = $_POST['resp15']; 
    $p8_resp_neg = $_POST['resp16'];
    $p9_resp_pos = $_POST['resp17']; 
    $p9_resp_neg = $_POST['resp18'];
    $p10_resp_pos = $_POST['resp19']; 
    $p10_resp_neg = $_POST['resp20'];
    $p11_resp_pos = $_POST['resp21']; 
    $p11_resp_neg = $_POST['resp22'];
    $p12_resp_pos = $_POST['resp23']; 
    $p12_resp_neg = $_POST['resp24'];
    $p13_resp_pos = $_POST['resp25']; 
    $p13_resp_neg = $_POST['resp26'];
    $p14_resp_pos = $_POST['resp27']; 
    $p14_resp_neg = $_POST['resp28'];
    $p15_resp_pos = $_POST['resp29']; 
    $p15_resp_neg = $_POST['resp30'];
    $p16_resp_pos = $_POST['resp31']; 
    $p16_resp_neg = $_POST['resp32'];
    $p17_resp_pos = $_POST['resp33']; 
    $p17_resp_neg = $_POST['resp34'];
    $p18_resp_pos = $_POST['resp35']; 
    $p18_resp_neg = $_POST['resp36'];
    $p19_resp_pos = $_POST['resp37']; 
    $p19_resp_neg = $_POST['resp38'];
    $p20_resp_pos = $_POST['resp39']; 
    $p20_resp_neg = $_POST['resp40'];
    $p21_resp_pos = $_POST['resp41']; 
    $p21_resp_neg = $_POST['resp42'];
    $p22_resp_pos = $_POST['resp43']; 
    $p22_resp_neg = $_POST['resp44'];
    $p23_resp_pos = $_POST['resp45']; 
    $p23_resp_neg = $_POST['resp46'];
    $p24_resp_pos = $_POST['resp47']; 
    $p24_resp_neg = $_POST['resp48'];
    $p25_resp_pos = $_POST['resp49']; 
    $p25_resp_neg = $_POST['resp50'];
    $resp = $guardarrespuestas->guardar_respuestas($id_usuario,$p1_resp_pos,$p1_resp_neg,$p2_resp_pos,$p2_resp_neg,$p3_resp_pos,
    $p3_resp_neg,$p4_resp_pos,$p4_resp_neg,$p5_resp_pos,$p5_resp_neg,$p6_resp_pos,$p6_resp_neg,$p7_resp_pos,$p7_resp_neg,$p8_resp_pos,
    $p8_resp_neg,$p9_resp_pos,$p9_resp_neg,$p10_resp_pos,$p10_resp_neg,$p11_resp_pos,$p11_resp_neg,$p12_resp_pos,$p12_resp_neg,
    $p13_resp_pos,$p13_resp_neg,$p14_resp_pos,$p14_resp_neg,$p15_resp_pos,$p15_resp_neg,$p16_resp_pos,$p16_resp_neg,$p17_resp_pos,
    $p17_resp_neg,$p18_resp_pos,$p18_resp_neg,$p19_resp_pos,$p19_resp_neg,$p20_resp_pos,$p20_resp_neg,$p21_resp_pos,$p21_resp_neg,
    $p22_resp_pos,$p22_resp_neg,$p23_resp_pos,$p23_resp_neg,$p24_resp_pos,$p24_resp_neg,$p25_resp_pos,$p25_resp_neg);
}
$smarty->assign("COUNTLAB",$COUNTLAB);
$smarty->assign("COUNFOR",$COUNFOR);
$smarty->assign("COUNTAFI",$COUNTAFI);
$smarty->assign("COUNTINT",$COUNTINT);
$smarty->assign("COUNT",$COUNT);
$smarty->assign("titulo",$titulo);
$smarty->display("../smarty/templates/cleaver.tpl");}}
?>