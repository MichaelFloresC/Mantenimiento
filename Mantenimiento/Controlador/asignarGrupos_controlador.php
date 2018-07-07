<?php
//session_start();
//Llamada al modelo
if(isset($_POST['submit'])) {
	$grupoid = $_POST['grupoid_input'];
	$aulaid = $_POST['aula_input'];
	$docenteid = $_POST['docente_input'];
	$archivoxls = -9999999;
	if($_FILES['alumnos_input']['name']){
		$archivoxls = $_FILES['alumnos_input']['name'];

	if ($_FILES['alumnos_input']["error"] > 0){
    	//echo "Error: " . $_FILES['alumnos_input']['error'] . "<br>";
	}
	else {
		/*
    	echo "Nombre: " . $_FILES['alumnos_input']['name'] . "<br>";
    	echo "Tipo: " . $_FILES['alumnos_input']['type'] . "<br>";
    	echo "Tamaño: " . ($_FILES["alumnos_input"]["size"] / 1024) . " kB<br>";
    	echo "Carpeta temporal: " . $_FILES['alumnos_input']['tmp_name'];
		*/
	}
	move_uploaded_file($_FILES['alumnos_input']['tmp_name'],"../subidas/" . $_FILES['alumnos_input']['name']);
}



	require_once("../Modelo/grupo_modelo.php");
	$grupoObj=new grupo_modelo();
	$datos=$grupoObj->update_grupos($grupoid, $aulaid, $docenteid, $archivoxls);
	echo "aqui estoy";
	header('Location: ../Vista/asignacionGrupos_vista.php');
	exit();
}