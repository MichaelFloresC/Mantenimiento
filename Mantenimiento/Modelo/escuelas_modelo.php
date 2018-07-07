<?php
class escuelas_modelo{

	private $db;
	private $escuelas;

	public function __construct(){
		require_once("conectar.php");
		$this->db=conectar::conexion_db();
		$this->escuelas=array();
	}

	public function get_escuelas(){
		$result = $this->db->query("SELECT * FROM escuela");
		while($fila = $result->fetch_assoc()){
			$this->escuelas[]=$fila;
		}
		return $this->escuelas;
	}
}
?>