<?php 
require_once('../clases/conexion.class.php');
session_start();
$pdo = Conexion::singleton_conexion();

// Consulta para obtener los resultados de la búsqueda
$buscardor = $pdo->prepare("SELECT * FROM tbl_vacantes WHERE puesto LIKE LOWER(?) OR ciudad LIKE LOWER(?) OR region LIKE LOWER(?)");
$buscardor->execute(["%".$_POST["buscar"]."%", "%".$_POST["buscar"]."%", "%".$_POST["buscar"]."%"]);
$resultados = $buscardor->fetchAll();

?>

<h6 class="card-title">Resultados encontrados:</h6>

<div id="datos_buscador">
    <?php foreach($resultados as $resultado): ?>
        <p class="card-text resultado" data-puesto="<?php echo $resultado['puesto']; ?>">
            <?php echo $resultado["puesto"]; ?> - <?php echo $resultado["ciudad"] ?>, <?php echo $resultado["region"] ?>
        </p>
    <?php endforeach; ?>
</div>



