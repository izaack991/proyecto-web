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
$user_id=$_SESSION['pwid'];

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
if (isset($_POST['txt_PASSWORD']) && (isset($_POST['txt_PASSWORD2']))) {
    // Obtener el token enviado por POST
    $password1 = $_POST['txt_PASSWORD'];
    $password2 = $_POST['txt_PASSWORD2'];
    
 
    
    $_correo = $_findUser->buscar_usuario($user_id);
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
    

    if ($user_id == $_id_usuario) {
       
        $verificationLink = "https://www.workele.com";

            $asuntoCorreo = "Bienvenido a nuestra plataforma";
            $mensajeCorreo = '
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Correo renovar contraseña</title>
                <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
                <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
                <link id="theme-style" rel="stylesheet" href="../../assets/css/styles.css">
                <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
            </head>
            <body>
            <div class="mx-auto" style="width: 200px;">
                <img src="cid:image_workele" alt="" style="width: 300px; height: 180;">
            </div>
            <h1>Hola, ' . $nombre_completo . '!</h1>
                <p>Este es un correo de verificacion</p>
                <p>Hemos detectado que se cambio la contraseña si no reconoce la actividad de su cuenta favor de levantar un reporte</p>
                <p>al correo:contacto@workele.com agregando en el correo una identificacion oficial para verificar su identidade caso de</p>
                <p>en caso de ser empresa agregue por favor su constancia de situacion fiscal<p>
                <p>se ha renovado su contraseña puede ingresar a la plataforma en el siguiente enlace: ' . $verificationLink . '!</p>
                <p>favor de no contestar este correo, fue enviado automaticamente</p>
            </body>
            </html>
            ';
           if($password1==$password2)
           {
            $validacion = $nuevoUsuario->actualizar_password($user_id,$password1);
           }
           
            if($validacion == true)
            {
                enviarCorreo($correo_, $asuntoCorreo, $mensajeCorreo);
                echo "true";
            }else{
                echo '<div class="alert alert-danger" role="alert">no se actualizo</div>';
       
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
