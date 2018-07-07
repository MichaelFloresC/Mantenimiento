<?php
class tipos_grupos_modelo{

	private $db;
	private $tipos_grupos;

	public function __construct(){
		require_once("conectar.php");
		$this->db=conectar::conexion_db();
		$this->tipos_grupos=array();
	}

	public function get_tipos_grupos(){
		$result = $this->db->query("SELECT * FROM tipo_grupo");
		while($fila = $result->fetch_assoc()){
			$this->tipos_grupos[]=$fila;
		}
		return $this->tipos_grupos;
	}
}
?>