<?php
error_reporting(0);
session_start();

if(isset($_SESSION['tiempo'])) {
    $vida_session=time() - $_SESSION['tiempo'];
}

$_SESSION['tiempo']=time();
include('../clases/save.class.php');
include('../clases/function.class.php');

$nuevoUsuario=Save::singleton_guardar();
$_findUser=Functions::singleton_functions();
$buscarAficion=Functions::singleton_functions();
$nuevoSingleton=Functions::singleton_functions();
$iusuario=$_SESSION['iusuario'];

if(isset($_POST['txtdesc'])&& isset($_POST['txtlatitud'])&& isset($_POST['txtlongitud'])) {
    $_idusuario=$_SESSION['iusuario'];
    $_descripcion=$_POST['txtdesc'];

    $aut_aficion=$buscarAficion->verif_aficion($_idusuario, $_descripcion);

    if ($aut_aficion==TRUE) {
        $f_id_Pasatiempo=$_findUser->consec_pasatiempo();
        $newuser=$nuevoUsuario->Guardar_id_pasatiempo($f_id_Pasatiempo, $_idusuario, $_descripcion);

        date_default_timezone_set('America/Mexico_City');
        $_movimiento='Aficiones(Guardar)';
        $_fecha=date('Y-m-d H:m:s');
        $_hora=$vida_session;
        $_latitud=$_POST['txtlatitud'];
        $_longitud=$_POST['txtlongitud'];
        $_ubicacion = $_latitud.' ,: '.$_longitud;
        $newlogusuario=$nuevoUsuario->guardar_log_usuario($_idusuario, $_ubicacion, $_movimiento, $_fecha, $_hora);

        if($newuser==true) {
            echo "true";
        }
    } else {
      echo "errorDuplicado";
    }
}
else {
    echo "errorSave";
}

?>