<?php
	include 'plantilla.php';
	require 'conexion.php';
	
	//$query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
	$query = "SELECT * from  grupo_estudiante JOIN grupo on grupo_estudiante.grupo_id = grupo.grupo_id JOIN curso on grupo.curso_id=curso.curso_id  WHERE curso.curso_id='81'";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(70,6,'curso_id',1,0,'C',1);
	$pdf->Cell(20,6,'estudiante_id',1,0,'C',1);
	$pdf->Cell(70,6,'curso_nombre',1,1,'C',1);
		
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(70,6,utf8_decode($row['curso_id']),1,0,'C');
		$pdf->Cell(20,6,$row['estudiante_id'],1,0,'C');
		$pdf->Cell(70,6,utf8_decode($row['curso_nombre']),1,1,'C');
	}
	$pdf->Output();
?>