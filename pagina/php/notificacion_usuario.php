<?php
session_start();

include('../clases/function.class.php');

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'funcion1':
            NotificacionesNuevas();
            break;
        case 'funcion2':
            NotificacionesIncial();
            break;
        default:
            echo "Acción no válida";
    }
} else {
    echo "Acción no especificada";
}

function NotificacionesIncial()
{
    $nuevoSingleton = Functions::singleton_functions();
    $iusuario = $_SESSION['iusuario'];
    $nombreUsuario = $_SESSION['nomusuario'];
    $notificacionexperiencia = $nuevoSingleton->notificacionexperiencia($iusuario);
    $notificacionformacion = $nuevoSingleton->notificacionformacion($iusuario);
    $notificacionaficiones = $nuevoSingleton->notificacionaficiones($iusuario);
    $notificacioninteres = $nuevoSingleton->notificacioninteres($iusuario);

    if (isset($_GET['vacante'])) {
        $vac = $_GET['vacante'];
        header("location:seleccionar_vacantes.php?vacante=$vac");
    }
    if ($notificacionexperiencia == 0) {
        $COUNTLAB = 1;
    } else {
        $COUNTLAB = 0;
    }
    if ($notificacionformacion == 0) {
        $COUNTFOR = 1;
    } else {
        $COUNTFOR = 0;
    }
    if ($notificacionaficiones == 0) {
        $COUNTAFI = 1;
    } else {
        $COUNTAFI = 0;
    }
    if ($notificacioninteres == 0) {
        $COUNTINT = 1;
    } else {
        $COUNTINT = 0;
    }

    $COUNT = $COUNTLAB + $COUNTFOR + $COUNTAFI + $COUNTINT;

    global $contador;
    $contador = $COUNT;
    $contador_exp = $COUNTLAB;
    $contador_for = $COUNTFOR;
    $contador_afi = $COUNTAFI;
    $contador_int = $COUNTINT;

    echo json_encode(array(
        'contador' => $contador,
        'contador_exp' => $contador_exp,
        'contador_for' => $contador_for,
        'contador_afi' => $contador_afi,
        'contador_int' => $contador_int,
        'nombreUsuario' => $nombreUsuario
    ));
}

function NotificacionesNuevas()
{
    $nuevoSingleton = Functions::singleton_functions();
    $iusuario = $_SESSION['iusuario'];
    $nombreUsuario = $_SESSION['nomusuario'];
    $notificacionexperiencia1 = $nuevoSingleton->notificacionexperiencia($iusuario);
    $notificacionformacion1 = $nuevoSingleton->notificacionformacion($iusuario);
    $notificacionaficiones1 = $nuevoSingleton->notificacionaficiones($iusuario);
    $notificacioninteres1 = $nuevoSingleton->notificacioninteres($iusuario);

    global $notificacionexperiencia;
    global $notificacionformacion;
    global $notificacionaficiones;
    global $notificacioninteres;

    if ($notificacionexperiencia1 != $notificacionexperiencia) {
        if ($notificacionexperiencia1 == 0) {
            $newCOUNTLAB = 1;
        } else {
            $newCOUNTLAB = 0;
        }
    } else if ($notificacionexperiencia == 0) {
        $newCOUNTLAB = 1;
    } else {
        $newCOUNTLAB = 0;
    }

    if ($notificacionformacion1 != $notificacionformacion) {
        if ($notificacionformacion1 == 0) {
            $newCOUNTFOR = 1;
        } else {
            $newCOUNTFOR = 0;
        }
    } else if ($notificacionformacion == 0) {
        $newCOUNTFOR = 1;
    } else {
        $newCOUNTFOR = 0;
    }

    if ($notificacionaficiones1 != $notificacionaficiones) {
        if ($notificacionaficiones1 == 0) {
            $newCOUNTAFI = 1;
        } else {
            $newCOUNTAFI = 0;
        }
    } else if ($notificacionaficiones == 0) {
        $newCOUNTAFI = 1;
    } else {
        $newCOUNTAFI = 0;
    }

    if ($notificacioninteres1 != $notificacioninteres) {
        if ($notificacioninteres1 == 0) {
            $newCOUNTINT = 1;
        } else {
            $newCOUNTINT = 0;
        }
    } else if ($notificacioninteres == 0) {
        $newCOUNTINT = 1;
    } else {
        $newCOnewCOUNTINTUNTLAB = 0;
    }

    if (($notificacionexperiencia1 != $notificacionexperiencia)
        || ($notificacionformacion1 != $notificacionformacion)
        || ($notificacionaficiones1 != $notificacionaficiones)
        || ($notificacioninteres1 != $notificacioninteres)
    ) {
        $COUNT = $newCOUNTLAB + $newCOUNTFOR + $newCOUNTAFI + $newCOUNTINT;

        $contador = $COUNT;
        $contador_exp = $newCOUNTLAB;
        $contador_for = $newCOUNTFOR;
        $contador_afi = $newCOUNTAFI;
        $contador_int = $newCOUNTINT;

        echo json_encode(array(
            'contador' => $contador,
            'contador_exp' => $contador_exp,
            'contador_for' => $contador_for,
            'contador_afi' => $contador_afi,
            'contador_int' => $contador_int,
            'nombreUsuario' => $nombreUsuario
        ));
    }
}
