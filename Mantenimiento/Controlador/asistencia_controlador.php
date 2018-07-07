<?php
//session_start();
//Llamada al modelo
if(isset($_POST['submit'])) {
	$clasefechaid = $_POST['claseid'];
	$alumnoschrck = $_POST['check_asis'];
	$grupoid = $_POST['grupoidi'];




	require_once("../Modelo/asis_modelo.php");
	$asisObj=new asis_modelo();
	$datos=$asisObj->set_asis($grupoid, $clasefechaid, $alumnoschrck);
	echo "aqui estoy";
	header('Location: ../Vista/misCursos_vista.php');
	exit();
}