<?php
        include_once("../Capa_Controladores/persona.php");
	session_start();

	$codigo = $_POST['clave'];
	$rut = $_POST['hRUN'];
	$id = $_POST['hID'];	

	if(!Persona::VerificarPIN($rut,$codigo)){
		echo "0";
	}
	else{
		$_SESSION['RUTPaciente'] = $rut;
		$_SESSION['idPaciente'] = $id; 
	
		echo "1";
	}
?>
