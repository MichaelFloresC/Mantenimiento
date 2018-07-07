<?php
error_reporting(0);
class plan_modelo{


	private $db;
	private $mallas;

	public function __construct(){
		require_once("conectar.php");
		$this->db=conectar::conexion_db();
		$this->mallas=array();
	}

	public function insert_malla($malla_nombre, $rutaxls, $escuela){
		$result = $this->db->query("INSERT INTO plan(escuela_id, plan_nombre) values(".$escuela.",'".$malla_nombre."')");
		$result = $this->db->query("SELECT plan_id FROM plan WHERE plan_nombre = '".$malla_nombre."' order by plan_id DESC LIMIT 1");
		echo
		$plan_id = $result->fetch_assoc();
		require '../Classes/PHPExcel/IOFactory.php';
		$objPHPExcel = PHPExcel_IOFactory::load("../subidas/".$rutaxls);
		$objPHPExcel->setActiveSheetIndex(0);
		$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
		for($i = 1; $i <= $numRows; $i++){
			$codigo = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
			$curso = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
			//echo "INSERT INTO curso(plan_id, codigo, curso_nombre) values(".$plan_id[plan_id].",'".$codigo."','".$curso."')";
			$result = $this->db->query("INSERT INTO curso(plan_id, codigo, curso_nombre) values(".$plan_id[plan_id].",'".$codigo."','".$curso."')");
		}
	}

	public function get_malla(){
		$result = $this->db->query("SELECT * FROM plan");
		while($fila = $result->fetch_assoc()){
			$this->mallas[]=$fila;
		}
		return $this->mallas;
	}
}
?>