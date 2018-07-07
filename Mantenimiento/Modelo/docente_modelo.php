<<<<<<< HEAD
<?php
class docente_modelo{

	private $db;
	private $docentes;

	public function __construct(){
		require_once("conectar.php");
		$this->db=conectar::conexion_db();
		$this->docentes=array();
	}

	public function get_docentes(){
		$docentest = array();
		$result = $this->db->query("SELECT * FROM docente");
		while($fila = $result->fetch_assoc()){
			$this->docentest[]=$fila;
		}
		return $this->docentest;
	}
}
=======
<?php
class docente_modelo{

	private $db;
	private $docentes;

	public function __construct(){
		require_once("conectar.php");
		$this->db=conectar::conexion_db();
		$this->docentes=array();
	}

	public function get_docentes(){
		$docentest = array();
		$result = $this->db->query("SELECT * FROM docente");
		while($fila = $result->fetch_assoc()){
			$this->docentest[]=$fila;
		}
		return $this->docentest;
	}
}
>>>>>>> 1160af6cf3790be2d4a717c7951b8d4cdca6a3cd
?>