<?php
class PorCursoController{
	
    public function Reporte(){
	include '../Reportes/plantilla.php';
	require '../Reportes/conexion.php';
	//http://localhost/Mantenimiento/Vista/reporte.php?c=PorCurso&a=Reporte&curso_id=81
	//$query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
	//$query = "SELECT * from  grupo_estudiante JOIN grupo on grupo_estudiante.grupo_id = grupo.grupo_id JOIN curso on grupo.curso_id=curso.curso_id  WHERE curso.curso_id={$_REQUEST['curso_id']}";
	$query = "SELECT * from  asistencia JOIN grupo_estudiante on asistencia.grupo_estudiante_id = grupo_estudiante.grupo_estudiante_id 
										JOIN grupo on grupo_estudiante.grupo_id = grupo.grupo_id 
										JOIN estudiante on grupo_estudiante.estudiante_id = estudiante.estudiante_id
										JOIN curso on grupo.curso_id=curso.curso_id
										
											WHERE curso.curso_id={$_REQUEST['curso_id']}"; 
											
	//AND grupo.tipo_grupo_id='3'"
	

	$resultado = $mysqli->query($query);
	

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20,6,'CUI',1,0,'C',1);
	$pdf->Cell(100,6,'Alumno',1,1,'C',1);
	//$pdf->Cell(30,6,'#Asistencias',1,0,'C',1);
	//$pdf->Cell(30,6,'#Faltas',1,1,'C',1);
		
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		//$q = "SELECT COUNT(asistio) FROM asistencia WHERE asistio='1' AND  estudiante_id=4";	
		//$r = $mysqli->query($q);
		//while($rx = $r->fetch_assoc())
		//{
		//$pdf->Cell(20,6,utf8_decode($rx['COUNT(asistio)']),1,0,'C');
		//}
		$pdf->Cell(20,6,utf8_decode($row['CUI']),1,0,'C');
		$pdf->Cell(100,6,$row['estudiante_nombre'],1,1,'C');
		//$pdf->Cell(30,6,utf8_decode($row['curso_nombre']),1,0,'C');
		//$pdf->Cell(30,6,utf8_decode($row['curso_nombre']),1,1,'C');
	}
	
	$pdf->Output();
  }
}
