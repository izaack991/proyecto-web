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
    $rol = $_SESSION['rol'];
    if ($rol == 1 )
    {
        $id_usuario = $_POST['id'];
        $id_empresa = $_SESSION['iusuario'];
        $mensaje = $buscar->buscarMensaje($id_empresa, $id_usuario);

    }
    else
    {
        $id_usuario = $_SESSION['iusuario'];
        $id_empresa = $_POST['id'];
        $mensaje = $buscar->buscarMensaje($id_empresa, $id_usuario);
    }
        echo json_encode($mensaje);
    } else {
        echo json_encode(array('error' => 'El valor proporcionado no es válido'));
    }
} else {
    echo json_encode(array('error' => 'No se proporcionó ningún valor'));
}
?>
