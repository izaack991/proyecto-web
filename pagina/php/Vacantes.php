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
include("../templates/vacantes.php");

// $smarty = new Smarty;
$titulo = "Proyecto Web";
$alerta = '';

// Verificar si el usuario está autenticado
// if (isset($_SESSION['iusuario'])) {
//     header("location:login.php?xd=1");
//     exit; // Detener la ejecución del script después de la redirección
// }

// Instanciar clases y obtener datos necesarios
$nuevoUsuario = Save::singleton_guardar();
$_findUser = Functions::singleton_functions();
$_findPais = Functions::singleton_functions();
$_pais = $_findPais->buscaPaises();
$nuevoSingleton = Functions::singleton_functions();

// Obtener notificaciones de postulaciones
$iusuario = $_SESSION['iusuario'];
$notificacionpostulaciones = $nuevoSingleton->notificacionpostulaciones($iusuario);

// Asignar valores a las variables Smarty
$COUNTPOS = ($notificacionpostulaciones >= 1) ? $notificacionpostulaciones : 0;
$ECOUNT = $COUNTPOS;

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

    $alerta = "<script>
    Swal.fire({
        title: '¡Se ha publicado la vacante Correctamente!',
        icon: 'success'
    }).then(() => {
        window.location.href = 'indexEmpresa.php';
      });</script>";
            
    if($notificacionpostulaciones>=1)
    {
    $COUNTPOS=$notificacionpostulaciones;
    }
    else 
    {
    $COUNTPOS=0;
    }
    $_fecha = date('Y-m-d H:i:s');
    $_hora = $vida_session; // Considera si este es el valor correcto para $_hora
    $_latitud = $_POST['txtlatitud'];
    $_longitud = $_POST['txtlongitud'];
    $_ubicacion = 'Latitud: ' . $_latitud . ' Longitud: ' . $_longitud;
    $newlogusuario = $nuevoUsuario->guardar_log_usuario($_idusuario, $_ubicacion, $_movimiento, $_fecha, $_hora);

    // Actualizar notificaciones de postulaciones
    $notificacionpostulaciones = $nuevoSingleton->notificacionpostulaciones($iusuario);
    $COUNTPOS = ($notificacionpostulaciones >= 1) ? $notificacionpostulaciones : 0;
    $ECOUNT = $COUNTPOS;
    
    if ($newuser == true) {
        // Actualizar notificaciones de postulaciones si es necesario
        $alerta = "<script> 
        Swal.fire({
            title: '¡Vacante Guardada Correctamente!',
            icon: 'success'
        }).then(() => {
            window.location.href = 'indexEmpresa.php';
        });            
    </script>";
    }
    else
    {
        $alerta = "<script> Swal.fire({
            title: 'Error!',
            text: 'No se pudo guardar la vacante correctamente',
            icon: 'error'
            }).then(() =>{
                window.location.href = 'Vacantes.php';
            });
            </script>";
    
    }
}

// Mostrar el template Vacantes.tpl
// $smarty->display("../smarty/templates/Vacantes.tpl");
?>

