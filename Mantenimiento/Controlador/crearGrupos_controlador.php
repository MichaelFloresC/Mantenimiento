<?php
//session_start();
//Llamada al modelo
if(isset($_POST['submit'])) {
	$cursoid = $_POST['cursoid_input'];
	$teonum = $_POST['teo_input'];
	$pranum = $_POST['pra_input'];
	$labnum = $_POST['lab_input'];
	$periodoid = $_POST['periodoid_input'];

	require_once("../Modelo/grupo_modelo.php");
	$grupoObj=new grupo_modelo();
	$datos=$grupoObj->insert_grupos($cursoid, $teonum, $pranum, $labnum, $periodoid);
	echo "aqui estoy";
	header('Location: ../Vista/crearGruposCursos_vista.php');
	exit();
}
?>