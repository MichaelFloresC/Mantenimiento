<?php
//session_start();
//Llamada al modelo
if(isset($_POST['submit'])) {
	$grupoid = $_POST['cursoid_input'];
	$iniLunes = -1;
	$iniMartes = -1;
	$iniMiercoles = -1;
	$iniJueves = -1;
	$iniViernes = -1;
	$finLunes = -1;
	$finMartes = -1;
	$finMiercoles = -1;
	$finJueves = -1;
	$finViernes = -1;

	if($_POST['inicioLunes'])
		$iniLunes = $_POST['inicioLunes'];

	if($_POST['inicioMartes'])
		$iniMartes = $_POST['inicioMartes'];

	if($_POST['inicioMiercoles'])
		$iniMiercoles= $_POST['inicioMiercoles'];

	if($_POST['inicioJueves'])
		$iniJueves = $_POST['inicioJueves'];

	if($_POST['inicioViernes'])
		$iniViernes = $_POST['inicioViernes'];

	if($_POST['finLunes'])
		$finLunes = $_POST['finLunes'];

	if($_POST['finMartes'])
		$finMartes = $_POST['finMartes'];

	if($_POST['finMiercoles'])
		$finMiercoles = $_POST['finMiercoles'];

	if($_POST['finJueves'])
		$finJueves = $_POST['finJueves'];

	if($_POST['finViernes'])
		$finViernes = $_POST['finViernes'];


	require_once("../Modelo/grupo_modelo.php");
	$grupoObj=new grupo_modelo();
	$datos=$grupoObj->insert_clase($grupoid, $iniLunes, $finLunes, $iniMartes, $finMartes, $iniMiercoles, $finMiercoles, $iniJueves, $finJueves, $iniViernes, $finViernes);

	echo "aqui estoy";
	header('Location: ../Vista/registroHorario_vista.php');
	exit();
}