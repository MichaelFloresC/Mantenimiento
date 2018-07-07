<?php
class aulas_modelo{

	private $db;
	private $aulas;

	public function __construct(){
		require_once("conectar.php");
		$this->db=conectar::conexion_db();
		$this->docentes=array();
	}

	public function get_aulas(){
		$aulast = array();
		$result = $this->db->query("SELECT * FROM aula");
		while($fila = $result->fetch_assoc()){
			$this->aulast[]=$fila;
		}
		return $this->aulast;
	}
}

?>