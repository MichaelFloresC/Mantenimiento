<?php
//session_start();
//Llamada al modelo
if(isset($_POST['submit'])) {
	$claseid = $_POST['claseid'];
	$fecha = $_POST['fecha'];
	$fecharep = $_POST['fecharep'];
	$horain = $_POST['horain'];
	$horasal = $_POST['horasal'];



	require_once("../Modelo/clase_modelo.php");
	$grupoObj=new clase_modelo();
	$datos=$grupoObj->insert_clase_fecha($claseid, $fecha, $fecharep, $horain, $horasal);

	echo "aqui estoy";
	header('Location: ../Vista/reprogramarHorario_vista.php');
	exit();
}