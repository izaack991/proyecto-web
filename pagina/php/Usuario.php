<?php
error_reporting(0);
session_start();
include ('../clases/save.class.php');
include ('../clases/function.class.php');
$nuevoUsuario = Save::singleton_guardar();
$_findUser = Functions::singleton_functions();
$_compCorreo = Functions::singleton_functions();
$irol = $_SESSION['rol'];
//print_r($_SESSION);

if (isset($_POST['txt_PASSWORD']) && (isset($_POST['txt_PASSWORD2']))) {
  $_ruta = $_FILES['txtruta'];
  $_cons = $_FILES['txtcons'];
  if ($_POST['txt_PASSWORD'] != $_POST['txt_PASSWORD2']) {
    $alerta = "<script> Swal.fire('¡Las Contraseñas NO coinciden!');</script>";
    echo "errorPassword";
    return;
  } else {
    if ($irol == 1 && $_ruta == null) {
      //$alerta = "<script> Swal.fire('¡No subió la Imagen de la Empresa!');</script>";
      echo "errorImagenEmpresa";
      return;
    } else if ($irol == 1 && $_cons == null) {
      echo "errorConstancia";
      return;
    } else {
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
      $_status = 0;
      $_token = rand(1000, 9999);

      // Enviar el correo electrónico con el token de verificación
      $para = $_correo;
      $titulo = 'Token de verificación';
      $mensaje = 'Tu token de verificación es: ' . $_token;
      $cabeceras = 'From: kevin.vall328@gmail.com';



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

      $comp_correo = $_compCorreo->buscar_correo($_correo);

      if ($comp_correo == 0) {

        if ($_ruta != null) {
          //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
          if (
            !((strpos($imgTipo, "gif") || strpos($imgTipo, "jpeg") || strpos($imgTipo, "jpg") || strpos($imgTipo, "png") || strpos($imgTipo, "bmp") || strpos($imgTipo, "tiff") || strpos($imgTipo, "webp") || strpos($imgTipo, "svg") || strpos($imgTipo, "raw") || strpos($imgTipo, "psd") || strpos($imgTipo, "ai") || strpos($imgTipo, "eps") || strpos($imgTipo, "pdf") || strpos($imgTipo, "ico") || strpos($imgTipo, "tga") || strpos($imgTipo, "pict") || strpos($imgTipo, "exif") || strpos($imgTipo, "heif") || strpos($imgTipo, "heic") || strpos($imgTipo, "avif") || strpos($imgTipo, "pbm") || strpos($imgTipo, "pgm") || strpos($imgTipo, "ppm") || strpos($imgTipo, "xcf") || strpos($imgTipo, "arw") || strpos($imgTipo, "cr2") || strpos($imgTipo, "nef") || strpos($imgTipo, "orf") || strpos($imgTipo, "rw2") || strpos($imgTipo, "dng") || strpos($imgTipo, "crw") || strpos($imgTipo, "srw") || strpos($imgTipo, "raf") || strpos($imgTipo, "mrw") || strpos($imgTipo, "erf") || strpos($imgTipo, "kdc") || strpos($imgTipo, "mos") || strpos($imgTipo, "nrw") || strpos($imgTipo, "obm") || strpos($imgTipo, "pef") || strpos($imgTipo, "x3f") || strpos($imgTipo, "rawzor") || strpos($imgTipo, "pxr") || strpos($imgTipo, "srf") || strpos($imgTipo, "3fr") || strpos($imgTipo, "qtk") || strpos($imgTipo, "rwz") || strpos($imgTipo, "xbm") || strpos($imgTipo, "wdp") || strpos($imgTipo, "hdp") || strpos($imgTipo, "ktx") || strpos($imgTipo, "kro") || strpos($imgTipo, "hdr") || strpos($imgTipo, "jxr") || strpos($imgTipo, "apng") || strpos($imgTipo, "jp2") || strpos($imgTipo, "jls") || strpos($imgTipo, "jpf") || strpos($imgTipo, "jpm") || strpos($imgTipo, "jpx") || strpos($imgTipo, "bpg") || strpos($imgTipo, "flif")) && ($tamano < 2000000))
          ) {

            $alerta = "<script> Swal.fire({
              title: 'Error!',
              text: 'La extensión o el tamaño de los archivos no es correcta. Solo se permite: .gif, .jpg, .png. y de 200 kb como máximo.',
              icon: 'error');</script>";
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
              $alerta = "<script> Swal.fire({
                title: 'Error!',
                text: 'No se pudo subir la imagen al sevidor.',
                icon: 'error');</script>";
              echo "errorImagenServer";
              return;
            }
          }
        }

        if ($_cons != null && $irol == 1) {
          //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
          if (!((strpos($conTipo, "jpeg") || strpos($conTipo, "jpg") || strpos($conTipo, "png") || strpos($conTipo, "pdf")) && ($tamanoCons < 20000000))) {

            $alerta = "<script> Swal.fire({
                title: 'Error!',
                text: 'La extensión o el tamaño de los archivos no es correcta. Solo se permite: .jpg, .png. y de 200 kb como máximo.',
                icon: 'error');</script>";
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
              $alerta = "<script> Swal.fire({
                  title: 'Error!',
                  text: 'No se pudo subir la imagen al sevidor.',
                  icon: 'error');</script>";
              echo "errorConsServer";
              return;
            }
          }
        }

        //$f_id_usuario = $_findUser -> consec_usuario();
        $newuser = $nuevoUsuario->guardar_usuario($f_id_usuario, $_nombre, $_apellido, $_correo, $_fecha_nac, $_no_identificacion, $_password, $_sexo, $_region, $_telefono, $_domicilio, $irol, $_status, $_ruta, $_cons, $_razon, $_token);

      } else {
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