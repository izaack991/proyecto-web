<?php 
session_start();
include("../clases/function.class.php");
$nuevoMensaje = save::singleton_guardar();


$id_usuario = $_SESSION['iusuario'];
if (isset($_POST['mensaje'])) {
    $id_conversacion=1;
    $mensaje = $_POST['mensaje'];
    // $conversacion = $buscar->buscarMensaje($id_empresa = 2,$id_usuario);
    $newMensaje = $nuevoMensaje->insertar_mensaje($id_conversacion, $mensaje, $id_usuario );
    echo json_encode($newMensaje);
} else {
    echo 'No se recibió ningún mensaje';
}
?>
