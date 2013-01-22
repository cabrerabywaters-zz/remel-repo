<?php

error_reporting(0);

include_once(dirname(__FILE__)."/../Capa_Controladores/medicamento.php");
include_once(dirname(__FILE__).'/../Capa_Controladores/alergiaHasPaciente.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/R_contraindicacionAlergia.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/pacienteHasCondicion.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/R_contraindicacionCondiciones.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/paciente.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/composicionMedicamento.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/R_contraindicacionPrincipioActivo.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/R_contraindicacionDiagnostico.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/condicion.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/alergia.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/diagnostico.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/principioActivo.php');

session_start();

$idMedicamento = $_POST['idMedicamento'];
$medicamento = array(
	'Medicamento' => Medicamento::BuscarMedicamentoPorId($idMedicamento)
	);
$idPaciente = $_SESSION['idPaciente'];
$medicamentosRecetados = $_POST['medicamentosRecetados'];
//obtener idMedicamento de algun lado
//query de medicamentos vigentes del paciente
$fechaActual = date('d-m-y');
//verificacion de principios activos para medicamentos que el paciente esta actualmente consumiendo
$MedicamentosVigentes = Paciente::R_MedicamentosVigentesPaciente($idPaciente, $fechaActual);
// TODO nueva logica principio activos contra vigentes




// FIN ESPACIO TODO

//Nueva logica principios activos ya recetados, ahora encuentra medicamentos
if ($medicamentosRecetados != "NULL"){
	$medicamentosRecetadosConflictivos = array();
	$principiosActivosMedicamentoARecetar = ComposicionMedicamento::BuscarPrincipiosActivosPorMedicamentoId($idMedicamento);
	foreach($medicamentosRecetados as $medicamentoRecetado){
		$principiosActivosPorMedicamentoRecetado[$medicamentoRecetado] = ComposicionMedicamento::BuscarPrincipiosActivosPorMedicamentoId($medicamentoRecetado);
	}
	
	foreach($principiosActivosPorMedicamentoRecetado as $medicamentoRecetado => $arrayPrincipiosActivosRecetados){
		foreach($principiosActivosMedicamentoARecetar as $principioActivo){
			foreach($arrayPrincipiosActivosRecetados as $principioActivoRecetado){
				if(ContraindicacionPrincipioActivo::BuscarContraindicacionPrincipioActivo($principioActivo,$principioActivoRecetado) == true) $medicamentosRecetadosConflictivos[] = $medicamentoRecetado;
			}
		}
	}
	$medicamentosRecetadosConflictivos = array_unique($medicamentosRecetadosConflictivos);
}


$busquedaAlergiasPaciente = AlergiaHasPaciente::BuscarAlergiasPorPacienteId($idPaciente);
$busquedaAlergiasMedicamento = ContraindicacionAlergia::BuscarAlergiasPorMedicamentoId($idMedicamento);

$busquedaDiagnosticosPaciente = Paciente::R_DiagnosticosIdPorPacienteId($idPaciente);
$busquedaDiagnosticosMedicamento = ContraindicacionDiagnostico::BuscarDiagnosticosPorMedicamentoId($idMedicamento);

$busquedaCondicionesPaciente = PacienteHasCondicion::BuscarCondicionesPorPacienteId($idPaciente);
$busquedaCondicionesMedicamento = ContraindicacionCondicion::BuscarCondicionesPorMedicamentoId($idMedicamento);

$idAlergias = array();
while ($row = $busquedaAlergiasMedicamento->fetch_array()) {
//echo $row['ID'];
    while ($fila = $busquedaAlergiasPaciente->fetch_array()) {
        if ($row['ID'] == $fila['ID']) {
            $idAlergias[] = $row['ID'];
            break;
        }
    }
}

$idCondiciones = array();
while ($row = $busquedaCondicionesMedicamento->fetch_array()) {
    while ($fila = $busquedaCondicionesPaciente->fetch_array()) {
        if ($row['ID'] == $fila ['ID']) {
            $idCondiciones[] = $row['ID'];
            break;
        }
    }
}


$idDiagnostico = array();
while ($row = $busquedaDiagnosticosMedicamento->fetch_array()) {
    while ($fila = $busquedaDiagnosticosPaciente->fetch_array()) {
        if ($row['ID'] == $fila ['ID']) {
            $idDiagnostico[] = $row['ID'];
            break;
        }
    }
}

//guarda el nombre de las alergias
$nombreAlergias = array();
for ($i = 0; $i < count($idAlergias); $i++) {
    $result = Alergia::BuscarNombreAlergiaPorId($idAlergias[$i]);
    $fila = $result->fetch_array();
    $nombreAlergias[] = $fila['Text'];
}

$nombreCondiciones = array();
for ($i = 0; $i < count($idCondiciones); $i++) {
    $result = Condicion::BuscarNombreCondicionPorId($idCondiciones[$i]);
    $fila = $result->fetch_array();
    $nombreCondiciones[] = $fila['Text'];
}

$nombreDiagnosticos = array();
for ($i = 0; $i < count($idDiagnostico); $i++) {
    $result = Diagnostico::BuscarNombreDiagnosticoPorId($idDiagnostico[$i]);
    $fila = $result->fetch_array();
    $nombreDiagnosticos[] = $fila['Text'];
}


// Nombre medicamentos recetados conflictivos
$nombresMedicamentosRecetadosConflictivos = array();
foreach( $medicamentosRecetadosConflictivos as $idMedicamentoRecetado){
	$nombresMedicamentosRecetadosConflictivos[] = Medicamento::BuscarNombreMedicamentoPorId($idMedicamentoRecetado);
}


$contraindicaciones = array();
//relleno de contraindicaciones como un solo arreglo
$contraindicaciones['alergias'] = $nombreAlergias;
$contraindicaciones['condiciones'] = $nombreCondiciones;
$contraindicaciones['diagnosticos'] = $nombreDiagnosticos;
//Medicamentos conflictivos recetados por PA
$contraindicaciones['medicamentosRecetadosConflictivos'] = $nombresMedicamentosRecetadosConflictivos;
$json = array_merge($medicamento,$contraindicaciones);

echo json_encode($json);
?>
