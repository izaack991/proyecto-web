<?php
// Configurar la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_web";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
$_idusuario = 2;    
// Consulta SQL para obtener los datos de la tabla
$sql = "SELECT tbl_postulacion.*, CONCAT(tbl_usuario.nombre,' ',tbl_usuario.apellido) AS nombreUsuario, tbl_usuario.correo, tbl_vacantes.puesto FROM tbl_postulacion INNER JOIN tbl_usuario ON tbl_postulacion.id_usuario = tbl_usuario.id_usuario INNER JOIN tbl_vacantes ON tbl_postulacion.id_vacante = tbl_vacantes.id_vacante WHERE tbl_vacantes.id_empresa=$_idusuario AND  tbl_postulacion.status=1;";
$result = $conn->query($sql);
   
// Array para almacenar los datos
$data = array();

if ($result->num_rows > 0) {
    // Obtener cada fila de resultados y guardarla en el array
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Enviar los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($data);

// Cerrar la conexión
$conn->close();
?>
