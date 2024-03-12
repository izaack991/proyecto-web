<?php
session_start();
include('../clases/save.class.php');
include('../clases/function.class.php');
// include('../../smarty-master/libs/smarty.class.php');

// Verificar si el usuario está autenticado
if (isset($_SESSION['iusuario'])) {
    header("location:login.php?xd=1");
    exit; // Detener la ejecución del script después de la redirección
}

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

// $smarty->display("../smarty/templates/postulacion.tpl");
?>