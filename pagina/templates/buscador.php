<?php 
require_once('../clases/conexion.class.php');

$pdo = Conexion::singleton_conexion();

// Consulta para obtener los resultados de la búsqueda
$buscardor = $pdo->prepare("SELECT * FROM tbl_vacantes WHERE puesto LIKE LOWER(?) OR ciudad LIKE LOWER(?) OR region LIKE LOWER(?)");
$buscardor->execute(["%".$_POST["buscar"]."%", "%".$_POST["buscar"]."%", "%".$_POST["buscar"]."%"]);
$resultados = $buscardor->fetchAll();

// Función para obtener todas las vacantes con el mismo puesto
function obtenerVacantesMismoPuesto($pdo, $puesto) {
    $consulta = $pdo->prepare("SELECT * FROM tbl_vacantes WHERE puesto = ?");
    $consulta->execute([$puesto]);
    return $consulta->fetchAll();
}

?>

<h6 class="card-title">Resultados encontrados:</h6>

<div id="datos_buscador">
    <?php foreach($resultados as $resultado): ?>
        <p class="card-text resultado" data-puesto="<?php echo $resultado['puesto']; ?>">
            <?php echo $resultado["puesto"]; ?> - <?php echo $resultado["ciudad"] ?>, <?php echo $resultado["region"] ?>
        </p>
    <?php endforeach; ?>
</div>

<?php
// Si se ha proporcionado un parámetro de puesto en la URL, mostrar todas las vacantes con el mismo puesto
if(isset($_GET['puesto'])) {
    $puesto = $_GET['puesto'];
    $vacantesMismoPuesto = obtenerVacantesMismoPuesto($pdo, $puesto);
    echo "<h6 class='card-title'>Vacantes con el mismo puesto: $puesto</h6>";
    foreach($vacantesMismoPuesto as $vacante) {
        echo "<p class='card-text'>".$vacante['puesto']." - ".$vacante['ciudad'].", ".$vacante['region']."</p>";
    }
}
?>
