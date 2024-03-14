<?php
session_start();
// include('../../../smarty-master/libs/smarty.class.php');
include('../clases/function.class.php');
include("../templates/index.php");
$titulo = "Inicio";
$_findvacante = Functions::singleton_functions();
$_noticia = $_findvacante->buscarNota();

$_bvacantes = $_findvacante->buscarimagenvacante();

$Titulo = $titulo;
$Noticias = $_noticia;
$Bvacante = $_bvacantes;
echo $_noticia;
?>
