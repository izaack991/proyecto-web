<?php
session_start();

include('../clases/function.class.php');



// Verificar si el usuario está autenticado
// if (isset($_SESSION['iusuario'])) {
//     header("location:login.php?xd=2");
//     exit; // Detener la ejecución del script después de la redirección
// }
$nuevoSingleton = Functions::singleton_functions();
$iusuario = $_SESSION['iusuario'];
$nombreUsuario = $_SESSION['nomusuario'];
$notificacionexperiencia = $nuevoSingleton->notificacionexperiencia($iusuario);
$notificacionformacion = $nuevoSingleton->notificacionformacion($iusuario);
$notificacionaficiones = $nuevoSingleton->notificacionaficiones($iusuario);
$notificacioninteres = $nuevoSingleton->notificacioninteres($iusuario);

if(isset($_GET['vacante']))
{
    $vac = $_GET['vacante'];
    header("location:seleccionar_vacantes.php?vacante=$vac");
}
if($notificacionexperiencia==0)
{
    $COUNTLAB=1;

}
else 
{
    $COUNTLAB=0;
}
if($notificacionformacion==0)
{
    $COUNTFOR=1;
}
else 
{
    $COUNTFOR=0;
}
if($notificacionaficiones==0)
{
    $COUNTAFI=1;
}
else 
{
    $COUNTAFI=0;
}
if($notificacioninteres==0)
{
    $COUNTINT=1;
}
else 
{
    $COUNTINT=0;
}

$COUNT = $COUNTLAB + $COUNTFOR + $COUNTAFI + $COUNTINT;

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
?>
