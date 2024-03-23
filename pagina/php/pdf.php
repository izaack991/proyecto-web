<?php

require "../pdf/code128.php";

$pdf = new PDF_Code128('P','mm','Letter');
$pdf->SetMargins(16,16,16);
$pdf->AddPage();

session_start();
include('../clases/save.class.php');
include('../clases/function.class.php');

$id_empresa=$_SESSION['iusuario'];
$_finduser = Functions::singleton_functions();
$nuevoUsuario = Save::singleton_guardar();
$id_postulacion = $_GET['vac'];
$id_usuario = $_GET['ie'];
$v_experiencia = 7;
$postulaciones = $_finduser->seleccionar_postulacion($id_postulacion);
$experiencia = $_finduser->seleccionar_experiencia($id_usuario);
$formacion = $_finduser->seleccionar_formacion($id_usuario);
$aficiones = $_finduser->seleccionar_aficiones($id_usuario);
$interes = $_finduser->seleccionar_interes($id_usuario);
foreach($postulaciones as $index => $value){
    $nombre  = $value['nombreUsuario'];
    $puesto  = $value['puesto'];
}
//$pdf->SetMargins(10, 10, 10, 10);
$margen_izquierdo = 22;
//$margen_derecho = ;
$ancho_disponible = $pdf->GetPageWidth() - $margen_izquierdo;
$ancho_celda = ($ancho_disponible - 10) / 3;
$ancho_2 = $ancho_celda * 2;



# Logo de la empresa formato png #
$pdf->Image('../pdf/logo.png',155,20,35,35,'PNG');
$pdf->SetDrawColor(255, 255, 255);
$pdf->SetFont('Arial', 'B', 20);
$pdf->SetTextColor(255, 255, 255); // Cambiar el color del texto a blanco
$pdf->SetFillColor(84, 182, 137); // Establecer el color de fondo del recuadro
$pdf->Cell($ancho_2, 10, utf8_decode(strtoupper('CURRICULUM')), 1, 0, 'C', true); // Añadir recuadro con color y texto blanco
$pdf->Ln(10);
$pdf->Ln(10);
// Creación de tabla simulada para nombre y puesto
$pdf->SetDrawColor(255, 255, 255);
$pdf->SetFillColor(84, 182, 137); // Color de fondo de las celdas
$pdf->SetTextColor(255, 255, 255); // Color del texto (blanco)
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell($ancho_celda, 10, 'Nombre', 1, 0, 'C', true); // Celda para el nombre
$pdf->Cell($ancho_celda, 10, 'Puesto', 1, 1, 'C', true); // Celda para el puesto

// tabla 
$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell($ancho_celda, 10, utf8_decode($nombre), 1, 0, 'C'); // Contenido del nombre
$pdf->Cell($ancho_celda, 10, utf8_decode($puesto), 1, 1, 'C'); // Contenido del puesto
$pdf->Ln(10);

// Título de experiencia laboral
$pdf->SetFillColor(47, 47, 47); // Color de fondo del recuadro
$pdf->SetTextColor(255, 255, 255); // Color del texto (blanco)
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, utf8_decode('EXPERIENCIA LABORAL'), 1, 1, 'C', true); // Recuadro de color con texto blanco
$pdf->Ln(2);
// Creación de tabla simulada para experiencia laboral
$pdf->SetDrawColor(255, 255, 255);
$pdf->SetFillColor(84, 182, 137); // Color de fondo de las celdas
$pdf->SetTextColor(255, 255, 255); // Color del texto (blanco)
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell($ancho_celda, 10, utf8_decode('Descripcion'), 1, 0, 'C', true); // Celda para la descripción
$pdf->Cell($ancho_celda, 10, utf8_decode('Empresa'), 1, 0, 'C', true); // Celda para la empresa
$pdf->Cell($ancho_celda, 10, utf8_decode('Periodo'), 1, 1, 'C', true); // Celda para el periodo

$pdf->SetFont('Arial', '', 12);

// Llenar la tabla con la información de la experiencia laboral
foreach($experiencia as $index => $value){
    $descripcion_puesto = $value['descripcion_puesto'];
    $empresa = $value['empresa'];
    $periodo_exp = $value['periodo'];
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell($ancho_celda, 10, utf8_decode($descripcion_puesto), 1, 0, 'C'); // Contenido de la descripción
    $pdf->Cell($ancho_celda, 10, utf8_decode($empresa), 1, 0, 'C'); // Contenido de la empresa
    $pdf->Cell($ancho_celda, 10, utf8_decode($periodo_exp), 1, 1, 'C'); // Contenido del periodo
}

$pdf->Ln(10);

// Título de formación académica
$pdf->SetFillColor(47, 47, 47); // Color de fondo del recuadro
$pdf->SetTextColor(255, 255, 255); // Color del texto (blanco)
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, utf8_decode('FORMACIÓN ACADÉMICA'), 1, 1, 'C', true); // Recuadro de color con texto blanco
$pdf->Ln(2);

//$pdf->L210);

// Creación de tabla simulada para formación académica
$pdf->SetDrawColor(255, 255, 255);
$pdf->SetFillColor(84, 182, 137); // Color de fondo de las celdas
$pdf->SetTextColor(255, 255, 255); // Color del texto (blanco)
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell($ancho_celda, 10, utf8_decode('Descripcion'), 1, 0, 'C', true); // Celda para la descripción
$pdf->Cell($ancho_celda, 10, utf8_decode('Ubicacion'), 1, 0, 'C', true); // Celda para la ubicación
$pdf->Cell($ancho_celda, 10, utf8_decode('Periodo'), 1, 1, 'C', true); // Celda para el periodo

$pdf->SetFont('Arial', '', 12);

// Llenar la tabla con la información de la formación académica
foreach($formacion as $index => $value){
    $descripcion_formacion = $value['descripcion'];
    $ubicacion = $value['ubicacion'];
    $periodo_for = $value['periodo'];
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell($ancho_celda, 10, utf8_decode($descripcion_formacion), 1, 0, 'C'); // Contenido de la descripción
    $pdf->Cell($ancho_celda, 10, utf8_decode($ubicacion), 1, 0, 'C'); // Contenido de la ubicación
    $pdf->Cell($ancho_celda, 10, utf8_decode($periodo_for), 1, 1, 'C'); // Contenido del periodo
}
$pdf->Ln(10);
// Título de aficiones
$pdf->SetFillColor(47, 47, 47); // Color de fondo del recuadro
$pdf->SetTextColor(255, 255, 255); // Color del texto (blanco)
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, utf8_decode('AFICIONES'), 1, 1, 'C', true); // Recuadro de color con texto blanco
$pdf->Ln(2);
// Creación de tabla para aficiones
$pdf->SetDrawColor(255, 255, 255);
$pdf->SetFillColor(84, 182, 137); // Color de fondo de las celdas
$pdf->SetTextColor(255, 255, 255); // Color del texto (blanco)
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, utf8_decode('Descripcion'), 1, 1, 'C', true); // Celda para la descripción

$pdf->SetFont('Arial', '', 12);

// Llenar la tabla con la información de las aficiones
foreach($aficiones as $index => $value){
    $descripcion_aficion = $value['descripcion'];
	$pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(0, 10, utf8_decode($descripcion_aficion), 1, 1, 'C'); // Contenido de la descripción
}
$pdf->Ln(10);
// Título de intereses
$pdf->SetFillColor(47, 47, 47); // Color de fondo del recuadro
$pdf->SetTextColor(255, 255, 255); // Color del texto (blanco)
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, utf8_decode('INTERESES'), 1, 1, 'C', true); // Recuadro de color con texto blanco
$pdf->Ln(2);
// Creación de tabla para intereses
$pdf->SetDrawColor(255, 255, 255);
$pdf->SetFillColor(84, 182, 137); // Color de fondo de las celdas
$pdf->SetTextColor(255, 255, 255); // Color del texto (blanco)
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, utf8_decode('Descripcion'), 1, 1, 'C', true); // Celda para la descripción

$pdf->SetFont('Arial', '', 12);

// Llenar la tabla con la información de los intereses
foreach($interes as $index => $value){
    $descripcion_interes = $value['descripcion'];
	$pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(0, 10, utf8_decode($descripcion_interes), 1, 1, 'C'); // Contenido de la descripción
}

	# Nombre del archivo PDF #
	$pdf->Output("i","Curriculum",true);