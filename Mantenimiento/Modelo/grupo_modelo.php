<?php
class grupo_modelo{

	private $db;

	public function __construct(){
		require_once("conectar.php");
		$this->db=conectar::conexion_db();
	}

	public function insert_grupos($cursoid, $teonum, $pranum, $labnum, $periodoid){
		echo $cursoid." ";
		echo $teonum." ";
		echo $pranum." ";
		echo $labnum." ";
		echo $periodoid;
		//echo "SELECT * FROM grupo where curso_id = ".$cursoid." and periodo_id = ".$periodoid." and tipo_grupo_id = 1";
		$resultteo = $this->db->query("SELECT * FROM grupo where curso_id = ".$cursoid." and periodo_id = ".$periodoid." and tipo_grupo_id = 1");
		$resultpra = $this->db->query("SELECT * FROM grupo where curso_id = ".$cursoid." and periodo_id = ".$periodoid." and tipo_grupo_id = 2");
		$resultlab = $this->db->query("SELECT * FROM grupo where curso_id = ".$cursoid." and periodo_id = ".$periodoid." and tipo_grupo_id = 3");
		$gruposteo = array();
		$grupospra = array();
		$gruposlab = array();
		if($resultteo){
		while($fila = $resultteo->fetch_assoc()){
			$gruposteo[]=$fila;
		}
		}
		if($resultpra){
		while($fila = $resultpra->fetch_assoc()){
			$grupospra[]=$fila;
		}
		}
		if($resultlab){
		while($fila = $resultlab->fetch_assoc()){
			$gruposlab[]=$fila;
		}
		}
		$teonum = $teonum - sizeof($gruposteo);
		$pranum = $pranum - sizeof($grupospra);
		$labnum = $labnum - sizeof($gruposlab);
		for($i = 0; $i < $teonum; $i++){
			$result = $this->db->query("INSERT INTO grupo (periodo_id, curso_id, tipo_grupo_id) values(".$periodoid.", ".$cursoid.", 1)");
		}
		for($i = 0; $i < $pranum; $i++){
			$result = $this->db->query("INSERT INTO grupo (periodo_id, curso_id, tipo_grupo_id) values(".$periodoid.", ".$cursoid.", 2)");
		}
		for($i = 0; $i < $labnum; $i++){
			$result = $this->db->query("INSERT INTO grupo (periodo_id, curso_id, tipo_grupo_id) values(".$periodoid.", ".$cursoid.", 3)");
		}
	}

}
?>