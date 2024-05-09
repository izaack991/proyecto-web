<?php 
error_reporting(0);
session_start();
if(isset($_SESSION['tiempo'])) {
    $vida_session=time() - $_SESSION['tiempo'];
}

$_SESSION['tiempo']=time();
include('../clases/save.class.php');
include('../clases/function.class.php');

$_idusuario = $_SESSION['iusuario'];

$buscarDatos = Functions::singleton_functions();
$NuevoLog = Save::singleton_guardar();

if(isset($_POST['id_vacante']))
{
    $id_vacante = $_POST['id_vacante'];
    $resultado = $buscarDatos->seleccionar_vacantes($id_vacante);
        
    date_default_timezone_set('America/Mexico_City');
    $_fecha=date('Y-m-d H:m:s');
    $_hora=$vida_session;
    $_latitud=$_POST['latitud'];
    $_longitud=$_POST['longitud'];
    $_ubicacion=$_latitud.', '.$_longitud;
    $_tipo='1';
    foreach ($resultado as $row) {
        $_movimiento=$row['puesto'];
    }
    
    $newlogusuario=$NuevoLog->guardar_log_usuario($_idusuario, $_ubicacion, $_movimiento, $_fecha, $_hora,$_tipo);
    echo 'Se guardo correctamente el log_usuario';
}else {
    echo 'No se recibio la id_vacante';
}

?>