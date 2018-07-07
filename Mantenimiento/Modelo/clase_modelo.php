<<<<<<< HEAD
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
=======
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
>>>>>>> 1160af6cf3790be2d4a717c7951b8d4cdca6a3cd
?>