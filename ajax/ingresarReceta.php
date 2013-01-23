<?php

include_once(dirname(__FILE__)."/../Capa_Controladores/receta.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/historialMedico.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/medicamentoReceta.php");

session_start();

$datos = $_POST['resumenPoder'];
var_dump($datos);

$idLugar = $_SESSION['logLugar']['idLugar'];
$idConsulta = $_SESSION['idConsulta'];
$idMedico = $_SESSION['idMedicoLog'][0];
$idPaciente = $_SESSION['idPaciente'];
$ip = $_SESSION['last_ip'];

$idReceta = Receta::Insertar($idLugar, $ip, $tipoReceta, $idConsulta);

foreach($datos as $diagnostico) {
	HistorialMedico::Insertar($idConsulta,$diagnostico['idDiagnostico'],$diagnostico['tipoDiagnostico'],$diagnostico['comentarioDiagnostico']);

	foreach($diagnostico['medicamentos'] as $medicamento) {
		MedicamentoReceta::Insertar($cantidad, $frencuencia, $unidadFrecuencia, $fechaInicio, $periodo, $unidadPeriodo, $unidadConsumo, $via)
	}
}

echo json_decode($datos);


?>
