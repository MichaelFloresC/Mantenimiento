<?php
class grupos_modelo{

	private $db;
	private $grupos;

	public function __construct(){
		require_once("conectar.php");
		$this->db=conectar::conexion_db();
		$this->grupos=array();
	}

	public function get_grupos($periodoid){
		$grupost = array();
		//echo "SELECT * FROM curso where plan_id = ".$planid.
		$result = $this->db->query("SELECT * FROM grupo where periodo_id = ".$periodoid);
		while($fila = $result->fetch_assoc()){
			$grupost[]=$fila;
		}
		return $grupost;
	}
}
?>