<?php
error_reporting(0);
session_start();
include ('../clases/save.class.php');
include ('../clases/function.class.php');

$nuevoUsuario = Save::singleton_guardar();
$_findUser=Functions::singleton_functions();
$token = $_POST['token'];

// Verificar si se ha enviado un token por POST
if (isset($_POST['token'])) {
    // Obtener el token enviado por POST
    $tokenIngresado = $_POST['token'];
  
    $tokenAlmacenado = $_findUser->buscaToken($tokenIngresado);

    // Comparar el token ingresado con el token almacenado
    if ($tokenIngresado == $tokenAlmacenado) {
        // El token es válido, mostrar mensaje de éxito
        $newuser = $nuevoUsuario->activar_empresa($tokenIngresado);
        if($newuser==true)
        {
            echo "true";
        }
    
    } else {
        // El token es incorrecto, mostrar mensaje de error
        echo '<div class="alert alert-danger" role="alert">El token ingresado es incorrecto. Por favor, inténtalo de nuevo.</div>';
       
} 
}
// else {
//     // Si no se ha enviado un token por POST, redirigir al formulario de verificación
//     header("Location: workele.com");
//     exit();
// }
?>
