<?php
session_start();

include("../clases/save.class.php");
include("../clases/function.class.php");

$buscarDatos = Functions::singleton_functions();
$NuevoC = Save::singleton_guardar();
$iusuario = $_SESSION['iusuario'];
$bExperiencia = $buscarDatos->seleccionar_experiencia($iusuario);
$bFormacion = $buscarDatos->seleccionar_formacion($iusuario);
$bAficion = $buscarDatos->seleccionar_aficiones($iusuario);
$bInteres = $buscarDatos->seleccionar_interes($iusuario);
$vid_curriculum = $buscarDatos->seleccionar_vid_curriculum($iusuario);
$b_postulacion = $buscarDatos->buscarPostulacion2($iusuario);
$busuario = $buscarDatos->seleccionar_usuario($iusuario);
$bvacante = $buscarDatos->buscarVacantes($iusuario);

$tipo = $_POST['tipo'];
if ($tipo='exp'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['id'], $_POST['descripcion'], $_POST['empresa'], $_POST['fechaInicio'], $_POST['fechafin'])) {
        // Obtener los datos enviados por AJAX
        $idexp = $_POST['id'];
        $descripcion = $_POST['descripcion'];
        $empresa = $_POST['empresa'];
        $fechaInicio = $_POST['fechaInicio'];
        $fechafin = $_POST['fechafin'];
        $UCerrar=$NuevoC->actualizar_experiencia($idexp,$descripcion,$empresa,$fechaInicio,$fechafin);
        $bExperiencia = $buscarDatos->seleccionar_experiencia($iusuario);
    }
}
if ($tipo='exp'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['idexp'])) {
        // Obtener los datos enviados por AJAX
        $idexp = $_POST['idexp'];
        $UCerrar=$NuevoC->eliminar_experiencia($idexp);
        $bExperiencia = $buscarDatos->seleccionar_experiencia($iusuario);
    }
}
if ($tipo='for'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['id'], $_POST['descripcion'], $_POST['ubicacion'], $_POST['fechaInicio2'], $_POST['fechafin2'])) {
        // Obtener los datos enviados por AJAX
        $idfor = $_POST['id'];
        $descripcion = $_POST['descripcion'];
        $ubicacion = $_POST['ubicacion'];
        $fechaInicio = $_POST['fechaInicio2'];
        $fechafin = $_POST['fechafin2'];
        $UCerrar=$NuevoC->actualizar_formacion($idfor,$descripcion,$ubicacion,$fechaInicio,$fechafin);
        $bFormacion = $buscarDatos->seleccionar_formacion($iusuario);
    }
}
if ($tipo='for'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['idfor'])) {
        // Obtener los datos enviados por AJAX
        $idfor = $_POST['idfor'];
        $UCerrar=$NuevoC->eliminar_formacion($idfor);
        $bFormacion = $buscarDatos->seleccionar_formacion($iusuario);
    }
}
if ($tipo='afi'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['id'], $_POST['descripcion'])) {
        // Obtener los datos enviados por AJAX
        $idafi = $_POST['id'];
        $descripcion = $_POST['descripcion'];
        $UCerrar=$NuevoC->actualizar_aficion($idafi,$descripcion);
        $bAficion = $buscarDatos->seleccionar_aficiones($iusuario);
    }
}
if ($tipo='afi'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['idafi'])) {
        // Obtener los datos enviados por AJAX
        $idafi = $_POST['idafi'];
        $UCerrar=$NuevoC->eliminar_aficion($idafi);
        $bAficion = $buscarDatos->seleccionar_aficiones($iusuario);
    }
}
if ($tipo='int'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['id2'], $_POST['descripcion2'])) {
        // Obtener los datos enviados por AJAX
        $idint = $_POST['id2'];
        $descripcion = $_POST['descripcion2'];
        $UCerrar=$NuevoC->actualizar_interes($idint,$descripcion);
        $bInteres = $buscarDatos->seleccionar_interes($iusuario);
    }
}
if ($tipo='int'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['idint'])) {
        // Obtener los datos enviados por AJAX
        $idint = $_POST['idint'];
        $UCerrar=$NuevoC->eliminar_interes($idint);
        $bInteres = $buscarDatos->seleccionar_interes($iusuario);
    }
}
if ($tipo='nom'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['usuarioID'],$_POST['nombre'],$_POST['apellido'])) {
        // Obtener los datos enviados por AJAX
        $usuarioID = $_POST['usuarioID'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $UCerrar=$NuevoC->actualizar_nombreUsuario($usuarioID,$nombre,$apellido);
        $busuario = $buscarDatos->seleccionar_usuario($iusuario);
    }
}
if ($tipo='raz'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['usuarioID7'],$_POST['razon_social'])) {
        // Obtener los datos enviados por AJAX
        $usuarioID = $_POST['usuarioID7'];
        $razon_social = $_POST['razon_social'];
        $UCerrar=$NuevoC->actualizar_razon_social($usuarioID,$razon_social);
        $busuario = $buscarDatos->seleccionar_usuario($iusuario);
    }
}
if ($tipo='cor'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['usuarioID2'],$_POST['correo'])) {
        // Obtener los datos enviados por AJAX
        $usuarioID = $_POST['usuarioID2'];
        $correo = $_POST['correo'];
        $UCerrar=$NuevoC->actualizar_correoUsuario($usuarioID,$correo);
        $busuario = $buscarDatos->seleccionar_usuario($iusuario);
    }
}
if ($tipo='tel'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['usuarioID3'],$_POST['telefono'])) {
        // Obtener los datos enviados por AJAX
        $usuarioID = $_POST['usuarioID3'];
        $telefono = $_POST['telefono'];
        $UCerrar=$NuevoC->actualizar_telefonoUsuario($usuarioID,$telefono);
        $busuario = $buscarDatos->seleccionar_usuario($iusuario);
    }
}
if ($tipo='reg'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['usuarioID4'],$_POST['region'])) {
        // Obtener los datos enviados por AJAX
        $usuarioID = $_POST['usuarioID4'];
        $region = $_POST['region'];
        $UCerrar=$NuevoC->actualizar_regionUsuario($usuarioID,$region);
        $busuario = $buscarDatos->seleccionar_usuario($iusuario);
    }
}
if ($tipo='dom'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['usuarioID5'],$_POST['domicilio'])) {
        // Obtener los datos enviados por AJAX
        $usuarioID = $_POST['usuarioID5'];
        $domicilio = $_POST['domicilio'];
        $UCerrar=$NuevoC->actualizar_domicilioUsuario($usuarioID,$domicilio);
        $busuario = $buscarDatos->seleccionar_usuario($iusuario);
    }
}
if ($tipo='vac'){
    if (isset($_POST['vacanteID'],$_POST['puesto'],$_POST['sueldo'],$_POST['lugar'],$_POST['region'],$_POST['ciudad'],$_POST['datos'],$_POST['fechainicio'],$_POST['fechafin'],)) {
        $vacanteID = $_POST['vacanteID'];
        $puesto = $_POST['puesto'];
        $sueldo = $_POST['sueldo'];
        $lugar = $_POST['lugar'];
        $region = $_POST['region'];
        $ciudad = $_POST['ciudad'];
        $datos = $_POST['datos'];
        $fechainicio = $_POST['fechainicio'];
        $fechafin = $_POST['fechafin'];
        $UCerrar=$NuevoC->actualizar_vacante($vacanteID,$puesto,$sueldo,$lugar,$region,$ciudad,$datos,$fechainicio,$fechafin);
        $bvacante = $buscarDatos->buscarVacantes($iusuario);
    }
}

if ($tipo='pdf'){
        // Directorio donde se guardarán las imágenes
        $directorio = '../userfiles/pdf/';
        if (!file_exists($directorio)) {
            mkdir($directorio, 0777, true);
        }
        if ($_FILES['constancia']) {
            $usuarioID = $_POST['usuarioID8'];
            $nombreImagen = $_FILES['constancia']['name'];
            $archivo = $directorio . basename($nombreImagen);

            // Eliminar todas las imágenes con el mismo nombre sin importar la extensión
            $archivosSimilares = glob($directorio . pathinfo($nombreImagen, PATHINFO_FILENAME) . ".*");
            foreach ($archivosSimilares as $archivoSimilar) {
                unlink($archivoSimilar);
            }

            if (move_uploaded_file($_FILES['constancia']['tmp_name'], $archivo)) {
                // Guardar la ruta de la imagen en la base de datos
                $ruta_constancia = $archivo;
                $UCerrar=$NuevoC->actualizar_ruta_constanciaEmpresa($usuarioID,$ruta_constancia);
                $busuario = $buscarDatos->seleccionar_usuario($iusuario);
            } else {
                echo "Hubo un error al subir la imagen.";
            }
        } else {
            echo "No se recibió ninguna imagen.";
        }
        
}
if ($tipo='img'){
        // Directorio donde se guardarán las imágenes
        $directorio = '../userfiles/img/';
        if (!file_exists($directorio)) {
            mkdir($directorio, 0777, true);
        }
        if ($_FILES['imagen']) {
            $usuarioID = $_POST['usuarioID6'];
            $nombreImagen = $_FILES['imagen']['name'];
            $archivo = $directorio . basename($nombreImagen);

            // Eliminar todas las imágenes con el mismo nombre sin importar la extensión
            $archivosSimilares = glob($directorio . pathinfo($nombreImagen, PATHINFO_FILENAME) . ".*");
            foreach ($archivosSimilares as $archivoSimilar) {
                unlink($archivoSimilar);
            }

            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $archivo)) {
                // Guardar la ruta de la imagen en la base de datos
                $ruta_imagen = $archivo;
                $UCerrar=$NuevoC->actualizar_ruta_imagenUsuario($usuarioID,$ruta_imagen);
                $busuario = $buscarDatos->seleccionar_usuario($iusuario);
            } else {
                echo "Hubo un error al subir la imagen.";
            }
        } else {
            echo "No se recibió ninguna imagen.";
        }
        
}
if ($tipo='pos'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['idpos'])) {
        // Obtener los datos enviados por AJAX
        $idpos = $_POST['idpos'];
        $UCerrar=$NuevoC->eliminar_postulacion($idpos);
        $b_postulacion = $buscarDatos->buscarPostulacion2($iusuario);
    }
}
if ($tipo='vid'){
    // Verificar si se han recibido todos los datos necesarios
    if (isset($_POST['idvid'])) {
        // Obtener los datos enviados por AJAX
        $idvid = $_POST['idvid'];
        $UCerrar=$NuevoC->eliminar_video_curriculum($idvid);

        $archivo_a_eliminar = '../userfiles/videos/video_' .$iusuario. '.mp4';
        // Verificar si el archivo existe antes de intentar eliminarlo
        if (file_exists($archivo_a_eliminar)) {
            // Intentar eliminar el archivo
            if (unlink($archivo_a_eliminar)) {
                echo "El archivo $archivo_a_eliminar ha sido eliminado correctamente.";
            } else {
                echo "Error al intentar eliminar el archivo $archivo_a_eliminar.";
            }
        } else {
            echo "El archivo $archivo_a_eliminar no existe.";
        }

        $vid_curriculum = $buscarDatos->seleccionar_vid_curriculum($iusuario);
    }
}

$datos_totales = array(
    'experiencia' => $bExperiencia,
    'formacion' => $bFormacion,
    'aficion' => $bAficion,
    'interes' => $bInteres,
    'video_curriculum' => $vid_curriculum,
    'postulacion' => $b_postulacion,
    'usuario' => $busuario,
    'vacante' => $bvacante,
);

echo json_encode($datos_totales);
?>