<?php
class cursos_modelo{

	private $db;
	private $cursos;

	public function __construct(){
		require_once("conectar.php");
		$this->db=conectar::conexion_db();
		$this->cursos=array();
	}

	public function get_cursos($planid){
		$cursost = array();
		//echo "SELECT * FROM curso where plan_id = ".$planid.
		$result = $this->db->query("SELECT * FROM curso where plan_id = ".$planid);
		while($fila = $result->fetch_assoc()){
			$cursost[]=$fila;
		}
		return $cursost;
	}

}
?>