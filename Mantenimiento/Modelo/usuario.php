<?php
class usuario
{
	//Atributo para conexión a SGBD
	private $pdo;

	//Atributos del objeto usuario
    public $usuario_id;
    public $tipo_usuario_id;
    public $docente_id;
    public $estudiante_id;
	public $nombre_acceso;
	public $contrasena_acceso;


	//Método de conexión a SGBD.
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

	//Este método selecciona todas las tuplas de la tabla
	//usuario en caso de error se muestra por pantalla.
	public function Listar()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM usuario WHERE contrasena_acceso = 0");
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

	//Este método obtiene los datos del usuario a partir del nit
	//utilizando SQL.
	public function Obtener($usuario_id)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el id del usuario.
			$stm = $this->pdo->prepare("SELECT * FROM usuario WHERE usuario_id = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro id.
			$stm->execute(array($usuario_id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Este método elimina la tupla usuario dado un id.
	public function Eliminar($usuario_id)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("UPDATE usuario SET contrasena_acceso = 1 WHERE usuario_id = ?");

			$stm->execute(array($usuario_id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que actualiza una tupla a partir de la clausula
	//Where y el id del usuario.
	public function Actualizar($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "UPDATE usuario SET
						tipo_usuario_id          = ?,
						docente_id        = ?,
						estudiante_id        = ?,
						nombre_acceso			 = ?,
						contrasena_acceso				 = ?
						
				    WHERE usuario_id = ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->tipo_usuario_id,
                        $data->docente_id,
                        $data->estudiante_id,
                        $data->nombre_acceso,
						$data->contrasena_acceso,
						$data->usuario_id

					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que registra un nuevo usuario a la tabla.
	public function Registrar(usuario $data)
	{
		try
		{
			//Sentencia SQL.
			$sql = "INSERT INTO usuario (tipo_usuario_id,docente_id,estudiante_id,nombre_acceso,contrasena_acceso)
		        VALUES (?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
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
