<?php
	include(dirname(__FILE__)."/../../Capa_Datos/callQuery.php");

	session_start();
	session_unset();

	$rut = $_POST['rutUsuario'];
	
    $rut2=str_replace(".","",$rut);//elimina puntos del rut
    $rut3=str_replace("-","",$rut2);//elimina guiones del rut
    $rut=$rut3; //iguala la variable final a la variable inicial

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
                        $_SESSION['idPacienteLog'] = $res->fetch_row()[0];
                }

		$queryString = "SELECT idMedico FROM Medicos WHERE Personas_RUN = '$rut';";
		$res = CallQuery($queryString);
		if($res->num_rows == 1){
			$_SESSION['idMedicoLog'] = $res->fetch_row()[0];
		}
		echo "1";
	}
?>
