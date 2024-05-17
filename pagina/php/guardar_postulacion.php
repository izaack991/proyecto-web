<?php 
session_start();
include('../clases/save.class.php');
include('../clases/function.class.php');

$nuevoUsuario = Save::singleton_guardar();
$_finduser = Functions::singleton_functions();

$id_vacante = $_SESSION['id_vacante'];
$id_usuario = $_SESSION['iusuario'];

$resultado2 = $_finduser->verificar_datospersonales($id_usuario);

if ($resultado2 == 1) {
    $id_postulacion = $_finduser->consec_postulacion();
    $newlogusuario = $nuevoUsuario->guardar_postulacion($id_usuario, $id_vacante, $id_postulacion);
    
    if ($newlogusuario == true) {
        echo 1; // Devuelve 1 al AJAX si se ejecutaron las funciones
    } else {
        echo 0; // En caso de que algo falle al guardar la postulación
    }
} else {
    echo 0; // Devuelve 0 al AJAX si $resultado2 es 0
}
?>
