<?php

// Comentar la linea de abajo si desea mostrar los errores
error_reporting(0);
session_start();
if(isset($_SESSION['tiempo']) ) {
    $vida_session = time() - $_SESSION['tiempo'];
}
$_SESSION['tiempo'] = time();
include('../clases/save.class.php');
include('../clases/function.class.php');

$nuevoVideo = Save::singleton_guardar();
$C_vid_curriculum = Functions::singleton_functions();

$iusuario = $_SESSION['iusuario'];

// Ruta donde se guardarán los archivos de video y audio
$upload_directory = "../userfiles/videos/";

// Verificar si se recibió el archivo de video y el archivo de audio
if (isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {

    // Generar nombres únicos para los archivos de video y audio
    $video_name = 'video_' .$iusuario. '.mp4';

    // Mover los archivos de video y audio temporales al directorio de destino
    move_uploaded_file($_FILES['video']['tmp_name'], $upload_directory . $video_name);

    // Guardar la ruta del video en la base de datos
    $ruta_video = $upload_directory . $video_name;

    $id_vid_curriculum = $C_vid_curriculum->consecutivo_vid_curriculum();
	$newInteres = $nuevoVideo->guardar_vid_curriculum($id_vid_curriculum,$iusuario,$ruta_video);

    // Aquí podrías realizar cualquier otra acción, como guardar las rutas de los archivos en una base de datos
    echo "Archivos de video y audio guardados exitosamente en el servidor.";
} else {
    echo "Error al recibir los archivos de video y audio.";
}
?>