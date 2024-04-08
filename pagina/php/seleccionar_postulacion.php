<?php 
include('../clases/save.class.php');
include('../clases/function.class.php');

$_finduser = Functions::singleton_functions();
    
if(isset($_GET['id_postulacion']) && isset($_GET['id_usuario'])) {
    // Obtener los valores de los parámetros
    $id_postulacion = $_GET['id_postulacion'];
    $id_usuario = $_GET['id_usuario'];
    $postulaciones = $_finduser->seleccionar_postulacion($id_postulacion);
    $experiencia = $_finduser->seleccionar_experiencia($id_usuario);
    $formacion = $_finduser->seleccionar_formacion($id_usuario);
    $aficion = $_finduser->seleccionar_aficiones($id_usuario);
    $interes = $_finduser->seleccionar_interes($id_usuario);
    $datos_totales = array(
        'postulaciones' => $postulaciones,
        'experiencia' => $experiencia,
        'formacion' => $formacion,
        'aficion' => $aficion,
        'interes' => $interes,
        'id_postulacion' => $id_postulacion,
        'id_usuario' => $id_usuario,
    );
}

echo json_encode($datos_totales);

?>