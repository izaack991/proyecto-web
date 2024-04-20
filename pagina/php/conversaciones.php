<?php 
session_start();
include("../clases/function.class.php");
$buscar = Functions::singleton_functions();

if (isset($_POST['valor'])) {
    $valor = $_POST['valor'];

    if ($valor == 1) {
        $id_usuario = $_SESSION['iusuario'];
        $conversacion = $buscar->buscarConversacion($id_usuario);
        echo json_encode($conversacion);
    } elseif ($valor == 2) {
        $id_usuario = $_SESSION['iusuario'];
        $id_empresa = 2; // Esto debe ser un número, no una comparación
        $mensaje = $buscar->buscarMensaje($id_empresa, $id_usuario);
        echo json_encode($mensaje);
    } else {
        echo json_encode(array('error' => 'El valor proporcionado no es válido'));
    }
} else {
    echo json_encode(array('error' => 'No se proporcionó ningún valor'));
}

?>
