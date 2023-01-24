<?php 
session_start();
if(isset($_SESSION['tiempo']) ) {
    $vida_session = time() - $_SESSION['tiempo'];
}
$_SESSION['tiempo'] = time();
include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$smarty=new smarty;
$titulo="Experiencia Laboral";
$nuevoExperiencia = save::singleton_guardar();
$_findExperiencia = Functions::singleton_functions();

if(isset($_POST['txtdescripcion']) && isset($_POST['txtempresa']) && isset($_POST['txtperiodo'])&& isset($_POST['txtlatitud'])&& isset($_POST['txtlongitud']))
{
    $_idusuario = $_SESSION['iusuario'];
    $_descripcion = $_POST['txtdescripcion'];
    $_empresa = $_POST['txtempresa'];
    $_periodo = $_POST['txtperiodo'];
    $f_idexperiencia = $_findExperiencia->consec_experiencia();
    $newExperiencia = $nuevoExperiencia->guardar_experiencia_laboral($f_idexperiencia,$_idusuario,$_descripcion,$_empresa,$_periodo);

    date_default_timezone_set('America/Mexico_City');
    $_movimiento = 'Experiencia Laboral(Guardar)';
    $_fecha = date('Y-m-d H:m:s');
    $_hora = $vida_session;
    $_latitud = $_POST['txtlatitud']; 
    $_longitud = $_POST['txtlongitud']; 
    $_ubicacion = 'Latitud: '.$_latitud.' Longitud: '.$_longitud;
    $newlogusuario = $nuevoExperiencia->guardar_log_usuario($_idusuario,$_ubicacion,$_movimiento,$_fecha,$_hora);

    $alert = "<script> alert('Se ha guardado tu experiencia correctamente!');</script>";
    echo $alert;
}

$smarty->assign("titulo",$titulo);
$smarty->display("../smarty/templates/experiencia_laboral.tpl");
?>