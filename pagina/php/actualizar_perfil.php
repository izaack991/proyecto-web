<?php
session_start();

include("../clases/save.class.php");
include("../clases/function.class.php");

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

$tipo = $_POST['tipo'];
if ($tipo='exp'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['id'], $_POST['descripcion'], $_POST['empresa'], $_POST['periodo'])) {
        // Obtener los datos enviados por AJAX
        $idexp = $_POST['id'];
        $descripcion = $_POST['descripcion'];
        $empresa = $_POST['empresa'];
        $periodo = $_POST['periodo'];
        $UCerrar=$NuevoC->actualizar_experiencia($idexp,$descripcion,$empresa,$periodo);
        $bExperiencia = $buscarDatos->seleccionar_experiencia($iusuario);
    }
}
if ($tipo='exp'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['idexp'])) {
        // Obtener los datos enviados por AJAX
        $idexp = $_POST['idexp'];
        $UCerrar=$NuevoC->eliminar_experiencia($idexp);
        $bExperiencia = $buscarDatos->seleccionar_experiencia($iusuario);
    }
}
if ($tipo='for'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['id'], $_POST['descripcion'], $_POST['ubicacion'], $_POST['periodo'])) {
        // Obtener los datos enviados por AJAX
        $idfor = $_POST['id'];
        $descripcion = $_POST['descripcion'];
        $ubicacion = $_POST['ubicacion'];
        $periodo = $_POST['periodo'];
        $UCerrar=$NuevoC->actualizar_formacion($idfor,$descripcion,$ubicacion,$periodo);
        $bFormacion = $buscarDatos->seleccionar_formacion($iusuario);
    }
}
if ($tipo='for'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['idfor'])) {
        // Obtener los datos enviados por AJAX
        $idfor = $_POST['idfor'];
        $UCerrar=$NuevoC->eliminar_formacion($idfor);
        $bFormacion = $buscarDatos->seleccionar_formacion($iusuario);
    }
}
if ($tipo='afi'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['id'], $_POST['descripcion'])) {
        // Obtener los datos enviados por AJAX
        $idafi = $_POST['id'];
        $descripcion = $_POST['descripcion'];
        $UCerrar=$NuevoC->actualizar_aficion($idafi,$descripcion);
        $bAficion = $buscarDatos->seleccionar_aficiones($iusuario);
    }
}
if ($tipo='afi'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['idafi'])) {
        // Obtener los datos enviados por AJAX
        $idafi = $_POST['idafi'];
        $UCerrar=$NuevoC->eliminar_aficion($idafi);
        $bAficion = $buscarDatos->seleccionar_aficiones($iusuario);
    }
}
if ($tipo='int'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['id2'], $_POST['descripcion2'])) {
        // Obtener los datos enviados por AJAX
        $idint = $_POST['id2'];
        $descripcion = $_POST['descripcion2'];
        $UCerrar=$NuevoC->actualizar_interes($idint,$descripcion);
        $bInteres = $buscarDatos->seleccionar_interes($iusuario);
    }
}
if ($tipo='int'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['idint'])) {
        // Obtener los datos enviados por AJAX
        $idint = $_POST['idint'];
        $UCerrar=$NuevoC->eliminar_interes($idint);
        $bInteres = $buscarDatos->seleccionar_interes($iusuario);
    }
}
if ($tipo='nom'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['usuarioID'],$_POST['nombre'],$_POST['apellido'])) {
        // Obtener los datos enviados por AJAX
        $usuarioID = $_POST['usuarioID'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $UCerrar=$NuevoC->actualizar_nombreUsuario($usuarioID,$nombre,$apellido);
        $busuario = $buscarDatos->seleccionar_usuario($iusuario);
    }
}
if ($tipo='pos'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['idpos'])) {
        // Obtener los datos enviados por AJAX
        $idpos = $_POST['idpos'];
        $UCerrar=$NuevoC->eliminar_postulacion($idpos);
        $b_postulacion = $buscarDatos->buscarPostulacion2($iusuario);
    }
}
if ($tipo='vid'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['idvid'])) {
        // Obtener los datos enviados por AJAX
        $idvid = $_POST['idvid'];
        $UCerrar=$NuevoC->eliminar_video_curriculum($idvid);

        $archivo_a_eliminar = '../userfiles/videos/video_' .$iusuario. '.mp4';
        // Verificar si el archivo existe antes de intentar eliminarlo
        if (file_exists($archivo_a_eliminar)) {
            // Intentar eliminar el archivo
            if (unlink($archivo_a_eliminar)) {
                echo "El archivo $archivo_a_eliminar ha sido eliminado correctamente.";
            } else {
                echo "Error al intentar eliminar el archivo $archivo_a_eliminar.";
            }
        } else {
            echo "El archivo $archivo_a_eliminar no existe.";
        }

        $vid_curriculum = $buscarDatos->seleccionar_vid_curriculum($iusuario);
    }
}

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