<?php 
error_reporting(0);
session_start();
include('../clases/save.class.php');
include('../clases/function.class.php');

$_idusuario = $_SESSION['iusuario'];

$_finduser = Functions::singleton_functions();
$_compVacante = Functions::singleton_functions();

if(isset($_POST['id_vacante']))
{
    $id_vacante = $_POST['id_vacante'];
    $_SESSION['id_vacante'] = $id_vacante;
    $resultado = $_finduser->seleccionar_vacantes($id_vacante);
    $compVacante = $_compVacante->comprobar_postulacion($_idusuario,$id_vacante);
    echo json_encode(['vacante' => $resultado, 'compVacante' => $compVacante]);
}

?>