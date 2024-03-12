<?php

require "./pdf/code128.php";
$pdf = new PDF_Code128('P','mm','Letter');
$pdf->SetMargins(17,17,17);
$pdf->AddPage();

session_start();
include('../clases/save.class.php');
include('../clases/function.class.php');
// include('../../smarty-master/libs/smarty.class.php');
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
# Logo de la empresa formato png #
$pdf->Image('./pdf/logo.png',165,12,35,35,'PNG');
// Encabezado y datos de la empresa
$pdf->SetFont('Arial', 'B', 20);
$pdf->SetTextColor(32, 100, 210);
$pdf->Cell(150, 10, utf8_decode(strtoupper('CURRICULUM')), 0, 0, 'L');

$pdf->Ln(9);

$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(150, 9, utf8_decode(''), 0, 0, 'L');
$pdf->Ln(5);
$pdf->Cell(150, 9, utf8_decode("Nombre: $nombre"), 0, 0, 'L');
$pdf->Ln(5);
$pdf->Cell(150, 9, utf8_decode("puesto: $puesto"), 0, 0, 'L');
$pdf->Ln(10);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(30, 7, utf8_decode("Fecha de emisión:"), 0, 0);
$pdf->Ln(5);
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(116, 7, utf8_decode($hoy = date("Y-m-d H:i:s")), 0, 0, 'L');

$pdf->Ln(10);
$pdf->SetLineWidth(0.5);
$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());

$pdf->SetFont('Arial', '', 13);
$pdf->SetTextColor(32, 100, 210);
$pdf->Cell(13, 7, utf8_decode("Experiencia Laboral"), 0, 0, 'L');
$pdf->Ln(5);

foreach($experiencia as $index => $value){
    $descripcion_puesto = $value['descripcion_puesto'];
    $empresa = $value['empresa'];
    $periodo_exp = $value['periodo'];
    $pdf->SetFont('Arial','',12);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(13,7,utf8_decode("Descripcion:"),0,0);$pdf->Ln(5);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(30,7,utf8_decode($descripcion_puesto),0,0,'L');$pdf->Ln(5);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(8,7,utf8_decode("Empresa: "),0,0,'L');$pdf->Ln(5);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(15,7,utf8_decode($empresa),0,0,'L');$pdf->Ln(5);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(7,7,utf8_decode("Periodo:"),0,0,'L');$pdf->Ln(5);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(35,7,utf8_decode($periodo_exp),0,0);$pdf->Ln(10);
}
$pdf->SetLineWidth(0.5);
$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
$pdf->SetFont('Arial','',13);
$pdf->SetTextColor(32,100,210);
$pdf->Cell(13,7,utf8_decode("Formacion academica"),0,0);
$pdf->Ln(5);
foreach($formacion as $index => $value){
    $descripcion_formacion  = $value['descripcion'];
    $ubicacion  = $value['ubicacion'];
    $periodo_for  = $value['periodo'];
    $pdf->SetFont('Arial','',12);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(13,7,utf8_decode("Descripcion:"),0,0);$pdf->Ln(5);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(30,7,utf8_decode($descripcion_formacion),0,0,'L');$pdf->Ln(5);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(8,7,utf8_decode("Empresa: "),0,0,'L');$pdf->Ln(5);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(15,7,utf8_decode($ubicacion),0,0,'L');$pdf->Ln(5);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(7,7,utf8_decode("Periodo:"),0,0,'L');$pdf->Ln(5);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(35,7,utf8_decode($periodo_for),0,0);$pdf->Ln(10);
}
$pdf->SetLineWidth(0.5);
$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
$pdf->SetFont('Arial','',13);
$pdf->SetTextColor(32,100,210);
$pdf->Cell(13,7,utf8_decode("Aficiones"),0,0);$pdf->Ln(5);
foreach($aficiones as $index => $value){
    $descripcion_aficion  = $value['descripcion'];
    $pdf->SetFont('Arial','',12);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(13,7,utf8_decode("Descripcion:"),0,0);$pdf->Ln(5);
	$pdf->SetTextColor(97,97,97);
    $pdf->Cell(30,7,utf8_decode($descripcion_aficion),0,0,'L');
    $pdf->Ln(10);
}
$pdf->SetLineWidth(0.5);
$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
$pdf->SetFont('Arial','',13);
$pdf->SetTextColor(32,100,210);
$pdf->Cell(13,7,utf8_decode("Interes"),0,0);$pdf->Ln(5);
foreach($interes as $index => $value){
    $descripcion_interes  = $value['descripcion'];
    $pdf->SetFont('Arial','',12);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(13,7,utf8_decode("Descripcion:"),0,0);$pdf->Ln(5);
	$pdf->SetTextColor(97,97,97);
    $pdf->Cell(30,7,utf8_decode($descripcion_interes),0,0,'L');$pdf->Ln(5);
}
	# Nombre del archivo PDF #
	$pdf->Output("i","Curriculum",true);