<?php
class grupo_modelo{

	private $db;

	public function __construct(){
		require_once("conectar.php");
		$this->db=conectar::conexion_db();
	}

	public function insert_grupos($cursoid, $teonum, $pranum, $labnum, $periodoid){
		echo $cursoid." ";
		echo $teonum." ";
		echo $pranum." ";
		echo $labnum." ";
		echo $periodoid;
		//echo "SELECT * FROM grupo where curso_id = ".$cursoid." and periodo_id = ".$periodoid." and tipo_grupo_id = 1";
		$resultteo = $this->db->query("SELECT * FROM grupo where curso_id = ".$cursoid." and periodo_id = ".$periodoid." and tipo_grupo_id = 1");
		$resultpra = $this->db->query("SELECT * FROM grupo where curso_id = ".$cursoid." and periodo_id = ".$periodoid." and tipo_grupo_id = 2");
		$resultlab = $this->db->query("SELECT * FROM grupo where curso_id = ".$cursoid." and periodo_id = ".$periodoid." and tipo_grupo_id = 3");
		$gruposteo = array();
		$grupospra = array();
		$gruposlab = array();
		if($resultteo){
		while($fila = $resultteo->fetch_assoc()){
			$gruposteo[]=$fila;
		}
		}
		if($resultpra){
		while($fila = $resultpra->fetch_assoc()){
			$grupospra[]=$fila;
		}
		}
		if($resultlab){
		while($fila = $resultlab->fetch_assoc()){
			$gruposlab[]=$fila;
		}
		}
		$teonum = $teonum - sizeof($gruposteo);
		$pranum = $pranum - sizeof($grupospra);
		$labnum = $labnum - sizeof($gruposlab);
		for($i = 0; $i < $teonum; $i++){
			$result = $this->db->query("INSERT INTO grupo (periodo_id, curso_id, tipo_grupo_id) values(".$periodoid.", ".$cursoid.", 1)");
		}
		for($i = 0; $i < $pranum; $i++){
			$result = $this->db->query("INSERT INTO grupo (periodo_id, curso_id, tipo_grupo_id) values(".$periodoid.", ".$cursoid.", 2)");
		}
		for($i = 0; $i < $labnum; $i++){
			$result = $this->db->query("INSERT INTO grupo (periodo_id, curso_id, tipo_grupo_id) values(".$periodoid.", ".$cursoid.", 3)");
		}
	}

	public function update_grupos($grupoid, $aula, $docente, $rutaxls){
		echo $grupoid." ";
		echo $aula." ";
		echo $docente." ";
		echo $rutaxls;
		if($aula > 0)
			$result = $this->db->query("UPDATE grupo set aula_id = ".$aula." where grupo_id =".$grupoid);
		if($docente > 0)
			$result = $this->db->query("UPDATE grupo set docente_id = ".$docente." where grupo_id =".$grupoid);

		if($rutaxls != -9999999){

		require '../Classes/PHPExcel/IOFactory.php';
		$objPHPExcel = PHPExcel_IOFactory::load("../subidas/".$rutaxls);
		$objPHPExcel->setActiveSheetIndex(0);
		$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
		for($i = 1; $i <= $numRows; $i++){
			$cui = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
			$nombre_alumno = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
			//echo "INSERT INTO curso(plan_id, codigo, curso_nombre) values(".$plan_id[plan_id].",'".$codigo."','".$curso."')";

			$result = $this->db->query("INSERT INTO grupo_estudiante(grupo_id, estudiante_id) values(".$grupoid.", (SELECT estudiante_id FROM estudiante where CUI = '".$cui."'))");
		}
		}

	}

	public function insert_clase($grupoid, $iniLunes, $finLunes, $iniMartes, $finMartes, $iniMiercoles, $finMiercoles, $iniJueves, $finJueves, $iniViernes, $finViernes){
		

		$result = $this->db->query("SELECT * from clase where grupo_id = ".$grupoid);
		echo $result->num_rows;

		if($result->num_rows == 0){
			for($l = 1; $l <= 5; $l++)
				$result = $this->db->query("INSERT into clase (grupo_id, dia, activo, hora_ingreso, hora_salida) values (".$grupoid.", ".$l.", 0, '00:00:000', '00:00:000')") ;
		}

		//Lunes

		if($iniLunes != -1 && $finLunes != -1)
			$result = $this->db->query("UPDATE clase set activo = 1, hora_ingreso = '".$iniLunes."', hora_salida = '".$finLunes."' where grupo_id = ".$grupoid." and dia = 1");
		else
			$result = $this->db->query("UPDATE clase set activo = 0 where grupo_id = ".$grupoid." and dia = 1");

		//Martes

	
		if($iniMartes != -1 && $finMartes != -1)
			$result = $this->db->query("UPDATE clase set activo = 1, hora_ingreso = '".$iniMartes."', hora_salida = '".$finMartes."' where grupo_id = ".$grupoid." and dia = 2");
		else
			$result = $this->db->query("UPDATE clase set activo = 0 where grupo_id = ".$grupoid." and dia = 2");

		//Miercoles

	
		if($iniMiercoles != -1 && $finMiercoles != -1)
			$result = $this->db->query("UPDATE clase set activo = 1, hora_ingreso = '".$iniMiercoles."', hora_salida = '".$finMiercoles."' where grupo_id = ".$grupoid." and dia = 3");
		else
			$result = $this->db->query("UPDATE clase set activo = 0 where grupo_id = ".$grupoid." and dia = 3");

		//Jueves

	
		if($iniJueves != -1 && $finJueves != -1)
			$result = $this->db->query("UPDATE clase set activo = 1, hora_ingreso = '".$iniJueves."', hora_salida = '".$finJueves."' where grupo_id = ".$grupoid." and dia = 4");
		else
			$result = $this->db->query("UPDATE clase set activo = 0 where grupo_id = ".$grupoid." and dia = 4");

		//Viernes

	
		if($iniViernes != -1 && $finViernes != -1)
			$result = $this->db->query("UPDATE clase set activo = 1, hora_ingreso = '".$iniViernes."', hora_salida = '".$finViernes."' where grupo_id = ".$grupoid." and dia = 5");
		else
			$result = $this->db->query("UPDATE clase set activo = 0 where grupo_id = ".$grupoid." and dia = 5");
	}
}