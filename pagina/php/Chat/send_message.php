<?php
if(isset($_POST['message']) && isset($_POST['sender_id']) && isset($_POST['recipient_id']) && isset($_POST['sender_type']) && isset($_POST['recipient_type'])) {
    $message = $_POST['message'];
    $sender_id = $_POST['sender_id'];
    $recipient_id = $_POST['recipient_id'];
    $sender_type = $_POST['sender_type'];
    $recipient_type = $_POST['recipient_type'];

    // Conectar a la base de datos
    $conexion = new PDO('mysql:host=localhost;dbname=db_web', 'root', '');

    // Preparar la consulta para insertar el mensaje
    $consulta = $conexion->prepare("INSERT INTO mensajes (contenido, remitente_id, destinatario_id, tipo_remitente, tipo_destinatario) VALUES (:contenido, :remitente_id, :destinatario_id, :tipo_remitente, :tipo_destinatario)");
    $consulta->bindParam(':contenido', $message);
    $consulta->bindParam(':remitente_id', $sender_id);
    $consulta->bindParam(':destinatario_id', $recipient_id);
    $consulta->bindParam(':tipo_remitente', $sender_type);
    $consulta->bindParam(':tipo_destinatario', $recipient_type);
    $consulta->execute();
}
include('../clases/save.class.php');
include('../clases/function.class.php');
?>
