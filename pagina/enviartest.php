<?php
session_start();

date_default_timezone_set('Etc/UTC');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');

$titulo = "Index";
$smarty=new smarty;
$nuevasRespuestas = Save::singleton_guardar();
$nuevoSingleton = Functions::singleton_functions();
$iusuario = $_SESSION['iusuario'];
$notificacionpostulaciones = $nuevoSingleton->notificacionpostulaciones($iusuario);
$vacante = $_GET['vac'];

if($notificacionpostulaciones>=1)
{
    $COUNTPOS=$notificacionpostulaciones;
}

$mail = new PHPMailer(true);

  if(isset($_POST['btnenviar']))
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
                    $mail->Host = 'smtpout.secureserver.net';
                    $mail->Port = 465;
                    $mail->CharSet = 'UTF-8';
                    $mail->Username ='noreply@workele.com'; 
                    $mail->Password = 'Javi3r2606!';
                    //Agregar destinatario
                    $mail->setFrom('noreply@workele.com', 'contacto');
                    $mail->AddAddress("noreply@workele.com");//A quien mandar email
                    //$mail->SMTPKeepAlive = true;  
                    $mail->Mailer = "smtp"; 
                    $body = "<img src='http://artics.servehttp.com:8080/assets/images/logolargegreen.png' class='img-fluid' width='230' height='70' alt='image'/>"; // OJO con la imagen. Hablaremos de esto en el próximo apartado.
                    $body .= "<div style='width:90%; padding:6px;'>";
                    $body .= "<h1>Felicidades ..!!!</h1>";
                    $body .= "</div>";
                    $body .= "te hemos seleccionado para la siguiente vacante $vacante, tendras que realizar una serie de pruebas que elegimos para ti";
                    $body .= "";
                    $mail->isHTML(true); // Set email format to HTML
                    $mail->Subject = "Vacante disponible!";
                    $mail->Body    = $body;

                        //Content
                    $mail->AltBody = 'felicidades';
                    //Attachment

                    $mail->send();
                    if(!$mail->send()) {
                        echo 'Error al enviar email';
                        echo 'Mailer error: ' . $mail1->ErrorInfo;
                        exit();
                    }
                    else 
                    {
                       // echo "<script>window.location.href='postulacion.php';</script>";
                        //$formacion = $nuevoDato->postulaciones($idusuario,$vc_id);
                        // if($formacion == TRUE)
                        // {    
                        $respuestas = $nuevasRespuestas->guardar_correo($_POST['test_moss'],$_POST['test_raven'],$_POST['test_sjt'],$_POST['test_merril'],$_POST['test_cleaver']);
                            
                           
                        // }
                    }
             }
                 catch(PDOException $e)
                 {
                  echo "Problemas enviando correo electrónico a ".$valor;
                  echo "<br/>".$mail->ErrorInfo;  
                 }
    }
    $ECOUNT = $COUNTPOS;
    $smarty->assign("COUNTPOS",$COUNTPOS);
    $smarty->assign("ECOUNT",$ECOUNT);
    $smarty->assign("titulo",$titulo);
    // $smarty->assign("alerta",$alerta);
    $smarty->display("../smarty/templates/enviartest.tpl");
?>