<?php
require_once('busqueda.php');

// Función para obtener todas las vacantes con el mismo puesto
function obtenerVacantesMismoPuesto($pdo, $puesto) {
    $consulta = $pdo->prepare("SELECT v.*, f.id_vacante AS verificacionFav FROM tbl_vacantes as v LEFT JOIN tbl_favoritos f ON v.id_vacante = f.id_vacante  WHERE v.puesto = ?");
    $consulta->execute([$puesto]);
    return $consulta->fetchAll();
}

// Si se ha proporcionado un parámetro de puesto en la URL, mostrar todas las vacantes con el mismo puesto
if(isset($_GET['puesto'])) {
    $puesto = $_GET['puesto'];
    $vacantesMismoPuesto = obtenerVacantesMismoPuesto($pdo, $puesto);
    foreach($vacantesMismoPuesto as $vacante) {
        echo '<div class="col-lg-4 col-md-6 col-sm-12">';
        echo '<div class="card shadow p-3 mb-5 bg-body rounded">';
        echo '<div id="notification-container" class="fixed-bottom mb-3" style="z-index: 1000; right: 0;"></div>';
        echo '<div class="card-header">';
        echo '<div class="d-flex justify-content-between align-items-center"><h4 class="card-title text-danger text-center mb-1">' . $vacante['puesto'] . '</h4>';
    
        if ($vacante['verificacionFav'] == null){
            echo '<div class="ml-auto">
                    <button type="button" id="btnfavoritos" class="border-0 bg-white text-secondary p-0 mt-2" data-vacante="' . $vacante['id_vacante'] . '" style="outline: none;"><i id="campana' . $vacante['id_vacante'] . '" class="far fa-bookmark text-primary" style="font-size:1.8rem;transition: transform 0.1s ease;background-color:#f7f7f7;"></i></button>
                 </div></div>';
        } else {
            echo '<div class="ml-auto">
                    <button type="button" id="btnfavoritos" class="border-0 bg-white text-secondary p-0 mt-2" data-vacante="' . $vacante['id_vacante'] . '" style="outline: none;"><i id="campana' . $vacante['id_vacante'] . '" class="fas fa-bookmark text-primary" style="font-size:1.8rem;transition: transform 0.1s ease;background-color:#f7f7f7;"></i></button>
                 </div></div>';
        }
    
        echo '</div>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $vacante['empresa'] . '</h5>';
        echo '<h6 class="card-title">' . $vacante['ciudad'] . ', ' . $vacante['region'] . '</h6>';
        echo '<h6 class="card-title"  style="text-align: justify; font-weight: normal;">' . substr($vacante['datos_adicionales'], 0, 200) . '...</h6>';
        echo '<form action="seleccionar_vacantes.php" method="POST">';
        echo '<input type="text" value="' . $vacante['id_vacante'] . '" name="id_vacante" id="id_vacante" hidden>';
        echo '<input type="submit" value="Leer más" class="btn btn-primary btn-vacante" data-vacante2="' . $vacante['id_vacante'] . '">';
        echo '</form></div></div></div>';

    }
}
?>

