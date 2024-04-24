<?php
// Verificar si se ha enviado un token por POST
if (isset($_POST['token'])) {
    // Obtener el token enviado por POST
    $tokenIngresado = $_POST['token'];

    // Token almacenado previamente (simulado, debes reemplazar con tu lógica real)
    $tokenAlmacenado = "token_generado"; // Reemplaza "token_generado" con el token real almacenado en tu sistema

    // Comparar el token ingresado con el token almacenado
    if ($tokenIngresado === $tokenAlmacenado) {
        // El token es válido, mostrar mensaje de éxito
        echo '<div class="alert alert-success" role="alert">¡La cuenta ha sido verificada exitosamente!</div>';
    } else {
        // El token es incorrecto, mostrar mensaje de error
        echo '<div class="alert alert-danger" role="alert">El token ingresado es incorrecto. Por favor, inténtalo de nuevo.</div>';
    }
} else {
    // Si no se ha enviado un token por POST, redirigir al formulario de verificación
    header("Location: verificacion.html");
    exit();
}
?>
