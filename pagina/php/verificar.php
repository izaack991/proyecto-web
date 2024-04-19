<?php
include('conexion.class.php');

// Verificar si se recibió un token en la URL
if(isset($_GET['token'])) {
    $token = $_GET['token'];

    // Consultar la base de datos para verificar si el token es válido
    $query = "SELECT * FROM usuarios WHERE token = '$_token'";
    $result = mysqli_query($conexion, $query);

    if(mysqli_num_rows($result) > 0) {
        // El token es válido, marcar la cuenta como verificada
        $row = mysqli_fetch_assoc($result);
        $id_usuario = $row['id_usuario']; // Suponiendo que el id del usuario está en una columna llamada 'id_usuario'
        
        // Actualizar el estado de verificación del usuario en la base de datos
        $update_query = "UPDATE usuarios SET verificado = 1 WHERE id_usuario = $id_usuario";
        mysqli_query($conexion, $update_query);

        // Mostrar mensaje de verificación exitosa
        echo "¡Tu cuenta ha sido verificada correctamente!";
    } else {
        // El token no es válido
        echo "El token de verificación es inválido.";
    }
} else {
    // No se recibió ningún token en la URL
    echo "No se proporcionó ningún token de verificación.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
