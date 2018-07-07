<?php
//session_start();
//Llamada al modelo
if(isset($_POST['submit'])) 
{ 

        //echo "sdagfdsgasdgasd";
        $mallaname = $_POST['mallaname'];
        $archivoxls = $_FILES['archivoxls']['name'];
        $escuelaid = $_POST['escuelaid'];
        //echo $archivoxls;
    
if ($_FILES['archivoxls']["error"] > 0){
    //echo "Error: " . $_FILES['archivoxls']['error'] . "<br>";
}
else {
	/*
    echo "Nombre: " . $_FILES['archivoxls']['name'] . "<br>";
    echo "Tipo: " . $_FILES['archivoxls']['type'] . "<br>";
    echo "Tamaño: " . ($_FILES["archivoxls"]["size"] / 1024) . " kB<br>";
    echo "Carpeta temporal: " . $_FILES['archivoxls']['tmp_name'];
*/
}
move_uploaded_file($_FILES['archivoxls']['tmp_name'],"../subidas/" . $_FILES['archivoxls']['name']);

require_once("../Modelo/plan_modelo.php");
$planobj=new plan_modelo();
//echo "estoy aqui";
$datos=$planobj->insert_malla($mallaname,$archivoxls,$escuelaid);
header('Location: ../Vista/cargarMalla_vista.php');
exit();
}
?>