<?php
session_start();
// include('../../../smarty-master/libs/smarty.class.php');
include('../clases/function.class.php');
$titulo = "Index";
$_findvacante = Functions::singleton_functions();
$_noticia = $_findvacante->buscarNota();

$_bvacantes = $_findvacante->buscarimagenvacante();

include("../templates/index.php");
?>
