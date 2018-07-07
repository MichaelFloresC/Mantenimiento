	<?php

	class conectar{
		public static function conexion(){
			$pdo = new PDO('mysql:host=localhost;dbname=asistencia_db;charset=latin1', 'root', '');
			//Filtrando posibles errores de conexión.
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
		}
	}



	?>