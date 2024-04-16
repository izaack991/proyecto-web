<?php
session_start();

include("../clases/save.class.php");
include("../clases/function.class.php");

// // Verificar si el usuario está autenticado
// if (isset($_SESSION['iusuario'])) {
//     header("location:login.php?xd=2");
//     exit; // Detener la ejecución del script después de la redirección
// }

$buscarDatos = Functions::singleton_functions();
$NuevoC = Save::singleton_guardar();
$iusuario = $_SESSION['iusuario'];
$bExperiencia = $buscarDatos->seleccionar_experiencia($iusuario);
$bFormacion = $buscarDatos->seleccionar_formacion($iusuario);
$bAficion = $buscarDatos->seleccionar_aficiones($iusuario);
$bInteres = $buscarDatos->seleccionar_interes($iusuario);
$vid_curriculum = $buscarDatos->seleccionar_vid_curriculum($iusuario);
$b_postulacion = $buscarDatos->buscarPostulacion2($iusuario);
$busuario = $buscarDatos->seleccionar_usuario($iusuario);

$datos_totales = array(
    'experiencia' => $bExperiencia,
    'formacion' => $bFormacion,
    'aficion' => $bAficion,
    'interes' => $bInteres,
    'video_curriculum' => $vid_curriculum,
    'postulacion' => $b_postulacion,
    'usuario' => $busuario,
);

echo json_encode($datos_totales);
?>