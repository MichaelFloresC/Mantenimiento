<?php
//session_start();
//Llamada al modelo
if(isset($_POST['submit'])) {
	

	require_once("../Modelo/clase_modelo.php");
	$claseObj=new grupo_modelo();
	
	echo "aqui estoy";
	header('Location: ../Vista/crearGruposCursos_vista.php');
	exit();
}
?>