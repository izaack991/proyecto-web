<?php
// Comentar la linea de abajo si desea mostrar los errores
error_reporting(0);
session_start();
$alerta = '';
if(isset($_SESSION['tiempo']) ) {
    $vida_session = time() - $_SESSION['tiempo'];
}
$_SESSION['tiempo'] = time();
include('../clases/save.class.php');
include('../clases/function.class.php');
?>
