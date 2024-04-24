<?php
require_once('prueba.php');

// Función para obtener todas las vacantes con el mismo puesto
function obtenerVacantesMismoPuesto($pdo, $puesto) {
    $consulta = $pdo->prepare("SELECT * FROM tbl_vacantes WHERE puesto = ?");
    $consulta->execute([$puesto]);
    return $consulta->fetchAll();
}

// Si se ha proporcionado un parámetro de puesto en la URL, mostrar todas las vacantes con el mismo puesto
if(isset($_GET['puesto'])) {
    $puesto = $_GET['puesto'];
    $vacantesMismoPuesto = obtenerVacantesMismoPuesto($pdo, $puesto);
    foreach($vacantesMismoPuesto as $vacante) {
        echo '<div class="col-lg-4 col-md-6 col-sm-12" >';
        echo '<div class="card shadow p-3 mb-5 bg-body rounded">';
        echo '<div class="card-body">';
        echo '<h4 class="card-title text-danger">' . $vacante['puesto'] . '</h4>';
        echo '<h5 class="card-title">' . $vacante['empresa'] . '</h5>';
        echo '<h6 class="card-title">' . $vacante['ciudad'] . ', ' . $vacante['region'] . '</h6>';
        echo '<h6 class="card-title"  style="text-align: justify; font-weight: normal;">' . substr($vacante['datos_adicionales'], 0, 200) . '</h6>';
        echo '<form action="seleccionar_vacantes.php" method="POST">';
        echo '<input type="text" value="' . $vacante['id_vacante'] . '" name="id_vacante" id="id_vacante" hidden>';
        echo '<input type="submit" value="Leer más" class="btn btn-primary">';
        echo '</form></div></div></div>';
    }
}
?>

