<?php 
session_start();
include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$smarty=new smarty;
$titulo="Curriculó";

// Verificar si el usuario está autenticado
if (isset($_SESSION['iusuario'])) {
    header("location:login.php?xd=1");
    exit; // Detener la ejecución del script después de la redirección
}
    $id_empresa=$_SESSION['iusuario'];
    $_finduser = Functions::singleton_functions();
    $nuevoUsuario = Save::singleton_guardar();
    $iusuario = $_SESSION['iusuario'];
    $notificacionpostulaciones = $_finduser->notificacionpostulaciones($iusuario);
    $id_usuario = 0;


if(isset($_POST['txt_id_postulacion']) && isset($_POST['txt_id_usuario']))
{
    $id_postulacion = $_POST['txt_id_postulacion']; 
    $id_usuario = $_POST['txt_id_usuario']; 
    $postulaciones = $_finduser->seleccionar_postulacion($id_postulacion);
    $experiencia = $_finduser->seleccionar_experiencia($id_usuario);
    $formacion = $_finduser->seleccionar_formacion($id_usuario);
    $aficiones = $_finduser->seleccionar_aficiones($id_usuario);
    $interes = $_finduser->seleccionar_interes($id_usuario);
}
if(isset($_POST['btntest']))
{
    $smarty->display("../smarty/templates/enviartest.tpl");
}

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
$smarty->assign("vac",$id_postulacion);
$smarty->assign("Postulacion",$postulaciones);
$smarty->assign("Experiencia",$experiencia);
$smarty->assign("Formacion",$formacion);
$smarty->assign("Aficiones",$aficiones);
$smarty->assign("Interes",$interes);
$smarty->display("../smarty/templates/seleccionar_postulacion.tpl");
?>