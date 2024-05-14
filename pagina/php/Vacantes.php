<?php
error_reporting(0);
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

// Procesar formulario si se envió
if (isset($_POST['dateFin'])) {
    try {
        // Calculamos las coordenadas del Usuario y las Concatenamos
        $_latitud = $_POST['txtlatitud'];
        $_longitud = $_POST['txtlongitud'];
        $_ubicacion = $_latitud.', '.$_longitud;
        
        $_idusuario = $_SESSION['iusuario'];
        $_puesto = $_POST['txtpuesto'];
        $_empresa = $_SESSION['nomusuario'];
        $_sueldo = $_POST['txtsueldo'];
        $_lugar = $_POST['cmbpais'];
        $_datos = $_POST['txtdatos'];
        $_fechainicio = $_POST['dateInicio'];
        $_fechafin = $_POST['dateFin'];
        $_region = $_POST['txtregion'];
        $_ciudad = $_POST['txtciudad'];
        $fecha_actual = strtotime(date('Y-m-d'));
        $_urgente = $_POST['chkurgente'];
        $tswTipo = $_POST['tswTipo'];
        $_direccion = $_ubicacion;
        // $_direccion = $_POST['txtdireccion'];

        // Guardar datos de la vacante
        $f_id_vacantes = $_findUser->consec_vacantes();
        $newVacante = $nuevoUsuario->Guardar_id_vacantes($f_id_vacantes, $_idusuario, $_puesto, $_empresa, $_sueldo, $_lugar, $_datos, $_fechainicio, $_fechafin,$_region,$_ciudad, $_urgente, $tswTipo, $_direccion);

        // Guardar log de usuario
        date_default_timezone_set('America/Mexico_City');
        $_movimiento = 'Vacantes(Guardar)';
        $_fecha = date('Y-m-d H:m:s');
        $_hora = $vida_session;
        $tipo=NULL;
        $newlogusuario = $nuevoUsuario->guardar_log_usuario($_idusuario, $_ubicacion, $_movimiento, $_fecha, $_hora,$tipo);

        // Envío de la alerta de guardado
        if ($newVacante == true) {
            echo "true";
            return "1";
        }

    } catch (Exception $e) {
        // Manejar la excepción si ocurre algún error
        echo 'Error al procesar la solicitud: ' . $e->getMessage();
    }
    
}

echo json_encode($_pais);
?>
