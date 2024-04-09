<?php
session_start();

include('../clases/function.class.php');

$nuevoSingleton = Functions::singleton_functions();
$iusuario = $_SESSION['iusuario'];
$registrado  = $nuevoSingleton->video_registrado($iusuario);

if ($registrado) {
    echo 'registrado';
} else {
    echo 'no_registrado';
}
?>