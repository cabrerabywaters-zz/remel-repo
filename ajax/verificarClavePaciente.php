<?php
	include(dirname(__FILE__)."/../../Capa_Datos/callQuery.php");

	session_start();

	$codigo = $_POST['clave'];
	$rut = $_POST['hRUN'];
	$id = $_POST['hID'];	

	$queryString = "SELECT Nombre FROM Personas WHERE RUN = '$rut' AND Codigo_Seguridad = '$codigo';";
	if(CallQuery($queryString)->num_rows != 1){
		echo "0";
	}
	else{
		$_SESSION['RUTPaciente'] = $rut;
		$_SESSION['idPaciente'] = $id; 
	
		echo "1";
	}
?>
