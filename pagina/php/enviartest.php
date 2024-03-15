<?php
session_start();

date_default_timezone_set('Etc/UTC');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../../PHPMailer/Exception.php';
require '../../PHPMailer/PHPMailer.php';
require '../../PHPMailer/SMTP.php';

include('../clases/save.class.php');
include('../clases/function.class.php');
include('../templates/enviar_test.php');

$titulo = "Index";
// $smarty=new smarty;

// Verificar si el usuario está autenticado
if (isset($_SESSION['iusuario'])) {
    header("location:index.php");
    exit; // Detener la ejecución del script después de la redirección
  }

$nuevasRespuestas = Save::singleton_guardar();
$nuevoSingleton = Functions::singleton_functions();
$iusuario = $_SESSION['iusuario'];
$notificacionpostulaciones = $nuevoSingleton->notificacionpostulaciones($iusuario);
$vacante = $_GET['vac'];
$ie = $_GET['ie'];
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
                    $mail->AddAddress("luis2@gmail.com");//A quien mandar email
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
                            $respuestas = $nuevasRespuestas->guardar_correo($ie,$idusuario,$_POST['test_moss'],$_POST['test_raven'],$_POST['test_sjt'],$_POST['test_merril'],$_POST['test_cleaver']);
                    }
             }
                 catch(PDOException $e)
                 {
                  echo "Problemas enviando correo electrónico a ".$valor;
                  echo "<br/>".$mail->ErrorInfo;  
                 }
    }
    $ECOUNT = $COUNTPOS;
?>