<?php
class alumno
{
	//Atributo para conexión a SGBD
	private $pdo;

	//Atributos del objeto alumno
    public $persona_id;
    public $persona_nombres;
	public $persona_cui;
	public $persona_direccion;
	public $persona_email;
	
	
	

	//Método de conexión a SGBD.
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

	//Este método selecciona todas las tuplas de la tabla
	//persona en caso de error se muestra por pantalla.
	public function Listar()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM estudiante");
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}

	//Este método obtiene los datos del alumno a partir del nit
	//utilizando SQL.
	public function Obtener($persona_id)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el id del alumno.
			$stm = $this->pdo->prepare("SELECT * FROM estudiante WHERE estudiante_id = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro id.
			$stm->execute(array($persona_id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Este método elimina la tupla alumno dado un id.
	public function Eliminar($persona_id)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("DELETE FROM  estudiante WHERE estudiante_id = ?");

			$stm->execute(array($persona_id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que actualiza una tupla a partir de la clausula
	//Where y el id del alumno.
	public function Actualizar($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "UPDATE estudiante SET
						estudiante_nombre    = ?,
						CUI        			= ?,
						email       		= ?,
						direccion			 = ?	
				    WHERE estudiante_id = ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->persona_nombres,
						$data->persona_cui,
                        $data->persona_email,
                        $data->persona_direccion,
                        $data->persona_id
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que registra un nuevo alumno a la tabla.
	public function Registrar(alumno $data)
	{
		try
		{
			//Sentencia SQL.
			$sql = "INSERT INTO estudiante (estudiante_nombre,CUI,email,direccion)
		        VALUES (?, ?, ?, ?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
						$data->persona_nombres,
						$data->persona_cui, 
                        $data->persona_email,
                        $data->persona_direccion
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
			$sql = "INSERT INTO usuarios (tipo_usuario_id,docente_id,estudiante_id,nombre_acceso,contrasena_acceso)
		        VALUES (?, ?, ?, ?, ?)";

			$this->pdo2->prepare($sql)
		     ->execute(
				array(
						$data->tipo_usuario_id,
                        $data->docente_id,
                        $data->estudiante_id,
                        $data->nombre_acceso,
						$data->contrasena_acceso
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
