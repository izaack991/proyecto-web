<?php

include("../clases/function.class.php");

$buscarVacantePostulada = Functions::singleton_functions();

if (isset($_GET['id_postulacion'])) {
    $id_postulacion = $_GET['id_postulacion'];

    $b_postulacion = $buscarVacantePostulada->buscarVacantePostulada($id_postulacion);
}

echo json_encode(['vacante' => $b_postulacion]);
?>