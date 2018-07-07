<?php
class docente_modelo{

	private $db;
	private $docentes;

	public function __construct(){
		require_once("conectar.php");
		$this->db=conectar::conexion_db();
		$this->docentes=array();
	}

	public function get_docentes(){
		$docentest = array();
		$result = $this->db->query("SELECT * FROM docente");
		while($fila = $result->fetch_assoc()){
			$this->docentest[]=$fila;
		}
		return $this->docentest;
	}
}
?>