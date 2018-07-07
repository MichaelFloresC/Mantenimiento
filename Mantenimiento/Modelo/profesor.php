<?php
class profesor
{
	private $pdo;

    public $persona_id;
    public $persona_nombres;
	public $persona_dni;

	
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Conectar::conexion();
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
			$stm = $this->pdo->prepare("SELECT * FROM docente");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($persona_id)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM docente WHERE docente_id = ?");
			$stm->execute(array($persona_id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($persona_id)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM docente  WHERE docente_id = ?");

			$stm->execute(array($persona_id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE docente SET
						dni          = ?,
						docente_nombre	 = ?
					
						
				    WHERE docente_id = ?";
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->persona_dni,
                        $data->persona_nombres,	
						$data->persona_id

					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(profesor $data)
	{
		try
		{
			$sql = "INSERT INTO docente (dni,docente_nombre)
		        VALUES (?, ?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
						$data->persona_dni,
						$data->persona_nombres
						     
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	//Método que registra un nuevo alumno a la tabla.
	 function RegistrarU(usuario $data)
	{
		try
		{
			//Sentencia SQL.
			$sql = "INSERT INTO usuario (usuario_cuenta,usuario_password,usuario_rol_id,usuario_persona_id,usuario_estado)
		        VALUES (?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
						$data->usuario_cuenta,
                        $data->usuario_password,
                        $data->usuario_rol_id,
                        $data->usuario_persona_id,
						$data->usuario_estado
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
