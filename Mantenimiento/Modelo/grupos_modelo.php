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
		$result = $this->db->query('SELECT g.grupo_id, c.codigo, c.curso_nombre, t.tipo FROM grupo g inner join curso as c on c.curso_id = g.curso_id inner join tipo_grupo as t on t.tipo_grupo_id = g.tipo_grupo_id where g.periodo_id ='.$periodoid);
		//$result = $this->db->query("SELECT * FROM grupo where periodo_id = ".$periodoid);
		while($fila = $result->fetch_assoc()){
			$grupost[]=$fila;
		}
		return $grupost;
	}
}
?>