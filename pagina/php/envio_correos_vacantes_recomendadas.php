<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../google-api/vendor/autoload.php';

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

function enviarCorreo($destinatario, $asunto, $mensaje) {
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'mail.workele.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'no-reply@workele.com';
        $mail->Password = 'i7OTm-M6usi]';
        $mail->SMTPSecure = 'ssl'; // O 'ssl' si es necesario
        $mail->Port = 465; // Puerto SMTP

        // Destinatario y asunto
        $mail->setFrom('no-reply@workele.com', 'Equipo workele');
        $mail->addAddress($destinatario);
        
        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body = $mensaje;
        $mail->addEmbeddedImage('../../assets/images/Workele.png', 'image_workele');

        // Enviar el correo
        $mail->send();
        echo 'El correo se ha enviado correctamente.';
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}

function getUsuarioVacantes($conn) {
    // Paso 1: Obtener los últimos registros de tbl_log_usuario donde tipo = 1 para cada usuario
    $sql = "
        SELECT ID, id_usuario, tipo, fecha_mou, movimiento, nombre, correo
        FROM (
            SELECT ID, l.id_usuario, tipo, fecha_mou, movimiento, u.nombre, u.correo,
            ROW_NUMBER() OVER (PARTITION BY l.id_usuario ORDER BY fecha_mou DESC) AS row_num
            FROM tbl_log_usuario l
            INNER JOIN tbl_usuario u ON u.id_usuario = l.id_usuario
            WHERE tipo = 1
        ) subquery
        WHERE row_num = 1
    ";
    
    $result = $conn->query($sql);
    $usuarioVacantes = [];

    // Paso 2: Procesar cada registro obtenido
    while ($row = $result->fetch_assoc()) {
        $idUsuario = $row['id_usuario'];
        $nombreUsuario = $row['nombre'];
        $correoUsuario = $row['correo'];
        $movimiento = $row['movimiento'];
        $movimientosArray = explode(',', $movimiento); // Asumimos que los movimientos están separados por comas

        // Construir la consulta para encontrar las vacantes
        $vacanteSqlParts = [];
        foreach ($movimientosArray as $mov) {
            $mov = trim($mov);
            if (!empty($mov)) {
                $vacanteSqlParts[] = "puesto LIKE '%" . $conn->real_escape_string($mov) . "%'";
            }
        }
        
        if (!empty($vacanteSqlParts)) {
            $vacanteSql = "
                SELECT id_vacante, puesto
                FROM tbl_vacantes
                WHERE " . implode(' OR ', $vacanteSqlParts);
            
            $vacanteResult = $conn->query($vacanteSql);
            while ($vacanteRow = $vacanteResult->fetch_assoc()) {
                $usuarioVacantes[$idUsuario]['nombre'] = $nombreUsuario;
                $usuarioVacantes[$idUsuario]['correo'] = $correoUsuario;
                $usuarioVacantes[$idUsuario]['vacantes'][] = [
                    'id_vacante' => $vacanteRow['id_vacante'],
                    'puesto' => $vacanteRow['puesto']
                ];
            }
        }
    }

    // Devolver los datos de los usuarios y sus vacantes correspondientes
    return $usuarioVacantes;
}

// Ejemplo de uso:
$conn = new mysqli('localhost', 'root', '', 'db_web');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$usuarioVacantes = getUsuarioVacantes($conn);

foreach ($usuarioVacantes as $idUsuario => $info) {
    $nombre = $info['nombre'];
    $correo = $info['correo'];
    $vacantes = $info['vacantes'];
    
    // Construir el mensaje del correo electrónico
    $mensaje = "Hola $nombre, en Workele tenemos algunas recomendaciones sobre puestos que te podrían interesar:<br><br>";
    
    foreach ($vacantes as $vacante) {
        $idVacante = $vacante['id_vacante'];
        $puesto = $vacante['puesto'];
        $mensaje .= "- <a href='http://localhost/proyecto-web/reedireccion_correo.php?id_vacante=$idVacante'>$puesto</a><br>";
    }

    // Envío del correo electrónico
    enviarCorreo($correo, "Vacantes Recomendadas", $mensaje);
}

$conn->close();
?>
