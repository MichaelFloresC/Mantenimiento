<?php
class grupos_modelo{

	private $db;
	private $grupos;

	public function __construct(){
		require_once("conectar.php");
		$this->db=conectar::conexion_db();
		$this->grupos=array();
	}

	public function get_grupos_basico($periodoid){
		$grupost = array();
		//echo "SELECT * FROM curso where plan_id = ".$planid.
		$result = $this->db->query('SELECT g.grupo_id, c.codigo, c.curso_nombre, t.tipo FROM grupo g 
									inner join curso as c on c.curso_id = g.curso_id 
									inner join tipo_grupo as t on t.tipo_grupo_id = g.tipo_grupo_id 
									where g.periodo_id ='.$periodoid);
		//$result = $this->db->query("SELECT * FROM grupo where periodo_id = ".$periodoid);
		while($fila = $result->fetch_assoc()){
			$grupost[]=$fila;
		}
		return $grupost;
	}

	public function get_grupos($periodoid){
		$grupost = array();
		//echo "SELECT * FROM curso where plan_id = ".$planid.
		$result = $this->db->query('SELECT g.grupo_id, c.codigo, c.curso_nombre, t.tipo, a.aula_etiqueta, d.docente_nombre FROM grupo g 
									inner join curso as c on c.curso_id = g.curso_id 
									inner join tipo_grupo as t on t.tipo_grupo_id = g.tipo_grupo_id 
									inner join aula as a on a.aula_id = g.aula_id
									inner join docente as d on d.docente_id = g.docente_id
									where g.periodo_id ='.$periodoid);
		//$result = $this->db->query("SELECT * FROM grupo where periodo_id = ".$periodoid);
		while($fila = $result->fetch_assoc()){
			$grupost[]=$fila;
		}
		return $grupost;
	}
	public function get_grupos2(){
		$grupost = array();
		//echo "SELECT * FROM curso where plan_id = ".$planid.
		$result = $this->db->query('SELECT g.grupo_id, c.codigo, c.curso_nombre, t.tipo, a.aula_etiqueta, d.docente_nombre FROM grupo g 
									inner join curso as c on c.curso_id = g.curso_id 
									inner join tipo_grupo as t on t.tipo_grupo_id = g.tipo_grupo_id 
									inner join aula as a on a.aula_id = g.aula_id
									inner join docente as d on d.docente_id = g.docente_id
									where g.periodo_id =(SELECT p.periodo_id FROM periodo as p where (select now()) BETWEEN inicio and fin)');
		//$result = $this->db->query("SELECT * FROM grupo where periodo_id = ".$periodoid);
		while($fila = $result->fetch_assoc()){
			$grupost[]=$fila;
		}
		return $grupost;
	}

	public function get_curso_grupo($grupoid){
		$cursogrupo = array();
		$result = $this->db->query('SELECT c.curso_nombre, t.tipo FROM grupo g inner join curso as c on c.curso_id = g.curso_id inner join tipo_grupo as t on t.tipo_grupo_id = g.tipo_grupo_id where g.grupo_id ='.$grupoid);
		//$result = $this->db->query("SELECT * FROM grupo where periodo_id = ".$periodoid);
		while($fila = $result->fetch_assoc()){
			$cursogrupo[]=$fila;
		}
		return $cursogrupo;

	}

	public function get_alumnos_grupo($grupoid){
		$alumnogrupo = array();
		$result = $this->db->query('SELECT ge.estudiante_id, e.CUI, e.estudiante_nombre from grupo_estudiante ge inner join estudiante as e on e.estudiante_id = ge.estudiante_id where ge.grupo_id = '.$grupoid);
		//$result = $this->db->query("SELECT * FROM grupo where periodo_id = ".$periodoid);
		while($fila = $result->fetch_assoc()){
			$alumnogrupo[]=$fila;
		}
		return $alumnogrupo;

	}
}
?>