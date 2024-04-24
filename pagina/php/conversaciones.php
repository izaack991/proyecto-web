<?php 
session_start();
include("../clases/function.class.php");
$buscar = Functions::singleton_functions();

$valor = $_POST['valor'] ?? null;

if ($valor === null) {
    echo json_encode(['error' => 'No se proporcionó ningún valor']);
    exit;
}

switch ($valor) {
    case 1:
        $id_usuario = $_SESSION['iusuario'];
        $conversacion = $buscar->buscarConversacion($id_usuario);
        echo json_encode($conversacion);
        break;

    case 2:
        $id_empresa = $_SESSION['iusuario'];
        $id_usuario = $_POST['id'] ?? null;

        if ($id_usuario === null) {
            echo json_encode(['error' => 'No se proporcionó ID de usuario']);
            exit;
        }

        if ($_SESSION['rol'] == 1) {
            $mensaje = $buscar->buscarMensaje($id_empresa, $id_usuario);
        } else {
            $mensaje = $buscar->buscarMensaje($id_usuario, $id_empresa);
        }

        echo json_encode($mensaje);
        break;

    default:
        echo json_encode(['error' => 'El valor proporcionado no es válido']);
}
?>
