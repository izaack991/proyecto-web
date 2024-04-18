<?php
session_start();

date_default_timezone_set('Etc/UTC');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '..\google-api\vendor\autoload.php';

require '../../PHPMailer/Exception.php';
require '../../PHPMailer/PHPMailer.php';
require '../../PHPMailer/SMTP.php';

include('../clases/save.class.php');
include('../clases/function.class.php');
include('../clases/conexion.class.php');
include('../templates/regEmpresa.php');
include('Usuario.php');

$mail = new PHPMailer(true);

  if(isset($_POST['miBoton']))
    {
         try
              {
           
                    $mail = new PHPMailer(true); 
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );
                    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  
                    $mail->SMTPDebug = 0; 
                    $mail->IsSMTP();
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = "ssl";
                    //$mail->SMTPSecure = 'tls';
                    $mail->Host = 'smtpout.svgt333.serverneubox.com.mx';
                    $mail->Port = 465;
                    $mail->CharSet = 'UTF-8';
                    $mail->Username ='no-reply@workele.com'; 
                    $mail->Password = 'i7OTm-M6usi]';
                    //Agregar destinatario
                    $mail->setFrom('no-reply@workele.com', 'workele');
                    $mail->AddAddress("jonathan16noriega@gmail.com");
                    //$mail->SMTPKeepAlive = true;  
                    $mail->Mailer = "smtp"; 
                    $mail->isHTML(true); // Set email format to HTML
                    $mail->Subject = "Token de verificacion";
                    $mail->Body    = 'Gracias por registrarte en nuestro sitio. Por favor, haz clic en el siguiente enlace para verificar tu cuenta: <a href="'.$verificationLink.'">Verificar cuenta</a>';
                    $mail->Body    = $body;

                    //Attachment

                    $mail->send();
                    if(!$mail->send()) {
                        echo 'Error al enviar email';
                        echo 'Mailer error: ' . $mail->ErrorInfo;
                        exit();
                    }
             }
                 catch(PDOException $e)
                 {
                  echo "Problemas enviando correo electrónico a ".$_correo;
                  echo "<br/>".$mail->ErrorInfo;  
                 }
    }
    $ECOUNT = $COUNTPOS;
?>