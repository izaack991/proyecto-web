<?php
session_start();

include("../clases/save.class.php");
include("../clases/function.class.php");

$buscarDatos = Functions::singleton_functions();
$NuevoC = Save::singleton_guardar();
$id_favoritos = $buscarDatos->consec_favoritos();
$iusuario = $_SESSION['iusuario'];
$vacanteID = $_POST["vacanteID"];
$bfavorito = $buscarDatos->verificar_favoritos($iusuario,$vacanteID);

if ($bfavorito) {
    // Si el elemento ya está en favoritos, entonces quitarlo
    $quitarFav=$NuevoC->quitarFavoritos($iusuario,$vacanteID);
    echo "Se eliminó de favoritos";
} else {
    // Si el elemento no está en favoritos, entonces agregarlo
    $agregarFav=$NuevoC->agregarFavoritos($id_favoritos,$iusuario,$vacanteID);
    echo "Se agregó a favoritos";
}
?>