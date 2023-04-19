<?php
session_start();
include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$smarty=new smarty;
$titulo="Lista de Postulaciones";
if($_SESSION['iusuario'] == "")
{  
        header("location:login.php?xd=1");
}
else
{
$buscarpostulacion = Functions::singleton_functions();
$_idusuario = $_SESSION['iusuario'];
$b_postulacion = $buscarpostulacion->buscarPostulacion($_idusuario);
$nuevoSingleton = Functions::singleton_functions();
$iusuario = $_SESSION['iusuario'];
$notificacionpostulaciones = $nuevoSingleton->notificacionpostulaciones($iusuario);

$NuevoC = Save::singleton_guardar();

if(isset($_POST['btn_cerrar'])&&isset($_POST['txt_id_postulacion']))
{
    $_Status=$_POST['btn_cerrar'];
    $_Idp=$_POST['txt_id_postulacion'];
    $UCerrar=$NuevoC->actualizar_status($_Status,$_Idp);
    $b_postulacion = $buscarpostulacion->buscarPostulacion($_idusuario);

}

if($notificacionpostulaciones==1)
{
    $COUNTPOS=1;
}
else 
{
    $COUNTPOS=0;
}
$ECOUNT = $COUNTPOS;
$smarty->assign("COUNTPOS",$COUNTPOS);
$smarty->assign("ECOUNT",$ECOUNT);
$smarty->assign("titulo",$titulo);
$smarty->assign("Postulacion",$b_postulacion);
$smarty->display("../smarty/templates/postulacion.tpl");
}
?>