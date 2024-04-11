<?php
// Verificar si se recibió el token en la URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Buscar el token en la base de datos
    $sql = "SELECT * FROM tbl_usuario WHERE token='$token'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Token válido, marcar el registro como verificado
        $row = $result->fetch_assoc();
        // Actualizar el registro como verificado en la base de datos

        echo "Registro verificado correctamente.";
    } else {
        echo "Token inválido.";
    }
} else {
    echo "Token no recibido.";
}
?>
