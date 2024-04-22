<?php 
session_start();
include("../clases/function.class.php");
$nuevoMensaje = save::singleton_guardar();
$buscar = Functions::singleton_functions();
$nuevoSingleton = Functions::singleton_functions();

$id_usuario = $_SESSION['iusuario'];
$id_empresa = 2;
if (isset($_POST['txtmsj'])) {
    $id_conversacion=1;
    $mensaje = $_POST['txtmsj'];
    $id_usuario=$_SESSION['iusuario'];
    // $conversacion = $buscar->buscarMensaje($id_empresa = 2,$id_usuario);
    $newMensaje = $nuevoMensaje->insertar_mensaje($id_conversacion, $mensaje, $id_usuario );

    echo 'Mensaje guardado correctamente';
} else {
    echo 'No se recibió ningún mensaje';
}
//print_r($conversacion);
// Imprimir la respuesta JSON después de obtenerla
echo json_encode($conversacion);
?>
