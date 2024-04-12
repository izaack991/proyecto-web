<?php
// Conectar a la base de datos
$conexion = new PDO('mysql:host=localhost;dbname=db_web', 'root', '');

// Preparar la consulta para obtener los mensajes ordenados por fecha de envío
$consulta = $conexion->query("SELECT * FROM mensajes ORDER BY fecha_envio DESC");

// Imprimir los mensajes
while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $remitente = ($fila['tipo_remitente'] == 'empresa') ? 'Empresa' : 'Usuario';
    $destinatario = ($fila['tipo_destinatario'] == 'empresa') ? 'Empresa' : 'Usuario';
    echo "<p>$remitente (ID: {$fila['remitente_id']}) envió a $destinatario (ID: {$fila['destinatario_id']}): {$fila['contenido']}</p>";
}
include('../clases/save.class.php');
include('../clases/function.class.php');
?>
