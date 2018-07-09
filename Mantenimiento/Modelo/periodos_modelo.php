<?php
class periodos_modelo{

	private $db;
	private $periodos;

	public function __construct(){
		require_once("conectar.php");
		$this->db=conectar::conexion_db();
		$this->periodos=array();
	}

	public function get_periodos(){
		$this->periodos = array();
		$result = $this->db->query("SELECT * FROM periodo");
		while($fila = $result->fetch_assoc()){
			$this->periodos[]=$fila;
		}
		return $this->periodos;
	}
	public function get_actual_periodos_inicio_fin(){
		$periodost = array();
		$result = $this->db->query("select month(inicio) as inicio, month(fin) as fin from periodo where (select now()) BETWEEN inicio and fin");
		while($fila = $result->fetch_assoc()){
			$periodost[]=$fila;
		}
		return $periodost;
	}
}
?>