<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
date_default_timezone_set('Etc/UTC');
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require_once 'clases/save.class.php';
require_once 'clases/functions.class.php';
require_once 'clases/validacorreo.class.php';
require('/opt/lampp/lib/php/Smarty/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir('/opt/lampp/htdocs/smarty/templates');
$smarty->setCompileDir('/opt/lampp/htdocs/smarty/templates_c');
$smarty->setCacheDir('/opt/lampp/htdocs/smarty/cache');
$smarty->setConfigDir('/opt/lampp/htdocs/smarty/configs');
$titulo=$_SESSION['titulo'];
global $alerta;
global $success;
global $xme;
if($_GET['xme!r'] == 1)
{
	$xme = 1 ;
	$estatus = 1;
}
if($_GET['xme!r'] == 2)
{
	$xme = 2;
	$estatus = 0;
}
$_SESSION['t_user'] = $xme; 
	
$nuevoUsuario = Save::singleton_usuario();
$_findUser = Functions::singleton_functions();
$_findCorreo = ValidaCorreo::singleton_correo();
if(isset($_POST['txtcorreo']) && isset($_POST['txtusuario']) && isset($_POST['txtpassword'])
   && isset($_POST['txtconfirmar']))
	{
		
		$_txtcorreo=$_POST['txtcorreo'];
		$_txtusuario=$_POST['txtusuario'];
		$_txtpassword=$_POST['txtpassword'];
		$_txtconfirmar=$_POST['txtconfirmar'];
		$f_usuario = $_findUser->consec_usuario();
		$f_correo = $_findCorreo->buscarcorreo($_txtcorreo);
		if ($_txtpassword!=$_txtconfirmar) 
		{
			
			
			$alerta="<script> swal({
			   title: '¡ERROR!',
			   text: 'La contraseña no coincide',
			   type: 'error',
			 	});</script>";
			$smarty->assign("success",$success);
			$smarty->assign("alerta",$alerta);
			$smarty->assign("titulo",$titulo);
			$smarty->display("registrousuario.tpl");
		}
		else
		{		
			if($f_correo == TRUE)
			{
				$alerta="<script> swal({
					title: '',
					text: 'Este correo ya fue registrado.',
					type: 'error',
					  });</script>";
				 $smarty->assign("success",$success);
				 $smarty->assign("alerta",$alerta);
				 $smarty->assign("titulo",$titulo);
				 $smarty->display("registrousuario.tpl");
			}
			else
			{
				$newuser = $nuevoUsuario->guardar_puser($f_usuario,$_txtusuario,$_txtpassword,$_txtcorreo,$_SESSION['t_user'],$estatus);
				if($newuser == TRUE)
				{	
						
					$alerta="<script> swal({
							title: '',
							text: 'Sus datos se guardaron correctamente',
						   type: 'success',
							  });</script>";
							  if($xme == 2)
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
									  //$mail->SMTPSecure = "ssl";
									  $mail->SMTPSecure = 'tls';
									  $mail->Host = 'smtp.live.com';
									  $mail->Port = 587;// TCP port to connect to
									  $mail->CharSet = 'UTF-8';
									  $mail->Username ='javier_vazquezg@hotmail.com'; //Email para enviar
									  $mail->Password = 'Javi3r2606!'; //Su password
									  //Agregar destinatario
									  $mail->setFrom('javier_vazquezg@hotmail.com', 'contacto workele.com');
									  $mail->AddAddress("lscjavier.vazquezg@gmail.com");//A quien mandar email
									  //$mail->SMTPKeepAlive = true;  
									  $mail->Mailer = "smtp"; 
			  
									  $body = "<img src='http://artics.servehttp.com:8080/assets/images/logolargegreen.png' class='img-fluid' width='230' height='70' alt='image'/>"; // OJO con la imagen. Hablaremos de esto en el próximo apartado.
									  $body .= "<div style='width:90%; padding:6px;'>";
									  $body .= "<h1>El usuario $_txtusuario se ha registrado como empresa favor de verificar sus datos</h1>";
									  $body .= "</div>";
								  
									  //$body .= "Aplicaste a la vacante sobre $VC_TITULO pronto la empresa $NOMBRE_EMPRESA se contactara contigo";
									  $body .= "";
									  $mail->isHTML(true); // Set email format to HTML
									  $mail->Subject = "Vacante sobre $VC_TITULO en $NOMBRE_EMPRESA";
									  $mail->Body    = $body;
										  //Content
									  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
									  //Attachments
									  //$mail->addAttachment($archivo['tmp_name'], $archivo['name']);         // Add attachments
									  $mail->send();
									  if(!$mail->send()) {
										  echo 'Error al enviar email';
										  echo 'Mailer error: ' . $mail1->ErrorInfo;
										  exit();
									  }
									  
								  }
								  catch(PDOException $e)
								  {
									  echo "Problemas enviando correo electrónico a ".$valor;
									  echo "<br/>".$mail->ErrorInfo;	
								  }		  	
								}



							$smarty->assign("alerta",$alerta);
							$smarty->assign("usuario",$usuario);
							$smarty->assign("titulo",$titulo);
							header('Location: login.php?xme!r='.$xme);
				}
				else
				{
					
					$alerta="<script> swal({
							title: '',
							text: 'Sus datos no se pudieron guaardar verfique',
						   type: 'error',
							 });</script>";
							$smarty->assign("alerta",$alerta);
							$smarty->assign("usuario",$usuario);
							$smarty->assign("titulo",$titulo);
							$smarty->display("registrousuario.tpl");
				}
				
				
			}
			
		}
	}
	//else
	//{	
		$smarty->assign("success",$success);
		$smarty->assign("alerta",$alerta);
		$smarty->assign("titulo",$titulo);
		$smarty->display("registrousuario.tpl");
	//}


?>