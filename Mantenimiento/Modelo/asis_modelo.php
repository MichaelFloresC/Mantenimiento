<?php
error_reporting(0);
class asis_modelo{

	private $db;

	public function __construct(){
		require_once("conectar.php");
		$this->db=conectar::conexion_db();
	}

	public function set_asis($grupoid, $clasefechaid, $alumnoschrck){
		$alumns = array();
		$result = $this->db->query("SELECT * from grupo_estudiante where grupo_id = ".$grupoid);
		echo "SELECT * from grupo_estudiante where grupo_id = ".$grupoid . "<br>";
		while($fila = $result->fetch_assoc()){
			$alumns[]=$fila;
		}
		echo sizeof($alumns)."<br>";
		for($i = 0; $i < sizeof($alumns); $i++){
			echo "INSERT into asistencia(grupo_estudiante_id, estudiante_id, clase_fecha_id, asistio) values (".$alumns[$i][grupo_estudiante_id].", ".$alumns[$i][estudiante_id].", ".$clasefechaid.", 0)  <br>";
			$result = $this->db->query("INSERT into asistencia(grupo_estudiante_id, estudiante_id, clase_fecha_id, asistio) values (".$alumns[$i][grupo_estudiante_id].", ".$alumns[$i][estudiante_id].", ".$clasefechaid.", 0) ");
		}

		for($i = 0; $i < sizeof($alumnoschrck); $i++){
			echo "UPDATE asistencia set asistio = 1 where estudiante_id = ".$alumnoschrck[$i]."<br>";
			$result = $this->db->query("UPDATE asistencia set asistio = 1 where estudiante_id = ".$alumnoschrck[$i]);		
		}
	}
}

?>