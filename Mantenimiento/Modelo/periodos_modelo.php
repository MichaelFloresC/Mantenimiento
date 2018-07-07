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
		$result = $this->db->query("SELECT * FROM periodo");
		while($fila = $result->fetch_assoc()){
			$this->periodos[]=$fila;
		}
		return $this->periodos;
	}
}
?>