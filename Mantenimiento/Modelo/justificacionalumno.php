<?php
class justificacionalumno
{
	private $pdo;

    public $estudiante_id;
    public $justificado;
	public $documento_justificacion;
	public $estudiante_nombre;

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
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * from  asistencia JOIN grupo_estudiante on asistencia.grupo_estudiante_id = grupo_estudiante.grupo_estudiante_id 
										JOIN grupo on grupo_estudiante.grupo_id = grupo.grupo_id 
										JOIN estudiante on grupo_estudiante.estudiante_id = estudiante.estudiante_id
										JOIN curso on grupo.curso_id=curso.curso_id
										WHERE asistencia.justificado IS NULL  AND asistencia.documento_justificacion IS NULL ");
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
	public function Obtener($estudiante_id)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el id del alumno.
			$stm = $this->pdo->prepare("SELECT * FROM estudiante WHERE estudiante_id = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro id.
			$stm->execute(array($estudiante_id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Este método elimina la tupla alumno dado un id.
	public function Eliminar($estudiante_id)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("DELETE FROM  estudiante WHERE estudiante_id = ?");

			$stm->execute(array($estudiante_id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que actualiza una tupla a partir de la clausula
	//Where y el id del alumno.
	public function JustificarFormulario($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "UPDATE asistencia SET
						justificado        			= ?	
				    WHERE estudiante_id = ?";
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->justificado,
                        $data->estudiante_id,
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
						$data->justificado,
						$data->documento_justificacion, 
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
