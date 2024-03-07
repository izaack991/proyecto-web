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
$titulo="Proyecto Web";
if($_SESSION['iusuario'] == "")
{  
        header("location:login.php?xd=2");
}
else
{
$nuevoUsuario = Save::singleton_guardar();
$_findUser = Functions::singleton_functions();
$buscarAficion = Functions::singleton_functions();
$nuevoSingleton = Functions::singleton_functions();
$iusuario = $_SESSION['iusuario'];
$notificacionexperiencia = $nuevoSingleton->notificacionexperiencia($iusuario);
$notificacionformacion = $nuevoSingleton->notificacionformacion($iusuario);
$notificacionaficiones = $nuevoSingleton->notificacionaficiones($iusuario);
$notificacioninteres = $nuevoSingleton->notificacioninteres($iusuario);
$alerta = '';
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
$alerta = '';
if(isset($_POST['txtdesc'])&& isset($_POST['txtlatitud'])&& isset($_POST['txtlongitud']))
{
	$_idusuario = $_SESSION['iusuario'];
    $_descripcion = $_POST['txtdesc'];

    $aut_aficion = $buscarAficion->verif_aficion($_idusuario, $_descripcion);

    if ($aut_aficion == TRUE)
    {
	$f_id_Pasatiempo = $_findUser->consec_pasatiempo();
	$newuser = $nuevoUsuario->Guardar_id_pasatiempo($f_id_Pasatiempo,$_idusuario,$_descripcion);
    
	date_default_timezone_set('America/Mexico_City');
    $_movimiento = 'Aficiones(Guardar)';
    $_fecha = date('Y-m-d H:m:s');
    $_hora = $vida_session;
    $_latitud = $_POST['txtlatitud']; 
    $_longitud = $_POST['txtlongitud']; 
    $_ubicacion = 'Latitud: '.$_latitud.' Longitud: '.$_longitud;
    $newlogusuario = $nuevoUsuario->guardar_log_usuario($_idusuario,$_ubicacion,$_movimiento,$_fecha,$_hora);

    $alerta = "<script>swal({
        title: '',
        text: 'Se ha guardado tu experiencia laboral correctamente!',
        type: 'success',
      }).then(function() {
        window.location.href = 'indexPrincipal.php';
      });</script>";
      
      $smarty->assign("COUNTLAB",$COUNTLAB);
      $smarty->assign("COUNFOR",$COUNFOR);
      $smarty->assign("COUNTAFI",$COUNTAFI);
      $smarty->assign("COUNTINT",$COUNTINT);
      $smarty->assign("COUNT",$COUNT);
      $smarty->assign("iusuario",$iusuario);
      $smarty->assign("titulo",$titulo);
      $smarty->assign("alerta",$alerta);
	$smarty->assign("titulo",$titulo);
	$smarty->assign("alerta",$alerta);
	$smarty->display("../smarty/templates/Aficiones.tpl");
    }
    else {
        $alerta = "<script>swal({
            title: '',
            text: 'Esa aficion ya se encuentra registrada',
            type: 'success',
          });</script>";

          $smarty->assign("COUNTLAB",$COUNTLAB);
          $smarty->assign("COUNFOR",$COUNFOR);
          $smarty->assign("COUNTAFI",$COUNTAFI);
          $smarty->assign("COUNTINT",$COUNTINT);
          $smarty->assign("COUNT",$COUNT);
          $smarty->assign("iusuario",$iusuario);
          $smarty->assign("titulo",$titulo);
          $smarty->assign("alerta",$alerta);
        $smarty->display("../smarty/templates/Aficiones.tpl");
    }
}
else{
    $smarty->assign("COUNTLAB",$COUNTLAB);
    $smarty->assign("COUNFOR",$COUNFOR);
    $smarty->assign("COUNTAFI",$COUNTAFI);
    $smarty->assign("COUNTINT",$COUNTINT);
    $smarty->assign("COUNT",$COUNT);
    $smarty->assign("iusuario",$iusuario);
	$smarty->assign("titulo",$titulo);
    $smarty->assign("alerta",$alerta);
    $smarty->display("../smarty/templates/Aficiones.tpl"); 
}}
?>