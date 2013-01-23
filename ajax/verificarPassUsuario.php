<?php
	include_once(dirname(__FILE__).'/utilidades.php');
        include_once(dirname(__FILE__).'/../Capa_Controladores/persona.php');
	include_once(dirname(__FILE__).'/../Capa_Controladores/medico.php');
	include_once(dirname(__FILE__).'/../Capa_Controladores/paciente.php');
	include_once(dirname(__FILE__).'/../Capa_Controladores/medicoHasSucursal.php');
	include_once(dirname(__FILE__).'/../Capa_Controladores/funcionario.php');
	
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

		$idMedico = Medico::EncontrarMedico($rut)[0];
                if($idMedico != false){
                    $_SESSION['idMedicoLog'] = $idMedico;
                }
                $idFuncionario = Funcionario::EncontrarFuncionario($rut);
                if($idFuncionario != false){
                    $_SESSION['idFuncionarioLog'] = $idFuncionario[0];
                    $_SESSION['funcionarioCategoria'] = $idFuncionario[1];
                }

		echo "1";
	}
?>
