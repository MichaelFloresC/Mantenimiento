<?php
class curso
{
	private $pdo;

    public $curso_id;
    public $plan_id;
	public $codigo;
	public $curso_nombre;

	
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Conectar::conexion();
			$this->pdo2 = Conectar::conexion_user();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM curso");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
}
