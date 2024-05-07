<?php
error_reporting(0);
session_start();
include ('../clases/save.class.php');
include ('../clases/function.class.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
//require '..\google-api\vendor\autoload.php';
require '../google-api/vendor/autoload.php';

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
$nuevoUsuario = Save::singleton_guardar();
$_findUser=Functions::singleton_functions();

function enviarCorreo($destinatario, $asunto, $mensaje) {
    $mail = new PHPMailer(true); // Inicializar PHPMailer con excepciones activadas
    
    try {
        // Configurar el servidor SMTP y las credenciales
        $mail->isSMTP();
        $mail->Host = 'mail.workele.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'no-reply@workele.com';
        $mail->Password = 'i7OTm-M6usi]';
        $mail->SMTPSecure = 'ssl'; // O 'ssl' si es necesario
        $mail->Port = 465; // Puerto SMTP
  
        // Configurar remitente y destinatario
        $mail->setFrom('no-reply@workele.com', 'Equipo workele');
        $mail->addAddress($destinatario);
  
        // Configurar el contenido del correo
        $mail->isHTML(true); // Habilitar el formato HTML
        $mail->Subject = $asunto;
        $mail->Body = $mensaje;
        $mail->addEmbeddedImage('../../assets/images/Workele.png', 'image_workele');
  
        // Enviar el correo
        $mail->send();
        //echo "El correo se ha enviado correctamente.";
    } catch (Exception $e) {
      //  echo "Hubo un error al enviar el correo: {$mail->ErrorInfo}";
    }
  }
  
// Verificar si se ha enviado un token por POST
if (isset($_POST['confirmMail'])) {
    // Obtener el token enviado por POST
    $correo = $_POST['confirmMail'];
  
    $_correo = $_findUser->buscar_correo_usuario($correo);
    foreach($_correo as $index => $value){
        $correo_  = $value['correo'];
        $_nombre = $value['nombre'];
        $_razon = $value['razon_social'];
        $_id_usuario = $value['id_usuario'];
    }
    if(empty($_razon))
    {
        $nombre_completo = $_nombre;
    }else{
        $nombre_completo = $_razon;
    }    
    // Comparar el token ingresado con el token almacenado
    if ($correo == $correo_) {
        // El token es válido, mostrar mensaje de éxito
        $verificationLink = "http://localhost:8080/proyecto-web/pagina/templates/renovarpassword.php?xsw=$_id_usuario";

            $asuntoCorreo = "Bienvenido a nuestra plataforma";
            $mensajeCorreo = '
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Correo de ejemplo</title>
            </head>
            <body>
            <div class="mx-auto" style="width: 200px;">
                <img src="cid:image_workele" alt="" style="width: 300px; height: 180;">
            </div>
            <h1>Hola, ' . $nombre_completo . '!</h1>
                <p>Este es un correo de verificacion</p>
                <p>Hemos detectado que solicito cambio de contraseña de acceso si usted realizo esta peticion, ingrese al enlace en la parte posterior</p>
                <p>de lo contrario favor de reportar al correo:contacto@workele.com</p>
                <p>enlace de verificacion, ' . $verificationLink . '!</p>
                <p>favor de no contestar este correo, fue enviado automaticamente</p>
            </body>
            </html>
            ';
           
            $bEnvio = true;
            enviarCorreo($correo, $asuntoCorreo, $mensajeCorreo);
            if($bEnvio == true)
            {
                echo "true";
            }

    
    } else {
        // El token es incorrecto, mostrar mensaje de error
        echo '<div class="alert alert-danger" role="alert">El correo ingresado es incorrecto. Por favor, inténtalo de nuevo.</div>';
       
} 
}
// else {
//     // Si no se ha enviado un token por POST, redirigir al formulario de verificación
//     header("Location: workele.com");
//     exit();
// }
?>
