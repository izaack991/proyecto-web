<?php
session_start();

// Verificar si la sesión está iniciada y establecer el tiempo de vida de la sesión
if (isset($_SESSION['tiempo'])) {
    $vida_session = time() - $_SESSION['tiempo'];
}
$_SESSION['tiempo'] = time();

// Incluir clases y bibliotecas necesarias
include('../clases/save.class.php');
include('../clases/function.class.php');

// Instanciar clases y obtener datos necesarios
$nuevoUsuario = Save::singleton_guardar();
$_findUser = Functions::singleton_functions();
$_findPais = Functions::singleton_functions();
$_pais = $_findPais->buscaPaises();
$nuevoSingleton = Functions::singleton_functions();

// Obtener notificaciones de postulaciones
$iusuario = $_SESSION['iusuario'];
$notificacionpostulaciones = $nuevoSingleton->notificacionpostulaciones($iusuario);

// Procesar formulario si se envió
if (isset($_POST['dateFin'])) {
    $_idusuario = $_SESSION['iusuario'];
    $_puesto = $_POST['txtpuesto'];
    $_empresa = $_POST['txtempresa'];
    $_sueldo = $_POST['txtsueldo'];
    $_lugar = $_POST['cmbpais'];
    $_datos = $_POST['txtdatos'];
    $_fechainicio = $_POST['dateInicio'];
    $_fechafin = $_POST['dateFin'];

    // Guardar datos de la vacante
    $f_id_vacantes = $_findUser->consec_vacantes();
    $newuser = $nuevoUsuario->Guardar_id_vacantes($f_id_vacantes, $_idusuario, $_puesto, $_empresa, $_sueldo, $_lugar, $_datos, $_fechainicio, $_fechafin);

    // Guardar log de usuario
    date_default_timezone_set('America/Mexico_City');
    $_movimiento = 'Vacantes(Guardar)';
    $_fecha = date('Y-m-d H:m:s');
    $_hora = $vida_session;
    $_latitud = $_POST['txtlatitud']; 
    $_longitud = $_POST['txtlongitud']; 
    $_ubicacion = 'Latitud: '.$_latitud.' Longitud: '.$_longitud;
    $newlogusuario = $nuevoUsuario->guardar_log_usuario($_idusuario,$_ubicacion,$_movimiento,$_fecha,$_hora);

    $_fecha = date('Y-m-d H:i:s');
    $_hora = $vida_session; // Considera si este es el valor correcto para $_hora
    $_latitud = $_POST['txtlatitud'];
    $_longitud = $_POST['txtlongitud'];
    $_ubicacion = 'Latitud: ' . $_latitud . ' Longitud: ' . $_longitud;
    $newlogusuario = $nuevoUsuario->guardar_log_usuario($_idusuario, $_ubicacion, $_movimiento, $_fecha, $_hora);
    
    if ($newuser ) {
        echo "true";
    }
}
// else{
//     echo "errorSave";
// }
echo json_encode($_pais);
?>

