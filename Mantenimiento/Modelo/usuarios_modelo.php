<?php

class usuarios_modelo{

		private $db;
		private $usuarios;
		
		public function __construct(){
			//requiere_once("Modelo/conectar.php");
			$this->db=conectar::conexion();
			$this->usuarios=array();
		}

		public function validar($username,$password){
			
			 $sql = "SELECT * FROM usuarios WHERE nombre_acceso = '$username'";
			 $result = $this->db->query($sql);
			// if ($result->num_rows > 0) {     
			 //}
	 		$row = $result->fetch_array(MYSQLI_ASSOC);
			 if (password_verify($password, $row['contrasena_acceso'])) { 
	  		 	 $_SESSION['loggedin'] = true;
	   			 $_SESSION['nombre_acceso'] = $username;
	   			 $_SESSION['start'] = time();
	  			 $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
	  			 header('Location: http://localhost/Mantenimiento/Vista/registroDocente_vista.php');
	  			
			 }

			 else { 
	  			echo "Usuario o contraseña incorrectos.";
	  			
	 		}
	 		mysqli_close($this->db);
	 	}

	 	public function registrar($username,$password){

			$hash = password_hash($password, PASSWORD_BCRYPT); 
			$buscarUsuario = "SELECT * FROM usuarios WHERE nombre_acceso = '$username' ";
			$result = $this->db->query($buscarUsuario);
			$count = mysqli_num_rows($result);

			 if ($count == 1) {
			 echo "<br />". "El Nombre de Usuario ya a sido tomado." . "<br />";

			 echo "<a>  Por favor escoga otro Nombre    </a>";
			 echo "<a href='Home.php'>ATRAS</a>";
			 }
			 else{

			 $query = "INSERT INTO usuarios (tipo_usuario_id, docente_id, estudiante_id, nombre_acceso,contrasena_acceso)
			           VALUES ('1','','','$username', '$hash')";

			 if ($this->db->query($query) === TRUE) {
			 
			 echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
			 echo "<h4>" . "Bienvenido: " . $username . "</h4>" . "\n\n";
			 echo "<h5>" . "Hacer Login: " . "<a href='../index.php'>Login</a>" . "</h5>"; 
			 }

			 else {
			 echo "Error al crear el usuario." . $query . "<br>" . $this->db->error; 
			   }
			 }
			 mysqli_close($this->db);

	 	}

		public function get_usuarios(){
			$consulta=$this->db->query("select * from usuarios");
			while($fila=$consulta->fetch_assoc()){
				$this->usuarios[]=$fila;
			}
			return $this->usuarios;
		}




}

?>