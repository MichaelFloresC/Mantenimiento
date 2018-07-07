<?php
class clase_modelo{

	private $db;

	public function __construct(){
		require_once("conectar.php");
		$this->db=conectar::conexion_db();
	}

	public function insert_clases($grupoid, $dia, $horaingreso, $horasalida){
		echo $grupoid." ";
		echo $dia." ";
		echo $horaingreso." ";
		echo $horasalida." ";
		
	}

}
?>