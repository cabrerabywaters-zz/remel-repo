<?php

	include('callQuery.php');

	session_start();
	session_unset();

	$rut = $_POST['rutUsuario'];
	$pass = md5($_POST['passUsuario']);

	$queryString = "SELECT * FROM Personas WHERE RUN = '$rut' AND Clave = '$pass';";
	if(CallQuery($queryString)->num_rows != 1){
		echo "0";
	}
	else{
		$_SESSION['RUT'] = $rut;

		$queryString = "SELECT idPaciente FROM Pacientes WHERE Personas_RUN = '$rut';";
                $res = CallQuery($queryString);
                if($res->num_rows == 1){
                        $_SESSION['idPaciente'] = $res->fetch_row()[0];
                }

		$queryString = "SELECT idMedico FROM Medicos WHERE Personas_RUN = '$rut';";
		$res = CallQuery($queryString);
		if($res->num_rows == 1){
			$_SESSION['idMedico'] = $res->fetch_row()[0];
		}
		echo "1";
	}
?>
