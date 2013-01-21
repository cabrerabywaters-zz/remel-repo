<?php

include_once(dirname(__FILE__)."/../Capa_Controladores/medicamento.php");
include_once(dirname(__FILE__).'/../Capa_Controladores/alergiaHasPaciente.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/R_contraindicacionAlergia.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/pacienteHasCondicion.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/R_contraindicacionCondiciones.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/paciente.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/composicionMedicamento.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/R_contraindicacionPrincipioActivo.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/R_contraindicacionDiagnostico.php');

session_start();

$idMedicamento = $_POST['idMedicamento'];
$medicamento = array(
	'Medicamento' => Medicamento::BuscarMedicamentoPorId(1)
	);
$idPaciente = $_SESSION['idPacienteLog'][0];
$medicamentosRecetados = $_POST['medicamentosRecetados'];
//obtener idMedicamento de algun lado
//query de medicamentos vigentes del paciente
$fechaActual = date('d-m-y');
//verificacion de principios activos para medicamentos que el paciente esta actualmente consumiendo
$MedicamentosVigentes = Paciente::R_MedicamentosVigentesPaciente($idPaciente, $fechaActual);
if ($MedicamentosVigentes != false) {
    $principiosActivos = array();
    foreach ($MedicamentosVigentes as $llave => $valor) {
    //query de principios activos de los medicamentos vigentes del usuario
        $principiosActivos[] = ComposicionMedicamento::BuscarPrincipiosActivosPorMedicamentoId($valor);
    }
}
$paresContraindicadores = array();
$idsPrincipiosActivosPares = array();
for($i=0;$i<count($principiosActivos);$i++){
    for($j=$i+1;$j<count($principiosActivos);$j++){
        $resultado = ContraindicacionPrincipioActivo::BuscarContraindicacionPrincipioActivo($principiosActivos[$i],$principiosActivos[$j]);
        if ($resultado){
            $paresContraindicadores[] = array($principiosActivos[$i], $principiosActivos[$j]);
            $idsPrincipiosActivosPares[] = $principiosActivos[$i];
            $idsPrincipiosActivosPares[] = $principiosActivos[$j];
        }
    }
}
$idsPrincipiosActivosPares = array_unique($idsPrincipiosActivosPares);
//verificacion de principios activos para medicamentos actualmente siendo recetados por el medico
if ($MedicamentosVigentes != false) {
    foreach ($medicamentosRecetados as $llave => $valor) {
        $principiosActivosRecetados[] = ComposicionMedicamento::BuscarPrincipiosActivosPorMedicamentoId($valor);
    }
}
$paresContraindicadoresMedicamentosRecetados = array();
$idsPrincipiosActivosRecetadosPares = array();
for($i = 0; $i < count($principiosActivosRecetados); $i++) {
    for($j = $i + 1; $j < count($principiosActivosRecetados); $j++) {
        $resultado = ContraindicacionPrincipioActivo::BuscarContraindicacionPrincipioActivo($principiosActivosRecetados[$i], $principiosActivosRecetados[$j]);
        if ($resultado) {
            $paresContraindicadoresMedicamentosRecetados[] = array($principiosActivosRecetados[$i], $principiosActivosRecetados[$j]);
            $idsPrincipiosActivosRecetadosPares[] = $principiosActivosRecetados[$i];
            $idsPrincipiosActivosRecetadosPares[] = $principiosActivosRecetados[$j];
        }
    }
}
$idsPrincipiosActivosRecetadosPares = array_unique($idsPrincipiosActivosRecetadosPares);

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
        if ($row['ID'] == $fila ['ID']) {
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

$nombrePrincipiosActvos = array();
for ($i = 0; $i < count($idsPrincipiosActivosPares); $i++) {
    $result = PrincipioActivo::BuscarNombrePrincipioActivoPorId($idsPrincipiosActivosPares[$i]);
    $fila = $result->fetch_array();
    $nombrePrincipiosActvos[] = $fila['Text'];
}
$nombrePrincipiosActvosRecetados = array();
for ($i = 0; $i < count($idsPrincipiosActivosRecetadosPares); $i++) {
    $result = PrincipioActivo::BuscarNombrePrincipioActivoPorId($idsPrincipiosActivosRecetadosPares[$i]);
    $fila = $result->fetch_array();
    $nombrePrincipiosActvosRecetados[] = $fila['Text'];
}

$contraindicaciones = array();
//relleno de contraindicaciones como un solo arreglo
$contraindicaciones['alergias'] = $nombreAlergias;
$contraindicaciones['condiciones'] = $nombreCondiciones;
$contraindicaciones['diagnosticos'] = $nombreDiagnosticos;
//PAs de medicamentos que ya tiene el paciente
$contraindicaciones['principiosActivos'] = $nombrePrincipiosActvos;
//PAs de medicamentos siendom actualmente recetados
$contraindicaciones['principiosActivosRecetados'] = $nombrePrincipiosActvosRecetados;
$json = array_merge($medicamento,$contraindicaciones);

echo json_encode($json);
?>
