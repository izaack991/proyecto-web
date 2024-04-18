<?php
error_reporting(0);
session_start();
include ('../clases/save.class.php');
include ('../clases/function.class.php');

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
//require '..\google-api\vendor\autoload.php';

$nuevoUsuario = Save::singleton_guardar();
$_findUser = Functions::singleton_functions();
$_compCorreo = Functions::singleton_functions();
$irol = $_SESSION['rol'];
//print_r($_SESSION);

// Comprobación de que los campos de contraseña NO estén vacíos
if (isset($_POST['txt_PASSWORD']) && (isset($_POST['txt_PASSWORD2']))) {

  $_ruta = $_FILES['txtruta'];
  $_cons = $_FILES['txtcons'];

  // Comprobación de que las contraseñas NO sean distintas
  if ($_POST['txt_PASSWORD'] != $_POST['txt_PASSWORD2']) {

    // Alerta cuando las contraseñas NO coincidan.
    echo "errorPassword";
    return;

  } else {
    
    // Comprobación de que la Empresa no llegue con la imagen vacía
    if ($irol == 1 && $_ruta == null) {
      
      // Alerta cuando la imagen llega vacía con el rol Empresa
      echo "errorImagenEmpresa";
      return;

    } else if ($irol == 1 && $_cons == null) {

      // Alerta cuando la constancia llega vacía
      echo "errorConstancia";
      return;

    } else {

      //Asignamos variables con los datos del Usuario
      $f_id_usuario = $_findUser->consec_usuario();
      $_nombre = $_POST['txt_NOMBRE'];
      $_apellido = $_POST['txt_APELLIDOS'];
      $_correo = $_POST['txt_CORREO'];
      $_fecha_nac = $_POST['dateFECHA'];
      $_no_identificacion = $_POST['txt_CURP'];
      $_password = $_POST['txt_PASSWORD'];
      $_sexo = $_POST['cmb_SEXO'];
      $_region = $_POST['cmb_REGION'];
      $_telefono = $_POST['txt_TELEFONO'];
      $_domicilio = $_POST['txt_DOMICILIO'];
      $_razon = $_POST['txt_razon'];

      //Asignamos el estatus default
      $_status = 0;

      //Generamos el Token para la verificación
      $_token = rand(1000, 9999);

       //$verificationLink = "https://workele.com/verificar.php?token=$_token";

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        //CONFIGURACION 1 DE SERVIDOR PARA PHPMAILER

        // $mail = new PHPMailer();
        // $mail->IsSMTP();  
        // $mail->Host     = "smtp.serverneubox.com.mx";  
        // $mail->From     = "no-reply@workele.com";
        // $mail->SMTPAuth = true; 
        // $mail->Username ="no-reply@workele.com"; 
        // $mail->Password="i7OTm-M6usi]"; 
        // //$mail->FromName = $header;
        // $mail->AddAddress("jonathan16noriega@gmail.com");
        // $mail->AddBCC('no-reply@workele.com', 'workele');
        // $mail->Subject = 'Token de verificación';
        // $mail->Body    = 'Gracias por registrarte en nuestro sitio. Por favor, haz clic en el siguiente enlace para verificar tu cuenta: <a href="'.$verificationLink.'">Verificar cuenta</a>';
        // if(!$mail->Send()) {  
        //    echo 'Message was not sent.';  
        //    echo 'Mailer error: ' . $mail->ErrorInfo;  
        // }
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

      // Enviar correo de verificación metodo mail() php
      // $to = 'jonathan16noriega@gmail.com'; 
      // $subject = 'Verifica tu cuenta';
      // $message = 'Haz clic en el siguiente enlace para verificar tu cuenta: https://workele.com/verificar.php?token=' . $_token;
      // $headers = 'From: no-reply@workele.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

      // if(mail($to, $subject, $message, $headers)){
      //   echo 'correo enviado';
      // }else{
      //   echo 'no se envio';
      // }
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
      
      //CONFIGURACION 2 DE SERVIODR PARA PHPMAILER

      //$mail = new PHPMailer (true);
      
      // try {

      //   //Configuracion de servidor SMTP
      //   $mail->isSMTP();
      //   //$mail->Host = 'svgt333.serverneubox.com.mx'; 
      //   $mail->Host = 'localhost'; 
      //   $mail->SMTPAuth = true;
      //   $mail->Username = 'no-reply@workele.com';
      //   $mail->Password = 'i7OTm-M6usi]';
      //   $mail->SMTPSecure = 'tls';
      //   $mail->Port = 587;

      //   // Configuracion de correo electrónico
      //   $mail->setFrom('no-reply@workele.com', 'Workele');
      //   $mail->addAddress('jonathan16noriega@gmail.com'); 
      //   $mail->isHTML(true);
      //   $mail->Subject = 'Token de verificación';
      //   $mail->Body    = 'Gracias por registrarte en nuestro sitio. Por favor, haz clic en el siguiente enlace para verificar tu cuenta: <a href="'.$verificationLink.'">Verificar cuenta</a>';
        
      //   // Envío del correo
      //   if($mail->send()){          
      //     echo 'El correo de verificación ha sido enviado correctamente.';}

      //   } catch (Exception $e) {
      //     echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
      //   }
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



      //Obtenemos algunos datos necesarios sobre el archivo de la imagen
      $imgTipo = $_FILES['txtruta']['type'];
      $arrayImgExt = explode('/', $imgTipo);
      $imgExt = $arrayImgExt[1];
      $imgName = 'pfp_' . $f_id_usuario . '.' . $imgExt;
      $tamano = $_FILES['txtruta']['size'];
      $temp = $_FILES['txtruta']['tmp_name'];

      //Obtenemos algunos datos necesarios sobre el archivo de la constancia
      $conTipo = $_FILES['txtcons']['type'];
      $arrayConExt = explode('/', $conTipo);
      $conExt = $arrayConExt[1];
      $conName = 'csf_' . $f_id_usuario . '.' . $conExt;
      $tamanoCons = $_FILES['txtcons']['size'];
      $tempCons = $_FILES['txtcons']['tmp_name'];

      //Llamamos la función para confirmar que el correo NO esté registrado
      $comp_correo = $_compCorreo->buscar_correo($_correo);

      if ($comp_correo == 0) {

        if ($_ruta != null && $irol == 1) {

          //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
          if (!((strpos($imgTipo, "gif") || strpos($imgTipo, "jpeg") || strpos($imgTipo, "jpg") || strpos($imgTipo, "png") || strpos($imgTipo, "bmp") || strpos($imgTipo, "tiff") || strpos($imgTipo, "webp") || strpos($imgTipo, "svg") || strpos($imgTipo, "raw") || strpos($imgTipo, "psd") || strpos($imgTipo, "ai") || strpos($imgTipo, "eps") || strpos($imgTipo, "pdf") || strpos($imgTipo, "ico") || strpos($imgTipo, "tga") || strpos($imgTipo, "pict") || strpos($imgTipo, "exif") || strpos($imgTipo, "heif") || strpos($imgTipo, "heic") || strpos($imgTipo, "avif") || strpos($imgTipo, "pbm") || strpos($imgTipo, "pgm") || strpos($imgTipo, "ppm") || strpos($imgTipo, "xcf") || strpos($imgTipo, "arw") || strpos($imgTipo, "cr2") || strpos($imgTipo, "nef") || strpos($imgTipo, "orf") || strpos($imgTipo, "rw2") || strpos($imgTipo, "dng") || strpos($imgTipo, "crw") || strpos($imgTipo, "srw") || strpos($imgTipo, "raf") || strpos($imgTipo, "mrw") || strpos($imgTipo, "erf") || strpos($imgTipo, "kdc") || strpos($imgTipo, "mos") || strpos($imgTipo, "nrw") || strpos($imgTipo, "obm") || strpos($imgTipo, "pef") || strpos($imgTipo, "x3f") || strpos($imgTipo, "rawzor") || strpos($imgTipo, "pxr") || strpos($imgTipo, "srf") || strpos($imgTipo, "3fr") || strpos($imgTipo, "qtk") || strpos($imgTipo, "rwz") || strpos($imgTipo, "xbm") || strpos($imgTipo, "wdp") || strpos($imgTipo, "hdp") || strpos($imgTipo, "ktx") || strpos($imgTipo, "kro") || strpos($imgTipo, "hdr") || strpos($imgTipo, "jxr") || strpos($imgTipo, "apng") || strpos($imgTipo, "jp2") || strpos($imgTipo, "jls") || strpos($imgTipo, "jpf") || strpos($imgTipo, "jpm") || strpos($imgTipo, "jpx") || strpos($imgTipo, "bpg") || strpos($imgTipo, "flif")) && ($tamano < 2000000))) {
            
            //Alerta cuando la imagen NO es valida
            echo "errorImagen";
            return;

          } else {
            //Si la imagen es correcta en tamaño y tipo
            //Se intenta subir al servidor
            if (move_uploaded_file($temp, '../userfiles/img/' . $imgName)) {
              //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
              chmod('../userfiles/img/' . $imgName, 0777);
              //Mostramos el mensaje de que se ha subido con éxito
              //echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
              //Mostramos la imagen subida
              //echo '<p><img src="assets/images/'.$archivo.'"></p>';
            } else {

              //Si no se ha podido subir la imagen, mostramos un mensaje de error
              echo "errorImagenServer";
              return;
            }
          }
        }

        if ($_cons != null && $irol == 1) {
          //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
          if (!((strpos($conTipo, "jpeg") || strpos($conTipo, "jpg") || strpos($conTipo, "png") || strpos($conTipo, "pdf")) && ($tamanoCons < 20000000))) {

            //Alerta si la constancia NO es valida
            echo "errorConstanciaTipoTamaño";
            return;

          } else {
            //Si la imagen es correcta en tamaño y tipo
            //Se intenta subir al servidor
            if (move_uploaded_file($tempCons, '../userfiles/pdf/' . $conName)) {
              //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
              chmod('../userfiles/pdf/' . $conName, 0777);
              //Mostramos el mensaje de que se ha subido con éxito
              //echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
              //Mostramos la imagen subida
              //echo '<p><img src="assets/images/'.$archivo.'"></p>';
            } else {
              
              //Si no se ha podido subir la imagen, mostramos un mensaje de error
              echo "errorConsServer";
              return;

            }
          }
        }

        //Valida el rol del usuario, si es diferente de Empresa, se asgigna el estatus en 1, sino queda en 0
        if($irol != 1) {
          
          //Asignacion del estatus en 1 para el Usuario/Estudiante
          $_status = 1;

          //Validacion de la diferencia de edad entre la fecha actual y la de nacimiento del Usuario/Estudiante
          $fecha_actual = new DateTime(); // Fecha actual
          $fecha_de_nacimiento = new DateTime($_fecha_nac);
          $edad = $fecha_actual->diff($fecha_de_nacimiento); // Diferencia entre fechas

          // Verificar si el usuario tiene 18 años o más
          if ($edad->y < 18) {

            //Alerta si el Usuari/Estudiante NO es mayor de edad
            echo "errorEdad";
            return;

          }
        }

        //$f_id_usuario = $_findUser -> consec_usuario();
        
        //Guardamos a los usuarios Nuevos
        $newuser = $nuevoUsuario->guardar_usuario($f_id_usuario, $_nombre, $_apellido, $_correo, $_fecha_nac, $_no_identificacion, $_password, $_sexo, $_region, $_telefono, $_domicilio, $irol, $_status, $_ruta, $_cons, $_razon, $_token);

      } else {

        //Alerta si el Correo está registrado en la base de datos
        echo "errorCorreoDuplicado";

      }

    }

    if ($newuser == true) {
      if ($irol == 1) {
        echo "true1";
        return;
      } else if ($irol == 2) {
        echo "true2";
        return;
      } else if ($irol == 4) {
        echo "true4";
        return;
      }
    }
  }
}
$irol = $_SESSION['rol'];
?>