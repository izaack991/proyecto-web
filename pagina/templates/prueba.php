<?php 
require_once('../clases/conexion.class.php');

$pdo = Conexion::singleton_conexion();

// Verificar si el índice "buscar" está definido en $_POST
if(isset($_POST["buscar"])) {
    // Consulta para obtener los resultados de la búsqueda
    $buscardor = $pdo->prepare("SELECT * FROM tbl_vacantes WHERE puesto LIKE LOWER(?) OR ciudad LIKE LOWER(?) OR region LIKE LOWER(?)");
    $buscardor->execute(["%".$_POST["buscar"]."%", "%".$_POST["buscar"]."%", "%".$_POST["buscar"]."%"]);
    $resultados = $buscardor->fetchAll();
} else {
    // Si "buscar" no está definido, puedes asignar un valor por defecto o manejarlo de otra manera.
    $resultados = array(); // Por ejemplo, aquí se inicializa como un array vacío.
}
?>
