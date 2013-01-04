<?php
	include_once('utilidades.php');
        include_once('../Capa_Controladores/persona.php');
	include_once('../Capa_Controladores/medico.php');
	include_once('../Capa_Controladores/paciente.php');
	include_once('../Capa_Controladores/medicosHasInstituciones.php');
	
	session_start();
	session_unset();

	$rut = validadorRUT($_POST['rutUsuario']);
	$pass = $_POST['passUsuario'];
	
	if(!Persona::VerificarClave($rut,$pass)){
		echo "0";
	}
	else{
		$_SESSION['RUT'] = $rut;

		$idPaciente = Paciente::EncontrarPaciente($rut);
                if($idPaciente != false){
                        $_SESSION['idPacienteLog'] = $idPaciente;
                }

		$idMedico = Medico::EncontrarMedico($rut);
                if($idMedico != false){
                        $_SESSION['idMedicoLog'] = $idMedico;
			$_SESSION['instituciones'] = MedicosHasInstituciones::InstitucionesPorID($idMedico);
                }

		echo "1";
	}
?>
