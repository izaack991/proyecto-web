<?php 
session_start();
include('../clases/save.class.php');
include('../clases/function.class.php');

// include('../../smarty-master/libs/smarty.class.php');
// $smarty=new smarty;

// Verificar si el usuario está autenticado
if (isset($_SESSION['iusuario'])) {
    header("location:login.php?xd=2");
    exit; // Detener la ejecución del script después de la redirección
}
$_finduser = Functions::singleton_functions();
$nuevoUsuario = Save::singleton_guardar();
$alerta = '';
$nuevoSingleton = Functions::singleton_functions();
$iusuario = $_SESSION['iusuario'];
$notificacionexperiencia = $nuevoSingleton->notificacionexperiencia($iusuario);
$notificacionformacion = $nuevoSingleton->notificacionformacion($iusuario);
$notificacionaficiones = $nuevoSingleton->notificacionaficiones($iusuario);
$notificacioninteres = $nuevoSingleton->notificacioninteres($iusuario);

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

if(isset($_POST['txt_id_vacante'])||$_GET['vacante'])
{
    if($_GET['vacante'])
    {
        $id_vacante = $_GET['vacante']; 
    }
    else
    {
        $id_vacante = $_POST['txt_id_vacante']; 
    }
    $vacantes = $_finduser->seleccionar_vacantes($id_vacante);
}

if(isset($_POST['id_vacante']))
{
    $id_vacante = $_POST['id_vacante'];
    $vacantes = $_finduser->seleccionar_vacantes($id_vacante);
    $id_usuario = $_SESSION['iusuario'];
    $id_postulacion = $_finduser->consec_postulacion();
    $newlogusuario = $nuevoUsuario->guardar_postulacion($id_usuario,$id_vacante,$id_postulacion);
    $alerta = "<script>swal({
		title: '',
		text: 'Se guardo correctamente tu postulación',
		type: 'success',
	  });</script>";

    //   $smarty->assign("vacantes",$vacantes);
    //   $smarty->assign("alerta",$alerta);
      header("location:buscar_vacantes.php");
      
}
else{

// $smarty->display("../smarty/templates/seleccionar_vacantes.tpl");
}
?>