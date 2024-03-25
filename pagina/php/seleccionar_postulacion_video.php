<?php 
include('../clases/save.class.php');
include('../clases/function.class.php');

// Verificar si el usuario está autenticado
if (isset($_SESSION['iusuario'])) {
    header("location:login.php?xd=1");
    exit; // Detener la ejecución del script después de la redirección
}

$_finduser = Functions::singleton_functions();
    

if(isset($_GET['id_postulacion']) && isset($_GET['id_usuario'])) {
    // Obtener los valores de los parámetros
    $id_postulacion = $_GET['id_postulacion'];
    $id_usuario = $_GET['id_usuario'];
    $postulaciones = $_finduser->seleccionar_postulacion($id_postulacion);
    $vid_curriculum = $_finduser->seleccionar_vid_curriculum($id_usuario);
    $datos_totales = array(
        'postulaciones' => $postulaciones,
        'video_curriculum' => $vid_curriculum,
        'id_postulacion' => $id_postulacion,
        'id_usuario' => $id_usuario,
    );
}
// if(isset($_POST['btntest']))
// {
//     $smarty->display("../smarty/templates/enviartest.tpl");
// }

// if($notificacionpostulaciones>=1)
// {
//     $COUNTPOS=$notificacionpostulaciones;
// }
// else 
// {
//     $COUNTPOS=0;
// }

// $ECOUNT = $COUNTPOS;

echo json_encode($datos_totales);

?>