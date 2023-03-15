<?php
session_start();
include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$titulo = "Index";
$smarty=new smarty;
$nuevasRespuestas = Save::singleton_guardar();
$nuevoSingleton = Functions::singleton_functions();
$iusuario = $_SESSION['iusuario'];
$notificacionpostulaciones = $nuevoSingleton->notificacionpostulaciones($iusuario);



if($notificacionpostulaciones>=1)
{
    $COUNTPOS=$notificacionpostulaciones;
}
else 
{
    $COUNTPOS=0;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

if(isset($_POST['btnenviar']))
    {
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
            $mail->isSMTP();                                        
            $mail->Host       = 'smtp.live.com';                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'prueba_web01@hotmail.com';               
            $mail->Password   = 'Prueba123';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 587;     

            //Recipients
            $mail->setFrom('prueba_web01@hotmail.com', 'Mailer');
            $mail->addAddress('kevin.vall328@gmail.com', 'Joe User');     
            $mail->addReplyTo('kevin.vall328@gmail.com', 'Information');

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Solicitud de realizacion de Test';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Correo Enviado!';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    
    $ECOUNT = $COUNTPOS;
    $smarty->assign("COUNTPOS",$COUNTPOS);
    $smarty->assign("ECOUNT",$ECOUNT);
    $smarty->assign("titulo", $titulo);
$smarty->display("../smarty/templates/enviartest.tpl");

?>