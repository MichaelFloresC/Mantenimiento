<?php
	require ('../Modelo/conectar.php');
	$db=conectar::conexion_db();
	
	$id_docente = $_POST['id_docente'];
	
	$queryM = "SELECT g.grupo_id, c.curso_nombre, t.tipo from grupo g inner join curso as c on c.curso_id = g.curso_id inner join tipo_grupo as t on t.tipo_grupo_id = g.tipo_grupo_id where docente_id = ".$id_docente;
	$resultadoM = $db->query($queryM);
	
	$html= "<option value='0'>Seleccionar Grupo</option>";
	//echo "<option value='0'>Seleccionar Grupo</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['grupo_id']."'>".$rowM['curso_nombre']." - ".$rowM['tipo']."</option>";
	}
	
	echo $html;
?>