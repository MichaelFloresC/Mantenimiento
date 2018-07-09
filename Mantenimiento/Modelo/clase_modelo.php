
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

	public function get_clase_by_group($grupoid){
		$clasest = array();
		$result = $this->db->query("SELECT * from clase where grupo_id = ".$grupoid." ORDER BY dia");
		while($fila = $result->fetch_assoc()){
			$clasest[]=$fila;
		}
		return $clasest;
	}

	public function get_clase_fecha_by_group($grupoid,$mes){
		$clasesf = array();
		$result = $this->db->query("SELECT day(cf.fecha) as day from clase_fecha as cf where cf.clase_id in (select c.clase_id from clase as c where c.grupo_id = ".$grupoid.") and month(cf.fecha)= ".$mes." and (reprogramado = 0 or reprogramado is null) order by cf.fecha");
		while($fila = $result->fetch_assoc()){
			$clasesf[]=$fila['day'];
		}
		return $clasesf;

	}

	public function get_clase_fecha_by_group_repro($grupoid,$mes){
		$clasesf = array();
		$result = $this->db->query("SELECT day(cf.fecha) as day from clase_fecha as cf where cf.clase_id in (select c.clase_id from clase as c where c.grupo_id = ".$grupoid.") and month(cf.fecha)= ".$mes." and reprogramado = 1 order by cf.fecha");
		while($fila = $result->fetch_assoc()){
			$clasesf[]=$fila['day'];
		}
		return $clasesf;

	}

	public function insert_clase_fecha($claseid, $fecha, $fecharep, $horain, $horasal){
		echo $claseid ."<br>";
		echo $fecha."<br>";
		echo $fecharep."<br>";
		echo $horain."<br>";
		echo $horasal."<br>";
		echo "INSERT INTO clase_fecha (clase_id, fecha, hora_ingres, hora_salida, reprogramado, fecha_reprogramada, hora_ingreso_reprogramada, hora_salida_reprogramada) VALUES (".$claseid.", '".$fecha."', '00:00:000', '00:00:000', 1, '".$fecharep."', '".$horain."', '".$horasal."' )";
		$result = $this->db->query("INSERT INTO clase_fecha (clase_id, fecha, hora_ingres, hora_salida, reprogramado, fecha_reprogramada, hora_ingreso_reprogramada, hora_salida_reprogramada) VALUES (".$claseid.", '".$fecha."', '00:00:000', '00:00:000', 1, '".$fecharep."', '".$horain."', '".$horasal."' )");
	}

}

?>