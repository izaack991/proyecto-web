<?php 
session_start();
include('../clases/save.class.php');
include('../clases/function.class.php');

$_idusuario = $_SESSION['iusuario'];

// Recuperar el número de página de la solicitud AJAX
$page = isset($_POST['page']) ? intval($_POST['page']) : 0;
$limit = 9;

$nuevaPostulacion = save::singleton_guardar();
$_findExperiencia = Functions::singleton_functions();

// Lógica para cargar las vacantes según la página solicitada
if ($page == 0) {
    // Cargar las vacantes iniciales al iniciar la página por primera vez
    $_vacantes1 = $_findExperiencia->cargarVacantesIniciales($_idusuario, $limit);
} elseif ($page > 0) {
    // Cargar las siguientes vacantes disponibles sin repetir las anteriores
    $_vacantes1 = $_findExperiencia->cargarSiguienteVacantes($_idusuario, $page, $limit);
} elseif ($page < 0) {
    // Retroceder a las vacantes anteriormente cargadas
    $_vacantes1 = $_findExperiencia->cargarVacantesAnteriores($_idusuario, $page, $limit);
}
echo json_encode($_vacantes1);
?>
