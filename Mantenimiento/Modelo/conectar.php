	<?php

	class conectar{
		public static function conexion(){
			try {
			
				$conexion = new mysqli("localhost","root", "", "asistencia_usr");
        		$conexion->query("SET NAMES 'utf8'");
			}
			catch(Exception $e){
				die("Error". $e->getMessage());
				echo "Linea del Error".$e->getLine();
			}
			return $conexion;
		}

		public static function conexion_db(){
			try {
			
				$conexion = new mysqli("localhost","root", "", "asistencia_db");
        		$conexion->query("SET NAMES 'utf8'");
			}
			catch(Exception $e){
				die("Error". $e->getMessage());
				echo "Linea del Error".$e->getLine();
			}
			return $conexion;
		}





	}



	?>